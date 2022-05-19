<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected function setPassword(string $password)
    {
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
    }
}