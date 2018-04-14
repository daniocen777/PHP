<?php

require_once '../../app/validator/FrasesValidator.php';

$accion = filter_input(INPUT_POST, "accion"); // Acción del cliente

$operacion = ($accion === null) ? "" : $accion; // Si la acción es nula o no

$frasesValidator = new FrasesValidator(); // Objeto "Validador"

switch ($operacion) {
    case "QRY":
        $result = $frasesValidator->autoresQry();
        break;
    case "INS":
        $result = $frasesValidator->autoresInsUpd(false);
        break;
    case "CBO":
        $result = $frasesValidator->autoresCbo();
        break;
    case "":
        $result = json_encode("Solicitud no recibida");
        break;
    default :
        $result = json_encode("Solicitud no reconocida");
        break;
}

echo $result;
