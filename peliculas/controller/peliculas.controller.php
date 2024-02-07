<?php

require_once "./peliculas/model/peliculas.model.php";
require_once "./peliculas/view/peliculas.view.php";

class PeliculaController{
    private $model;
    private $view;
    function __construct(){
        $this->model = new PeliculaModel();
        $this->view = new PeliculaView();
    }
    public function obtenerTodasLasPeliculas(){
        
        $peliculas = $this->model->obtenerPeliculasDB();
        $this->view->respuesta($peliculas);
    }
}
