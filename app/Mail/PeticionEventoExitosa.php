<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PeticionEventoExitosa extends Mailable
{
    use Queueable, SerializesModels;

    protected $artista, $evento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mensaje)
    {
        $this->artista = $mensaje["artista"];
        $this->evento = $mensaje["evento"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("jorge.vnarvaez@gmail.com")
        ->subject("Inscripcion a evento exitosa")
        ->view('mails.peticion-evento-exitosa')
        ->with([
            "artista" => $this->artista,
            "evento" => $this->evento,
        ]);
    }
}
