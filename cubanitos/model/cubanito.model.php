<?php

class CubanitoModel {
    
    private $db;

    function __construct() {  // Corregido el nombre del constructor
        $this->db = new PDO("mysql:host=localhost;"."dbname=fabricacubanito;"."charset=utf8","root","");
    }

    public function obtenerCubanitosDB(){
        $query = $this->db->prepare('SELECT * FROM cubanito');
        $query->execute();
        $cubanitos = $query->fetchAll(PDO::FETCH_OBJ);

        return $cubanitos;
    }
    public function obtenerCubanitoDB($id){
        $query = $this->db->prepare('SELECT * FROM cubanito WHERE id_cubanito = ?');
        $query->execute([$id]);
        $cubanito = $query->fetch(PDO::FETCH_OBJ);

        return $cubanito;
    }
    public function eliminarCubanito($id){
        $query = $this->db->prepare('DELETE FROM cubanito WHERE id_cubanito = ?');
        $query->execute([$id]);
        $cubanitoEliminado = $query->fetch(PDO::FETCH_OBJ);
        return $cubanitoEliminado;
    }
}
