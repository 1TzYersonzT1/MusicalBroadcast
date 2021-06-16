<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PosponerTaller extends Mailable
{
    use Queueable, SerializesModels;

    protected $taller, $asistente;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mensaje)
    {
        $this->taller = $mensaje["taller"];
        $this->asistente = $mensaje["asistente"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("jorge.vnarvaez@gmail.com")
        ->subject('Taller pospuesto')
        ->view('mails.posponer-taller')
        ->with([
            "taller" => $this->taller,
            'asistente' => $this->asistente,
        ]);
    }
}
