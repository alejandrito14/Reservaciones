

<?php

include_once '../Model/capafisica/clspFLCabania.php';

class clspDLCabania {

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

    public static function listarCabania($mysql, $coleccion) {

        $consulta = $mysql->consulta("SELECT * FROM c_cabania");

        if ($mysql->num_rows($consulta) > 0) {
            while ($resultados = $mysql->fetch_array($consulta)) {
                $cabania = new clspFLCabania();

                $cabania->idcabania = $resultados['id_cabania'];
                $cabania->nombre = $resultados['cmpnombre'];
                $cabania->tarifa = $resultados['cmptarifa'];
                $cabania->descripcion = $resultados['cmpdescripcion'];
                
                


                $coleccion->cabanias [] = $cabania;
                // echo json_encode($coleccion);
            }
            return 1;
        }

        return 0;
    }
    
    
    public static function eliminar_cabania($vmysql,$id){
        try{
        $consulta=$vmysql->consulta( "DELETE FROM c_cabania WHERE id_cabania=\"$id\" ");
        
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

//    public static function agregarTurista($vmySql, $vflturistas) {
////             $vmySql = new MySql();
////             $vmySql->AbrirConexion();
//
//        try {
////It sets sql statement in order to add new turist
//            echo '<pre>';
//            var_dump($vflturistas);
//            echo '<pre>';
//            /*
//              $vsql = "INSERT INTO c_usuario(cmpcorreo,cmpcontrasena, cmpnombre,cmpapellidoPaterno,cmpapellidoMaterno) ";
//              $vsql.="VALUES('". $vflturistas->correo . "'";
//              $vsql.=", '" . $vflturistas->contrasena . "'";
//              $vsql.=", '" . $vflturistas->nombre . "'";
//              $vsql.=", '" . $vflturistas->apellidoPaterno . "'";
//              $vsql.=", '" . $vflturistas->apellidoMaterno . "')";
//             */
//
//            $vsql = "INSERT INTO c_turista(id_usuario,cmpnumeroTelefono,cmplugarOrigen, cmpfechaNacimiento) ";
//            $vsql.="VALUES('" . $vflturistas->idusuario . "'";
//            $vsql.=", '" . $vflturistas->numeroTelefono . "'";
//            $vsql.=", '" . $vflturistas->lugarOrigen . "'";
//            $vsql.=", '" . $vflturistas->fechaNacimiento . "')";
//
//            if ($vmySql->consulta($vsql)) {
//
//                if ($vmySql->ObtenerNumeroFilasAfectadas() != 1) {
//                    return 0;
//                }
//            }
//
//
//            unset($vsql, $vmySql);
//
//            return 1;
//        } catch (Exception $vexcepcion) { //It catches exception /It returns exception code catched
//            throw new Exception($vexcepcion->getMessage(), $vexcepcion->getCode());
//        }
//    }
}
?>