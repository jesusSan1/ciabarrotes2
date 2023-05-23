<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;

class Categorias extends BaseController
{
    protected $categoria;
    protected $request;

    public function __construct()
    {
        $this->categoria = new CategoriaModel;
        $this->request = \Config\Services::request();
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
                ]);
            }
            $data = [
                'nombre' => $this->request->getPost('categoria'),
            ];
            if ($this->categoria->insert($data)) {
                return view('dashboard', [
                    'view' => 'categorias/index',
                    'exito' => 'Categoria guardada con exito',
                ]);
            }
        }
        return view('dashboard', [
            'view' => 'categorias/index',
        ]);
    }
}
