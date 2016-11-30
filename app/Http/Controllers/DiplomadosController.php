<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\m_diplomas;
use PDF;
use App\cat_diplomas;
use Illuminate\Support\Facades\Session;

class DiplomadosController extends Controller
{
    //


 public function index()
    {
        //

      $Concepto=cat_diplomas::lists('Concepto','idDiplomas');


     return view('welcome',compact('Concepto'));


    }

  

     public function ingresar(Request $request){
          $datos=['nombre'=>$request['nombre'],
         'apellido_p'=>$request['apellido_p'],  
         'apellido_m'=>$request['apellido_m'],
         'correo'=>$request['correo']];
           
     $iddatos=m_diplomas::insertGetId($datos);

    

     $correo=$request['correo'];
     $nombre=$request['nombre'];
     $apellido_p=$request['apellido_p'];
     $apellido_m=$request['apellido_m'];
     $curso=$request['curso'];

    
      $array= ['id'=>$iddatos,'nombre'=>$nombre,'apellido_p'=>$apellido_p,'apellido_m'=>$apellido_m,'curso'=>$curso];





      Mail::send("email.bienvenido",$array, function($message)use($correo,$nombre) {



        $message->to($correo,$nombre )
        ->subject("Bienvenido !");
    });
   
   return redirect('/')->with('message','agregado');;
   

    }


    public function generarpdf($id,$diploma){
     
        //$array = ['id'=>$id];

$diplomados = DB::table('m_diplomados')->where('iddiplomados', '=', $id)->get();

$curso=DB::table('cat_diplomas')->where('idDiplomas','=',$diploma)->get();

 //return var_dump($diplomados->nombre);
   
    $pdf=PDF::loadView('pdf',['diplomados'=> $diplomados,'cursos'=>$curso]);
    $pdf->setPaper("A4", "landscape");
//PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')


    return $pdf->download('archivo.pdf');
 

         
    }



      public function create()
    {
        



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
