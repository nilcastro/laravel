<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AutorizadoEspecialMailable extends Mailable
{
    use Queueable, SerializesModels;

   
    public $subject = "Solicitud especial aceptada de refrigerios";
    public $solicitud;
    
    public function __construct($solicitud)
    {
        $this->solicitud = $solicitud;
    }
 
    public function build()
    {
        return $this->view('emails.autorizadaespecial');
    }
}

     
    