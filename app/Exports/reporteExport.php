<?php

namespace App\Exports;

use App\Models\Solicitud;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class reporteExport implements FromView,ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        $user = Auth::user()->username;
       
        $role = '["1","5"]';
        $roles = '["1"]';
        $userr = Auth::user()->role;
       
        if($userr == $role){
            return view('autorizacion.reportView',[
                'reportes' => solicitud::all()
            ]);
        
        }
        $solicitud = solicitud::where('autoriza','=',$user)->exists();
        
 
        if($solicitud){
            return view('autorizacion.reportView',[
                'reportes' => solicitud::where('autoriza','=',$user)->get()
            ]);
        }else if($userr == $roles){
           
            return view('autorizacion.reportView',[
                'reportes' => solicitud::where('username','=',$user)->get()
            ]);
        }

  
       
    }
}
