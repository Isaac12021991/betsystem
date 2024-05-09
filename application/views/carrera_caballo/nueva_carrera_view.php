
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
                                                <a href="" class="text-muted">Crear</a>
                                            </li>
                                        </ul>

                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                    
                                <a onclick="agregar_carrera_caballo()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

                                <a href="javascript:window.history.back();" class="btn btn-clean font-weight-bolder btn-sm mr-2">Descartar</a>
                                

                                    
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
                                            Nuevo
                                            <small>Nueva carrera</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Carrera Nro:</label>
                                               <div class="col-9">
                                                <input type="text" name="nu_carrera" id="nu_carrera" class="form-control form-control-solid" placeholder="Carrera" value=""> 
                                               </div>
                                              </div>
                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Hipodromo:</label>
                                               <div class="col-9">

                                                <div class="input-group">
                                                    <select class="form-control" id="nb_sede" name="nb_sede" onchange="buscar_acumulado_pote_pablazo()">
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
                                            <input type="number" name="ca_minutos_cierre" id="ca_minutos_cierre" class="form-control form-control-solid" placeholder="Minutos" value="0"> 
                                               </div>
                                              </div>


                                        <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Estatus:</label>
                                               <div class="col-9">
                                            <select class="form-control" id="nb_estatus" name="nb_estatus">
                                                <option value="ABIERTO">ABIERTO</option>
                                                <option value="EN ESPERA">EN ESPERA</option>
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
                                                <option value="Dual">Dual</option>
                                              </select>  
                                               </div>
                                              </div>

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Tipo de Carrea:</label>
                                               <div class="col-9">
                                                <select class="form-control" id="nb_tipo_carrera" name="nb_tipo_carrera">
                                                <option value="Nacional">Nacional</option>
                                                <option value="Internacional">Internacional</option>
                                              </select>  
                                               </div>
                                              </div>

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Distancia:</label>
                                               <div class="col-9">
                                                  <input type="text" name="nu_distancia" id="nu_distancia" class="form-control" autocomplete="off" placeholder="Distancia" value="">
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

                                                    <div id="reload_tmp_competidor">
                                                        
                                                    </div>

                                                 </div>


                                             </div>

                                             <a href="javascript:" onclick="abrir_modal()" class="btn btn-light-dark font-weight-bold">Agregar</a>




    </div>

    <div class="tab-pane fade" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
                                                    <div class="row">
                                                 <div class="col-lg-6">


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Pote:</label>
                                               <div class="col-9">
                                                 <input type="number" name="ca_pote" id="ca_pote" class="form-control form-control-solid" placeholder="Pote" value="0">
                                                 
                                               </div>
                                              </div>
 


                                                 </div>
                                                 <div class="col-lg-6">

                                        <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Pote tablazo:</label>
                                           <div class="col-9">
                                             <input type="number" name="ca_pote_tablazo" id="ca_pote_tablazo" class="form-control form-control-solid" placeholder="Pote" value="0">
                                             <span class="form-text text-dark" id="acumulado_pote_tablazo"></span>  
                                           </div>
                                          </div>

                                                                                  <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">% Pote tablazo:</label>
                                           <div class="col-9">
                                             <input type="number" name="ca_porcentaje_pote_tablazo" id="ca_porcentaje_pote_tablazo" class="form-control form-control-solid" placeholder="Pote" value="0"> 
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
            <textarea class="form-control form-control-solid" id="nb_anuncio_uno" maxlength="50" name="nb_anuncio_uno" placeholder="Anuncio 1"></textarea>
           </div>
          </div>


            </div>
            <div class="col-lg-6">

            <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Marcas:</label>
           <div class="col-9">
            <textarea class="form-control form-control-solid" id="nb_anuncio_dos" maxlength="50" name="nb_anuncio_dos" placeholder="Anuncio 2"></textarea>
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
    $("#reload_tmp_competidor").load('<?php echo site_url('carrera_caballo/reload_leer_tmp_competidor') ?>');

      $(document).ready(function(){

        $('#nb_anuncio_uno').maxlength({
            threshold: 50
        });

                $('#nb_anuncio_dos').maxlength({
            threshold: 50
        });


                 }); // Fin ready



   function agregar_carrera_caballo()
   {

                  var nu_carrera = $('#nu_carrera').val();
                  var nb_sede = $('#nb_sede').val();
                  var ca_minutos_cierre = $('#ca_minutos_cierre').val();
                  var nb_modo_juego = $('#nb_modo_juego').val();
                  var nb_tipo_carrera = $('#nb_tipo_carrera').val();
                  var tx_descripcion = $('#tx_descripcion').val();
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

            data.append('nu_carrera', nu_carrera);
            data.append('nb_sede', nb_sede);
            data.append('ca_minutos_cierre', ca_minutos_cierre);
            data.append('nb_modo_juego', nb_modo_juego);
            data.append('nb_tipo_carrera', nb_tipo_carrera);
            data.append('nu_distancia', nu_distancia);
            data.append('nb_estatus', nb_estatus);

            data.append('ca_pote_tablazo', ca_pote_tablazo);
            data.append('ca_pote', ca_pote);
            data.append('ca_porcentaje_pote_tablazo', ca_porcentaje_pote_tablazo);

            data.append('nb_anuncio_uno', nb_anuncio_uno);
            data.append('nb_anuncio_dos', nb_anuncio_dos);
            data.append('tx_publicidad_sala_ubicacion', tx_publicidad_sala_ubicacion);
            

            var url = "<?php echo site_url('carrera_caballo/agregar_carrera_caballo') ?>";

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


                            $.get("<?php echo site_url('carrera_caballo/nuevo_ejemplar') ?>",
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



                 
      function eliminar_ejemplar(co_temp)
   {
   
                                                 $.ajax({
   method: "POST",
   data: {'co_temp':co_temp},
   url: "<?php echo site_url('carrera_caballo/eliminar_tmp_competidor') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 
   
               $("#reload_tmp_competidor").load('<?php echo site_url('carrera_caballo/reload_leer_tmp_competidor') ?>');
   

                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
      
      
   
   }


      function buscar_acumulado_pote_pablazo()
   {
   
   var nb_sede = $('#nb_sede').val();
            

    $.ajax({
   method: "POST",
   data: {'nb_sede':nb_sede},
   url: "<?php echo site_url('carrera_caballo/buscar_acumulado_pote_pablazo') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 
                
               $("#acumulado_pote_tablazo").html('Acumulado: '+data);
               $('#ca_pote_tablazo').val(parseInt(data));
   

                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
      
      
   
   }



                                      
</script>


