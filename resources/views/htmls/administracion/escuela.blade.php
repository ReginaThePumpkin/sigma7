<div class="modal-dialog modal-lg" role="document" id="contenido_ficha_consulta">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close hidden" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><strong><span id="titulo_modal"></span></strong></h4>
      </div>
      <div class="modal-body">

        <form action="" method="post" name="form-escuela" id="form-escuela" target="_self" style="height:100%;">
        	<input name="idEscuela" id="idEscuela" type="hidden" value="">
            <input name="idUser_esc" id="idUser_esc" type="hidden" value="">
        	<div class="row">
                <div class="form-group col-md-12 col-sm-12 text-primary">
                    <label for="nombre_esc" class="col-form-label">* NOMBRE DE LA ESCUELA</label>
                    <input name="nombre_esc" id="nombre_esc" type="text" class="form-control form-control-sm" placeholder="Nombre de la escuela" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-6 col-sm-6 text-primary">
                    <label for="nivel_esc" class="col-form-label">* NIVEL</label>
                    <select name="nivel_esc" id="nivel_esc" class="form-control form-control-sm" required>
                    	<option value="" selected>-SELECCIONAR-</option>
                        <option value="4">MEDIO SUPERIOR</option>
                        <option value="5">SUPERIOR</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-6 col-sm-6 text-primary">
                    <label for="sector_esc" class="col-form-label">* SECTOR</label>
                    <select name="sector_esc" id="sector_esc" class="form-control form-control-sm" required>
                   		<option value="" selected>-SELECCIONAR-</option>
                        <option value="PUBLICA">PÚBLICA</option>
                        <option value="PRIVADA">PRIVADA</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-12 col-sm-12 text-primary">
                    <label for="estado_esc" class="col-form-label">* ENTIDAD FEDERATIVA</label>
                    <select name="estado_esc" id="estado_esc" class="form-control form-control-sm" required>
                    	<option value="" selected>-SELECCIONAR-</option>
                        <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                        <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                        <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                        <option value="CAMPECHE">CAMPECHE</option>
                        <option value="COAHUILA">COAHUILA</option>
                        <option value="CIUDAD DE MEXICO">CIUDAD DE MEXICO</option>
                        <option value="DURANGO">DURANGO</option>
                        <option value="GUANAJUATO">GUANAJUATO</option>
                        <option value="GUERRERO">GUERRERO</option>
                        <option value="HIDALGO">HIDALGO</option>
                        <option value="JALISCO">JALISCO</option>
                        <option value="ESTADO DE MEXICO">ESTADO DE MEXICO</option>
                        <option value="MICHOACAN">MICHOACAN</option>
                        <option value="MORELOS">MORELOS</option>
                        <option value="NAYARIT">NAYARIT</option>
                        <option value="NUEVO LEON">NUEVO LEON</option>
                        <option value="OAXACA">OAXACA</option>
                        <option value="PUEBLA">PUEBLA</option>
                        <option value="QUERETARO">QUERETARO</option>
                        <option value="QUINTANA ROO">QUINTANA ROO</option>
                        <option value="SAN LUIS POTOSI">SAN LUIS POTOSI</option>
                        <option value="SINALOA">SINALOA</option>
                        <option value="SONORA">SONORA</option>
                        <option value="TABASCO">TABASCO</option>
                        <option value="TAMAULIPAS">TAMAULIPAS</option>
                        <option value="TLAXCALA">TLAXCALA</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </form>

	</div>
      
      <div class="modal-footer">
      	<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
            <button type='submit' id="btn_save_escuela" class="btn btn-success btn-sm" form="form-escuela">Guardar</button>
            <button type='button' class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>     
        </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->