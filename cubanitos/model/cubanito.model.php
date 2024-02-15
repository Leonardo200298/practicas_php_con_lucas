<?php

class CubanitoModel
{

    private $db;

    function __construct(){
        $this->db = new PDO("mysql:host=localhost;" . "dbname=fabricacubanito;" . "charset=utf8", "root", "");
    }

    public function obtenerCubanitosDB()
    {
        $query = $this->db->prepare('SELECT * FROM cubanito');
        $query->execute();
        $cubanitos = $query->fetchAll(PDO::FETCH_OBJ);

        return $cubanitos;
    }
    public function obtenerCubanitoDB($id)
    {
        $query = $this->db->prepare('SELECT * FROM cubanito WHERE id_cubanito = ?');
        $query->execute([$id]);
        $cubanito = $query->fetch(PDO::FETCH_OBJ);

        return $cubanito;
    }
    public function eliminarCubanito($id)
    {
        $query = $this->db->prepare('DELETE FROM cubanito WHERE id_cubanito = ?');
        $query->execute([$id]);
        $cubanitoEliminado = $query->fetch(PDO::FETCH_OBJ);
        return $cubanitoEliminado;
    }
    public function obtenerCubanitosParaCeliacosDB($apto_celiacos){
        $query = $this->db->prepare('SELECT * FROM cubanito LEFT JOIN tipo ON cubanito.id_tipo = tipo.id_tipo WHERE tipo.apto_celiacos = ?');
        $query->execute([$apto_celiacos]);
        $todosLosCubanitosAptosCeliacos = $query->fetchAll(PDO::FETCH_OBJ);
        return $todosLosCubanitosAptosCeliacos;
    }
    public function agregarCubanitoModel($id_tipo,$fecha_vencimiento,$cantidad){
        $query = $this->db->prepare("INSERT INTO cubanito (id_tipo, fecha_vencimiento, cantidad) VALUES (?, ?, ?)");
        $query->execute([$id_tipo,$fecha_vencimiento,$cantidad]);
        return $this->db->lastInsertId();
    }
}
