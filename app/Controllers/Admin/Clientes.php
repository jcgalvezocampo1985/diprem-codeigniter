<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Cliente;

class Clientes extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = model('ClienteModel');
    }

    public function index()
    {
        $clientes = $this->model->findAll();//paginate(3, 'clientes');
        //$pager = $this->model->pager;

        return view('Admin/clientes/index', compact('clientes'));
    }

    public function create()
    {
        return view('Admin/clientes/form');
    }

    public function store()
    {
        $validate = $this->validate([
            'nombre' => 'required',
            'cuit' => 'required',
            'empresa' => 'required',
            'zona' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]'
        ]);

        if(!$validate)
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        else
        {
            $cliente = new Cliente($this->request->getPost());

            $model = $this->model;
            $model->save($cliente);

            return redirect()->route('admin/clientes')->with('msg', 'Cliente registrado');
        }
    }

    public function edit($id)
    {
        $cliente = $this->model->where('id', $id)->first();

        return view('admin/clientes/form', compact('cliente'));
    }

    public function update()
    {
        $validate = $this->validate([
            'nombre' => 'required',
            'cuit' => 'required',
            'empresa' => 'required',
            'zona' => 'required',
            'email' => 'required|valid_email'
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
                'cuit' => $this->request->getVar('cuit'),
                'empresa' => $this->request->getVar('empresa'),
                'zona' => $this->request->getVar('zona'),
                'email' => $this->request->getVar('email')
            ]);

            return redirect()->route('admin/clientes')->with('msg', 'Cliente modificado');
        }
    }

    public function delete($id = '')
    {
        if($id != "")
        {
            $cliente = $this->model->where('id', $id);

            $total_registro = $cliente->countAllResults();

            if($total_registro > 0)
            {
                $this->model->where('id', $id)->delete($id);

                return redirect()->route('admin/clientes')->with('msg', 'Cliente eliminado');
            }

            return redirect()->route('admin/clientes');
        }
        return redirect()->route('admin/clientes');
    }
}