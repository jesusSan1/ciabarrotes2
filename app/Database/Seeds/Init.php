<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Init extends Seeder
{
    public function run()
    {
        $this->call('Roles');
        $this->call('Usuarios');
        $this->call('Configuracion');
        $this->call('Presentacion');
        $this->call('Proveedor');
        $this->call('Categoria');
    }
}
