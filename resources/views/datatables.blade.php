@extends('layouts.base')


@section('contenido')
<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Email</th>
            </tr>
        </thead>
    </table>
@endsection

@section('borrame')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id_u', name: 'id_u' },
            { data: 'nombre_u', name: 'nombre_u' },
            { data: 'apaterno_u', name: 'amaterno_u'},
            { data: 'amaterno_u', name: 'amaterno_u'},
            { data: 'email_u', name: 'email_u' }
        ]
    });
});
</script>

@endsection