<?php

require_once 'libs/router.php';
require_once 'controller/cubanito.controller.php';
require_once 'controller/tipo.controller.php';


// crea el router
$router = new Router();

//tabla de ruteo
$router->addRoute('cubanitos', 'GET', 'CubanitoController', 'obtenerCubanitos');
$router->addRoute('cubanitos/aptoCeliaco', 'GET', 'CubanitoController', 'obtenerCubanitosAptosCeliacos');
$router->addRoute('cubanitos', 'POST', 'CubanitoController', 'agregarCubanito');
$router->addRoute('cubanitos/:ID', 'GET', 'CubanitoController', 'obtenerCubanito');
$router->addRoute('cubanitos/:ID', 'DELETE', 'CubanitoController', 'borrarCubanito');
$router->addRoute('tipo/:ID', 'GET', 'TipoController', 'obtenerTipo');
$router->addRoute('tipo/:ID', 'PUT', 'TipoController', 'editarTipo');

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

