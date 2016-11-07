<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*include '../Slim/Slim.php';*/
include'../slim-3.3.0/autoload.php';
include '../Model/capanegocio/clspBLCabania.php';
include '../Model/capafisica/clscFLCabania.php';


//header("Content-Type: text/html;charset=utf-8");
$app  = new Slim\App();


$app->get("/cabanias", function () use ($app, $result) {

   
$dataResponse=array();
try{
    $obj = new clspBLCabania();
    $coleccion = new clscFLCabania();
    $result = $obj->listar_cabania($coleccion);
    if ($result == 1) {
        
        $dataResponse[]=$coleccion;
    }
  }catch(Exception $exception){

$dataResponse["cabania"]=-100;

  }

  echo json_encode($dataResponse );


});



    
    
    




$app->run();