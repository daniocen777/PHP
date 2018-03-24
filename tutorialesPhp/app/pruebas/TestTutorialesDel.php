<?php

include_once '../dto/Tutoriales.php';
include_once '/../dao/impl/DaoTutorialesImpl.php';

$tutoriales_1 = new Tutoriales();
$tutoriales_2 = new Tutoriales();

//$id1 = $tutoriales_1->setIdtutorial(2);
//$id2 = $tutoriales_2->setIdtutorial(5);


$array = array(51);

$daoTutorialesImpl = new DaoTutorialesImpl();
//
$result = $daoTutorialesImpl->tutorialesDel($array);

echo $result;



