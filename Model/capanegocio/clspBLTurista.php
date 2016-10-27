
<?php

/**
 * 
 */
include '../Model/capadatos/clspDLTurista.php';

class clspBLTurista {

    function __construct() {
        # code...
    }

    function __destruct() {
        
    }

    public static function listar_turista($coleccion) {


        $mysql = new Mysql();
        $mysql->AbrirConexion();

        $result = clspDLTurista::listarTuristas($mysql, $coleccion);
        //cambiar nombre a clscDLTurista
        return $result;
        /* $obj = new productoscd();
          $result = $obj->lista_productos();

          return $result; */
        $mysql->CerrarConexion();
    }

    public static function insertar_turista($vflturistas) {

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
        } 
        else {

            return 0;
        }
        $vmySql->CerrarConexion();

        return 1;
    }

    public static function iniciar_sesion($vflturistas) {
        $vmySql = new Mysql();
        $vmySql->AbrirConexion();


        if ($resul = clspDLTurista::inicio_sesion($vmySql, $vflturistas) == 1) {
            
            
        } 
        else {
            
        }
        
         $vmySql->CerrarConexion();
    }

}

?>