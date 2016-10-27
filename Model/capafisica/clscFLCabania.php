<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clscCabania
 *
 * @author Alejandro hdez g
 */
class clscFLCabania {
    public $idCabania;
    public $nombre;
    public $tarifa;
    public $descripcion;
    
      public function __construct() {
      $this->idCabania=0;
      $this->nombre=0;
      $this->tarifa=0;
      $this->descripcion=0;
         
     }

     public function __destruct() {
      unset($idCabania);
      unset($nombre);
      unset($tarifa);
      unset($descripcion);
         
     }
     
     public function __get($atributo) {
          return $this->$atributo;
         
     }

     public function __set($atributo, $valor) {
          $this->$atributo = $valor;
         
     }

    
    
    
    
}
