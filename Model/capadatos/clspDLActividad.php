<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clspDLActividad
 *
 * @author Alejandro hdez g
 */
include_once '../Model/capafisica/clspFLActividad.php';

class clspDLActividad {
    //put your code here
    
      public static function listarActividades($mysql, $coleccion) {

        $consulta = $mysql->consulta("SELECT * FROM c_actividad");

        if ($mysql->num_rows($consulta) > 0) {
            while ($resultados = $mysql->fetch_array($consulta)) {
                $actividad = new clspFLActividad();

                $actividad->idActividad = $resultados['id_actividad'];
                $actividad->nombreActividad = $resultados['cmpnombreActividad'];
                $actividad->tarifa = $resultados['cmptarifa'];
                $actividad->detalle = $resultados['cmpdetalle'];
                
                


                $coleccion->actividades [] = $actividad;
                // echo json_encode($coleccion);
            }
            return 1;
        }

        return 0;
    }
    
    
}