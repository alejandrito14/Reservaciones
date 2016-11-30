

<?php

/**
 * 
 */
include '../Model/capafisica/clspFLTurista.php';

class clspDLTurista {

    function __construct() {
        
    }

    function __destruct() {
        
    }

    public static function listarTuristas($mysql, $coleccion) {
        $consulta = $mysql->consulta("SELECT c_usuario.id_usuario,c_usuario.cmpcorreo,c_usuario.cmpcontrasena,c_usuario.cmpnombre,c_usuario.cmpapellidoPaterno,c_usuario.cmpapellidoMaterno,c_turista.cmpnumeroTelefono,c_turista.cmplugarOrigen,c_turista.cmpfechaNacimiento FROM c_usuario INNER JOIN c_turista ON c_usuario.id_usuario=c_turista.id_usuario");
        if ($mysql->num_rows($consulta) > 0) {
            while ($resultados = $mysql->fetch_array($consulta)) {
                $turista = new clspFLTurista();


                $turista->idusuario = $resultados['id_usuario'];
                $turista->correo = $resultados['cmpcorreo'];
                $turista->contrasena = $resultados['cmpcontrasena'];
                $turista->nombre = $resultados['cmpnombre'];
                $turista->apellidoPaterno = $resultados['cmpapellidoPaterno'];
                $turista->apellidoMaterno = $resultados['cmpapellidoMaterno'];
                $turista->numeroTelefono = $resultados['cmpnumeroTelefono'];
                $turista->lugarOrigen = $resultados['cmplugarOrigen'];
                $turista->fechaNacimiento = $resultados['cmpfechaNacimiento'];

                $coleccion->turistas [] = $turista;
                //  echo json_encode($coleccion);
            }
            return 1;
        }

        return 0;
    }

    public static function agregarTurista($vmySql, $vflturistas) {
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
//            $vflturistas->idusuario = $resultados['id_usuario'];
        }
    }

    public static function inicio_sesion($vmySql,$coleccion,$usuario,$contrasena) {
        try {

            $consulta = $vmySql->consulta("SELECT * FROM `c_usuario` WHERE cmpcorreo=\"$usuario\" AND cmpcontrasena=\"$contrasena\"");

            if ($vmySql->num_rows($consulta) > 0) {
            while ($resultados = $vmySql->fetch_array($consulta)) {
                $turista = new clspFLTurista();


                $turista->idusuario = $resultados['id_usuario'];
                $turista->nombre=$resultados['cmpnombre'];
                $turista->correo = $resultados['cmpcorreo'];
               

                $coleccion->turistas [] = $turista;
                //  echo json_encode($coleccion);
            }
            return 1;
        }
            unset($vmySql);
            return 0;
        
        } catch (Exception $vexcepcion) {

            throw new Exception($vexcepcion->getMessage(), $vexcepcion->getCode());
        }
    }

}
?>