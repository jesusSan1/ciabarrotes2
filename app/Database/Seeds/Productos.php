<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Productos extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'codigo_barras' => $faker->ean13(),
                'sku' => '',
                'nombre' => "Producto$i",
                'fecha_caducidad' => '2023' . $faker->month() . $faker->dayOfMonth(),
                'existencia' => $faker->numberBetween(0, 15),
                'existencia_minima' => $faker->numberBetween(0, 15),
                'presentacion' => '',
                'precio_compra' => $faker->randomNumber(5, false),
                'precio_venta' => $faker->randomNumber(5, false),
                'precio_venta_mayoreo' => 0,
                'descuento_venta' => 0,
                'marca' => '',
                'modelo' => '',
                'proveedor_id' => 1,
                'categoria_id' => 1,
                'imagen' => '',
                'creado_por' => 1,
                'fecha_creacion' => $faker->date('Y_m_d'),
                'fecha_eliminado' => '0000-00-00',
                'eliminado' => $faker->numberBetween(0, 1),
            ];
        }
        $builder = $this->db->table('producto');
        $builder->insertBatch($data);
    }
}