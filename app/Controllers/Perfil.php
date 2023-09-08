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
        if ($this->request->is('post')) {
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
                return view('perfil/index', [
                    'error' => $this->validation->listErrors(),
                    'usuario' => $this->usuarios->where('id', session()->get('id'))->find(),
                ]);
            }
            $id = session()->get('id');
            $usuario = $this->usuarios->where('id', $id)->select('password')->find();
            foreach ($usuario as $s) {
                $data = [
                    'nombre' => $this->security->sanitizeFilename(trim($this->request->getPost('nombre'))),
                    'apepat' => $this->security->sanitizeFilename(trim($this->request->getPost('apellido'))),
                    'telefono' => $this->security->sanitizeFilename(trim($this->request->getPost('telefono'))),
                    'genero' => $this->security->sanitizeFilename($this->request->getPost('sexo')),
                    'usuario' => $this->secirity->sanitizeFilename(trim($this->request->getPost('usuario'))),
                    'correo' => $this->security->sanitizeFilename(trim($this->request->getPost('email'))),
                    'password' => (empty($this->request->getPost('password')) ? $s['password'] : password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)),

                ];
                if ($this->usuarios->where('id', $id)->set($data)->update()) {
                    $this->bitacora->insert(['accion' => 'Cambios de datos en el perfil de usuario', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);

                    return view('perfil/index', [
                        'exito' => 'Datos actualizados correctamente',
                        'usuario' => $this->usuarios->where('id', session()->get('id'))->find(),
                    ]);
                }

            }
        }
        return view('perfil/index', [
            'usuario' => $this->usuarios->where('id', session()->get('id'))->find(),
        ]);
    }
}
