<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $subject;
    public $view;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $subject, $view)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->view = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('faleconosco@redeamericapremios.com.br', 'Rede América Prêmios')
            ->subject($this->subject)
            ->view($this->view)
            ->with([
                'user' => $this->user,
            ]);
    }
}
