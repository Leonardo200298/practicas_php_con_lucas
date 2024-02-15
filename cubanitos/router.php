<?php

require_once 'libs/router.php';
require_once 'controller/cubanito.controller.php';
require_once 'controller/tipo.controller.php';

/* Nuestro cliente Teresa necesita un sistema de control de stock para su fábrica de cubanitos.
Ella les provee la siguiente base de datos:

Cubanito: (id_cubanito: int, id_tipo: int, fecha_vencimiento : datetime, cantidad: int)
Tipo: (id_tipo: int, nombre: varchar(45), Calorias: int, apto_celiacos: boolean)
 
Implemente el controlador un servicio REST que:
Elimine un cubanito.
Actualice los datos de un tipo.
Obtenga los cubanitos aptos para celíacos.
Agregue un Cubanito.

*/

// crea el router
$router = new Router();

$router->addRoute('cubanitos', 'GET', 'CubanitoController', 'obtenerCubanitos');
$router->addRoute('cubanitos/aptoCeliaco', 'GET', 'CubanitoController', 'obtenerCubanitosAptosCeliacos');
$router->addRoute('cubanitos', 'POST', 'CubanitoController', 'agregarCubanito');
$router->addRoute('cubanitos/:ID', 'GET', 'CubanitoController', 'obtenerCubanito');
$router->addRoute('cubanitos/:ID', 'DELETE', 'CubanitoController', 'borrarCubanito');
$router->addRoute('tipo/:ID', 'GET', 'TipoController', 'obtenerTipo');
$router->addRoute('tipo/:ID', 'PUT', 'TipoController', 'editarTipo');
// defina la tabla de ruteo
/* $router->addRoute('api/peliculas', 'GET', 'PeliculasController', 'obtenerTodasLasPeliculas');
$router->addRoute('api/peliculas/:ID', 'GET', 'PeliculasController', 'obtenerUnaPelicula');
$router->addRoute('api/peliculas/:ID', 'DELETE', 'PeliculasController', 'borrarUnaPelicula');
$router->addRoute('api/peliculas', 'POST', 'PeliculasController', 'insertarPelicula');
$router->addRoute('api/peliculas/:ID', 'PUT', 'PeliculasController', 'editarPelicula'); */

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

