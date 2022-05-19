<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\User;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['email', 'username', 'password'];
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = User::class;

    public function getUserBy(string $column, string $value)
    {
        return $this->where($column, $value)->first();
    }

    /* protected $validationRules = [
        'email' => 'required|valid_email|is_unique[users.email]',
        'username' => 'required|alpha_space',
        'password' => 'required|matches[repite_password]'
    ];
    protected $validationMessages = [
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
    ];
    protected $skipValidation = false; */
}