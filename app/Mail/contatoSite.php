<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contatoSite extends Mailable
{
    use Queueable, SerializesModels;

    private $contato;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $contato)
    {
        $this->contato = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Contato Êxodo Digital - '.$this->contato->assunto);
        $this->to(env('MAIL_TO_ADDRESS'), env('MAIL_TO_NAME'));
        return $this->markdown('mail.contatoSite', [
            'contato'=>$this->contato
        ]);
    }
}
