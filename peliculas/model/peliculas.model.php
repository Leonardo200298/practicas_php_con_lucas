<?php

class PeliculaModel{
    
    private $db;

    function _construct(){
        $this->db = new PDO("mysql:host=localhost;"."dbname=imdb;"."charset=utf8","root","");
    }

    public function obtenerPeliculasDB(){
        $query = $this->db->prepare('SELECT * FROM peliculas');
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_OBJ);
        var_dump("fasdfasdfsa");
        return $peliculas;
    }
}
