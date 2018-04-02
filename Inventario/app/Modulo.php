<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Modulo extends Model
{	
	public $timestamps=true;
	protected $dataFormat='U'; 
     protected $table = 'modulo';
    public $fillable = ['id', 'nombre', 'eliminado', 'updated_at','created_at'];

	static public function conbusquedaconsulta($start,$limit,$order,$dir,$search)
    {
     	$posts=DB::table('modulo')
       				->select('id', 'nombre')
                    ->where('eliminado', '=', 0)
                    ->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('nombre', 'LIKE', "%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
                    return $posts;
    }
    static public function sinbusquedaconsulta($start,$limit,$order,$dir)
    {
    	$posts=DB::table('modulo')
                   	->select('id', 'nombre')
                    ->where('eliminado', '=', 0)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
    	return $posts;
    }
     static public function dataresultsearch($search)
    {
    	$posts=DB::table('modulo')
                    ->where('eliminado', '=', 0)
                    ->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('nombre', 'LIKE', "%{$search}%")
                    ->count();
         return $posts;
 	}

 	     static public function listarmodulos()
    {
    	$posts=DB::table('modulo')
    				->select('id', 'nombre')
                    ->where('eliminado', '=', 0)
                    ->get();
         return $posts;
 	}
}
