<!-- /TickeYa es una plataforma para la venta de tickets de recitales. El sistema ya cuenta con su base de datos con las siguientes tablas:

Ventas(id: int, id_evento: int, id_usuario: int, cant_entradas: int, fecha_compra: date)
Eventos(id: int, nombre: varchar, precio: float, fecha_evento: date)
Usuarios(id: int, nombre: varchar, email: varchar, activo: boolean)


Implemente el siguiente requerimiento siguiendo el patrón MVC. No es necesario realizar las vistas, solo controlador(es), modelo(s) 
y las invocaciones a la vista.

Se debe poder agregar una nueva venta:

i.  Controle posibles errores de carga. 
ii. Los datos ingresados deben obtenerse por POST
iii.Verificar que el evento y el usuario existan
iv. Controlar que existan suficientes entradas disponibles para efectuar la venta 
v.  En caso de poder realizar la venta, actualizar la cantidad de entradas restantes.



Aclaraciones

No es necesario implementar el formulario ni las acciones que lo muestran. Solo la o las acciones que reciben los datos.
No es necesario implementar el router -->
<?php 

require_once "model/ventas.model.php";
require_once "view/ventas.view.php";

class VentasController{

    private $modelVentas;
    private $modelUsuario;
    private $modelEvento;
    private $view;
    function __construct(){
        $this->modelVentas = new VentasModel();
        $this->view = new VentasView();
        $this->modelUsuario = new UsuariosModel();
        $this->modelEvento = new EventosModel();
    }

    public function agregarVenta(){
        $id_evento = $_POST["id_evento"];
        $id_usuario = $_POST["id_usuario"];
        $cant_entradas = $_POST["cant_entradas"];

        if (empty($id_evento) || empty($id_usuario) || empty($cant_entradas)) {
           $this->view->mostrarError("Debe completar los campos");
           return;
        }

        $usuario = $this->modelUsuario->encontrar_usuario($id_usuario);
        $evento = $this->modelEvento->encontrar_evento($id_evento);

        if (!$usuario || !$evento){
            $this->view->mostrarError("El evento o el usuario no existe");
            return;
        }
        $this->modelEvento->modificar_restadas($id_evento, $cant_entradas);
        /* DEBERIA SER LA FUNCION QUE TE DA LA FECHA DE ESTE MOMENTO */
        $now = "fecha";
        $venta = $this->modelVentas->crearVenta($id_evento, $id_usuario,$cant_entradas,$now);
        $this->view->mostrarVenta($venta);
    }
}


