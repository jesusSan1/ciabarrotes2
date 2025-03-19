<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProveedorModel;

class Proveedores extends BaseController
{
    protected $proveedor;
    protected $db;

    public function __construct()
    {
        $this->proveedor = model(ProveedorModel::class);
        $this->db        = \Config\Database::connect();
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
                'telefono' => [
                    'label'  => 'telefono',
                    'rules'  => 'required|numeric|permit_empty',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                        'numeric'  => 'El {field} debe ser un numero telefonico',
                    ],
                ],
                'correo'   => [
                    'label'  => 'correo electronico',
                    'rules'  => 'valid_email|permit_empty',
                    'errors' => [
                        'valid_email' => 'El {field} debe ser un {field} valido',
                    ],
                ],
            ];
            if (! $this->validate($rules)) {
                return redirect()->back()->with('errors', $this->validation->listErrors())->withInput();
            }
            $data = [
                'nombre'         => $this->security->sanitizeFilename(trim($this->request->getPost('nombre'))),
                'direccion'      => $this->security->sanitizeFilename(trim($this->request->getPost('direccion'))),
                'telefono'       => $this->security->sanitizeFilename(trim($this->request->getPost('telefono'))),
                'correo'         => $this->security->sanitizeFilename(trim($this->request->getPost('correo'))),
                'fecha_creacion' => date('Y-m-d'),
                'creado_por'     => session()->get('id'),
                'eliminado'      => 0,
            ];
            if ($this->proveedor->insert($data)) {
                $this->bitacora->insert(['accion' => 'creado nuevo proveedor', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                return redirect()->back()->with('exito', 'Se ha guardado el proveedor con exito');
            }
        }
        return view('proveedor/index', [
            'datos' => $this->listaProveedores(),
        ]);
    }
    public function eliminarProveedor()
    {
        $id = $this->request->getPost('id');
        $this->proveedor->where('id', $id)->set(['eliminado' => 1, 'fecha_eliminado' => date('Y-m-d')])->update();
        $this->bitacora->insert(['accion' => 'Eliminado proveedor', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
        return redirect()->back()->with('exito', 'El elemento ha sido eliminado correctamente');
    }
    public function editarProveedor(int $id)
    {
        return view('proveedor/editarProveedor', [
            'datos' => $this->proveedor->where('id', $id)->find(),
        ]);
    }
    public function updateProveedor()
    {
        $id    = $this->request->getPost('id');
        $rules = [
            'nombre'   => [
                'label'  => 'nombre',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'El {field} debe ser llenado',
                ],
            ],
            'telefono' => [
                'label'  => 'telefono',
                'rules'  => 'required|numeric',
                'errors' => [
                    'required' => 'El {field} debe ser llenado',
                    'numeric'  => 'El {field} debe ser un numero telefonico',
                ],
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validation->listErrors())->withInput();
        }
        $data = [
            'nombre'    => $this->security->sanitizeFilename(trim($this->request->getPost('nombre'))),
            'direccion' => $this->security->sanitizeFilename(trim($this->request->getPost('direccion'))),
            'telefono'  => $this->security->sanitizeFilename(trim($this->request->getPost('telefono'))),
            'correo'    => $this->security->sanitizeFilename(trim($this->request->getPost('correo'))),
        ];
        if ($this->proveedor->where('id', $id)->set($data)->update()) {
            $this->bitacora->insert(['accion' => 'Informacion de proveedor actualizada', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
            return redirect()->back()->with('exito', 'Los datos has sido actualizados con exito')->withInput();
        }
    }
    protected function listaProveedores()
    {
        $builder = $this->db->table('proveedor as p');
        $builder->select('p.id, p.nombre, p.direccion, p.telefono, p.correo, p.fecha_creacion, p.creado_por, u.nombre as creado_por');
        $builder->join('usuarios as u', 'p.creado_por = u.id');
        $builder->where('p.eliminado !=', 1);
        $builder->where('p.id !=', 1);
        return $builder->get()->getResult();
    }
}
