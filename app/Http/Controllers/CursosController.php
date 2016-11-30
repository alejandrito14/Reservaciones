<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cat_diplomas;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
class CursosController extends Controller
{
    //


	public function index()
    {
        //

    	$cat_diplomas=cat_diplomas::All();

     return view('curso',compact('cat_diplomas'));


    }

    public function agregar(Request $request){

    	   $datos=['Concepto'=>$request['concepto'],
         'fecha'=>$request['fecha'],  
         'Motivo'=>$request['motivo'],
         ];
           
     $iddatos=cat_diplomas::insert($datos);

     return redirect('/curso')->with('message','store');

    }

     public function edit($id)
    {
        $diploma = cat_diplomas::find($id);
      	return view('curso.edit',['diploma'=>$diploma]);


//        return view('curso.edit',['diploma'=>$diploma]);
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
    public function destroy($id) {
       $diplomas=cat_diplomas::FindOrFail($id);
       $valida=$diplomas->delete(); 

       if($valida){

       return response()->json(['success'=>'true']);


       }else{
       return response()->json(['success'=>'false']);


       }



       
      // return Redirect()->route('cursos.index');
      
        
      /*$diploma = cat_diplomas::find($id);
        
        if (is_null ($diploma))
        {
            App::abort(404);
        }
        
        $diploma->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'diploma ' . $diploma->idDiplomas . ' eliminado',
                'id'      => $diploma->idDiplomas
            ));
        }
        else
        {
            return Redirect::to('/curso');
        }*/

    }




}
