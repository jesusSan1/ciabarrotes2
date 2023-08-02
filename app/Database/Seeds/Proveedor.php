<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Proveedor extends Seeder
{
    public function run()
    {
        $data = [
            'nombre' => 'Sin proveedor',
            'fecha_creacion' => date('Y-m-d'),
            'eliminado' => 0,
            'creado_por' => 1,
        ];
        $this->db->table('proveedor')->insert($data);
    }
}
