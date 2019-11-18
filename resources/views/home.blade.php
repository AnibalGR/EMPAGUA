@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Facturas pendientes</div>
                <div class="card-body">
                    @if (count($facturas_pendientes) > 0)
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Número</th>
                                <th scope="col">Mes</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Mora</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($facturas_pendientes as $factura_pendiente)
                        <tr>
                            <td>{{$factura_pendiente->id}}</td>
                            <td>{{date("F", mktime(0, 0, 0, $factura_pendiente->mes, 1))}}</td>
                            <td>{{$factura_pendiente->monto}}</td>
                            <td>{{$factura_pendiente->mora}}</td>
                            <td>
                                @if ($factura_pendiente->estado == 0)
                                Pendiente de pago <td><a href="">Pagar</a></td>
                                @else
                                Pagada
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <p><h3>Felicidades! No tienes ninguna factura pendiente</h3></p>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-10" style="margin-top:50px;">
            <div class="card">
                <div class="card-header">Facturas</div>
                <div class="card-body">
                    @if (count($facturas) > 0)
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Número</th>
                                <th scope="col">Mes</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Mora</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($facturas as $factura)
                        <tr>
                            <td>{{$factura->id}}</td>
                            <td>{{date("F", mktime(0, 0, 0, $factura->mes, 1))}}</td>
                            <td>{{$factura->monto}}</td>
                            <td>{{$factura->mora}}</td>
                            <td>
                                @if ($factura->estado == 0)
                                Pendiente de pago
                                @else
                                Pagada
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <p><h3>Aún no tienes ninguna factura</h3></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
