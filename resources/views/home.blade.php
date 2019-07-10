@extends('layouts.base')

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
    <p>
        @foreach(Auth::user()->data['permisos'] as $permiso)
            {{$permiso.' '}}
        @endforeach
    </p>
</p>

<script>breadcrumb(['HOME','RECEPCIÓN','AGENDA'],['index.php']);</script>

@endsection
