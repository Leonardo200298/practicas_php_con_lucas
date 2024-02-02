<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'controller/controller.php';



define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

//inicio las clases
$ventasController = new Controller();




// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}


/* //WEB 2 - Resolución  Examen Parcial 23/10/2023
TickeYa es una plataforma para la venta de tickets de recitales. El sistema ya cuenta con su base de datos con
 las siguientes tablas:

Ventas(id: int, id_evento: int, id_usuario: int, cant_entradas: int, fecha_compra: date)
Eventos(id: int, nombre: varchar, precio: float, fecha_evento: date)
Usuarios(id: int, nombre: varchar, email: varchar, activo: boolean)




*/
$params = explode('/', $action);
switch ($params[0]) {
    case "home": 

        $id = 4;
        $fecha = '2006-12-31';
        $ventasController->resolver($id,$fecha);
        break;

    default:
        echo ('es defaul');
        break;
}
