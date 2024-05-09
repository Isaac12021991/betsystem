                <?php $info_empresa_partner = $this->ion_auth->info_partner_todo(); ?>
                <script type="text/javascript">
                    
                       var co_sala = '<?php echo $info_sala->id; ?>';

                </script>

                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Remate </h5>


        
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
                                    <th style="border: black 1px solid;" width="33%"> <?php echo date('m-Y'); ?>   </th>
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
                                        <marquee><?php echo $info_sala->nb_anuncio_uno; ?> </marquee></td></tr>

                                    </tfoot>
                                    </table>


                                      
                                          </div>


                                            
                                    </div>


                                    <?php if($info_sala->nb_estatus == 'ABIERTO' OR $info_sala->nb_estatus == 'CERRADO' or $info_sala->nb_estatus == 'FINALIZADO'): ?>

                                   <div class="row justify-content-center align-items-center minh-100 mb-2">

                                          <div class="col-lg-12 mt-2">

                                            

                                        <?php if ($sala_linea->num_rows() > 0): $ca_total_tabla = 0; ?>
                                             <table  style="background:#EED025; color: black; table-layout: fixed;">
                                                <thead class="font-size-xs">
                                                <tr style="border: black 1px solid;">
                                                <th style="border: black 1px solid;"  class="text-center align-middle" width="1%"> # </th> 
                                                <th style="border: black 1px solid;" class="text-center align-middle" width="30%"> EJEMPLAR</th> 
                                                <th style="border: black 1px solid;" class="text-center align-middle" width="17%"> CLIENTE </th>
                                                <th style="border: black 1px solid;"  class="text-center align-middle" width="15%"> PRECIO</th>
                                                <th style="border: black 1px solid;" class="text-center align-middle" width="18%"> PUJAR </th>
                                                </tr>
                                                </thead>
                                                <tbody class="table-light">
                                            <?php foreach ($sala_linea->result() as $row): ?>
                                                <tr style="border: black 1px solid;" class="font-size-h3">
                                                    <td style="border: black 1px solid; background:<?php echo $row->nu_color; ?>"  class="text-center align-middle p-0 m-0"> 
                                                     <span style="color:<?php echo $row->nu_color_letra; ?>"><?php echo $row->nu_casilla; ?> </span> </td>

                                                    <td style=" border: black 1px; width:130px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; position:absolute; padding-left:5px;"  class="text-left align-middle"> 

                                                        <?php echo $row->nb_competidor; ?> </td>

                                                       <?php $info_apuesta_actual = $this->carrera_caballo_library->get_info_apostado_remate($row->id, '1'); ?>

                                                     <td style="border: black 1px solid;" class="text-center align-middle"> 

                                                        <span id="nb_usuario_apostado_<?php echo $row->id ?>_1">

                                                        <?php if($info_apuesta_actual): ?> <?php echo substr($info_apuesta_actual->first_name, 0, 8); ?> <?php endif; ?>

                                                        </span>

                                                         </td>

                                                    <td style="border: black 1px solid;" class="text-center align-middle">

                                                        <span id="ca_monto_apostado_<?php echo $row->id ?>_1">

                                                         <?php if($info_apuesta_actual): ?> <?php echo $ca_apuesta_actual = number_format($info_apuesta_actual->ca_monto_apostado, 0, ',','.'); ?>
                                                         <?php else: echo $ca_apuesta_actual = 0; endif; $ca_total_tabla += $ca_apuesta_actual; ?>

                                                          </span> $
                                                         </td> 
                                                    <td style="border: black 1px solid;" class="text-center align-middle">

                                                         <?php if($row->nb_estatus == 'ACTIVO'): ?>

                                                           <?php if($info_sala->nb_estatus == 'ABIERTO'): ?>

                                                        <span id="boton_accion_apuesta_ganadores_<?php echo $row->id ?>_1">

                                                         

                                                             <?php if($info_apuesta_actual): ?> 

                                                            <?php if($info_apuesta_actual->co_usuario == $this->ion_auth->user_id()): ?> 

                                                <img class="symbol symbol-circle" style="width:50px" alt="Pic" src="<?php echo base_url(); ?>img/fichas/correcto.png"/>

                                                        <?php else: ?>



                                      <img class="symbol symbol-circle" style="width:50px" alt="Pic" src="<?php echo base_url(); ?>img/fichas/puja.png"/>


                                                <?php endif; ?>

                                            <?php else: ?>


                        <img class="symbol symbol-circle" style="width:50px" alt="Pic" src="<?php echo base_url(); ?>img/fichas/puja.png"/>


                                                <?php endif; ?>
     
                                                
                                                 </span>

                                                 <?php endif; ?>

                                             <?php else: ?>

                                                <span class="font-size-sm">Retirado</span>

                                                   <?php endif; ?>

                                                     </td>
                                                </tr>
                                            <?php endforeach; ?>
                                                </tbody>
                                            </table>



                                        <?php endif; ?>

                                          </div>

                                            


                                    </div>

                                                 <?php if($info_sala->nb_estatus == 'ABIERTO'): ?>

          

                                     <?php endif; ?>



                                         <div class="row mb-4">

                                              <div class="col-lg-12">
                                <table style="background:#EED025; color: black;" width="100%">
                                  <thead class="font-size-xs">
                                        <tr>
                                           
                                             <th class="text-center align-middle font-size-lg" width="33%">TABLAZO</th>
                                            <th class="text-center align-middle font-size-lg" width="33%" scope="col">POTE</th>
                                             <th class="text-center align-middle font-size-lg" width="33%" scope="col">TOTAL TABLA</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        
                                            <?php $porcentaje_tabla = $ca_total_tabla * $info_empresa_partner->ca_porcentaje; 
                                            $total_tabla_final = $ca_total_tabla - $porcentaje_tabla;  ?> 

                                        <tr class="table-light">
                                             <td class="text-center align-middle font-size-h4"><span id="div_pote_tablazo">0</span> $</td> 
                                            <td class="text-center align-middle font-size-h4"><span id="div_pote"><?php echo $info_sala->ca_pote; ?></span> $</td>     
                                            <td class="text-center align-middle font-size-h4"><span id="div_total_tabla"><?php echo $total_tabla_final + $info_sala->ca_pote; ?></span> $</td>
                                        </tr>
 
                                    </tbody>
                                    </table>
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
                                                            <th class="text-primary text-center align-middle" width="33%">Cliente</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($sala_linea_posiciones->result() as $key): ?>
                                                        <tr>
                                                            <td class="text-center align-middle" scope="row"><?php if($key->nu_posicion == 1): ?> <b>Ganador</b>  <?php elseif($key->nu_posicion == 2): ?> <b>Place</b>  <?php else: ?> <?php echo $key->nu_posicion; ?> 

                                                            Lugar  <?php endif; ?> </td>

                                                            <td class="text-center align-middle"><?php echo $key->nu_casilla.' '.$key->nb_competidor; ?></td>
                                                            <?php $info_ganador = $this->carrera_caballo_library->get_info_mi_posicion_ganado($key->co_sala, $key->nu_posicion); ?>

                                                            <td class="text-center align-middle"><?php if($info_ganador): echo $info_ganador->first_name.' '.$info_ganador->last_name; endif; ?></td>
                                                           
                                                        </tr>
                                                         <?php endforeach ?>

                                                    </tbody>
                                                </table>

                                                 <?php if ($this->carrera_caballo_library->get_info_mi_posicion_ganado_by_usuario($info_sala->id, $this->ion_auth->user_id(), 2)): ?>

                                           <script type="text/javascript">

                                            abrir_ruleta()

                                  function abrir_ruleta() {


                            $.get("<?php echo site_url('carrera_caballo/ver_ruleta/') ?>" + co_sala,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }
   

                                           </script>

                                       <?php endif; ?>
   
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



    document.body.style.backgroundColor = "#002505";

 
    var ca_porcentaje = '<?php echo $info_empresa_partner->ca_porcentaje; ?>';
    var ca_porcentaje_pote_tablazo = '<?php echo $info_sala->ca_porcentaje_pote_tablazo; ?>';
    var ca_pote_tablazo = '<?php echo $info_sala->ca_pote_tablazo; ?>';
    var nb_estatus = '<?php echo $info_sala->nb_estatus; ?>';
    var ca_pote = '<?php echo $info_sala->ca_pote; ?>';
    var num_ganador = '<?php echo $sala_linea_posiciones->num_rows(); ?>';
    var total_tabla_suma = 0;
    var co_usuario = '<?php echo $this->ion_auth->user_id(); ?>';
    var base_url = '<?php echo base_url(); ?>'

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

                            $("#div_reload_resultado_ganador").load('<?php echo site_url('carrera_caballo/reload_resultados/') ?>' + co_sala);

                       }

                       var o = JSON.parse(obj.array_new);

        
                       for (x of o ) {

                $('#ca_monto_apostado_'+x.co_sala_linea+'_'+1).html(x.ca_monto_actual);
                $('#nb_usuario_apostado_'+x.co_sala_linea+'_'+1).html(x.nb_usuario);

                if(x.estatus == 'ACTIVO'){


                if (co_usuario != x.co_usuario_apostador){

               $('#boton_accion_apuesta_ganadores_'+x.co_sala_linea+'_'+1).html('<img class="symbol symbol-circle" style="width:50px" alt="Pic" src="'+base_url+'img/fichas/puja.png"/>')
                }
     

                $('.div_saldo').html(obj.ca_saldo + ' $');

                total_tabla_suma += parseInt(x.ca_monto_actual);

                 var total_tabla_suma_resp =  parseInt(total_tabla_suma) * parseFloat(ca_porcentaje);

                 var total_tabla_suma_final = parseInt(total_tabla_suma) - parseInt(total_tabla_suma_resp);

                 var total_tabla_suma_final_dos = parseInt(ca_pote) + parseInt(total_tabla_suma_final);

                $('#div_total_tabla').html(total_tabla_suma_final_dos);


            }else{

                 $('#boton_accion_apuesta_ganadores_'+x.co_sala_linea+'_'+1).html('Retirado')



            }
            

                        }

                        
                 if(ca_porcentaje_pote_tablazo != 0){

                    var ca_porcentaje_pote_tablazo_sacado = parseFloat(ca_porcentaje_pote_tablazo) / 100;
                    var ca_sacado_ca_pote_tablazo = parseFloat(ca_porcentaje_pote_tablazo_sacado) * total_tabla_suma_final_dos

                    $('#div_pote_tablazo').html(ca_sacado_ca_pote_tablazo);

                    // Guardar pote tablazo

                                  $.ajax({
                method: "POST",
                data: {'ca_sacado_ca_pote_tablazo':ca_sacado_ca_pote_tablazo, 'co_sala':co_sala},
                url: "<?php echo site_url('carrera_caballo/actualizar_pote_tablazo') ?>",
                        }).done(function(data) { 

                         }).fail(function(){


                         }); 


                 }else{

                    $('#div_pote_tablazo').html(ca_pote_tablazo);



                 }





                       return;

                              
   
             }).fail(function(){
   

   
   
             }); 

    var total_tabla_suma = 0;

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



         function ejecutar_apuesta_remate(co_sala_linea, nu_posicion_apuesta)
   {

    var ca_monto_apuesta =  $('#ca_monto_apuesta').val();

      ion.sound.play("audio_puja");

              $.ajax({
   method: "POST",
   data: {'co_sala_linea':co_sala_linea, 'nu_posicion_apuesta':nu_posicion_apuesta, 'ca_monto_apuesta':ca_monto_apuesta, 'co_sala':co_sala},
   url: "<?php echo site_url('carrera_caballo/ejecutar_apuesta_remate') ?>",
            }).done(function(data) { 


                   var obj = JSON.parse(data);
                   
                        if (obj.error == 0) {

        toastr.success(obj.message, 'Exito');

        $('#boton_accion_apuesta_ganadores_'+co_sala_linea+'_'+nu_posicion_apuesta).html('<img alt="Pic" class="symbol symbol-circle" style="width:50px" src="'+base_url+'img/fichas/correcto.png"/>');

        $('#ca_monto_apostado_'+co_sala_linea+'_'+nu_posicion_apuesta).html(obj.ca_monto_apuesta_actual);
        $('#nb_usuario_apostado_'+co_sala_linea+'_'+nu_posicion_apuesta).html(obj.nb_usuario);

        $('#ca_monto_apuesta').val(0);

        $(".div_saldo").load('<?php echo site_url('wallet/get_saldo_actual') ?>');



                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                              

   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   }


   
</script>
