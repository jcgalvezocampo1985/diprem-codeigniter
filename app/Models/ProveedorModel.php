<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Proveedor;

class ProveedorModel extends Model
{
    protected $table = 'proveedores';
    protected $allowedFields = ['cuit', 'empresa', 'zona'];
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = Proveedor::class;
}