<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Presentacion extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre' => 'Unidad',
            ],
            [
                'nombre' => 'Libra',
            ],
            [
                'nombre' => 'Kilogramo',
            ],
            [
                'nombre' => 'Caja',
            ],
            [
                'nombre' => 'Paquete',
            ],
            [
                'nombre' => 'Lata',
            ],
            [
                'nombre' => 'Galon',
            ],
            [
                'nombre' => 'Botella',
            ],
            [
                'nombre' => 'Tira',
            ],
            [
                'nombre' => 'Sobre',
            ],
            [
                'nombre' => 'Bolsa',
            ],
            [
                'nombre' => 'Saco',
            ],
            [
                'nombre' => 'Tarjeta',
            ],
        ];
        $builder = $this->db->table('presentacion');
        $builder->insertBatch($data);
    }
}
