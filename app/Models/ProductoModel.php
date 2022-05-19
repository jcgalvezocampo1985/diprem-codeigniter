<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Producto;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $allowedFields = ['nombre', 'precio', 'proveedor_id'];
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = Producto::class;
}