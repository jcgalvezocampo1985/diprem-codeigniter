<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Usuarios extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = model('UsersModel');
    }

    public function index()
    {
        $usuarios = $this->model->findAll();//paginate(3, 'usuarios');
        //$pager = $this->model->pager;

        return view('Admin/usuarios/index', compact('usuarios'));
    }
}