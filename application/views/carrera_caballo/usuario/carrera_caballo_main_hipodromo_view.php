
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Hipodromos activos</h5>
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

                                    <div class="row">
                                        
                                        <?php if($hipodromo->num_rows() > 0): ?>
                                        <?php foreach ($hipodromo->result() as $row): ?>
                                        <div class="col-lg-4 mt-6 mr-4">

                                            <form action="<?= site_url('/carrera_caballo/ingresar_hipodromo_carrera') ?>" autocomplete="off" id="form_usuario" method="GET">
                                            

                                    <div class="card card-custom card-stretch gutter-b">
                                            <div class="card-body p-0">
                           

                                                    <div class="row">
                                                        <div class="col-9 col-xl-9 pt-0 bgi-no-repeat">
                                                            

                                                            <p class="font-size-lg pt-4 pl-4 pb-0 text-left font-weight-boldest">HIPODROMO <?php echo $row->nb_sede; ?></p>

                                                            <?php if($row->nb_url_foto != ''): ?>

                                                                  <img src="<?php echo $row->nb_url_foto; ?>" style="width:220px; height:100px;" />

                                                                <?php else: ?>

                                                                      <img src="<?php echo base_url(); ?>img/sede/sin_logo_sede.png" style="width:220px; height:100px;" />

                                                                    <?php endif; ?>
                                                           

                                                        </div>
                                                        <div role="buttom" onclick="ingresar_hipodromo_carrera('<?php echo $row->nb_sede; ?>')" class="col-3 col-xl-3 bgi-no-repeat pl-0" style="background-color: #ffffff; background-position: right bottom; background-size: auto 100%; background-image: url('<?php echo base_url(); ?>img/fichas/boton_entrar_hipodromo.png');">
                                                         
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </div>




                                            </form>
                                            

                                        </div>
                                    <?php endforeach; ?>
                                    <?php endif; ?>

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

document.body.style.backgroundColor = "#002505";

   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
            function ingresar_hipodromo_carrera(nb_sede)

    {


    $('<input />').attr('type', 'hidden')
     .attr('name', "nb_sede")
     .attr('value', nb_sede)
     .appendTo('#form_usuario');

      $("#form_usuario").submit();


    }

   


   
</script>
