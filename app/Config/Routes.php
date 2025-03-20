<?php
namespace Config;

use App\Controllers\Bitacora;
use App\Controllers\Categorias;
use App\Controllers\Configuracion;
use App\Controllers\Dashboard;
use App\Controllers\Empleados;
use App\Controllers\Home;
use App\Controllers\Perfil;
use App\Controllers\Productos;
use App\Controllers\Proveedores;
use App\Controllers\Recuperacion;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', [Home::class, 'index']);
$routes->post('/', [Home::class, 'index']);
$routes->get('salir', [Dashboard::class, 'salir']);
$routes->get('recuperacion', [Recuperacion::class, 'index']);
$routes->post('recuperacion', [Recuperacion::class, 'index']);

$routes->group('', ['filter' => 'auth'], static function ($routes) { //! autenticacion
    $routes->get('dashboard', [Dashboard::class, 'index']);
    $routes->get('categorias', [Categorias::class, 'index']);
    $routes->post('categorias', [Categorias::class, 'index']);
    $routes->post('eliminarCategoria', [Categorias::class, 'eliminarCategoria']);
    $routes->post('editarCategoria', [Categorias::class, 'editarCategoria']);
    $routes->get('proveedores', [Proveedores::class, 'index']);
    $routes->post('proveedores', [Proveedores::class, 'index']);
    $routes->post('eliminarProveedor', [Proveedores::class, 'eliminarProveedor']);
    $routes->get('editar-proveedor/(:num)', [[Proveedores::class, 'editarProveedor'], '$1']);
    $routes->post('updateProveedor', [Proveedores::class, 'updateProveedor']);
    $routes->get('productos', [Productos::class, 'index']);
    $routes->post('productos', [Productos::class, 'index']);
    $routes->post('eliminar-producto', [Productos::class, 'eliminarProducto']);
    $routes->get('editar-producto/(:num)', [[Productos::class, 'editarProducto'], '$1']);
    $routes->post('updateProducto', [Productos::class, 'updateProducto']);

    $routes->group('', ['filter' => 'vendedor'], static function ($routes) { //! autenticacion y perfil
        $routes->get('perfil', [Perfil::class, 'index']);
        $routes->post('perfil', [Perfil::class, 'index']);
    });

    $routes->group('', ['filter' => 'admin'], static function ($routes) { //!autenticacion y admin
        $routes->get('configuracion', [Configuracion::class, 'index']);
        $routes->post('configurar', [Configuracion::class, 'configurar']);
        $routes->get('empleados', [Empleados::class, 'index']);
        $routes->post('empleados', [Empleados::class, 'inddex']);
        $routes->post('accesoEmpleado', [Empleados::class, 'accesoEmpleado']);
        $routes->post('eliminarEmpleado', [Empleados::class, 'eliminarEmpleado']);
        $routes->get('editar-empleado', [Empleados::class, 'editarEmpleado']);
        $routes->post('editar-empleado', [Empleados::class, 'editarEmpleado']);
        $routes->post('updateEmpleado', [Empleados::class, 'updateEmpleado']);
        $routes->get('bitacora', [Bitacora::class, 'index']);
    });
});

$routes->group('', ['filter' => 'token'], static function ($routes) {
    $routes->get('verificar-token', [Recuperacion::class, 'verificarToken']);
    $routes->post('verificar-token', [Recuperacion::class, 'verificarToken']);
    $routes->get('crear-password', [Recuperacion::class, 'crearPassword']);
    $routes->post('crear-password', [Recuperacion::class, 'crearPassword']);
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
