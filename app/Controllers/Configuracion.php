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
        $data['view'] = 'configuracion/configuracion';
        $data['datos'] = $this->configuracion->findAll();
        $data['configuraciones'] = $this->configuracion->findAll();
        return view('dashboard', $data);
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
