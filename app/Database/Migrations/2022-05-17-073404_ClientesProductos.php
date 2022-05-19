<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClientesProductos extends Migration
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
            'cliente_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'null' => false
            ],
            'producto_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'null' => false
            ],
            'cantidad' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00,
                'null' => false
            ],
            'fecha' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('cliente_id', 'clientes', 'id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('producto_id', 'productos', 'id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('clientes_productos');
    }

    public function down()
    {
        $this->forge->dropTable('clientes_productos');
    }
}