<?php

require '../validator/TutorialesValidator.php';

$tutorialesValidator = new TutorialesValidator();

//echo $tutorialesValidator->tutorialesQry();

$ids = "19,23";
echo json_encode($tutorialesValidator->ids($ids));
