<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Entities\User;


class Registro extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = model('UsersModel');
    }

    public function create()
    {
        return view('Auth/form');
    }

    public function store()
    {
        helper(['form', 'url']);

        $validation = service('validation');
        $validation->setRules(
            [
                'email' => 'required|valid_email|is_unique[users.email]',
                'username' => 'required|alpha_space',
                'password' => 'required|matches[repite_password]'
            ],
            [
                'email' => [
                    'required' => 'Requerido',
                    'valid_email' => 'Email no válido',
                    'is_unique' => 'Email ya existe'
                ],
                'username' => [
                    'required' => 'Requerido',
                    'alpha_space' => 'Solo alfanumericos'
                ],
                'password' => [
                    'required' => 'Requerido',
                    'matches' => 'El password no coincide'
                ]
            ]
        );

        if(!$validation->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        else
        {
            $user = new User($this->request->getPost());

            $model = $this->model;
            $model->save($user);

            return redirect()->route('auth/login')->with('msg', ['type' => 'success', 'body' => 'Usuario Registrado']);
        }
    }
}