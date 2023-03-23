<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuarios;

class Recuperacion extends BaseController {
    protected $usuarios;
    protected $request;
    protected $email;
    protected $session;

    public function __construct() {
        $this->usuarios = new Usuarios;
        $this->request = \Config\Services::request();
        $this->email = \Config\Services::email();
        $this->session = \Config\Services::session();
        helper(['form', 'text']);
    }
    public function index() {
        if ($this->session->get('login')) {
            return redirect()->to('dashboard');
        }
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'correo' => [
                    'label' => 'correo electronico',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                        'valid_email' => 'Debe tener formato de {field}',
                    ],
                ],
            ];
            if (!$this->validate($rules)) {
                return view('login/layout', [
                    'view' => 'login/recuperacion',
                    'errors' => \Config\Services::validation()->listErrors(),
                ]);
            }
            $correo = $this->request->getPost('correo');
            $existeCorreo = $this->usuarios->where('correo', $correo)->first();
            if ($existeCorreo) {
                $token = random_string('nozero', 6);
                echo "Tu token es $token";
            } else {
                return view('login/layout', [
                    'view' => 'login/recuperacion',
                    'errors' => 'El correo electronico no se encuentra',
                ]);
            }
        }
        return view('login/layout', [
            'view' => 'login/recuperacion',
        ]);
    }
    protected function enviarEmail(string $email = 'example@example.com', string $token = '000000') {

        $email->setFrom('jjsanru3@gmail.com', 'Soporte tecnico');
        $email->setTo($email);

        $email->setSubject('Recuperacion de contraseña');
        $email->setMessage("Hola $email: <br> Hemos recibido tu solicitud de recuperacion de contraseña.<br> Tu codigo de recuperacion es: $token <br> Si no solicitaste este codigo, puedes hacer caso omiso de este mensaje de correo electronico. Otra persona puede haber escrito tu direccion de correo electronico por error. <br> Gracias.");

        $email->send();
    }
}