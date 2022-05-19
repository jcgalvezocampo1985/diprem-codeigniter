<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Venta;

class VentaModel extends Model
{
    protected $table = 'clientes_productos';
    protected $allowedFields = ['cliente_id', 'producto_id', 'cantidad', 'total', 'fecha'];
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = Venta::class;
}