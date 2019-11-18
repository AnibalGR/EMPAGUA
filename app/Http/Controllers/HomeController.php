<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Factura;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {


        if (\Illuminate\Support\Facades\Auth::user()->email == "gramajo.anibalv@gmail.com") {
            return redirect('/admin');
        } else {
            return view('home');
        }
    }

    public function admin() {

        $usuarios = User::where('id', '!=', '1')->get();

        return view('admin.admin', ['usuarios' => $usuarios]);
    }

    /**
     * Envía un correo electrónico
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function email() {
        $to_name = 'Anibal Gramajo';
        $to_email = 'anibalg@osmondmarketing.com';
        $data = array('name' => "Ogbonna Vitalis(sender_name)", "body" => "A test mail");
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Laravel Test Mail');
            $message->from('gramajo.anibalv@gmail.com', 'Test Mail');
        });
    }

}
