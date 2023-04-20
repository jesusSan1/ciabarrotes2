<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Configuracion extends BaseController
{
    public function index()
    {
        $data['view'] = 'configuracion/configuracion';
        return view('dashboard', $data);
    }
}