<?php
require_once "model/eventos.model.php";
require_once "model/ventas.model.php";

    
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
 
    public function resolver($id,$fecha){
        $idEvento = $this->modelEventos->get_idEvento($id);
        $fechaCompra = $this->modelVentas->get_fecha_compra($fecha);
        if (!empty($idEvento) && !empty($fechaCompra)) {
            $ventasDeUnDiaYeventoDado = $this->modelVentas->get_ventas_dia_determinado($idEvento,$fechaCompra);
            var_dump($ventasDeUnDiaYeventoDado);
        }else{
            var_dump("esto");
        }
        
    }
}