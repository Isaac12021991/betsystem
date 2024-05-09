
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Taquillas</h5>
                                    
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

                                <a onclick="editar_taquilla()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            <small>Editar taquilla</small>
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
                                                <input type="text" name="nb_taquilla" id="nb_taquilla" class="form-control form-control-solid" placeholder="Nombre" value="<?php echo $info_taquilla->nb_taquilla; ?>"> 
                                               </div>
                                              </div>


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Usuario:</label>
                                               <div class="col-9">

                                             <select id="co_usuario" name="co_usuario" class="form-control">
                                                    <?php foreach ($list_usuario->result() as $row): ?>
                                                      <option value="<?php echo $row->co_usuario; ?>"><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></option>
                                                    <?php endforeach ?>
                                                   </select>

                                               </div>
                                              </div>


                                          </div>

                                           <div class="col-lg-6">

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Descripcion:</label>
                                               <div class="col-9">
                                                <textarea cols="4" id="tx_descripcion" name="tx_descripcion" class="form-control" maxlength="160"><?php echo $info_taquilla->tx_descripcion; ?></textarea>
                                               </div>
                                              </div>

                                           </div>

                                                     <div class="col-lg-6">

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Porcentaje:</label>
                                               <div class="col-9">
                                                <input type="number" name="ca_porcentaje" id="ca_porcentaje" class="form-control form-control-solid" placeholder="Porcentaje" value="<?php echo $info_taquilla->ca_porcentaje * 100; ?>"> 
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

    $('#co_usuario').val('<?php echo $info_taquilla->co_usuario; ?>');

      $(document).ready(function(){

        $('#tx_descripcion').maxlength({
            threshold: 160
        });



                 }); // Fin ready



   
   function editar_taquilla()
   {    
       var co_taquilla = '<?php echo $co_taquilla; ?>';
       var nb_taquilla = $('#nb_taquilla').val();
       var tx_descripcion = $('#tx_descripcion').val(); 
       var ca_porcentaje = $('#ca_porcentaje').val();
       var co_usuario = $('#co_usuario').val();
   
         
   if (nb_taquilla == '') {
   

  
            toastr.error("Ingrese el nombre del taquilla", 'Error');
           return;
   
   };
   
   
   
   
                            $.ajax({
     method: "POST",
     data: {'co_taquilla':co_taquilla,'nb_taquilla':nb_taquilla, 'tx_descripcion':tx_descripcion, 'co_usuario':co_usuario, 'ca_porcentaje':ca_porcentaje},
     url: "<?php echo site_url('taquilla/write_taquilla') ?>",
                  }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
   
                   if (obj.error > 0)
   
                   {
   
                     alert(obj.message);
                     return;
   
   
                   }else{
   
                 $(location).attr('href',"<?php echo site_url() ?>taquilla/index"); 
   
   
   
                   }
   
   
   
                   }).fail(function(){
   
                 alert('Fallo');
   
   
                   }); 
   
   
   
   }
   

   
   
                                
</script>



