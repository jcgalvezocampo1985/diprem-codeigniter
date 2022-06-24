<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Venta;

class Ventas extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = model('VentaModel');
    }

    public function index()
    {
        $ventas = $this->model->findAll();

        return view('Admin/ventas/index', compact('ventas'));
    }

    public function create()
    {
        $proveedorModel = model('ProveedorModel');
        $proveedores = $proveedorModel->findAll();

        $clienteModel = model('ClienteModel');
        $clientes = $clienteModel->findAll();

        return view('Admin/ventas/form', compact('proveedores', 'clientes'));
    }

    public function store()
    {
        $validate = $this->validate([
            'cliente_id' => 'required',
            'proveedor_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'total' => 'required'
        ]);

        if(!$validate)
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        else
        {
            $model = $this->model;
            $model->save([
                'cliente_id' => $this->request->getVar('cliente_id'),
                'producto_id' => $this->request->getVar('producto_id'),
                'cantidad' => $this->request->getVar('cantidad'),
                'total' => $this->request->getVar('total'),
                'fecha' => date('Y-m-d h:i:s')
            ]);

            return redirect()->route('admin/ventas')->with('msg', 'Venta registrada');
        } 
    }

    public function edit($id)
    {
        $venta = $this->model->find($id);

        $clienteModel = model('ClienteModel');
        $clientes = $clienteModel->findAll();

        $proveedorModel = model('ProveedorModel');
        $proveedores = $proveedorModel->findAll();

        $productoModel = model('ProductoModel');
        $productos = $productoModel->where('proveedor_id', $venta->producto_id->proveedor_id->id)->findAll();

        return view('admin/ventas/form', compact('venta', 'clientes', 'proveedores', 'productos'));
    }

    public function update()
    {
        $validate = $this->validate([
            'cliente_id' => 'required',
            'proveedor_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'total' => 'required'
        ]);

        if(!$validate)
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        else
        {
            $model = $this->model;
            $model->save([
                'id' => $this->request->getVar('id'),
                'cliente_id' => $this->request->getVar('cliente_id'),
                'producto_id' => $this->request->getVar('producto_id'),
                'cantidad' => $this->request->getVar('cantidad'),
                'total' => $this->request->getVar('total')
            ]);

            return redirect()->route('admin/ventas')->with('msg', 'Venta modificada');
        }
    }

    public function delete($id = '')
    {
        if($id != "")
        {
            $venta = $this->model->where('id', $id);

            $total_registro = $venta->countAllResults();

            if($total_registro > 0)
            {
                $this->model->where('id', $id)->delete($id);

                return redirect()->route('admin/ventas')->with('msg', 'Venta eliminada');
            }

            return redirect()->route('admin/ventas');
        }
        return redirect()->route('admin/ventas');
    }
}