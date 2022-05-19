<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/* $routes->group('libros', [], function($routes){
    $routes->get('', 'Libros::index');
    $routes->get('create', 'Libros::create');
    $routes->post('store', 'Libros::store');
    $routes->get('delete/(:id)', 'Libros::delete/$1');
    $routes->post('edit/(:id)', 'Libros::edit/$1');
    $routes->post('update', 'Libros::update');
}); */
$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function($routes){
    $routes->get('create', 'Registro::create');
    $routes->post('store', 'Registro::store');

    $routes->get('login', 'Login::index');
    $routes->post('sigin', 'Login::sigin');
    $routes->get('logout', 'Login::logout');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth'],function($routes){

    $routes->group('usuarios', function($routes){
        $routes->get('index', 'Usuarios::index');
        $routes->get('', 'Usuarios::index');
    });

    $routes->group('proveedores', function($routes){
        $routes->get('index', 'Proveedores::index');
        $routes->get('', 'Proveedores::index');
        $routes->get('create', 'Proveedores::create');
        $routes->post('store', 'Proveedores::store');
        $routes->get('edit/(:id)', 'Proveedores::edit/$1');
        $routes->post('update', 'Proveedores::update');
        $routes->get('delete/(:id)', 'Proveedores::delete/$1');
    });

    $routes->group('clientes', function($routes){
        $routes->get('index', 'Clientes::index');
        $routes->get('', 'Clientes::index');
        $routes->get('create', 'Clientes::create');
        $routes->post('store', 'Clientes::store');
        $routes->get('edit/(:id)', 'Clientes::edit/$1');
        $routes->post('update', 'Clientes::update');
        $routes->get('delete/(:id)', 'Clientes::delete/$1');
    });

    $routes->group('productos', function($routes){
        $routes->get('index', 'Productos::index');
        $routes->get('', 'Productos::index');
        $routes->get('create', 'Productos::create');
        $routes->post('store', 'Productos::store');
        $routes->get('edit/(:id)', 'Productos::edit/$1');
        $routes->post('update', 'Productos::update');
        $routes->get('delete/(:id)', 'Productos::delete/$1');
        $routes->get('listaporproveedor/(:id)', 'Productos::listaPorProveedor/$1');
        $routes->get('precioproducto/(:id)', 'Productos::precioProducto/$1');
    });

    $routes->group('ventas', function($routes){
        $routes->get('index', 'Ventas::index');
        $routes->get('', 'Ventas::index');
        $routes->get('create', 'Ventas::create');
        $routes->post('store', 'Ventas::store');
        $routes->get('edit/(:id)', 'Ventas::edit/$1');
        $routes->post('update', 'Ventas::update');
        $routes->get('delete/(:id)', 'Ventas::delete/$1');
    });

    $routes->group('reporte', function($routes){
        $routes->get('index', 'Reportes::index');
        $routes->get('ventaporzona', 'Reportes::ventaPorZona');
        $routes->get('datosventaporzona/(:id)', 'Reportes::datosVentaPorZona/$1');
        $routes->get('compraporzona', 'Reportes::compraPorZona');
        $routes->get('datoscompraporzona/(:id)', 'Reportes::datosCompraPorZona/$1');
        $routes->get('compraporcliente', 'Reportes::compraPorCliente');
        $routes->get('datoscompraporcliente/(:clienteid)/(:fechainicio)/(:fechafin)', 'Reportes::datosCompraPorCliente/$1/$2/$3');
    });
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
