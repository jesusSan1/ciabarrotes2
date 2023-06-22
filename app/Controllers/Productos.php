<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Productos extends BaseController
{
    public function index()
    {
        return view('dashboard', [
            'view' => 'productos/index'
        ]);
    }
}