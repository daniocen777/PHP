<?php

require_once '../dao/implement/DaoAutoresImpl.php';

$autoresImpl = new DaoAutoresImpl();

$result = $autoresImpl->autoresGet(38);

echo json_encode($result);
