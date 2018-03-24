<?php

require '../sql/ConectaDB.php';

$conn = new ConectaDB();
$result = $conn->conectar();

if ($result == null) {
    echo 'NO Estás conectado <br>';
} else {
    echo 'estás conectado <br>';
}

$desc = $conn->desconectar();

if ($desc == true) {
    echo 'Estás DESconectado';
} else {
    echo 'Sigue conectado';
}


