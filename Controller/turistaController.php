<?php

/* include '../Slim/Slim.php'; */

require_once ('../slim-3.3.0/autoload.php');
require_once (dirname(dirname(__FILE__)) . '/Model/capafisica/clscFLTurista.php');

//require_once (dirname(dirname(__FILE__)) . '/Model/capafisica/clspFLTurista.php');

require_once (dirname(dirname(__FILE__)) . '/Model/capanegocio/clspBLTurista.php');

require_once (dirname(dirname(__FILE__)) . '/Model/capanegocio/clspBLUsuario.php');

//require_once (dirname(dirname(__FILE__)) . "/Model/capafisica/clscFLTurista.php");



/* include'../slim-3.3.0/autoload.php';
  include_once'../Model/capafisica/clspFLTurista.php';
  include_once '../Model/capanegocio/clspBLTurista.php';
  include_once '../Model/capafisica/clscFLTurista.php'; */

//include '../Model/capafisica/clspFLUsuario'; 
//include '../Model/capafisica/clspFLTurista.php';




$app = new Slim\App();


$app->get("/turistas", function () use ($app, $result) {

    /*  $obj = new productocn();
      $result = $obj->listar_producto();

      $app->response()->header("Content-Type:aplication/json");

      $json_string = json_encode($result);
      echo $json_string; */
    $dataResponse = array();
    try {
        $obj = new clspBLTurista();
        $coleccion = new clscFLTurista();
        $result = $obj->listar_turista($coleccion);

        if ($result == 1) {

            $dataResponse[] = $coleccion;
        }
    } catch (Exception $exception) {

        $dataResponse["turistas"] = -100;
    }
    echo json_encode($dataResponse);
});

$app->get("/ejemplo", function () use ($app, $result) {

    echo "hola";
});



$app->post("/turistas", function ($vrequest) {

    $vdataResponse = array();

    try {


        $vbody = $vrequest->getBody();
        $ventrada = json_decode($vbody);


        var_dump(json_encode($ventrada));



        $vflturistas = new clspFLTurista();


        $vflturistas->correo = $ventrada->txtemail;
        $vflturistas->contrasena = $ventrada->txtcontrasena;
        $vflturistas->nombre = $ventrada->txtfirstName;
        $vflturistas->apellidoPaterno = $ventrada->txtapPaterno;
        $vflturistas->apellidoMaterno = $ventrada->txtapMaterno;
        $vflturistas->numeroTelefono = $ventrada->txttelefono;
        $vflturistas->lugarOrigen = $ventrada->txtLo;
        $vflturistas->fechaNacimiento = $ventrada->txtFecha_na;

        $vstatus = clspBLTurista::insertar_turista($vflturistas);
    } catch (Exception $exception) {

        $vdataResponse["messageNumber"] = -100;
    }

    echo json_encode($vdataResponse);
});


$app->get("/login", function ($vrequest) {

    $vdataResponse = array();

    try {


        $vbody = $vrequest->getBody();
        $ventrada = json_decode($vbody);
        var_dump(json_encode($ventrada));
        $vflturistas = new clspFLTurista();
        $vflturistas->correo = $ventrada->txtemail;
        $vflturistas->contrasena = $ventrada->txtcontrasena;

        $vstatus = clspBLTurista::iniciar_sesion($vflturistas);
    } catch (Exception $exception) {

        $vdataResponse["messageNumber"] = -100;
    }

    echo json_encode($vdataResponse);
});




$app->run();


/*  $obj = new productocn();
  $result = $obj->listar_producto();

  $app->response()->header("Content-Type:aplication/json");

  $json_string = json_encode($result);
  echo $json_string; */
?>