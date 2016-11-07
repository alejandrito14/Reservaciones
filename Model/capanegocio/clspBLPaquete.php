<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clspBLPaquete
 *
 * @author Alejandro hdez g
 */
include_once '../Model/capadatos/clspDLPaquete.php';
include_once '../Model/conexcion.php';
class clspBLPaquete {
    //put your code here
    
     function __construct() {
        # code...
    }

    function __destruct() {
        
    }

    public static function listar_paquete($coleccion) {


        $mysql = new Mysql();
        $mysql->AbrirConexion();

        $result = clspDLPaquete::listarPaquetes($mysql, $coleccion);
        
        return $result;
      
        $mysql->CerrarConexion();
    }
}
