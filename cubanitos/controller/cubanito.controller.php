<?php

require_once "model/cubanito.model.php";
require_once "view/cubanito.view.php";

class CubanitoController
{
    private $model;
    private $view;
    private $data;
    function __construct()
    {
        $this->model = new CubanitoModel();
        $this->view = new CubanitoView();
        $this->data = file_get_contents("php://input");
    }
    private function getData(){
        return json_decode($this->data);
    }
    public function obtenerCubanitos()
    {

        $peliculas = $this->model->obtenerCubanitosDB();
        $this->view->respuesta($peliculas);
    }
    public function obtenerCubanito($params = null)
    {
        $id = $params[":ID"];
        if (!is_numeric($id)) {
            $this->view->respuesta("Campo unicamente numerico", 400);
        } else {

            $cubanito = $this->model->obtenerCubanitoDB($id);
            if (!$cubanito) {
                $this->view->respuesta("Cubanito no encontrado", 404);
            } else {

                $this->view->respuesta($cubanito);
            }
        }
    }
    public function borrarCubanito($params = null)
    {
        $id = $params[":ID"];
        if (!is_numeric($id)) {
            $this->view->respuesta("Campo unicamente numerico", 400);
        } else {

            $cubanito = $this->model->obtenerCubanitoDB($id);
            if (!$cubanito) {
                $this->view->respuesta("Cubanito no encontrado", 404);
            } else {
                $cubanito = $this->model->eliminarCubanito($id);
                $this->view->respuesta("Se ha eliminado el cubanito con el id=" . $id);
            }
        }
    }
    public function obtenerCubanitosAptosCeliacos($params = null)
    {
        $apto_celiacos = 1;
        $cubanitosAptosCeliacos = $this->model->obtenerCubanitosParaCeliacosDB($apto_celiacos);
        if (!$cubanitosAptosCeliacos) {
            $this->view->respuesta("no encontramos cubanitos celiacos",404);
        } else {
            $this->view->respuesta($cubanitosAptosCeliacos);
        }
    }
    public function agregarCubanito(){
        $datosDelInput = $this->getData();
        $id_tipo = $datosDelInput->id_tipo;
        $fecha_vencimiento = $datosDelInput->fecha_vencimiento;
        $cantidad = $datosDelInput->cantidad;
        if (!isset($id_tipo) || !isset($fecha_vencimiento) || !isset($cantidad)) {
            $this->view->respuesta("necesita llenar todos los campos", 400);
        }else{
            if (!is_numeric($id_tipo) || !is_numeric($cantidad)) {
                $this->view->respuesta("el identificador de tipos tiene que ser numerico como la cantidad de cubanitos", 400);
            }else{
                /* Podriamos tambien verificar la existencia del tipo de cubanito antes de crearlo */
                $cuabanitoCreado = $this->model->agregarCubanitoModel($id_tipo,$fecha_vencimiento,$cantidad);
                $cubanitoQueSeCreo = $this->model->obtenerCubanitoDB($cuabanitoCreado);
                $this->view->respuesta($cubanitoQueSeCreo);
            }
        }
    }
}
