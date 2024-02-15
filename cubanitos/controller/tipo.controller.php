<?php

require_once "model/tipo.model.php";
require_once "view/tipo.view.php";

class TipoController
{
    private $model;
    private $view;
    private $data;

    function __construct()
    {
        $this->model = new TipoModel();
        $this->view = new TipoView();
        $this->data = file_get_contents("php://input");
    }
    private function getData(){
        return json_decode($this->data);
    }
    public function obtenerTipo($params = null)
    {
        $id = $params[":ID"];
        if (!is_numeric($id)) {
            $this->view->respuesta("Campo unicamente numerico", 400);
        } else {

            $tipo = $this->model->obtenerTipoDB($id);
            if (!$tipo) {
                $this->view->respuesta("Tipo no encontrado", 404);
            } else {

                $this->view->respuesta($tipo);
            }
        }
    }
    public function editarTipo($params = null){
        $id = $params[":ID"];
        $tipo = $this->model->obtenerTipoDB($id);
        if ($tipo) {
            
            $datosDelInput = $this->getData();
            $nombre = $datosDelInput->nombre;
            $calorias = $datosDelInput->Calorias;
            $apto_celiacos = $datosDelInput->apto_celiacos;

            $this->model->editarTipoDB($nombre, $calorias, $apto_celiacos,$id);
            $tipoEditado = $this->model->obtenerTipoDB($id);
            $this->view->respuesta($tipoEditado);
        }else{
            $this->view->respuesta("Campos obligatorios", 400);
        }
    }
}
