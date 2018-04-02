<?php

/*
Crear Controladores

 php artisan make:controller ModuloController --resource
 php artisan make:controller UrlController 
 php artisan make:controller ObjetoController --resource
 php artisan make:controller PerfilobjetoController --resource
 php artisan make:controller CategoriaController --resource
 php artisan make:controller AlmacenController --resource
 php artisan make:controller ProductoController --resource
 crear Modelos
php artisan make:model Modulo
php artisan make:model Objeto
php artisan make:model PerfilObjeto
php artisan make:model Categoria
php artisan make:model Almacen
php artisan make:model Producto
*/
//URL navegacion
Route::get('compras','UrlController@ComprasInicio');
Route::get('Indicadores','UrlController@DashboardInicio' );
Route::get('Modulos','UrlController@ModuloInicio' );
Route::get('Objetos','UrlController@ObjetoInicio' );
Route::get('Categorias','UrlController@CategoriaInicio' );
Route::get('Almacenes','UrlController@AlmacenInicio' );
Route::get('Productos','UrlController@ProductoInicio' );
//ABM
Route::resource('Modulo','ModuloController');
Route::resource('Objeto','ObjetoController');
Route::resource('PerfilObjeto','PerfilobjetoController');
Route::resource('Categoria','CategoriaController');
Route::resource('Almacen','AlmacenController');
//Armar Tabla
Route::post('allmodulo','ModuloController@allModulos')->name('allmodulo');
Route::post('allobjeto','ObjetoController@allObjeto')->name('allobjeto');
Route::post('allcategoria','CategoriaController@allCategorias')->name('allcategoria');
Route::post('allalmacen','AlmacenController@allAlmacen')->name('allalmacen');
//Listados
Route::get('selectmodulo','ModuloController@selectmodulo' );