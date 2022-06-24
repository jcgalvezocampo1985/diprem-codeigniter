<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class Venta extends Entity
{
    protected function getClienteid()
    {
        $id = $this->attributes['cliente_id'];

        if(!empty($id))
        {
            $cliente = model('ClienteModel');

            return $cliente->find($id);
        }
        return $id;
    }

    protected function getProductoid()
    {
        $id = $this->attributes['producto_id'];

        if(!empty($id))
        {
            $producto = model('ProductoModel');

            return $producto->find($id);
        }
        return $id;
    }
}