<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Producto;

class Productos extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = model('ProductoModel');
    }

    public function index()
    {
        $productos = $this->model->findAll();//paginate(3, 'productos');
        //$pager = $this->model->pager;

        return view('Admin/productos/index', compact('productos'));
    }

    public function create()
    {
        $proveedorModel = model('ProveedorModel');
        $proveedores = $proveedorModel->findAll();

        return view('Admin/productos/form', compact('proveedores'));
    }

    public function store()
    {
        $validate = $this->validate([
            'nombre' => 'required',
            'precio' => 'required|decimal',
            'proveedor_id' => 'required'
        ]);

        if(!$validate)
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        else
        {
            $producto = new Producto($this->request->getPost());

            $model = $this->model;
            $model->save($producto);

            return redirect()->route('admin/productos')->with('msg', 'Producto registrado');
        }
    }

    public function edit($id)
    {
        $producto = $this->model->find($id);

        $proveedorModel = model('ProveedorModel');
        $proveedores = $proveedorModel->findAll();

        return view('admin/productos/form', compact('producto','proveedores'));
    }

    public function update()
    {
        $validate = $this->validate([
            'nombre' => 'required',
            'precio' => 'required|decimal',
            'proveedor_id' => 'required'
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
                'nombre' => $this->request->getVar('nombre'),
                'precio' => $this->request->getVar('precio'),
                'proveedor_id' => $this->request->getVar('proveedor_id')
            ]);

            return redirect()->route('admin/productos')->with('msg', 'Producto modificado');
        }
    }

    public function delete($id = '')
    {
        if($id != "")
        {
            $producto = $this->model->where('id', $id);

            $total_registro = $producto->countAllResults();

            if($total_registro > 0)
            {
                $this->model->where('id', $id)->delete($id);

                return redirect()->route('admin/productos')->with('msg', 'Producto eliminado');
            }

            return redirect()->route('admin/productos');
        }
        return redirect()->route('admin/productos');
    }

    public function listaPorProveedor($proveedor_id)
    {
        $q = $this->model->where('proveedor_id', $proveedor_id)->findAll();
        $datos = [];
        foreach($q as $r)
        {
            $productoId = $r->id;
            $productoNombre = $r->nombre;

            $datos[] = [
                'id' => $productoId,
                'nombre' => $productoNombre
            ];
        }

        return json_encode($datos);
    }

    public function precioProducto($producto_id)
    {
        $query = $this->model->find($producto_id);
        return number_format($query->precio, 2);
    }
}