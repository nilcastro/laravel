<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioproveeEspecialMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitud; 
    public $subject = "Solicitud especial de refrigerios";

    public function __construct($solicitud)
    {
        $this->solicitud = $solicitud;
        
    }

    public function build()
    {
        return $this->view('emails.envioproveeEspecial');
      
    }
}
  
   


   

     
    

    
    
 
