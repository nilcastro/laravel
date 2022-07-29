<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
    
        $nombre = $request->nombreauto;
    
        $nombre = \DB::table('users')
                    ->select('username','nombre_jefe','apellido_jefe','programa')
                    ->where('name', '=',$nombre )
                    ->get();
        
        return  response($nombre);
    }

    public function registrar(Request $request)
    {
        $nombre = $request->Nombreprove;
 
        //dd($request);
         $nombre = \DB::table('proveedores')
              
                    ->select('correoProvee','nombreContac','telProvee','id','nombrecontactodos','telefonodos')
                    ->where('id', '=',$nombre )
                     ->get();
                     
     
      $final  =  $nombre;
         return  response($final);
    }
    public function producto(Request $request)
    {
        
        $nombre = $request->producto;
  
        $nombre = \DB::table('productos')
                    ->select('id_provee','precio')   
                    ->where('id','=',$nombre )   
                    ->get();   
        return  response($nombre);  
    }

    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        
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
