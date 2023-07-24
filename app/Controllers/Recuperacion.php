<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuarios;

class Recuperacion extends BaseController
{
    protected $usuarios;
    protected $request;
    protected $email;
    protected $session;

    public function __construct()
    {
        $this->usuarios = new Usuarios;
        $this->request = \Config\Services::request();
        $this->email = \Config\Services::email();
        $this->session = \Config\Services::session();
        helper(['form', 'text']);
    }
    public function index()
    {
        if ($this->session->get('login')) {
            return redirect()->to('dashboard');
        }
        if ($this->request->is('post')) {
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
                return view('login/recuperacion', [
                    'errors' => \Config\Services::validation()->listErrors(),
                ]);
            }
            $correo = $this->request->getPost('correo');
            $existeCorreo = $this->usuarios->where('correo', $correo)->first();
            if ($existeCorreo) {
                $usuarioHabilitado = $existeCorreo['habilitado'];
                $usuarioEliminado = $existeCorreo['eliminado'];
                if ($usuarioHabilitado == 0 || $usuarioEliminado == 1) {
                    return view('login/recuperacion', [
                        'errors' => 'No tienes permitido recuperar la contraseña',
                    ]);
                } else {
                    $token = random_string('nozero', 6);
                    $this->usuarios->where('correo', $existeCorreo['correo'])->set(['token' => $token])->update();
                    $this->enviarEmail($existeCorreo['correo'], $token);
                    $sess_data = [
                        'correoExistente' => true,
                        'correo' => $existeCorreo['correo'],
                    ];
                    $this->session->set($sess_data);
                    return redirect()->to('verificar-token');
                }
            } else {
                return view('login/recuperacion', [
                    'errors' => 'El correo electronico no se encuentra',
                ]);
            }
        }
        return view('login/recuperacion');
    }
    protected function enviarEmail(string $email = 'example@example.com', string $token = '000000')
    {

        $this->email->setFrom('jjsanru3@gmail.com', 'Soporte tecnico');
        $this->email->setTo($email);

        $this->email->setSubject('Recuperacion de contraseña');
        $this->email->setMessage("Hola $email: <br><br> Hemos recibido tu solicitud de recuperacion de contraseña.<br><br> Tu codigo de recuperacion es: $token <br><br> Si no solicitaste este codigo, puedes hacer caso omiso de este mensaje de correo electronico. Otra persona puede haber escrito tu direccion de correo electronico por error. <br><br> Gracias.");

        $this->email->send();
    }

    public function verificarToken()
    {
        if ($this->request->is('post')) {
            $rules = [
                'token' => [
                    'label' => 'token',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
            ];
            if (!$this->validate($rules)) {
                return view('login/verificarToken', [
                    'errors' => \Config\Services::validation()->listErrors(),
                ]);
            }
            $token = $this->request->getPost('token');
            [$n1, $n2, $n3, $n4, $n5, $n6] = $token;
            $tokenCreado = $n1 . $n2 . $n3 . $n4 . $n5 . $n6;
            $tokenGuardado = $this->usuarios->where('correo', $this->session->get('correo'))->first();
            if ($tokenCreado === $tokenGuardado['token']) {
                return redirect()->to('crear-password');
            } else {
                return view('login/verificarToken', [
                    'errors' => 'El token no coincide',
                ]);
            }
        }
        return view('login/verificarToken');
    }
    public function crearPassword()
    {
        if ($this->request->is('post')) {
            $rules = [
                'password' => [
                    'label' => 'contraseña',
                    'rules' => 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]',
                    'errors' => [
                        'required' => 'La {field} debe ser llenada',
                        'regex_match' => 'La {field} debe tener 8 caracteres minimos, una letra mayuscula, una letra minuscula, un numero y un caracter especial',
                    ],
                ],
            ];
            if (!$this->validate($rules)) {
                return view('login/crearPassword', [
                    'errors' => \Config\Services::validation()->listErrors(),
                ]);
            }
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $this->usuarios->where('correo', $this->session->get('correo'))->set(['password' => $password])->update();
            $this->session->destroy();
            return redirect()->to('/');
        }
        return view('login/crearPassword');
    }
}
