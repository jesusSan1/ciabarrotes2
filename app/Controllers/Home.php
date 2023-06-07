<?php

namespace App\Controllers;

use App\Models\BitacoraModel;
use App\Models\Usuarios;

class Home extends BaseController
{
    public function index()
    {
        $usuarios = new Usuarios;
        $bitacora = new BitacoraModel;
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        helper('form');
        if ($session->get('login')) {
            return redirect()->to('dashboard');
        }
        if ($request->getMethod() === 'post') {
            $rules = [
                'usuario-correo' => [
                    'label' => 'usuario o correo electronico',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'password' => [
                    'label' => 'contraseña',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'La {field} debe ser llenada',
                    ],
                ],
            ];
            if (!$this->validate($rules)) {
                return view('login/layout', [
                    'view' => 'login/login',
                    'errors' => \Config\Services::validation()->listErrors(),
                ]);
            }
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
                            'id' => $existeUsuario['id'],
                            'nombre' => $existeUsuario['nombre'],
                            'usuario' => $existeUsuario['usuario'],
                            'correo' => $existeUsuario['correo'],
                            'rol_id' => $existeUsuario['rol_id'],
                        ];
                        $session->set($sess_data);
                        $bitacora->insert(['accion' => 'Usuario inicio sesion', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                        return redirect()->to('dashboard');
                    } else {
                        return view('login/layout', [
                            'view' => 'login/login',
                            'errors' => 'El usuario no puede ingresar al sistema',
                        ]);
                    }
                } else {
                    return view('login/layout', [
                        'view' => 'login/login',
                        'errors' => 'Usuario y/o contraseña incorrectas',
                    ]);
                }
            } else {
                return view('login/layout', [
                    'view' => 'login/login',
                    'errors' => 'Usuario y/o contraseña incorrectas',
                ]);
            }
        }
        return view('login/layout', ['view' => 'login/login']);
    }
}
