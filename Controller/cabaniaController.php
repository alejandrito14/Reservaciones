<?php

/* include '../Slim/Slim.php'; */

require_once ('../slim-3.3.0/autoload.php');
require_once (dirname(dirname(__FILE__)) . '/Model/capafisica/clscFLCabania.php');

//require_once (dirname(dirname(__FILE__)) . '/Model/capafisica/clspFLTurista.php');

require_once (dirname(dirname(__FILE__)) . '/Model/capanegocio/clspBLCabania.php');


//require_once (dirname(dirname(__FILE__)) . "/Model/capafisica/clscFLTurista.php");



/* include'../slim-3.3.0/autoload.php';
  include_once'../Model/capafisica/clspFLTurista.php';
  include_once '../Model/capanegocio/clspBLTurista.php';
  include_once '../Model/capafisica/clscFLTurista.php'; */

//include '../Model/capafisica/clspFLUsuario'; 
//include '../Model/capafisica/clspFLTurista.php';




$app = new Slim\App();


$app->get("/cabanias", function () use ($app, $result) {

    /*  $obj = new productocn();
      $result = $obj->listar_producto();

      $app->response()->header("Content-Type:aplication/json");

      $json_string = json_encode($result);
      echo $json_string; */
    $dataResponse = array();
    try {
        $obj = new clspBLCabania();
        $coleccion = new clscFLCabania();
        $result = $obj->listar_cabanias($coleccion);

        if ($result == 1) {

            $dataResponse[] = $coleccion;
        }
    } catch (Exception $exception) {

        $dataResponse["cabanias"] = -100;
    }
    echo json_encode($dataResponse);
});


$app->run();


/*  $obj = new productocn();
  $result = $obj->listar_producto();

  $app->response()->header("Content-Type:aplication/json");

  $json_string = json_encode($result);
  echo $json_string; */
?>