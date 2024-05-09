
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Contacto</h5>
                                    
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted">Nuevo contacto</a>
                                            </li>
                                        </ul>

                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                <a onclick="agregar_contacto()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            <small>Nuevo contacto</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-lg-3 col-form-label">Seudonimo:</label>
                                               <div class="col-lg-9">
                                                <input type="text" name="username" id="username" class="form-control form-control-solid" placeholder="Seudonimo" value=""> 
                                               </div>
                                              </div>

                                               <div class="form-group row mb-2">
                                               <label  class="col-lg-3 col-form-label">Nombre:</label>
                                               <div class="col-lg-9">
                                                <input type="text" name="nb_nombre" id="nb_nombre" class="form-control form-control-solid" placeholder="Nombre" value=""> 
                                               </div>
                                              </div>

                                              <div class="form-group row mb-2">
                                               <label  class="col-lg-3 col-form-label">Apellido:</label>
                                               <div class="col-lg-9">
                                            <input type="text" name="nb_apellido" id="nb_apellido" class="form-control" placeholder="Apellido" value=""> 
                                               </div>
                                              </div>


                                          </div>

                                           <div class="col-lg-6">

                                                <div class="form-group row mb-2">
                                               <label  class="col-lg-3 col-form-label">Celular:</label>
                                               <div class="col-lg-9">
                                                <input type="text" name="nu_telefono_celular" id="nu_telefono_celular" class="form-control" placeholder="Celular" value=""> 
                                               </div>
                                              </div>
                                                

                                            <div class="form-group row mb-2">
                                               <label  class="col-lg-3 col-form-label">Email:</label>
                                               <div class="col-lg-9">
                                                 <input type="text" name="tx_email" id="tx_email" class="form-control" placeholder="Email" value="">
                                               </div>
                                              </div>

                                             <div class="form-group row mb-2">
                                               <label  class="col-lg-3 col-form-label">Descripcion:</label>
                                               <div class="col-lg-9">
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



  function agregar_contacto()
   {    
       var username = $('#username').val();
       var nb_nombre = $('#nb_nombre').val();
       var nb_apellido = $('#nb_apellido').val();
       var nu_telefono_celular = $('#nu_telefono_celular').val();
       var tx_email = $('#tx_email').val(); 
       var tx_descripcion = $('#tx_descripcion').val();


   if (username == '') {

            toastr.error("Ingrese el seudonimo unico del usuario", 'Error');
           return;
   
   };
   
         
   if (nb_nombre == '') {

            toastr.error("Ingrese el nombre del contacto", 'Error');
           return;
   
   };
   
   
   
   
                            $.ajax({
     method: "POST",
     data: {'username':username, 'nb_nombre':nb_nombre, 'nb_apellido':nb_apellido, 'nu_telefono_celular':nu_telefono_celular, 'tx_email':tx_email, 'tx_descripcion':tx_descripcion},
     url: "<?php echo site_url('chats/guardar_nuevo_contacto') ?>",
                  }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
   
                   if (obj.error > 0)
   
                   {
   
                     alert(obj.message);
                     return;
   
   
                   }else{
   
                 $(location).attr('href',"<?php echo site_url() ?>chats/contactos"); 
   
   
   
                   }
   
   
   
                   }).fail(function(){
   
                 alert('Fallo');
   
   
                   }); 
   
   
   
   }
   

   
                                      
</script>


