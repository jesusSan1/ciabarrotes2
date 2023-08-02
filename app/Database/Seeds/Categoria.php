<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categoria extends Seeder
{
    public function run()
    {
        $data = [
            'nombre' => 'Sin categoria',
            'fecha_creacion' => date('Y-m-d'),
            'eliminado' => 0,
            'creado_por' => 1,
        ];
        $this->db->table('categoria')->insert($data);

    }
}
