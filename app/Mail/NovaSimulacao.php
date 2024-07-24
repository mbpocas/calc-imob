<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\Simulacao;

class NovaSimulacao extends Mailable
{
    use Queueable, SerializesModels;

    public $simulacao;

    /**
     * Create a new message instance.
     */
    public function __construct(Simulacao $simulacao)
    {
        $this->simulacao = $simulacao;
    }

    public function build()
    {
        $contatoNome = ucfirst($this->simulacao->contato->nome);
        $simulacaoId = $this->simulacao->id;

        return $this->from(new Address('simu.imob@gmail.com', 'Weehouse'))
                    ->subject("Novo Lead - {$contatoNome} - {$simulacaoId}")
                    ->view('mail.simulacao')
                    ->with([
                        'simulacao' => $this->simulacao,
                        'contato' => $this->simulacao->contato,
                    ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
