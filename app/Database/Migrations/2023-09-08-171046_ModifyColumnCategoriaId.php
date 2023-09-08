<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyColumnCategoriaId extends Migration
{
    public function up()
    {
        $field = [
            'categoria_id' => [
                'name' => 'categoria_id',
                'type' => 'INT',
                'default' => 1,
            ],
        ];
        $this->forge->modifyColumn('producto', $field);
    }

    public function down()
    {
        $field = [
            'categoria_id' => [
                'name' => 'categoria_id',
                'type' => 'INT',
            ],
        ];
        $this->forge->modifyColumn('producto', $field);
    }
}
