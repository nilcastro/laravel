<?php

namespace App\Http\Controllers;

use App\Mail\AsignacionEspecialMailable;
use App\Mail\AutorizadoEspecialMailable;
use App\Mail\EnvioproveeEspecialMailable;
use App\Mail\RechazadaEspecialMailable;
use App\Models\Proveedores;
use App\Models\Productos;
use App\Models\Especiales;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;


class EspecialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitud = solicitud::get();
        // dd($solicitud);

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
            // dd($jefes);
            $solicitud = DB::table('especiales')
                            ->select('especiales.*')
                            ->where('username', '=',$user )
                            ->orwhere('autoriza', '=',$user )
                            ->orderBy('id','DESC')
                            ->paginate(10);
            return view('especial.index')->with('solicitud',$solicitud);
        }
      }
    public function create()
    { 
        $con =  '["5"]';
        $sin = '["1","5"]';
        $activo = 1;
        $especial = 2;
        $especiales= "SI";
        $productEspec = "Especial";
        $autorizas = DB::table('users')
            ->select('name','apellidos','role','nombre_centroc','id')
            ->where('role','=',$con)
            ->orwhere('role','=',$sin)
            ->get();

         $proveedores = DB::table('proveedores')
            ->select('proveedores.*')
            ->where('activo','=',$especial)
            ->orwhere('especial','=',$especiales)
            ->get();
           
        $productos = DB::table('productos')
            ->select('productos.*')
            ->where('descrProduc','=',$productEspec)
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
        // $proveedores = Productos::all()->pluck('id_provee','nombreProduc');
        // paa caragr por medio de la relacion los permisos 
  
        return view('especial/create', compact('autorizas', 'proveedores', 'productos'));
    }
    public function store(Request $request)
    {

        $datosSolicitud = request()->except('_token', 'mas');
        
        $array  =  $datosSolicitud['observAsistente'];
        $arr = json_encode($array);
        $datosSolicitud['observAsistente']= $arr; 

        $jefe = $datosSolicitud['email_jefe'];
        $nombrejefe = $datosSolicitud['jefenombre'];
        $provee = $datosSolicitud['Nombreprove'];
        $product = $datosSolicitud['producto'];
        $product2 = $datosSolicitud['productodos'];
        $product3 = $datosSolicitud['productotres'];
        $product4 = $datosSolicitud['productocuatro'];
        $product5 = $datosSolicitud['productocinco'];
       
        // convierte id proveedor en nombre proveedor 
        $solicitud = Proveedores::where('id','=',$provee)->get();
        $datosSolicitud['Nombreprove']= $solicitud[0]->nombreProvee; 
     
        // convierte id producto en nombre producto. arreglar que si van vacios no gaurda solcitud
        if($datosSolicitud['producto'] != null){
            $solicitud = Productos::where('id','=',$product)->get();
            $datosSolicitud['producto']= $solicitud[0]->nombreProduc; 
        }else{
            $datosSolicitud['producto']='';
        }
       
        if($datosSolicitud['productodos'] != null){
            $solicitud = Productos::where('id','=',$product2)->get();
            $datosSolicitud['productodos']= $solicitud[0]->nombreProduc; 
        }else{
            $datosSolicitud['productodos']='';
        }

        if($datosSolicitud['productotres'] != null){
            $solicitud = Productos::where('id','=',$product3)->get();
            $datosSolicitud['productotres']= $solicitud[0]->nombreProduc; 
        }else{
            $datosSolicitud['productotres']='';
        }

        if($datosSolicitud['productocuatro'] != null){
            $solicitud = Productos::where('id','=',$product4)->get();
            $datosSolicitud['productocuatro']= $solicitud[0]->nombreProduc; 
        }else{
            $datosSolicitud['productocuatro']='';
        }

        if($datosSolicitud['productocinco'] != null){
            $solicitud = Productos::where('id','=',$product5)->get();
            $datosSolicitud['productocinco']= $solicitud[0]->nombreProduc; 
        }else{
            $datosSolicitud['productocinco']='';
        }
   
        //creación de la solicitud en la table solicitud  
        $solicitud = especiales::firstOrCreate($datosSolicitud);
       
        // envio de correo electronico al jefe 
        $correo = new AsignacionEspecialMailable($solicitud,$nombrejefe);
        Mail::to($jefe)->send($correo);

        return redirect('especial');
    }


    public function jefes(Request $request)
    {
        $aceptada=  "Aceptada";
        $rechazado = "Rechazada";
        $envio = "Envio a proveedor";
        $solicitud =  request()->except(['_token','_method']);
          
        $producto = $solicitud['estado'];
        $autorizador = $solicitud['correoautorizadores'];
        $usuario = $solicitud['email'];
        $id = $solicitud['id'];
        $nombrejefe = $solicitud['jefenombre'];

        if($producto == $aceptada || $producto == $envio){

            $solicitud = especiales::where('id','=',$id)->update($solicitud);
            
            $correo = new AutorizadoEspecialMailable($solicitud);
            Mail::to($autorizador)->send($correo);

            
            $solicitud = solicitud::get();
          

            return redirect('solicitud')->with('solicitud',$solicitud);

        }elseif ($producto == $rechazado ) {
            
            $solicitud = especiales::where('id','=',$id)->update($solicitud);
        //    dd("si es");
            $correo = new RechazadaEspecialMailable($solicitud,$nombrejefe);
            Mail::to($usuario)->send($correo);

            
            $solicitud = solicitud::get();
          

            return redirect('solicitud.index')->with('solicitud',$solicitud);
        }
          
        }
    public function envioprovee(Request $request)
    {
        $aceptada=  "Aceptada";
        $rechazado = "Rechazada";
        $envio = "Envio a proveedor";
        $solicitud =  request()->except(['_token','_method']);
        //  dd($solicitud);
          
        $producto = $solicitud['estado'];
        $autorizador = $solicitud['correoautorizadores'];
        $usuario = $solicitud['email'];
        $id = $solicitud['id'];
        $nombrejefe = $solicitud['jefenombre'];

        if($producto == $aceptada || $producto == $envio){

            $solicitud = especiales::where('id','=',$id)->update($solicitud);
            
            $correo = new EnvioproveeEspecialMailable($solicitud);
            Mail::to($autorizador)->send($correo);

            
            $solicitud = solicitud::get();
          

            return redirect('especial')->with('solicitud',$solicitud);

        }elseif ($producto == $rechazado ) {
            
            $solicitud = especiales::where('id','=',$id)->update($solicitud);
        //    dd("si es");
            $correo = new RechazadaEspecialMailable($solicitud,$nombrejefe);
            Mail::to($usuario)->send($correo);

            
            $solicitud = solicitud::get();
          

            return redirect('solicitud.index')->with('solicitud',$solicitud);
        }
    }
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $datosSolicitud = $id;
        // dd($datosSolicitud);
        $autorizas = DB::table('users')
            ->select('name','apellidos','role','username','email','programa')
             ->where('role','=','["1"]')
            ->get();
       
        $proveedores = DB::table('proveedores')
            ->select('nombreProvee', 'id')
            ->get();
   
        $productos = DB::table('productos')
            ->select('nombreProduc', 'precio', 'id','id_provee','descrProduc')
            ->get();
       
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

            $solicitud=Especiales::findOrfail($id);
            
            // $solicitu =$solicitud['observAsistente'];
            // $solicitude = json_decode($solicitu);
            // $solicitud['observAsistente'] = $solicitude;
            // dd($solicitud);
            return view('especial.edit', compact('solicitud', 'autorizas', 'proveedores','productos','nada','responses'));
        }

        $solicitud = Especiales::findOrfail($id);
  
        return view('especial.edit', compact('solicitud', 'autorizas', 'proveedores','productos','responses'));
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
