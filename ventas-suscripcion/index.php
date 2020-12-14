<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php"; // en la plantilla

$plantilla = new PlantillaControlador();
$plantilla->controlPlantilla();
