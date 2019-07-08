@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Datos del usuario</h3>
                    <hr>
                    <h4>Nombre completo: {{ Auth::user()->data['fullname']}}</h4>
                    <hr>
                    <h4>Acceso: {{ Auth::user()->data['acceso']}}</h4>
                    <hr>
                    <h4>Sexo: {{ Auth::user()->data['sexo']}}</h4>
                    <hr>
                    <h4>Sucursal: {{ Auth::user()->data['sucursal']}}</h4>
                    <hr>
                    <h4>Multisucursal: {{ Auth::user()->data['multisucursal']}}</h4>
                    <hr>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
