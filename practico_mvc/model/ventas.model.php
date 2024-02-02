<?php

class Ventas{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=parcial_2023;charset=utf8', 'root', '');
    }
    public function get_fecha_compra($fecha){
        $sentencia = $this->db->prepare('SELECT * FROM Ventas WHERE fecha_compra = ?');
        $sentencia->execute(array($fecha));
        $diaVenta = $sentencia->fetch(PDO::FETCH_OBJ);
       
        return $diaVenta->fecha_compra;
    }
    public function get_ventas_dia_determinado($idEvento,$fechaCompra){
        $sentencia = $this->db->prepare('SELECT * FROM Ventas WHERE id_evento = ? AND fecha_compra = ?');
        $sentencia->execute([$idEvento,$fechaCompra]);
        $diaVenta = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $diaVenta;
    }
}
