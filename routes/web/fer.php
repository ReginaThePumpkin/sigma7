<?php

// Seccion de administración
// Subseccion formatos
Route::get('/administracion/formatos', 'Administracion\FormatosController@index')->name('administracion-formatos');
Route::get('/administracion/formatos/datatable-serverside/formatos', 'Administracion\FormatosController@getTableFormatos');
Route::get('/administracion/formatos/htmls/ficha_formato', 'Administracion\FormatosController@getFichaFormato');
Route::post('/administracion/formatos/files-serverside/addFormato', 'Administracion\FormatosController@addFormato');
Route::post('/administracion/formatos/files-serverside/ficha_formato', 'Administracion\FormatosController@getFicha');
Route::post('/administracion/formatos/files-serverside/updateFormato', 'Administracion\FormatosController@updateFormato');


// Seccion de servicios
// Subseccion catalogo
Route::get('/servicios/catalogo', 'Servicios\CatalogoController@index')->name('servicios-catalogo');
Route::get('/servicios/catalogo/datatable-serverside/catalogo', 'Servicios\CatalogoController@getTableCatalogo');
Route::get('/servicios/catalogo/genera_sucursales_ov', 'Servicios\CatalogoController@getSucursales');
Route::get('/servicios/catalogo/genera/inserciones', 'Servicios\CatalogoController@inserciones');
Route::get('/servicios/catalogo/htmls/ficha_servicio_m', 'Servicios\CatalogoController@getFichaServicio');
Route::post('/servicios/catalogo/files-serverside/datosSucursalU', 'Servicios\CatalogoController@datosSucursal');
Route::post('/servicios/catalogo/files-serverside/check_formato', 'Servicios\CatalogoController@check_formato');
Route::post('/servicios/catalogo/files-serverside/check_formato_individual', 'Servicios\CatalogoController@check_formato_individual');
Route::post('/servicios/catalogo/files-serverside/addServicio_m', 'Servicios\CatalogoController@addServicio_m');
Route::post('/servicios/catalogo/files-serverside/updateServicio_m', 'Servicios\CatalogoController@updateServicio_m');
Route::post('/servicios/catalogo/files-serverside/fichaEstudio', 'Servicios\CatalogoController@fichaEstudio');