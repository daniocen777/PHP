<?php

class Tutoriales {

    private $idtutorial;
    private $titulo;
    private $tipo;
    private $precio;

    function Tutoriales() {
        
    }

    function getIdtutorial() {
        return $this->idtutorial;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setIdtutorial($idtutorial) {
        $this->idtutorial = $idtutorial;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

}
