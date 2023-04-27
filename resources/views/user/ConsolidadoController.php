<?php

namespace App\Http\Controllers;

use App\Models\consolidado;
use Illuminate\Http\Request;
use App\Models\Encuestaserv;
use App\Models\Encuestaproduc;
use Maatwebsite\Excel\Facades\Excel;
use  App\Exports\ConsolidadoExport;
use App\Exports\ServicioExport;



class ConsolidadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $campoBuscar = $request->get('txtBuscar');
        //dd($campoBuscar);
        if(isset($campoBuscar)){
            $id = '';    
            $datos['consolidado']=consolidado::where('evaluar','LIKE',"%$campoBuscar%")
                            ->orwhere('RazónSocial','LIKE',"%$campoBuscar%")   
                            ->orwhere('name','LIKE',"%$campoBuscar%")  
                            ->orwhere('seguimiento','LIKE',"%$campoBuscar%") 
                            ->get();    
                            return view('consolidado/index', $datos);
                }


            $datos['consolidado']=Encuestaproduc::all();
    
            return view('consolidado/index', $datos); 
        } 
    
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportexcel()
    {
       ini_set('memory_limit','-1');
       set_time_limit(3000000);
       /*  return Excel::download(new ConsolidadoExport,'consol_encuesta_producto.xlsx'); */
       
       return Excel::download(new ConsolidadoExport,'consolidado_producto.xlsx');
    }
    public function excelservi()
    {
       
       ini_set('memory_limit','-1');
       set_time_limit(3000000);
       /*  return Excel::download(new ConsolidadoExport,'consol_encuesta_producto.xlsx'); */
       
       return Excel::download(new ServicioExport,'consolidado_servicio.xlsx');
    }

    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
 
    }

  
    
    public function show(request $request)
    {

        $campoBuscar = $request->get('txtBuscar');
        // dd($campoBuscar);
        if(isset($campoBuscar)){
            $id = '';    
            $datos['consolidado']=consolidado::where('evaluar','LIKE',"%$campoBuscar%")
                            ->orwhere('RazónSocial','LIKE',"%$campoBuscar%")   
                            ->orwhere('name','LIKE',"%$campoBuscar%")  
                            ->orwhere('seguimiento','LIKE',"%$campoBuscar%") 
                            ->paginate(5);    
                            return view('consolidado/consolservi', $datos);
        }

        $datos['consolidado']=consolidado::all();
        
        return view('consolidado/consolservi', $datos);
       
                  
        
    }


    public function edit(consolidado $consolidado)
    {
        //
    }

    
    public function update(Request $request, consolidado $consolidado)
    {
        //
    }

 
    public function destroy(consolidado $consolidado)
    {
        //
    }
}
