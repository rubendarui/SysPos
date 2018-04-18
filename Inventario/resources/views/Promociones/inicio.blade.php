@extends('Template.PanelAdmin')

@section('titulo', 'Formulario promociones')

@section('detalle')
    @parent

    <p>Dashboard informativos para una mejor toma de decisiones</p>
@endsection

@section('contenido')
<div class="col-lg-12">
                       @include('Promociones.Modal.Formulario')
        <div class="card">
            <div class="card-header d-flex">
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-item"   data-target="#create-item" href="#create-item">NUEVO</button>
                </div>
            </div>
            <div class="card-body">
                <table class="display responsive nowrap" cellspacing="0" width="100%" id="posts">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Final</th>
                            <th>Descuento</th>
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
<script>var url ="<?php echo route('Promociones.index') ?>"; </script>
@endsection
@section('scripts')
 <script src="inicio/Promociones/promociones.js"></script>
@endsection
