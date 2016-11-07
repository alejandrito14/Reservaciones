<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clspDLPaquete
 *
 * @author Alejandro hdez g
 */
include_once '../Model/capafisica/clspFLPaquete.php';

class clspDLPaquete {
    //put your code here
      public function __construct() {
        
    }

    public function __destruct() {
        
    }

    public static function listarPaquetes($mysql, $coleccion) {

        $consulta = $mysql->consulta("SELECT * FROM c_paquete");

        if ($mysql->num_rows($consulta) > 0) {
            while ($resultados = $mysql->fetch_array($consulta)) {
                $paquete = new clspFLPaquete();

                $paquete->idPaquete = $resultados['id_paquete'];
                $paquete->nombrePaquete = $resultados['cmpnombrePaquete'];
                $paquete->tarifa = $resultados['cmptarifa'];
                $paquete->detalle = $resultados['cmpdetalle'];
                
                


                $coleccion->paquetes [] = $paquete;
                // echo json_encode($coleccion);
            }
            return 1;
        }

        return 0;
    }

    
}
