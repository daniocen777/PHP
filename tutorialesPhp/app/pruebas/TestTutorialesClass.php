<?php

require '../dto/Tutoriales.php';

$tutoriales = new Tutoriales();

$tutoriales->setIdtutorial(1);
$tutoriales->setTitulo("Java");
$tutoriales->setTipo("Video");
$tutoriales->setPrecio(22.22);

echo 'Título: ' . $tutoriales->getTitulo() . "Tipo: " . $tutoriales->getTipo();
