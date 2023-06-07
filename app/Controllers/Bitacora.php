<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BitacoraModel;

class Bitacora extends BaseController
{
    public function index()
    {
        $bitacora = new BitacoraModel;
        return view('dashboard', [
            'view' => 'bitacora/index',
            'datos' => $this->bitacora(),
        ]);
    }
    protected function bitacora()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bitacora as b');
        $builder->select('b.id, b.accion, b.fecha, u.nombre ');
        $builder->join('usuarios as u', 'b.id_usuario = u.id');
        $builder->orderBy('b.id', 'asc');
        return $builder->get()->getResult();
    }
}
