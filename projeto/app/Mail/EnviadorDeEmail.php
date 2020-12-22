<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EnviadorDeEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $titulo;
    private $conteudo;
    private $nomeComprador;
    private $emailComprador;

    private $emailRemetente;
    private $nomeRemetente;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo, $conteudo, $nomeComprador, $emailComprador)
    {
        $this->titulo = $titulo;
        $this->conteudo  = $conteudo;
        $this->nomeComprador = $nomeComprador;
        $this->emailComprador = $emailComprador;

        $this->emailRemetente = Auth::user()->email;
        $this->nomeRemetente = Auth::user()->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.home');
    }

}
