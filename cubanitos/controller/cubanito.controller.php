<?php

require_once "model/cubanito.model.php";
require_once "view/cubanito.view.php";

class CubanitoController{
    private $model;
    private $view;
    function __construct(){
        $this->model = new CubanitoModel();
        $this->view = new CubanitoView();
    }
    public function obtenerCubanitos(){
        
        $peliculas = $this->model->obtenerCubanitosDB();
        $this->view->respuesta($peliculas);
    }
    public function obtenerCubanito($params = null){
        $id = $params[":ID"];
        if (!is_numeric($id)) {
            $this->view->respuesta("Campo unicamente numerico", 400);
        }else{
            
            $cubanito = $this->model->obtenerCubanitoDB($id);
            if (!$cubanito) {
                $this->view->respuesta("Cubanito no encontrado", 404);
            }else{
                
                $this->view->respuesta($cubanito);
            }
        }
    }
    public function borrarCubanito($params = null){
        $id = $params[":ID"];
        if (!is_numeric($id)) {
            $this->view->respuesta("Campo unicamente numerico", 400);
        }else{
            
            $cubanito = $this->model->obtenerCubanitoDB($id);
            if (!$cubanito) {
                $this->view->respuesta("Cubanito no encontrado", 404);
            }else{
                $cubanito = $this->model->eliminarCubanito($id);
                $this->view->respuesta("Se ha eliminado el cubanito con el id=".$id);
            }
        }
        
    }
    public function obtenerCubanitosAptosCeliacos($params = null){
        $apto_celiacos = 1;
        $cubanitosAptosCeliacos = $this->model->obtenerCubanitosParaCeliacosDB($apto_celiacos);
        if (!$cubanitosAptosCeliacos){
            $this->view->respuesta("no encontramos cubanitos celiacos", 404);
        }else{
            $this->view->respuesta($cubanitosAptosCeliacos);
        }
    }
}
