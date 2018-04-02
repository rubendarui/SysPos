<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Objeto extends Model
{
    	public $timestamps=false;
	protected $dataFormat='U'; 
     protected $table = 'objeto';
    public $fillable = ['id', 'nombre', 'url', 'tipoobjeto', 'visibleconelmenu', 'idmodulo', 'eliminar', 'habilitado', 'padre', 'font', 'created_at', 'updated_at'];

	static public function conbusquedaconsulta($start,$limit,$order,$dir,$search)
    {
     	$posts=DB::table('objeto')
                ->select('objeto.id', 'objeto.nombre', 'objeto.url', 'objeto.tipoobjeto','modulo.nombre as modulo','modulo.id as idmodulo')
                ->join('modulo', 'modulo.id', '=', 'objeto.idmodulo')
                ->where('objeto.eliminar', '=', 0)
                          ->where('objeto.id','LIKE',"%{$search}%")
                          ->orWhere('objeto.url','LIKE',"%{$search}%")
                          ->orWhere('objeto.nombre', 'LIKE',"%{$search}%")
                          ->offset($start)
                          ->limit($limit)
                          ->orderBy($order,$dir)
                          ->get();
                    return $posts;
    }
    static public function sinbusquedaconsulta($start,$limit,$order,$dir)
    {
    	$posts=DB::table('objeto')
                         ->select('objeto.id', 'objeto.nombre', 'objeto.url', 'objeto.tipoobjeto','modulo.nombre as modulo','modulo.id as idmodulo')
                         ->join('modulo', 'modulo.id', '=', 'objeto.idmodulo')
                         ->where('objeto.eliminar', '=', 0)
                         ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
    	return $posts;
    }
     static public function dataresultsearch($search)
    {
    	$posts=DB::table('objeto')
                        ->select('objeto.id', 'objeto.nombre', 'objeto.url', 'objeto.tipoobjeto','modulo.nombre as modulo','modulo.id as idmodulo')
                        ->join('modulo', 'modulo.id', '=', 'objeto.idmodulo')
                        ->where('objeto.eliminar', '=', 0)
                        ->where('objeto.id','LIKE',"%{$search}%")
                        ->orWhere('objeto.url','LIKE',"%{$search}%")
                        ->orWhere('objeto.nombre', 'LIKE',"%{$search}%")
                         
                             ->count();
         return $posts;
 	}
}
