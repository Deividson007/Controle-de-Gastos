<?php

namespace Config;

use App\Controllers\Auth;
use App\Controllers\Cadastro;
use App\Controllers\Controle;
use App\Controllers\DadosBancarios;
use App\Controllers\TipoGasto;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system"s routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . "Config/Routes.php")) {
    require SYSTEMPATH . "Config/Routes.php";
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace("App\Controllers");
$routes->setDefaultController("AuthController");
$routes->setDefaultMethod("index");
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don"t want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don"t have to scan directories.
$routes->get("/login", [Auth::class, "index"]);
$routes->post("/login/autenticar",  [Auth::class, "autenticar"]);
$routes->get("/cadastro", [Cadastro::class, "index"]);
$routes->post("/cadastro/create",  [Cadastro::class, "create"]);
$routes->get("/controle", [Controle::class, "index"]);
$routes->get("/dados-bancarios", [DadosBancarios::class, "index"]);
$routes->post("/dados-bancarios/create", [DadosBancarios::class, "create"]);
$routes->get("/dados-bancarios/remove/(:num)", [DadosBancarios::class, "remove"]);
$routes->get("/tipo-gasto", [TipoGasto::class, "index"]);
$routes->post("/tipo-gasto/create", [TipoGasto::class, "create"]);
$routes->get("/tipo-gasto/remove/(:num)", [TipoGasto::class, "remove"]);

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
if (is_file(APPPATH . "Config/" . ENVIRONMENT . "/Routes.php")) {
    require APPPATH . "Config/" . ENVIRONMENT . "/Routes.php";
}
