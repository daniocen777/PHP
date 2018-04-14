<?php

/**
 *
 * @author DANIEL
 */
interface DaoFrases {

    public function frasesQry(); //Listar datos

    public function frasesIns(Frases $frases); // Proceso para insertar

    public function frasesDel(array $ids); // Eliminar

    public function frasesGet($id); // Get

    public function frasesUpd(Frases $frases); // Proceso para actualizar

    public function getMessage(); // Mensajes de error
}
