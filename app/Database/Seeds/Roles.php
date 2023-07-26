<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre' => 'admin',
                'descripcion' => 'Soy el admin',
            ],
            [
                'nombre' => 'vendedor',
                'descripcion' => 'Soy el vendedor',
            ],
        ];
        $this->db->table('roles')->insertBatch($data);
    }
}
