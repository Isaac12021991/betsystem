
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Wallet</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                                    <a href="<?php echo site_url("wallet/balance");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Ver balance</a>



        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                    
                                <a href="<?php echo site_url("wallet/abonar");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Abonar</a>
                                <a href="<?php echo site_url("wallet/retirar");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Retirar</a>
                                
    
                                    <!--end::Actions-->
                                    <!--begin::Dropdown-->
                                            <!--end::Dropdown-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                        </div>
                        <!--end::Subheader-->
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <div class="row">

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-10">


                                    <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Balance
                                    <small></small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body">

                                          <?php $ca_saldo = 0; if (isset($info_balance)) : ?>
             <?php if ($info_balance->num_rows() > 0) : ?>
   
            <table class="table table-sm">
               <thead class="thead-dark">
                  <tr>
                     <th>Fecha</th>
                     <th class="text-center align-middle"> <span class="d-none d-xl-block">Concepto</span></th>
                     <th class="text-center align-middle"> <span class="d-none d-xl-block">Credito</span></th>
                     <th class="text-center align-middle"> <span class="d-none d-xl-block">Debito</span></th>
                     <th class="text-center align-middle">Saldo</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($info_balance->result() as $row) : ?>
                  <tr>
                     <td>   <?php echo $row->ff_sistema; ?> </td>
                     <td class="text-center align-middle"> <span class="d-none d-xl-block"> <?php echo $row->tx_concepto; ?> </span></td>
                     <td class="text-center align-middle">  <span class="d-none d-xl-block"></span> <?php if($row->nb_operacion == 'CREDITO'): ?> <?php echo number_format($row->ca_monto,2,',','.'); $ca_saldo += $row->ca_monto;  ?>  <?php endif; ?></td>
                     <td class="text-center align-middle">  <span class="d-none d-xl-block"> <?php if($row->nb_operacion == 'DEBITO'): ?> <?php echo number_format($row->ca_monto,2,',','.');  $ca_saldo -= $row->ca_monto; endif; ?></span> </td>
                     <td>

                         <?php echo number_format($ca_saldo,2,',','.');  ?> 

                     </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
               <tfoot>
                                 <tr>
                     <td>  </td>
                     <td class="text-center align-middle"></td>
                     <td class="text-center align-middle"> </td>
                     <td class="text-center align-middle"> <b>Disponible:</b> </td>
                     <td>

                         <?php echo number_format($ca_saldo,2,',','.');  ?> 

                     </td>
                  </tr>    

               </tfoot>
            </table>
      
            <?php else: ?>
            <h4>Sin registros</h4>
            <p>No tienes balance</p>
            <?php endif; ?>
             <?php endif; ?>


                                    </div>
                                    </div>

                                          



    

                            </div>



                                <div class="col-lg-1"></div>

                            </div>

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>


    <div class="modal fade"  id="ajax_remote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">

        </div>
    </div>
</div>


<script type="text/javascript">


      <?php if($this->usuario_library->permiso_empresa("'USUARIO'")): ?> 

document.body.style.backgroundColor = "#002505";

<?php endif; ?>


   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
   

         function eliminar_pago(co_pago)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar',
   content: '¿Estas seguro que deseas eliminar pago ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_pago':co_pago},
   url: "<?php echo site_url('wallet/eliminar_pago') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              toastr.info("Exito", obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }




         function aprobar_pago(co_pago)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Aprobar',
   content: '¿Estas seguro que deseas aprobar esta solicitud ?.',
   type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_pago':co_pago},
   url: "<?php echo site_url('wallet/aprobar_pago') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              toastr.info("Exito", obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }


         function rechazar_pago(co_pago)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Rechazar',
   content: '¿Estas seguro que deseas rechazar esta solicitud?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_pago':co_pago},
   url: "<?php echo site_url('wallet/rechazar_pago') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              toastr.info("Exito", obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }

   
</script>
