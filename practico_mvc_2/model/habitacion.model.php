<?php

class HabitacionModel{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=hotel;charset=utf8', 'root', '');
    }
    /* Obtener la lista de habitaciones, marcando en verde las que estén libres. */
    public function getHabitacionesModel(){
        $sentencia = $this->db->prepare('SELECT * FROM habitacion');
        $sentencia->execute();
        $habitaciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $habitaciones;
    }
}