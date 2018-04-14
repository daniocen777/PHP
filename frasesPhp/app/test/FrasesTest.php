<?php

require_once '../dto/Frases.php';

$frases = new Frases();

$frases->setIdfrase(1);
$frases->setIdautor(2);
$frases->setFrase("No hay límites en la maldad de las mujeres, sobre todo"
        . "de las más inocentes");

echo "ID de la frase: " . $frases->getIdfrase() . " || "
        . "ID del autor: " . $frases->getIdautor() . " || "
        . "Frase: " . $frases->getFrase() . "\t";
