
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Entidades bancarias</h5>
                                    
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

                                <a onclick="agregar_banco()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            <small>Crear entidad</small>
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
                                                <input type="text" name="nb_banco" id="nb_banco" class="form-control form-control-solid" placeholder="Nombre" value=""> 
                                               </div>
                                              </div>

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Codigo de identificacion:</label>
                                               <div class="col-9">
                                                 <textarea class="form-control form-control-solid" maxlength="50" id="tx_co_banco" name="tx_co_banco" placeholder="Codigo de identificacion"></textarea>
                                               </div>
                                              </div>


                                          </div>

                                           <div class="col-lg-6">

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Direccion:</label>
                                               <div class="col-9">
                                                <textarea cols="4" id="tx_direccion" name="tx_direccion" class="form-control" maxlength="160"></textarea>
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

        $('#tx_direccion').maxlength({
            threshold: 160
        });



                 }); // Fin ready



  function agregar_banco()
   {
       var nb_banco = $('#nb_banco').val();
       var tx_direccion = $('#tx_direccion').val(); 
       var tx_co_banco = $('#tx_co_banco').val();
   
         
   if (nb_banco == '') {

            toastr.error("Ingrese el nombre del banco", 'Error');
           return;
   
   };
   
   
   
   
                            $.ajax({
     method: "POST",
     data: {'nb_banco':nb_banco, 'tx_direccion':tx_direccion, 'tx_co_banco':tx_co_banco},
     url: "<?php echo site_url('entidad_monetaria/guardar_nuevo_banco') ?>",
                  }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
   
                   if (obj.error > 0)
   
                   {
   
                     alert(obj.message);
                     return;
   
   
                   }else{
   
                 $(location).attr('href',"<?php echo site_url() ?>entidad_monetaria/index"); 
   
   
   
                   }
   
   
   
                   }).fail(function(){
   
                 alert('Fallo');
   
   
                   }); 
   
   
   
   }
   

   
                                      
</script>


