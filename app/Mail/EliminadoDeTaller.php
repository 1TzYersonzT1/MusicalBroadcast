<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class EliminadoDeTaller extends Mailable
{
    use Queueable, SerializesModels;

    protected  $asistente, $fecha, $taller;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mensaje)
    {
        $this->asistente = $mensaje["asistente"];
        $this->fecha = $mensaje["fecha"];
        $this->taller = $mensaje["taller"]; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("jorge.vnarvaez@gmail.com")
        ->subject("Eliminado del taller")
        ->view('mails.asistente-eliminado')
        ->with([
            "asistente" => $this->asistente,
            "fecha" => $this->fecha,
            "taller" => $this->taller,
        ]);
    }
}
