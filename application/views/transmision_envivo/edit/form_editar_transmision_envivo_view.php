
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Transmision en vivo</h5>
                                    
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

                                <a onclick="actualizar_transmision_envivo()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            Editar
                                            <small>Editar transmision en vivo</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Titulo:</label>
                                               <div class="col-9">
                                                <input type="text" name="nb_video" id="nb_video" class="form-control form-control-solid" placeholder="Titulo del video" value="<?php echo $info_transmision_envivo->nb_video; ?>"> 
                                               </div>
                                              </div>

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Origen:</label>
                                               <div class="col-9">
                                            <select class="form-control" id="nb_origen" name="nb_origen">
                                                <option value="YOUTUBE">YOUTUBE</option>
                                              </select>  
                                               </div>
                                              </div>

                                                                                            <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Sala:</label>
                                               <div class="col-9">
                                          <select class="form-control form-control-solid" id="co_sala" name="co_sala">
                                    <option value="0">Ninguno:</option>
                                   <?php foreach($sala->result() as $row){
                                    echo "<option value='".$row->id."'>".$row->nb_deporte.' '.$row->tx_descripcion."</option>";
                                    } ?>
                                    </select>
                                               </div>
                                              </div>

                                                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Sede:</label>
                                               <div class="col-9">
                                          <select class="form-control form-control-solid" id="nb_sede" name="nb_sede">
                                    <option value="">Ninguno:</option>
                                   <?php foreach($sede->result() as $row){
                                    echo "<option value='".$row->nb_sede."'>".$row->nb_sede."</option>";
                                    } ?>
                                    </select>
                                               </div>
                                              </div>



                                          </div>


                               


                                                                            <div class="col-lg-6">

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Direccion del video:</label>
                                               <div class="col-9">
                                                <textarea cols="4" id="tx_src" name="tx_src" class="form-control"  placeholder="SRC"><?php echo $info_transmision_envivo->tx_src; ?></textarea>
                                               </div>
                                              </div>

                                                <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Descripcion:</label>
                                               <div class="col-9">
                                                <textarea cols="4" id="tx_descripcion" name="tx_descripcion" class="form-control" maxlength="160" placeholder="Descripcion del video"><?php echo $info_transmision_envivo->tx_descripcion; ?></textarea>
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



<script type="text/javascript">
    
    $('#co_sala').val('<?php echo $info_transmision_envivo->co_sala; ?>');
    $('#nb_sede').val('<?php echo $info_transmision_envivo->nb_sede; ?>');
    $('#nb_origen').val('<?php echo $info_transmision_envivo->nb_origen; ?>');

      $(document).ready(function(){

        $('#tx_descripcion').maxlength({
            threshold: 160
        });



                 }); // Fin ready



  function actualizar_transmision_envivo()
   {    
       var co_transmision_envivo = '<?php echo $co_transmision_envivo; ?>';
       var nb_video = $('#nb_video').val();
       var tx_descripcion = $('#tx_descripcion').val(); 
       var tx_src = $('#tx_src').val();
       var nb_origen = $('#nb_origen').val();
       var co_sala = $('#co_sala').val();
       var nb_sede = $('#nb_sede').val();
   
         
   if (nb_video == '') {

            toastr.error("Ingrese el titulo del video", 'Error');
           return;
   
   };

      if (tx_src == '') {

            toastr.error("Ingrese la direccion del video", 'Error');
           return;
   
   };
   
   
   
   
   
                            $.ajax({
     method: "POST",
     data: {'co_transmision_envivo':co_transmision_envivo, 'nb_video':nb_video, 'tx_descripcion':tx_descripcion, 'tx_src':tx_src, 'nb_origen':nb_origen, 'co_sala':co_sala, 'nb_sede':nb_sede},
     url: "<?php echo site_url('transmision_envivo/write_transmision_envivo') ?>",
                  }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
   
                   if (obj.error > 0)
   
                   {
   
                     alert(obj.message);
                     return;
   
   
                   }else{
   
                 $(location).attr('href',"<?php echo site_url() ?>transmision_envivo/index"); 
   
   
   
                   }
   
   
   
                   }).fail(function(){
   
                 alert('Fallo');
   
   
                   }); 
   
   
   
   }
   

   
                                      
</script>


