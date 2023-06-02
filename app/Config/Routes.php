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
$routes->setDefaultController('User');
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


// ADMIN/Dashboard
$routes->get('/admin', 'admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'admin::index', ['filter' => 'role:admin']);

// Admin/Produk
$routes->get('/admin/produk', 'admin::produk', ['filter' => 'role:admin']);
$routes->get('/admin/produk/index', 'admin::produk', ['filter' => 'role:admin']);

$routes->get('/admin/create', 'admin::create', ['filter' => 'role:admin']);
$routes->get('/admin/create/index', 'admin::create', ['filter' => 'role:admin']);


// Admin/Detail Produk
// $routes->get('/admin/dtail_produk', 'admin::dtail_produk', ['filter' => 'role:admin']);
// $routes->get('/admin/dtail_produk/index', 'admin::dtail_produk', ['filter' => 'role:admin']);





$routes->get('/pengrajin', 'Pengrajin::index', ['filter' => 'role:pengrajin']);
$routes->get('/pengrajin/index', 'Pengrajin::index', ['filter' => 'role:pengrajin']);

$routes->get('/', 'user::index');
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
