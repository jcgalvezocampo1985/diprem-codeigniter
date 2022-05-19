<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProveedorSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $proveedores = [];

        for ($i = 0; $i < 3; $i++)
        {
            $proveedores[] = [
                'cuit' => 'A'.$i.'B'.$i,
                'empresa' => $faker->company,
                'zona' => $faker->state,
            ];
        }

        $builder = $this->db->table('proveedores');
        $builder->insertBatch($proveedores);
    }
}
