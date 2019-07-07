<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine = 'MyISAM';
		
		    $table->integer('id_u')->unsigned();
		    $table->string('nombre_u', 100);
		    $table->string('apaterno_u', 100);
		    $table->string('amaterno_u', 100)->default(null);
		    $table->smallInteger('especialidad_u')->unsigned()->default(null);
		    $table->string('cedulaProfesional_u', 50)->default(null);
		    $table->string('cedulaProfesionalE_u', 50)->default(null);
		    $table->string('curp_u', 18)->default(null);
		    $table->string('tCelular_u', 17)->default(null);
		    $table->string('tParticular_u', 17)->default(null);
		    $table->string('tTrabajo_u', 17)->default(null);
		    $table->string('extensionTt_u', 20)->default(null);
		    $table->string('tEmergencia_u', 17)->default(null);
		    $table->string('contactoEmergencia_u', 150)->default(null);
		    $table->string('rfc_u', 15)->default(null);
		    $table->integer('idSucursal_u')->unsigned()->default(null);
		    $table->string('noID_u', 100)->default(null);
		    $table->string('email_u', 100)->default(null);
		    $table->boolean('sexo_u')->unsigned()->default(null);
		    $table->date('fNac_u')->default(null);
		    $table->boolean('activo_u')->unsigned()->default('1');
		    $table->boolean('validado_u')->unsigned()->default('0');
		    $table->string('notas_u', 200)->default(null);
		    $table->boolean('idEscolaridad_u')->unsigned()->default(null);
		    $table->string('usuario_u', 30)->default(null);
		    $table->string('contrasena_u', 255)->default(null);
		    $table->string('contrasena1_u', 30)->default(null);
		    $table->boolean('acceso_u')->unsigned()->default('3');
		    $table->boolean('idDepartamento_u')->unsigned()->default(null);
		    $table->boolean('idArea_u')->unsigned()->default(null);
		    $table->integer('idProfesion_u')->unsigned()->default(null);
		    $table->dateTime('fecha_ingreso_u')->default(null);
		    $table->integer('idUsuarioR_u')->unsigned()->default(null);
		    $table->string('nacionalidad_u', 100)->default('MEXICANO');
		    $table->integer('idPuesto_u')->default(null);
		    $table->string('calle_u', 200)->default(null);
		    $table->integer('entidadFederativa_u')->unsigned()->default(null);
		    $table->integer('municipio_u')->unsigned()->default(null);
		    $table->integer('colonia_u')->unsigned()->default(null);
		    $table->string('cp_u', 10)->default(null);
		    $table->boolean('tSanguineo_u')->unsigned()->default(null);
		    $table->integer('idOcupacion_u')->unsigned()->default(null);
		    $table->boolean('foto_u')->unsigned()->default('0');
		    $table->string('nombreFoto_u', 30)->default(null);
		    $table->boolean('usuarioNuevo_u')->unsigned()->default('1');
		    $table->integer('promotor_u')->unsigned()->default(null);
		    $table->string('titulo_u', 10)->default('C.');
		    $table->boolean('id_titulo_u')->unsigned()->default('1');
		    $table->boolean('multisucursal_u')->unsigned()->default('2');
		    $table->string('temporal_u', 100)->default(null);
		    $table->boolean('firma_u')->unsigned()->default('0');
		    $table->text('coordenadas_u');
		    $table->time('horario_e_lu');
		    $table->time('horario_s_lu');
		    $table->time('horario_e_ma');
		    $table->time('horario_s_ma');
		    $table->time('horario_e_mi');
		    $table->time('horario_s_mi');
		    $table->time('horario_e_ju');
		    $table->time('horario_s_ju');
		    $table->time('horario_e_vi');
		    $table->time('horario_s_vi');
		    $table->time('horario_e_sa');
		    $table->time('horario_s_sa');
		    $table->time('horario_e_do');
		    $table->time('horario_s_do');
		    $table->text('variable_temporal_u');
		    $table->text('variable_temporal1_u');
		    $table->text('variable_temporal2_u');
		    $table->text('variable_temporal3_u');
		    $table->text('variable_temporal4_u');
		    $table->mediumInteger('universidad_u')->unsigned()->default(null);
		    $table->boolean('estatus_laboral_u')->unsigned()->default(null);
		    $table->boolean('estatus_escolar_u')->unsigned()->default(null);
		    $table->string('permisos_u', 50)->default('00000000000000000000000000000000000000000000000');
		    $table->mediumInteger('universidad_e_u')->unsigned()->default(null);
		
		    $table->timestamps();
		
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
