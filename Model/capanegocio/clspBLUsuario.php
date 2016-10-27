<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clspUsuario
 *
 * @author Alejandro hdez g
 */

include '../Model/conexcion.php';
include '../Model/capadatos/clspDLUsuario.php';
class clspBLUsuario {
    //put your code here
    public function __construct() {
        
    }

    public function __destruct() {
        
    }

     public  function  listar_usuario($coleccion) {
        
        
      $mysql = new Mysql();
      
      
      $result=  clspDLUsuario::lista_usuarios($mysql, $coleccion);
      
     
     // $result= clspDLUsuario::lista_usuarios($mysql,$coleccion);

      return $result;
       /* $obj = new productoscd();
        $result = $obj->lista_productos();

        return $result;*/
    }
    
    
    public static function agregar_usuario ($vflturistas){
       
//        echo '<pre>';
//        var_dump($vflturistas);
//        
//        echo '<pre>';
      $result= clspDLUsuario::agregarUsuarios($vflturistas);
        
      
            
        
    }

    
    
    
}
