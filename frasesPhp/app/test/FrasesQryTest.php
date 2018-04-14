<?php

require_once '../dao/implement/DaoFrasesImpl.php';

$daoFrasesImpl = new DaoFrasesImpl();

$result = $daoFrasesImpl->frasesQry();
echo json_encode($result, JSON_UNESCAPED_UNICODE);
