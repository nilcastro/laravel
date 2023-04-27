<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioproveeMailable;
use App\Mail\EnvioproveeEspecialMailable;
use App\Mail\RechazadaMailable;

class EnvioproveeController extends Controller
{

    public function store(Request $request)
    {
        $solicitud =  request()->except(['_token','_method']);
        //  dd($solicitud,"si esta");
        if($solicitud['estado'] == "Estado modificado"){

            $provee = $solicitud['Correoelectroni'];
            $id = $solicitud['id'];
            $solicitu = Solicitud::where('id','=',$id)->update($solicitud);
             
            //  $solicitud = new EnvioproveeMailable($solicitud);
         
            //  Mail::to($provee)->send($solicitud);
            //  dd($solicitud);
             
              $solicitud = solicitud::get();
           
             return redirect('autorizacion');
        }
        else if($solicitud['estado']== "Envio a proveedor"){

            $provee = $solicitud['Correoelectroni'];
            $id = $solicitud['id'];
            $solicitu = Solicitud::where('id','=',$id)->update($solicitud);
             
            //  $solicitud = new EnvioproveeMailable($solicitud);
         
            //  Mail::to($provee)->send($solicitud);
            //  dd($solicitud);
             
              $solicitud = solicitud::get();
           
             return redirect('autorizacion');
    
        }elseif($solicitud['estado']== "Rechazar"){
           
            $provee = $solicitud['Correoelectroni'];
            $nombrejefe = $solicitud['jefenombre'];
            $id = $solicitud['id'];
            
            $solicitu = Solicitud::where('id','=',$id)->update($solicitud);
             
            //   $solicitud = new RechazadaMailable($solicitud,$nombrejefe);
         
            //  Mail::to($provee)->send($solicitud);
            //  dd($solicitud);
             
              $solicitud = solicitud::get();
           
             return redirect('autorizacion');
        }
    } 
}
