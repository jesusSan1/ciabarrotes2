<?php

namespace Config;

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
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');
$routes->get('salir', 'Dashboard::salir');
$routes->get('recuperacion', 'Recuperacion::index');
$routes->post('recuperacion', 'Recuperacion::index');

$routes->group('', ['filter' => 'auth'], static function ($routes) { //! autenticacion
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('categorias', 'Categorias::index');
    $routes->post('categorias', 'Categorias::index');

    $routes->group('', ['filter' => 'vendedor'], static function ($routes) { //! autenticacion y perfil
        $routes->get('perfil', 'Perfil::index');
        $routes->post('perfil', 'Perfil::index');
    });

    $routes->group('', ['filter' => 'admin'], static function ($routes) { //!autenticacion y admin
        $routes->get('configuracion', 'Configuracion::index');
        $routes->post('configurar', 'Configuracion::configurar');
        $routes->get('empleados', 'Empleados::index');
        $routes->post('empleados', 'Empleados::index');
        $routes->post('accesoEmpleado', 'Empleados::accesoEmpleado');
        $routes->post('eliminarEmpleado', 'Empleados::eliminarEmpleado');
        $routes->get('editar-empleado', 'Empleados::editarEmpleado');
        $routes->post('editar-empleado', 'Empleados::editarEmpleado');
        $routes->post('updateEmpleado', 'Empleados::updateEmpleado');
    });
});

$routes->group('', ['filter' => 'token'], static function ($routes) {
    $routes->get('verificar-token', 'Recuperacion::verificarToken');
    $routes->post('verificar-token', 'Recuperacion::verificarToken');
    $routes->get('crear-password', 'Recuperacion::crearPassword');
    $routes->post('crear-password', 'Recuperacion::crearPassword');
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
