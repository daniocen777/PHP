<?php

require_once '../dto/Autores.php';
require_once '../dao/implement/DaoAutoresImpl.php';

$autoresImpl = new DaoAutoresImpl();


$autor = new Autores();
$autor->setIdautor(5555);
$autor->setAutor("AUTOR ACTUALIZADO");

$result = $autoresImpl->autoresUpd($autor);

echo $result;
