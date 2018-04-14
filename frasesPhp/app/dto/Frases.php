<?php

/**
 * Clase Frases
 *
 * @author DANIEL
 */
class Frases {

    private $idfrase;
    private $idautor;
    private $frase;

    function __construct() {
        
    }

    function getIdfrase() {
        return $this->idfrase;
    }

    function getIdautor() {
        return $this->idautor;
    }

    function getFrase() {
        return $this->frase;
    }

    function setIdfrase($idfrase) {
        $this->idfrase = $idfrase;
    }

    function setIdautor($idautor) {
        $this->idautor = $idautor;
    }

    function setFrase($frase) {
        $this->frase = $frase;
    }

}
