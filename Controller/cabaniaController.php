<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* include '../Slim/Slim.php'; */
require_once ('../slim-3.3.0/autoload.php');
require_once (dirname(dirname(__FILE__)) . '/Model/capafisica/clscFLCabania.php');

//require_once (dirname(dirname(__FILE__)) . '/Model/capafisica/clspFLTurista.php');

require_once (dirname(dirname(__FILE__)) . '/Model/capanegocio/clspBLCabania.php');





//include'../slim-3.3.0/autoload.php';
//include '../Model/capanegocio/clspBLCabania.php';
//include '../Model/capafisica/clscFLCabania.php';


//header("Content-Type: text/html;charset=utf-8");
$app = new Slim\App();


$app->post("/cabanias", function ($vrequest) {

    $vdataResponse = array();

    try {
      
        $vbody = $vrequest->getBody();
        $ventrada = json_decode($vbody);


        var_dump(json_encode($ventrada));

        $vflcabania=new clspFLCabania();

       $vflcabania->nombre=$ventrada->txtnombre;
       $vflcabania->descripcion=$ventrada->txtdescripcion;
       $vflcabania->tarifa=$ventrada->txttarifa;
 
        $vstatus = clspBLCabania::insertar_cabania($vflcabania);
    } catch (Exception $exception) {

        $vdataResponse["messageNumber"] = -100;
    }

    echo json_encode($vdataResponse);
});


$app->get("/cabanias", function () use ($app, $result) {


    $dataResponse = array();
    try {
        $obj = new clspBLCabania();
        $coleccion = new clscFLCabania();
        $result = $obj->listar_cabania($coleccion);
        if ($result == 1) {

            $dataResponse["cabanias"] = $coleccion;
        }
    } catch (Exception $exception) {

        $dataResponse["cabania"] = -100;
    }

    echo json_encode($dataResponse);
});


$app->delete("/cabanias/{idcabania}", function ($vresponse) {

    $id = $vresponse->getAttribute('idcabania');


    $dataResponse = array();
    try {
        $obj = new clspBLCabania();
        $result = $obj->eliminar_cabania($id);
        if ($result = 1) {

            echo 'hola';
        }
    } catch (Exception $exception) {
        $dataResponse["cabania"] = -100;
    }

    echo json_encode($dataResponse);
});



$app->put('/cabanias/{idcabania}', function ($vrequest) {
   
     $vdataResponse = array();

    try {

   $vbody =$vrequest->getBody();
   $ventrada=  json_decode($vbody);
   
  
   //var_dump($ventrada);
        $vflcabania = new clspFLCabania();

        $vflcabania->idcabania=$ventrada->cabania;
        $vflcabania->nombre=$ventrada->nombrec;
        $vflcabania->descripcion=$ventrada->descripcion;
        $vflcabania->tarifa=$ventrada->tarifa;
        
        
        $vstatus = clspBLCabania::editar_cabania($vflcabania);
        
        if($vstatus==1){
            
            return 1;
        }else{
            return 0;
        }
        
    } catch (Exception $exception) {

        $vdataResponse["messageNumber"] = -100;
    }

    echo json_encode($vdataResponse);
});









$app->run();
