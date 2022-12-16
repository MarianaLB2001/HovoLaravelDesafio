<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return void
     */
    public function build()
    {
        return $this->subject('Encomenda Realizada')
                    ->with('nome_cliente', 'António Silva')
                    ->with('produto', 'Produto 1')
                    ->with('quantidade', '3')
                    ->with('preco', '50.99')
                    ->view('email');

         /* return $this
                ->from(config('mail.from.address'))
                ->subject('Contacto do Site')
                ->view('email')
                ->with('data', $this->data); */
    }

}
