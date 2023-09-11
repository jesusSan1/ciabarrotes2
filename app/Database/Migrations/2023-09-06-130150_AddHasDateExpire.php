<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddHasDateExpire extends Migration
{
    public function up()
    {
        $field = [
            'tiene_caducidad' => [
                'type' => 'BOOL',
            ],
        ];
        $this->forge->addColumn('producto', $field);
    }

    public function down()
    {
        $this->forge->dropColumn('producto', 'tiene_caducidad');
    }
}
