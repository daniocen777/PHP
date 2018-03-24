<?php

include_once '../dao/impl/DaoTutorialesImpl.php';

$daoTutorialesImpl = new DaoTutorialesImpl();

$id = 17;
$result = $daoTutorialesImpl->tutorialesGet($id);

echo json_encode($result);