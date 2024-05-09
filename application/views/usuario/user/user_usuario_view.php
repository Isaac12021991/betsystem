
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

                                    
                                <a href="<?php echo site_url("usuario/agregar_usuario");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>
                                
    
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
                                    Usuarios
                                    <small>Listado de usuarios</small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body pl-2 pr-2 pt-0">

 <?php if ($user_usuario->num_rows() > 0) : ?>
              <table class="table table-hover dt-responsive nowrap table-sm table-striped" id="myTable">
               <thead>
                  <tr>
                           <th width="20%" class="all">Nombre y Apellido</th>
                           <th width="10%">Cedula</th>
                           <th width="10%" class="all">Email</th>
                           <th width="10%">Estatus</th>
                           <th width="10%" class="all">Saldo</th>
                           <th width="10%"></th>
                        </tr>
                     </thead>
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;  ?>
                  <?php foreach ($user_usuario->result() as $row) : $con ++; ?>
                <tr <?php if ($row->active == '0'): ?>
                           class="alert-danger"
                           <?php endif; ?>>
                           <td><?php echo $row->first_name.' '.$row->last_name; ?> </td>
                           <td><?php echo $row->nu_cedula; ?> </td>
                           <td><?php echo $row->email; ?> </td>
                           <td><?php if ($row->active == '1') { ?>
                              Activado
                              <?php }else{ ?>
                              Desactivado
                              <?php } ?> 
                           </td>
                           <td><?php echo $row->ca_saldo; ?> </td>
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
                                                                    <a href='<?php echo site_url("usuario/editar_usuario/$row->id")?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>

                                                             <li class="navi-item">
                                                                    <a href='<?php echo site_url("wallet/movimiento_wallet/$row->id")?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Ver movimiento dinero</span>
                                                                    </a>
                                                                </li>


                                                             <li class="navi-item">
                                                                    <a href='<?php echo site_url("usuario/ver_historial/$row->id")?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Ver historial</span>
                                                                    </a>
                                                                </li>

                                                                <?php if ($row->active == '1'): ?> 

                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="quitar_usuario(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Descativar</span>
                                                                    </a>
                                                                </li>

                                                                <?php endif; ?>


                                                                <?php if ($row->active == '0'): ?> 

                                                             <li class="navi-item">
                                                                    <a href="javascript::" onclick="activar_usuario(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Activar</span>
                                                                    </a>
                                                                </li>

                                                                <?php endif; ?>


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
            <h4>Sin usuarios</h4>
            <p></p>
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
