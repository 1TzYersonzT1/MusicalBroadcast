<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ArtistaRechazado extends Mailable
{
    use Queueable, SerializesModels;

    protected $artista, $representante;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mensaje)
    {
        $this->artista = $mensaje["artista"];
        $this->representante = $mensaje["representante"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from("jorge.vnarvaez@gmail.com")
        ->subject("Solicitud de nuevo artista rechazada")
        ->view('mails.artista-rechazado')
        ->with([
            'artista' => $this->artista,
            'representante' => $this->representante,
        ]);
    }
}
