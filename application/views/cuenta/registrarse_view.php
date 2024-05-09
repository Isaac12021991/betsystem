
<!DOCTYPE html>
<?php $info_empresa_partner = $this->empresa_library->get_info_partner($co_partner); ?>

<html lang="es">
    <!--begin::Head-->
    <head><base href="../../../../">
        <meta charset="utf-8" />
        <title><?php echo $info_empresa_partner->nb_empresa; ?></title>
        <meta name="description" content="Apuesta." />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="theme-color" content="#F0DB4F">
        <meta name="MobileOptimized" content="width">
        <meta name="HandheldFriendly" content="true">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <link rel="manifest" href="<?php echo base_url(); ?>/manifest.json">
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <script src="<?php echo base_url(); ?>assets/plugins/custom/jquery/jquery-3.3.1.min.js"></script>
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo base_url() ?>assets/css/pages/login/classic/login-1.css" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url() ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <link href="<?php echo base_url() ?>assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/media/logos/favicon.ico" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
                <!--begin::Aside-->
                <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url(<?php echo base_url() ?>assets/media/bg/bg-3.jpg);">
                    <!--begin: Aside Container-->
                    <div class="d-flex flex-row-fluid flex-column justify-content-between">
                        <!--begin: Aside header-->
                        <a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
                           <img src="<?php echo $info_empresa_partner->nb_url_foto; ?>" class="max-h-70px" alt="" />
                        </a>
                        <!--end: Aside header-->
                        <!--begin: Aside content-->
                        <div class="flex-column-fluid d-flex flex-column justify-content-center">
                            <h3 class="font-size-h1 mb-5 text-dark">BIENVENIDO A <?php echo $info_empresa_partner->nb_empresa; ?></h3>
                            <p class="font-weight-lighter text-dark opacity-80"></p>
                        </div>
                        <!--end: Aside content-->
                        <!--begin: Aside footer for desktop-->
                        <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                            <div class="opacity-70 font-weight-bold text-dark"><?php echo $info_empresa_partner->nb_empresa; ?></div>
                        </div>
                        <!--end: Aside footer for desktop-->
                    </div>
                    <!--end: Aside Container-->
                </div>
                <!--begin::Aside-->
                <!--begin::Content-->
                <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
                    <!--begin::Content header-->
                    <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
                    </div>
                    <!--end::Content header-->
                    <!--begin::Content body-->
                    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
                        <!--begin::Signin-->
                        <div class="login-form">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="font-size-h1">Registrarse</h3>
                                <p class="text-muted font-weight-bold">Ingrese los datos de su nueva cuenta</p>
                            </div>
                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" id="kt_login_signup_form">
                                <div class="form-group">
                               <input type="text" name="first_name" id="first_name" class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" maxlength="50" placeholder="Nombre" autofocus="autofocus" value="">
                                </div>
                                <div class="form-group">
                                <input type="text" name="last_name" id="last_name" maxlength="50" autocomplete="off" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Apellido" value="">
                                </div>
                                <div class="form-group">
                                <input type="text" name="username" id="username" maxlength="15" autocomplete="off" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Seudonimo" value="">
                                </div>
                                <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" placeholder="Email" maxlength="50" value=""> 
                                </div>
                                 <div class="form-group">
                                      <input type="password" name="password" id="password"  class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" placeholder="Clave" maxlength="15" value=""> 
                                </div>

                                                                <div class="form-group">
                                          <input type="password" name="password_repeat" id="password_repeat" autocomplete="off" class="form-control h-auto form-control-solid py-4 px-8" maxlength="15" placeholder="Confirme la clave" maxlength="10">
                                </div>
                                <div class="form-group">
                                    <label class="checkbox mb-0">
                                     <input type="checkbox"  name="tnc" id="tnc" />
                                    <span></span>Estoy de acuerdo
                                     <a onclick="ver_terminos()" class="font-weight-bold ml-1">Terminos y condiciones del servicio </a>.</label>
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center">

                                     <a id="crear_usuario" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Aceptar</a>
                                      <a id="kt_login_signup_cancel"  href='<?php echo site_url("auth/login/$co_partner")?>' class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancelar</a>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signin-->

                        <!--end::Signup-->
                        <!--end::Forgot-->
                    </div>
                    <!--end::Content body-->
                    <!--begin::Content footer for mobile-->
                    <div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
                        <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2"><?php echo date('Y'); ?></div>
                        <div class="d-flex order-1 order-sm-2 my-2">
                        </div>
                    </div>
                    <!--end::Content footer for mobile-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->


        <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo base_url() ?>assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="<?php echo base_url() ?>assets/js/scripts.bundle.js"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="<?php echo base_url() ?>assets/js/pages/custom/login/login-general.js"></script>




            <script>
               $(document).ready(function () {
                   $("input:text:visible:first").focus();
               });
               
            </script>


  <script type="text/javascript">

    function ver_terminos() {

        window.open('<?php echo base_url() ?>archivos/politicas/Terminos Y Condiciones LatinClub.pdf', '_blank');

    }



 $('#crear_usuario').click(function(){
    
            var co_partner = '<?php echo $co_partner; ?>'; 
            var email = $('#email').val(); 
            var username = $('#username').val();
             var first_name = $('#first_name').val(); 
             var last_name = $('#last_name').val();
             var password_repeat = $('#password_repeat').val(); 
             var password = $('#password').val();
             

               if (username == '') {
         toastr.error('Ingrese un seudonimo', 'Error');
         $('#username').focus();
         return;

    };
    
    if(username.length <= 2){
      toastr.error('Ingrese un seudonimo válido y unico', 'Error');
      $('#username').focus();
      return false;
    }



      if (email == '') {
         toastr.error('Ingrese el email', 'Error');
         $('#email').focus();
         return;

    };

    if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {

      toastr.error('Ingrese un email válido', 'Error');
       $('#email').focus();
       return;
    }


          if (first_name == '') {

         toastr.error('Ingrese el nombre', 'Error');
         $('#first_name').focus();
         return;

    };

              if (last_name == '') {

         toastr.error('Ingrese el apellido', 'Error');
         $('#last_name').focus();
         return;

    };


              if(password.length <= 4){

      toastr.error('Ingrese un minimo de 6 caracateres en su contraseña', 'Error');
      $('#password').focus();
      return false;
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

if ($('#tnc').is(':checked') ) {
    console.log("De acuerdo con los terminos y condiciones");
}else{


         toastr.error('Para formar parte de esta plataforma debe estar de acuerdo con los terminos y condiciones', 'Error');
         return;


}

            KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.2,
              state: 'primary' // a bootstrap color
             });


             $.ajax({
        method: "POST",
      data: {'email':email, 'co_partner':co_partner, 'first_name':first_name, 'last_name':last_name, 'username':username, 'password':password},
      url: "<?php echo site_url('cuenta/agregar_usuario_ejecutar') ?>",
        beforeSend: function(){ $('#crear_usuario').html('Creando usuario...'); $('#crear_usuario').attr("disabled", true);},
                     }).done(function( data ) { 
                          KTApp.unblockPage();
                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        toastr.success(obj.message, 'Exito');

                        $('#crear_usuario').html('Aceptar');
                        $('#crear_usuario').attr("disabled", false);

                        $(location).attr('href',"<?php echo site_url() ?>cuenta/registro_exitoso"+"/"+co_partner); 

                       }else{

                        toastr.error(obj.message, 'Error');
                        $('#crear_usuario').html('Aceptar');
                        $('#crear_usuario').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){
                          KTApp.unblockPage();

                         toastr.error('Error del servidor', 'Error');
                        $('#crear_usuario').html('Aceptar');
                        $('#crear_usuario').attr("disabled", false);
                         return;


                      }); 

   });


  </script>
        <!--end::Page Scripts-->
    </body>
    <!--end::Body-->
</html>