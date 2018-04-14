<?php

require_once '../dto/Frases.php';
require_once '../dao/implement/DaoFrasesImpl.php';

$frase = new Frases();
$daoFrases = new DaoFrasesImpl();

$frase->setIdautor(67);
$frase->setFrase("FRASE DE MIGUEL DE SERVANTES");

$result = $daoFrases->frasesIns($frase);

echo $result;
