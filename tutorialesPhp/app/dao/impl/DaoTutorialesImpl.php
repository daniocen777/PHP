<?php

require_once '/../../sql/ConectaDB.php';
include_once '/../../dto/Tutoriales.php';
require '/../interfaces/DaoTutoriales.php';

class DaoTutorialesImpl implements DaoTutoriales {

    private $message;
    private $tutoriales;

    function DaoTutorialesImpl() {
        $this->tutoriales = array();
    }

    // Método para listar datos
    public function tutorialesQry() {
        $list = array();
        $sql = "SELECT idtutorial, titulo, tipo, precio FROM tutoriales";
        try {
            $result = ConectaDB::conectar()->query($sql);
            while ($registro = $result->fetch_assoc()) {
                $list[] = $registro;
            }
        } catch (SQLException $ex) {
            echo $ex->getMessage();
        }
        return $list;
    }

    // Método para insertar datos
    public function tutorialesIns(Tutoriales $tutoriales) {

        $sql = "INSERT INTO tutoriales(titulo, tipo, precio) "
                . "VALUES('{$tutoriales->getTitulo()}', '{$tutoriales->getTipo()}', '{$tutoriales->getPrecio()}')";

        try {
            $result = ConectaDB::conectar()->query($sql);
            $this->message = ($result == 1) ? "ok" : "0 filas afectadas";
        } catch (Exception $ex) {
            $this->message = $ex->getMessage();
        }

        ConectaDB::desconectar();
        return $this->message;
    }

    public function tutorialesDel(array $ids) {
        try {
            //$mysqli->autocommit(FALSE);
            $ok = true;
            foreach ($ids as $value) {
                $sql = "DELETE FROM tutoriales WHERE idtutorial = '$value'";
                $result = ConectaDB::conectar()->query($sql);
                if ($result == null) {
                    $ok = false;
                    $this->message = "ID " . $value . " no encontrado";
                    break;
                }
            }
            if ($ok) {
                $this->message = "ok";
            }
        } catch (Exception $ex) {
            $this->message = $ex->getMessage();
        }

        ConectaDB::desconectar();
        return $this->message;
    }

    public function tutorialesGet($id) {
        //$tutoriales = new Tutoriales();
        $sql = "SELECT idtutorial, titulo, tipo, precio FROM tutoriales"
                . " WHERE idtutorial = '$id'";
        try {
            $result = ConectaDB::conectar()->query($sql);
            $registro = null;
            if ($registro = $result->fetch_assoc()) {
                $this->tutoriales[] = $registro;
            } else {
                $this->message = "No encontrado";
            }
        } catch (Exception $ex) {
            $this->message = $ex->getMessage();
        }
        ConectaDB::desconectar();
        return $this->tutoriales;
    }

    public function tutorialesUpd(Tutoriales $tutoriales) {
        $sql = "UPDATE tutoriales SET "
                . "titulo = '{$tutoriales->getTitulo()}',"
                . "tipo = '{$tutoriales->getTipo()}',"
                . "precio = '{$tutoriales->getPrecio()}'"
                . " WHERE idtutorial = '{$tutoriales->getIdtutorial()}'";

        try {
            $result = ConectaDB::conectar()->query($sql);
            $this->message = ($result == 1) ? "ok" : "0 filas afectadas";
        } catch (Exception $ex) {
            $this->message = $ex->getMessage();
        }

        ConectaDB::desconectar();
        return $this->message;
    }

    public function getMessage() {
        return $this->message;
    }

}
