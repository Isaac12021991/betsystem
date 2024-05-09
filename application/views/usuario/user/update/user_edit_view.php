
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
                                                <a href="" class="text-muted">Editar</a>
                                            </li>
                                        </ul>

                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                <a id="editar_usuario" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            <small>Editar usuario</small>
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
                                              <input type="text" name="first_name" id="first_name" class="form-control" maxlength="50" placeholder="Nombre" value="<?php echo $info_usuario->first_name ?>" autofocus="autofocus">
                                               </div>
                                              </div>

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Apellido:</label>
                                               <div class="col-9">
                                                 <input type="text" name="last_name" id="last_name" maxlength="50" class="form-control" placeholder="Apellido" value="<?php echo $info_usuario->last_name ?>">
                                               </div>
                                              </div>


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Limite por apuesta:</label>
                                               <div class="col-9">
                                                 <input type="number" name="ca_limite_apuesta" id="ca_limite_apuesta" maxlength="50" min="0" class="form-control" placeholder="Limite de la apuesta" value="<?php echo $info_usuario->ca_limite_apuesta ?>">
                                               </div>
                                              </div>


                                          </div>

                                           <div class="col-lg-6">

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Email:</label>
                                               <div class="col-9">
                                               <input type="text" name="email" id="email" class="form-control" placeholder="Email" maxlength="50" value="<?php echo $info_usuario->email ?>">
                                               </div>
                                              </div>

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Seudonimo:</label>
                                               <div class="col-9">
                                               <input type="text" name="username" id="username" class="form-control" placeholder="Seudonimo" maxlength="50" value="<?php echo $info_usuario->username; ?>">
                                               </div>
                                              </div>

                                                                                           <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">N° de Cedula:</label>
                                               <div class="col-9">
                                               <input type="text" name="nu_cedula" id="nu_cedula" class="form-control input-sm input-medium" maxlength="15" placeholder="Cedula" maxlength="8"  value="<?php echo $info_usuario->nu_cedula ?>">
                                               </div>
                                              </div>


                                                 <div class="form-group row mb-2">

                                            <label class="col-3 col-form-label">Permisos</label>
                                            <div class="col-9">

                     <?php $array_key = []; foreach ($tx_permiso->result() as $key) { 
                    array_push ($array_key, $key->tx_permiso);} 
                    ?>


            <select class="form-control input-sm js-example-basic-single" id="tx_permiso" name="tx_permiso" multiple="multiple">
           <option  <?php if (in_array("ADMINISTRADOR", $array_key)): ?> selected='selected' <?php endif; ?> value="ADMINISTRADOR">ADMINISTRADOR</option>
           <option  <?php if (in_array("USUARIO", $array_key)): ?> selected='selected' <?php endif; ?> value="USUARIO">USUARIO</option>
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




 $('#editar_usuario').click(function(){

              var email = $('#email').val(); 
              var nu_cedula = $('#nu_cedula').val(); 
               var first_name = $('#first_name').val(); 
               var last_name = $('#last_name').val();
                var username = $('#username').val(); 
                var ca_limite_apuesta = $('#ca_limite_apuesta').val();
               var tx_permiso = $('#tx_permiso').val();
                var co_usuario = <?php echo $co_usuario; ?>;
                var co_usuario_partner = '<?php echo $co_usuario_partner; ?>';

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


             $.ajax({
        method: "POST",
      data: {'co_usuario':co_usuario, 'email':email, 'nu_cedula':nu_cedula, 'first_name':first_name, 'last_name':last_name, 'tx_permiso':tx_permiso, 'co_usuario_partner':co_usuario_partner, 'username':username, 'ca_limite_apuesta':ca_limite_apuesta},
      url: "<?php echo site_url('usuario/editar_usuario_ejecutar') ?>",
        beforeSend: function(){ $('#crear_usuario').html('Creando usuario'); $('#crear_usuario').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {


                        $('#crear_usuario').html('Guardar');
                        $('#crear_usuario').attr("disabled", false);


                        toastr.success(obj.message, 'Actualizado');

                         

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