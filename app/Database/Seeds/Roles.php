<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
    public function run()
    {
        $usuario1 = [
            'nombre' => 'admin',
            'descripcion' => 'Soy el admin',
        ];
        $usuario2 = [
            'nombre' => 'vendedor',
            'descripcion' => 'Soy el vendedor',
        ];
        $this->db->table('roles')->insert($usuario1);
        $this->db->table('roles')->insert($usuario2);
    }
}