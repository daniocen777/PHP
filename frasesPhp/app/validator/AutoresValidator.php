<?php

require_once '../../app/dto/Autores.php';
require_once '../../app/danicode/DeString.php';
require_once '../dao/implement/DaoAutoresImpl.php';

/**
 * Clase AutoresValidator para las validaciones de la clase "DaoAutoresImpl"
 *
 * @author DANIEL
 */
class AutoresValidator {

    private $daoAutores;

    function __construct() {
        $this->daoAutores = new DaoAutoresImpl();
    }

    // Méotodo para listar autores
    public function autoresQry() {
        $result = "";
        $list = $this->daoAutores->autoresQry();
        if ($list == null) {
            $result = json_encode($this->daoTutoriales->getMessage());
        } else {
            $result = json_encode($list, JSON_UNESCAPED_UNICODE);
        }
        return $result;
    }

    // Validador para insertar o actualizar
    public function autoresInsUdp($upd) {
        $message = array();
        $result = null;
        $idautor = filter_input(INPUT_POST, "idautor");
        $autor = filter_input(INPUT_POST, "autor");

        if (($upd == true) && ($idautor == null)) {
            array_push($message, "ID requerido");
        }

        if (($autor == null) || (strlen(trim($autor))) == 0) {
            array_push($message, "Nombre del autor es requerido");
        } else if ((strlen($autor) <= 3) || strlen($autor) >= 50) {
            array_push($message, "Nombre del autor entre [3; 50] caracteres");
        }
        if ($autor == "DANIEL") {
            array_push($message, "NOOOOOOO");
        }

        $autores = new Autores();
        $autores->setIdautor($idautor);
        $autores->setAutor($autor);

        if (empty($message)) {
            $msg = ($upd == true) ? $this->daoAutores->autoresUpd($autores) : $this->daoAutores->autoresIns($autores);
            if ($msg == null) {
                $result = json_encode("Error");
            }
        } else {
            $result = json_encode($message);
        }

        return $result;
    }

    // Método para validar la eliminación
    public function autoresDel() {
        $result = "";
        $ids = DeString::ids(filter_input(INPUT_POST, "ids"));
        if ($ids == null) {
            $result = json_encode("Lista de ID(s) incorrecta");
        } else {
            $message = $this->daoAutores->autoresDel($ids);
            if ($message != null) {
                $result = json_encode($message);
            }
        }
        return $result;
    }

    // Método GET para obtener un autor por su ID
    public function autoresGet() {
        $idautor = filter_input(INPUT_POST, "idautor");
        $autor = array();
        $result = null;
        if ($idautor !== null) {
            $autor = $this->daoAutores->autoresGet($idautor);
            if ($autor !== null) {
                $result = json_encode($autor);
            } else {
                $result = json_encode($this->daoAutores->getMessage());
            }
        }
        return $result;
    }

}
