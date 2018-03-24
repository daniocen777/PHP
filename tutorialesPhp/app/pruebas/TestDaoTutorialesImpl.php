<?php

include_once '../dao/impl/DaoTutorialesImpl.php';

$daoTutorialesImpl = new DaoTutorialesImpl();

$json = $daoTutorialesImpl->tutorialesQry();

echo json_encode($json);
