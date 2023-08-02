<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Configuracion extends Seeder
{
    public function run()
    {
        $data = [
            'nombre_empresa' => '',
            'direccion' => '',
            'telefono' => '',
            'correo_electronico' => '',
        ];
        $this->db->table('configuracion')->insert($data);
    }
}