<?php

$message = array();
$list = array();
$result;
array_push($message, "ID requerido");
array_push($message, "Holas");
array_push($message, "Como estas");
array_push($message, "Hola de nuevo");

$list["msg"][] = $message;

if (empty($message)) {
    echo 'Está vacío';
} else {
    echo json_encode($list);
}

