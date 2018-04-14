<?php

/**
 * Clase que permite obtener la conexión a la BD
 *
 * @author DANIEL
 */
class Conexion {    

    public static function conectar() {
        $conexion = new mysqli("localhost", "root", "", "parainfo");
        mysqli_set_charset($conexion, "utf8"); // Para las Ñ y toldes
        try {
            if ($conexion == null) {
                DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysqli_connect_error());
            } else {
                return $conexion;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function desconectar() {
        if (Conexion::conectar() !== null) {
            Conexion::conectar()->close();
        }
    }

}
