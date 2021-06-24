<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventoCancelado extends Mailable
{
    use Queueable, SerializesModels;

    public $representante, $evento, $artista; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mensaje)
    {
        $this->representante = $mensaje["representante"];
        $this->evento = $mensaje["evento"];
        $this->artista = $mensaje["artista"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("jorge.vnarvaez@gmail.com")
        ->subject("Evento cancelado")
        ->view('mails.evento-cancelado')
        ->with([
            "representante" => $this->representante,
            "evento" => $this->evento,
            "artista" => $this->artista,
        ]);
    }
}
