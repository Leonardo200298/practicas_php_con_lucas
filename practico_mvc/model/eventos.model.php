<?php

class Eventos{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=parcial_2023;charset=utf8', 'root', '');
    }

    public function get_idEvento($id) {
        $sentencia = $this->db->prepare('SELECT * FROM Eventos WHERE id = ?');
        $sentencia->execute([$id]);
        $idEvento = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $idEvento[0]->id;
    }
}
