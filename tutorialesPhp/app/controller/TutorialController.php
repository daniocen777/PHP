<?php

require '../validator/TutorialesValidator.php';
$accion = filter_input(INPUT_POST, "accion"); // Acción del cliente
$operacion = ($accion === null) ? "" : $accion; // Si la acción es nula o no

$tutorialesValidator = new TutorialesValidator(); // Objeto "Validador"
// Según sea la acción, se procesará
switch ($operacion) {
    case "QRY":
        $result = $tutorialesValidator->tutorialesQry();
        break;
    case "INS":
        $result = $tutorialesValidator->tutorialesIns(false);
        break;
    case "DEL":
        $result = $tutorialesValidator->tutorialesDel();
        break;
    case "GET":
        $result = $tutorialesValidator->tutorialesGet();
        break;
    case "UPD":
        $result = $tutorialesValidator->tutorialesIns(true);
        break;
    case "":
        break;
    default:
        echo 'No pasa nada';
        break;
}

echo $result;


