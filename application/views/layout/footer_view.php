

          <!--end::Content-->

          <?php if($this->usuario_library->permiso_empresa("'USUARIO'")): ?> 

             <?php if ($this->agent->is_mobile()): ?>
          <!--begin::Footer-->
          <div class="footer bg-white py-3 pt-3 d-flex flex-lg-column" id="kt_footer"  style="bottom:0; position:fixed; width:100%; z-index:9999;">
            <!--begin::Container-->
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center pl-0 pr-0">


             

                      <div class="row">

                        <div class="d-flex justify-content-between">
                        
                        <div class="col-2"><a href="<?= site_url('/inicio/index') ?>" class="btn btn-link-dark font-weight-bold mr-3 ml-3"><i class="fa fa-home icon-2x"></i></a></div>
                        <div class="col-2"><a href="<?= site_url('/Transmision_envivo/index') ?>" class="btn btn-link-dark font-weight-bold mr-3 ml-3"><i class="fa fas fa-tv icon-2x"></i></a></div>
                        <div class="col-2"><a href="<?= site_url('/wallet/index') ?>" class="btn btn-link-dark font-weight-bold mr-3 ml-3"><i class="fa fas fa-wallet icon-2x"></i></a></div>
                           <div class="col-2"><a href="<?= site_url('/chats/index') ?>" class="btn btn-link-dark font-weight-bold mr-3 ml-3"><i class="fab fa-rocketchat icon-2x"></i></a>
                          <span id="nav_movil_chats_notificacion" style="margin-left:18px; margin-top:4px; position: absolute;"  class="" ></span></div>
                        <div class="col-2"><a href="<?= site_url('/cuenta/cuenta') ?>" class="btn btn-link-dark font-weight-bold mr-3 ml-3"><i class="fa fas fa-user icon-2x"></i></a></div>


                        </div>
                       
                        
                      </div>



              <!--end::Nav-->
            </div>
            <!--end::Container-->
          </div>

           <?php else: ?>

                         <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
            <!--begin::Container-->
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
              <!--begin::Copyright-->
              <div class="text-dark order-2 order-md-1">

                <span class="text-muted font-weight-bold mr-2"><?php echo date('Y'); ?></span>

                <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary"><?php $info_empresa = $this->empresa_library->get_info_empresa(); ?>
                  
                  <?php $co_partner = $this->ion_auth->co_partner(); echo $info_empresa->nb_empresa; ?>
                </a>

              </div>
              <!--end::Copyright-->
              <!--begin::Nav-->

            <?php $info_partner_actual = $this->empresa_library->get_partner_actual(); ?>

              <div class="nav nav-dark">
                <a href="#" target="_blank" class="nav-link pl-0 pr-5"><?php echo $info_partner_actual->nb_empresa; ?></a>


              </div>
              <!--end::Nav-->
            </div>
            <!--end::Container-->
          </div>

        <?php endif; ?>


        <?php else: ?>

                    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
            <!--begin::Container-->
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
              <!--begin::Copyright-->
              <div class="text-dark order-2 order-md-1">

                <span class="text-muted font-weight-bold mr-2"><?php echo date('Y'); ?></span>

                <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary"><?php $info_empresa = $this->empresa_library->get_info_empresa(); ?>
                  
                  <?php $co_partner = $this->ion_auth->co_partner(); echo $info_empresa->nb_empresa; ?>
                </a>

              </div>
              <!--end::Copyright-->
              <!--begin::Nav-->

            <?php $info_partner_actual = $this->empresa_library->get_partner_actual(); ?>

              <div class="nav nav-dark">
                <a href="#" target="_blank" class="nav-link pl-0 pr-5"><?php echo $info_partner_actual->nb_empresa; ?></a>


              </div>
              <!--end::Nav-->
            </div>
            <!--end::Container-->
          </div>




        <?php endif; ?>



          <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
      <!--begin::Header-->
      <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">Perfil
        <small class="text-muted font-size-sm ml-2"></small></h3>



        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
          <i class="ki ki-close icon-xs text-muted"></i>
        </a>
      </div>
      <!--end::Header-->
      <!--begin::Content-->
      <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
          <div class="symbol symbol-100 mr-5">
            <div class="symbol-label" style="background-image:url('<?php echo $this->ion_auth->foto_perfil(); ?>')"></div>
            <i class="symbol-badge bg-success"></i>
          </div>
          <div class="d-flex flex-column">
            <a href="<?php echo site_url('cuenta/cuenta')?>" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?php echo $this->ion_auth->get_nombres(); ?></a>
            <div class="text-muted mt-1"><?php echo $this->ion_auth->username(); ?></div>
            <div class="navi mt-2">
              <a href="#" class="navi-item">
                <span class="navi-link p-0 pb-2">
                  <span class="navi-icon mr-1">
                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                      <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <rect x="0" y="0" width="24" height="24" />
                          <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                          <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                        </g>
                      </svg>
                      <!--end::Svg Icon-->
                    </span>
                  </span>
                  <span class="navi-text text-muted text-hover-primary"><?php echo $this->ion_auth->get_email(); ?></span>
                </span>
              </a>
              <?php $co_partner = $this->ion_auth->co_partner(); ?>
              <a href='<?php echo site_url("auth/logout/$co_partner")?>' class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Cerrar Sesion</a>
            </div>
          </div>
        </div>

        <!--end::Nav-->
        <!--begin::Separator-->
        <div class="separator separator-dashed my-7"></div>
        <!--end::Separator-->

                <a href="<?php echo site_url('cuenta/cuenta')?>" class="btn btn-sm btn-light-primary">
    <i class="flaticon-settings"></i> Ajustes
</a>
        <!--begin::Notifications-->
        <div>
           <div class="separator separator-dashed my-7"></div>
          <!--begin:Heading-->
          <!--end::Item-->
          <!--end::Item-->
        </div>
        <!--end::Notifications-->
      </div>
      <!--end::Content-->
    </div>
    <!-- end::User Panel-->




    <!--end::Chat Panel-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
      <span class="svg-icon">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24" />
            <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
            <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
          </g>
        </svg>
        <!--end::Svg Icon-->
      </span>
    </div>


    <!--end::Demo Panel-->
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->




    <script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="<?php echo base_url(); ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/custom/gmaps/gmaps.js"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="<?php echo base_url(); ?>assets/js/pages/widgets.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/custom/jquery-confirm/js/jquery-confirm.js"></script>

<script src="<?php echo base_url(); ?>assets/js/pages/crud/file-upload/image-input.js"></script>


<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/custom/ion.sound/ion.sound.min.js"></script>

<script type="text/javascript">


    ion.sound({
      sounds: [
          {name: "audio_puja"}
      ],
      path: "<?php echo base_url(); ?>assets/plugins/custom/ion.sound/sounds/",
      preload: true,
      multiplay: true,
      volume: 1.0
  });

  
setInterval(function(){ 

             $.ajax({
   method: "POST",
   data: {},
   url: "<?php echo site_url('chats/conexion_chats_cliente_servidor') ?>",
            }).done(function(data) { 

                   var obj = JSON.parse(data);

        
                     var o = JSON.parse(obj.array_new_resultados);

                     $('.div_notificar_num_mensaje').html(obj.ca_mensajes_nuevos);

                     if(obj.ca_mensajes_nuevos > 0){

                      $("#nav_movil_chats_notificacion").addClass("label label-dot label-danger");


                     }




                        if($('.menu_chats').length > 0){



                   for (x of o ) {



                        if (username_chats == x.username_emisor){

                     var data_me = '<div class="d-flex flex-column mb-0 align-items-start"><div class="d-flex align-items-center"><div><a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-sm">'+x.nombre_emisor+'</a> <span class="text-muted font-size-xs">'+x.ff_sistema+'</span></div></div><div class="mt-2 rounded p-2 bg-light-dark text-dark font-size-sm text-left max-w-400px">'+x.tx_mensaje+'</div></div>';


                         $(".messages_new").before(data_me);
                          $("#scroll_div").animate({ scrollTop: $('#scroll_div')[0].scrollHeight}, 1000);


                         $.post("<?php echo site_url('chats/set_mensaje_recibido_leido') ?>", { co_mensaje: x.id} );


                        }

                        // Verificar si el elemento existe

                        if($('#elementos #'+x.username_emisor).length == 0)

                                {


                                $("#elementos").load('<?php echo site_url('chats/reload_chats_nuevo_entrante/') ?>'+x.username_emisor);


                                }else{


                   
                    $('#elementos').prepend($('#elementos #'+x.username_emisor));
                    $('#chats_'+x.username_emisor).html(x.tx_mensaje);
                    $('#fecha_'+x.username_emisor).html(x.ff_sistema);

                    if (username_chats != x.username_emisor){

                    $('#link_usuario_'+x.username_emisor).addClass('font-weight-boldest');

                    var mensajes_nuevos_actual = $('#label_mensajes_nuevos_'+x.username_emisor).text();

                    mensajes_nuevos_actual = parseInt(mensajes_nuevos_actual);


                        if (isNaN(mensajes_nuevos_actual)) {
   
                            mensajes_nuevos_actual = 0;
        
                        }



                    var mensajes_nuevos_total = parseInt(mensajes_nuevos_actual) + 1;

                    $('#label_mensajes_nuevos_'+x.username_emisor).addClass('label label-sm label-success');
                    $('#label_mensajes_nuevos_'+x.username_emisor).html(mensajes_nuevos_total);
                    

                      }


                  }




                       }

                   }else{



                    for (x of o ) {


                      toastr.success(x.tx_mensaje, x.nombre_emisor);


                     }



                   }
   
             }).fail(function(){
   

   
   
             }); 


}, 5000);


  
          function cerrar_notificacion(co_auditoria)
   {

       $.ajax({
   method: "POST",
   data: {'co_auditoria':co_auditoria},
   url: "<?php echo site_url('auditoria_log/cerrar_notificacion') ?>",
                }).done(function( data ) { 
                   var obj = JSON.parse(data);
   
                 }).fail(function(){
   
               alert('Fallo');
   
                 }); 
 
   }


</script>

    <!--end::Page Scripts-->
  </body>
  <!--end::Body-->
</html>