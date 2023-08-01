<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;

class Categorias extends BaseController
{
    protected $categoria;
    protected $request;
    protected $db;

    public function __construct()
    {
        $this->categoria = new CategoriaModel;
        $this->request = \Config\Services::request();
        $this->db = \Config\Database::connect();

    }

    public function index()
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'categoria' => [
                    'label' => 'categoria',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'La {field} debe ser llenada',
                    ],
                ],
            ];
            if (!$this->validate($rules)) {
                return view('dashboard', [
                    'view' => 'categorias/index',
                    'errors' => \Config\Services::validation()->listErrors(),
                    'datos' => $this->listaCategorias(),
                ]);
            }
            $data = [
                'nombre' => $this->security->sanitizeFilename($this->request->getPost('categoria')),
                'fecha_creacion' => date('Y-m-d'),
                'creado_por' => session()->get('id'),
                'eliminado' => 0,
            ];
            if ($this->categoria->insert($data)) {
                $this->bitacora->insert(['accion' => 'Nueva categoria creada', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                return view('dashboard', [
                    'view' => 'categorias/index',
                    'exito' => 'Categoria guardada con exito',
                    'datos' => $this->listaCategorias(),
                ]);
            }
        }
        return view('dashboard', [
            'view' => 'categorias/index',
            'datos' => $this->listaCategorias(),
        ]);
    }
    public function eliminarCategoria()
    {
        $id = $this->request->getPost('id');
        $this->categoria->where('id', $id)->set(['eliminado' => 1, 'fecha_eliminado' => date('Y-m-d')])->update();
        $this->bitacora->insert(['accion' => 'Categoria eliminada', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);

    }
    public function editarCategoria()
    {
        $id = $this->request->getPost('id');
        $valor = $this->security->sanitizeFilename($this->request->getPost('valor'));
        $this->categoria->where('id', $id)->set(['nombre' => $valor])->update();
        $this->bitacora->insert(['accion' => 'Cambio de nombre en categoria', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);

    }
    protected function listaCategorias()
    {
        $builder = $this->db->table('categoria as c');
        $builder->select('c.id, c.nombre, c.fecha_creacion, c.creado_por, u.nombre as creado_por');
        $builder->join('usuarios as u', 'c.creado_por = u.id');
        $builder->where('c.eliminado !=', 1);
        $builder->where('c.id !=', 1);
        return $builder->get();
    }
}