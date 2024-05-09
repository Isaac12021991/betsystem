
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
                <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url(<?php echo base_url() ?>assets/media/bg/bg-4.jpg);">
                    <!--begin: Aside Container-->
                    <div class="d-flex flex-row-fluid flex-column justify-content-between">
                        <!--begin: Aside header-->
                        <a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
                            <img src="<?php echo base_url() ?>assets/media/logos/logo-letter-1.png" class="max-h-70px" alt="" />
                        </a>
                        <!--end: Aside header-->
                        <!--begin: Aside content-->
                        <div class="flex-column-fluid d-flex flex-column justify-content-center">
                            <h3 class="font-size-h1 mb-5 text-white">Bienvenido a <?php echo $info_empresa_partner->nb_empresa; ?></h3>
                            <p class="font-weight-lighter text-white opacity-80"></p>
                        </div>
                        <!--end: Aside content-->
                        <!--begin: Aside footer for desktop-->
                        <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                            <div class="opacity-70 font-weight-bold text-white"><?php echo $info_empresa_partner->nb_empresa; ?></div>
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
                                <h3 class="font-size-h1">Registro Exitoso</h3>
                                <p class="text-muted font-weight-bold">Bienvenido</p>
                            </div>
                            <!--begin::Form-->
                             <form class="form" id="kt_login_signup_form">
                                <p>Felicidades <b><?php echo $this->ion_auth->get_nombres();?></b>,  Se ha registrado exitosamente, se ha enviado
                                    un enlace de verificación a <b><?php echo $this->ion_auth->get_email();?></b> para certificar su cuenta.</p>

                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <a href="<?php echo site_url('inicio/index')?>" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Ingresar a la plataforma</a>
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


        <!--end::Page Scripts-->
    </body>
    <!--end::Body-->
</html>