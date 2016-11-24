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
        
        $dataResponse['paquetes']=$coleccion;
    }
  }catch(Exception $exception){

$dataResponse["Paquetes"]=-100;

  }

  echo json_encode($dataResponse );


});


$app->delete("/paquetes/{idpaquete}", function ($vresponse) {
    
    $id=$vresponse->getAttribute('idpaquete');
    
  
    $dataResponse=array();
    try{
        $obj=new clspBLPaquete();
        $result=$obj->eliminar_paquete($id);
      if($result=1){
          
          echo 'hola';
      }
                             
        }catch (Exception $exception){
        $dataResponse["cabania"]=-100;
        
        
    }
    
     echo json_encode($dataResponse );
});


$app->post("/paquetes", function ($vrequest) {

    $vdataResponse = array();

    try {
      
        $vbody = $vrequest->getBody();
        $ventrada = json_decode($vbody);


        var_dump(json_encode($ventrada));
        
            $vflpaquete=new clspFLPaquete();
            
            
           

//        $vflcabania=new clspFLCabania();
//
//       $vflcabania->nombre=$ventrada->txtnombre;
//       $vflcabania->descripcion=$ventrada->txtdescripcion;
//       $vflcabania->tarifa=$ventrada->txttarifa;
// 
//        $vstatus = clspBLCabania::insertar_cabania($vflcabania);
//        
//        
//        if($vstatus==1){
//           $vdataResponse["messageNumber"]=$vstatus;
//           
//        }
//        
//        
//        unset($vrequest,$vbody,$ventrada,$vflcabania,$vstatus);
          
    } catch (Exception $exception) {

        $vdataResponse["messageNumber"] = -100;
    }

    echo json_encode($vdataResponse);
});




    
    
    




$app->run();