<?php

/**
 * Clase de apoyo para algunos métodos del validator
 *
 * @author DANIEL
 */
class DeString {

    // Método para transformar String a lista
    public static function ids($ides) {
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

}
