@extends('Template.PanelAdmin')

@section('titulo', 'Almacen')

@section('detalle')
    @parent

    <p>podemos ver la lista de los almacenes y poder agregar, eliminar  y modificar.</p>
@endsection

@section('contenido')
       <div class="col-lg-12">
                       @include('Almacen.Modal.Formulario')
        <div class="card">
            <div class="card-header d-flex">
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-item"   data-target="#create-item" href="#create-item">AGREGAR</button>
                </div>
            </div>
            <div class="card-body">
                <table class="display responsive nowrap" cellspacing="0" width="100%" id="posts">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th disabled>Action</th>
                        </tr>
                    </thead >
                    <tbody id="datos">
                    </tbody>
                </table>
            </div>
        </div>
        <ul id="pagination" class="pagination"></ul>

    </div>
    <input type="hidden" value="{{ csrf_token() }}" id="csrf-token">
<script>var url ="<?php echo route('Almacen.index') ?>"; </script>
@endsection
@section('scripts')
    <script src="inicio/Almacen/almacen.js"></script>
@endsection