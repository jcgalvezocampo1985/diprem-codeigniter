<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Producto extends Entity
{
    protected function getProveedorid()
    {
        $id = $this->attributes['proveedor_id'];
        
        if(!empty($id))
        {
            $proveedor = model('ProveedorModel');
             return $proveedor->find($id);
        }
        return $id;
    }
}