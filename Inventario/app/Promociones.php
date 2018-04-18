<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    public $timestamps    = false;
    protected $dataFormat = 'U';
    protected $table      = 'promociones';
    public $fillable      = ['id', 'nombre', 'fechai', 'fechaf', 'descuento', 'eliminado'];

    public static function conbusquedaconsulta($start, $limit, $order, $dir, $search)
    {
        $posts = DB::table('promociones')
            ->select('id', 'nombre', 'fechai', 'fechaf', 'descuento')
            ->where('eliminado', '=', 0)
            ->where('id', 'LIKE', "%{$search}%")
            ->where('descuento', 'LIKE', "%{$search}%")
            ->orWhere('nombre', 'LIKE', "%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
        return $posts;
    }
    public static function sinbusquedaconsulta($start, $limit, $order, $dir)
    {
        $posts = DB::table('promociones')
            ->select('id', 'nombre', 'fechai', 'fechaf', 'descuento')
            ->where('eliminado', '=', 0)
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
        return $posts;
    }
    public static function dataresultsearch($search)
    {
        $posts = DB::table('promociones')
            ->where('eliminado', '=', 0)
            ->where('id', 'LIKE', "%{$search}%")
            ->where('descuento', 'LIKE', "%{$search}%")
            ->orWhere('nombre', 'LIKE', "%{$search}%")
            ->count();
        return $posts;
    }

    public static function listarmodulos()
    {
        $posts = DB::table('promociones')
            ->select('id', 'nombre', 'fechai', 'fechaf', 'descuento')
            ->where('eliminado', '=', 0)
            ->get();
        return $posts;
    }
    public static function contardata()
    {
        $posts = DB::table('promociones')
            ->where('eliminado', '=', 0)
            ->count();
        return $posts;
    }
}
