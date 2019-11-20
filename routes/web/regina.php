<?php

// Seccion de administración
// Subseccion escuelas

Route::get('/administracion/escuelas', 'Administracion\EscuelasController@index')->name('administracion-escuelas');
Route::get('/administracion/escuelas/datatable-serverside/escuelas', 'Administracion\EscuelasController@getTableEscuelas');
Route::get('/administracion/escuelas/htmls/escuela', 'Administracion\EscuelasController@getEscuela');
Route::post('/administracion/escuelas/files-serverside/datosEscuela', 'Administracion\EscuelasController@getDatosEscuela');
Route::post('/administracion/escuelas/files-serverside/updateEscuela', 'Administracion\EscuelasController@updateEscuela');