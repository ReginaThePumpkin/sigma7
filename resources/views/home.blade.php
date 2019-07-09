@extends('layouts.headerAndFooter')

@section('titulo')
PRINCIPAL
@endsection

@section('contenido')
<p>
    <h1 class="text-center text-primary">
        @if(Auth::user()->data['sexo'] == 2)
            Bienvenido 
        @else
            Bienvenida
        @endif
        {{ Auth::user()->data['fullname'].' '.Auth::user()->data['lastname']}}
    </h1>
</p>

<script>breadcrumb('<li class="active"><strong>HOME</strong></li>');</script>

@endsection
