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
        $habiaciones = $this->modelo->getHabitacionesModel();
        $this->vista->listadoDeHabitaciones($habiaciones);
    }
}
