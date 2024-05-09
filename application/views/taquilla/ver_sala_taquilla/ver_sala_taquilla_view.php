
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Carrera de caballos</h5>
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
                                        

                                        
                                            <?php if($carrera_hipodromo_modo_juego->num_rows() > 0): ?>
                                        <?php foreach ($carrera_hipodromo_modo_juego->result() as $row): ?>
                                            <div class="col-lg-4">
                                                     <div class="card card-custom card-stretch gutter-b">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 p-6 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: 50% auto; background-image: url(<?php echo base_url(); ?>assets/media/svg/caballo/caballo_2.svg)">


                                                    <h2 class="text-primary pb-5 font-weight-bolder">Hipodromo <?php echo $row->nb_sede; ?></h2>
                                                    <ul class="text-primary">
                                                        <li> <?php echo $row->nb_modo_juego; ?> </li>
                                                        <li> Carrera Nro <?php echo $row->nu_carrera; ?> </li>
                                                        <li> <?php echo $row->nb_tipo_carrera; ?> </li>
                                                        <li> <?php echo $row->nu_distancia; ?> Mts </li>
                                                        <li> <?php echo $row->nb_estatus; ?> </li>
                                                    </ul>
                                                    <a href="javascript:" onclick="ver_sala_usuario('<?php echo $row->id; ?>')" class="btn btn-primary font-weight-bold py-2 px-6">Ver sala</a>
                                                </div>
                                            </div>
                                        </div>

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

var co_taquilla = '<?php echo $co_taquilla; ?>'


   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
            function ver_sala_usuario(co_sala)

    {

        $(location).attr('href',"<?php echo site_url() ?>taquilla/ver_sala_taquilla_usuario/"+co_taquilla+"/"+ co_sala);


    }

   


   
</script>
