<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\PresentacionModel;
use App\Models\ProductosModel;
use App\Models\ProveedorModel;
use CodeIgniter\Files\File;

class Productos extends BaseController
{
    protected $productos;
    protected $proveedor;
    protected $presentacion;
    protected $categoria;
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->productos = new ProductosModel;
        $this->proveedor = new ProveedorModel;
        $this->presentacion = new PresentacionModel;
        $this->categoria = new CategoriaModel;
    }

    public function index()
    {
        if ($this->request->is('post')) {
            $rules = [
                'nombre' => [
                    'label' => 'nombre del producto',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'tiene-caducidad' => [
                    'label' => 'tiene fecha de caducidad',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} debe ser llenado',
                    ],
                ],
                /* 'fecha-caducidad' => [
                'label' => 'fecha de caducidad',
                'rules' => 'valid_date[Y-m-d]',
                'errors' => [
                'valid_date' => 'La {field} debe estar en formato de fecha',
                ],
                ], */
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
                        'is_image[userfile]',
                        'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ],
                    'errors' => [
                        'is_image' => 'La {field} debe ser en formato de imagen',
                    ],
                ],
            ];
            if (!$this->validate($rules)) {
                return redirect()->back()->with('errors', $this->validation->listErrors())->withInput();
            }
            //Subir imagen
            $img = $this->request->getFile('userfile');
            if ($img->isValid() && !$img->hasMoved()) {
                $imageName = $img->getRandomName();
                $img->move('uploads/', $imageName);
                $this->productos->insert($this->datos($imageName));
                $this->bitacora->insert(['accion' => 'Nuevo producto agregado', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                return redirect()->back()->with('exito', 'Producto guardado con exito');
            } else {
                $this->productos->insert($this->datos(''));
                $this->bitacora->insert(['accion' => 'Nuevo producto agregado', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                return redirect()->back()->with('exito', 'Producto guardado con exito');
            }
        }
        return view('productos/index', [
            'categorias' => $this->categoria->where('eliminado !=', 1)->findAll(),
            'proveedores' => $this->proveedor->where('eliminado !=', 1)->findAll(),
            'productos' => $this->listaProductos(),
            'productosMinimos' => $this->productos->productosExistenciaMinima(),
            'productosCaducados' => $this->productos->productosCaducados(),
            'presentaciones' => $this->presentacion->findAll(),
        ]);
    }
    public function eliminarProducto()
    {
        $id = $this->request->getPost('id');
        $this->productos->where('id', $id)->set(['eliminado' => 1, 'fecha_eliminado' => date('Y-m-d')])->update();
        $this->bitacora->insert(['accion' => 'Eliminacion de producto', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);

    }
    public function editarProducto(int $id)
    {
        return view('productos/editarProducto', [
            'datos' => $this->datosEditar($id),
            'proveedores' => $this->proveedor->findAll(),
            'categorias' => $this->categoria->findAll(),
            'presentaciones' => $this->presentacion->findAll(),
        ]);
    }
    public function updateProducto()
    {
        if ($this->request->is('post')) {
            $rules = [
                'nombre' => [
                    'label' => 'nombre del producto',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El {field} debe ser llenado',
                    ],
                ],
                'tiene-caducidad' => [
                    'label' => 'tiene fecha de caducidad',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} debe ser llenado',
                    ],
                ],
                /* 'fecha-caducidad' => [
                'label' => 'fecha de caducidad',
                'rules' => 'valid_date[Y-m-d]',
                'errors' => [
                'required' => 'La {field} debe ser llenada',
                'valid_date' => 'La {field} debe estar en formato de fecha',
                ],
                ], */
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
                        'is_image[userfile]',
                        'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ],
                    'errors' => [
                        'is_image' => 'La {field} debe ser en formato de imagen',
                    ],
                ],
            ];
            if (!$this->validate($rules)) {
                return redirect()->back()->with('errors', $this->validation->listErrors())->withInput();
            }
            $id = $this->request->getPost('id');
            $imagenOld = $this->productos->where('id', $id)->first();
            $img = $this->request->getFile('userfile');
            if ($img->isValid() && !$img->hasMoved()) {
                $imageName = $img->getRandomName();
                $img->move('uploads/', $imageName);
                if ($imagenOld['imagen'] != '') {
                    unlink('uploads/' . $imagenOld['imagen']);
                }
                $this->productos->where('id', $id)->set($this->datos($imageName))->update();
                $this->bitacora->insert(['accion' => 'Producto editado', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                return redirect()->back()->with('exito', 'Producto editado correctamente')->withInput();
            } else {
                $this->productos->where('id', $id)->set($this->datos(''))->update();
                $this->bitacora->insert(['accion' => 'Producto editado', 'fecha' => date("Y-m-d h:i:s"), 'id_usuario' => session()->get('id')]);
                return redirect()->back()->with('exito', 'Producto editado correctamente')->withInput();
            }
        }

    }
    protected function datosEditar($id)
    {
        $builder = $this->db->table('producto as p');
        $builder->select('p.id ,p.codigo_barras ,p.sku ,p.nombre ,p.fecha_caducidad ,p.existencia ,p.existencia_minima ,p.presentacion ,p.precio_compra ,p.precio_venta ,p.precio_venta_mayoreo ,p.descuento_venta ,p.marca ,p.modelo ,p2.nombre as nombre_proveedor ,c.nombre as nombre_categoria, p.categoria_id, p.proveedor_id, p.tiene_caducidad');
        $builder->join('proveedor as p2', 'p.proveedor_id = p2.id');
        $builder->join('categoria as c', 'p.categoria_id = c.id');
        $builder->where('p.id', $id);
        return $builder->get()->getResult();
    }
    protected function datos($ruta)
    {
        return $data = [
            'codigo_barras' => $this->security->sanitizeFilename($this->request->getPost('codigo-barras')),
            'sku' => $this->security->sanitizeFilename($this->request->getPost('sku')),
            'nombre' => $this->security->sanitizeFilename($this->request->getPost('nombre')),
            'fecha_caducidad' => $this->request->getPost('fecha-caducidad') == null && $this->request->getPost('tiene-caducidad') == '0' ? '0000-00-00' : $this->request->getPost('fecha-caducidad'),
            'existencia' => $this->security->sanitizeFilename($this->request->getPost('existencia')),
            'existencia_minima' => $this->security->sanitizeFilename($this->request->getPost('existencia-minima')),
            'presentacion' => $this->request->getPost('presentacion') !== "" ? $this->security->sanitizeFilename($this->request->getPost('presentacion')) : "Unidad",
            'precio_compra' => $this->security->sanitizeFilename($this->request->getPost('precio-compra')),
            'precio_venta' => $this->security->sanitizeFilename($this->request->getPost('precio-venta')),
            'precio_venta_mayoreo' => $this->security->sanitizeFilename($this->request->getPost('precio-venta-mayoreo')),
            'descuento_venta' => $this->security->sanitizeFilename($this->request->getPost('descuento-venta')),
            'marca' => $this->security->sanitizeFilename($this->request->getPost('marca')),
            'modelo' => $this->security->sanitizeFilename($this->request->getPost('modelo')),
            'proveedor_id' => $this->request->getPost('proveedor') !== "" ? $this->request->getPost('proveedor') : 1,
            'categoria_id' => $this->request->getPost('categoria') !== "" ? $this->request->getPost('categoria') : 1,
            'imagen' => $ruta,
            'creado_por' => session()->get('id'),
            'fecha_creacion' => date('Y-m-d'),
            'tiene_caducidad' => $this->request->getPost('tiene-caducidad'),
        ];
    }
    protected function listaProductos()
    {
        $builder = $this->db->table('producto as p');
        $builder->select('p.id, p.codigo_barras, p.nombre, p.existencia, p.precio_venta, p.fecha_creacion, p.imagen, u.nombre as creado_por');
        $builder->join('usuarios as u', 'p.creado_por = u.id');
        $builder->where('p.eliminado !=', 1);
        return $builder->get()->getResult();
    }
}
