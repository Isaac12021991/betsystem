
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Perfil</h5>
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted"></a>
                                            </li>
                                        </ul>


        
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

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-10">


                                    <div class="card card-custom gutter-b">
                                    <div class="card-body">
                                        <!--begin::Details-->
                                        <div class="d-flex mb-9">
                                            <!--begin: Pic-->
                                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                                <div class="symbol symbol-50 symbol-lg-120">
                                                    <img src="<?php echo $info_usuario->nb_foto_perfil; ?>" alt="Cambiar foto de perfil" onclick="abrir_foto_perfil_modal()">
                                                </div>
                                                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                                    <span class="font-size-h3 symbol-label font-weight-boldest"></span>
                                                </div>


                                            </div>
                                            <!--end::Pic-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <!--begin::Title-->
                                                <div class="d-flex justify-content-between flex-wrap mt-1">
                                                    <div class="d-flex mr-3">
                                                        <a href="javascript:" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3"><?php echo $info_usuario->first_name; ?> <?php echo $info_usuario->last_name; ?> </a>
                                                        <a href="javascript:">
                                                            <i class="flaticon2-correct text-success font-size-h5"></i>
                                                        </a>
                                                    </div>
                                                    <div class="my-lg-0 my-3">

                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Content-->
                                                <div class="d-flex flex-wrap justify-content-between mt-1">
                                                    <div class="d-flex flex-column flex-grow-1 pr-8">
                                                        <div class="d-flex flex-wrap mb-4">
                                                            <a href="javascript:" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                            <i class="flaticon2-new-email mr-2 font-size-lg"></i><?php echo $info_usuario->email; ?></a>
                                                            <a href="javascript:" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                            <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i><?php echo $info_usuario->username; ?></a>

                                                        </div>
                                                        <span class="font-weight-bold text-dark-50">Usuario registrado en la plataforma como seudonimo unico: <?php echo $info_usuario->username; ?>.</span>
                                                        <span class="font-weight-bold text-dark-50"></span>
                                                    </div>
                                                    <div class="d-flex align-items-center w-25 flex-fill float-right mt-lg-12 mt-8">
 
                                                    </div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--begin::Items-->

                                        <div class="row">
                                            
                                            <div class="col-lg-12">
                                                
                                                <ul class="nav nav-tabs nav-tabs-line">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Personal</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Seguridad</a>
    </li>
<?php if($this->usuario_library->permiso_empresa_obtener($this->ion_auth->co_partner(), "'Administrador'")): ?>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3">Empresas</a>
    </li>
<?php endif; ?>

        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4">Historial</a>
    </li>

</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">

                                                        <table class="table table-sm">
                                                <tbody>



                                                <tr>
                                                    <td>
                                                        Nombre y apellido:
                                                    </td>
                                                    <td>
                                                       <?php echo $info_usuario->first_name; ?> <?php echo $info_usuario->last_name; ?>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td>
                                                        Email:
                                                    </td>
                                                    <td>
                                                       <?php echo $info_usuario->email; ?>
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td>
                                                        Cedula/Pasaporte:
                                                    </td>
                                                    <td>
                                                       <?php echo $info_usuario->nu_cedula; ?>
                                                    </td>
                                                </tr>

                                                 <tr>
                                                    <td>
                                                        Celular:
                                                    </td>
                                                    <td>
                                                       <?php echo $info_usuario->phone; ?>
                                                    </td>
                                                </tr>
                                            </tbody></table>

                                              <a class='btn btn-sm btn-light-primary' href='javascript::' onclick="abrir_editar_cuenta_modal()"> Editar</a>

</div>

    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">

                                                        <table class="table table-sm">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        Contraseña
                                                    </td>

                                                    <td>
                                                   <a onclick="abrir_contrasena_modal()" href='javascript::' class="btn btn-sm btn-light-primary"> Cambiar</a>
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td>
                                                       Eliminar cuenta:
                                                    </td>
                                                  <td>
                                                       <a onclick="abrir_eliminar_cuenta_modal()" href='javascript::' class="btn btn-sm btn-light-primary"> Eliminar</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

    </div>
    <?php if($this->usuario_library->permiso_empresa_obtener($this->ion_auth->co_partner(), "'Administrador'")): ?>
        <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3">

             <?php if (isset($partner)) : ?>
                <?php if ($partner->num_rows() > 0) : ?>
                  <table class="table table-sm" width="100%">
                     <thead>
                        <tr>
                          <th width="20%">Empresa</th>
                           <th  width="10%"><span class="d-none d-xl-block">Identificacion</span></th>
                           <th width="10%"><span class="d-none d-xl-block">Estado</span></th>
                           <th  width="20%"><span class="d-none d-xl-block">Direccion</span></th>
                           <th width="5%">Accion</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php foreach ($partner->result() as $row) : ?>
                        <tr <?php if($this->ion_auth->co_partner() == $row->id):?> class="text-success"  <?php endif; ?>>
                            <td>         
                            <?php echo $row->nb_tipo_empresa; ?><br><?php echo $row->nb_empresa; ?> <br>Sicm: <?php echo $row->cod_sicm; ?>
                             <span  class="hidden-md hidden-lg"> <br><?php echo $row->nu_rif; ?> </span> </td>
                           <td><span class="d-none d-xl-block"><?php echo $row->nu_rif; ?></span> </td>
                           <td><span class="d-none d-xl-block"><?php echo $row->nb_estado; ?> <br> <?php echo $row->nb_municipio; ?> <br> <?php echo $row->nb_parroquia; ?> </span></td>
                           <td> <span class="d-none d-xl-block"><?php echo $row->tx_direccion; ?> </span></td>
                           <td>                         


                                          <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-0">

                                                                <?php if($this->ion_auth->co_partner() != $row->id):?>
                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="cambiar_partner(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Cambiar</span>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                                 <?php if($this->usuario_library->permiso_empresa_obtener($row->id, "'Administrador'")): ?>
                                                                <li class="navi-item">
                                                                    <a href='<?php echo site_url("partner/editar_partner/$row->id");?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-list-3"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>


                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="eliminar_partner(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Eliminar</span>
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
                  <?php endif; ?>
                  <?php else: ?>
                    <h4>Sin resultados</h4>
                  <?php endif; ?>
        
    </div>

<?php endif; ?>


     <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel" aria-labelledby="kt_tab_pane_4">

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
                 <h4>Sin resultados</h4>
                  <?php endif; ?>
                  <?php else: ?>
                    <h4>Sin resultados</h4>
                  <?php endif; ?>


        
    </div>
</div>

                                            </div>

                                        </div>
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

    
      <?php if($this->usuario_library->permiso_empresa("'USUARIO'")): ?> 

document.body.style.backgroundColor = "#002505";

<?php endif; ?>


   $(document).ready(function(){


      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');
   })
   

   }); // Fin ready
   
   
                   function abrir_editar_cuenta_modal() {

                         $('#ajax_remote').modal('show');
                            $.get("<?php echo site_url('cuenta/editar_cuenta') ?>",
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


                   function abrir_contrasena_modal() {

                            $('#ajax_remote').modal('show');
                            $.get("<?php echo site_url('cuenta/cambiar_password') ?>",
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }

                        function abrir_eliminar_cuenta_modal() {

                            $('#ajax_remote').modal('show');
                            $.get("<?php echo site_url('cuenta/eliminar_cuenta') ?>",
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }

                    function abrir_foto_perfil_modal() {

                            $('#ajax_remote').modal('show');
                            $.get("<?php echo site_url('cuenta/cambiar_foto_perfil') ?>",
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }

                            



   function eliminar_partner(co_partner)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar partner',
   content: '¿Estas seguro que deseas eliminar',
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

      function cambiar_partner(co_partner)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Cambiar de empresa',
   content: '¿Estas seguro que deseas cambiar de empresa?',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
          $.ajax({
   method: "POST",
   data: {'co_partner':co_partner},
   url: "<?php echo site_url('partner/cambiar_partner') ?>",
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

