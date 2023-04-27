<?php

namespace App\Http\Controllers;

use App\Mail\AutorizadaMailable;
use App\Mail\RechazadaMailable;
use App\Models\Solicitud;
use App\Models\Especiales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\reporteExport;

class AutorizacionController extends Controller
{

    public function index()
    {
        $solicitud = solicitud::get();
        $jefe = Auth::user()->jefe;
        $user = Auth::user()->username;
        $admin = Auth::user()->role;
        $programa = Auth::user()->programa;
        $especial = especiales::get();

        $jefes = Solicitud::where('jefe','=',$user )->exists();
            //dd($jefes);
        if($jefes){
            $solicitud = DB::table('solicituds')
                        ->select('solicituds.*')
                        ->where('jefe','=',$user)
                        ->orderBy('id','DESC')
                        ->paginate(10);
                        // dd($solicituds);
        
            return view('solicitud.index',compact('solicitud','especial'));;
        
        }elseif($jefes == false){ 
            
            $solicitud = DB::table('solicituds')
                            ->select('solicituds.*')
                            ->where('username', '=',$user )
                            ->orwhere('autoriza', '=',$user )
                            ->orderBy('id','DESC')
                            ->paginate(10);
            return view('autorizacion.index',compact('solicitud','especial'));;
        }
      }

    public function create()
    {   

    }

    public function store(Request $request)
    {
        $aceptada=  "Aceptada";
        $rechazado = "Rechazada";
        $envio = "Envio a proveedor";
        $solicitud =  request()->except(['_token','_method']);
        dd($solicitud);
        $producto = $solicitud['estado'];
        $autorizador = $solicitud['correoautorizadores'];
        $usuario = $solicitud['email'];
        $id = $solicitud['id'];
        $nombrejefe = $solicitud['jefenombre'];

        if($producto == $aceptada || $producto == $envio){
            
            $solicitud = Solicitud::where('id','=',$id)->update($solicitud);
            
            // $correo = new AutorizadaMailable($solicitud);
            // Mail::to($autorizador)->send($correo);

          
         
            $solicitud = DB::table('solicituds')
                        ->select('solicituds.*')
                        ->orderBy('id','DESC')
                        ->paginate(10);
             $especial = Especiales::get();
            // dd($especial);
            return view('solicitud.index',compact('solicitud','especial'));

        }elseif ($producto == $rechazado ) {
            
            $solicitud = Solicitud::where('id','=',$id)->update($solicitud);
        //    dd("si es");
            $correo = new RechazadaMailable($solicitud,$nombrejefe);
            Mail::to($usuario)->send($correo);

            
            $solicitud = solicitud::get();
          

            return view('solicitud.index')->with('solicitud',$solicitud);
        }
          
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
          
        $productos = DB::table('productos')
            ->select('nombreProduc', 'precio', 'id','id_provee')
            ->get();
      
           
        $gestor_costos = DB::table('solicituds')
                    ->select('solicituds.centrocosto')
                    ->where('id', '=',$datosSolicitud)
                    ->get(1);
                  
        $gestor_costo = $gestor_costos[0]->centrocosto;
        $codigo =($gestor_costo);
        // dd($codigo);
        $nada = 'No hay saldo disponible '; 
     
        $response = Http::withHeaders([ 
            // "Username" => "upb_transporte" ,
            "Username" => "transporteupb" ,"Password" => "xcSxYvg70GObanj1qT8N"])
            // "Password" => "6E6NOW05Ryee0ENOIQUR"  
            ->get( 'https://ws-dev.upb.edu.co:8443/Finanzas/PptoGrupoxCuentas',[
                    "tipo" => "FORMULARIO_TRANSPORT" ,    
                    "anio_fiscal" => "21" ,    
                    "organizacion" =>$codigo,   
                    "filter" => "cuenta,cuenta_descripcion,ppto_disponible"   
    ]);    
    $responses = $response->json();  
    //   dd($responses);
        if($responses == null || $responses == "ERROR"){

            $nada = 'No hay saldo disponible ';

            $solicitud=Solicitud::findOrfail($id);
           
            // $solicitud=especiales::findOrfail($id);
           
            $asistentes = $solicitud["observAsistente"];
       
            $cambio = str_replace("[","",$asistentes);
            $cambios = str_replace("]","",$cambio);
            $solicitud["observAsistente"] = $cambios;
      
            return view('autorizacion.edit', compact('solicitud', 'autorizas', 'proveedores','productos','nada','responses'));
        }

        $solicitud = Solicitud::findOrfail($id);
       
        $solicitud=especiales::findOrfail($id);
        $asistentes = $solicitud["observAsistente"];
        $cambio = str_replace("[","",$asistentes);
        $cambios = str_replace("]","",$cambio);
        $solicitud["observAsistente"] = $cambios;
        // dd($solicitud);
        return view('autorizacion.edit', compact('solicitud', 'autorizas', 'proveedores','productos','responses'));
    }


    public function reportesvista()
    {
      
        $solicitud = DB::table('users')
                ->select('name','id')
                ->where('role','=','["5"]')
                ->get();
                

        return view('autorizacion.repoorte',compact('solicitud'));
    }

    public function reportes(Request $request)
    { 

        return Excel::download(new reporteExport,'reportes.xlsx');
    }

    public function reporteautori()
    {   
                
        return Excel::download(new reporteExport,'reportes.xlsx');
    }
}




