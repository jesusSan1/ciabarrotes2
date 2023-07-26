<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePresentacion extends Migration
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
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('presentacion');
    }

    public function down()
    {
        $this->forge->dropTable('presentacion');
    }
}
