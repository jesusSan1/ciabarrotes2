<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\Usuarios;

class Dashboard extends BaseController
{
    public function index()
    {
        $categoria = new CategoriaModel;
        $usuarios = new Usuarios;
        $data['view'] = 'modulos';
        $data['categorias'] = $categoria->where('id !=', 1)->selectCount('nombre')->first();
        $data['usuarios'] = $usuarios->where('rol_id !=', 1)->selectCount('nombre')->first();
        return view('dashboard', $data);
    }
    public function salir()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');
    }
}