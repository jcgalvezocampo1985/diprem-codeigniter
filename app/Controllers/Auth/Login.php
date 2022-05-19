<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = model('UsersModel');
    }

    public function index()
    {
        if(session()->is_logged)
            return redirect('admin/usuarios');

        return view('Auth/login');
    }

    public function sigin()
    {
        helper(['form', 'url']);

        $validation = service('validation');
        $validation->setRules(
            [
                'email' => 'required|valid_email',
                'password' => 'required'
            ],
            [
                'email' => [
                    'required' => 'Requerido',
                    'valid_email' => 'Email no válido'
                ],
                'password' => [
                    'required' => 'Requerido'
                ]
            ]
        );

        if(!$validation->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        else
        {
            $email = trim($this->request->getVar('email'));
            $password = trim($this->request->getVar('password'));

            if(!$user = $this->model->getUserBy('email', $email))
            {
                return redirect()->back()->with('msg', ['type' => 'danger', 'body' => 'Este usuario no existe']);
            }

            if(!password_verify($password, $user->password))
            {
                return redirect()->back()->with('msg', ['type' => 'danger', 'body' => 'Datos incorrectos']);
            }

            session()->set([
                'user_id' => $user->id,
                'username' => $user->username,
                'is_logged' => true
            ]);

            return redirect('admin/usuarios')->with('msg', 'Bienvenido '.$user->username);
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->route('auth/login');
    }
}