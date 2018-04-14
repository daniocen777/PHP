<?php

require_once '../dao/implement/DaoAutoresImpl.php';

$autoresImpl = new DaoAutoresImpl();

$json = $autoresImpl->autoresQry();

echo json_encode($json);
//require_once '../validator/AutoresValidator.php';
//
//$autoresValidator = new AutoresValidator();
//
//echo $autoresValidator->autoresQry();