<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">


 <!--begin::Form-->
 <form>

    <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Nombre</label>
    <div class="col-9">
    <input type="text" name="first_name" id="first_name" class="form-control input-sm input-lg" maxlength="50" placeholder="Nombre" autofocus="autofocus" value="<?php echo $info_usuario->first_name; ?>">
    </div>
   </div>
   <div class="form-group row">
    <label for="example-search-input" class="col-3 col-form-label">Apellido</label>
    <div class="col-9">
     <input type="text" name="last_name" id="last_name" maxlength="50" class="form-control input-sm input-lg" placeholder="Apellido" value="<?php echo $info_usuario->last_name; ?>">
    </div>
   </div>
</div>

 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

   <div class="form-group row">
    <label for="example-email-input" class="col-3 col-form-label">Email</label>
    <div class="col-9">
    <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email" maxlength="50" value="<?php echo $info_usuario->email; ?>">
    </div>
   </div>


   <div class="form-group row">
    <label for="example-email-input" class="col-3 col-form-label">Celular</label>
    <div class="col-9">
    <input type="text" name="phone" id="phone" class="form-control" placeholder="Celular" maxlength="30" value="<?php echo $info_usuario->phone; ?>">
    </div>
   </div>


   <div class="form-group row">
    <label for="example-url-input" class="col-3 col-form-label">Ident</label>
    <div class="col-9">
     <input type="text" name="nu_cedula" id="nu_cedula" class="form-control input-sm input-medium" maxlength="15" placeholder="Cedula" maxlength="10" value="<?php echo $info_usuario->nu_cedula; ?>">
    </div>
   </div>

</div>

</div>






 </form>




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a id="actualizar_usuario" class="btn btn-light-primary font-weight-bold mr-2">Guardar</a>

            </div>




  <script type="text/javascript">



 $('#actualizar_usuario').click(function(){

              var email = $('#email').val(); 
              var nu_cedula = $('#nu_cedula').val(); 
               var first_name = $('#first_name').val(); 
               var last_name = $('#last_name').val();
               var phone = $('#phone').val();


      if (email == '') {
         toastr.error('Ingrese el email', 'Error');
         $('#email').focus();
         return;

    };

    if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {

      toastr.error('Ingrese el email valido', 'Error');
       $('#email').focus();
       return;
    }

          
      if (nu_cedula == '') {

          toastr.error('Ingrese una identificacion', 'Error');
         $('#nu_cedula').focus();
         return;

    };

          if (first_name == '') {

         toastr.error('Ingrese un nombre', 'Error');
         $('#first_name').focus();
         return;

    };

              if (last_name == '') {

         toastr.error('Ingrese un apellido', 'Error');
         $('#last_name').focus();
         return;

    };

                if (nu_cedula % 1 != 0){

         toastr.error('Ingrese una identificacion valida', 'Error');
         $('#nu_cedula').focus();
         return;
        }


          if ($('#nu_cedula').val() <= 0) {
         toastr.error('Ingrese una identificacion valida', 'Error');
         $('#nu_cedula').focus();
         return;
        }


       if ($('#password').val() != $('#password_repeat').val()) {

         toastr.error('Las contraseña no son iguales por favor verifique', 'Error');
         $('#password').focus();
         return;

       }

              if ($('#password').val() == '') {

         toastr.error('Ingrese una contraseña', 'Error');
         $('#password').focus();
         return;

       }



             $.ajax({
        method: "POST",
      data: {'email':email, 'nu_cedula':nu_cedula, 'first_name':first_name, 'last_name':last_name, 'phone':phone},
      url: "<?php echo site_url('cuenta/editar_cuenta_usuario') ?>",
        beforeSend: function(){ $('#actualizar_usuario').html('Actualizando...'); $('#actualizar_usuario').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        toastr.success(obj.message, 'Exito');

                        $('#actualizar_usuario').html('Acualizar');
                        $('#actualizar_usuario').attr("disabled", false);

                         location.reload();
                         $('#ajax_remote').modal('hide');

                       }else{

                        toastr.error(obj.message, 'Error');
                        $('#actualizar_usuario').html('Acualizar');
                        $('#actualizar_usuario').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){

                         toastr.error('Error del Servidor, Intente más tarde', 'Error');
                        $('#actualizar_usuario').html('Acualizar');
                        $('#actualizar_usuario').attr("disabled", false);
                         return;


                      }); 

   });


  </script>