<?php

require '../dto/Tutoriales.php';
include_once '../dao/impl/DaoTutorialesImpl.php';

$daoTutorialesImpl = new DaoTutorialesImpl();

$tutoriales = new Tutoriales();

$tutoriales->setIdtutorial(17);
$tutoriales->setTitulo("NUEVO TÍTULO");
$tutoriales->setTipo("SEPARATA");
$tutoriales->setPrecio(22.34);


echo $daoTutorialesImpl->tutorialesUpd($tutoriales);


