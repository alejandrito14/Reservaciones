<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
 //   return view('welcome');
//});


Route::get('/','DiplomadosController@index');

Route::get('pdf',function(){


$diplomas=App\m_diplomas::all();

$pdf=PDF::loadView('pdf',['diplomas'=>$diplomas]);
return $pdf->download('archivo.pdf');

});


Route::resource('diplomas','CursosController');


//Route::get('pdfprueba/{id}',function($id){

//return 'user'.$id;

//});
Route::resource('cursos','CursosController');




Route::get('pdfprueba/{id}/{curso}','DiplomadosController@generarpdf');

Route::get('curso','CursosController@index');
Route::post('agregar','CursosController@agregar');


Route::post('ingresar','DiplomadosController@ingresar');


