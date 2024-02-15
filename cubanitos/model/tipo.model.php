<?php

class TipoModel {
    
    private $db;

    function __construct() {
        $this->db = new PDO("mysql:host=localhost;"."dbname=fabricacubanito;"."charset=utf8","root","");
    }
    public function obtenerTipoDB($id){
        $query = $this->db->prepare("SELECT * FROM tipo WHERE id_tipo = ?");
        $query->execute(array($id));
        $tipo = $query->fetch(PDO::FETCH_OBJ);
        return $tipo;
    }
    public function editarTipoDB($nombre, $calorias, $celiaco, $id){
        $query = $this->db->prepare('UPDATE tipo SET nombre = ?, Calorias = ?, apto_celiacos = ? WHERE id_tipo = ?');

        $query->execute([$nombre, $calorias, $celiaco,$id]);
    }
}