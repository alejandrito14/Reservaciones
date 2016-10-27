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
include_once '../Model/capafisica/clspFLUsuario.php';
include_once '../Model/conexcion.php';

class clspDLUsuario {

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

    public static function lista_usuarios($mysql, $coleccion) {
        $mysql->AbrirConexion();
        $consulta = $mysql->consulta("SELECT * FROM c_usuario");
        if ($mysql->num_rows($consulta) > 0) {
            while ($resultados = $mysql->fetch_array($consulta)) {
                $usuario = new clspFLUsuario();

                $usuario->idusuario = $resultados['id_usuario'];
                $usuario->correo = $resultados['cmpcorreo'];
                $usuario->contrasena = $resultados['cmpcontrasena'];
                $usuario->nombre = $resultados['cmpnombre'];
                $usuario->apellidoPaterno = $resultados['cmpapellidoPaterno'];
                $usuario->apellidoMaterno = $resultados['cmpapellidoMaterno'];

                $coleccion->usuarios [] = $usuario;
                //  echo json_encode($coleccion);
            }
            return 1;
        }

        return 0;
        $mysql->CerrarConexion();
    }

    public static function agregarUsuarios($vmySql,$vflturistas) {
        echo '<pre>';
        var_dump($vflturistas);

        echo '<pre>';
        
//       $vmySql = new MySql();
//      $vmySql->AbrirConexion();
//        $vmySql->start_transaction();
        try {
//It sets sql statement in order to add new user
            $vsql = "INSERT INTO c_usuario(cmpcorreo,cmpcontrasena, cmpnombre,cmpapellidoPaterno,cmpapellidoMaterno) ";
            $vsql.="VALUES('" . $vflturistas->correo . "'";
            $vsql.=", '" . $vflturistas->contrasena . "'";
            $vsql.=", '" . $vflturistas->nombre . "'";
            $vsql.=", '" . $vflturistas->apellidoPaterno . "'";
            $vsql.=", '" . $vflturistas->apellidoMaterno . "')";




            if ($vmySql->consulta($vsql)) {

                $id_ultimo_insert = mysql_insert_id();
                $vflturistas->idusuario = $id_ultimo_insert;

                if ($vmySql->ObtenerNumeroFilasAfectadas() != 1) {
                    // throw new Exception("Ocurrió un error al registrar los datos del usuario, intente de nuevo", 0);
                    return 0;
                }
            } 

         
            unset($vsql, $vmySql);

            return 1;
        } catch (Exception $vexcepcion) { //It catches exception /It returns exception code catched
                    throw new Exception($vexcepcion->getMessage(),$vexcepcion->getCode());
        }
    }

}
