
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Apuestas y resultados</h5>
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

                                     <div class="col-lg-1">

                                     </div>


                                <div class="col-lg-10">

                                    <div class="row">
                                        

                                        <div class="col-lg-12">
                                           

                                                    <div class="card card-custom gutter-b">
                                                     <div class="card-header">
                                                      <div class="card-title">
                                                       <h3 class="card-label">
                                                        Hipodromo <?php echo $nb_sede; ?>
                                                        <small></small>
                                                       </h3>
                                                      </div>
                                                     </div>
                                                     <div class="card-body">


                                                        <?php if($carrera_hipodromo->num_rows() > 0): ?>
                                                        <?php foreach ($carrera_hipodromo->result() as $row): ?>

                                                        <button  onclick="ver_sala_usuario('<?php echo $row->id; ?>')" <?php if($row->nb_estatus == 'FINALIZADO' or $row->nb_estatus == 'CERRADO'): ?> style="background-color:#ED1E22; color:white;"  class="btn btn-lg btn-block" <?php else: ?> style="background-color:#068000; color:white;" class="btn btn-lg btn-block" <?php endif; ?>><b><?php echo $row->nb_modo_juego; ?> </b><br> <?php echo 'Carrera N° ' .$row->nu_carrera; ?><br><?php echo ' Distancia '.$row->nu_distancia.' mts'; ?></button>

                                                            <?php endforeach; ?>
                                                        <?php endif; ?>


                                            
                                                          <form action="<?= site_url('/carrera_caballo/carrera_hipodromo_resultado') ?>" class="mt-2" autocomplete="off" id="form_hipodromo" method="GET">

                                                         <button class="btn btn-primary btn-lg btn-block" onclick="ver_carrera_resultados('<?php echo $nb_sede; ?>')">Resultados</button>

                                                          </form>


                 
                                                        <div class="card-body" style="display:none;">

                                                        <h3 class="font-weight-bold font-size-h4 text-dark-75 mb-3">Detalle</h3>

                                                            <?php $info_sala_promocion = $this->inicio_library->get_publicidad_sede_sala('INICIO', $nb_sede); ?>
                                                            <?php if($info_sala_promocion->num_rows() > 0): ?>

                                                            <?php foreach ($info_sala_promocion->result() as $row_publicidad): ?>

                                                        <div class="text-muted font-weight-bold font-size-sm mb-6">Evento destacado</div>
                                                        <div class="font-size-sm mb-6"><?php echo $row_publicidad->tx_descripcion; ?><a></a></div>

                                                    <?php endforeach; endif; ?>
                                                        <!--begin::Info-->
                                                        <div class="d-flex mb-3">
                                                            <span class="text-dark-50 flex-root font-weight-bold">Carreras Abiertas</span>
                                                            <span class="text-dark flex-root font-weight-bold"><?php echo $info_sede->carreras_abiertas; ?></span>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <span class="text-dark-50 flex-root font-weight-bold">Carreras Finalizadas</span>
                                                            <span class="text-dark flex-root font-weight-bold"><?php echo $info_sede->carreras_finalizadas; ?></span>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <span class="text-dark-50 flex-root font-weight-bold">Carreras Cerradas</span>
                                                            <span class="text-dark flex-root font-weight-bold"><?php echo $info_sede->carreras_cerradas; ?></span>
                                                        </div>
    
                                                        <!--end::Info-->
                                                    </div>








                                            
                                                     </div>
                                                    </div>





                                        </div>


                                    </div>

                                    

                            </div>


                                     <div class="col-lg-1">

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

document.body.style.backgroundColor = "#002505";

   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
            function ver_sala_usuario(co_sala)

    {

        $(location).attr('href',"<?php echo site_url() ?>carrera_caballo/ver_sala_modo_usuario/"+ co_sala);


    }

   


            function ver_carrera_resultados(nb_sede)

    {


    $('<input />').attr('type', 'hidden')
     .attr('name', "nb_sede")
     .attr('value', nb_sede)
     .appendTo('#form_hipodromo');

      $("#form_hipodromo").submit();


    }

   


   
</script>
