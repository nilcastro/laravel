<?php

namespace App\Http\Controllers;

use App\Mail\AsignacionMailable;
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
        $autorizas = DB::table('users')
            ->select('name', 'role')

            ->get();
        // dd($autoriza);  


        $proveedores = DB::table('proveedores')
            ->get();
           
        $productos = \DB::table('productos')
            // ->select('nombreProduc', 'precio', 'id','id_provee')
            ->get();
           // dd($productos);
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
  
        return view('solicitud/create', compact('autorizas', 'proveedores', 'productos'));
    }

    public function store(Request $request)
    {

        $datosSolicitud = request()->except('_token', 'mas');
        $jefe = $datosSolicitud['email_jefe'];
        $provee = $datosSolicitud['Nombreprove'];
       
        $solicitud = Proveedores::where('id','=',$provee)->get();

     
     
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
        $datosSolicitud = $id;
        dd($datosSolicitud);
        $autorizas = DB::table('users')
            ->select('name', 'role','username','email','programa')
             ->where('role','=','["1"]')
            ->get();
         //dd($autorizas);  


        $proveedores = DB::table('proveedores')
            ->select('nombreProvee', 'id')
            ->get();
              //dd($proveedores);  
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
  dd($solicitud);

        return view('solicitud.edit', compact('solicitud', 'autorizas', 'proveedores'));
    }


    public function update()
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
