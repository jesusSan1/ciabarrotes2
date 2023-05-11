<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuarios;

class Empleados extends BaseController
{
    protected $usuarios;
    protected $request;

    public function __construct()
    {
        $this->usuarios = new Usuarios;
        $this->request = \Config\Services::request();
    }

    public function index()
    {
        helper('form');
        if ($this->request->getMethod() === 'post') {
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
                'puesto' => [
                    'label' => 'puesto',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'usuario' => [
                    'label' => 'usuario',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'password' => [
                    'label' => 'contraseña',
                    'rules' => 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]',
                    'errors' => [
                        'required' => 'La {field} debe ser llenada',
                        'regex_match' => 'La {field} debe tener 8 caracteres minimos, una letra mayuscula, una letra minuscula, un numero y un caracter especial',
                    ],
                ],
                'estatus' => [
                    'label' => 'estatus',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'email' => [
                    'label' => 'correo electronico',
                    'rules' => 'valid_email',
                    'errors' => [
                        'valid_email' => 'El {field} debe ser un {field} valido',
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
                    'view' => 'empleados/empleados',
                    'errors' => \Config\Services::validation()->listErrors(),
                ]);
            }
            $data = [
                'nombre' => filter_var($this->request->getPost('nombre'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
                'apepat' => filter_var($this->request->getPost('apellido'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
                'telefono' => filter_var($this->request->getPost('telefono'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
                'rol_id' => filter_var(intval($this->request->getPost('puesto')), FILTER_SANITIZE_NUMBER_INT),
                'genero' => filter_var($this->request->getPost('sexo'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
                'usuario' => filter_var($this->request->getPost('usuario'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'correo' => filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL),
                'habilitado' => filter_var(intval($this->request->getPost('estatus')), FILTER_SANITIZE_NUMBER_INT),
                'foto_perfil' => $this->request->getPost('img'),
                'fecha_creacion' => date('Y-m-d'),
                'eliminado' => 0,
            ];
            if ($this->usuarios->insert($data)) {
                return view('dashboard', [
                    'view' => 'empleados/empleados',
                    'exito' => 'Se ha guardado el empleado con exito',
                    'empleados' => $this->usuarios->where('rol_id !=', 1)->where('eliminado !=', 1)->findAll(),
                ]);
            }
        }
        return view('dashboard', [
            'view' => 'empleados/empleados',
            'empleados' => $this->usuarios->where('rol_id !=', 1)->where('eliminado !=', 1)->findAll(),
        ]);
    }

    public function accesoEmpleado()
    {
        $id = $this->request->getPost('id');
        $usuarioHabilitado = $this->request->getPost('habilitado');
        $this->usuarios->where('id', $id)->set(['habilitado' => $usuarioHabilitado])->update();
    }
    public function eliminarEmpleado()
    {
        $id = $this->request->getPost('id');
        $this->usuarios->where('id', $id)->set(['eliminado' => 1, 'fecha_eliminado' => date('Y-m-d'), 'habilitado' => 0])->update();
    }
    public function editarEmpleado()
    {
        $id = $this->request->getPost('id');
        return view('dashboard', [
            'view' => 'empleados/editarEmpleado',
            'datosEmpleado' => $this->usuarios->where('id', $id)->find(),
        ]);
    }
    public function updateEmpleado()
    {
        $id = $this->request->getPost('id');
        $usuario = $this->usuarios->where('id', $id)->first();
        $data = [
            'nombre' => filter_var($this->request->getPost('nombre'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'apepat' => filter_var($this->request->getPost('apellido'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'telefono' => filter_var($this->request->getPost('telefono'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'rol_id' => filter_var(intval($this->request->getPost('puesto')), FILTER_SANITIZE_NUMBER_INT),
            'genero' => filter_var($this->request->getPost('sexo'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'usuario' => filter_var($this->request->getPost('usuario'), FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW),
            'password' => (empty($this->request->getPost('password')) ? $usuario['password'] : password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)),
            'correo' => filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL),
            'habilitado' => filter_var(intval($this->request->getPost('estatus')), FILTER_SANITIZE_NUMBER_INT),
            'foto_perfil' => $this->request->getPost('img'),
            'fecha_creacion' => date('Y-m-d'),
            'eliminado' => 0,
        ];
        if ($this->usuarios->where('id', $id)->set($data)->update()) {
            return redirect()->to('empleados');
        }
        ;
    }
}
