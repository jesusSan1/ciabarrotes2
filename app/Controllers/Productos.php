<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BitacoraModel;
use App\Models\CategoriaModel;
use App\Models\ProductosModel;
use App\Models\ProveedorModel;
use CodeIgniter\Files\File;

class Productos extends BaseController
{
    protected $request;
    protected $bitacora;
    protected $productos;
    protected $proveedor;
    protected $categoria;
    protected $db;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->db = \Config\Database::connect();
        $this->bitacora = new BitacoraModel;
        $this->productos = new ProductosModel;
        $this->proveedor = new ProveedorModel;
        $this->categoria = new CategoriaModel;
    }

    public function index()
    {
        helper('form');
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nombre' => [
                    'label' => 'nombre del producto',
                    'rules' => 'required',
                    'error' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'fecha-caducidad' => [
                    'label' => 'fecha de caducidad',
                    'rules' => 'required|valid_date[Y-m-d]',
                    'errors' => [
                        'required' => 'La {field} debe ser llenada',
                        'valid_date' => 'La {field} debe estar en formato de fecha',
                    ],
                ],
                'existencia' => [
                    'label' => 'existencia',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'La {field} debe ser llenada',
                        'numeric' => 'La {field} debe ser llenada con numeros',
                    ],
                ],
                'existencia-minima' => [
                    'label' => 'existencia minima',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'La {field} debe ser llenada',
                        'numeric' => 'La {field} debe ser llenada con numeros',
                    ],
                ],
                'precio-compra' => [
                    'label' => 'precio de compra',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'El {field} debe ser llenada',
                        'numeric' => 'El {field} debe ser llenada con numeros',
                    ],
                ],
                'precio-venta' => [
                    'label' => 'precio de venta',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'El {field} debe ser llenada',
                        'numeric' => 'El {field} debe ser llenada con numeros',
                    ],
                ],
                'userfile' => [
                    'label' => 'Imagen del producto',
                    'rules' => [
                        'uploaded[userfile]',
                        'is_image[userfile]',
                        'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ],
                    'errors' => [
                        'is_image' => 'La {field} debe ser en formato de imagen',
                    ],
                ],
            ];
            if (!$this->validate($rules)) {
                return view('dashboard', [
                    'view' => 'productos/index',
                    'categorias' => $this->categoria->where('eliminado !=', 1)->findAll(),
                    'proveedores' => $this->proveedor->where('eliminado !=', 1)->findAll(),
                    'errors' => \Config\Services::validation()->listErrors(),
                ]);
            }

            //Subir imagen
            $img = $this->request->getFile('userfile');
            if ($img->isValid() && !$img->hasMoved()) {
                $imageName = $img->getRandomName();
                $img->move(WRITEPATH . 'uploads/' . $imageName);
                $this->productos->insert($this->datos(WRITEPATH . 'uploads/' . $imageName));
                $this->bitacora->insert(['accion' => 'Nuevo producto agregado', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                $this->exito();
            } else {
                $this->productos->insert($this->datos(''));
                $this->bitacora->insert(['accion' => 'Nuevo producto agregado', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                $this->exito();
            }
        }
        return view('dashboard', [
            'view' => 'productos/index',
            'categorias' => $this->categoria->where('eliminado !=', 1)->findAll(),
            'proveedores' => $this->proveedor->where('eliminado !=', 1)->findAll(),
        ]);
    }
    protected function exito()
    {
        return view('dashboard', [
            'view' => 'productos/index',
            'categorias' => $this->categoria->where('eliminado !=', 1)->findAll(),
            'proveedores' => $this->proveedor->where('eliminado !=', 1)->findAll(),
            'exito' => 'Producto guardado con exito',
        ]);

    }
    protected function datos($ruta)
    {
        return $data = [
            'codigo_barras' => $this->request->getPost('codigo-barras'),
            'sku' => $this->request->getPost('sku'),
            'nombre' => $this->request->getPost('nombre'),
            'fecha_caducidad' => $this->request->getPost('fecha-caducidad'),
            'existencia' => $this->request->getPost('existencia'),
            'existencia_minima' => $this->request->getPost('existencia-minima'),
            'presentacion' => $this->request->getPost('presentacion'),
            'precio_compra' => $this->request->getPost('precio-compra'),
            'precio_venta' => $this->request->getPost('precio-venta'),
            'precio_venta_mayoreo' => $this->request->getPost('precio-venta-mayoreo'),
            'descuento_venta' => $this->request->getPost('descuento-venta'),
            'marca' => $this->request->getPost('marca'),
            'modelo' => $this->request->getPost('modelo'),
            'proveedor_id' => $this->request->getPost('proveedor'),
            'categoria_id' => $this->request->getPost('categoria'),
            'imagen' => $ruta,
            'creado_por' => session()->get('id'),
            'fecha_creacion' => date('Y-m-d'),
        ];
    }
}
