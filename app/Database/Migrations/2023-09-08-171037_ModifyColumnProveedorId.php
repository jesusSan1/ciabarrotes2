<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyColumnProveedorId extends Migration
{
    public function up()
    {
        $field = [
            'proveedor_id' => [
                'name' => 'proveedor_id',
                'type' => 'INT',
                'default' => 1,
            ],
        ];
        $this->forge->modifyColumn('producto', $field);
    }

    public function down()
    {
        $field = [
            'proveedor_id' => [
                'name' => 'proveedor_id',
                'type' => 'INT',
            ],
        ];
        $this->forge->modifyColumn('producto', $field);
    }
}
