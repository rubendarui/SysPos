<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    public $timestamps    = false;
    protected $dataFormat = 'U';
    protected $table      = 'venta';
    public $fillable      = ['id', 'nombre', 'fecha', 'nit', 'total'];

    public static function listarmodulos()
    {
        $posts = DB::table('Venta')
            ->select('id', 'nombre', 'fecha', 'nit', 'total')
            ->get();
        return $posts;
    }
}
