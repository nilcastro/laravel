<?php

namespace App\Http\Controllers;

use App\Mail\AsignacionMailable;
use App\Models\Especiales;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class SolicitudController extends Controller
{

    public function index()
    {
        $solicitud = solicitud::get();
        // $jefes = Auth::user()->role;
        
        $jefe = Auth::user()->jefe;
        $user = Auth::user()->username;
        $admin = Auth::user()->role;
          
        $programa = Auth::user()->programa;
      
        $jefes = Solicitud::where('jefe','=',$user )->exists();
          
            
            if($jefes){
            $solicitud = DB::table('solicituds')
                            ->select('solicituds.*')
                            ->where('jefe','=',$user)
                            ->orderBy('id','DESC')
                            ->paginate(10);
                            // dd($solicitud);
            $especial = DB::table('especiales')
                            ->select('especiales.*')
                            ->where('jefe','=',$user)
                            ->orderBy('id','DESC')
                            ->paginate(10);   
                            
            return view('solicitud.index',compact('especial','solicitud'));
            
            }elseif($jefes == false){ 
              
            $solicitud = DB::table('solicituds')
                            ->select('solicituds.*')
                            ->where('username', '=',$user)
                            ->orwhere('autoriza', '=',$user)
                            ->orderBy('id','DESC')
                            ->paginate(10);
                         
            $especial = DB::table('especiales')
                            ->select('especiales.*')
                            ->where('username', '=',$user)
                            ->orwhere('autoriza', '=',$user)
                            ->orderBy('id','DESC')
                            ->paginate(10);   
                            //    dd($especial);  
            return view('solicitud.index',compact('especial','solicitud'));
        }

    
      }
    public function create()
    {
        $con =  '["5"]';
        $sin = '["1","5"]';
        $activo = 1;
        $especial = 2;
        $autorizas = DB::table('users')
            ->select('name','apellidos','role','nombre_centroc','id')
            ->where('role','=',$con)
            ->orwhere('role','=',$sin)
            ->get();
        
        $proveedores = DB::table('proveedores')
            ->select('proveedores.*')
            ->where('activo','=',$activo)
            ->get();
            // dd($proveedores);
        $productos = DB::table('productos')
            // ->select('nombreProduc', 'precio', 'id','id_provee')
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

           $user = [
                    'Estudiantes',
                    'Docentes',
                    'Administrativos',
                    'Aspirantes',
                    'Empresarios',
                    'Egresados'
            ];
        return view('solicitud/create', compact('autorizas', 'proveedores', 'productos','user'));
    }

    public function store(Request $request)
    {

        $datosSolicitud = request()->except('_token', 'mas');
        //    dd($datosSolicitud);
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

        // convierte id producto en nombre producto.
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
        $solicitud = solicitud::firstOrCreate($datosSolicitud);
       
        // envio de correo electronico al jefe 
        // $correo = new AsignacionMailable($solicitud,$nombrejefe);
        // Mail::to($jefe)->send($correo);

        return redirect('solicitud');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $datosSolicitud = $id;
       
        $autorizas = DB::table('users')
            ->select('name', 'role','username','email','programa')
             ->where('role','=','["1"]')
            ->get();
         //dd($autorizas);  


        $proveedores = DB::table('proveedores')
            ->select('nombreProvee', 'id')
            ->get();
              //dd($proveedores);  
        $productos = DB::table('productos')
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
//   dd($solicitud);

        return view('solicitud.edit', compact('solicitud', 'autorizas', 'proveedores'));
    }


    public function update()
    {
        //
    }



    public function autosearch(Request $request)
    {

        $solicitud = Solicitud::where('Nombreprove','LIKE', $request->name.'%')->get();
        return response($solicitud);
    
       
    }
    public function autobuscador(Request $request)
    {
        $solicitud = DB::table('solicituds')
                     ->select('nombreauto','nombresolici','duracion','lugaruno','Nombreprove',
                     'producto','cantidad','valortota','fechain','estado')
                    ->where('Nombreprove','LIKE', $request->texto.'%')
                    ->orwhere('fechain','LIKE', $request->texto.'%' )
                    ->orwhere('nombreauto','LIKE', $request->texto.'%' )
                    ->orwhere('nombresolici','LIKE', $request->texto.'%' )
                    ->get();

      
        // $solicitud = Solicitud::where('Nombreprove','LIKE', $request->texto.'%')->take(10)->get();
        // return view('solicitud.index')->with('solicitud',$solicitud);
        return response($solicitud);
       
    }
    
    public function profesionales(Request $request)
    {
     
        if($request->ajax()){
            
            $data = user::where('username','=', $request->jefevalue)->get();
           
            return $data;
        }
        
            $role = '["4"]';
            $nomb = DB::table('users')
                        ->select('username','name','apellidos','programa','cargo','email','nombre_centroc','id')
                        ->where('role', '=',$role)
                        ->get();
            return response($nomb);
       
    }
    public function profesionalesuno(Request $request)
    {
        $solicitud = user::where('username','=', $request->username)->get();
        return response($solicitud);       
    }
  
}

