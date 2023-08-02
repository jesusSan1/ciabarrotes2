<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProveedorModel;

class Proveedores extends BaseController
{
    protected $proveedor;
    protected $request;
    protected $db;

    public function __construct()
    {
        $this->proveedor = new ProveedorModel;
        $this->request = \Config\Services::request();
        $this->db = \Config\Database::connect();
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
                'telefono' => [
                    'label' => 'telefono',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                        'numeric' => 'El {field} debe ser un numero telefonico',
                    ],
                ],
                'correo' => [
                    'label' => 'correo electronico',
                    'rules' => 'valid_email',
                    'errors' => [
                        'valid_email' => 'El {field} debe ser un {field} valido',
                    ],
                ],
            ];
            if (!$this->validate($rules)) {
                return view('dashboard', [
                    'view' => 'proveedor/index',
                    'errors' => \Config\Services::validation()->listErrors(),
                    'datos' => $this->listaProveedores(),
                ]);
            }
            $data = [
                'nombre' => $this->security->sanitizeFilename($this->request->getPost('nombre')),
                'direccion' => $this->security->sanitizeFilename($this->request->getPost('direccion')),
                'telefono' => $this->security->sanitizeFilename($this->request->getPost('telefono')),
                'correo' => $this->security->sanitizeFilename($this->request->getPost('correo')),
                'fecha_creacion' => date('Y-m-d'),
                'creado_por' => session()->get('id'),
                'eliminado' => 0,
            ];
            if ($this->proveedor->insert($data)) {
                $this->bitacora->insert(['accion' => 'creado nuevo proveedor', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                return view('dashboard', [
                    'view' => 'proveedor/index',
                    'exito' => 'Se ha guardado el empleado con exito',
                    'datos' => $this->listaProveedores(),
                ]);
            }
        }
        return view('dashboard', [
            'view' => 'proveedor/index',
            'datos' => $this->listaProveedores(),
        ]);
    }
    public function eliminarProveedor()
    {
        $id = $this->request->getPost('id');
        $this->proveedor->where('id', $id)->set(['eliminado' => 1, 'fecha_eliminado' => date('Y-m-d')])->update();
        $this->bitacora->insert(['accion' => 'Eliminado proveedor', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
    }
    public function editarProveedor()
    {
        helper('form');
        $id = $this->request->getPost('id');
        return view('dashboard', [
            'view' => 'proveedor/editarProveedor',
            'datos' => $this->proveedor->where('id', $id)->find(),
        ]);
    }
    public function updateProveedor()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nombre' => $this->security->sanitizeFilename($this->request->getPost('nombre')),
            'direccion' => $this->security->sanitizeFilename($this->request->getPost('direccion')),
            'telefono' => $this->security->sanitizeFilename($this->request->getPost('telefono')),
            'correo' => $this->security->sanitizeFilename($this->request->getPost('correo')),
        ];
        if ($this->proveedor->where('id', $id)->set($data)->update()) {
            $this->bitacora->insert(['accion' => 'Informacion de proveedor actualizada', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
            return view('dashboard', [
                'view' => 'proveedor/editarProveedor',
                'datos' => $this->proveedor->where('id', $id)->find(),
                'exito' => 'Datos actualizados correctamente',
            ]);
        }
        ;
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