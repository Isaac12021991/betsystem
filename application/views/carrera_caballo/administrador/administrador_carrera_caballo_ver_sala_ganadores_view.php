
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Ganadores</h5>
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

                                  <table class="font-size-lg" style="background:#EED025; color: black;" width="100%">
                                   <thead>
                                    <tr style="border: black 1px solid;">
                                    <th style="border: black 1px solid;" width="33%">Hipodromo </th> 
                                    <th style="border: black 1px solid;" width="33%">Carrera nro: <?php echo $info_sala->nu_carrera; ?> </th>
                                    <th style="border: black 1px solid;" width="33%"> <?php echo date('m-Y'); ?>  </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr style="border: black 1px solid;">
                                        <td style="border: black 1px solid;"><?php echo $info_sala->nb_sede; ?></td>
                                        <td style="border: black 1px solid;">Distancia: <?php echo $info_sala->nu_distancia; ?></td>
                                        <td style="border: black 1px solid;"><?php echo $info_sala->nb_anuncio_dos; ?></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr style="border: black 1px solid;"><td style="border: black 1px solid;" colspan="3">
                                        <marquee><?php echo $info_sala->nb_anuncio_uno; ?>  </marquee></td></tr>

                                    </tfoot>
                                    </table>



                                      
                                          </div>



                                            
                                    </div>


                                    <?php if($info_sala->nb_estatus == 'ABIERTO' or $info_sala->nb_estatus == 'CERRADO' or $info_sala->nb_estatus == 'FINALIZADO'): ?>

                                    <div class="row">

                                          <div class="col-6 pr-1">

                                            <h4 class="text-white">Ganador</h4>

                                        <?php if ($sala_linea->num_rows() > 0):  $ca_total_tabla = 0; ?>
                                             <table  style="background:#EED025; color: black;">
                                                <thead class="font-size-xs">
                                                <tr>
                                                <th style="border: black 1px solid;" class="text-center align-middle" width="1%"> # </th> 
                                                <th style="border: black 1px solid;" class="text-center align-middle" width="33%"> APOSTADO</th>
                                                <th style="border: black 1px solid;" class="text-center align-middle" width="33%"> </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                            <?php foreach ($sala_linea->result() as $row): ?>
                                                <tr class="font-size-h3" style="border: black 1px solid;">
                                                    <td style="border: black 1px solid; background:<?php echo $row->nu_color; ?>" class="text-center align-middle">  

                                                     <span style="color:<?php echo $row->nu_color_letra; ?>">
                                                        <?php echo $row->nu_casilla; ?> </span>

                                                     </td>
                                                    <td style="border: black 1px solid;"  class="text-center align-middle"><span id="ca_monto_apostado_<?php echo $row->id ?>_1"> 
                                                    <?php $ca_monto_apostado = $this->carrera_caballo_library->get_info_apostado_todo($row->id, '1'); 
                                                            echo number_format($ca_monto_apostado, 0, ',','.'); ?> $ </span></td>

                                                    <td style="border: black 1px solid;" class="text-center align-middle">

                                                         <?php if($info_sala->nb_estatus == 'ABIERTO'): ?>

                                                             <?php if($row->nb_estatus == 'ACTIVO'): ?>

                                                        <span id="boton_accion_apuesta_ganadores_<?php echo $row->id ?>_1">
                                                        <?php if($ca_monto_apostado == 0): ?>
                                                    

                                            <img alt="Pic" class="symbol symbol-circle" style="width:50px" src="<?php echo base_url(); ?>img/fichas/ficha0.png"/>

                                                   
                                                <?php else: ?>

                                             <img alt="Pic"  class="symbol symbol-circle" style="width:50px"src="<?php echo base_url(); ?>img/fichas/correcto.png"/>

                                                <?php endif; ?>

                                                 </span>

                                                  <?php else: ?>
                                                    <span>Retirado</span>

                                                   <?php endif; ?>

                                                  <?php endif; ?>

                                                     </td>
                                                </tr>
                                            <?php $ca_total_tabla += $ca_monto_apostado;  endforeach; ?>
                                                </tbody>
                                            </table>

                                            <table class="table table-sm table-bordered mt-6" style="background-color:white">
                                                   <tr>
                                                <td  class="text-right align-middle" width="33%"> Total tabla:</td> <td> <?php echo number_format($ca_total_tabla, 2, ',','.');  ?>  </td> 
                                                </tr>
                                                                                                   <tr>
                                                <td  class="text-right align-middle" width="33%"> Pago cliente: </td> <td>  <?php $info_pago_cliente = $this->reporte_library->get_reportes_ganadores_pagos($info_sala->id, 1); echo number_format($info_pago_cliente->ca_monto_pago, 2, ',','.');   ?>  </td> 
                                                </tr>
                                                <tr>
                                                <td  class="text-right align-middle" width="33%"> Total casa: </td> <td>  <?php $ca_total_casa = $ca_total_tabla -$info_pago_cliente->ca_monto_pago; ?>  

                                                <?php echo number_format($ca_total_casa, 2, ',','.');  ?>  </td> 
                                                </tr>

                                            </table>

                                        <?php endif; ?>
          
                                          </div>

                                            
                                        <div class="col-6 pl-1">

                                    <h4 class="text-white">Place</h4>

                                 <?php if ($sala_linea->num_rows() > 0): $ca_total_tabla = 0; ?>
                                             <table  style="background:#EED025; color: black;" width="100%">
                                                <thead class="font-size-xs">
                                                <tr>
                                                <th style="border: black 1px solid;" class="text-center align-middle" width="50%"> APOSTADO</th>
                                                <th style="border: black 1px solid;" class="text-center align-middle" width="50%"> </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                            <?php foreach ($sala_linea->result() as $row): ?>
                                                <tr class="font-size-h3" style="border: black 1px solid;">
                                                    <td style="border: black 1px solid;" class="text-center align-middle">
                                                    <span id="ca_monto_apostado_<?php echo $row->id ?>_2"> <?php $ca_monto_apostado = $this->carrera_caballo_library->get_info_apostado_todo($row->id, '2'); 
                                                            echo number_format($ca_monto_apostado, 0, ',','.'); ?> $ </span></td>
                                                                <td style="border: black 1px solid;"  class="text-center align-middle">

                                                             <?php if($info_sala->nb_estatus == 'ABIERTO'): ?>     

                                                                <?php if($row->nb_estatus == 'ACTIVO'): ?>

                                                        <span id="boton_accion_apuesta_ganadores_<?php echo $row->id ?>_2">
                                                        <?php if($ca_monto_apostado == 0): ?>
                                                    
                                                            <img alt="Pic" class="symbol symbol-circle" style="width:50px" src="<?php echo base_url(); ?>img/fichas/ficha0.png"/>
                                                   
                                                <?php else: ?>

                                        <img alt="Pic" class="symbol symbol-circle" style="width:50px"  src="<?php echo base_url(); ?>img/fichas/correcto.png"/>

                                                <?php endif; ?>

                                                 </span>

                                            

                                             <?php else: ?>

                                                <span>Retirado</span>

                                             <?php endif; ?>

                                              <?php endif; ?>

                                                     </td>
                                                </tr>
                                            <?php $ca_total_tabla += $ca_monto_apostado;  endforeach; ?>
                                                </tbody>
                                            </table>

                                            <table class="table table-sm table-bordered mt-6" style="background-color:white">
                                                   <tr>
                                                <td  class="text-right align-middle" width="33%"> Total tabla:</td> <td> <?php echo number_format($ca_total_tabla, 2, ',','.');  ?>  </td> 
                                                </tr>
                                                                                                   <tr>
                                                <td  class="text-right align-middle" width="33%"> Pago cliente: </td> <td>  <?php $info_pago_cliente = $this->reporte_library->get_reportes_ganadores_pagos($info_sala->id, 2); echo number_format($info_pago_cliente->ca_monto_pago, 2, ',','.');   ?>  </td> 
                                                </tr>
                                                <tr>
                                                <td  class="text-right align-middle" width="33%"> Total casa: </td> <td>  <?php $ca_total_casa = $ca_total_tabla -$info_pago_cliente->ca_monto_pago; ?>  

                                                <?php echo number_format($ca_total_casa, 2, ',','.');  ?>  </td> 
                                                </tr>

                                            </table>


                                        <?php endif; ?>
      

                                          </div>
                                            

                                


                                    </div>

             

                                <?php endif; ?>

                                  <?php if($info_sala->nb_estatus == 'CERRADO'): ?>

                                   <div class="row justify-content-center align-items-center minh-100 mt-4">
                                        
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
                                                            <th class="text-primary text-center align-middle" width="33%">Lugar</th>
                                                            <th class="text-primary text-center align-middle" width="33%">Ejemplar</th>
                                                            <th class="text-primary text-center align-middle" width="33%">Dividendo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($sala_linea_posiciones->result() as $key): ?>
                                                        <tr>
                                                            <td class="text-center align-middle" scope="row"><?php if($key->nu_posicion == 1): ?> <b>Ganador</b>  <?php elseif($key->nu_posicion == 2): ?> <b>Place</b>  <?php else: ?> <?php echo $key->nu_posicion; ?> 

                                                            Lugar  <?php endif; ?> </td>

                                                            <td class="text-center align-middle"><?php echo $key->nu_casilla.' '.$key->nb_competidor; ?></td>
                                                            <td class="text-center align-middle"><?php echo $key->ca_dividendo; ?></td>
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


                                                                    <div class="row">
                                      
                                      <div class="col-lg-12">
                                          <h3 align="center" class="font-size-lg text-center text-white"><?php echo $info_sala->nb_estatus; ?></h3>
                                      </div>

                                  </div>
     


                                                                <div class="row">

                                <div class="col-lg-12">

            <?php $list_video = $this->carrera_caballo_library->get_info_transmision_envivo($info_sala->id); ?>

                <?php if ($list_video->num_rows() > 0) : ?>
      
                  <?php $con = 0;  ?>
                  <?php foreach ($list_video->result() as $row) : $con ++; ?>


                                                <div class="card card-custom">
                        <div class="card-header">
                        <div class="card-title">
                        <span class="card-icon">
                        </span>
                        <h3 class="card-label">

                       <span style="width: 108px;"><span class="label label-success label-dot mr-2"></span><span class="font-weight-bold text-success">Transmision en vivo</span></span>
                        
                        <small><?php echo $row->nb_video; ?> <?php echo $row->nb_origen; ?></small>
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
                        <iframe width="<?php echo $row->nb_width; ?>%" <?php if ($this->agent->is_mobile()) { ?> height="100%" <?php }else{ ?> height="600PX"<?php } ?>
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
    
                        <?php endif; ?>

                        <span class="ml-6"> <?php echo $row->tx_descripcion; ?></span>

                        </div>
</div>

<?php endforeach; ?>

<?php  endif; ?>



                                </div>


                            </div>


                                                           <?php if($this->empresa_library->get_partner_configuracion_gaceta_sede('GACETA', $info_sala->nb_sede)): ?> 
                                         <?php $info_gaceta = $this->empresa_library->get_partner_configuracion_gaceta_sede('GACETA', $info_sala->nb_sede); ?> 
                                                <div class="row mt-2">


                                <div class="col-lg-4">
                                        <div class="card card-custom gutter-b">
                                                    <!--begin::Body-->
                                                    <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
                                                        <div class="mr-2">
                                                            <h3 class="font-weight-bolder">GACETA</h3>
                                                            <div class="text-dark-50 font-size-lg mt-2"></div>
                                                        </div>
                                                        <a href="<?php echo $info_gaceta->tx_link; ?>" target="_blank" class="btn btn-primary font-weight-bold py-3 px-6">Ver ahora</a>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>

                                    </div>


                                         <div class="col-lg-8 mt-2">



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
      var base_url = '<?php echo base_url(); ?>'

      document.body.style.backgroundColor = "#002505";

    var co_sala = '<?php echo $info_sala->id; ?>';
    var nb_estatus = '<?php echo $info_sala->nb_estatus; ?>';
    var num_ganador = '<?php echo $sala_linea_posiciones->num_rows(); ?>';
    var algun_caballo_retirado = '<?php echo $info_sala->caballos_retirados; ?>';

setInterval(function(){ 

             $.ajax({
   method: "POST",
   data: {'co_sala':co_sala, 'nb_estatus':nb_estatus, 'num_ganador':num_ganador},
   url: "<?php echo site_url('carrera_caballo/cambios_sala') ?>",
            }).done(function(data) { 

                   var obj = JSON.parse(data);

                     if (obj.algun_caballo_retirado != algun_caballo_retirado) {

                        location.reload();

                       }
                   
                        if (obj.cambios_estatus == 1) {

                        location.reload();

                       }

                        if (obj.cambios_ganador == 1) {

                            $("#div_reload_resultado_ganador").load('<?php echo site_url('carrera_caballo/reload_resultados/') ?>' + co_sala);

                       }


                        for (x of obj.info_modo_carrera_administrador_ganadores_primer_lugar) {

                            $('#ca_monto_apostado_'+x.id+'_'+1).html(x.ca_monto);


                        }

                        for (x of obj.info_modo_carrera_administrador_ganadores_segundo_lugar) {

                            $('#ca_monto_apostado_'+x.id+'_'+2).html(x.ca_monto);


                        }
                              
   
             }).fail(function(){
   
      
   
   
             }); 
   

}, 1000);


   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   

   function limpiar_monto() {
      $('#ca_monto_apuesta').val(0);
   }


function apostar_ficha(ca_monto_apuesta) {
    // body...
   var ca_monto_current =  $('#ca_monto_apuesta').val();
   var monto_sumar = parseInt(ca_monto_current) + parseInt(ca_monto_apuesta);
     $('#ca_monto_apuesta').val(monto_sumar);

     

}



         function ejecutar_apuesta(co_sala_linea, nu_posicion_apuesta)
   {

    var ca_monto_apuesta =  $('#ca_monto_apuesta').val();

    if (ca_monto_apuesta == 0) {
        toastr.error('ingrese el monto de la apuesta', 'Error');
        return;
    }

             KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.5,
              state: 'primary' // a bootstrap color
             });


    ion.sound.play("audio_puja");
   
              $.ajax({
   method: "POST",
   data: {'co_sala_linea':co_sala_linea, 'nu_posicion_apuesta':nu_posicion_apuesta, 'ca_monto_apuesta':ca_monto_apuesta, 'co_sala':co_sala},
   url: "<?php echo site_url('carrera_caballo/ejecutar_apuesta') ?>",
            }).done(function(data) { 

                 KTApp.unblockPage();

                   var obj = JSON.parse(data);
                   
                        if (obj.error == 0) {


        $('#boton_accion_apuesta_ganadores_'+co_sala_linea+'_'+nu_posicion_apuesta).html('<img alt="Pic" class="symbol symbol-circle" style="width:50px" src="'+base_url+'img/fichas/correcto.png"/>');
        $('#ca_monto_apostado_'+co_sala_linea+'_'+nu_posicion_apuesta).html(ca_monto_apuesta);
        $('#ca_monto_apuesta').val(0);
         $(".div_saldo").load('<?php echo site_url('wallet/get_saldo_actual') ?>');
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                              

   
             }).fail(function(){
            
             KTApp.unblockPage();
   
   
             }); 
   
   
   }

   


   
</script>
