<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



require_once ('../slim-3.3.0/autoload.php');
require_once (dirname(dirname(__FILE__)) . '/Model/capafisica/clscFLPaquete.php');

//require_once (dirname(dirname(__FILE__)) . '/Model/capafisica/clspFLTurista.php');

require_once (dirname(dirname(__FILE__)) . '/Model/capanegocio/clspBLPaquete.php');



//header("Content-Type: text/html;charset=utf-8");
$app  = new Slim\App();


$app->get("/paquetes", function () use ($app, $result) {

   
$dataResponse=array();
try{
    $obj = new clspBLPaquete();
    $coleccion = new clscFLPaquete();
    $result = $obj->listar_paquete($coleccion);
    if ($result == 1) {
        
        $dataResponse[]=$coleccion;
    }
  }catch(Exception $exception){

$dataResponse["Paquetes"]=-100;

  }

  echo json_encode($dataResponse );


});



    
    
    




$app->run();