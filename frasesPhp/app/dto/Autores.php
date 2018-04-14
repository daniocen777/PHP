<?php

Class Autores {

    private $idautor;
    private $autor;

    function __construct() {
        
    }

    function getIdautor() {
        return $this->idautor;
    }

    function getAutor() {
        return $this->autor;
    }

    function setIdautor($idautor) {
        $this->idautor = $idautor;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

}
