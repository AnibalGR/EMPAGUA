@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Generar factura</div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    <br>
                    @endif
                    <form action="{{ url('generar-factura') }}" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="contact-form">
                            <div class="form-group">
                                <label class="control-label col-sm-12" for="usuario_id" name="usuario_id">Selecciona un usuario</label>
                                <select class="form-control col-sm-12" name="usuario_id">
                                    @foreach($usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('usuario_id') }}</span>
                                <label class="control-label col-sm-12" for="fecha">Selecciona una fecha (fechas posteriores al 20 del mes
                                    generarán un 15% de mora adicional.</label>
                                <input id="fecha" name="fecha" type="date" min="2019-01-01" max="2019-12-31">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn-primary">Generar factura</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
