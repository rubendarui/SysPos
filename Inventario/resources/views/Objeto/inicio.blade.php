@extends('Template.PanelAdmin')

@section('titulo', 'Objetos')

@section('detalle')
    @parent

    <p>Creacion de los Formularios y reportes URL</p>
@endsection

@section('contenido')
   <section class="tables">
    <div class="col-lg-12">
         
        <div class="card">
            <div class="card-header d-flex">
                    @include('Objeto.Modal.FormularioModal')
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-item"   data-target="#create-item" href="#create-item">NUEVO OBJETO</button>
                </div>
            </div>
            <div class="card-body">
              <table class="display responsive nowrap" cellspacing="0" width="100%" id="posts">
                <thead>
			    <tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Url</th>
				<th>tipo</th>
				<th>Modulo</th>
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
</section>

<input type="hidden" value="{{ csrf_token() }}" id="csrf-token">

  
     <script type="text/javascript">
           var url = "<?php echo route('Objeto.index')?>";
        </script>
@endsection
@section('scripts')
  <script src="inicio/Objeto/objeto.js"></script> 
  <script type="text/javascript">
 $('select#Tipo').on('change',function(){
    var valor = $(this).val();
    if (valor=='Titulo') {
    $("#fontoculto").show();
    }else{
  $("#fontoculto").hide();
    }
});
 $('select#Tipo').on('change',function(){
    var valor = $(this).val();
    if (valor=='Formulario' || valor=='Reporte' ) {
    $("#divtitulo").show();
    }else{
  $("#divtitulo").hide();
    }
});
$('select#Tipoupdate').on('change',function(){
    var valor = $(this).val();
    if (valor=='Titulo') {
    $("#fontocultoupdate").show();
    }else{
  $("#fontocultoupdate").hide();
    }
});
 $('select#Tipoupdate').on('change',function(){
    var valor = $(this).val();
    if (valor=='Formulario' || valor=='Reporte' ) {
    $("#divtituloupdate").show();
    }else{
  $("#divtituloupdate").hide();
    }
});
</script>
@endsection