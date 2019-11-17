<div id="ficha_estudio">
    <form action="" method="post" name="formEstudio" id="formEstudio" target="_self" style="height:100%;">
        <input name="idEstudioE" type="hidden" id="idEstudioE"> <input name="idusuarioNM" type="hidden" id="idusuarioNM">
        <div class="miTab" id="tabs-2">
            <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="4" class="grisecito">
                <tr align="left"> <td height="1px" nowrap>
                        <table width="100%" border="0" cellspacing="1" cellpadding="3">
                            <tr>
                                <td width="1%" nowrap>TÍTULO</td>
                                <td width=""><input name="nombreNM"type="text"id="nombreNM"onKeyUp="conMayusculas(this); solo_letras_numeros(this.value, this.name);" class="required"></td>
                                <td width="300px"><select name="area_nota" id="area_nota" class="required"> </select></td>
                                <td width="150px"><select name="inserta_algo" id="inserta_algo" onChange="insertAtCaret(this.value);return false;">
                                        <option value="">-INSERTA-</option>
                                        <option value="{et_alergias}">ALERGIAS</option>
                                        <option value="{et_adicciones}">ADICCIONES</option>
                                        <option value="{et_telefono_particular_paciente}">TELÉFONO PARTICULAR DEL PACIENTE</option>
                                        <option value="{et_direccion_paciente}">DIRECCIÓN DEL PACIENTE</option>
                                        <option value="{et_edad}">EDAD PACIENTE</option>
                                        <option value="{et_escolaridad_paciente}">ESCOLARIDAD DEL PACIENTE</option>
                                        <option value="{et_fechanacimiento}">FECHA DE NACIMIENTO DEL PACIENTE</option>
                                        <option value="{et_fechaactual}">FECHA ACTUAL</option>
                                        <option value="{et_fechahora}">FECHA COMPLETA ACTUAL</option>
                                        <option value="{et_historia_clinica}">HISTORIA CLÍNICA DEL PACIENTE</option>
                                        <option value="{et_lugar_nacimiento_paciente}">LUGAR DE NACIMIENTO</option>
                                        <option value="{et_nombre_paciente}">NOMBRE DEL PACIENTE</option>
                                        <option value="{et_pesotalla_g}">PESO Y TALLA</option>
                                        <option value="{et_nombre_sucu}">NOMBRE DE LA SUCURSAL</option>
                                        <option value="{et_religion_paciente}">RELIGIÓN DEL PACIENTE</option>
                                        <option value="{et_sex}">SEXO</option>
                                        <option value="{et_tipo_sanguineo}">TIPO SANGUÍNEO Y FACTOR RH</option>
                                    </select></td>
                                <td align="right" width="1%" nowrap>FORMATO:</td>
                            </tr>
                        </table>
                    </td> </tr>
                <tr id="contieneET" align="left"><td colspan="4">
                        <input style="resize:none;" name="input" id="input" type="text" class="" autofocus>
                    </td></tr>
            </table>
        </div>

    </form>
</div>