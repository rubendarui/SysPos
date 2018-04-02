<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Categoria extends Model
{
    public $timestamps=false;
	protected $dataFormat='U'; 
     protected $table = 'categoria';
    public $fillable = ['id', 'nombre', 'eliminado','imge'];

	static public function conbusquedaconsulta($start,$limit,$order,$dir,$search)
    {
     	$posts=DB::table('categoria')
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
    	$posts=DB::table('categoria')
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
    	$posts=DB::table('categoria')
                    ->where('eliminado', '=', 0)
                    ->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('nombre', 'LIKE', "%{$search}%")
                    ->count();
         return $posts;
 	}

 	     static public function listarmodulos()
    {
    	$posts=DB::table('categoria')
    				->select('id', 'nombre','imge')
                    ->where('eliminado', '=', 0)
                    ->get();
         return $posts;
 	}
 	static public function contardata(){
 	$posts=	DB::table('Categoria')
                ->where('eliminado', '=', 0)
                ->count();
                return $posts;
 	}
}

