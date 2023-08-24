<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\ConfiguracionModel;
use App\Models\ProductosModel;
use App\Models\ProveedorModel;
use App\Models\Usuarios;

class Dashboard extends BaseController
{
    public function index()
    {
        $categoria = new CategoriaModel;
        $usuarios = new Usuarios;
        $proveedores = new ProveedorModel;
        $productos = new ProductosModel;
        $configuracion = new ConfiguracionModel;
        return view('modulos', [
            'categorias' => $categoria->where('id !=', 1)->where('eliminado !=', 1)->selectCount('id')->first(),
            'usuarios' => $usuarios->where('rol_id !=', 1)->where('eliminado !=', 1)->selectCount('id')->first(),
            'proveedores' => $proveedores->where('id !=', 1)->where('eliminado !=', 1)->selectCount('id')->first(),
            'productos' => $productos->selectCount('id')->first(),
        ]);
    }
    public function salir()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');
    }
}
