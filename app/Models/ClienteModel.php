<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Cliente;

class ClienteModel extends Model
{
    protected $table = 'clientes';
    protected $allowedFields = ['nombre', 'cuit', 'empresa', 'zona', 'email'];
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = Cliente::class;
}