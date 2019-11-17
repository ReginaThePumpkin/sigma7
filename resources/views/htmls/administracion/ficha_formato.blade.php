<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_consulta">
    <div class="modal-content animated flipInY">
        <div class="modal-header">
            <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><strong><span id="titulo_modal">NUEVO FORMATO</span></strong></h4>
        </div>
        <div class="modal-body">

            <form action="" method="post" name="form-procesar" id="form-procesar" target="_self" style="height:100%;">
                <table width="100%" height="100%" border="1" class="table-condensed table-bordered">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="nombreF" class="text-info">* NOMBRE DEL FORMATO</label>
                                <input id="nombreF" name="nombreF" type="text" class="form-control input-sm" style="width: 100%" placeholder="Ingresa el nombre del formato"></input>
                            </div>
                        </td>
                    </tr>
                    <tr align="left" style="display:;"> <td height="1px" nowrap>
                            <table width="100%" border="0" cellspacing="1" class="table-condensed">
                                <tr>
                                    <td><select name="inserta_algo" id="inserta_algo" onChange="insertAtCaret(this.value);return false;" class="form-control input-sm">
                                            <option value="" selected>-INSERTA-</option>
                                            <!--<option value="{et_cedulap}">CÉDULA PROFESIONAL DEL MÉDICO</option>
                                            <option value="{et_cedulaesp}">CÉDULA DE ESPECIALIDAD DEL MÉDICO</option>-->
                                            <option value="{et_edad}">EDAD DEL PACIENTE (en años)</option>
                                            <!--<option value="{et_especialidadm}">ESPECIALIDAD DEL MÉDICO</option>-->
                                            <option value="{et_fecha_dia}">DÍA DE ELEBORACIÓN</option>
                                            <!--<option value="{et_dx_envio}">DIAGNÓSTICO DE ENVÍO</option>-->
                                            <option value="{et_fecha_mes_numero}">MES DE ELEBORACIÓN(número)</option>
                                            <option value="{et_fecha_mes_letra}">MES DE ELEBORACIÓN(letra)</option>
                                            <option value="{et_fecha_anio}">AÑO DE ELEBORACIÓN</option>
                                            <option value="{et_fecha_hora}">HORA DE ELEBORACIÓN</option>
                                            <option value="{et_logo_suc}">LOGO DE LA SUCURSAL</option>
                                            <!--<option value="{et_logoe}">LOGO ESCUELA DEL MÉDICO</option>
                                            <option value="{et_logoee}">LOGO ESCUELA ESPECIALIDAD DEL MÉDICO</option>-->
                                            <option value="{et_logogm}">LOGO GENERAL MEDICINA</option>
                                            <!--<option value="{et_nombre_anestesiologo}">NOMBRE DEL ANESTESIÓLOGO</option>-->
                                            <option value="{et_nombre_establecimiento}">NOMBRE DE LA CLÍNICA O CONSULTORIO</option>
                                            <!--<option value="{et_nombre_medico_atiende}">NOMBRE DEL MEDICO QUE ATIENDE</option>
                                            <option value="{et_nombre_procedimiento}">NOMBRE DEL PROCEDIMIENTO O SERVICIO</option>
                                            <option value="{et_firma_medico_atiende}">FIRMA DEL MEDICO QUE ATIENDE</option>
                                            <option value="{et_nombre_medico_refiere}">NOMBRE DEL MEDICO QUE REFIERE</option>
                                            <option value="{et_nombre_universidad}">NOMBRE DE LA UNIVERSIDAD DEL MÉDICO</option>-->
                                            <option value="{et_nombre_paciente}">NOMBRE DEL PACIENTE</option>
                                            <!--<option value="{et_referencia}">NÚMERO DE REFERENCIA</option>-->
                                            <option value="{et_peso_g}">PESO DEL PACIENTE</option>
                                            <option value="{et_talla_g}">TALLA DEL PACIENTE</option>
                                            <option value="{et_sex}">SEXO DEL PACIENTE</option>
                                            <!--<option value="{et_sv}">SIGNOS VITALES DEL PACIENTE</option>-->
                                            <option value="{et_t}">SIGNO VITAL T DEL PACIENTE</option>
                                            <option value="{et_a}">SIGNO VITAL A DEL PACIENTE</option>
                                            <option value="{et_fc}">SIGNO VITAL FC DEL PACIENTE</option>
                                            <option value="{et_fr}">SIGNO VITAL FR DEL PACIENTE</option>
                                            <option value="{et_temp}">SIGNO VITAL TEMP DEL PACIENTE</option>
                                            <option value="{et_tiposan}">TIPO SANGUÍNEO DEL PACIENTE</option>
                                            <!--<option value="{et_titulom}">TÍTULO DEL MÉDICO</option>-->
                                        </select></td>
                                    <td align="right" width="1%" nowrap class="text-primary">FORMATO:</td>
                                </tr>
                            </table>
                        </td> </tr>
                    <tr id="contieneET1" align="left"><td colspan="1">
                            <textarea style="height:90%; resize:none; vertical-align:top;" name="input" id="input" type="text" value="" class="jqte-test"></textarea>
                            <input name="miDiagnostico1" id="miDiagnostico1" type="hidden"> <input name="id_formatof" id="id_formatof" type="hidden">
                            <input name="aleatorio_rmed" id="aleatorio_rmed" type="hidden">
                        </td></tr>
                </table>
            </form>

        </div>

        <div class="modal-footer">
            <div class="form-group">
                <div class="col-sm-offset-0 col-sm-12">
                    <button type='submit' id="btn_guardar" class="btn btn-success btn-sm" onClick="guarda_formato();">Guardar</button>
                    <button type='submit' id="btn_actualizar" class="btn btn-success btn-sm hidden" onClick="actualiza_formato();">Actualizar</button>
                    <button type='button' class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->