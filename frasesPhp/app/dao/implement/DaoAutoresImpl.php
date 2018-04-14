<?php

require_once '../sql/Conexion.php';
require_once '.././dao/interface/DaoAutores.php';
require_once './../dto/Autores.php';

/**
 * Clase que implementa las interfaces de DaoAutores
 *
 * @author DANIEL
 */
class DaoAutoresImpl implements DaoAutores {

    private $message;
    private $autor; // Para el método GET

    function __construct() {
        $this->autor = array();
    }

    public function autoresDel(array $ids) {
        $result = "";
        try {
            Conexion::conectar()->autocommit(FALSE);
            $ok = true;
            foreach ($ids as $value) {
                $sql = "DELETE FROM autores WHERE idautor IN (SELECT idautor FROM (SELECT idautor FROM autores b WHERE b.idautor = '$value') X)";
                $result = Conexion::conectar()->query($sql);
                if ($result == null) {
                    $ok = false;
                    $this->message = "ID " . $value . " no encontrado";
                    break;
                }
            }
            if ($ok) {
                Conexion::conectar()->commit();
            } else {
                Conexion::conectar()->rollback();
            }
        } catch (SQLException $ex) {
            $this->message = $ex->getMessage();
        }

        Conexion::desconectar();
        return $this->message;
    }

    public function autoresGet($id) {
        $sql = "SELECT idautor, autor FROM autores WHERE idautor = '$id'";
        try {
            $result = Conexion::conectar()->query($sql);
            $registro = null;
            if ($registro = $result->fetch_assoc()) {
                $this->autor[] = $registro;
            } else {
                $this->autor[] = "No encontrado";
            }
        } catch (SQLException $ex) {
            $this->message = $ex->getMessage();
        }
        Conexion::desconectar();
        return $this->autor;
    }

    public function autoresIns(\Autores $autores) {
        $sql = "INSERT INTO autores(autor) VALUES('{$autores->getAutor()}')";

        try {
            $result = Conexion::conectar()->query($sql);
            $this->message = ($result == 1) ? "ok" : "0 filas afectadas";
        } catch (Exception $ex) {
            $this->message = $ex->getMessage();
        }
        Conexion::desconectar();
        return $this->message;
    }

    public function autoresQry() {
        $list = array();
        $sql = "SELECT idautor, autor FROM autores";
        try {
            $result = Conexion::conectar()->query($sql);
            while ($registro = $result->fetch_assoc()) {
                $list[] = $registro;
            }
        } catch (SQLException $ex) {
            $this->message = $ex->getMessage();
        }
        Conexion::desconectar();
        return $list;
    }

    public function autoresUpd(\Autores $autores) {
        $sql = "UPDATE autores SET "
                . "autor = '{$autores->getAutor()}'"
                . " WHERE idautor = '{$autores->getIdautor()}'";

        try {
            $result = Conexion::conectar()->query($sql);
            $this->message = ($result == 1) ? "ok" : "0 filas afectadas";
        } catch (Exception $ex) {
            $this->message = $ex->getMessage();
        }

        Conexion::desconectar();
        return $this->message;
    }

    public function autoresCbo() {
        $list = array();
        $sql = "SELECT idautor, autor FROM autores ORDER BY autor";
        try {
            $result = Conexion::conectar()->query($sql);
            while ($registro = $result->fetch_assoc()) {
                $list[] = $registro;
            }
        } catch (SQLException $ex) {
            $this->message = $ex->getMessage();
        }
        Conexion::desconectar();
        return $list;
    }

    public function getMessage() {
        return $this->message;
    }

}
