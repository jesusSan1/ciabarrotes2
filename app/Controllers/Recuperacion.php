<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Recuperacion extends BaseController
{
    public function index()
    {
        return view('login/layout', [
            'view' => 'login/recuperacion',
        ]);
    }
}
