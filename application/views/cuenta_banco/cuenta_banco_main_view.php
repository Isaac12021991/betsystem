
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Cuentas bancarias</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                    
                                <a href="<?php echo site_url("cuenta_banco/crear_cuenta_banco");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>
                                
    
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
                                    Cuentas de la empresa
                                    <small></small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body">

                                        <?php if ($list_cuenta_banco->num_rows() > 0) : ?>
            <table class="table table-sm" id="tabla_1" width="100%">
               <thead>
                  <tr>
                    <th width="15%">Nombre del diario</th>
                     <th width="15%">N° Cuenta</th>
                     <th width="30%">Banco</th>
                     <th width="15%">Titular</th>
                     <th width="15%">Moneda</th>
                     <th width="10%">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($list_cuenta_banco->result() as $row) : ?>
                  <tr>
                     <td> <?php echo $row->nb_diario; ?>  </td>
                     <td><?php echo $row->nu_cuenta; ?> </td>
                     <td><?php echo $row->nb_banco; ?> </td>
                     <td><?php echo $row->tx_nb_titular; ?> <br><?php echo $row->tx_id_titular; ?> </td>
                     <td><?php echo $row->nb_moneda; ?> </td>
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
                                                                    <a href='<?php echo site_url("cuenta_banco/editar_cuenta_banco/$row->id");?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
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
            <?php else: ?>
            <h4>Sin Cuentas Bancarias</h4>
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



   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
   

</script>
