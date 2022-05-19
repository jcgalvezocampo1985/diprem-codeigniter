<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Libro;
    }

    public function index()
    {
        $registros = $this->model->orderBy('id', 'ASC')->findAll();

        return view('libros/index', compact('registros'));
    }

    public function create()
    {
        return view('libros/form');
    }

    public function store()
    {
        $validate = $this->validate([
            'nombre' => 'required|min_length[3]',
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen, 1024]'
            ]
        ]);

        if (!$validate)
        {
            
        }

        $nombre = $this->request->getVar('nombre');
        $imagen = $this->request->getFile('imagen');

        $nuevoNombre = '';

        if ($imagen)
        {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('../public/uploads/', $nuevoNombre);
        }

        $datos = [
            'nombre' => $nombre,
            'imagen' => $nuevoNombre
        ];

        $this->model->insert($datos);
        
        return $this->response->redirect(site_url('libros/index'));
    }

    public function edit($id)
    {
        $libro = $this->model->where('id', $id)->first();

        return view('libros/form', compact('libro'));
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $nombre = $this->request->getVar('nombre');

        $datos = [
            'nombre' => $nombre
        ];

        $this->model->update($id, $datos);

        $validate = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen, 1024]'
            ]
        ]);

        if($validate)
        {
            $imagen = $this->request->getFile('imagen');

            $nuevoNombre = '';

            $libro = $this->model->where('id', $id);

            $total_registro = $libro->countAllResults();

            if($total_registro > 0)
            {
                $registro = $libro->first();

                $ruta = '../public/uploads/'.$registro['imagen'];

                if(file_exists($ruta))
                {
                    unlink($ruta);
                }

                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('../public/uploads/', $nuevoNombre);

                $datos = [
                    'imagen' => $nuevoNombre
                ];

                $this->model->update($id, $datos);
            }
        }

        return $this->response->redirect(site_url('libros/index'));
    }

    public function delete($id = '')
    {
        if($id != "")
        {
            $libro = $this->model->where('id', $id);

            $total_registro = $libro->countAllResults();

            if($total_registro > 0)
            {
                $registro = $libro->first();

                $ruta = '../public/uploads/'.$registro['imagen'];

                if(file_exists($ruta))
                {
                    unlink($ruta);
                }

                $this->model->where('id', $id)->delete($id);
            }

            return $this->response->redirect(site_url('libros/index'));
        }
           throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
}