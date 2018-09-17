<!--=====================================
MODAL EDITAR Stock
======================================-->

<div id="modalEditarVenta" class="modal fade" role="dialog">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        
        <div class="modal-header" style="background:#FF3255; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Editar Venta</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">
             

           <!--=====================================
            ENTRADA DEL TITULO DEL VENTA
            ======================================-->

            <div class="form-group">
                <div class="panel">Fecha de Pedido</div>
                <div class="input-group">
                <input name="id_detalle_carrito" type="hidden" class="id_detalle_carrito"> 
                <span class="input-group-addon"></span>
                <input type="text" class="form-control input-lg fecha_pedido" placeholder="fecha_pedido" name="fecha_pedido" disabled> 

            </div>
            </div>
            <!--=====================================
            AGREGAR usuario
            ======================================-->
            <div class="form-group">
                <div class="panel">Cliente</div>
                <div class="input-group">
                  <span class="input-group-addon"></span> 
                 <input type="text" class="form-control input-lg nombre" placeholder="nombre" name="nombre" disabled> 
              </div>
            </div>


              <!--=====================================
            AGREGAR producto
            ======================================-->
            <div class="form-group">
  
                <div class="panel">Producto</div>
                
                <div class="input-group">
                
                  <span class="input-group-addon"></span> 

                 <input type="text" class="form-control input-lg nombre_producto" placeholder="nombre_producto" name="nombre_producto" disabled> 

              </div>
            </div>

              <!--=====================================
            AGREGAR cantidad
            ======================================-->
            <div class="form-group">
                <div class="panel">Cantidad</div>
                <div class="input-group">
                  <span class="input-group-addon"></span> 
                  <input type="text" class="form-control input-lg cantidad" placeholder="cantidad" name="cantidad" disabled> 
                </div>
            </div>

              <!--=====================================
            AGREGAR subtotal
            ======================================-->
            <div class="form-group">
                <div class="panel">Subtotal</div>
                
                <div class="input-group">
                
                  <span class="input-group-addon"></span> 

                 <input type="text" class="form-control input-lg subtotal" placeholder="subtotal" name="subtotal" disabled> 

              </div>
            </div>

              <!--=====================================
            AGREGAR fecha
            ======================================-->
            <div class="form-group">
  
                <div class="panel">Fecha Entrega</div>
                
                <div class="input-group">
                
                  <span class="input-group-addon"></span> 

                 <input type="text" class="form-control input-lg fecha_reserva" placeholder="fecha_reserva" name="fecha_reserva" disabled> 

              </div>
            </div>

                  <!--=====================================
            EDITAR ESTADO DE venta
            ======================================-->


            <div class="form-group">

              <div class="panel">ESTADO</div>
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    <select class="form-control estado_reserva" name="estado_reserva">
                    <?php if (estado_reserva=='pendiente') { ?>
                          <option value="pendiente" >Pendiente</option>
                          <option value="parcial"xselected >Parcial</option>
                          <option value="entregado" xselected >Entregado</option>
                <?php    } else {     ?>     
                             <?php if (estado_reserva=='parcial') { ?>
                                <option value="parcial" >Parcial</option>
                                <option value="entregado" xselected  >Entregado</option>
                                <option value="pendiente" xselected >Pendiente</option>

                        <?php    } else {     ?>
                                              <option value="parcial" >Parcial</option>
                                              <option value="entregado" >Entregado</option>
                                              <option value="pendiente" selected >Pendiente</option>
                                         <?php   }   }         ?>
                    </select>

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

        
          $editarVenta = new ControladorVentas();
          $editarVenta -> ctrEditarVenta();

           ?>
           </div>
      </div>
</div>