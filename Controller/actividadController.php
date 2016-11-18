<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ('../slim-3.3.0/autoload.php');
require_once (dirname(dirname(__FILE__)) . '/Model/capafisica/clscFLActividad.php');

//require_once (dirname(dirname(__FILE__)) . '/Model/capafisica/clspFLTurista.php');

require_once (dirname(dirname(__FILE__)) . '/Model/capanegocio/clspBLActividad.php');



//header("Content-Type: text/html;charset=utf-8");
$app = new Slim\App();


$app->get("/actividades", function () use ($app, $result) {


    $dataResponse = array();
    try {
        $obj = new clspBLActividad();
        $coleccion = new clscFLActividad();
        $result = $obj->listar_Actividades($coleccion);
        if ($result == 1) {

            $dataResponse['actividades'] = $coleccion;
        }
    } catch (Exception $exception) {

        $dataResponse["actividad"] = -100;
    }

    echo json_encode($dataResponse);
});


$app->post("/actividades", function ($vrequest) {

    $vdataResponse = array();

    try {

        $vbody = $vrequest->getBody();
        $ventrada = json_decode($vbody);


        var_dump(json_encode($ventrada));

        $vflactividad = new clspFLActividad();

        $vflactividad->nombreActividad = $ventrada->txtnombre;
        $vflactividad->tarifa = $ventrada->txttarifa;
        $vflactividad->detalle = $ventrada->txtdetalle;


        $vstatus = clspBLActividad::insertar_actividad($vflactividad);
    } catch (Exception $exception) {

        $vdataResponse["messageNumber"] = -100;
    }

    echo json_encode($vdataResponse);
});


$app->delete("/actividades/{idactividad}", function ($vresponse) {

    $id = $vresponse->getAttribute('idactividad');


    $dataResponse = array();
    try {
        $obj = new clspBLActividad;
        $result = $obj->eliminar_actividad($id);
        if ($result = 1) {

            echo 'hola';
        }
    } catch (Exception $exception) {
        $dataResponse["actividad"] = -100;
    }

    echo json_encode($dataResponse);
});










$app->run();
