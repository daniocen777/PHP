<?php

include_once '/../../dto/Tutoriales.php';

interface DaoTutoriales {

    //Listar datos
    public function tutorialesQry();

    // Proceso para insertar
    public function tutorialesIns(Tutoriales $tutoriales);

    // Eliminar
    public function tutorialesDel(array $ids);
    
    // Get
    public function tutorialesGet($id);
    
    // Proceso para actualizar
    public function tutorialesUpd(Tutoriales $tutoriales);

    // Mensajes de error
    public function getMessage();
}
