@extends('layouts.base')

@section('titulo')
    SISTEMA - CATÁLOGO DE SERVICIOS MÉDICOS
@endsection


@section('libreriasJS')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{asset('bootstrap-validator/js/validator.js')}}"></script>
    <script src="{{asset('sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('chosen/chosen.jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('funciones/js/jquery.media.js')}}" type="text/javascript"></script>
    <script src="{{asset('funciones/js/jquery.printElement.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('funciones/js/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('jQuery-TE_v.1.4.0/uncompressed/jquery-te-1.4.0.js')}}" charset="utf-8"></script>
    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    {{--<script src="{{asset('c3/c3.min.js')}}"></script>
    <script src="{{asset('c3/d3/d3.min.js')}}"></script>--}}
    <!-- Input Mask-->
    <script src="{{asset('jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
    <!-- Mis funciones -->
    <script src="{{asset('funciones/js/inicio.js')}}"></script>
    <script src="{{asset('funciones/js/caracteres.js')}}"></script>
    <script src="{{asset('funciones/js/calcula_edad.js')}}"></script>
    <script src="{{asset('funciones/js/stdlib.js')}}"></script>
    <script src="{{asset('funciones/js/bs-modal-fullscreen.js')}}"></script>

@endsection

@section('libreriasCCS')
    <link href="{{asset('bootstrap/css/bootstrap-theme.css')}}" rel="stylesheet">
    <link href="{{asset('sweetalert/dist/sweetalert.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('chosen/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('chosen/chosen-bootstrap.css')}}">
    <link href="{{asset('jasny-bootstrap/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('jQuery-TE_v.1.4.0/jquery-te-1.4.0.css')}}" rel="stylesheet">
    <link href="{{asset('c3/c3.css')}}" rel="stylesheet">

@endsection

@section('contenido')
    <!-- Contenido -->
    <div id="div_tabla_pacientes" class="table-responsive" style="border:1px none red; vertical-align:top; margin-top:-9px;">
        <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="dataTablePrincipal" class="table table-hover table-striped dataTables-example dataTable table-condensed" role="grid">
            <thead id="cabecera_tBusquedaPrincipal">
            <tr role="row" class="bg-primary">
                <th id="clickme" style="vertical-align:middle;">#</th>
                <th style="vertical-align:middle; white-space:nowrap;"><button type='button' class='btn btn-default btn-xs' id='btnAddEstudio' onClick='nuevoEstudio()' title='Agregar un nuevo servicio'><i class='fa fa-plus' aria-hidden='true'></i> SERVICIO</button></th>
                <th style="vertical-align:middle;">PRECIO</th>
                <th style="vertical-align:middle;" nowrap>PRECIO URGENCIA</th>
                <th style="vertical-align:middle;" nowrap>TAB MAQUILA</th>
                <th style="vertical-align:middle;" nowrap>TAB MAQUILA U</th>
                <th style="vertical-align:middle;" nowrap>TAB SUCURSAL</th>
                <th style="vertical-align:middle;" nowrap>TAB SUCURSAL U</th>
            </tr>
            </thead> <tbody> <tr> <td class="dataTables_empty">Cargando datos del servidor</td> </tr> </tbody>
            <tfoot>
            <tr class="bg-primary">
                <th></th>
                <th><input type="text" class="form-control input-sm" placeholder="Servicio"/></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <div style='border:1px solid none; text-align:left;'><table id='ocultarFP' width='' border='0' cellspacing='0' cellpadding='6'> <tr><td>CONVENIO</td><td><select name='miSucursal' id='miSucursal' class='form-control input-sm'></select></td></tr> </table></div>
    </div>
    <div id="auxiliar" class="hidden"></div> <div id="auxiliar1" class="hidden"></div>
    <div class="hidden" id="dpa_imprimir"></div><div class="hidden" id="dpa_imprimir1"></div>
    <!-- FIN Contenido -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function(e) {
            //breadcrumb
            $('#breadc').html('<li><a href="index.php">HOME</a></li><li>SERVICIOS</li><li class="active"><strong>CATÁLOGO DE SERVICIOS MÉDICOS</strong></li>');

            $('#my_search').removeClass('hidden');
            //$.fn.datepicker.defaults.autoclose = true;

            var tamP = $('#referencia').height() - $('#navcit').height() - $('#my_footer').height()-149-$('#breadc').height();
            var oTableP = $('#dataTablePrincipal').DataTable({
                serverSide: true,"sScrollY": tamP, ordering: false, searching: true, scrollCollapse: false, "scrollX": true,
                "fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) { }, scroller: false, responsive: true,
                "aoColumns": [
                    {"bVisible":true}, {"bVisible":true },{ "bVisible": true }, {"bVisible":true}, {"bVisible":true},
                    {"bVisible":true },{ "bVisible": true }, {"bVisible":true}
                ],
                "sDom": '<"filtro1Principal"f>r<"data_tPrincipal"t><"infoPrincipal"S><"proc"p>',
                deferRender: true, select: false, "processing": false,
                "sAjaxSource": "catalogo/datatable-serverside/catalogo",
                "fnServerParams": function (aoData, fnCallback) {
                    var nombre = $('#top-search').val(); var de = $("#miSucursal").val();
                    var acceso = $('#acc_user').val(); var idU = $('#id_user').val();

                    aoData.push( {"name": "nombre", "value": nombre } );
                    aoData.push(  {"name": "accesoU", "value": acceso } );
                    aoData.push(  {"name": "idU", "value": idU } ); aoData.push({"name": "idSu", "value": de });
                },
                "oLanguage": {
                    "sLengthMenu": "MONSTRANDO _MENU_ records per page", "sZeroRecords": "SIN COINCIDENCIAS - LO SENTIMOS",
                    "sInfo": "SERVICIOS FILTRADOS: _END_",
                    "sInfoEmpty": "NINGÚN SERVICIO FILTRADO.", "sInfoFiltered": " TOTAL DE SERVICIOS: _MAX_", "sSearch": "",
                    "oPaginate": { "sNext": "<span class='paginacionPrincipal'>Siguiente</span>", "sPrevious": "<span class='paginacionPrincipal'>Anterior</span>&nbsp;&nbsp;&nbsp;&nbsp;" }
                },"iDisplayLength": 50000, paging: false,
            });

            $('#clickme').click(function(e) { oTableP.draw(); }); window.setTimeout(function(){$('#clickme').click();},500);

            //para los fintros individuales por campo de texto
            oTableP.columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) { that .search( this.value ) .draw(); }
                } );
            } );
            //fin filtros individuales por campo de texto
            $('#top-search').keyup(function(e) {
                $('#dataTablePrincipal_filter input').val($(this).val()); $('#dataTablePrincipal_filter input').keyup();
            }).focus();
            $('.filtro1Principal').addClass('hidden');

            $("#miSucursal").load('pacientes/genera/genera_sucursales_ov.php?idU='+$('#id_user').val(), function(response,status,xhr){
                if (status = "success"){
                    var datosUS = {idU:$('#id_user').val()}
                    $.post('servicios/servicios/files-serverside/datosSucursalU.php',datosUS).done(function(data){
                        $("#miSucursal").val(data); $('#clickme').click(); $("#miSucursal").change(function(e) { $('#clickme').click(); });
                    });
                }
            });
        });

        function nuevoEstudio(){
            $("#myModal").load("servicios/servicios/htmls/ficha_servicio_m.php",function(response,status,xhr){ if(status=="success"){ tinymce.remove("#input");
                $(".insers").load('genera/inserciones.php', function( response, status, xhr ) { if ( status == "success" ) { } });
                //Checamos si hay formato de imagen en la sucursal del usuario logueado, sino entonces checamos si hay formato desde configuración, y sino dejar en blanco.
                var datosFts ={idU:$('#id_user').val(), idSucursal:$('#miSucursal').val()}
                $.post('servicios/files-serverside/check_formato.php',datosFts).done(function(data1){ $('#input').val(data1);
                    $('.tabulacion').remove();
                    $("#miSucursalNS").load('pacientes/genera/genera_sucursales_ov.php?idU='+$('#id_user').val(),function(response,status,xhr){
                        if (status = "success"){
                            var datosUS = {idU:$('#id_user').val()}
                            $.post('servicios/servicios/files-serverside/datosSucursalU.php',datosUS).done(function(data){ $("#miSucursalNS").val(data); });
                        }
                    }); $('#idUsuarioE').val($('#id_user').val());

                    tinymce.init({
                        selector:'#myModal #input',resize:false,height:$('#referencia').height()*0.48,theme: "modern",
                        plugins:
                            "table, charmap, emoticons, textcolor colorpicker, hr, image imagetools, image, insertdatetime, lists, noneditable, pagebreak, paste, preview, print, visualblocks, wordcount, code, importcss",
                        relative_urls: true, image_advtab: true, menubar: false, plugin_preview_width: $('#referencia').width()*0.8,
                        toolbar:
                            "undo redo | insert | bold italic fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent1 indent1 | link unlink anchor | forecolor backcolor  | print_ preview_ code_ | emoticons_ | table | responsivefilemanager_ | mybuttonVP |",
                        insert_button_items: 'charmap | cut copy | hr | insertdatetime | pagebreak1',
                        paste_data_images: true, paste_as_text: true, browser_spellcheck: true, image_advtab: true,
                        setup: function(editor){
                            editor.addButton( 'mybuttonVP', {
                                text: 'VPI', icon: false, tooltip: 'Vista previa de impresión',
                                onclick:function(){
                                    var res = tinyMCE.get("input").getContent().replace(/<p/g, "<div"); res = res.replace(/<\/p>/g, "</div>"); //alert(res);
                                    $('#dpa_imprimir1').html(res).css('background-image','url(imagenes/vista_previa.png)').css('background-size','65%');
                                    $('#dpa_imprimir1').html(res); $('#dpa_imprimir1').printElement();
                                }
                            });
                        }
                    });

                    $('#formEstudio').validator().on('submit', function (e) {
                        if (e.isDefaultPrevented()) { // handle the invalid form...
                        } else { // everything looks good!
                            e.preventDefault();
                            var $btn = $('#btn_save1').button('loading'); $('#btn_cancel1').hide();
                            var datosP = $('#myModal #formEstudio').serialize();
                            $.post('servicios/servicios/files-serverside/addServicio_m.php',datosP).done(function( data ) {
                                if (data==1){//si el paciente se Actualizó
                                    $('#clickme').click(); $btn.button('reset'); $('#btn_cancel1').show(); $('#myModal').modal('hide');
                                    swal({ title: "", type: "success", text: "El servicio se ha creado.", timer: 2000, showConfirmButton: false }); return;
                                } else{alert(data);}
                            });
                        }
                    });
                });

                $('#myModal').modal('show');
                $('#myModal').on('shown.bs.modal', function (e) { $('#formEstudio').validator(); });
                $('#myModal').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal").empty(); });
            } });
        }
        function fichaEstudio(idE, nameS){
            $("#myModal1").load("servicios/servicios/htmls/ficha_servicio_m.php",function(response,status,xhr){ if(status=="success"){
                $(".insers").load('genera/inserciones.php', function( response, status, xhr ) { if ( status == "success" ) { } });
                //Checamos si hay formato de imagen en la sucursal del usuario logueado, sino entonces checamos si hay formato desde configuración, y sino dejar en blanco.
                var datosFts ={idU:$('#id_user').val(), idSucursal:$('#miSucursal').val(), idE:idE}
                $.post('servicios/files-serverside/check_formato_individual.php',datosFts).done(function(data1x){ tinymce.remove("#input"); //alert(data1x);
                    $('#btn_save1').text('Actualizar'); $('#titulo_modal').text('FICHA DEL SERVICIO MÉDICO: '+nameS);

                    tinymce.init({
                        selector:'#myModal1 #input',resize:false,height:$('#referencia').height()*0.48,theme: "modern",
                        plugins:
                            "table, charmap, emoticons, textcolor colorpicker, hr, image imagetools, image, insertdatetime, lists, noneditable, pagebreak, paste, preview, print, visualblocks, wordcount, code, importcss",
                        relative_urls: true, image_advtab: true, menubar: false, plugin_preview_width: $('#referencia').width()*0.8,
                        toolbar:
                            "undo redo | insert | bold italic fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent1 indent1 | link unlink anchor | forecolor backcolor  | print_ preview_ code_ | emoticons_ | table | responsivefilemanager_ | mybuttonVP |",
                        insert_button_items: 'charmap | cut copy | hr | insertdatetime | pagebreak1',
                        paste_data_images: true, paste_as_text: true, browser_spellcheck: true, image_advtab: true,
                        setup: function(editor){
                            editor.addButton( 'mybuttonVP', {
                                text: 'VPI', icon: false, tooltip: 'Vista previa de impresión',
                                onclick:function(){
                                    var res = tinyMCE.get("input").getContent().replace(/<p/g, "<div"); res = res.replace(/<\/p>/g, "</div>"); //alert(res);
                                    $('#dpa_imprimir1').html(res).css('background-image','url(imagenes/vista_previa.png)').css('background-size','65%');
                                    $('#dpa_imprimir1').html(res); $('#dpa_imprimir1').printElement();
                                }
                            });
                        }
                    });
                    setTimeout(function(){ tinymce.get("input").execCommand('mceInsertContent', false, data1x); }, 500);

                    var datos ={idE:idE, idSucursal:$('#miSucursal').val()}
                    $.post('imagen/estudios/files-serverside/fichaEstudio.php',datos).done(function( data1 ) {
                        var datosI = data1.split('*}');

                        $("#miSucursalNS").load('pacientes/genera/genera_sucursales_ov.php?idU='+$('#id_user').val(),function(response,status,xhr){
                            if (status = "success"){ $("#miSucursalNS").val($('#miSucursal').val()); }
                        });
                        $('#idUsuarioE').val($('#id_user').val()); $('#idEstudioE').val(idE);

                        $('#nombreE').val(datosI[0]); $('#precioE').val(datosI[2]); $('#precioUrgenciaE').val(datosI[3]);
                        $('#precioME').val(datosI[10]); $('#precioUrgenciaME').val(datosI[11]); $('#precioES').val(datosI[7]);
                        $('#precioUrgenciaS').val(datosI[8]); $('#precioHO').val(datosI[12]); $('#precioEM').val(datosI[13]); $('#precioUrgenciaM').val(datosI[14]);
                    });

                    $('#formEstudio').validator().on('submit', function (e) {
                        if (e.isDefaultPrevented()) { // handle the invalid form...
                        } else { // everything looks good!
                            e.preventDefault();
                            var $btn = $('#btn_save1').button('loading'); $('#btn_cancel1').hide();
                            var datosP = $('#myModal1 #formEstudio').serialize();
                            $.post('servicios/servicios/files-serverside/updateServicio_m.php',datosP).done(function( data ) {
                                if (data==1){//si el paciente se Actualizó
                                    $('#clickme').click(); $btn.button('reset'); $('#btn_cancel1').show(); $('#myModal1').modal('hide');
                                    swal({ title: "", type: "success", text: "El servicio se ha actualizado.", timer: 2000, showConfirmButton: false }); return;
                                } else{alert(data);}
                            });
                        }
                    });
                });

                $('#myModal1').modal('show');
                $('#myModal1').on('shown.bs.modal', function (e) { $('#formEstudio').validator(); });
                $('#myModal1').on('hidden.bs.modal', function (e) { $(".modal-content").remove(); $("#myModal1").empty(); });
            } });
        }

        function insertAtCaret(text) { tinymce.get("input").execCommand('mceInsertContent', false, text); $('#inserta_algo').val(''); }
    </script>

@endsection
