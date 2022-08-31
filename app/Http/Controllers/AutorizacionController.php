<?php

namespace App\Http\Controllers;

use App\Mail\AutorizadaMailable;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AutorizacionController extends Controller
{

    public function index()
    {
        $solicitud = solicitud::get();
        //dd($solicitud);

        $jefe = Auth::user()->jefe;
        $user = Auth::user()->username;
        $admin = Auth::user()->role;
        $programa = Auth::user()->programa;

            $jefes = Solicitud::where('jefe','=',$user )->exists();
          
            //dd($jefes);
            if($jefes == true){
            $solicitud = DB::table('solicituds')
                            ->select('solicituds.*')
                            ->where('jefe','=',$user)
                            ->orderBy('id','DESC')
                            ->paginate(10);
                           // dd($solicituds);
         
                return view('solicitud.index')->with('solicitud',$solicitud);
            
            }elseif($jefes == false){ 
            //dd($user);
            $solicitud = DB::table('solicituds')
                            ->select('solicituds.*')
                            ->where('username', '=',$user )
                            ->orwhere('autoriza', '=',$user )
                            ->orderBy('id','DESC')
                            ->paginate(10);
            return view('solicitud.index')->with('solicitud',$solicitud);
        }
      }

    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        $aceptada=  "Aceptada";
        $rechazado = "Rechazada";
        $solicitud =  request()->except(['_token','_method']);
       // dd($solicitud);
        $producto = $solicitud['estado'];
        $autorizador = $solicitud['correoautorizadores'];
        $id = $solicitud['id'];
        

        if($producto == $aceptada){

            $solicitud = Solicitud::where('id','=',$id)->update($solicitud);
            
            $correo = new AutorizadaMailable($solicitud);
            Mail::to($autorizador)->send($correo);

            
            $solicitud = solicitud::get();
            $solicitud['estado']= "Envio proveedor";
            
            return view('autorizacion.autorizada')->with('solicitud',$solicitud);
        }
          
        }

    

    
    public function show($id)
    {
        
    }


    public function edit($id)
    {
        $datosSolicitud = $id;

        $autorizas = DB::table('users')
            ->select('name', 'role','username','email','programa')
             ->where('role','=','["1"]')
            ->get();
       
        $proveedores = DB::table('proveedores')
            ->select('nombreProvee', 'id')
            ->get();
   
        $productos = \DB::table('productos')
            ->select('nombreProduc', 'precio', 'id','id_provee')
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
        $solicitud = Solicitud::findOrfail($id);
  
        return view('autorizacion.edit', compact('solicitud', 'autorizas', 'proveedores','productos'));
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
