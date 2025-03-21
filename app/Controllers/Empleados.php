<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuarios;

class Empleados extends BaseController
{
    protected $usuarios;

    public function __construct()
    {
        $this->usuarios = model(Usuarios::class);
    }

    public function index()
    {
        if ($this->request->is('post')) {
            $rules = [
                'nombre'   => [
                    'label'  => 'nombre',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'apellido' => [
                    'label'  => 'apellido paterno',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'puesto'   => [
                    'label'  => 'puesto',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'usuario'  => [
                    'label'  => 'usuario',
                    'rules'  => 'required|is_unique[usuarios.usuario]',
                    'errors' => [
                        'required'  => 'El {field} debe ser llenado',
                        'is_unique' => 'El {field} ya está ocupado',
                    ],
                ],
                'password' => [
                    'label'  => 'contraseña',
                    'rules'  => 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]',
                    'errors' => [
                        'required'    => 'La {field} debe ser llenada',
                        'regex_match' => 'La {field} debe tener 8 caracteres minimos, una letra mayuscula, una letra minuscula, un numero y un caracter especial',
                    ],
                ],
                'estatus'  => [
                    'label'  => 'estatus',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'email'    => [
                    'label'  => 'correo electronico',
                    'rules'  => 'valid_email|is_unique[usuarios.correo]',
                    'errors' => [
                        'valid_email' => 'El {field} debe ser un {field} valido',
                        'is_unique'   => 'El {field} ya está ocupado',
                    ],
                ],
                'telefono' => [
                    'label'  => 'telefono',
                    'rules'  => 'numeric',
                    'errors' => [
                        'numeric' => 'El {field} debe ser llenado con numeros',
                    ],
                ],
            ];
            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validation->listErrors())->with('list', $this->validation->getErrors());

            }
            $data = [
                'nombre'         => $this->security->sanitizeFilename(trim($this->request->getPost('nombre'))),
                'apepat'         => $this->security->sanitizeFilename(trim($this->request->getPost('apellido'))),
                'telefono'       => $this->security->sanitizeFilename(trim($this->request->getPost('telefono'))),
                'rol_id'         => filter_var(intval($this->request->getPost('puesto')), FILTER_SANITIZE_NUMBER_INT),
                'genero'         => $this->security->sanitizeFilename($this->request->getPost('sexo')),
                'usuario'        => $this->security->sanitizeFilename(trim($this->request->getPost('usuario'))),
                'password'       => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'correo'         => $this->security->sanitizeFilename(trim($this->request->getPost('email'))),
                'habilitado'     => filter_var(intval($this->request->getPost('estatus')), FILTER_SANITIZE_NUMBER_INT),
                'foto_perfil'    => $this->request->getPost('img'),
                'fecha_creacion' => date('Y-m-d'),
                'eliminado'      => 0,
            ];
            if ($this->usuarios->insert($data)) {
                $this->bitacora->insert(['accion' => 'creado nuevo usuario', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                return redirect()->back()->with('exito', 'El empleado ha sido registrado correctamente');
            }
        }
        return view('empleados/empleados', [
            'empleados' => $this->usuarios->where('rol_id !=', 1)->where('eliminado !=', 1)->findAll(),
        ]);
    }

    public function accesoEmpleado()
    {
        $json = $this->request->getJSON(); // Recibe datos en formato JSON

        if (! $json || ! isset($json->id) || ! isset($json->habilitado)) {
            return $this->response->setJSON([
                'error' => 'Datos inválidos',
            ])->setStatusCode(400);
        }

        $id                = $json->id;
        $usuarioHabilitado = $json->habilitado;

        // Actualizar base de datos
        $this->usuarios->where('id', $id)->set(['habilitado' => $usuarioHabilitado])->update();
        $this->bitacora->insert([
            'accion'     => 'Cambio de accesos al usuario',
            'fecha'      => date("Y-m-d H:i:s"),
            'id_usuario' => session()->get('id'),
        ]);

        return $this->response->setJSON([
            'token'   => csrf_hash(),
            'mensaje' => 'Acceso actualizado correctamente',
        ]);
    }

    public function eliminarEmpleado()
    {
        $id = $this->request->getPost('id');
        $this->usuarios->where('id', $id)->set(['eliminado' => 1, 'fecha_eliminado' => date('Y-m-d'), 'habilitado' => 0])->update();
        $this->bitacora->insert(['accion' => 'Eliminacion de usuario', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
        return redirect()->back()->with('exito', 'El elemento ha sido eliminado correctamente');
    }
}