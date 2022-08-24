<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
            return view('especial.index')->with('solicitud',$solicitud);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
