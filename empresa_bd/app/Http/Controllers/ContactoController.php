<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Transport\Smtp\SmtpTransport;
use Illuminate\Http\Request;
//use Illuminate\Suport\Facades\Mail;
use App\Mail\MensajeRecibido;
//use Mail;
use App\Mail\Signedup;
use Illuminate\Support\Facades\Mail;


class ContactoController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $mensaje = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'asunto' => 'required',
            'mensaje' => 'required',
        ], [
            'nombre.required' => 'Ingresa tu nombre completo',
            'email.required' => 'Ingresa tu correo',
            'asunto.required' => 'Ingresa el asunto del mensaje',
            'mensaje.required' => 'Ingresa el mensaje a enviar',
        ]);

        //Mail::to('no-replay@demomailtrap.com')->send(new MensajeRecibido($mensaje));
        //Mail::to('t512700120@unitru.edu.pe')->send(new MensajeRecibido($mensaje));

        //return response()->json(['message' => 'Mensaje enviado con éxito'], 200);

        return back()->with('estado','Gracias por ponerte en contacto, te respondremos en la brevedad posible');








        // Log::info('Validated message:', $mensaje);

        // try {
        //     Mail::to('t512700120@unitru.edu.pe')->send(new MensajeRecibido($mensaje));
        //     Log::info('Email sent successfully');
        // } catch (TransportExceptionInterface $e) {
        //     Log::error('SMTP error: ' . $e->getMessage());
        // } catch (\Exception $e) {
        //     Log::error('Error sending email: ' . $e->getMessage());
        // }

        // Confirmación de envío
        
    }

    // public function store(){
    //     $mensaje = request()->validate([
    //          'nombre' => 'required',
    //          'email' => 'required',
    //          'asunto' => 'required',
    //          'mensaje' => 'required',
    //      ],[
    //          'nombre.required' => 'Ingresa tu nombre completo',
    //          'email.required' => 'Ingresa tu correo',
    //          'asunto.required' => 'Ingresa el asunto del mensaje',
    //          'mensaje.required' => 'Ingresa el mensaje a enviar',
    //      ]);
    //      Mail::to('t512700120@unitru.edu.pe')->send(new MensajeRecibido($mensaje));
    //      return new MensajeRecibido($mensaje);
    //      //return 'Mensaje Enviado';
    //  }
}
