<div class="content-wrapper">
    
  <section class="content-header">

    <h2 class="text-center">PASTELERIA DOÑA LUPE</h2>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Pagina Principal</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">    
            
      <div class="box-body">
           
       <?php
        
   
        $info = ControladorPaginaPrincipal::ctrMostrarInfo();

        echo '<h4 class="text-center">'.$info["descripcion"].'</h4>';
 
        echo '
              <div class="text-center">
                <img class="img-thumbnail" src="'.$info["img"].'" width="400">
              </div>

              <h5 class="text-center">Fecha última modificación '.date('d/m/Y', strtotime($info["fecha"])).'</h5>';

        

      ?>

       <div class="box-header with-border text-right">
         
          <button class="btn btn-primary btnEditarDescripcion" idDescripcion="<?php echo $info['id'];?>" foto="<?php echo $info['img'];?>" data-toggle="modal" data-target="#modalEditarDescripcion">

            Cambiar información

          </button>

      </div>
      </div>
    </div>
  </section>

  </div>
<!--=====================================
MODAL CAMBIAR INFORMACION
======================================-->

<div id="modalEditarDescripcion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Cambiar información</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">
             

            <!--=====================================
                ENTRADA PARA LA DESCRIPCIÓN DEL NEGOCIO
                ======================================-->

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                    <textarea  class="form-control input-lg descripcionPasteleria" name="descripcionPasteleria"  rows="15" required><?php echo $info['descripcion'];?></textarea>

                  </div> 

                </div>

                <!--=====================================
                  ENTRADA PARA SUBIR FOTO DE PAGINA INICIO
                  ======================================-->

                  <div class="form-group">
                    
                    <div class="panel">SUBIR FOTO PAGINA INICIO</div>

                     <input type="file" class="foto" name="foto">
                      <input type="hidden" value="<?php echo $info['img'];?>" name="antiguaFoto">

                     <p class="help-block">Tamaño recomendado 640px * 430px</p>

                      <img src="<?php echo $info['img'];?>" class="img-thumbnail previsualizarFoto" width="300px">

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

                
                  $editarPaginaPrincipal = new ControladorPaginaPrincipal();
                  $editarPaginaPrincipal -> ctrEditarDescripcion();

              ?>

          </div>
      </div>
</div>




  