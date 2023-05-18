<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuarios;

class Perfil extends BaseController
{
    public function index()
    {
        $usuarios = new Usuarios;
        return view('dashboard', [
            'view' => 'perfil/index',
            'usuario' => $usuarios->where('id', session()->get('id'))->find(),
        ]);
    }
}
