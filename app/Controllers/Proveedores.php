<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BitacoraModel;
use App\Models\ProveedorModel;

class Proveedores extends BaseController
{
    protected $proveedor;
    protected $bitacora;
    protected $request;
    protected $db;

    public function __construct()
    {
        $this->proveedor = new ProveedorModel;
        $this->bitacora = new BitacoraModel;
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
                ]);
            }
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'direccion' => $this->request->getPost('direccion'),
                'telefono' => $this->request->getPost('telefono'),
                'correo' => $this->request->getPost('correo'),
                'fecha_creacion' => date('Y-m-d'),
                'creado_por' => session()->get('id'),
            ];
            if ($this->proveedor->insert($data)) {
                $this->bitacora->insert(['accion' => 'creado nuevo proveedor', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                return view('dashboard', [
                    'view' => 'proveedor/index',
                    'exito' => 'Se ha guardado el empleado con exito',
                ]);
            }
        }
        return view('dashboard', [
            'view' => 'proveedor/index',
        ]);
    }
}
