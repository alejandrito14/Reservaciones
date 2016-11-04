<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clspBLCabania
 *
 * @author Alejandro hdez g
 */
class clspBLCabania {
    
   function __construct() {
        # code...
    }

    function __destruct() {
        
    }

    public static function listar_cabanias($coleccion) {


        $vmysql = new Mysql();
        $vmysql->AbrirConexion();

        $result = clspDLCabania::listasCabanias($vmysql, $coleccion);
        //cambiar nombre a clscDLTurista
        return $result;
        /* $obj = new productoscd();
          $result = $obj->lista_productos();

          return $result; */
        $vmysql->CerrarConexion();
    }
    
    
}
