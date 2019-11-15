<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    /**
     * Envía un correo electrónico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function email()
    {
        $to_name = 'Anibal Gramajo';
        $to_email = 'anibalg@osmondmarketing.com';
        $data = array('name'=>"Ogbonna Vitalis(sender_name)", "body" => "A test mail");
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {$message->to($to_email, $to_name)->subject('Laravel Test Mail');
            $message->from('gramajo.anibalv@gmail.com','Test Mail');
        });
    }
}
