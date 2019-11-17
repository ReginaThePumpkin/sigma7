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
Route::get('servicios/catalogo', 'Servicios\CatalogoController@index')->name('servicios-catalogo');
Route::get('servicios/catalogo/datatable-serverside/catalogo', 'Servicios\CatalogoController@getTableCatalogo');