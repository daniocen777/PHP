<?php

require_once '../dao/implement/DaoAutoresImpl.php';

$autoresImpl = new DaoAutoresImpl();

$array = array(65);

$result = $autoresImpl->autoresDel($array);

echo $result;
