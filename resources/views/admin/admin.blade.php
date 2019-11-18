@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Generar factura</div>

                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="usuario_id">
                            @foreach($usuarios as $usuario)
                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    Bienvenido administrador
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
