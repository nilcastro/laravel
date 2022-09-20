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
                    ->select('username','nombre_jefe','apellido_jefe','programa','email','nombre_centroc','id','role')
                    ->where('name', '=',$nombre )
                    ->get();
     
        return  response($nombre);
    }

    public function registrar(Request $request)
    {
        $nombre = $request->Nombreprove;
 
        //dd($request);
         $nombre = DB::table('proveedores')
                    ->join('productos','proveedores.id','=','productos.id_provee')
                    ->select('proveedores.correoProvee','proveedores.nombreContac','proveedores.telProvee','productos.id'
                    ,'proveedores.nombrecontactodos','proveedores.telefonodos','productos.nombreProduc','productos.precio')
                    ->where('proveedores.id', '=',$nombre )
                     ->get();

         return  response($nombre);
    }
    public function producto(Request $request)
    {
        
        $nombre = $request->producto;
        
            //dd($nombre);
        $nombre = DB::table('productos')
                    ->select('nombreProduc','precio','id_provee')   
                    ->where('id','=',$nombre   )   
                    ->get();   
        return  response($nombre);  
    }

    public function profes(Request $request)
    {
    
        $nombre = $request->nombreauto;
      
        $nombre = \DB::table('users')
                    ->select('username','nombre_jefe','apellido_jefe','programa','email','nombre_centroc','id','role')
                    ->where('name', '=',$nombre )
                    ->get();
     
        return  response($nombre);
    }

    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        //
    }
}
