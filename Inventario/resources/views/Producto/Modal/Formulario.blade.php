<div   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left"  id="create-item" >
    <div role="document" class="modal-dialog"style="margin-top: 100px;">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Crear Producto</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <!--<p>Lorem ipsum dolor sit amet consectetur.</p>-->
    <form data-toggle="validator" action="{{route('Producto.store')}}" method="POST"   >
    
 <div class="row">
<div class="col-md-6"> 
       <div class="card ">
    <div class="card-body ">
  
                                <label>Nombre :*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
      <label>Codigo :</label>
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                         
                                <label>Categoria :*</label>
                                <div class="form-group">
                                   <select class="form-control" id="categoria">
                       
                        </select>
                                </div>
                                 <label>Precio Venta :*</label>
                                <div class="form-group">
                                    <input type="Number" class="form-control">
                                </div>
                         
    </div>
</div>
     </div>
<div class="col-md-6"> 
       <div class="card ">
    <div class="card-body ">
    

                                     <label>Precio Costo :*</label>
                                <div class="form-group">
                                    <input type="Number" class="form-control">
                                </div>
                                <label>Tipo Producto :*</label>
                                <div class="form-group">
                                      <select class="form-control" id="tipoproducto">
                        <option value="-1" disabled>Selecione</option>
                        <option value="Directa">Venta Directa</option>
                        <option value="Insumo">Insumo</option>
                       <option value="Composicion">De Composicion</option>
                    
                        </select>
                                </div>

                                <label>Venta Directa :*</label>
                                <div class="form-group">
                                           <select class="form-control" id="ventadirecta">
                        <option value="-1" disabled>Selecione</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                
                    
                        </select>
                                </div>
                         
    </div>
</div>

     </div>
  </div>
 
     
 <div class="row">
     <div class="col-md-12"> 
                 <div class="card ">
    <div class="card-body ">
  
                                <label>Stock minimo :</label>
                                <div class="form-group">
                                    <input type="Number" class="form-control">
                                </div>
 
                         
    </div>
</div>
 </div>
</div>
 

        
          </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
 <button type="submit" class="btn crud-submit btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>