
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



                                                                        <div class="row mb-0">
                                        
                                        <div class="col-lg-12">

                                    <table class="table display-5">
                                    <thead>
                                    <tr class="thead-dark">
                                    <th>Hipodromo </th> <th> Carrera nro: <?php echo $info_sala->nu_carrera; ?> </th><th>  </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="table-light"><td><?php echo $info_sala->nb_sede; ?></td><td>Distancia: <?php echo $info_sala->nu_distancia; ?></td><td></td></tr>
                                    </tbody>
                                    <tfoot>
                                    <tr class="table-light"><td colspan="3"><marquee><?php echo $info_sala->nb_anuncio_uno; ?>  <?php echo $info_sala->nb_anuncio_dos; ?></marquee></td></tr>

                                    </tfoot>
                                    </table>


                                      
                                          </div>



                                            
                                    </div>


 

                                    <div class="row">

                                          <div class="col-lg-12 mt-2">

                                            <div class="card card-custom">
                                        <div class="card-header">
                                        <div class="card-title">
                                        <h3 class="card-label">
                                        Ganadores
                                        <small>Lista de personas que han apostado</small>
                                        </h3>
                                        </div>

                                        </div>
                                        <div class="card-body pt-0 pl-0 pr-0 pl-lg-3 pr-lg-3">
                                        <?php if ($sala_linea_apuesta->num_rows() > 0): ?>
                                             <table class="table table-sm table-hover table-striped">
                                                <thead>
                                                <tr>
                                                <th  class="text-center align-middle" width="20%"> Monto </th> 
                                                <th  class="text-center align-middle" width="20%"> Ganador / Place </th> 
                                                <th  class="text-center align-middle" width="20%"> Nombre </th>
                                                <th  class="text-center align-middle" width="20%"> Ejemplar </th>
                                                <th  class="text-center align-middle" width="20%"> Pago </th>
                                                <th  class="text-center align-middle" width="20%">  </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                            <?php foreach ($sala_linea_apuesta->result() as $row): ?>
                                                <tr>
                                                    <td  class="text-center align-middle"> <?php echo number_format($row->ca_monto, 2, ',','.'); ?> $ </td>
                                                     <td  class="text-center align-middle"> <?php if ($row->nu_posicion_apuesta == 1): ?> Ganador <?php else: ?>

                                                     Place  <?php endif; ?> </td>
                                                    <td  class="text-center align-middle"> <?php echo $row->nb_nombre.' '.$row->nb_apellido; ?> </td>
                                                    <td  class="text-center align-middle"> <?php echo $row->nu_casilla; ?>  </td>
                                                    <td  class="text-center align-middle"> 

                                                    <?php if($row->nu_posicion == $row->nu_posicion_apuesta):
                                                         $ca_calculo = $row->ca_monto * $row->ca_monto_inh;
                                                        $result_ca_dolar = $ca_calculo / $row->ca_dividendo; 
                                                        $result_monto_final =  $result_ca_dolar + $row->ca_monto;
                                                        ?>
                                                     <?php echo number_format($result_monto_final, 2, ',','.'); ?> <?php else: ?> 0 <?php endif; ?> $ </td>
                                                    <td  class="text-center align-middle"> 

                                        <?php if($info_sala->nb_estatus == 'ABIERTO'): ?>
                                                      <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">

                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="eliminar_apuesta(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-list-3"></i>
                                                                        </span>
                                                                        <span class="navi-text">Eliminar</span>
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endif; ?>



                                                </td>
                                                </tr>
                                            <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                             <?php if($info_sala->nb_estatus == 'ABIERTO'): ?>
                                             <a onclick="abrir_modal()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2 ml-2">Agregar apuesta + </a>
                                              <?php endif; ?>

                                        <?php else: ?>


                                             <?php if($info_sala->nb_estatus == 'ABIERTO'): ?>

                                                <h4>No se ha realizado ninguna apuesta</h4>

                                            <a onclick="abrir_modal()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2 ml-2">Agregar apuesta + </a>

                                                    <?php endif; ?>

                                                <?php endif; ?> 
                                        </div>
                                        </div>

                                          </div>

                                        
                                


                                    </div>

  
                        

                                  <?php if($info_sala->nb_estatus == 'CERRADO'): ?>

                                   <div class="row justify-content-center align-items-center minh-100 mt-6">
                                        
                                        <div class="col-lg-6">

                                            <div class="card card-custom gutter-b">
                                                 <div class="card-header">
                                                  <div class="card-title">
                                                   <h3 class="card-label">
                                                    Resultados
                                                    <small></small>
                                                   </h3>
                                                  </div>
                                                 </div>
                                                 <div class="card-body  p-2">

                                                    <span id="div_reload_resultado_ganador">

                                                <?php if($sala_linea_posiciones->num_rows() > 0): ?>

                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-primary text-center align-middle" width="50%">Lugar</th>
                                                            <th class="text-primary text-center align-middle" width="50%">Ejemplar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($sala_linea_posiciones->result() as $key): ?>
                                                        <tr>
                                                            <td class="text-center align-middle" scope="row"><?php if($key->nu_posicion == 1): ?> <b>Ganador</b>  <?php elseif($key->nu_posicion == 2): ?> <b>Place</b>  <?php else: ?> <?php echo $key->nu_posicion; ?> 

                                                            Lugar  <?php endif; ?> </td>

                                                            <td class="text-center align-middle"><?php echo $key->nu_casilla.' '.$key->nb_competidor; ?></td>
                                                            <?php $info_ganador = $this->carrera_caballo_library->get_info_mi_posicion_ganado($key->co_sala, $this->ion_auth->user_id(), $key->nu_posicion); ?>

                                                        </tr>
                                                         <?php endforeach ?>

                                                    </tbody>
                                                </table>

   
                                                <?php else: ?>

                                                <h4 align="text-center">ESPERANDO RESULTADOS ...</h4>

                                                <?php endif; ?>

                                                </span>

                                                 </div>
                                                </div>
                                            


                                        </div>

                                    </div>


                                  <?php endif; ?> 




                                    

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

    var co_sala = '<?php echo $info_sala->id; ?>';
    var co_taquilla = '<?php echo $co_taquilla; ?>';
    var nb_estatus = '<?php echo $info_sala->nb_estatus; ?>';
    var num_ganador = '<?php echo $sala_linea_posiciones->num_rows(); ?>';

setInterval(function(){ 

             $.ajax({
   method: "POST",
   data: {'co_sala':co_sala, 'nb_estatus':nb_estatus, 'num_ganador':num_ganador},
   url: "<?php echo site_url('carrera_caballo/cambios_sala') ?>",
            }).done(function(data) { 

                   var obj = JSON.parse(data);
                   
                        if (obj.cambios_estatus == 1) {

                        location.reload();

                       }

                        if (obj.cambios_ganador == 1) {

                            $("#div_reload_resultado_ganador").load('<?php echo site_url('carrera_caballo/reload_resultados_taquilla/') ?>' + co_sala);

                       }
                              
   
             }).fail(function(){
   
           
   
   
             }); 
   

}, 2500);


   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   

  
   
                                   function abrir_modal() {


                            $.get("<?php echo site_url('taquilla/apostar_taquilla_usuario/') ?>" + co_sala+"/"+co_taquilla,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


                            


      function eliminar_apuesta(co_apuesta_compra)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar',
   content: '¿Estas seguro que deseas eliminar esta apuesta?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
            $.ajax({
   method: "POST",
   data: {'co_apuesta_compra':co_apuesta_compra},
   url: "<?php echo site_url('taquilla/eliminar_apuesta') ?>",
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
