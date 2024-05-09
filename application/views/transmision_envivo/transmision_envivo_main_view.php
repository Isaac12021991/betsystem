
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Transmision en vivo</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                            
                            <a href="<?php echo site_url("transmision_envivo/ver_transmision");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Ver transmision</a>

                                     <?php if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")): ?> 
                                <a href="<?php echo site_url("transmision_envivo/crear_transmision_envivo");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>

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
                                    Transmisiones
                                    <small></small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body">

 <?php if ($list_video->num_rows() > 0) : ?>
            <table class="table table-sm" id="tabla_1" width="100%">
               <thead>
                  <tr>
                     <th class="all" width="20%">Origen</th>
                     <th class="all" width="20%">Nombre</th>
                     <th width="30%">Descripcion</th>
                     <th class="all" width="20%">Sede</th>
                     <th class="all" width="10%"></th>
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;  ?>
                  <?php foreach ($list_video->result() as $row) : $con ++; ?>
                  <tr>
                     <td><?php echo $row->nb_origen; ?> </td>
                     <td><?php echo $row->nb_video; ?> </td>
                     <td><?php echo $row->tx_descripcion; ?> </td>
                     <td><?php echo $row->nb_sede; ?> </td>
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
                                                                    <a href="<?php echo site_url("transmision_envivo/editar_transmision_envivo/$row->id");?>"class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>

                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_transmision_envivo(<?php echo $row->id; ?>)" class="navi-link">
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
            <?php else: ?>
            <h4>Sin transmisiones en vivo</h4>
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


 function eliminar_transmision_envivo(co_transmision_envivo)
   {
   
   
                   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar',
   content: '¿Estas seguro que deseas elminar esta transmision en vivo?',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                      $.ajax({
   method: "POST",
   data: {'co_transmision_envivo':co_transmision_envivo},
   url: "<?php echo site_url('transmision_envivos/unlink_transmision_envivo') ?>",
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