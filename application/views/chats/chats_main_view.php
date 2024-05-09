
                    <div class="content d-flex flex-column flex-column-fluid menu_chats" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Chats</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-0 bg-gray-200"></div>

                                        <ul class="nav nav-bold">
                                        <li class="nav-item mr-0">
                                            <a class="nav-link" href="<?php echo site_url('chats/contactos'); ?>">Contactos</a>
                                        </li>
                                        </ul>




                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">


                                                                            <a class="btn btn-success btn-sm mr-2" target="_blank" href="https://api.whatsapp.com/send?phone=+584126302229&text=Hola,%20.%20https://subastahipica.net"><i class="fab fa-whatsapp"></i>Enviar WhatsApp al administrador</a>

                                             <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Opciones">
                                                        <a href="javascript:;" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-0">

                                                              <li class="navi-item">
                                                                    <a href="<?php echo site_url("chats/contactos"); ?>" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Lista de contactos</span>
                                                                    </a>
                                                                </li>

                                                                <li class="navi-item">
                                                                    <a href="<?php echo site_url("chats/nuevo_contacto"); ?>" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Nuevo contacto</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>
                                
                                
    
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

                                <div class="col-lg-4 pr-2 pl-0 d-none d-xl-block">

                                        <!--begin::Card-->
                                        <div class="card card-custom">
                                            <!--begin::Body-->
                                            <div class="card-body">

                                                <h3  align="center" class="font-weight-bold p-0">Chat recientes</h3>
                                                <!--begin:Search-->
                                                <!--begin:Users-->
                                                <div class="mt-7" id="elementos">

                                                    <?php if($list_user_reciente->num_rows() > 0): ?>
                                                        <?php foreach ($list_user_reciente->result() as $row): ?>

                                                <?php $token_username_chats =  $this->authjwt->encode_token_chats($row->nombre_emisor, $row->co_grupo_difusion); ?>

                                                    <?php $info_modo_mensaje = $this->chats_library->get_info_grupo_difusion($row->co_grupo_difusion) ?>

                                                    <?php if(!$info_modo_mensaje): ?>

                                                    <span class="carga_elementos_contactos">
                                                    <div id="<?php echo $row->nombre_emisor; ?>" class="d-flex align-items-center justify-content-between mb-5">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-circle symbol-50 mr-3">
                                                                <?php $info_usuario_nativo = $this->chats_library->get_info_usuario_contacto($row->nombre_emisor); ?>

                                                                <?php if($info_usuario_nativo): ?>

                                                                <img alt="Pic" src="<?php echo $info_usuario_nativo->nb_foto_perfil; ?>" />

                                                                  <?php else: ?>

                                                                    <img alt="Pic" src="http://localhost/latinclub/img/perfil/usuario/sin_foto_perfil.png" />

                                                                 <?php endif; ?>

                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <a href='<?php echo site_url("chats/chats_user/$token_username_chats"); ?>' id="link_usuario_<?php echo $row->nombre_emisor; ?>" class="text-dark text-hover-primary font-size-lg <?php if($row->ca_mensajes_nuevos != 0): ?> font-weight-boldest <?php endif; ?> "><?php echo $row->nb_nombre_contacto; ?></a>
                                                                <span class="text-muted font-size-sm" id="chats_<?php echo $row->nombre_emisor; ?>"><?php echo $row->last_mensaje; ?></span>
                                                            </div>
                                                        </div>
                                                                                                                <div class="d-flex flex-column align-items-end">
                                                            <span class="text-muted font-weight-bold font-size-sm" id="fecha_<?php echo $row->nombre_emisor; ?>">

                                                                <?php if($row->last_fecha_sistema != ''): echo date("H:i:s", strtotime($row->last_fecha_sistema)); endif; ?></span>

                                                                <span id="label_mensajes_nuevos_<?php echo $row->nombre_emisor; ?>" class="
                                                            <?php if($row->ca_mensajes_nuevos != 0): ?>  label label-sm label-success <?php endif; ?>">
                                                              <?php if($row->ca_mensajes_nuevos != 0): ?> <?php echo $row->ca_mensajes_nuevos; ?> <?php endif; ?></span> 

    
                                                        </div>
                                                        <div class="d-flex flex-column align-items-end">
                                                           
                                                     <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Opciones">
                                                        <a href="javascript:" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">
                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="eliminar_chats('<?php echo $row->nombre_emisor; ?>')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Eliminar chats</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>

                                                        </div>

                                                    </div>
                                                </span>

                                            <?php else: ?>

                                             <span class="carga_elementos_contactos">
                                                    <div id="<?php echo $info_modo_mensaje->id; ?>" class="d-flex align-items-center justify-content-between mb-5">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-circle symbol-50 mr-3">
                    

                                                                    <img alt="Pic" src="http://localhost/latinclub/img/perfil/usuario/sin_foto_perfil.png" />


                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <a href='<?php echo site_url("chats/chats_user/$token_username_chats"); ?>' id="link_usuario_<?php echo $row->co_grupo_difusion; ?>" class="text-dark text-hover-primary font-size-lg <?php if($row->ca_mensajes_nuevos != 0): ?> font-weight-boldest <?php endif; ?> "><?php echo  $info_modo_mensaje->nb_grupo_difusion;  ?></a>
                                                                <span class="text-muted font-size-sm" id="chats_<?php echo $row->co_grupo_difusion; ?>"><?php echo $row->nb_nombre_contacto; ?></span>
                                                            </div>
                                                        </div>
                                                                            <div class="d-flex flex-column align-items-end">
                                                            <span class="text-muted font-weight-bold font-size-sm" id="fecha_<?php echo $row->co_grupo_difusion; ?>">

                                                                <?php if($row->last_fecha_sistema != ''): echo date("H:i:s", strtotime($row->last_fecha_sistema)); endif; ?></span>

                                                                <span id="label_mensajes_nuevos_<?php echo $row->nombre_emisor; ?>" class="
                                                            <?php if($row->ca_mensajes_nuevos != 0): ?>  label label-sm label-success <?php endif; ?>">
                                                              <?php if($row->ca_mensajes_nuevos != 0): ?> <?php echo $row->ca_mensajes_nuevos; ?> <?php endif; ?></span> 

    
                                                        </div>
                                                        <div class="d-flex flex-column align-items-end">
                                                           
                                                     <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Opciones">
                                                        <a href="javascript:" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">
                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="eliminar_chats('<?php echo $row->co_grupo_difusion; ?>')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Eliminar chats</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>

                                                        </div>

                                                    </div>
                                                </span>

                                                <?php endif; ?>

                                                <?php endforeach; ?>
                                            <?php endif; ?>

                           
                                                    <!--end:User-->
                                       
                                                </div>
                                                <!--end:Users-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card-->
                        
                                
                                    
                                </div>

                                <div class="col-lg-8 mb-0 pr-0 pl-0 pb-10 pt-0">



                                        <?php if ($co_grupo_difusion == '0'): $info_usuario_chats = $this->chats_library->get_info_usuario_contacto($username_chats); endif; ?>
                                        <?php if ($co_grupo_difusion != '0'): $info_usuario_chats =$this->chats_library->get_info_grupo_difusion($co_grupo_difusion); endif; ?>
                                        <!--begin::Card-->
                                        <div class="card card-custom">
                                            <!--begin::Header-->
                                            <div class="card-header align-items-center px-8 py-3">
                                                <div class="text-left flex-grow-1">
                                                          <div class="text-dark-75 font-weight-bold font-size-h5"><?php if($co_grupo_difusion == '0'): echo $info_usuario_chats->nombre_contacto; endif; ?> <?php if($co_grupo_difusion != '0'): echo $info_usuario_chats->nb_grupo_difusion; endif; ?></div>
                                                    <div>
                                                       
                                                        <span class="font-weight-bold text-muted font-size-sm">En linea</span>
                                                    </div>
                                                </div>

                                                <div class="text-left flex-grow-1">

                                                </div>
                                                <div class="text-right flex-grow-1">
                                                    <!--begin::Dropdown Menu-->
                                                    <!--end::Dropdown Menu-->
                                                </div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body "  style="overflow-y:scroll; height:300px; background-color:#eeeeee; " id="scroll_div">
                                                <!--begin::Scroll-->
                                   
                                                    <!--begin::Messages-->
                                                    <div class="messages_reload"></div>
                                                    <div class="messages_new"></div>
                                                <!--end::Scroll-->
                                            </div>
                                            <!--end::Body-->
                                            <!--begin::Footer-->
                                            <div class="card-footer align-items-center pr-6 pl-2 pt-4 pb-2">
                                                <!--begin::Compose-->
                                                
                                                <div class="d-flex align-items-center justify-content-between mt-0">
                                                    <div class="col-10">
                                                <textarea class="form-control border-0 p-0" id="tx_mensaje" name="tx_mensaje" rows="1" placeholder="Escribir un mensaje"></textarea>
                                                    </div>
                                                    <div class="col-2">
                                                        <a onclick="enviar_mensaje()" class="btn btn-primary btn-md text-uppercase font-weight-bold py-2 px-1">Enviar</a>
                                                    </div>
                                                </div>
                                                <!--begin::Compose-->
                                            </div>
                                            <!--end::Footer-->
                                        </div>
                                        <!--end::Card-->

                            </div>

                            </div>

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>


    <div class="modal fade"  id="ajax_remote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">

        </div>
    </div>
</div>


                                    
<script type="text/javascript">


    var username = '<?php echo $this->ion_auth->username(); ?>';
    var username_chats = '<?php echo $username_chats; ?>';
    var co_grupo_difusion = '<?php echo $co_grupo_difusion; ?>';
    var ca_mensajes = <?php echo $ca_mensajes; ?>;

    var limite_incio = 0;
   var limite_final = 5;



 $.ajax({
   async: false,
   method: "POST",
   data: {'limite_incio':limite_incio, 'limite_final':limite_final, 'username_chats':username_chats, 'co_grupo_difusion':co_grupo_difusion},
   url: "<?php echo site_url('chats/reload_mensaje') ?>",
            }).done(function( data ) { 

   
   var obj = JSON.parse(data);

    var o = JSON.parse(obj.array_new);

        
                       for (x of o ) {

                        if(username == x.username_emisor){

                        var data_me = '<div class="d-flex flex-column mb-0 align-items-end"><div class="d-flex align-items-center"><div><span class="text-muted font-size-xs">'+x.ff_sistema+'</span></div></div><div class="mt-2 rounded p-2 bg-light-success text-dark font-size-sm text-right max-w-400px">'+x.tx_mensaje+'</div></div></div>';

                        $(".messages_reload:last").after(data_me);


                        }else{

                       var data_me = '<div class="d-flex flex-column mb-0 align-items-start"><div class="d-flex align-items-center"><div><a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-sm">'+x.nombre_emisor+'</a> <span class="text-muted font-size-xs">'+x.ff_sistema+'</span></div></div><div class="mt-2 rounded p-2 bg-light-dark text-dark font-size-sm text-left max-w-400px">'+x.tx_mensaje+'</div></div>';

                        $(".messages_reload:last").after(data_me);


                        }
                        


                       }



               limite_incio = limite_incio + 5;
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 

 $(document).ready(function(){



   $('#scroll_div').scrollTop( $('#scroll_div').prop('scrollHeight') );

$( "#scroll_div" ).scroll(function() {


   var top1 =   $("#scroll_div").scrollTop();

   if (top1 < 5){


 $.ajax({
   async: false,
   method: "POST",
   data: {'limite_incio':limite_incio, 'limite_final':limite_final, 'username_chats':username_chats, 'co_grupo_difusion':co_grupo_difusion},
   url: "<?php echo site_url('chats/reload_mensaje') ?>",
            }).done(function( data ) { 
   
                 
   var obj = JSON.parse(data);

    var o = JSON.parse(obj.array_new);

        
                    for (x of o ) {

                        if(username == x.username_emisor){

                        var data_me = '<div class="d-flex flex-column mb-0 align-items-end"><div class="d-flex align-items-center"><div><span class="text-muted font-size-xs">'+x.ff_sistema+' now</span></div></div><div class="mt-2 rounded p-2 bg-light-success text-dark font-size-sm text-right max-w-400px">'+x.tx_mensaje+'</div></div></div>';

                        $(".messages_reload:last").after(data_me);


                        }else{

                       var data_me = '<div class="d-flex flex-column mb-0 align-items-start"><div class="d-flex align-items-center"><div><a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-sm">'+x.nombre_emisor+'</a> <span class="text-muted font-size-xs">'+x.ff_sistema+'</span></div></div><div class="mt-2 rounded p-2 bg-light-dark text-dark font-size-sm text-left max-w-400px">'+x.tx_mensaje+'</div></div>';

                        $(".messages_reload:last").after(data_me);


                        }
                        


                       }

               limite_incio = limite_incio + 5;
               limite_final = limite_final + 5;
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 

   

}


});

      }); // Fin ready



function enviar_mensaje()
{



         var tx_mensaje = $('#tx_mensaje').val();


         if (tx_mensaje == '') {
   
          toastr.error("Escriba un mensaje", 'Error');
           $('#tx_mensaje').focus();
            return;
   
       };


      var d = new Date();

    var strDate = d.getDate() + "-" + (d.getMonth()+1) + "-" + d.getFullYear();
    var hora_segundos =  d.getHours() + ":" + d.getMinutes()+":"+d.getSeconds();
    var fecha_actual = hora_segundos +'  '+strDate;


                 var data_me = '<div class="d-flex flex-column mb-0 align-items-end"><div class="d-flex align-items-center"><div><span class="text-muted font-size-xs">'+hora_segundos+'</span></div></div><div class="mt-2 rounded p-2 bg-light-success text-dark font-size-sm text-right max-w-400px">'+tx_mensaje+'</div></div></div>';

                        $(".messages_new").before(data_me);

                        $("#scroll_div").animate({ scrollTop: $('#scroll_div')[0].scrollHeight}, 1000);



            var data = new FormData();

            data.append('tx_mensaje', tx_mensaje);
            data.append('username_chats', username_chats);
            data.append('co_grupo_difusion', co_grupo_difusion);

            
            
            var url = "<?php echo site_url('chats/ejecutar_enviar_mensaje') ?>";

            $('#tx_mensaje').val('')
            $('#tx_mensaje').focus();

            if(co_grupo_difusion == 0){

            $('#elementos').prepend($('#elementos #'+username_chats));
            $('#chats_'+username_chats).html(tx_mensaje);
            $('#fecha_'+username_chats).html(hora_segundos);

            }else{

            $('#elementos').prepend($('#elementos #'+co_grupo_difusion));
            $('#chats_'+co_grupo_difusion).html(tx_mensaje);
            $('#fecha_'+co_grupo_difusion).html(hora_segundos);

            }




                $.ajax({
                url:url,
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false}).done(function( data ) { 


                   var obj = JSON.parse(data);



                       if (obj.error == 0) {

                        if(co_grupo_difusion == 0){

              if($('#'+username_chats).length == 0)

                                {



                                $("#elementos").load('<?php echo site_url('chats/reload_chats_nuevo_entrante/') ?>'); 

                            }


                        }else{




                        }



   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 



}



function eliminar_chats(username_contacto)
{



                 var data_me = '';

                        $(".messages_new").html('');

                        $("#scroll_div").animate({ scrollTop: $('#scroll_div')[0].scrollHeight}, 1000);


            var data = new FormData();

            data.append('username_contacto', username_contacto);

            
            
            var url = "<?php echo site_url('chats/eliminar_chats') ?>";

            $('#tx_mensaje').val('')
            $('#tx_mensaje').focus();
            $('#elementos').append($('#elementos #'+username_contacto));
            $('#chats_'+username_contacto).html('');
            $('#fecha_'+username_contacto).html('');


            $('#label_mensajes_nuevos_'+username_contacto).removeClass('label label-sm label-success');
            $('#label_mensajes_nuevos_'+username_contacto).html('');
            $('#link_usuario_'+username_contacto).removeClass('font-weight-boldest');

            if(username_contacto == username_chats){

            $('#scroll_div').html('<div class="messages_reload"></div><div class="messages_new"></div>');

            }


            
                                                    



                $.ajax({
                url:url,
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false}).done(function( data ) { 


                   var obj = JSON.parse(data);



                       if (obj.error == 0) {

   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 



}



$('#tx_mensaje').on('keypress',
    function (event) {
        if (event.which == '13') {
            event.preventDefault();
             enviar_mensaje();
        }
    });




   
  </script>