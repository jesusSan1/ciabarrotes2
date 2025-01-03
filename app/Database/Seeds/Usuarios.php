<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Usuarios extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [
            [
                'nombre' => 'admin',
                'apepat' => 'admin',
                'apemat' => 'admin',
                'genero' => 'hombre',
                'usuario' => 'admin',
                'password' => password_hash('Admin123!', PASSWORD_DEFAULT),
                'correo' => 'jjsanru3@gmail.com',
                'telefono' => '0000000000',
                'habilitado' => '1',
                'foto_perfil' => '',
                'rol_id' => '1',
                'fecha_creacion' => date('Y-m-d'),
                'token' => '',
                'eliminado' => '0',
                'fecha_eliminado' => '',
            ],
            [
                'nombre' => 'vendedor',
                'apepat' => 'vendedor',
                'apemat' => 'vendedor',
                'genero' => 'hombre',
                'usuario' => 'vendedor',
                'password' => password_hash('Vendedor123!', PASSWORD_DEFAULT),
                'correo' => 'test@test.com',
                'telefono' => '0000000000',
                'habilitado' => '1',
                'foto_perfil' => 'images/hombre.png',
                'rol_id' => '2',
                'fecha_creacion' => date('Y-m-d'),
                'token' => '',
                'eliminado' => '0',
                'fecha_eliminado' => '',
            ],
        ];
        $this->db->table('usuarios')->insertBatch($data);
    }
}
