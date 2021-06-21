<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EliminadoDeEvento extends Mailable
{
    use Queueable, SerializesModels;

    protected $representante, $artista, $evento, $fecha;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mensaje)
    {
        $this->representante = $mensaje["representante"];
        $this->artista = $mensaje["artista"];
        $this->evento = $mensaje["evento"];
        $this->fecha = $mensaje["fecha"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jorge.vnarvaez@gmail.com')
        ->subject("Artista eliminado de evento")
        ->view('mails.artista-eliminado-evento')
        ->with([
            "representante" => $this->representante,
            "artista" => $this->artista,
            "evento" => $this->evento,
            "fecha" => $this->fecha,
        ]);
    }
}
