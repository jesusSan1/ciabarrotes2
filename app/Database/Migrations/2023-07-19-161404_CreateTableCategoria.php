<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCategoria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'null' => false,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'fecha_creacion' => [
                'type' => 'DATE',
            ],
            'fecha_eliminado' => [
                'type' => 'DATE',
            ],
            'eliminado' => [
                'type' => 'BOOL',
            ],
            'creado_por' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('creado_por', 'usuarios', 'id');
        $this->forge->createTable('categoria');
    }

    public function down()
    {
        $this->forge->dropTable('categoria');
    }
}