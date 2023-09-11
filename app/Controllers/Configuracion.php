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
        return view('configuracion/configuracion', [
            'configuraciones' => $this->configuracion->findAll(),
        ]);
    }
    public function configurar()
    {
        $data = [
            'nombre_empresa' => $this->security->sanitizeFilename(trim($this->request->getPost('nombre'))),
            'direccion' => $this->security->sanitizeFilename(trim($this->request->getPost('direccion'))),
            'telefono' => $this->security->sanitizeFilename(trim($this->request->getPost('telefono'))),
            'correo_electronico' => $this->security->sanitizeFilename(trim($this->request->getPost('correo'))),
        ];
        $this->configuracion->where('id', 1)->set($data)->update();
        $this->bitacora->insert(['accion' => 'informacion de configuracion actualizada', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
        return redirect()->to('dashboard');
    }
}
