<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Proveedores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false
            ],
            'cuit' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'zona' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'empresa' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('proveedores');
    }

    public function down()
    {
        $this->forge->dropTable('proveedores');
    }
}
