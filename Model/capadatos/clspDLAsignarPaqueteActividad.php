<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../Model/capafisica/clspFLAsignarPaqueteActividad.php';

/**
 * Description of clspDLAsignarPaqueteActividad
 *
 * @author Alejandro hdez g
 */
class clspDLAsignarPaqueteActividad {
    //put your code here
    public function __construct() {
        
    }

    public function __destruct() {
        
    }
    
    
      public static function asignarPaqueteActividad($vmySql, $vflpaquete) {
//             $vmySql = new MySql();
//             $vmySql->AbrirConexion();

        try {
//It sets sql statement in order to add new asignarpaqueteActividad
            echo '<pre>';
            var_dump($vflturistas);
            echo '<pre>';
            /*
              $vsql = "INSERT INTO c_usuario(cmpcorreo,cmpcontrasena, cmpnombre,cmpapellidoPaterno,cmpapellidoMaterno) ";
              $vsql.="VALUES('". $vflturistas->correo . "'";
              $vsql.=", '" . $vflturistas->contrasena . "'";
              $vsql.=", '" . $vflturistas->nombre . "'";
              $vsql.=", '" . $vflturistas->apellidoPaterno . "'";
              $vsql.=", '" . $vflturistas->apellidoMaterno . "')";
             */

            $vsql = "INSERT INTO c_turista(id_usuario,cmpnumeroTelefono,cmplugarOrigen, cmpfechaNacimiento) ";
            $vsql.="VALUES('" . $vflturistas->idusuario . "'";
            $vsql.=", '" . $vflturistas->numeroTelefono . "'";
            $vsql.=", '" . $vflturistas->lugarOrigen . "'";
            $vsql.=", '" . $vflturistas->fechaNacimiento . "')";

            if ($vmySql->consulta($vsql)) {

                if ($vmySql->ObtenerNumeroFilasAfectadas() != 1) {
                    return 0;
                }
            }


            unset($vsql, $vmySql);
             echo '1';
            return 1;
        } catch (Exception $vexcepcion) { //It catches exception /It returns exception code catched
            throw new Exception($vexcepcion->getMessage(), $vexcepcion->getCode());
        }
    }


    
    
}
