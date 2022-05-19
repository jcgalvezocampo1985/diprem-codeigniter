<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Reportes extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('Admin/reportes/index');
    }

    public function ventaPorZona()
    {
        $clientes = $this->db->table('clientes')
                            ->select('zona')
                            ->orderBy('zona', 'ASC')
                            ->groupBy('zona')
                            ->get()
                            ->getResult();

        return view('Admin/reportes/ventaporzona', compact('clientes'));
    }

    public function datosVentaPorZona($zona)
    {
        $registros = $this->db->table('clientes_productos')
                            ->select('
                                            clientes_productos.cantidad,
                                            clientes_productos.total,
                                            clientes_productos.fecha,
                                            productos.nombre AS producto,
                                            productos.precio,
                                            proveedores.empresa,
                                            clientes.nombre AS cliente
                                        ')
                            ->join('clientes', 'clientes_productos.cliente_id = clientes.id')
                            ->join('productos', 'clientes_productos.producto_id = productos.id')
                            ->join('proveedores', 'productos.proveedor_id = proveedores.id')
                            ->where('clientes.zona', $zona)
                            ->orderBy('clientes_productos.total', 'DESC')
                            ->get()
                            ->getResult();
        
        return view('Admin/reportes/ventaporzonatabla', compact('registros'));
    }

    public function compraPorZona()
    {
        $proveedores = $this->db->table('proveedores')
                            ->select('zona')
                            ->orderBy('zona', 'ASC')
                            ->groupBy('zona')
                            ->get()
                            ->getResult();

        return view('Admin/reportes/compraporzona', compact('proveedores'));
    }

    public function datosCompraPorZona($zona)
    {
        $registros = $this->db->table('proveedores')
                            ->select('
                                    proveedores.cuit, 
                                    proveedores.empresa, 
                                    productos.nombre AS producto, 
                                    productos.precio
                            ')
                            ->join('productos', 'proveedores.id = productos.proveedor_id')
                            ->where('proveedores.zona', $zona)
                            ->get()
                            ->getResult();
        
        return view('Admin/reportes/compraporzonatabla', compact('registros'));
    }

    public function compraPorCliente()
    {
        $clienteModel = model('ClienteModel');
        $clientes = $clienteModel->orderBy('nombre', 'ASC')->findAll();

        return view('Admin/reportes/compraporcliente', compact('clientes'));
    }

    public function datosCompraPorCliente($cliente_id, $fecha_inicio, $fecha_fin)
    {
        $registros = $this->db->table('clientes_productos')
                            ->select('
                                    productos.nombre AS producto,
                                    proveedores.empresa,
                                    productos.precio,
                                    clientes_productos.cantidad,
                                    clientes_productos.total,
                                    clientes_productos.fecha 
                            ')
                            ->join('productos', 'clientes_productos.producto_id = productos.id')
                            ->join('proveedores', 'productos.proveedor_id = proveedores.id')
                            ->where('clientes_productos.cliente_id', $cliente_id)
                            /* ->where('DATE_FORMAT(clientes_productos.fecha, "%Y-%m-%d") >=', $fecha_inicio)
                            ->where('DATE_FORMAT(clientes_productos.fecha, "%Y-%m-%d") <=', $fecha_fin) */
                            ->where('DATE_FORMAT(clientes_productos.fecha, "%Y-%m-%d") BETWEEN "'.$fecha_inicio.'" AND "'.$fecha_fin.'"')
                            ->orderBy('clientes_productos.total', 'DESC')
                            ->get()
                            ->getResult();

        return view('Admin/reportes/compraporclientetabla', compact('registros'));
    }
}