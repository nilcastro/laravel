<?php

namespace App\Http\Controllers;

use App\Mail\AutorizadaMailable;
use App\Mail\RechazadaMailable;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

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
            return view('autorizacion.index')->with('solicitud',$solicitud);
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
        //   dd($solicitud);
        $producto = $solicitud['estado'];
        $autorizador = $solicitud['correoautorizadores'];
        $usuario = $solicitud['email'];
        $id = $solicitud['id'];
        $nombrejefe = $solicitud['jefenombre'];

        if($producto == $aceptada || $producto == $envio){

            $solicitud = Solicitud::where('id','=',$id)->update($solicitud);
            
            $correo = new AutorizadaMailable($solicitud);
            Mail::to($autorizador)->send($correo);

            
            $solicitud = solicitud::get();
          

            return view('solicitud.index')->with('solicitud',$solicitud);

        }elseif ($producto == $rechazado ) {
            
            $solicitud = Solicitud::where('id','=',$id)->update($solicitud);
           // dd("si es");
            $correo = new RechazadaMailable($solicitud,$nombrejefe);
            Mail::to($usuario)->send($correo);

            
            $solicitud = solicitud::get();
          

            return view('solicitud.index')->with('solicitud',$solicitud);
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

        $gestor_costos = DB::table('solicituds')
                    ->select('solicituds.centrocosto')
                    ->where('id', '=',$datosSolicitud)
                    ->get(1);
               
        $gestor_costo = $gestor_costos[0]->centrocosto;
       
        $nada = 'No hay saldo disponible '; 
        $response = Http::withHeaders(["Username" => "transporteupb","Password" => "xcSxYvg70GObanj1qT8N"])
                ->get( 'https://ws-dev.upb.edu.co:8443/Finanzas/PptoGrupoxCuentas',[
                        "tipo" => "FORMULARIO_TRANSPORT" ,    
                        "anio_fiscal" => "21" ,    
                        "organizacion" =>$gestor_costo,   
                        "filter" => "cuenta,cuenta_descripcion,ppto_disponible"   
                        ]);          

        $responses = $response->json();
    
        if($responses == null){

            $nada = 'No hay saldo disponible ';
            $solicitud=Solicitud::findOrfail($id);
            
            // $solicitu =$solicitud['observAsistente'];
            // $solicitude = json_decode($solicitu);
            // $solicitud['observAsistente'] = $solicitude;
            // dd($solicitud);
            return view('autorizacion.edit', compact('solicitud', 'autorizas', 'proveedores','productos','nada','responses'));
        }

        $solicitud = Solicitud::findOrfail($id);
  
        return view('autorizacion.edit', compact('solicitud', 'autorizas', 'proveedores','productos','responses'));
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
