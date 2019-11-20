<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_usuario">
    <div class="modal-content animated flipInY">
        <div class="modal-header">
            <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><strong><span id="titulo_modal">NUEVO SERVICIO MÉDICO</span></strong></h4>
        </div>
        <div class="modal-body">
            <form action="" method="post" name="formEstudio" id="formEstudio" target="_self">
                <input name="idEstudioE" type="hidden" id="idEstudioE">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#tEstudio" aria-controls="tEstudio" role="tab" data-toggle="tab" id="tab_estudio">SERVICIO</a>
                    </li>
                    <li role="presentation"><a href="#tTabulador" aria-controls="tTabulador" role="tab" data-toggle="tab" id="tab_tabulador">TABULADOR</a></li>
                    <li role="presentation"><a href="#tFormato" aria-controls="tFormato" role="tab" data-toggle="tab" id="tab_formato">FORMATO</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="tEstudio" aria-labelledby="estudio-tab"><br>
                        <input name="idUsuarioE" id="idUsuarioE" type="hidden" value="">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="nombreE">* NOMBRE DEL ESTUDIO</label>
                                <input type="text" class="form-control input-sm" id="nombreE" name="nombreE" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="precioE">* PRECIO PÚBLICO($)</label>
                                <input type="text" class="form-control input-sm" id="precioE" name="precioE" required onKeyUp="numeros_decimales(this.value, this.name);">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="precioUrgenciaE">* PRECIO PÚBLICO URGENCIA($)</label>
                                <input type="text" class="form-control input-sm" id="precioUrgenciaE" name="precioUrgenciaE" required onKeyUp="numeros_decimales(this.value, this.name);">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="precioME">* PRECIO DE MEMBRESÍA($)</label>
                                <input type="text" class="form-control input-sm" id="precioME" name="precioME" required onKeyUp="numeros_decimales(this.value, this.name);">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="precioUrgenciaME">* PRECIO MEMBRESÍA URGENCIA($)</label>
                                <input type="text" class="form-control input-sm" id="precioUrgenciaME" name="precioUrgenciaME" required onKeyUp="numeros_decimales(this.value, this.name);">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="precioHO">* PRECIO DE HOSPITAL($)</label>
                                <input type="text" class="form-control input-sm" id="precioHO" name="precioHO" required onKeyUp="numeros_decimales(this.value, this.name);">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 hidden">
                            <div class="form-group">
                                <label for="miSucursalNS">* SUCURSAL</label>
                                <select name='miSucursalNS' class="form-control input-sm" id='miSucursalNS' required></select>
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="tTabulador"><br>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="precioEM">* TABULADOR MAQUILA($)</label>
                                <input type="text" class="form-control input-sm" id="precioEM" name="precioEM" required onKeyUp="numeros_decimales(this.value, this.name);" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="precioUrgenciaM">* TABULADOR MAQUILA URGENCIA($)</label>
                                <input type="text" class="form-control input-sm" id="precioUrgenciaM" name="precioUrgenciaM" required onKeyUp="numeros_decimales(this.value, this.name);" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="precioES">* TABULADOR SUCURSAL($)</label>
                                <input type="text" class="form-control input-sm" id="precioES" name="precioES" required onKeyUp="numeros_decimales(this.value, this.name);" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="precioUrgenciaS">* TABULADOR SUCURSAL URGENCIA($)</label>
                                <input type="text" class="form-control input-sm" id="precioUrgenciaS" name="precioUrgenciaS" required onKeyUp="numeros_decimales(this.value, this.name);" required>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane tap-pane-primary" id="tFormato" role="tabpanel" aria-labelledby="formato-tab"><br>
                        <table width="100%" height="100%" border="1" class="table-condensed table-bordered">
                            <tr align="left"> <td height="1px" nowrap>
                                    <table width="100%" border="0" cellspacing="1" class="table-condensed">
                                        <tr>
                                            <td><select name="inserta_algo" id="inserta_algo" onChange="insertAtCaret(this.value);return false;" class="form-control input-sm insers">
                                                </select></td>
                                            <td align="right" width="1%" nowrap class="text-primary">FORMATO DEL ESTUDIO:</td>
                                        </tr>
                                    </table>
                                </td> </tr>
                            <tr id="contieneET1" align="left"><td colspan="4">
                                    <textarea style="height:90%; resize:none; vertical-align:top;" name="input" id="input" type="text" value="" class="jqte-test"></textarea>
                                    <input name="miDiagnostico1" id="miDiagnostico1" type="hidden"> <input name="id_rmed" id="id_rmed" type="hidden">
                                    <input name="aleatorio_rmed" id="aleatorio_rmed" type="hidden">
                                </td></tr>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <div class="col-sm-offset-0 col-sm-12">
                    <div class="checkbox">
                        <button type="submit" form="formEstudio" data-loading-text="<i class='fa fa-circle-o-notch fa-spin' aria-hidden='true'></i> Procesando..." class="btn btn-success" id="btn_save1">Guardar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancel1">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->