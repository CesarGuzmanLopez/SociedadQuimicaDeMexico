<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use phpDocumentor\Reflection\Types\This;

class Verificacion extends Mailable
{
    use Queueable, SerializesModels;

   protected $data;    

    public function __construct($data)
    {
    $this->data =$data;
    }
    public $user;
    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        return $this->view("email.verificar")->with($this->data);
    }
}
