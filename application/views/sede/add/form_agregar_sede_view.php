
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Hipodromos</h5>
                                    
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

                                <a onclick="agregar_sede()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            <small>Crear sede</small>
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
                                                <input type="text" name="nb_sede" id="nb_sede" class="form-control form-control-solid" placeholder="Nombre" value=""> 
                                               </div>
                                              </div>

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Descripcion:</label>
                                               <div class="col-9">
                                                 <textarea class="form-control form-control-solid" maxlength="160" id="tx_descripcion" name="tx_descripcion" placeholder="Descripcion"></textarea>
                                               </div>
                                              </div>

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Sincronizar Webservice:</label>
                                               <div class="col-9">
                                                <select id="in_webservice" name="in_webservice" class="form-control">
                                                    <option value="NO">NO</option>
                                                    <option value="SI">SI</option>
                                                </select>
                                               </div>
                                              </div>


                                          </div>

                                           <div class="col-lg-6">

                                <div class="form-group row mb-2">
                                     <label  class="col-3 col-form-label">Imagen:</label>

                                   <div class="col-9">
                                        <div class="image-input image-input-outline" id="kt_image_1">
                                    <div class="image-input-wrapper" style="background-image: url('<?php echo base_url(); ?>img/producto_publicaciones/producto-sin-imagen.jpg');"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Cambiar imagen">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="nb_url_foto" id="nb_url_foto" accept=".png, .jpg, .jpeg">

                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancelar foto">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
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



<script type="text/javascript">


      $(document).ready(function(){

        $('#tx_descripcion').maxlength({
            threshold: 160
        });



                 }); // Fin ready



   function agregar_sede()
   {

          var nb_sede = $('#nb_sede').val();
          var tx_descripcion = $('#tx_descripcion').val();
          var in_webservice = $('#in_webservice').val();



             
         if (nb_sede == '') {
   
          toastr.error("Ingrese el nombre de la sede", 'Error');
           $('#nb_sede').focus();
            return;
   
       };



            var file = nb_url_foto.files[0];

            var data = new FormData();

            data.append('mi_archivo', file);
            data.append('nb_sede', nb_sede);
            data.append('tx_descripcion', tx_descripcion);
            data.append('in_webservice', in_webservice);

            var url = "<?php echo site_url('sede/guardar_nuevo_sede') ?>";

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

                     $(location).attr('href',"<?php echo site_url() ?>sede/index");
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   


   
                                      
</script>


