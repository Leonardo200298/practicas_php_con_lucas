<?php

require_once './libs/router.php';
require_once './peliculas/controller/peliculas.controller.php';

// crea el router
$router = new Router();

$router->addRoute('api/peliculas', 'GET', 'PeliculaController', 'obtenerTodasLasPeliculas');
// defina la tabla de ruteo
/* $router->addRoute('api/peliculas', 'GET', 'PeliculasController', 'obtenerTodasLasPeliculas');
$router->addRoute('api/peliculas/:ID', 'GET', 'PeliculasController', 'obtenerUnaPelicula');
$router->addRoute('api/peliculas/:ID', 'DELETE', 'PeliculasController', 'borrarUnaPelicula');
$router->addRoute('api/peliculas', 'POST', 'PeliculasController', 'insertarPelicula');
$router->addRoute('api/peliculas/:ID', 'PUT', 'PeliculasController', 'editarPelicula'); */

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);