<?php

//require_once '../../dto/Autores.php';
/**
 *
 * @author DANIEL
 */
interface DaoAutores {
    //Listar datos
    public function autoresQry();

    // Proceso para insertar
    public function autoresIns(Autores $autores);

    // Eliminar
    public function autoresDel(array $ids);
    
    // Get
    public function autoresGet($id);
    
    // Proceso para actualizar
    public function autoresUpd(Autores $autores);
    
    // Para llenar el combo
    public function autoresCbo();

    // Mensajes de error
    public function getMessage();
}
