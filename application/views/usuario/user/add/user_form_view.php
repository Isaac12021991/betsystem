
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Usuarios</h5>
                                    
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

                                <a id="crear_usuario" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            <small>Crear usuario</small>
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
                                              <input type="text" name="first_name" id="first_name" class="form-control input-sm input-lg" maxlength="50" placeholder="Nombre" autofocus="autofocus">
                                               </div>
                                              </div>

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Apellido:</label>
                                               <div class="col-9">
                                                 <input type="text" name="last_name" id="last_name" maxlength="50" class="form-control input-sm input-lg" placeholder="Apellido">
                                               </div>
                                              </div>

                                                <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Limite por apuesta:</label>
                                               <div class="col-9">
                                                 <input type="number" name="ca_limite_apuesta" id="ca_limite_apuesta" maxlength="50" min="0" class="form-control" placeholder="Limite de la apuesta" value="0">
                                               </div>
                                              </div>

                                                                                            <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Contraseña:</label>
                                               <div class="col-9">
                                                   <input type="text" name="password" id="password" class="form-control" maxlength="15" placeholder="Password" maxlength="12">
                                               </div>
                                              </div>


                                          </div>

                                           <div class="col-lg-6">

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Email:</label>
                                               <div class="col-9">
                                               <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email" maxlength="50">
                                               </div>
                                              </div>


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Seudonimo:</label>
                                               <div class="col-9">
                                               <input type="text" name="username" id="username" class="form-control" placeholder="Seudonimo" maxlength="50" value="">
                                               </div>
                                              </div>

                                                                                           <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">N° de Cedula:</label>
                                               <div class="col-9">
                                               <input type="text" name="nu_cedula" id="nu_cedula" class="form-control input-sm input-medium" maxlength="15" placeholder="Cedula" maxlength="8">
                                               </div>
                                              </div>


                                                                                            <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Confirmar contraseña:</label>
                                               <div class="col-9">
                                                 <input type="text" name="password_repeat" id="password_repeat" class="form-control input-sm input-medium" maxlength="15" placeholder="Password" maxlength="12">
                                               </div>
                                              </div>

                                                 <div class="form-group row mb-2">

                                            <label class="col-3 col-form-label">Permisos</label>
                                            <div class="col-9">
                                            <select class="form-control input-sm js-example-basic-single" id="tx_permiso" name="tx_permiso" multiple="multiple">
                                               <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                               <option value="USUARIO">USUARIO</option>
                                                </select>  
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


    $('.js-example-basic-single').select2();

        $('#tx_direccion').maxlength({
            threshold: 160
        });



                 }); // Fin ready




 $('#crear_usuario').click(function(){

              var email = $('#email').val(); 
              var nu_cedula = $('#nu_cedula').val(); 
               var first_name = $('#first_name').val(); 
               var last_name = $('#last_name').val();
              var password_repeat = $('#password_repeat').val(); 
               var password = $('#password').val();
               var tx_permiso = $('#tx_permiso').val();

                var username = $('#username').val(); 
                var ca_limite_apuesta = $('#ca_limite_apuesta').val();


      if (email == '') {

         toastr.error("Ingrese el email", 'Error');
         $('#email').focus();
         return;

    };

          if (username == '') {

         toastr.error("Ingrese el Seudonimo", 'Error');
         $('#username').focus();
         return;

    };
          
          

          if (first_name == '') {

          toastr.error("Ingrese el nombre", 'Error');
         $('#first_name').focus();
         return;

    };

              if (last_name == '') {

          toastr.error("Ingrese el apellido", 'Error');
         $('#last_name').focus();
         return;

    };


                      if(password.length <= 4){

      toastr.error("Ingrese un minimo de 6 caracateres en su contraseña", 'Error');
      $('#nu_cedula').focus();
      return false;
    }


       if ($('#password').val() != $('#password_repeat').val()) {
          toastr.error("Las contraseña no son iguales porr favor verifique", 'Error');
         $('#password').focus();
         return;

       }

              if ($('#password').val() == '') {

         toastr.error("Ingrese una contraseña", 'Error');
         $('#password').focus();
         return;

       }


             $.ajax({
        method: "POST",
      data: {'email':email, 'nu_cedula':nu_cedula, 'first_name':first_name, 'last_name':last_name, 'password':password, 'tx_permiso':tx_permiso,'username':username, 'ca_limite_apuesta':ca_limite_apuesta},
      url: "<?php echo site_url('usuario/agregar_usuario_ejecutar') ?>",
        beforeSend: function(){ $('#crear_usuario').html('Creando usuario'); $('#crear_usuario').attr("disabled", true);},
                     }).done(function( data ) { 


                        var obj = JSON.parse(data);

                       if (obj.error == 0) {


                        $('#crear_usuario').html('Guardar');
                        $('#crear_usuario').attr("disabled", false);


                       $(location).attr('href',"<?php echo site_url() ?>usuario/users_index");
                         

                       }else{


                        toastr.error(obj.message, 'Error');
                        $('#crear_usuario').html('Guardar');
                        $('#crear_usuario').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){

                         toastr.error('Error del Servidor, Intente más tarde', 'Error');
                        $('#crear_usuario').html('Guardar');
                        $('#crear_usuario').attr("disabled", false);
                         return;


                      }); 

   });


  </script>