<div class="content-wrapper">
    
  <section class="content-header">

    <h2 class="text-center">Mis Ventas</h2>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Mis Ventas</li>
      
    </ol>

  </section>

<!--========================Ventas pendientes=====================-->
  <section class="content">
 
    <div class="box">  
                <h2 class="text-center">Ventas Pendientes</h2>
        
             <table class="table table-striped table-bordered dt-responsive tablaVentas" width="100%">

                  <thead>
                    <tr>
                      <th style="width:10px">#</th>
                      <th>Fecha de Reserva</th>
                      <th>Cliente</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Subtotal</th>
                      <th>Fecha de Entrega</th>
                      <th>Estado</th>
                      <th>Acción</th>
                    </tr>

                  </thead>
          
          </table>
         </div>
     </section>
  
   <section class="content">
 
    <div class="box">  
                <h2 class="text-center">Ventas Parciales</h2>
                 <h2 class="text-center">50% abonadas</h2>
      
             <table class="table table-striped table-bordered dt-responsive tablaVentasParcial" width="100%">

                  <thead>
                     <tr>
                      <th style="width:10px">#</th>
                      <th>Fecha de Reserva</th>
                      <th>Cliente</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Subtotal</th>
                      <th>Fecha de Entrega</th>
                      <th>Estado</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
          
          </table>
         </div>
     </section>

   <section class="content">
 
    <div class="box">  
                <h2 class="text-center">Ventas Entregadas</h2>
        
             <table class="table table-striped table-bordered dt-responsive tablaVentasEntregado" width="100%">

                  <thead>
                    <tr>
                      <th style="width:10px">#</th>
                      <th>Fecha de Reserva</th>
                      <th>Cliente</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Subtotal</th>
                      <th>Fecha de Entrega</th>
                      <th>Estado</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
          
          </table>
         </div>
     </section>
  </div>
  <?php
//require "ventasModales/crearVenta.modal.php";
require "ventasModales/editarVenta.modal.php";
?> 