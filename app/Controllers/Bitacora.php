<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Bitacora extends BaseController
{
    public function index()
    {
        return view('dashboard', [
            'view' => 'bitacora/index',
        ]);
    }
}
