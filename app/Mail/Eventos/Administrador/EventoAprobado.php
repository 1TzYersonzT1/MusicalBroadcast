<?php

namespace App\Mail\Eventos\Administrador;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventoAprobado extends Mailable
{
    use Queueable, SerializesModels;

    protected $evento, $organizador;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mensaje)
    {
        $this->evento = $mensaje["evento"];
        $this->organizador = $mensaje["organizador"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("jorge.vnarvaez@gmail.com")
        ->subject("Evento aprobado")
        ->view('mails.eventos.administrador.evento-aprobado')
        ->with([
            "evento" => $this->evento,
            "organizador" => $this->organizador,
        ]);
    }
}
