<?php

namespace App\Http\Controllers;

use App\Events\NewApplicationRegisteredEvent;
use App\Events\SolicitudEvent;
use App\Models\vehiculo;
use App\Models\Browse;
use App\Models\reportes;
use App\Models\taxi;
use App\Models\presupuesto;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SolicitudController as ControllersSolicitudController;
use App\Mail\CordinadorMailable;
use App\Models\User;
use App\Notifications\SolicitudNotification;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Mail\TransportesMailable;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;
//use Illuminate\Support\Facades\Request;


class SolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:reportes')->only('reportes');
        $this->middleware('validar')->only('validar');
    }
    public function index()
    {

        $estado = "Aceptada";
        $estadod = "Asignada";
        $sede = Auth::user()->SEDE;
        $user = Auth::user()->username;
        $admin = Auth::user()->role_id;
        // dd($admin);
        /* si es admin */
       if($admin == "1"){   
        $solicituds = \DB::table('solicituds')
                    ->select('solicituds.*')
			        ->where('ID_usuario','=',$user)
                    ->orwhere('sede', '=',$sede )
               
                    ->orderBy('id','DESC')
                    ->paginate(10);
               //dd('erntro');
        $datos['browses']=Browse::paginate(10); 
        return view('solicitud.index', $datos)->with('solicituds',$solicituds);
       }

        /* Si es jefe  */
        $jefe = Solicitud::where('jefe','=',Auth::user()->username)->exists();
            //dd($jefe        );
        if($jefe == true){
        $solicituds = \DB::table('solicituds')
                        ->select('solicituds.*')
                        ->where('jefe','=',$user)
                        ->orwhere('ID_usuario', '=',$user )
                        ->orderBy('id','DESC')
                        ->paginate(10);
                       // dd('erntro');
            $datos['browses']=Browse::paginate(10); 
            return view('solicitud.index', $datos)->with('solicituds',$solicituds);
        
        }elseif($jefe == false){ 
        //dd($user);
        $solicituds = \DB::table('solicituds')
                        ->select('solicituds.*')
                        ->where('ID_usuario', '=',$user )
			            ->where('SEDE', '=',$sede )
                        ->orderBy('id','DESC')
                        ->paginate(10);
            
        $datos['browses']=Browse::paginate(10); 
        return view('solicitud.index', $datos)->with('solicituds',$solicituds);
      }

    }

   
    public function create(Request $request)
    {
        
         return view('solicitud.create');
                                      
    }

  
    public function store(Request $request)
    {
      
        $campos=[

         'Nombre'=>'required|string|max:100',
         'Cargo'=>'required|string|max:100',
         'Telefono'=>'required|string|max:100',
         'Celular'=>'required|string|max:100',
         'Codigo'=>'required|string|max:100',
         'dia'=>'required|string|max:100',
        
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'Nombre.required'=>'El nombre del solicitante es requerido',
            'Cargo.required'=>'El cargo del solicitante es requerido',
            'Telefono.required'=>'El número de telefono es requerido',
            'Celular.required' => 'El número de celular es requerido',
            'Codigo.required' => 'El código de la organización es requerido',
            'dia.required' => 'La fecha de salida es requerida',
           
        ];
        $this->validate($request,$campos,$mensaje);        
        $datosSolicitud = request()->except('_token');
        $datosSolicitud['user_id'] = $datosSolicitud['jefe'];
        $email =  $datosSolicitud['emailjefe'];
         //dd($datosSolicitud);
         $jefe  = Auth::user()->role_id;
         //dd($jefe);
        if($jefe == "3"){
            $datosSolicitud['jefe'] = null;

            if($request->hasFile('recorridoad')){
                $datosSolicitud['personas']=$request->file('personas')->store('uploads','public');
            }

           $solicitud = Solicitud::create($datosSolicitud);
            //dd($solicitud);
            SolicitudEvent::dispatch($solicitud);
           // dd('hola');
            $correo = new TransportesMailable($solicitud);
            
            Mail::to($email)->send($correo);
            //dd('hola');
            return redirect('solicitud')->with('mensaje','Nueva solicitud creada y enviada con exito  ');
        }
   
      
         if($request->hasFile('recorridoad')){
            $datosSolicitud['personas']=$request->file('personas')->store('uploads','public');
        }

      
       $solicitud = Solicitud::firstOrCreate($datosSolicitud);
        //dd($solicitud);
    //     SolicitudEvent::dispatch($solicitud);
    //    // dd('hola');
    //     $correo = new TransportesMailable($solicitud);
        
    //     Mail::to($email)->send($correo);
        //dd('hola');
        return redirect('solicitud')->with('mensaje','Nueva solicitud creada y enviada con exito  ');
    }

   
    public function show()
    {
        $solicitudnotifcaion = auth()->user()->unreadNotifications;
        return view('solicitud.notification', compact('solicitudnotifcaion'));  
    }


    public function markNotification(Request $request)
    {
        auth()->user()->unreadNotifications
            ->when($request->input('id'), function($query) use ($request){
                return $query->where('id',$request->input('id'));
            })->markAsRead();
            return response()->noContent();
    }


    public function edit($id)
    {
       // $Codigo = "Codigo";
           // dd($Codigo);
        $gestor_costos = \DB::table('solicituds')
                            ->select('solicituds.Codigo')
                            ->where('id', '=',$id)
                           
                            ->get(1);
        
        $gestor_costo = ($gestor_costos[0]);
        //dd($gestor_costo);
        $si = ($gestor_costo->Codigo);
            //dd($si);
          
        $response = Http::withHeaders([

            "Username" => "transporteupb" ,
            "Password" => "xcSxYvg70GObanj1qT8N"  
        ])->get( 'https://ws-dev.upb.edu.co:8443/Finanzas/PptoGrupoxCuentas',[
            "tipo" => "FORMULARIO_TRANSPORT" ,    
            "anio_fiscal" => "21" ,    
            "organizacion" => "MJSG",   
            "filter" => "cuenta,cuenta_descripcion,ppto_disponible"   
        ]);           
            $responses = $response->json();
            //dd($responses);
        if($responses == null){
            $nada = 'No hay saldo disponible ';
        }


        $solicitud=Solicitud::findOrfail($id);
             //dd($solicitud);
        return view('solicitud.edit', compact('solicitud','responses','nada') );
    }

    
    public function update(Request $request, $id)
    {
        
        $campos=[

            'Nombre'=>'required|string|max:100',
            'Cargo'=>'required|string|max:100',
            'Correo'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Codigo'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
           ];
           $mensaje=[
               'required'=>'El campo :attribute es requerido',
               'Nombre.required'=>'El nombre del solicitante es requerido',
               'Cargo.required'=>'El cargo del solicitante es requerido',
               'Correo.required'=>'La dirección de correo electronico es requerida',
               'Telefono.required'=>'El numero de telefono es requerido',
               'Celular.required' => 'El numero de celular es requerido',
               'Codigo.required' => 'El código de la organización es requerido',
               'dia.required' => 'La fecha de salida es requerida',
               'direccion.required'=>'La dirección de destino es requerida',   
           ];
           $this->validate($request,$campos,$mensaje);   

        $solicitud = request()->except(['_token','_method']);
        //dd($solicitud);
       // Solicitud::where('id','=',$id)->update($solicitud);
        $user = Auth::user()->username;
        $jefe = $solicitud['jefe'];
        $sede = Auth::user()->SEDE;
        if( $user = $jefe){
            $solicituds = \DB::table('users')
                            ->select('users.*')
                            ->where('SEDE','=',$sede)
                            ->orwhere('role_id', '=',"1" )
                            ->first();
                            //dd($solicitud);

            $email = $solicituds->email;
            Solicitud::where('id','=',$id)->update($solicitud);
            if($solicitud['estado']== "Aceptada"){
                // $correo = new CordinadorMailable($solicitud);
        
                // Mail::to($email)->send($correo);
                //dd('hola');
            
                // return view('solicitud', compact('solicitud') );
                return redirect('solicitud')->with('mensaje','Solicitud aceptada con exito');
            }
           
            //dd('hola');
        
            // return view('solicitud', compact('solicitud') );
            return redirect('solicitud')->with('mensaje','Solicitud rechazada con exito');
        }
        //dd($jefe);
        // $correo = new CordinadorMailable($solicitud);
        
        // Mail::to($email)->send($correo);
        //dd('hola');
    
        // return view('solicitud', compact('solicitud') );
        return redirect('solicitud')->with('mensaje','Solicitud actualizada con exito');
    }

 
    public function destroy($id)
    {
        //
        
    }
}
