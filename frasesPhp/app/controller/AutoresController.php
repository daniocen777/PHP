<?php

require_once '../../app/validator/AutoresValidator.php';

$accion = filter_input(INPUT_POST, "accion"); // Acción del cliente

$operacion = ($accion === null) ? "" : $accion; // Si la acción es nula o no

$autotresValidator = new AutoresValidator(); // Objeto "Validador"

switch ($operacion) {
    case "QRY":
        $result = $autotresValidator->autoresQry();
        break;
    case "INS":
        $result = $autotresValidator->autoresInsUdp(false);
        break;
    case "DEL":
        $result = $autotresValidator->autoresDel();
        break;
    case "GET":
        $result = $autotresValidator->autoresGet();
        break;
    case "UPD":
        $result = $autotresValidator->autoresInsUdp(true);
        break;
    case "":
        $result = json_encode("Solicitud no recibida");
        break;
    default :
        $result = json_encode("Solicitud no reconocida");
        break;
}

echo $result;





