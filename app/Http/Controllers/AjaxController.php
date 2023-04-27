<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\proveedores;
use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  

class AjaxController extends Controller
{

   
    public function store(Request $request)
    {
        $solicitud = user::where('name','=', $request->name)->get();
        return response($solicitud);       
    
    }

    public function registrar(Request $request)
    {
        $nombre = $request->Nombreprove;
 
     
         $nombre = DB::table('proveedores')
                    ->join('productos','proveedores.id','=','productos.id_provee')
                    ->select('proveedores.correoProvee','proveedores.nombreContac','proveedores.telProvee','productos.id'
                    ,'proveedores.nombrecontactodos','proveedores.telefonodos','productos.nombreProduc','productos.precio'
                    ,'productos.descrProduc')
                    ->where('proveedores.id', '=',$nombre )
                     ->get();

         return  response($nombre);
    }
    public function especial(Request $request)
    {
        $nombre = $request->Nombreprove;
        $especial = "Especial";
  
         $nombre = DB::table('proveedores')
                    ->join('productos','proveedores.id','=','productos.id_provee')
                    ->select('proveedores.correoProvee','proveedores.nombreContac','proveedores.telProvee','productos.id'
                    ,'proveedores.nombrecontactodos','proveedores.telefonodos','productos.nombreProduc','productos.precio'
                    ,'productos.descrProduc')
                    ->where('proveedores.id', '=',$nombre)
                    // ->Where('productos.descrProduc','=', $especial )
                    ->get();

         return  response($nombre);
    }
    public function producto(Request $request)
    {
        
        // $nombre = $request->producto;
        $solicitud = Productos::where('id','=', $request->id)->get();
        return response($solicitud);  
            //dd($nombre);
     
    }

    public function profes(Request $request)
    {
    
        $nombre = $request->nombreauto;
      
        $nombre = DB::table('users')
                    ->select('username','nombre_jefe','apellido_jefe','programa','email','nombre_centroc','id','role')
                    ->where('name', '=',$nombre )
                    ->get();
     
        return  response($nombre);
    }

 
}
