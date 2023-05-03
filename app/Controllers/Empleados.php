<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuarios;

class Empleados extends BaseController
{
    public function index()
    {
        return view('dashboard', [
            'view' => 'empleados/empleados',
        ]);
    }
    public function crearEmpleado()
    {
        $usuarios = new Usuarios;
        $request = \Config\Services::request();
        $data = [
            'nombre' => filter_var($request->getPost('nombre'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'apepat' => filter_var($request->getPost('apellido'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'telefono' => filter_var($request->getPost('telefono'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'rol_id' => filter_var(intval($request->getPost('puesto')), FILTER_SANITIZE_NUMBER_INT),
            'genero' => filter_var($request->getPost('sexo'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'usuario' => filter_var($request->getPost('usuario'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
            'correo' => filter_var($request->getPost('email'), FILTER_SANITIZE_EMAIL),
            'habilitado' => filter_var(intval($request->getPost('estatus')), FILTER_SANITIZE_NUMBER_INT),
            'foto_perfil' => $request->getPost('img'),
            'fecha_creacion' => date('Y-m-d'),
        ];
        $usuarios->insert($data);
    }
}
