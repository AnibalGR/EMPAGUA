<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Use User Model
use App\Factura;
//Use Resources to convert into json
use App\Http\Resources\FactResource as FactResource;

class FactController extends Controller
{
    //
    public function consultasaldo()
    {
        $facturas = Factura::get();
        return FactResource::collection($facturas);
    }

    public function actualizarestadofact($id)
    {
        $fact = Factura::FindOrFail($id);        
        $fact-> estado = 1;// ? estado : 0;//si no se envía $estado por defecto será 0
        $fact-> save();     
    }
}
