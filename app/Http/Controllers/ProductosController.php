<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $productos = Productos::all();
        $proveedores['proveedores'] = proveedores::all();
        //dd($proveedores);
       // $productos = Productos::select('nombreprocee')->get->load('proveedores');
        //,'dd($proveedores);
        // $productos = \DB::table('proveedores')
        //             ->select('nombreprovee')
        //             ->get();
        //     $con = ($productos[0]) ;  
        //     $si =($con->nombreprovee);
            //dd($provee);
        return view('productos.index',$proveedores)->with('productos',$productos);
    }

   
    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        $productos = request()->except('_token');
       // dd($productos);
    //     $provee = $productos['id_provee'];
    //     $producto = DB::table('proveedores')
    //                     ->select('nombreProvee')
    //                     ->where('id','=',$provee)
    //                     ->get()->toArray();
        
    //   $producto =  $producto[0];
    //   $json = json_encode(json_encode($producto));

    //                     dd($json);
    //     //$producto->json($producto);
    //     $productos['nombreProvee'] = $json;
    //dd($productos);
        $productos = Productos::firstOrCreate($productos);

        return redirect('productos');
    }

 
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
       
    }

  
    public function update(Request $request, productos $productos)
    {
        $productos = request()->except('_token');
        //dd($productos);
        $id = $productos['id'];
        $productos = Productos::findOrFail($id);
        $productos->nombreProduc = $request->nombreProduc;
        $productos->descrProduc = $request->descrProduc;
        $productos->precio = $request->precio;
        $productos->save();
        return redirect('productos');

       return  redirect()->back();
    }


    public function destroy(productos $producto)
    {
        $producto->delete();
        return redirect('productos');
    }
   
   
}
