
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Taquillas</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                    <?php if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")): ?> 
                                <a href="<?php echo site_url("taquilla/crear_taquilla");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>
                                    <?php endif; ?>
                                
    
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
                                    Taquillas
                                    <small></small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body">

 <?php if ($list_taquilla->num_rows() > 0) : ?>
            <table class="table table-sm" id="tabla_1" width="100%">
               <thead class="bg-light">
                  <tr>
                     <th class="all" width="20%">Taquilla</th>
                     <th class="all" width="20%">Usuario Responsable</th>
                      <th class="all" width="20%">Porcentaje</th>
                     <th class="all" width="10%">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;  ?>
                  <?php foreach ($list_taquilla->result() as $row) : $con ++; ?>
                  <tr>
                     <td><?php echo $row->nb_taquilla; ?> </td>
                     <td><?php echo $row->first_name; ?> <?php echo $row->last_name; ?> </td>
                     <td><?php echo $row->ca_porcentaje * 100; ?> % </td>
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
                                                                    <a href="<?php echo site_url("taquilla/ver_sala_taquilla/$row->id");?>"class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Ver salas</span>
                                                                    </a>
                                                                </li>

                                                                 <?php if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")): ?> 

                                                                        <li class="navi-item">
                                                                    <a href="<?php echo site_url("taquilla/editar_taquilla/$row->id");?>"class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>

                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_taquilla(<?php echo $row->id; ?>)" class="navi-link">
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
            <?php else: ?>
            <h4>Sin taquillas</h4>
            <p></p>
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


      }); // Fin ready


 function eliminar_taquilla(co_taquilla)
   {
   
   
                   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar',
   content: '¿Estas seguro que deseas elminar esta taquilla?',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                      $.ajax({
   method: "POST",
   data: {'co_taquilla':co_taquilla},
   url: "<?php echo site_url('taquilla/unlink_taquilla') ?>",
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