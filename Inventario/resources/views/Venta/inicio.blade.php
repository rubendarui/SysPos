@extends('Template.PanelAdminVenta')


@section('titulo', 'Venta')


@section('detalle')
    @parent


        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 1% !important;" >
            <p>
            podemos ver la lista de las ventas y poder agregar, eliminar  y modificar.
                    <button type="submit" class="btn btn-primary far fa-save  float-right" style="margin-right:5px; font-size: 1.33em;" id="guardar" ></button>
                    <button type="button" class="btn btn-primary fas fa-plus-square float-right" style="margin-right:5px; font-size: 1.33em;"></button>
            </p>
        </div>



@endsection
@section('contenidoVenta')
<div id="contenidoventa">
<form data-toggle="validator" action="{{route('Ventas.store')}}" method="POST">
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label class="control-label" for="codigo">Codigo Venta:</label>
                <input type="text" name="codigo" class="form-control" disabled/>
            </div>
            <div class="col-md-4">
                <label class="control-label" for="fecha">Fecha: *</label>
                <input type="date" name="fecha" class="form-control" data-error="Please enter fecha." required />
            </div>
            <div class="col-md-4">
                <label class="control-label" for="total">Total: *</label>
                <input type="text" name="total" class="form-control" data-error="Please enter total." required />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="control-label" for="nombre">Nombre: *</label>
                <input type="text" name="nombre" class="form-control" data-error="Please enter nombre." required />
            </div>
            <div class="col-md-6">
                <label class="control-label" for="nit">Nit: *</label>
                <input type="text" name="nit" class="form-control" data-error="Please enter nit." required />
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="clearfix  mx-auto">
            <a href="#" class="btn btn-primary text-center" style="color: white;background-color: #f96332" id="btnPrimero"><span class="fas fa-angle-double-left"  style="font-size: 1.33em;"></span> </a>
                <a href="#" class="btn btn-primary" style="color: white;background-color: #f96332" id="btnatras"><span class="fas fa-arrow-left"  style="font-size: 1.33em;"></span> </a>
                <a href="#" class="btn btn-primary" style="color: white;background-color: #f96332" id="btnsiguiente"><span class="fas fa-arrow-right"  style="font-size: 1.33em;"></span> </a>
                <a href="#" class="btn btn-primary" style="color: white;background-color: #f96332" id="btnultimo"><span class="fas fa-angle-double-right" style="font-size: 1.33em;"></span> </a>
        </div>
    </div>

<hr>

</form>
</div>
@endsection
@section('contenido')

 <div class="card">

       <div class="col-lg-12">

               @include('Venta.Modal.Formulario')

            <div class="card-header d-flex">
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-item"   data-target="#create-item" href="#create-item">AGREGAR</button>
                </div>
            </div>
            <div class="card-body">
                <table class="display responsive nowrap" cellspacing="0" width="100%" id="posts">
                    <thead>
                        <tr>

                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
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
<script>var url ="<?php echo route('Ventas.index') ?>"; </script>


@endsection
@section('scripts')
    <script src="inicio/Ventas/ventas.js"></script>
@endsection
