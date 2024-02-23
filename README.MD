# Practicas en php con [Lucas!](https://github.com/LucasL2001)

## :

<p> Nuestro cliente Teresa necesita un sistema de control de stock para su fábrica de cubanitos.
Ella les provee la siguiente base de datos:

Cubanito: (id_cubanito: int, id_tipo: int, fecha_vencimiento : datetime, cantidad: int)
Tipo: (id_tipo: int, nombre: varchar(45), Calorias: int, apto_celiacos: boolean)
 
Implemente el controlador un servicio REST que:
Elimine un cubanito.
Actualice los datos de un tipo.
Obtenga los cubanitos aptos para celíacos.
Agregue un Cubanito.
</p>

## ● Idea de la API -->
<p>La concepción de esta API REST tiene como objetivo ofrecer a Teresa una herramienta dinámica y fácilmente accesible, diseñada específicamente para la gestión y supervisión eficientes del inventario en su fábrica de cubanitos. Esta API posibilitará la ejecución de consultas, actualizaciones y un monitoreo eficaz del inventario, asegurando un proceso de administración de recursos más ágil y preciso. Al implementar esta solución, nuestro propósito principal es potenciar la eficiencia operativa en la fábrica de cubanitos de Teresa. La API proporciona las herramientas esenciales para la toma de decisiones informadas, permitiendo así la optimización continua de las operaciones diarias en su establecimiento</p>

# Endpoints basicos del servicio:

## GET (get general, todas los cubanitos de la tabla) 

__Endpoint__

<p> http://localhost/cubanitos/api/cubanitos/ </p>

## GET/:ID (trae el cubanito con :ID)

__Endpoint__

<p>http://localhost/cubanitos/api/cubanitos/:ID </p>

__Ejemplo__

<p> http://localhost/cubanitos/api/cubanitos/14 </p>

## POST (Informacion (cubanito) a insertarse en formato JSON, validaciones por si se encuentra incompleta o erronea hechas, si no cumplen dichas validaciones devuelvo un status 400 con un mensaje, en caso de colocar informacion erronea en cuanto a tipos devuelvo un status 404 con un mensaje)

__Endpoint__

<p> http://localhost/cubanitos/api/cubanitos/ </p>

__Ejemplo__
<p>Formato JSON, via raw:</p>
<p>
{
    "id_tipo": "1",
    "fecha_vencimiento": "2024-07-10",
    "cantidad": "5"
}
</p>

<p>
    Datos a tener a en cuenta para un POST.

    id_tipo:campo tipo number y obligatorio.
    fecha_vencimiento:campo tipo date (YYYY/MM/DD) y obligatorio.
    cantidad: tipo numerico y obligatorio
</p>

## DELETE/:ID (Elimina el cubanito con el :ID)

__Endpoint__

<p> http://localhost/cubanitos/api/cubanitos/:ID </p>

__Ejemplo__

<p> http://localhost/cubanitos/api/cubanitos/17 </p>


## PUT (Se coloca el ID del tipo a editar, si la informacion es correcta devuelvo un status 200, en caso de dejar informacion sin completar para la edicion de la pelicula devuelvo un status 400)

__Endpoint__

<p> http://localhost/practicas_php_con_lucas/cubanitos/api/tipo/:ID </p>

__Ejemplo__

<p> http://localhost/practicas_php_con_lucas/cubanitos/api/tipo/10 </p>

__Formato JSON, via raw:__
<p>
{
    
    "id_tipo": "1",
    "nombre": "roquefort",
    "Calorias": "450",
    "apto_celiacos": "0"

}
</p>

<p>
    Datos a tener a en cuenta para un POST.

    id_tipo:campo tipo number y obligatorio.
    nombre:campo tipo string y obligatorio.
    Calorias:campo tipo number y obligatorio.
    apto_celiacos:campo tipo tinyint (0 ó 1) y obligatorio.
    
</p>

## ● Stack de lenguajes y herramientas -->

<ul>
    <li>PHP</li>
    <li>XAMPP</li>
    <li>POSTMAN</li>
</ul>


## Desde ya gracias por la lectura de esta documentacion!
