<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Proveedores extends BaseController
{
    public function index()
    {
        return view('dashboard', [
            'view' => 'proveedor/index',
        ]);
    }
}
