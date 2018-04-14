<?php

require_once '../dto/Autores.php';
/**
  require() establece que el código del archivo invocado
 *  es requerido, es decir, obligatorio para el 
 * funcionamiento del programa. Por ello, si el
 *  archivo especificado en la función require() 
 * no se encuentra saltará un error “PHP Fatal error”
 *  y el programa PHP se detendrá.

  include(), por el contrario, si no se encuentra dicho
 *  código, saltará un error tipo “Warning” y 
 * el programa seguirá ejecutándose (aunque como
 *  consecuencia de no incluirse el código puede
 *  que no funcione correctamente, o sí, depende de la situación).
 *  */
$autores = new Autores();
$autores->setIdautor(2);
$autores->setAutor("José Saramago");

echo "ID de autor: " . $autores->getIdautor() 
        . " || " . "Nombre de autor: " . $autores->getAutor();
