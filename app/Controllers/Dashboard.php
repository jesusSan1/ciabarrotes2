<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\ProveedorModel;
use App\Models\Usuarios;

class Dashboard extends BaseController
{
    public function index()
    {
        $categoria = new CategoriaModel;
        $usuarios = new Usuarios;
        $proveedores = new ProveedorModel;
        $data['view'] = 'modulos';
        $data['categorias'] = $categoria->where('id !=', 1)->selectCount('id')->first();
        $data['usuarios'] = $usuarios->where('rol_id !=', 1)->selectCount('id')->first();
        $data['proveedores'] = $proveedores->selectCount('id')->first();
        return view('dashboard', $data);
    }
    public function salir()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');
    }
}
