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


/* Resolver, haciendo uso del patrón MVC y de la programación orientada a objetos.

El CLUB CIUDAD DE BOLIVAR desea desarrollar un sistema para administrar las habitaciones de 
su complejo habitacional. Para ello nos facilitan la siguiente tabla de su base de datos:

HABITACION(id: int; nro_habitacion: int, cant_camas: int; descripcion: string; ocupada: boolean)

Implemente una solución MVC para generar la siguiente funcionalidad. Además dibuje el diagrama de
 componentes MVC desarrollado.

Obtener la lista de habitaciones, marcando en verde las que estén libres.
Agregar una habitación al sistema. Se deben verificar los datos obligatorios.
 (solo el POST, no hacer el formulario).
Obtener la capacidad hotelera disponible actualmente.
NOTA: cada requerimiento tiene que estar acompañado con la url de la tabla de ruteo correspondiente.


*/
$params = explode('/', $action);
switch ($params[0]) {
    case "home": 

        $habitacionController->get_habitaciones();
        break;

    default:
        echo ('es defaul');
        break;
}
