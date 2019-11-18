@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="margin-top:50px;">
            <div class="card">
                <div class="card-header">Pago de factura</div>
                <div class="card-body" style="text-align: center;">
                    <h3>{{$mensaje}}</h3>
                    <div style="text-align: center; margin-top:50px;">
                        <a href="{{ route('home') }}"><h4>Haz click aquí para volver al inicio.</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
