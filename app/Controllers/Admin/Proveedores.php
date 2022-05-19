<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Proveedor;

class Proveedores extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = model('ProveedorModel');
    }

    public function index()
    {
        $proveedores = $this->model->findAll();//paginate(3, 'proveedores');
        //$pager = $this->model->pager;


        return view('Admin/proveedores/index', compact('proveedores'));
    }

    public function create()
    {
        return view('Admin/proveedores/form');
    }

    public function store()
    {
        $validate = $this->validate([
            'cuit' => 'required',
            'empresa' => 'required',
            'zona' => 'required'
        ]);

        if(!$validate)
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        else
        {
            $proveedor = new Proveedor($this->request->getPost());

            $model = $this->model;
            $model->save($proveedor);

            return redirect()->route('admin/proveedores')->with('msg', 'Proveedor registrado');
        }
    }

    public function edit($id)
    {
        $proveedor = $this->model->where('id', $id)->first();

        return view('admin/proveedores/form', compact('proveedor'));
    }

    public function update()
    {
        $validate = $this->validate([
            'id' => 'required',
            'cuit' => 'required',
            'empresa' => 'required',
            'zona' => 'required'
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
                'cuit' => $this->request->getVar('cuit'),
                'empresa' => $this->request->getVar('empresa')
            ]);

            return redirect()->route('admin/proveedores')->with('msg', 'Proveedor modificado');
        }
    }

    public function delete($id = '')
    {
        if($id != "")
        {
            $proveedor = $this->model->where('id', $id);

            $total_registro = $proveedor->countAllResults();

            if($total_registro > 0)
            {
                $this->model->where('id', $id)->delete($id);

                return redirect()->route('admin/proveedores')->with('msg', 'Proveedor eliminado');
            }

            return redirect()->route('admin/proveedores');
        }
        return redirect()->route('admin/proveedores');
    }
}