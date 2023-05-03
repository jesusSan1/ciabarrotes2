<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Empleados extends BaseController
{
    public function index()
    {
        return view('dashboard', [
            'view' => 'empleados/empleados',
        ]);
    }
}
