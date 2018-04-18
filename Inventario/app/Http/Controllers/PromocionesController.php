<?php

namespace App\Http\Controllers;

use App\Promociones;
use Illuminate\Http\Request;
use Db;
class PromocionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Promociones::create($request->all());
        return response()->json($create);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Promociones::find($id);
        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = Promociones::find($id)->update($request->all());
        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edit = Promociones::find($id)->update(['eliminado' => 1]);
        return response()->json($edit);
    }

    public function allPromociones(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'nombre',
            2 => 'fechai',
            3 => 'fechaf',
            4 => 'descuento',
            5 => 'action',
        );
        $totalData     = Promociones::contardata();
        $totalFiltered = $totalData;
        $limit         = $request->input('length');
        $start         = $request->input('start');
        $order         = $columns[$request->input('order.0.column')];
        $dir           = $request->input('order.0.dir');
        if (empty($request->input('search.value'))) {
            $posts = Promociones::sinbusquedaconsulta($start, $limit, $order, $dir);
        } else {
            $search        = $request->input('search.value');
            $posts         = Promociones::conbusquedaconsulta($start, $limit, $order, $dir, $search);
            $totalFiltered = Promociones::dataresultsearch($search);
        }
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData["DT_RowId"]  = $post->id;
                $nestedData['id']        = $post->id;
                $nestedData['nombre']    = $post->nombre;
                $nestedData['fechai']    = $post->fechai;
                $nestedData['fechaf']    = $post->fechaf;
                $nestedData['descuento'] = $post->descuento;
                $nestedData['action']    = "&emsp;
                                          <button data-toggle='modal' data-target='#edit-item'  onclick='mostrardata({$post->id})' class='btn btn-primary edit-item'>Edit</button>
                                          &emsp;<button class='btn btn-danger remove-item'>Delete</button>";
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,
        );

        echo json_encode($json_data);
    }
}
