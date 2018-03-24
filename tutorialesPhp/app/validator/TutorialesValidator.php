<?php

require_once '../dto/Tutoriales.php';
require_once '../dao/impl/DaoTutorialesImpl.php';

class TutorialesValidator {

    private $daoTutoriales;

    function __construct() {
        $this->daoTutoriales = new DaoTutorialesImpl();
    }

    public function tutorialesQry() {
        $list = $this->daoTutoriales->tutorialesQry();
        if ($list == null) {
            echo $this->daoTutoriales->getMessage();
        } else {
            $result = json_encode($list);
        }
        return $result;
    }

    public function tutorialesIns($upd) {
        $message = array();
        //$list = array();
        $result = null;
        $idtutorial = filter_input(INPUT_POST, "idtutorial");
        $titulo = filter_input(INPUT_POST, "titulo");
        $tipo = filter_input(INPUT_POST, "tipo");
        $precio = filter_input(INPUT_POST, "precio");

        if (($upd == true) && ($idtutorial == null)) {
            array_push($message, "ID requerido");
        }

        if (($titulo == null) || (strlen(trim($titulo))) == 0) {
            array_push($message, "El título es requerido");
        } else if ((strlen($titulo) <= 3) || strlen($titulo) >= 50) {
            array_push($message, "Nombre de activo [3; 50] caracteres");
        }

        if (($tipo == null) || (strlen(trim($tipo))) == 0) {
            array_push($message, "El tipo es requerido");
        } else if ((strlen($tipo) <= 3) || strlen($tipo) >= 50) {
            array_push($message, "Nombre de activo [3; 50] caracteres");
        }

        if ($precio == null) {
            array_push($message, "El precio es requerido");
        }

        $tutoriales = new Tutoriales();
        $tutoriales->setIdtutorial($idtutorial);
        $tutoriales->setTitulo($titulo);
        $tutoriales->setTipo($tipo);
        $tutoriales->setPrecio($precio);

        if (empty($message)) {
            $msg = ($upd == true) ? $this->daoTutoriales->tutorialesUpd($tutoriales) : $this->daoTutoriales->tutorialesIns($tutoriales);
            if ($msg == null) {
                $result = json_encode($msg);
            }
        } else {
            $result = json_encode($message);
        }

        return $result;
    }

    public function ids($ides) {
        //$list = null;
        if (($ides != null) && (strlen(trim($ides)) > 0)) {
            $id = explode(',', $ides);

            $list = array();
            $ix = "";
            foreach ($id as $ix) {
                $x = intval($ix);

                if ($x != null) {
                    array_push($list, $x);
                } else {
                    $list = null;
                    break;
                }
            }
        }
        return $list;
    }

    // Eliminar
    public function tutorialesDel() {
        $tutorialesValidator = new TutorialesValidator();

        $result = "";
        $ids = $tutorialesValidator->ids(filter_input(INPUT_POST, "ids"));
        if ($ids == null) {
            $result = json_encode("Lista de ID(s) incorrecta");
        } else {
            $message = $this->daoTutoriales->tutorialesDel($ids);
            if ($message != "ok") {
                $result = json_encode($message);
            } else {
                $result = json_encode("NO PASA NADA");
            }
        }
        return $result;
    }

    public function tutorialesGet() {
        $idtutorial = filter_input(INPUT_POST, "idtutorial");
        $tutorial = array();
        $result = null;
        if ($idtutorial !== null) {
            $tutorial = $this->daoTutoriales->tutorialesGet($idtutorial);
            if ($tutorial !== null) {
                $result = json_encode($tutorial);
            } else {
                $result = json_encode($this->daoTutoriales->getMessage());
            }
        }
        return $result;
    }

}
