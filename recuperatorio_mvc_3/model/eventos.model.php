<?php

class EventosModel{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ticket;charset=utf8', 'root', '');
    }
    public function encontrar_evento($id_evento){
        $sentencia = $this->db->prepare('SELECT * FROM Eventos WHERE id = ?');
        $sentencia->execute(array($id_evento));
        $evento = $sentencia->fetch(PDO::FETCH_OBJ);
        return $evento;
    }
    public function modificar_restadas($id, $cantidadEntrads){
        $query = $this->db->prepare('UPDATE Eventos SET entradas_restantes = entradas_restantes - ? WHERE id = ?');
        return $query->execute([$cantidadEntrads, $id]);
      
    }
}