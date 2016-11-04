<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clscDLCabania
 *
 * @author Alejandro hdez g
 */
include '../Model/capafisica/clspFLCabania.php';

class clspDLCabania {
 
    public function __construct() {
        
    }

    public function __destruct() {
        
    }

    
    public static function listasCabanias($vmysql,$coleccion){
     $consulta = $vmysql->consulta("SELECT id_cabania,cmpnombre,cmptarifa,cmpdescripcion FROM c_cabania");
      if ($vmysql->num_rows($consulta) > 0) {
            while ($resultados = $vmysql->fetch_array($consulta)) {
                $cabania = new clspFLCabania();
                $cabania->idCabania=$resultados['id_cabania'];
                $cabania->nombre=$resultados['cmpnombre'];
                $cabania->tarifa=$resultados['cmptarifa'];
                $cabania->descripcion=$resultados['cmpdescripcion'];
                
                           

                $coleccion->cabanias [] = $cabania;
                //  echo json_encode($coleccion);
            }
            return 1;
        }

        return 0;
        
        
        
    }
    
    
    
    
    
}
