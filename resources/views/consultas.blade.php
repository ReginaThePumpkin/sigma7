@extends('layouts.base')

@section('titulo')
SISTEMA - CONSULTAS
@endsection

@section('js')
<!-- Mainly scripts -->
<script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
<script src="{{ asset('bootstrap-validator/js/validator.js')}}"></script>
<script src="{{ asset('sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{ asset('chosen/chosen.jquery.js')}}" type="text/javascript"></script>
<script src="{{ asset('funciones/js/jquery.media.js')}}" type="text/javascript"></script>
<script src="{{ asset('funciones/js/jquery.printElement.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('funciones/js/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('jQuery-TE_v.1.4.0/uncompressed/jquery-te-1.4.0.js')}}" charset="utf-8"></script>
<script src="{{ asset('tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('c3/c3.min.js')}}"></script>
<script src="{{ asset('c3/d3/d3.min.js')}}"></script>
<!-- Input Mask-->
<script src="{{ asset('jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script> 
<!-- Mis funciones -->
<script src="{{ asset('funciones/js/calcula_edad.js')}}"></script>
<script src="{{ asset('funciones/js/stdlib.js')}}"></script>
<script src="{{ asset('funciones/js/bs-modal-fullscreen.js')}}"></script>

<!-- Funciones v7-->
<script src="{{asset('js/consulta.js')}}"></script>
@endsection

@section('css')
<link href="{{ asset('bootstrap/css/bootstrap-theme.css')}}" rel="stylesheet">
<link href="{{ asset('bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet">
<link href="{{ asset('sweetalert/dist/sweetalert.css')}}" rel="stylesheet">
<link href="{{ asset('chosen/chosen.css')}}"  rel="stylesheet" >
<link href="{{ asset('chosen/chosen-bootstrap.css')}}"  rel="stylesheet" >
<link href="{{ asset('jasny-bootstrap/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('jQuery-TE_v.1.4.0/jquery-te-1.4.0.css')}}" rel="stylesheet">
<link href="{{ asset('c3/c3.css')}}" rel="stylesheet">
@endsection

@section('contenido')
<div class="hidden" id="dpa_imprimir"></div>
<div class="hidden" id="dpa_imprimir1"></div>
<div id="div_tabla_pacientes" class="table-responsive" style="border:1px none red; vertical-align:top; margin-top:-9px;">
    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="dataTablePrincipal" class="table table-hover table-striped dataTables-example dataTable table-condensed" role="grid"> 
        <thead id="cabecera_tBusquedaPrincipal">
            <tr role="row" class="bg-primary">
                <th id="clickme" style="vertical-align:middle;">#</th>
                <th style="vertical-align:middle;">REFERENCIA</th>
                <th style="vertical-align:middle;">PACIENTE</th>
                <th style="vertical-align:middle;">MÉDICO</th>
                <th style="vertical-align:middle;">ESPECIALIDAD</th>
                <th style="vertical-align:middle; white-space:nowrap;" nowrap>TIEMPO DE ESPERA</th>
                <th style="vertical-align:middle;">SUCURSAL</th>
                <th style="vertical-align:middle;">ESTATUS</th>
                <th style="vertical-align:middle;">NOTA</th>
                <th style="vertical-align:middle;">RECETA</th>
            </tr>
        </thead> 
        <tbody> 
            <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> 
        </tbody> 
        <tfoot>
            <tr class="bg-primary">
                <th></th>
                <th><input style="width:120px;" type="text" class="form-control" placeholder="-REFERENCIA-" onKeyUp="conMayusculas(this);"/></th>
                <th><input type="text" class="form-control" placeholder="-PACIENTE-" onKeyUp="conMayusculas(this);"/></th>
                <th><input type="text" class="form-control" placeholder="-MÉDICO-" onKeyUp="conMayusculas(this);"/></th>
                <th><input type="text" class="form-control" placeholder="-ESPECIALIDAD-" onKeyUp="conMayusculas(this);"/></th>
                <th></th>
                <th><input style="width:110px;" type="text" class="form-control" placeholder="-SUCURSAL-" onKeyUp="conMayusculas(this);"/></th>
                <th><input style="width:100px;" type="text" class="form-control" placeholder="-ESTATUS-" onKeyUp="conMayusculas(this);"/></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
<div id="auxiliar" class="hidden"></div>
<div id="auxiliar1" class="hidden"></div>

<script>breadcrumb(['HOME','CONSULTAS','CONSULTAS MÉDICAS'],['/']);</script>
@endsection