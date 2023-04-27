<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $proveedores = Proveedores::paginate(4);

        return view('proveedores.index',compact('proveedores'));
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $proveedores = request()->except('_token');
        dd($proveedores);
        $proveedores = Proveedores::firstOrCreate($proveedores);
        
        return redirect('proveedores');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, proveedores $productos)
    {
        $productos = request()->except('_token');
        //dd($productos);
        $id = $productos['id'];
        $productos = Proveedores::findOrFail($id);
        $productos->nombreProvee = $request->nombreProvee;
        $productos->direccion = $request->direccion;
        $productos->correoProvee = $request->correoProvee;
        $productos->nombreContac = $request->nombreContac;
        $productos->nombrecontactodos = $request->nombrecontactodos;
        $productos->telefonodos = $request->telefonodos;
        $productos->telProvee = $request->telProvee;
        $productos->save();
        return redirect('proveedores');

       return  redirect()->back();
    }


    public function destroy(proveedores $producto)
    {
        $producto->delete();
       //dd($producto);
        return redirect('proveedores');
    }
  
   
}
