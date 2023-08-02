<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuarios;

class Perfil extends BaseController
{
    protected $usuarios;

    public function __construct()
    {
        $this->usuarios = new Usuarios;
    }

    public function index()
    {
        helper('form');
        $request = \Config\Services::request();
        if ($request->getMethod() === 'post') {
            $rules = [
                'nombre' => [
                    'label' => 'nombre',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'apellido' => [
                    'label' => 'apellido paterno',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'usuario' => [
                    'label' => 'usuario',
                    'rules' => 'required|is_unique[usuarios.usuario]',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                        'is_unique' => 'El {field} ya está ocupado',
                    ],
                ],
                'email' => [
                    'label' => 'correo electronico',
                    'rules' => 'valid_email|is_unique[usuarios.correo]',
                    'errors' => [
                        'valid_email' => 'El {field} debe ser un {fied} valido',
                        'is_unique' => 'El {field} ya está ocupado',
                    ],
                ],
                'telefono' => [
                    'label' => 'telefono',
                    'rules' => 'numeric',
                    'errors' => [
                        'numeric' => 'El {field} debe ser llenado con numeros',
                    ],
                ],
            ];
            if (!$this->validate($rules)) {
                return view('dashboard', [
                    'view' => 'perfil/index',
                    'error' => \Config\Services::validation()->listErrors(),
                    'usuario' => $this->usuarios->where('id', session()->get('id'))->find(),
                ]);
            }
            $id = session()->get('id');
            $usuario = $this->usuarios->where('id', $id)->select('password')->find();
            foreach ($usuario as $s) {
                $data = [
                    'nombre' => $this->security->sanitizeFilename($request->getPost('nombre')),
                    'apepat' => $this->security->sanitizeFilename($request->getPost('apellido')),
                    'telefono' => $this->security->sanitizeFilename($request->getPost('telefono')),
                    'genero' => $this->security->sanitizeFilename($request->getPost('sexo')),
                    'usuario' => $this->secirity->sanitizeFilename($request->getPost('usuario')),
                    'correo' => $this->security->sanitizeFilename($request->getPost('email')),
                    'password' => (empty($request->getPost('password')) ? $s['password'] : password_hash($request->getPost('password'), PASSWORD_DEFAULT)),

                ];
                if ($this->usuarios->where('id', $id)->set($data)->update()) {
                    $this->bitacora->insert(['accion' => 'Cambios de datos en el perfil de usuario', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);

                    return view('dashboard', [
                        'view' => 'perfil/index',
                        'exito' => 'Datos actualizados correctamente',
                        'usuario' => $this->usuarios->where('id', session()->get('id'))->find(),
                    ]);
                }

            }
        }
        return view('dashboard', [
            'view' => 'perfil/index',
            'usuario' => $this->usuarios->where('id', session()->get('id'))->find(),
        ]);
    }
}
