
<?php

/**
 * 
 */
include_once '../Model/capadatos/clspDLCabania.php';
include_once '../Model/conexcion.php';

class clspBLCabania {

    function __construct() {
        # code...
    }

    function __destruct() {
        
    }

    public static function listar_cabania($coleccion) {


        $mysql = new Mysql();
        $mysql->AbrirConexion();

        $result = clspDLCabania::listarCabania($mysql, $coleccion);

        return $result;

        $mysql->CerrarConexion();
    }

    public static function eliminar_cabania($id) {
        $vmysql = new Mysql();
        $vmysql->AbrirConexion();

        $result = clspDLCabania::eliminar_cabania($vmysql, $id);


        return $result;

        $mysql->CerrarConexion();
    }

    public static function insertar_cabania($vflturistas) {

        $vmySql = new Mysql();
        $vmySql->AbrirConexion();
        $vmySql->start_transaction();

        if ($result = clspDLUsuario::agregarUsuarios($vmySql, $vflturistas) == 1) {

            $turistas = clspDLTurista::agregarTurista($vmySql, $vflturistas);

            if ($turistas == 1) {

                $vmySql->commit();
                echo 'se hizo commit';
            } else {

                $vmySql->rollback();

                echo 'se hizo roollback';
                return -1;
            }
        } else {

            return 0;
        }
        $vmySql->CerrarConexion();

        return 1;
    }

}

?>