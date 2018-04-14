<?php

require_once '../../app/dto/Autores.php';
require_once '../../app/dto/Frases.php';
require_once '../../app/danicode/DeString.php';
require_once '../dao/implement/DaoFrasesImpl.php';
require_once '../dao/implement/DaoAutoresImpl.php';

/**
 * Description of FrasesValidator
 *
 * @author DANIEL
 */
class FrasesValidator {

    private $daoFrases;
    private $daoAutores;

    function __construct() {
        $this->daoFrases = new DaoFrasesImpl();
        $this->daoAutores = new DaoAutoresImpl();
    }

    // Méotodo para listar autores
    public function autoresQry() {
        $result = "";
        $list = $this->daoFrases->frasesQry();
        if ($list == null) {
            $result = json_encode($this->daoFrases->getMessage());
        } else {
            $result = json_encode($list, JSON_UNESCAPED_UNICODE);
        }
        return $result;
    }

    // Ins
    public function autoresInsUpd($upd) {
        $message = array();
        $result = null;
        $idfrase = filter_input(INPUT_POST, "idfrase");
        $idautor = filter_input(INPUT_POST, "idautor");
        $frase = filter_input(INPUT_POST, "frase");

        if (($upd == true) && ($idfrase == null)) {
            array_push($message, "ID requerido");
        }

        if ($idautor == null) {
            array_push($message, "El autor es requerido");
        }

        if (($frase == null) || (strlen(trim($frase))) == 0) {
            array_push($message, "La frase es requerida");
        } else if ((strlen($frase) <= 3) || strlen($frase) >= 50) {
            array_push($message, "Frase entre [3; 50] caracteres");
        }

        $frases = new Frases();
        $frases->setIdfrase($idfrase);
        $frases->setIdautor($idautor);
        $frases->setFrase($frase);

        if (empty($message)) {
            $msg = ($upd == true) ? "No implementado" : $this->daoFrases->frasesIns($frases);
            if ($msg == null) {
                $result = json_encode("Error");
            }
        } else {
            $result = json_encode($message);
        }

        return $result;
    }

    // Llenar el combo de autores
    public function autoresCbo() {
        $list = $this->daoAutores->autoresCbo();
        if ($list == null) {
            $result = json_encode($this->daoAutores->getMessage());
        } else {
            $result = json_encode($list);
        }
        return $result;
    }

}
