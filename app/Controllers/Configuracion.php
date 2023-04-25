<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;

class Configuracion extends BaseController
{
    protected $configuracion;

    public function __construct()
    {
        $this->configuracion = new ConfiguracionModel;
    }

    public function index()
    {
        return view('dashboard', [
            'view' => 'configuracion/configuracion',
            'datos' => $this->configuracion->findAll(),
            'configuraciones' => $this->configuracion->findAll(),
        ]);
    }
    public function configurar()
    {
        $request = \Config\Services::request();
        $data = [
            'nombre_empresa' => filter_var($request->getPost('nombre'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'direccion' => filter_var($request->getPost('direccion'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'telefono' => filter_var($request->getPost('telefono'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'correo_electronico' => filter_var($request->getPost('correo'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
        ];
        $this->configuracion->where('id', 1)->set($data)->update();
        return redirect()->to('dashboard');
    }
}
