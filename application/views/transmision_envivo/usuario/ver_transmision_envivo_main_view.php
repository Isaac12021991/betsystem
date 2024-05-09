
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

                                <form id="filtro_form" method="GET" action="<?= site_url('/transmision_envivo/ver_transmision') ?>" class="mr-2 ml-2">
                                    <div class="row">

                                    <div class="col-12">
                                <select class="form-control form-control-solid form-control-sm mr-0" id="nb_sede" name="nb_sede" onChange="filtro_carrera()">
                                    <option value="">Hipodromos:</option>
                                   <?php foreach($sede->result() as $row){
                                    echo "<option value='".$row->nb_sede."'>".$row->nb_sede."</option>";
                                    } ?>
                                    </select>
                                    </div>

                                    </div>

                                    </form>
                           

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


 <?php if ($list_video->num_rows() > 0) : ?>
      
                  <?php $con = 0;  ?>
                  <?php foreach ($list_video->result() as $row) : $con ++; ?>


                                <div class="col-lg-4 mt-2">

                                    <div class="card card-custom">
 <div class="card-header">
  <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-chat-1 text-primary"></i>
            </span>
   <h3 class="card-label">
    <?php echo $row->nb_video; ?>
    <small><?php echo $row->nb_origen; ?></small>
   </h3>
  </div>
        <div class="card-toolbar">
             <?php if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")): ?> 

                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                                        <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover">
                                                                <li class="navi-header font-weight-bold py-4">
                                                                    <span class="font-size-lg">Opciones:</span>
                                                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                                                </li>
                                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                                <li class="navi-item">
                                                                    <a href="<?php echo site_url("transmision_envivo/editar_transmision_envivo/$row->id");?>" class="navi-link">
                                                                        <span class="navi-text">
                                                                            Editar
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="eliminar_transmision_envivo(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-text">
                                                                            Eliminar
                                                                        </span>
                                                                    </a>
                                                                </li>
                
                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>
                                             


        <?php endif; ?>
        </div>
 </div>
 <div class="card-body p-0">

    <?php if($row->nb_origen == 'YOUTUBE'): ?>
    <iframe width="<?php echo $row->nb_width; ?>%" <?php if ($this->agent->is_mobile()) { ?> height="100%" <?php }else{ ?> height="100%"<?php } ?>
    src="<?php echo $row->tx_src; ?>" 
    title="<?php echo $row->nb_video; ?>" 
    frameborder="0" 
    allow="accelerometer;
    autoplay; 
    clipboard-write; 
    encrypted-media; 
    gyroscope; picture-in-picture" 
    allowfullscreen>
    </iframe>

<?php endif; ?>

 </div>
    <div class="card-footer d-flex justify-content-between">
        <?php if($row->co_sala != '0'): ?>
        <a href="<?php echo site_url("carrera_caballo/ver_sala_modo_usuario/$row->co_sala");?>" class="btn btn-light-primary font-weight-bold mt-0">Ver sala</a>
    <?php endif; ?>

    <span class="ml-6"> <?php echo $row->tx_descripcion; ?></span>
        
 </div>
</div>

</div>

 <?php endforeach; ?>   

<?php else: ?>

    <h4 class="text-center text-dark">No hay transmision disponible</h4>





<?php endif; ?>




                                          



    

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

    document.body.style.backgroundColor = "#002505";

    $('#nb_sede').val('<?php echo $nb_sede; ?>');

    function filtro_carrera() {

$('#filtro_form').submit();
    // body...
}


//alert("La resolución de tu pantalla es: " + screen.width + " x " + screen.height) 

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