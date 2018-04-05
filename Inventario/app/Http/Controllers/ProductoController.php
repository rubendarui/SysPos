<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use DB;
class ProductoController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function allProducto(Request $request) {
        $columns = array(
            0 => 'id',
            1 => 'nombre',
              2 => 'categoria',
              3 => 'codigointerno',
            4 => 'action',
        );
        $totalData = Producto::contardata();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if (empty($request->input('search.value'))) {
            $posts = Producto::sinbusquedaconsulta($start,$limit,$order,$dir);
        } else {
            $search = $request->input('search.value');
            $posts = Producto::conbusquedaconsulta($start,$limit,$order,$dir,$search);
            $totalFiltered = Producto::dataresultsearch($search);
        }
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData["DT_RowId"] =$post->id;
                $nestedData['id'] = $post->id;
                $nestedData['nombre'] = $post->nombre;
                        $nestedData['categoria'] = $post->categoria;
                                $nestedData['codigointerno'] = $post->codigointerno;
                $nestedData['action'] = "&emsp; 
                                          <button data-toggle='modal' data-target='#edit-item'  onclick='mostrardata({$post->id})' class='btn btn-primary edit-item'>Edit</button> 
                                          &emsp;<button class='btn btn-danger remove-item'>Delete</button>";
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }
}
