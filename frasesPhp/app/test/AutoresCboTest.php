<?php

require_once '../../app/validator/FrasesValidator.php';

$frases = new FrasesValidator();

$result = $frases->autoresCbo();

echo $result;
