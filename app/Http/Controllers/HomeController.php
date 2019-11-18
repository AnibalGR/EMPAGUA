<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Mail;
use Illuminate\Support\Facades\Auth;
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
        

        if (Auth::user()->email == "gramajo.anibalv@gmail.com") {
            return redirect('/admin');
        } else {
            $facturas_pendientes = Factura::where([['usuario', '=', Auth::user()->id],['estado', '=', '0']])->get();
            $facturas = Factura::where('usuario', Auth::user()->id)->get();
            return view('home', ['facturas' => $facturas, 'facturas_pendientes' => $facturas_pendientes]);
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

    public function generarFactura(Request $request) {

        $usuario = $request->input('usuario_id');
        $fecha = $request->input('fecha');
        $mes = date('m', strtotime($fecha));
        $dia = date('d', strtotime($fecha));
        $monto = rand(100, 500);
        $mora = 0;
        if ($dia > 20) {
            $mora = $monto * 0.15;
        }
        $estado = 0;

        $factura = new Factura;

        $factura->usuario = $usuario;
        $factura->mes = $mes;
        $factura->monto = $monto;
        $factura->mora = $mora;
        $factura->estado = $estado;

        $user = User::where('id', $usuario)->select("id", "name", "email")->first();

        if ($factura->save()) {
            $to_name = $user->name;
            $to_email = $user->email;
            $data = array('name' => $to_name, 'monto' => $monto);
            Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Nueva factura de Netflix');
                $message->from('gramajo.anibalv@gmail.com', 'Netflix AyD2');
            });


            return Redirect::to("admin")->withSuccess('La factura ha sido creada exitosamente por un monto de Q.' . $monto . '.00. Un correo electrónico ha sido'
                            . ' enviado a ' . $user->email);
        }

        return Redirect::to("admin")->withSuccess('Se ha producido un error al crear la factura.');
    }
    
    public function pagarFactura($id){
        
        $factura = Factura::FindOrFail($id);
        $factura->estado = 1;
        $mensaje = "";
        $factura->save() ? $mensaje = "La factura ha sido pagada exitosamente." : $mensaje = "La factura no ha podido ser pagada.";
        
        return view('admin.resultado', ['mensaje' => $mensaje]);
    }

}
