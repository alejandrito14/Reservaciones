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

    public static function eliminar_actividad($vmysql, $id) {
        try {
            $consulta = $vmysql->consulta("DELETE FROM c_actividad WHERE id_actividad=\"$id\" ");

            if ($vmysql->consulta($consulta)) {

                if ($vmysql->ObtenerNumeroFilasAfectadas() != 1) {
                    return 0;
                }
            }
            unset($consulta, $vmysql);

            return 1;
        } catch (Exception $vexcepcion) {

            throw new Exception($vexcepcion->getMessage(), $vexcepcion->getCode());
        }
    }
    
    
     public static function insertarActividad($vmySql, $vflactividades) {
//             $vmySql = new MySql();
//             $vmySql->AbrirConexion();

        try {
//It sets sql statement in order to add new turist
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

            return 1;
        } catch (Exception $vexcepcion) { //It catches exception /It returns exception code catched
            throw new Exception($vexcepcion->getMessage(), $vexcepcion->getCode());
        }
    }
    
    
    

}
