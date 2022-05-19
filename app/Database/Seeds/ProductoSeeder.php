<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $productos = [];
        $productos = [
            [
                'nombre' => 'Leche',
                'precio' => 15.00,
                'proveedor_id' => 1
            ],
            [
                'nombre' => 'Huevo',
                'precio' => 3.00,
                'proveedor_id' => 2
            ],
            [
                'nombre' => 'Azucar',
                'precio' => 25.00,
                'proveedor_id' => 3
            ],
            [
                'nombre' => 'Sal',
                'precio' => 12.00,
                'proveedor_id' => 3
            ]
        ];

        $builder = $this->db->table('productos');
        $builder->insertBatch($productos);
    }
}
