<?php

namespace App\Mail\Talleres\Administrador;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TallerAprobado extends Mailable
{
    use Queueable, SerializesModels;

    protected $taller, $organizador;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mensaje)
    {
        $this->taller = $mensaje["taller"];
        $this->organizador = $mensaje["organizador"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jorge.vnarvaez@gmail.com')
        ->subject("Solicitud de taller aprobada")
        ->view('mails.talleres.administrador.taller-aprobado')
        ->with([
            "taller" => $this->taller,
            "organizador" => $this->organizador,
        ]);
    }
}
