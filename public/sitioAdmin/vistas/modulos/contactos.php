<div class="content-wrapper">
    
  <section class="content-header">

    <h2 class="text-center">PASTELERIA DOÑA LUPE</h2>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Pagina Principal</li>
      
    </ol>

  </section>

  <section class="content">
    <!--========================Contacto=====================-->
    <div class="box">    
            
      <div class="box-body">
      <h3>Contacto de la Pasteleria</h3> 
       <?php
        
        $info = ControladorContacto::ctrMostrarContacto();
 
        echo '<div class="">Dirección:&nbsp;&nbsp;&nbsp'.$info["direccion"].'</div>';  

        echo '<div class="">Teléfono:&nbsp;&nbsp;&nbsp'.$info["telefono"].'</div>';  

        echo '<div class="">Provincia:&nbsp;&nbsp;&nbsp'.$info["provincia"].'</div>'; 

        echo '<div class="">Localidad:&nbsp;&nbsp;&nbsp'.$info["localidad"].'</div>';   
      ?>

       <div class="box-header with-border text-right"> 
          <button class="btn btn-primary btnEditarContacto" idContacto="<?php echo $info['id'];?>"  data-toggle="modal" data-target="#modalEditarContacto"> Cambiar información</button>

      </div>
      </div>     
    </div>
    <!--========================Contacto=====================-->

      <div class="box">
      <h3>Redes Sociales de la Pasteleria</h3> 

      <table class="table table-striped table-bordered dt-responsive" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Red Social</th>
              <th>Enlace</th>
              <th>Estado</th>
              <th>Editar</th>

            </tr>

          </thead>
          <tbody>
            <?php
              
              $redes = ControladorRedesSociales::ctrMostrarRedesSociales();

              foreach ($redes as $red) {

                echo '<tr><th>';
                echo $red['id'].'</th><th>';
                echo $red['nombre'].'</th><th>';
                echo '<a target="_blank" href="'.$red['cuenta'].'">'.$red['cuenta'].'</a></th><th>';
                echo ucfirst($red['estado']).'</th><th>';
                echo ' <div class="box-header with-border text-right">
                  <button class="btn btn-primary btnEditarRedSocial" idRedSocial="'.$red['id'].'" data-toggle="modal" data-target="#modalEditarRedSocial'.$red['id'].'"> Cambiar información</button>
                   </div>';

                require "contactosModales/redSocial.modal.php";

                echo '</th></tr>';
              }
              ?>
         </tbody>
      </table>
    </div>
</section>

  </div>
<?php
require "contactosModales/contacto.modal.php";
?>  