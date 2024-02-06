<?php
require_once "model/habitacion.model.php";
require_once "view/habitacion.view.php";

class Habitacion{
    private $vista;
    private $modelo;
    public function __construct() {
       $this->vista = new HabitacionView();
       $this->modelo = new HabitacionModel();
    }
    public function get_habitaciones(){
        $habitaciones = $this->modelo->getHabitacionesModel();
        $this->vista->listadoDeHabitaciones($habitaciones);
    }
}
function verify(){
    if((empty($_POST['nro_habitacion']))||(empty($_POST['cant_camas']))||(empty($_POST['descripcion']))||(empty($_POST['ocupada']))){
        $this->vista->listadoDeHabitaciones->showerror('faltan ingresar datos');

    }
}

$nro_habitacion= $_POST['nro_habitacion'];
$cant_camas= $_POST['cant_camas'];
$descripcion= $_POST['descripcion'];
$ocupada= $_POST ['ocupada'];


