
<!DOCTYPE html>
<?php $info_empresa_partner = $this->empresa_library->get_info_partner($co_partner); ?>

<html lang="es">
    <!--begin::Head-->
    <head><base href="../../../../">
        <meta charset="utf-8" />
        <title><?php echo $info_empresa_partner->nb_empresa; ?></title>
        <meta name="description" content="Es una plataforma que permite a las empresas del sector farmacéutico, Anunciar, Comprar, Vender productos a nivel nacional." />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="theme-color" content="#F0DB4F">
        <meta name="MobileOptimized" content="width">
        <meta name="HandheldFriendly" content="true">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <link rel="manifest" href="<?php echo base_url(); ?>/manifest.json">
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
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

                            <?php if($info_empresa_partner->nb_url_foto == ''): ?>
                           <span class="text-dark"> <?php echo $info_empresa_partner->nb_empresa; ?></span>
                        <?php else: ?> <img src="<?php echo $info_empresa_partner->nb_url_foto; ?>" class="max-h-70px" alt="" /> <?php endif; ?>
                          
                        </a>

 <?php     


 function getRemoteFile($url, $timeout = 3) {
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return ($file_contents) ? $file_contents : FALSE;
}

  $myfloat = 0;    $url = "http://www.bcv.org.ve/tasas-informativas-sistema-bancario";
    $file = getRemoteFile($url);

    if($file):

    $test = strip_tags($file);
    $posicion_coincidencia = strpos($test, 'USD'); $posicion_coincidencia += 6;
    $resultado = substr($test, $posicion_coincidencia, 80);
    $resp = str_replace(".", "", $resultado); $resp = str_replace(",", ".", $resp);
    $resp = trim($resp); $myfloat = (float) $resp; 

   endif; ?>

                        <!--end: Aside header-->
                        <!--begin: Aside content-->
                        <div class="flex-column-fluid d-flex flex-column justify-content-center">
                            <h3 class="font-size-h1 mb-5 text-dark">BIENVENIDO A <?php echo $info_empresa_partner->nb_empresa; ?></h3>
                            <h2 class="font-weight-lighter text-dark"> <b>Dolar BCV: <?php echo number_format($myfloat,2,',','.'); ?></b> </h2>
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
                        <a href='<?php echo site_url("cuenta/registrarse/$co_partner")?>' class="font-weight-bold font-size-h2 ml-2" style="color:#1BBD36;" id="kt_login_signup">Registrate!</a>
                    </div>
                    <!--end::Content header-->
                    <!--begin::Content body-->
                    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
                        <!--begin::Signin-->
                        <div class="login-form login-signin">
                            <div class="text-center mb-10 mb-lg-20">
                          <!--      <h3 class="font-size-h1">Acceder</h3>
                                <p class="text-muted font-weight-bold">Ingresa tu seudonimo y clave</p> -->
                                <span id="infoMessage"> <b><?php echo $message;?></b></span> 
                            </div>
                            <!--begin::Form-->
                                 <?php echo form_open("auth/login/$co_partner");?>
                                <div class="form-group">
                                    <?php echo form_input($identity);?>
                                </div>
                                <div class="form-group">
                                   <?php echo form_password($password);?> 
                                </div>
                                <!--begin::Action-->
                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                    <a  class="text-dark-50 text-hover-primary my-3 mr-2" href="javascript:" id="kt_login_forgot" onclick="abrir_modal()"> ¿Olvido su clave? </a>
                                     <?php echo form_submit('submit', lang('login_submit_btn'), "class='btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4'");?>
                                </div>
                                <!--end::Action-->
                             <?php echo form_close();?>
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

                    <div class="modal fade"  id="ajax_remote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">

        </div>
    </div>
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

                if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('<?php echo base_url(); ?>/sw.js')
    .then(reg => console.log('Registro de SW exitoso', reg))
    .catch(err => console.warn('Error al tratar de registrar el sw', err))
}


                                   function abrir_modal() {


                            $.get("<?php echo site_url('cuenta/recuperar_password') ?>",
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


               $(document).ready(function () {
                   $("input:text:visible:first").focus();
               });
               
            </script>
        <!--end::Page Scripts-->
    </body>
    <!--end::Body-->
</html>