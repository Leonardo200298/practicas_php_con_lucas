<?php

class VentasModel{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ticket;charset=utf8', 'root', '');
    }
    public function crearVenta($id_evento, $id_usuario,$cant_entradas, $fecha){
        $sentencia = $this->db->prepare('INSERT INTO Ventas (id_evento, id_usuario,cant_entradas,fecha_compra) VALUES (?,?,?,?)');
        $sentencia->execute([$id_evento, $id_usuario,$cant_entradas, $fecha]);
        return $this->db->lastInsertId();
    }


    
}
