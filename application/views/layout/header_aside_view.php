<!DOCTYPE html>
<?php $info_partner_actual = $this->empresa_library->get_partner_actual(); ?>

<html lang="es">
    <!--begin::Head-->
    <head><base href="../../">
        <meta charset="utf-8" />
        <title><?php echo $info_partner_actual->nb_empresa; ?> | Inicio</title>
        <meta name="description" content="Apuesta" />
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
             <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/jquery-confirm/css/jquery-confirm.min.css">
        <!--end::Fonts-->
        <!--begin::Page Vendors Styles(used by this page)-->
        <link href="<?php echo base_url(); ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/header/base/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/header/menu/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed page-loading" >
        <!--begin::Main-->
        <!--begin::Header Mobile-->
        <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
            <!--begin::Logo-->
             <?php if($info_partner_actual->nb_url_foto != ''): ?>
            <a href="<?= site_url('/inicio/index') ?>">
                 <img alt="Logo" src="<?php echo $info_partner_actual->nb_url_foto; ?>" width="40%" />
            </a>
        <?php else: ?> <span class="text-dark"> <?php echo $info_partner_actual->nb_empresa; ?></span><?php endif; ?>

                        <?php $co_usuario = $this->ion_auth->user_id(); $co_partner = $this->ion_auth->co_partner(); ?>

                        <a  href="<?php echo site_url("wallet/index");?>"class="btn btn-hover-bg-warning btn-text-warning btn-hover-text-white border-0 font-weight-bold mr-2 mt-2 h3 w-800px">Saldo: <span class="div_saldo"><?php echo $this->wallet_library->get_saldo_usuario($co_usuario, $co_partner); ?> $ </span></a>


            <!--end::Logo-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Aside Mobile Toggle-->
                <!--end::Aside Mobile Toggle-->
                <!--begin::Header Menu Mobile Toggle-->

                      <?php if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")): ?> 
                                <button class="btn p-0 burger-icon ml-4" id="kt_aside_mobile_toggle">
                                    <span></span>
                                </button>

                    <?php endif; ?>


                <!--end::Header Menu Mobile Toggle-->
                <!--begin::Topbar Mobile Toggle-->
                <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                    <span class="svg-icon svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </button>
                <!--end::Topbar Mobile Toggle-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header Mobile-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">
                <!--begin::Aside-->

                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">


                    <!--begin::Header-->
                    <div id="kt_header" class="header header-fixed">
                        <!--begin::Container-->
                        <div class="container-fluid d-flex align-items-stretch justify-content-between">
                            <!--begin::Header Menu Wrapper-->
                            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                                <!--begin::Header Menu-->
                                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                    <!--begin::Header Nav-->
                                    <ul class="menu-nav">



                                      <li class="menu-item">
                                            <a href="<?php echo site_url("transmision_envivo/index");?>" class="menu-link">
                                                <span class="menu-text">En vivo</span>
                                               
                                            </a>
                                        </li>



                                        <?php  if ($this->usuario_library->perfil(array('SUPER USUARIO'))): ?>


                                         <li class="menu-item">
                                            <a href="<?php echo site_url("partner/index");?>" class="menu-link">
                                                <span class="menu-text">Clubes</span>
                                               
                                            </a>
                                        </li>

                                    



                                        <?php endif; ?>


                                    </ul>
                                    <!--end::Header Nav-->
                                </div>
                                <!--end::Header Menu-->
                            </div>
                            <!--end::Header Menu Wrapper-->
                            <!--begin::Topbar-->
                            <div class="topbar">

                                        
                                    <!--begin::Toggle-->
                                    <div class="topbar-item ml-4 mr-4">
                                        <?php $co_usuario = $this->ion_auth->user_id(); $co_partner = $this->ion_auth->co_partner(); ?>
                                            <a href="<?php echo site_url("wallet/index");?>" class="menu-link menu-toggle">
                                                <span class="text-warning div_saldo"><?php echo $this->wallet_library->get_saldo_usuario($co_usuario, $co_partner); ?> $</span>
                                            </a>
                                    </div>

                                <div class="topbar-item">
                                    <div class="btn btn-icon btn-clean btn-lg mr-1">


                                       <a href="<?php echo site_url("chats/index");?>">    


                                         <span class="svg-icon svg-icon-xl svg-icon-primary">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->

                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                                                    <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>               

                                    </a>


                                            <span style="margin-top:32px; position: absolute;"  class="label label-primary label-sm div_notificar_num_mensaje" >0</span>

                                    </div>
                                </div>


        


                                <!--begin::Search-->
    
                                <div class="topbar-item">
                                    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                        <span class="text-muted font-weight-bold font-size-base mr-1">Hola,</span>
                                        <span class="text-dark-50 font-weight-bolder font-size-base mr-3"><?php echo $this->ion_auth->get_nombre_usuario(); ?></span>
                                        <span class="symbol symbol-lg-35 symbol-25 symbol-light-warning">
                                            <span class="symbol-label font-size-h5 font-weight-bold"> <?php echo substr($this->ion_auth->get_nombre_usuario(), 0, 1); ?></span>
                                        </span>
                                    </div>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Container-->
                    </div>