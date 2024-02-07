<?php

require_once 'controller/habitacion.controller.php';



define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

//inicio las clases
$habitacionController = new Habitacion();

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);
switch ($params[0]) {
    case "home": 

        $habitacionController->get_habitaciones();
        break;

    default:
        echo ('es defaul');
        break;
}
