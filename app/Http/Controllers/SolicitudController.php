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

        //dd($solicitud);
        return view('solicitud/index');
    }


    public function create()
    {
         $autorizas = user::all();
        //dd($autorizas);
        $proveedores =DB::table('proveedores')
                        ->select('nombreProvee','id')
                        ->get();
        $productos =DB::table('productos')
                        ->select('nombreProduc','precio','id')
                        ->get();
         // dd($productos);
        return view('solicitud/create', compact('autorizas','proveedores','productos'));
    }

    public function store(Request $request)
    {

        $datosSolicitud = request()->except('_token');
         //dd($datosSolicitud);
         $proveedores = solicitud::firstOrCreate($datosSolicitud);

         return redirect('autorizacion');
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

    public function autosearch(Request $request)
    {
        if($request->ajax()){
            $data = Solicitud::where('nombreauto','LIKE', $request->name.'%')->get();

            return $data;
        }
    }
}
