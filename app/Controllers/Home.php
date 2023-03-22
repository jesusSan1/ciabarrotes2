<?php

namespace App\Controllers;

use App\Models\Usuarios;

class Home extends BaseController
{
    public function index()
    {
        $usuarios = new Usuarios;
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        helper('form');
        if ($session->get('login')) {
            return redirect()->to('dashboard');
        }
        if ($request->getMethod() === 'post') {
            $usuario = $request->getPost('usuario-correo');
            $password = $request->getPost('password');
            $existeUsuario = $usuarios->where('usuario', $usuario)->orWhere('correo', $usuario)->first();
            if ($existeUsuario) {
                $cont = $existeUsuario['password'];
                $habilitado = $existeUsuario['habilitado'];
                if (password_verify($password, $cont)) {
                    if ($habilitado) {
                        $sess_data = [
                            'login' => true,
                            'nombre' => $existeUsuario['nombre'],
                            'usuario' => $existeUsuario['usuario'],
                            'correo' => $existeUsuario['correo'],
                            'rol_id' => $existeUsuario['rol_id'],
                        ];
                        $session->set($sess_data);
                        return redirect()->to('dashboard');
                    } else {
                        echo 'El usuario no puede entrar al sistema';
                    }
                } else {
                    echo 'Usuario y/o contraseña incorrectas';
                }
            } else {
                echo 'Usuario y/o contraseña incorrectas';
            }
        }
        return view('login/layout', ['view' => 'login/login']);
    }
}
