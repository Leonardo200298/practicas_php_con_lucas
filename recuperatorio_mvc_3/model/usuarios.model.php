<?php

class UsuariosModel{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ticket;charset=utf8', 'root', '');
    }

    public function encontrar_usuario($id_usuario){
        $sentencia = $this->db->prepare('SELECT * FROM Usuarios WHERE id = ?');
        $sentencia->execute(array($id_usuario));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}