
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Carrera de caballos</h5>
                                    
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted">Editar</a>
                                            </li>
                                        </ul>

                                    <!--end::Actions-->



        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                            

                                <?php if ($info_sala->nb_estatus == 'CERRADO'): ?>
                                <a onclick="elegir_ganador()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Elegir ganador</a>
                            <?php endif; ?>
                                    
                                <a onclick="ejecutar_editar_carrera_caballo()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

                                <a href="javascript:window.history.back();" class="btn btn-clean font-weight-bolder btn-sm mr-2">Descartar</a>

                                <div class="dropdown dropdown-inline my-2 my-lg-0" data-placement="left">
                                        <a href="#" class="btn btn-primary btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="svg-icon svg-icon-md">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-2.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>
                                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right" style="">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header font-weight-bold py-4">
                                                    <span class="font-size-lg">Accion:</span>
                                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mas accion sobre la sala..."></i>
                                                </li>
                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                <li class="navi-item">
                                                    <a href="javascript:" onclick="duplicar_registro()" class="navi-link"> 
                                                    <span class="navi-text">
                                                            <span class="text-dark">Duplicar</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="javascript:" onclick="eliminar_carrera_caballo()" class="navi-link">
                                                        <span class="navi-text">
                                                            <span class="text-danger">Eliminar</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                

                                    
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
                                            Editar
                                            <small>Editar carrera</small>
                                           </h3>

                                          </div>

                                            <div class="card-toolbar">

   <a href="javascript:" onclick="cambiar_estatus('EN ESPERA')" class="<?php if ($info_sala->nb_estatus == 'EN ESPERA'): ?> btn btn-primary font-weight-bolder btn-sm mr-2 <?php else: ?> btn btn-clean font-weight-bolder btn-sm mr-2 <?php endif; ?>" data-toggle="tooltip" data-placement="top" title="Colocar carrera en espera">
   En espera
   </a>

   <a href="javascript:" onclick="cambiar_estatus('ABIERTO')" class="<?php if ($info_sala->nb_estatus == 'ABIERTO'): ?> btn btn-primary font-weight-bolder btn-sm mr-2 <?php else: ?> btn btn-clean font-weight-bolder btn-sm mr-2 <?php endif; ?>"  data-toggle="tooltip" data-placement="top" title="Iniciar carrera">
   ABRIR
   </a>
   <a href="javascript:" onclick="cambiar_estatus('CERRADO')" class="<?php if ($info_sala->nb_estatus == 'CERRADO'): ?> btn btn-primary font-weight-bolder btn-sm mr-2 <?php else: ?> btn btn-clean font-weight-bolder btn-sm mr-2 <?php endif; ?>" data-toggle="tooltip" data-placement="top" title="Carrera cerrada">
  CERRAR
   </a>

      <a href="javascript:" onclick="cambiar_estatus('FINALIZADO')" class="<?php if ($info_sala->nb_estatus == 'FINALIZADO'): ?> btn btn-danger font-weight-bolder btn-sm mr-2 <?php else: ?> btn btn-clean font-weight-bolder btn-sm mr-2 <?php endif; ?>" data-toggle="tooltip" data-placement="top" title="Carrera Finalizada">
  FINALIZAR
   </a>
  </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Carrera Nro:</label>
                                               <div class="col-9">
                                                <input type="text" name="nu_carrera" id="nu_carrera" class="form-control form-control-solid" placeholder="Carrera" value="<?php echo $info_sala->nu_carrera; ?>"> 
                                               </div>
                                              </div>
                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Hipodromo:</label>
                                               <div class="col-9">

                                                <div class="input-group">
                                                    <select class="form-control" id="nb_sede" name="nb_sede">
                                                    <?php foreach($sede->result() as $row){
                                                    echo "<option value='".$row->nb_sede."'>".$row->nb_sede."</option>";
                                                    } ?>
                                                    </select>  
                                                            <div class="input-group-append">
                                                                <a class="btn btn-success" onclick="agregar_sede_abrir_modal()">+</a>
                                                            </div>
                                                        </div>

                                               </div>
                                              </div>

                                        <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Minutos de Duracion:</label>
                                               <div class="col-9">
                                            <input type="number" name="ca_minutos_cierre" id="ca_minutos_cierre" class="form-control form-control-solid" placeholder="Minutos" value="<?php echo $info_sala->ca_minutos_cierre; ?>"> 
                                               </div>
                                              </div>


                                        <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Estatus:</label>
                                               <div class="col-9">
                                            <select class="form-control" id="nb_estatus" name="nb_estatus">
                                                <option value="ABIERTO">INICIAR</option>
                                                <option value="EN ESPERA">EN ESPERA</option>
                                                <option value="CERRADO">CERRADO</option>
                                                <option value="FINALIZADO">FINALIZADO</option>
                                              </select>  
                                               </div>
                                              </div>

                                          </div>

                                           <div class="col-lg-6">

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Modo de Juego:</label>
                                               <div class="col-9">
                                                 <select class="form-control" id="nb_modo_juego" name="nb_modo_juego">
                                                <option value="Remate">Remate</option>
                                                <option value="Ganadores">Ganadores</option>
                                              </select>  
                                               </div>
                                              </div>

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Tipo de Carrea:</label>
                                               <div class="col-9">
                                                <select class="form-control" id="nb_tipo_carrera" name="nb_tipo_carrera">
                                                <option value="NACIONAL">Nacional</option>
                                                <option value="INTERNACIONAL">Internacional</option>
                                              </select>  
                                               </div>
                                              </div>

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Distancia:</label>
                                               <div class="col-9">
                                                  <input type="text" name="nu_distancia" id="nu_distancia" class="form-control" autocomplete="off" placeholder="Distancia" value="<?php echo $info_sala->nu_distancia; ?>">
                                               </div>
                                              </div>

                                           </div>
                                           </div>

                                           <div class="row">

                                            <div class="col-lg-12">
                                            
                 <ul class="nav nav-tabs nav-tabs-line">

    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_0">Ejemplares</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_1">Dinero</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Anuncios</a>
    </li>
</ul>
<div class="tab-content mt-5" id="myTabContent">

    <div class="tab-pane fade show active" id="kt_tab_pane_0" role="tabpanel" aria-labelledby="kt_tab_pane_0">
    
                                                    <div class="row">
                                                 <div class="col-lg-12">
                                                    <span id="reload_sala_linea">

                                                      <?php if ($info_linea_sala->num_rows() > 0) : ?>
 
               <table class="table table-striped table-hover" id="tabla_1" width="100%">
                  <thead>
                     <tr>
                        <th width="12%" class="all">Casilla</th>
                        <th width="12%" class="all">Ejemplar</th>
                        <th width="15%" class="desktop">Monto Inicial</th>
                         <th width="10%" class="desktop">Color</th>
                         <th width="15%" class="desktop">Accion</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($info_linea_sala->result() as $row) : ?>
                     <tr  <?php if($row->nb_estatus == 'RETIRADO'): ?> class="text-danger" <?php endif; ?>>

                         <td><?php echo $row->nu_casilla; ?><?php if($row->nb_estatus == 'RETIRADO'): ?> <br> <span class="text-danger">Retirado</span>  <?php endif; ?>
                         <?php if($row->nu_posicion != 0): ?> <br> <?php if($row->nu_posicion == 1): ?> <span class="text-success">Ganador</span> <?php else: ?> <span class="text-primary"> <?php echo $row->nu_posicion.' Lugar'; ?></span>  <?php endif; ?> <?php endif; ?>
                     </td>
                          <td><?php echo $row->nb_competidor; ?></td>
                          <td><?php echo $row->ca_monto_apuesta_inicial; ?></td>

                          <td> <div style="background-color:<?php echo $row->nu_color;  ?>;" class="p-2 m-2"></div> </td>
                                

                <td>
                    <?php if($info_sala->nb_estatus != 'CERRADO' and $info_sala->nb_estatus != 'FINALIZADO'): ?>
                    <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">
                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="editar_ejemplar_modal(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>


                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="retirar_caballo(<?php echo $row->id; ?>)" class="navi-link" class="navi-link">
                                                                         <span class="navi-icon">
                                                                            <i class="flaticon2-list-3"></i>
                                                                        </span>
                                                                        <span class="navi-text">Retirar</span>
                                                                    </a>
                                                                </li>

                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="eliminar_ejemplar(<?php echo $row->id; ?>)" class="navi-link">
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
               <?php else: ?>
               <h4>Sin registro</h4>

               <?php endif; ?>

                                                 </div>

                                                 </span>


                                             </div>
                                           <?php if($info_sala->nb_estatus != 'CERRADO' and $info_sala->nb_estatus != 'FINALIZADO'): ?>
                                             <a href="javascript:" onclick="abrir_modal()" class="btn btn-light-dark font-weight-bold">Agregar ejemplar</a>
                                         <?php endif; ?>




    </div>

    <div class="tab-pane fade" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
                                                    <div class="row">
                                                 <div class="col-lg-6">


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Pote:</label>
                                               <div class="col-9">
                                                 <input type="number" name="ca_pote" id="ca_pote" class="form-control form-control-solid" placeholder="Pote" value="<?php echo $info_sala->ca_pote; ?>"> 
                                               </div>
                                              </div>
 


                                                 </div>
                                                 <div class="col-lg-6">

                                        <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Pote tablazo:</label>
                                           <div class="col-9">
                                             <input type="number" name="ca_pote_tablazo" id="ca_pote_tablazo" class="form-control form-control-solid" placeholder="Pote" value="<?php echo $info_sala->ca_pote_tablazo; ?>"> 
                                           </div>
                                          </div>

                                                                                  <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">% Pote tablazo:</label>
                                           <div class="col-9">
                                             <input type="number" name="ca_porcentaje_pote_tablazo" id="ca_porcentaje_pote_tablazo" class="form-control form-control-solid" placeholder="Pote" value="<?php echo $info_sala->ca_porcentaje_pote_tablazo; ?>"> 
                                           </div>
                                          </div>




                                                 </div>


                                             </div>


    </div>
    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
        
            <div class="row">
            <div class="col-lg-6">

            <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Anuncio 1:</label>
           <div class="col-9">
            <textarea class="form-control form-control-solid" id="nb_anuncio_uno" maxlength="50"  name="nb_anuncio_uno" placeholder="Anuncio 1"><?php echo $info_sala->nb_anuncio_uno; ?></textarea>
           </div>
          </div>


            </div>
            <div class="col-lg-6">

            <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Marcas:</label>
           <div class="col-9">
            <textarea class="form-control form-control-solid" id="nb_anuncio_dos" maxlength="50" name="nb_anuncio_dos" placeholder="Anuncio 2"> <?php echo $info_sala->nb_anuncio_dos; ?></textarea>
           </div>
          </div>

                                <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Publicitar evento:</label>
           <div class="col-9">
            <select class="form-control" id="tx_publicidad_sala_ubicacion" name="tx_publicidad_sala_ubicacion">
            <option value="NINGUNO">NINGUNO</option>
            <option value="INICIO">INICIO</option>
          </select> 
           </div>
          </div>



            </div>
            </div>

    </div>

</div>
    </div>


                                           </div>


                                             </div>
                                             </form>
                                             
   
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
   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');
   })
   

   }); // Fin ready
   


var co_sala = '<?php echo $info_sala->id; ?>';

      $(document).ready(function(){

        $('#nb_anuncio_uno').maxlength({
            threshold: 50
        });

                $('#nb_anuncio_dos').maxlength({
            threshold: 50
        });


                 }); // Fin ready

  $('#nb_modo_juego').val('<?php echo $info_sala->nb_modo_juego; ?>'); 
  $('#nb_tipo_carrera').val('<?php echo $info_sala->nb_tipo_carrera; ?>'); 
  $('#nb_estatus').val('<?php echo $info_sala->nb_estatus; ?>'); 
  $('#nb_sede').val('<?php echo $info_sala->nb_sede; ?>'); 
  $('#tx_publicidad_sala_ubicacion').val('<?php echo $info_sala->tx_publicidad_sala_ubicacion; ?>'); 


   function ejecutar_editar_carrera_caballo()
   {
                  
                  var nu_carrera = $('#nu_carrera').val();
                  var nb_sede = $('#nb_sede').val();
                  var ca_minutos_cierre = $('#ca_minutos_cierre').val();
                  var nb_modo_juego = $('#nb_modo_juego').val();
                  var nb_tipo_carrera = $('#nb_tipo_carrera').val();
                  var nu_distancia = $('#nu_distancia').val(); 
                  var nb_estatus = $('#nb_estatus').val();

                var ca_pote_tablazo = $('#ca_pote_tablazo').val();
                var ca_pote = $('#ca_pote').val();
                var ca_porcentaje_pote_tablazo = $('#ca_porcentaje_pote_tablazo').val();
                var nb_anuncio_uno = $('#nb_anuncio_uno').val();
                var nb_anuncio_dos = $('#nb_anuncio_dos').val();
                var tx_publicidad_sala_ubicacion = $('#tx_publicidad_sala_ubicacion').val();
                  


             
         if (nu_carrera == '') {
   
          toastr.error("Ingrese el numero de carrera", 'Error');
           $('#nu_carrera').focus();
            return;
   
       };




            var data = new FormData();

            data.append('co_sala', co_sala);
            data.append('nu_carrera', nu_carrera);
            data.append('nb_sede', nb_sede);
            data.append('ca_minutos_cierre', ca_minutos_cierre);
            data.append('nb_modo_juego', nb_modo_juego);
            data.append('nb_tipo_carrera', nb_tipo_carrera);
            data.append('nu_distancia', nu_distancia);
            data.append('nb_estatus', nb_estatus);

            data.append('nb_estatus_actual', '<?php echo $info_sala->nb_estatus; ?>');

            data.append('ca_pote_tablazo', ca_pote_tablazo);
            data.append('ca_pote', ca_pote);
            data.append('ca_porcentaje_pote_tablazo', ca_porcentaje_pote_tablazo);

            data.append('nb_anuncio_uno', nb_anuncio_uno);
            data.append('nb_anuncio_dos', nb_anuncio_dos);
            data.append('tx_publicidad_sala_ubicacion', tx_publicidad_sala_ubicacion);

            var url = "<?php echo site_url('carrera_caballo/ejecutar_editar_carrera_caballo') ?>";

            KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.2,
              state: 'primary' // a bootstrap color
             });


                $.ajax({
                url:url,
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false}).done(function( data ) { 
                    KTApp.unblockPage();
                   var obj = JSON.parse(data);



                       if (obj.error == 0) {

                     $(location).attr('href',"<?php echo site_url() ?>carrera_caballo/index");
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   

   
                                   function abrir_modal() {


                            $.get("<?php echo site_url('carrera_caballo/nuevo_ejemplar_editando/') ?>" + co_sala,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }

                            


               function agregar_sede_abrir_modal() {


        $.get("<?php echo site_url('carrera_caballo/agregar_sede') ?>",
        function(data){
        if (data != "") {
            $('#ajax_remote').modal('show');
            $('#ajax_remote .modal-content').html(data);
        }            
                  }

        );  

        
        }



                                   function editar_ejemplar_modal(co_sala_linea) {


                            $.get("<?php echo site_url('carrera_caballo/editar_ejemplar/') ?>" + co_sala_linea,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


                        function elegir_ganador() {

                            $.get("<?php echo site_url('carrera_caballo/elegir_ganador/') ?>" + co_sala,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }




                 
      function eliminar_ejemplar(co_sala_linea)
   {
   
                                                 $.ajax({
   method: "POST",
   data: {'co_sala_linea':co_sala_linea},
   url: "<?php echo site_url('carrera_caballo/eliminar_competidor') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 
   
               $("#reload_sala_linea").load('<?php echo site_url('carrera_caballo/reload_linea_sala/') ?>' + co_sala);
   

                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
      
      
   
   }

         function retirar_caballo(co_sala_linea)
   {
   
                                                 $.ajax({
   method: "POST",
   data: {'co_sala_linea':co_sala_linea},
   url: "<?php echo site_url('carrera_caballo/retirar_caballo') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 
   
               $("#reload_sala_linea").load('<?php echo site_url('carrera_caballo/reload_linea_sala/') ?>' + co_sala);
   

                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
      
      
   
   }
   

            function cambiar_estatus(nb_estatus)
   {

                KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.2,
              state: 'primary' // a bootstrap color
             });
   
     $.ajax({
   method: "POST",
   data: {'nb_estatus':nb_estatus, 'co_sala':co_sala},
   url: "<?php echo site_url('carrera_caballo/cambiar_estatus_carrera') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 

                    KTApp.unblockPage();
   
                 var obj = JSON.parse(data);


                      if (obj.error == 0) {

                     location.reload();
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }

   

                 }).fail(function(){
        
                KTApp.unblockPage();
               alert('Fallo');
   
   
                 }); 
      
      
   
   }


      function eliminar_carrera_caballo()
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar',
   content: '¿Estas seguro que deseas eliminar esta sala?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
            $.ajax({
   method: "POST",
   data: {'co_sala':co_sala},
   url: "<?php echo site_url('carrera_caballo/eliminar_carrera_caballo') ?>",
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              $(location).attr('href',"<?php echo site_url() ?>carrera_caballo/index");
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });

   
   
   }


      function duplicar_registro()
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Duplicar',
   content: '¿Estas seguro que deseas duplicar esta sala?.',
   type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
            $.ajax({
   method: "POST",
   data: {'co_sala':co_sala},
   url: "<?php echo site_url('carrera_caballo/duplicar_registro') ?>",
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              $(location).attr('href',"<?php echo site_url() ?>carrera_caballo/editar_carrera/" + obj.message);
   
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


