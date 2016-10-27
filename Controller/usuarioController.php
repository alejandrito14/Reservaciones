<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*include '../Slim/Slim.php';*/
include'../slim-3.3.0/autoload.php';
include '../Model/capanegocio/clspBLUsuario.php';
include '../Model/capafisica/clscFLUsuario.php';



$app  = new Slim\App();


$app->get("/usuarios", function () use ($app, $result) {

    /*  $obj = new productocn();
      $result = $obj->listar_producto();

      $app->response()->header("Content-Type:aplication/json");

      $json_string = json_encode($result);
      echo $json_string; */
$dataResponse=array();
try{
    $obj = new clspBLUsuario();
    $coleccion = new clscFLUsuario();
    $result = $obj->listar_usuario($coleccion);

    if ($result == 1) {
        
        $dataResponse[]=$coleccion;

    }
  }catch(Exception $exception){

$dataResponse["turistas"]=-100;

  }
  echo json_encode($dataResponse);


});



    
    
    




$app->run();