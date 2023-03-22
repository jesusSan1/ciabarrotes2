<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }
    public function salir()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');
    }
}
