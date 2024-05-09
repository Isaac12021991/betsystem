
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Configuracion de la casa</h5>
                                    
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

                                <a onclick="editar_partner_configuracion()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            Crear
                                            <small>Nuevo</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Nombre:</label>
                                               <div class="col-9">
                                             <select id="nb_partner_configuracion" name="nb_partner_configuracion" class="form-control input-sm">
                                              <option value="REGLAMENTOS">REGLAMENTOS</option>
                                              <option value="CONDICIONES">CONDICIONES</option>
                                              <option value="GACETA">GACETA</option>
                                           </select>
                                               </div>
                                              </div>


                                          <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Sala:</label>
                                               <div class="col-9">

                                          <select class="form-control form-control-solid" id="co_sala" name="co_sala">
                                    <option value="0">Ninguno:</option>
                                   <?php foreach($sala->result() as $row){
                                    echo "<option value='".$row->id."'>".$row->nb_sede.' Carrera:'.$row->nu_carrera."</option>";
                                    } ?>
                                    </select>


                                               </div>
                                              </div>




                                          </div>

                                           <div class="col-lg-6">

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Link de acceso:</label>
                                               <div class="col-9">
                                                <textarea cols="4" id="tx_link" name="tx_link" class="form-control"><?php echo $info_partner_configuracion->tx_link; ?></textarea>
                                               </div>
                                              </div>

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Hipodromo:</label>
                                               <div class="col-9">

                                                    <select class="form-control" id="nb_sede" name="nb_sede">
                                                        <option value="">Ninguno:</option>
                                                    <?php foreach($sede->result() as $row){
                                                    echo "<option value='".$row->nb_sede."'>".$row->nb_sede."</option>";
                                                    } ?>
                                                    </select>  


                                               </div>
                                              </div>

                                           </div>
                                           </div>


                                                <div class="row">

                                                 <div class="col-lg-12">


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Descripcion:</label>
                                               <div class="col-9">
                                                 <textarea class="form-control form-control-solid" maxlength="500" id="tx_descripcion" name="tx_descripcion" placeholder="Descripcion"><?php echo $info_partner_configuracion->tx_descripcion; ?></textarea>
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

        $('#nb_partner_configuracion').val('<?php echo $info_partner_configuracion->nb_partner_configuracion; ?>');
         $('#co_sala').val('<?php echo $info_partner_configuracion->co_sala; ?>');

      $(document).ready(function(){

        $('#tx_direccion').maxlength({
            threshold: 160
        });



                 }); // Fin ready



  function editar_partner_configuracion()
   {    
        var co_partner_configuracion = '<?php echo $co_partner_configuracion; ?>'; 
       var nb_partner_configuracion = $('#nb_partner_configuracion').val();
       var tx_descripcion = $('#tx_descripcion').val(); 
       var tx_link = $('#tx_link').val();
       var nb_sede = $('#nb_sede').val();
        var co_sala = $('#co_sala').val();
   
         
   if (nb_partner_configuracion == '') {

            toastr.error("Ingrese el nombre de la configuracion", 'Error');
           return;
   
   };
   
   
   
   
                            $.ajax({
     method: "POST",
     data: {'co_partner_configuracion':co_partner_configuracion, 'nb_partner_configuracion':nb_partner_configuracion, 'tx_descripcion':tx_descripcion, 'tx_link':tx_link, 'nb_sede':nb_sede, 'co_sala':co_sala},
     url: "<?php echo site_url('partner_configuracion/write_partner_configuracion') ?>",
                  }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
   
                   if (obj.error > 0)
   
                   {
   
                     alert(obj.message);
                     return;
   
   
                   }else{
   
                 $(location).attr('href',"<?php echo site_url() ?>partner_configuracion/index"); 
   
   
   
                   }
   
   
   
                   }).fail(function(){
   
                 alert('Fallo');
   
   
                   }); 
   
   
   
   }
   

   
                                      
</script>


