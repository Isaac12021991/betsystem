
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Usuarios</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                
    
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


                                <div class="col-lg-12">


                                    <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Historial
                                    <small>Historial del usuario</small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body pl-2 pr-2 pt-0">

                                                     <?php if (isset($historial)) : $con = 0; ?>
                <?php if ($historial->num_rows() > 0) : ?>
                    <div class="table-responsive">
                  <table class="table table-sm" width="100%">
                     <thead>
                        <tr>
                          <th width="5%">#</th>
                            <th  width="10%">GA/RE</th>
                           <th class="text-center align-middle" width="10%">Carr</th>
                           <th  width="10%">Hip</th>
                           <th class="text-center align-middle" width="10%">Apuesta</th>
                           <th class="text-center align-middle" width="10%">Ganado</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php foreach ($historial->result() as $row) : $con ++; ?>
                        <tr>
                            <td>         
                            <?php echo $con; ?> </td>
                            <td><?php echo substr($row->nb_modo_juego, 0, 3); ?> </td>
                           <td class="text-center align-middle"><?php echo $row->nu_carrera; ?> </td>
                            <td><?php echo $row->nb_sede; ?> </td>
                           <td class="text-center align-middle"><?php echo $row->aposto; ?> $</td>
                           <td class="text-center align-middle"> <?php if($row->ganado == ''): echo '0'; else: echo $row->ganado; endif; ?> $</td>
                        </tr>
                        <?php endforeach; ?>
                        
                     </tbody>
                  </table>
                  </div>
              <?php else: ?>
                 <h4 class="p-6">Sin resultados</h4>
                  <?php endif; ?>
                  <?php else: ?>
                    <h4 class="p-6">Sin resultados</h4>
                  <?php endif; ?>




                                    </div>
                                    </div>

                                          



    

                            </div>




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

 $(document).ready(function(){

     $('#myTable').dataTable({searching: false, paging: false, info: false});

      }); // Fin ready
   
   
   
   
   function activar_usuario(co_usuario)
   
   {
   if (confirm("Estas seguro de activar este usuario al sistema ?"))
   
   {    
   
   $.ajax(
   {
   type: "POST",
   url: "<?php echo site_url('usuario/active_user') ?>",
   data: { 'co_usuario' : co_usuario
   },
   cache: false,
   
   success: function(data)
   {
   
   //
location.reload();
   
   }
   });
   }
   
   }
   
   
   function quitar_usuario(co_usuario)
   
   {
   if (confirm("Estas seguro de desactivar este usuario del sistema ?"))
   
   {    
   
   $.ajax(
   {
   type: "POST",
   url: "<?php echo site_url('usuario/desactive_user') ?>",
   data: { 'co_usuario' : co_usuario
   },
   cache: false,
   
   success: function(data)
   {


location.reload();
   }
   });
   }
   
   }
   
   
</script>
