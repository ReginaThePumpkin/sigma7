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
		
		    $table->increments('id_u');
		    $table->string('nombre_u', 100)->charset('latin1')->collation('latin1_spanish_ci')->index();
		    $table->string('apaterno_u', 100)->charset('latin1')->collation('latin1_spanish_ci')->index();
		    $table->string('amaterno_u', 100)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->unsignedSmallInteger('especialidad_u')->nullable();
		    $table->string('cedulaProfesional_u', 50)->charset('latin1')->collation('latin1_spanish_ci')->nullable()->unique();
		    $table->string('cedulaProfesionalE_u', 50)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->string('curp_u', 18)->charset('latin1')->collation('latin1_spanish_ci')->nullable()->unique();
		    $table->string('tCelular_u', 17)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->string('tParticular_u', 17)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->string('tTrabajo_u', 17)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->string('extensionTt_u', 20)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->string('tEmergencia_u', 17)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->string('contactoEmergencia_u', 150)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->string('rfc_u', 15)->charset('latin1')->collation('latin1_spanish_ci')->nullable()->unique();
		    $table->unsignedInteger('idSucursal_u')->nullable();
		    $table->string('noID_u', 100)->charset('latin1')->collation('latin1_spanish_ci')->nullable()->unique();
		    $table->string('email_u', 100)->charset('latin1')->collation('latin1_spanish_ci')->nullable()->index();
		    $table->unsignedTinyInteger('sexo_u')->nullable()->index();
		    $table->date('fNac_u')->nullable()->index();
		    $table->unsignedTinyInteger('activo_u')->default('1');
		    $table->unsignedTinyInteger('validado_u')->default('0');
		    $table->string('notas_u', 200)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->unsignedTinyInteger('idEscolaridad_u')->nullable();
		    $table->string('usuario_u', 30)->charset('latin1')->collation('latin1_spanish_ci')->nullable()->unique();
		    $table->string('password', 255)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->string('contrasena1_u', 30)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->unsignedTinyInteger('acceso_u')->default('3')->index();
		    $table->unsignedTinyInteger('idDepartamento_u')->nullable();
		    $table->unsignedTinyInteger('idArea_u')->nullable();
		    $table->unsignedInteger('idProfesion_u')->nullable();
		    $table->dateTime('fecha_ingreso_u')->nullable();
		    $table->unsignedInteger('idUsuarioR_u')->nullable();
		    $table->string('nacionalidad_u', 100)->charset('latin1')->collation('latin1_spanish_ci')->default('MEXICANO')->nullable();
		    $table->unsignedInteger('idPuesto_u')->nullable();
		    $table->string('calle_u', 200)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->unsignedInteger('entidadFederativa_u')->nullable();
		    $table->unsignedInteger('municipio_u')->nullable();
		    $table->unsignedInteger('colonia_u')->nullable();
		    $table->string('cp_u', 10)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->unsignedTinyInteger('tSanguineo_u')->nullable();
		    $table->unsignedInteger('idOcupacion_u')->nullable();
		    $table->unsignedTinyInteger('foto_u')->default('0')->nullable();
		    $table->string('nombreFoto_u', 30)->charset('latin1')->collation('latin1_spanish_ci')->nullable();
		    $table->unsignedTinyInteger('usuarioNuevo_u')->default('1');
		    $table->unsignedInteger('promotor_u')->nullable();
		    $table->string('titulo_u', 10)->charset('latin1')->collation('latin1_spanish_ci')->default('C.');
		    $table->unsignedTinyInteger('id_titulo_u')->default('1');
		    $table->unsignedTinyInteger('multisucursal_u')->default('2');
		    $table->string('temporal_u', 100)->charset('latin1')->collation('latin1_spanish_ci')->nullable()->unique();
		    $table->unsignedTinyInteger('firma_u')->default('0');
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
		    $table->text('variable_temporal_u')->nullable();
		    $table->text('variable_temporal1_u')->nullable();
		    $table->text('variable_temporal2_u')->nullable();
		    $table->text('variable_temporal3_u')->nullable();
		    $table->text('variable_temporal4_u')->nullable();
		    $table->unsignedMediumInteger('universidad_u')->nullable();
		    $table->unsignedTinyInteger('estatus_laboral_u')->nullable();
		    $table->unsignedTinyInteger('estatus_escolar_u')->nullable();
		    $table->string('permisos_u', 50)->charset('latin1')->collation('latin1_spanish_ci')->default('00000000000000000000000000000000000000000000000');
		    $table->unsignedMediumInteger('universidad_e_u')->nullable();
		
		    $table->timestamps();
		
        });

        DB::statement('ALTER TABLE `usuarios`
        ADD UNIQUE KEY `curp_u` (`curp_u`),
        ADD UNIQUE KEY `cedulaProfesional_u` (`cedulaProfesional_u`),
        ADD UNIQUE KEY `rfc_u` (`rfc_u`),
        ADD UNIQUE KEY `usuario_u` (`usuario_u`),
        ADD UNIQUE KEY `noID_u` (`noID_u`),
        ADD UNIQUE KEY `temporal_u` (`temporal_u`),
        ADD KEY `nombre_u` (`nombre_u`),
        ADD KEY `apaterno_u` (`apaterno_u`),
        ADD KEY `idEspecialidad_u` (`especialidad_u`),
        ADD KEY `email_u` (`email_u`),
        ADD KEY `sexo_u` (`sexo_u`),
        ADD KEY `fNac_u` (`fNac_u`),
        ADD KEY `acceso_u` (`acceso_u`),
        ADD KEY `nombre_u_2` (`nombre_u`,`apaterno_u`),
        ADD KEY `usuario_nuevo` (`usuarioNuevo_u`) USING BTREE,
        ADD KEY `cedulaProfesionalE_u` (`cedulaProfesionalE_u`),
        ADD KEY `promotor_u` (`promotor_u`),
        ADD KEY `multisucursal_u` (`multisucursal_u`,`firma_u`,`universidad_u`);');
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
