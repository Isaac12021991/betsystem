
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Clubes</h5>
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted"></a>
                                            </li>
                                        </ul>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">


                                <a href="<?php echo site_url("partner/crear_partner");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>
                                 <a href="javascript:window.history.back();" class="btn btn-clean font-weight-bolder btn-sm mr-2">Descartar</a>
                                    
        
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
                                    <div class="card-body">
                                        <!--begin::Details-->


                          <?php if (isset($partner)) : ?>
                <?php if ($partner->num_rows() > 0) : ?>
                  <table class="table table-compact" width="100%">
                     <thead>
                        <tr>
                          <th width="20%">Empresa</th>
                           <th  width="10%">Identificacion</th>
                           <th width="10%">Estado</th>
                           <th  width="20%">Direccion</th>
                           <th width="5%">Accion</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php foreach ($partner->result() as $row) : ?>
                        <tr <?php if($this->ion_auth->co_partner() == $row->id):?> class="success"  <?php endif; ?>>
                            <td><?php echo $row->nb_empresa; ?>
                             <span  class="hidden-md hidden-lg"> <br><?php echo $row->nu_rif; ?> </span> </td>
                           <td><?php echo $row->nu_rif; ?> </td>
                           <td><?php echo $row->nb_estado; ?> <br> <?php echo $row->nb_municipio; ?> <br> <?php echo $row->nb_parroquia; ?> </td>
                           <td><?php echo $row->tx_direccion; ?> </td>
                           <td>    

                       <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-hor"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover py-0">

                                    <li class="navi-item">
                                        <a href="javascript::" onclick="eliminar_partner(<?php echo $row->id; ?>)" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-bell-2"></i>
                                            </span>
                                            <span class="navi-text">Eliminar</span>
                                        </a>
                                    </li>


                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div>                     


                    </td>
                        </tr>
                        <?php endforeach; ?>
                        
                     </tbody>
                  </table>
                  <?php endif; ?>
                  <?php else: ?>
                    <h4>Sin resultados</h4>
                  <?php endif; ?>
                                        <!--begin::Items-->
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
            <h3 align="center" class="text-dark">Cargando...</h3>
        </div>
    </div>
</div>



<script type="text/javascript">

   $(document).ready(function(){


      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');
   })
   

   }); // Fin ready
   




   function eliminar_partner(co_partner)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar partner',
   content: '¿Estas seguro que deseas eliminarlo',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_partner':co_partner},
   url: "<?php echo site_url('partner/eliminar_partner') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
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

