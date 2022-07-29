<?php

namespace App\Http\Controllers;

use App\Mail\AsignacionMailable;
use App\Models\Proveedores;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class SolicitudController extends Controller
{
   
    public function index()
    {
        $solicitud = solicitud::paginate(10);
        //dd($solicitud);
        return view('solicitud/index', compact('solicitud'));
    }

    
    public function create()
    {
         $autorizas = user::all();
      
       // dd($autorizas);
        $proveedores =DB::table('proveedores')
                        ->select('nombreProvee','id')
                        ->get();
        $productos =\DB::table('productos')
                        ->select('nombreProduc','precio','id')
                        ->get();              
         // dd($productos);
        //  $proxyUsers = Http::withHeaders([
        //     "Username" => "upb_refrigerios",
        //     "Password" => "MFcbPby4x1LBFCvbxI2W"
        //   ])->get('https://ws-dev.upb.edu.co:8443/Empleados/Ubicaciones', [
        //      "pidm" => $email_P,
        //      "filter" => "desc_cargo,id_jefe_inmediato,desc_centro_costo,nombre_dependencia" 
        //   ]);
        //   $proxyUserss = $proxyUsers->json();
        return view('solicitud/create', compact('autorizas','proveedores','productos'));
    }

    public function store(Request $request)
    {
        
        $datosSolicitud = request()->except('_token','mas');
        $jefe = $datosSolicitud['jefe'];
       
        //dd($jefe);
         $solicitud = solicitud::firstOrCreate($datosSolicitud);
         $correo = new AsignacionMailable($solicitud);
            
         Mail::to($jefe)->send($correo);

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
}
