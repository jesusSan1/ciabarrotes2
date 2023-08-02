<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableConfiguracion extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'null' => false,
            ],
            'nombre_empresa' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'direccion' => [
                'type' => 'TEXT',
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'correo_electronico' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('configuracion');

    }

    public function down()
    {
        $this->forge->dropTable('configuracion');
    }
}