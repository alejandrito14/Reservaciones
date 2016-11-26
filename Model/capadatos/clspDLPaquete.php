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
    
     public static function eliminar_paquete($vmysql,$id){
        try{
        $consulta=$vmysql->consulta( "DELETE FROM c_paquete WHERE id_paquete=\"$id\" ");
        
        if ($vmysql->consulta($consulta)) {

                if ($vmysql->ObtenerNumeroFilasAfectadas() != 1) {
                    return 0;
                }
            }
         unset($consulta, $vmysql);

            return 1;
        
        }catch(Exception $vexcepcion){
            
               throw new Exception($vexcepcion->getMessage(), $vexcepcion->getCode());
 
            
        }
        
    }
    
   public static function insertarPaquete($vmySql, $vflAsignarPaqueteActividad) {

        try {
//It sets sql statement in order to add new cabaña
//            echo '<pre>';
//            var_dump($vflcabania);
//            echo '<pre>';
            $vsql = "INSERT INTO c_paquete(cmpnombrePaquete,cmptarifa,cmpdetalle) ";
            $vsql.="VALUES('" . $vflAsignarPaqueteActividad->nombrePaquete . "'";
            $vsql.=", '" . $vflAsignarPaqueteActividad->tarifaPaquete . "'";
            $vsql.=", '" . $vflAsignarPaqueteActividad->detallePaquete . "')";
            
            if ($vmySql->consulta($vsql)) {
                
                 $id_ultimo_paquete = mysql_insert_id();
                 
                 $vflAsignarPaqueteActividad->id_paquete=$id_ultimo_paquete;
               
                if ($vmySql->ObtenerNumeroFilasAfectadas() != 1) {
                    return 0;
                }
            }


            unset($vsql, $vmySql);
           
            return 1;
        } catch (Exception $vexcepcion) { //It catches exception /It returns exception code catched
            throw new Exception($vexcepcion->getMessage(), $vexcepcion->getCode());
        }
    }
    
    

    
}
