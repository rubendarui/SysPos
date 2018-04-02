<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UrlController extends Controller
{

    public function __construct() {
        $this->titulo = DB::table('objeto')->select('nombre', 'font', 'id','tipoobjeto')->where('tipoobjeto', 'Titulo')->where('eliminar','=', 0)->get();
        $this->subtitulo = DB::table('objeto')->select('nombre', 'url', 'padre')->where('padre', '>', 0)->where('eliminar','=', 0)->get();
    }

function ComprasInicio() {
		 $titulo = $this->titulo;
 $subtitulo = $this->subtitulo;
    return view('Compras.inicio',compact('titulo','subtitulo'));
}
function DashboardInicio() {
		 $titulo = $this->titulo;
 $subtitulo = $this->subtitulo;
    return view('Dashboard.inicio',compact('titulo','subtitulo'));
}
function ModuloInicio() {
	 $titulo = $this->titulo;
 $subtitulo = $this->subtitulo;
    return view('Modulo.inicio',compact('titulo','subtitulo'));
}
function ObjetoInicio() {

 $titulo = $this->titulo;
 $subtitulo = $this->subtitulo;
    return view('Objeto.inicio',compact('titulo','subtitulo'));
}
function CategoriaInicio() {
 $titulo = $this->titulo;
 $subtitulo = $this->subtitulo;
    return view('Categoria.inicio',compact('titulo','subtitulo'));
}
function AlmacenInicio() {
 $titulo = $this->titulo;
 $subtitulo = $this->subtitulo;
    return view('Almacen.inicio',compact('titulo','subtitulo'));
}

}
