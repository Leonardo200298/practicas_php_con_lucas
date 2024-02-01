<?php
require_once "model/eventos.model.php";
class Controller{
    
    private $modelVentas;
    private $modelEventos;
    public function __construct() {
        $this->modelVentas = new Ventas();
        $this->modelEventos = new Eventos();
    }
    /*
    i.	Controle posibles errores de carga. Suponer que la vista no realiza ningún control.
ii.	Los ingresos de datos deben obtenerse por GET
iii. Verificar que el evento exista 
iv.	No es necesario implementar el router del sistema 

Listar todas las ventas realizadas en un día dado y para un evento dado. Por cada venta se deberá indicar id de la venta,
 cantidad de entradas, y precio total abonado. */
 
    public function verificador(){

    }
    public function resolver($id){
        
        $idEvento = $this->modelEventos->get_idEvento($id);
        if (empty($idEvento) && !is_numeric($idEvento)) {
            var_dump("no existe el evento con el id= ". $idEvento);
        }
        return;
    }
}