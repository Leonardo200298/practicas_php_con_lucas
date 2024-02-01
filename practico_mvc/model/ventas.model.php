<?php

class Ventas{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=parcial_2023;charset=utf8', 'root', '');
    }

}
