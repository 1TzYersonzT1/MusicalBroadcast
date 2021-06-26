<?php

namespace App\Mail\Eventos\Organizador;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoAsistenteEvento extends Mailable
{
    use Queueable, SerializesModels;

    protected $evento, $artista, $organizador;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mensaje)
    {
        $this->evento = $mensaje["evento"];
        $this->artista = $mensaje["artista"];
        $this->organizador = $mensaje["organizador"];
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
        ->subject("Se ha registrado un nuevo artista a tu evento")
        ->view('mails.eventos.organizador.nuevo-asistente')
        ->with([
            "evento" => $this->evento,
            "artista" => $this->artista,
            "organizador" => $this->organizador,
        ]);
    }
}
