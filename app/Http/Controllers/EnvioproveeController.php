<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioproveeMailable;

class EnvioproveeController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $solicitud =  request()->except(['_token','_method']);
        $solicitud['estado']= "Envio a proveedor";
        $provee = $solicitud['Correoelectroni'];
        
        $id = $solicitud['id'];
        //  dd($solicitud);
      
         $solicitu = Solicitud::where('id','=',$id)->update($solicitud);
        //   dd($solicitud);
         $solicitud = new EnvioproveeMailable($solicitud);
     
         Mail::to($provee)->send($solicitud);
        //  dd($solicitud);
         
        //  $solicitud = solicitud::get();
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
