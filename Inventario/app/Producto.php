<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Producto extends Model
{
    public $timestamps=false;
	protected $dataFormat='U'; 
    protected $table = 'producto';
    public $fillable = ['id', 'nombre', 'codigointerno', 'precioventa', 'preciointerno', 'categoria', 'imgen', 'tipoproducto', 'stockmin', 'ventadirecta', 'eliminado'];

    static public function conbusquedaconsulta($start,$limit,$order,$dir,$search)
    {
     	$posts=DB::table('producto')
       				->select('producto.id', 'producto.nombre','categoria.nombre as categoria','producto.codigointerno')
       				 ->join('categoria', 'categoria.id', '=', 'producto.categoria')
                   ->Where('producto.eliminado', '=', 0)
                
                   // ->where('categoria.nombre', 'LIKE', "%{$search}%")
                    ->where('producto.id', 'LIKE', "%{$search}%")
                       ->orWhere('producto.codigointerno', 'LIKE', "%{$search}%")
                 //   ->whereColumn([['producto.id', 'LIKE', "%{$search}%"],['producto.nombre', 'LIKE', "%{$search}%"],['producto.eliminado', '=', 0]])

                   // ->orWhere('producto.nombre', 'LIKE', "%{$search}%")
                
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
                    return $posts;
    }
    static public function sinbusquedaconsulta($start,$limit,$order,$dir)
    {
    	$posts=DB::table('producto')
                   ->select('producto.id', 'producto.nombre','categoria.nombre as categoria','producto.codigointerno')
       				 ->join('categoria', 'categoria.id', '=', 'producto.categoria')
                    ->where('producto.eliminado', '=', 0)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
    	return $posts;
    }
     static public function dataresultsearch($search)
    {
    	$posts=DB::table('producto')
    	 ->join('categoria', 'categoria.id', '=', 'producto.categoria')
                  ->where('producto.eliminado', '=', 0)
                    //->orWhere('producto.codigointerno', 'LIKE', "%{$search}%")
                    //->orWhere('categoria.nombre', 'LIKE', "%{$search}%")
                     ->where('producto.id', 'LIKE', "%{$search}%")
                    ->orWhere('producto.nombre', 'LIKE', "%{$search}%")
                    ->count();
         return $posts;
 	}

 	     static public function listarmodulos()
    {
    	$posts=DB::table('producto')
    				->select('id', 'nombre','imge')
                    ->where('eliminado', '=', 0)
                    ->get();
         return $posts;
 	}
 	static public function contardata(){
 	$posts=	DB::table('producto')
                ->where('eliminado', '=', 0)
                ->count();
                return $posts;
 	}
}
