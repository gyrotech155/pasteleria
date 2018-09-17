<!--=====================================
MODAL CAMBIAR CONTACTO
======================================-->

<div id="modalEditarContacto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Cambiar información de Contacto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">
             

            <!--=====================================
                ENTRADA EDITAR EDIRECCION
                ======================================-->

                <div class="form-group">
                  
                  <h2>Dirección: </h2>

                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                    <input class="form-control input-lg descripcionPasteleria" name="direccion" type="text" required value="<?php echo $info['direccion']; ?>"  >

                  </div> 

                </div>

                <!--=====================================
                ENTRADA EDITAR TELEFONO
                ======================================-->

                <div class="form-group">

                  <h2>Teléfono:</h2>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                    <input class="form-control input-lg descripcionPasteleria" name="telefono" type="text" required value="<?php echo $info['telefono']; ?>"  >

                  </div> 

                </div>

                <!--=====================================
                ENTRADA EDITAR LOCALIDAD
                ======================================-->

                <div class="form-group">

                  <h2>Provincia:</h2>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                    <input class="form-control input-lg descripcionPasteleria" name="provincia" type="text" required value="<?php echo $info['provincia']; ?>"  >

                  </div> 

                </div>

                <!--=====================================
                ENTRADA EDITAR PROVINCIA
                ======================================-->

                <div class="form-group">

                  <h2>Localidad: </h2>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                    <input class="form-control input-lg descripcionPasteleria" name="localidad" type="text" required value="<?php echo $info['localidad']; ?>"  >

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

                
                  $editarContacto = new ControladorContacto();
                  $editarContacto -> ctrEditarContacto();

              ?>

          </div>
      </div>
</div>