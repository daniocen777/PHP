<?php

class ConectaDB {

    protected $conexion;
    protected $db;

    public static function conectar() {
        $conexion = new mysqli("localhost", "root", "", "parainfo");
        $conexion->query("set name 'utf8'");
        try {
            if ($conexion == null) {
                DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysqli_connect_error());
            } else {
                return $conexion;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        //return $conexion;
    }

    public static function desconectar() {
        if (ConectaDB::conectar() !== null) {
            ConectaDB::conectar()->close();
        }
    }

}
