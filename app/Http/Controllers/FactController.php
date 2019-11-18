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

    /*public function actualizarestadofact()
    {
        $facturas = Factura::put($estado)
    }*/
}
