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
        return view('dashboard', [
            'view' => 'categorias/index',
        ]);
    }
}
