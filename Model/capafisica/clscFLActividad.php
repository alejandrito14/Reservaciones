<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clscActividad
 *
 * @author Alejandro hdez g
 */
class clscFLActividad {
    public $idActividad;
    public $Nombre_Actividad;
    public $Tarifa;
    public $Detalle;
    
      public function __construct() {
         
     }

     public function __destruct() {
         
     }
     
     public function __get($atributo) {
          return $this->$atributo;
         
     }

     public function __set($atributo, $valor) {
          $this->$atributo = $valor;
         
     }

    
    
}
