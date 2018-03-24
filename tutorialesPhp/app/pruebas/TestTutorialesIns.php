<?php

include_once '../dto/Tutoriales.php';
include_once '../dao/impl/DaoTutorialesImpl.php';

// Seteando datos 
$tutoriales = new Tutoriales();
$tutoriales->setTitulo("Curso PHP 333");
$tutoriales->setTipo("Video 333");
$tutoriales->setPrecio(33.50);

// Método para insertar
$daoTutorialesImpl = new DaoTutorialesImpl();

echo $daoTutorialesImpl->tutorialesIns($tutoriales);




