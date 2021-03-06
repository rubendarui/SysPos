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
 php artisan make:controller PromocionesController --resource
php artisan make:controller VentasController --resource
 crear Modelos
php artisan make:model Modulo
php artisan make:model Objeto
php artisan make:model PerfilObjeto
php artisan make:model Categoria
php artisan make:model Almacen
php artisan make:model Producto
php artisan make:model Promociones
php artisan make:model Ventas
*/
//URL navegacion
Route::get('compras','UrlController@ComprasInicio');
Route::get('Indicadores','UrlController@DashboardInicio' );
Route::get('Modulos','UrlController@ModuloInicio' );
Route::get('Objetos','UrlController@ObjetoInicio' );
Route::get('Categorias','UrlController@CategoriaInicio' );
Route::get('Almacenes','UrlController@AlmacenInicio' );
Route::get('Productos','UrlController@ProductoInicio' );
Route::get('Promocione', 'UrlController@PromocionesInicio');
Route::get('Venta', 'UrlController@VentaInicio');
//ABM
Route::resource('Modulo','ModuloController');
Route::resource('Objeto','ObjetoController');
Route::resource('PerfilObjeto','PerfilobjetoController');
Route::resource('Categoria','CategoriaController');
Route::resource('Almacen','AlmacenController');
Route::resource('Producto','ProductoController');
Route::resource('Promociones', 'PromocionesController');
Route::resource('Ventas', 'VentasController');
//Armar Tabla
Route::post('allmodulo','ModuloController@allModulos')->name('allmodulo');
Route::post('allobjeto','ObjetoController@allObjeto')->name('allobjeto');
Route::post('allcategoria','CategoriaController@allCategorias')->name('allcategoria');
Route::post('allalmacen','AlmacenController@allAlmacen')->name('allalmacen');
Route::post('allproducto','ProductoController@allProducto')->name('allproducto');
Route::post('allpromociones', 'PromocionesController@allPromociones')->name('allpromociones');
//Listados
Route::get('selectmodulo', 'ModuloController@selectmodulo');