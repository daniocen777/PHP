<?php
 require_once '../sql/Conexion.php';
 
 if (Conexion::conectar() !== null) {
     echo "Estás conectado a la BD";
 } else {
     echo "NO estás conectado a la BD";
 }
 
 Conexion::desconectar();
 


