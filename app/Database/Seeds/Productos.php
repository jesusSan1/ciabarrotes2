<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Productos extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $presentaciones = ['Unidad', 'Libra', 'Kilogramo', 'Caja', 'Paquete', 'Lata', 'Galon', 'Botella', 'Tira', 'Sobre', 'Bolsa', 'Saco', 'Tarjeta'];

        $data = [];
        foreach (range(1, 15) as $i) {
            $marca = $faker->boolean(30) ? "marca $i" : '';
            $modelo = $faker->boolean(30) ? "modelo $i" : '';
            $sku = $faker->boolean(30) ? $faker->bothify('????###') : '';
            $codigoBarras = $faker->boolean(30) ? $faker->ean13() : '';
            $data[] = [
                'codigo_barras' => $codigoBarras,
                'sku' => $sku,
                'nombre' => "Producto $i",
                'fecha_caducidad' => '2023' . $faker->month() . $faker->dayOfMonth(),
                'existencia' => $faker->numberBetween(0, 15),
                'existencia_minima' => $faker->numberBetween(0, 15),
                'presentacion' => $presentaciones[array_rand($presentaciones)],
                'precio_compra' => $faker->randomNumber(5, false),
                'precio_venta' => $faker->randomNumber(5, false),
                'precio_venta_mayoreo' => 0,
                'descuento_venta' => 0,
                'marca' => $marca,
                'modelo' => $modelo,
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
