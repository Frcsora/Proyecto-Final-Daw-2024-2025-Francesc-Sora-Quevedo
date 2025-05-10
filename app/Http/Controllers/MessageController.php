<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'text' => 'required|string',
        ]);

        Mail::send('emails.contact', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'content' => $validated['text'],
        ], function ($message) use ($validated) {
            $message->to('piopioesportsclub@gmail.com')
            ->subject('Mensaje recibido');
        });
        return redirect()->route('contactus')->with('status', 'Mensaje enviado');
    }
}
