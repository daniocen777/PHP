<?php

require_once '../sql/Conexion.php';
require_once '.././dao/interface/DaoFrases.php';
require_once './../dto/Frases.php';

/**
 * Implementación de las intefases de la clase Frases
 *
 * @author DANIEL
 */
class DaoFrasesImpl implements DaoFrases {

    private $message;
    private $frase; // Para el método GET

    function __construct() {
        $this->frase = array();
    }

    public function frasesDel(array $ids) {
        
    }

    public function frasesGet($id) {
        
    }

    public function frasesIns(\Frases $frases) {
        $sql = "INSERT INTO frases(idautor, frase) VALUES('{$frases->getIdautor()}', '{$frases->getFrase()}')";

        try {
            $result = Conexion::conectar()->query($sql);
            $this->message = ($result == 1) ? "ok" : "0 filas afectadas";
        } catch (Exception $ex) {
            $this->message = $ex->getMessage();
        }
        Conexion::desconectar();
        return $this->message;
    }

    public function frasesQry() {
        $list = array();
        $sql = "SELECT frases.idfrase, autores.autor, frases.frase "
                . "FROM frases "
                . "INNER JOIN autores ON frases.idautor = autores.idautor";
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

    public function frasesUpd(\Frases $frases) {
        
    }

    public function getMessage() {
        
    }

}
