<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBitacora extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'null' => false,
            ],
            'accion' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'fecha' => [
                'type' => 'DATETIME',
            ],
            'id_usuario' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_usuario', 'usuarios', 'id');
        $this->forge->createTable('bitacora');

    }

    public function down()
    {
        $this->forge->dropTable('bitacora');
    }
}