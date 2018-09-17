<!--=====================================
MODAL EDITAR Stock
======================================-->


<div id="modalEditarStock" class="modal fade" role="dialog">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        
        <div class="modal-header" style="background:#FF3255; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Editar stock</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">
             

           <!--=====================================
            ENTRADA DEL TITULO DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              <div class="col-md-6 col-xs-12">
             
                <div class="panel">DÍA</div>
                
                <div class="input-group">
                <input name="id_dia" type="hidden" class="id_dia"> 
                <span class="input-group-addon"></span>

                <input type="text" class="form-control input-lg dia" placeholder="dia" name="dia" disabled> 

             </div>

          
            </div>
            </div>
            <!--=====================================
            AGREGAR stock
            ======================================-->
            <div class="form-group">
               
              <div class="col-md-6 col-xs-12">
  
                <div class="panel">STOCK</div>
                
                <div class="input-group">
                
                  <span class="input-group-addon"></span> 

                  <input type="number" class="form-control input-lg stock" min="0" step="any" name="stock" required>

                </div>

              </div>
            </div>
        
          </div>
        </div>

       <!--=====================================
        PIE DEL MODAL
        ======================================-->
             
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

           <?php

        
          $editarStock = new ControladorStock();
          $editarStock -> ctrEditarStock();

           ?>
           </div>
      </div>
</div>