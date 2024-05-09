
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

                                     <div class="col-lg-1">

                                     </div>


                                <div class="col-lg-10">

                                    <div class="row">
                                        

                                        <div class="col-lg-12">
                                                        <?php if($info_resultados_hipodromo->num_rows() > 0):  $co_sala = 0; ?>

                                                        <?php foreach ($info_resultados_hipodromo->result() as $row): ?>
                                                                
                                                         <?php if($co_sala != $row->co_sala): $co_sala = $row->co_sala; ?>

                                                    <div class="card card-custom gutter-b">
                                                     <div class="card-header">
                                                      <div class="card-title">
                                                       <h3 class="card-label"> 
                                                       
                                                      <?php echo $row->nb_sede; ?><br> <?php echo 'Carrera N°: '.$row->nu_carrera; ?> - <?php echo date('d-m-Y', $row->ff_sistema_time); ?>
                                                       </h3>
                                                      </div>
                                                     </div>
                                                     <div class="card-body pb-0 pl-0 pr-0 pt-0">


                                                            <table class="table table-bordered table-sm">
                                                                <thead class="thead-light">
                                                                <tr>

                                                                <th class="text-center">  Lugar </th>
                                                                <th>  Competidor </th>
                                                                 <th>  Dividendo </th>

                                                                 <?php if($row->nb_modo_juego == 'Ganadores'): ?>
                                                                <th>  Usuario Ganador </th>
                                                            <?php endif; ?>

                                                            </tr>
                                                            </thead>


                                                         <?php foreach ($info_resultados_hipodromo->result() as $row_two): ?>

                                                        
                                                            <?php if($row_two->co_sala == $co_sala): ?>


                                                                <tr>
                                                                    <td class="text-center"> <?php echo $row_two->nu_posicion; ?></td>
                                                                     <td> <?php echo $row_two->nb_competidor; ?></td>
                                                                     <td> <?php echo number_format($row_two->ca_monto_inh,2,',','.'); ?></td>

                                                                     <?php if($row->nb_modo_juego == 'Ganadores'): ?>
                                                                      <td> <?php $info_ganador = $this->carrera_caballo_library->get_info_mi_posicion_ganado($row_two->co_sala, $row_two->nu_posicion); ?>

                                                                        <?php if($info_ganador): ?> <?php echo $info_ganador->first_name; ?> <?php endif; ?> </td>
                                                                         <?php endif; ?>
                                                                </tr>
                                                            


                                                             <?php endif; ?>

                                                            

                                                         <?php endforeach; ?>

                                                           </table>


                                                    
                                                     </div>
                                                    </div>

                                                <?php endif; ?>

                                                

                                                      <?php endforeach; ?>

                                                       <?php else: ?>

                                                        <h4> Sin Registro</h4>

                                                       <?php endif; ?>



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
   
            function ver_carrera_modo_juego(nb_modo_juego, nb_sede)

    {


    $('<input />').attr('type', 'hidden')
     .attr('name', "nb_modo_juego")
     .attr('value', nb_modo_juego)
     .appendTo('#form_usuario');

    $('<input />').attr('type', 'hidden')
     .attr('name', "nb_sede")
     .attr('value', nb_sede)
     .appendTo('#form_usuario');

      $("#form_usuario").submit();


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
