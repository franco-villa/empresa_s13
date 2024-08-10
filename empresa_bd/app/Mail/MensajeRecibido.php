<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;



class MensajeRecibido extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Mensaje Recibido";
    //public $mensaje;

   /**
     * Create a new message instance.
     */
    public function __construct(private $mensaje)
    {
        Log::channel('stderr')->info('Something happened! 1');
        Log::channel('stderr')->info($mensaje);
        //$this->mensaje = $mensaje;
    }

    // public function build()
    // {
    //     Log::channel('stderr')->info('Something happened! 2');
    //     Log::channel('stderr')->info( $this->mensaje);
    //     return $this->subject('Mensaje Recibido')
    //     ->view('emails.mensaje-recibido');
    // }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    { 
        Log::channel('stderr')->info('Something happened! 2');
        //Log::channel('stderr')->info($mensaje);
        return new Envelope(
            subject: 'Mensaje Recibido',
        );
    }

    /**
     * Get the message content definition.
     */
    
    public function content(): Content
    {
        Log::channel('stderr')->info('Something happened! 3');
        //Log::channel('stderr')->info($this->mensaje);
        return new Content(
            view: 'emails.mensaje-recibido'
          //  with: ['mensaje'=> $this->mensaje]
        );
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

    private function sanitizeMessage($message): string
    {
        return htmlentities($message);
    }

}
