<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AsignacionMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Nueva solicitud de refrigerios";
    public $solicitud;
    public $nombrejefe;

    public function __construct($solicitud ,$nombrejefe)
    {
        $this->solicitud = $solicitud;
        $this->nombrejefe = $nombrejefe;
    }

    
    public function build()
    {
        return $this->view('emails.solicitudj');
    }
}

 

