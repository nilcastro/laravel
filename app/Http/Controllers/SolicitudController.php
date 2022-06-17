<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
   
    public function index()
    {
       
        return view('solicitud/index');
    }

    
    public function create()
    {
         $autorizas = user::all();
        //dd($autoriza);
        $proveedores =DB::table('proveedores')
                        ->select('nombreProvee')
                        ->get();
          //dd($proveedores);
        return view('solicitud/create', compact('autorizas','proveedores'));
    }

    public function store(Request $request)
    {
        $datosSolicitud = request()->except('_token');
         //dd($datosSolicitud);
         $proveedores = solicitud::firstOrCreate($datosSolicitud);
        
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


    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
