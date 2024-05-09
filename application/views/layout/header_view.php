
<!DOCTYPE html>

<html lang="en">
    <!--begin::Head-->
    <head><base href="../../">
        <meta charset="utf-8" />
        <title>Rose</title>
        <meta name="description" content="Es una plataforma que permite a las empresas del sector farmacéutico, Anunciar, Comprar, Vender productos a nivel nacional." />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="theme-color" content="#F0DB4F">
        <meta name="MobileOptimized" content="width">
        <meta name="HandheldFriendly" content="true">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <link rel="manifest" href="<?php echo base_url(); ?>/manifest.json">

        <link rel="canonical" href="Rose Farmaceutica" />
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
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
        <!--end::Layout Themes-->
          <link rel="shortcut icon" href="<?php echo base_url(); ?>img/logo/rose_nav.ico" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->
  <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">
        <!--begin::Main-->
        <!--begin::Header Mobile-->
        <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
            <!--begin::Logo-->
            <a href="<?= site_url('/inicio/index') ?>">
                 <img alt="Logo" src="<?php echo base_url(); ?>img/logo/logo_negro_rose_farmaceutica.png" width="120px" height="100%" />
            </a>
            <!--end::Logo-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Aside Mobile Toggle-->



                <!--end::Header Menu Mobile Toggle-->
                <!--begin::Topbar Mobile Toggle-->
                <button class="btn btn-hover-text-primary p-0 ml-0" id="kt_header_mobile_topbar_toggle">
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

                                <button class="btn p-0 burger-icon ml-0" id="kt_header_mobile_toggle">
                    <span></span>
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

                                                                <div class="header-logo">
                                    <a href="<?= site_url('/inicio/index') ?>">
                                        <img alt="Logo" src="<?php echo base_url(); ?>img/logo/logo_blanco_rose_farmaceutica.png" width="120px" height="100%" />
                                    </a>
                                </div>


                                <!--begin::Header Menu-->
                                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                    <!--begin::Header Nav-->
                                    <ul class="menu-nav">


                                      <li class="menu-item">
                                            <a href="<?php echo site_url('publicidad/index')?>" class="menu-link">
                                                <span class="menu-text">Publicidad</span>
                                               
                                            </a>
                                        </li>



                                    </ul>
                                    <!--end::Header Nav-->
                                </div>
                                <!--end::Header Menu-->
                            </div>
                            <!--end::Header Menu Wrapper-->
                            <!--begin::Topbar-->
                            <div class="topbar">
        



                                <div class="topbar-item">
                                    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                        <span class="text-muted font-weight-bold font-size-base mr-1">Hola,</span>
                                        <span class="text-dark-50 font-weight-bolder font-size-base mr-3"><?php echo $this->ion_auth->get_nombre_usuario(); ?></span>
                                        <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
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