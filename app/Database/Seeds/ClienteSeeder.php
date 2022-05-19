<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $clientes = [];

        for ($i = 0; $i < 9; $i++)
        {
            $clientes[] = [
                'nombre' => $faker->firstName,
                'cuit' => 'C'.$i.'D'.$i,
                'empresa' => $faker->company,
                'zona' => $faker->state,
                'email' => $faker->email
            ];
        }

        $builder = $this->db->table('clientes');
        $builder->insertBatch($clientes);
    }
}
