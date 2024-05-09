
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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
                                            <a class="nav-link" href="<?php echo site_url('chats/index'); ?>">Contactos</a>
                                        </li>
                                        </ul>

                                                <div class="btn-group ml-2">
                    <button type="button" class="btn btn-sm btn-light-primary font-weight-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accion
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" style="">
                        <a class="dropdown-item" data-toggle="modal" data-target="#ajax_remote" href="javascript::">Enviar Mensaje</a>
                    </div>
                </div>



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

                                    <div class="col-lg-4 pr-2 pl-0">
                                        <!--begin::Card-->
                                        <div class="card card-custom">
                                            <!--begin::Body-->
                                            <div class="card-body pt-4">
                                                <!--begin:Search-->
                                                         <div class="checkbox-inline">
                                                            <label class="checkbox checkbox-outline checkbox-success">
                                                                    <input type="checkbox" name="checkall"  id="checkall"/>
                                                                    <span></span>
                                                                    
                                                                </label>
                                                            </div> 

                                                            <h3  align="center" class="font-weight-bold p-0">Lista de contactos</h3>
                                                <!--end:Search-->
                                                <!--begin:Users-->
                                                <div class="mt-4" id="elementos" style="">

                                                 <?php if($list_user->num_rows() > 0): ?>
                                                        <?php foreach ($list_user->result() as $row): ?>

                                                <?php $token_username_chats =  $this->authjwt->encode_token_chats($row->nombre_emisor, 0); ?>

                                                 <span class="carga_elementos_contactos">
                                                    <div id="<?php echo $row->nombre_emisor; ?>" class="d-flex align-items-center justify-content-between mb-5">
                                                        <div class="d-flex align-items-center">
                                                             <div class="checkbox-inline">
                                                            <label class="checkbox checkbox-outline checkbox-success">
                                                                    <input type="checkbox" name="Checkbox_<?php echo $row->nombre_emisor; ?>" id="Checkbox_<?php echo $row->nombre_emisor; ?>" class="check_get" value="<?php echo $row->nombre_emisor; ?>" />
                                                                    <span></span>
                                                                    
                                                                </label>
                                                            </div>
                                                            <div class="symbol symbol-circle symbol-50 mr-3">
                                                                <?php $info_usuario_nativo = $this->chats_library->get_info_usuario_contacto($row->nombre_emisor); ?>

                                                                <?php if($info_usuario_nativo): ?>

                                                                <img alt="Pic" src="<?php echo $info_usuario_nativo->nb_foto_perfil; ?>" />

                                                                  <?php else: ?>

                                                                    <img alt="Pic" src="http://localhost/latinclub/img/perfil/usuario/sin_foto_perfil.png" />

                                                                 <?php endif; ?>

                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <a href='<?php echo site_url("chats/chats_user/$token_username_chats"); ?>' id="link_usuario_<?php echo $row->nombre_emisor; ?>" class="text-dark text-hover-primary font-size-lg"><?php echo $row->nb_nombre_contacto; ?></a>
                                                                <span class="text-muted font-size-sm" id="chats_<?php echo $row->nombre_emisor; ?>"><?php echo $row->nombre_emisor; ?></span>
                                                            </div>
                                                        </div>
                                                                                                                <div class="d-flex flex-column align-items-end">
                                                            <span class="text-muted font-weight-bold font-size-sm" id="fecha_<?php echo $row->nombre_emisor; ?>"></span>

    
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
                                                                    <a href="javascript:" onclick="eliminar_contacto('<?php echo $row->nombre_emisor; ?>')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Eliminar contacto</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>

                                                        </div>

                                                    </div>
                                                </span>
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

                                <div class="col-lg-8  mb-0 p-0 d-none d-xl-block">


                                    <h2 class="text-dark"  align="center"> Elija un contacto para iniciar  una conversacion </h2>
                                    <p  align="center"></p>
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

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enviar Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               
                <textarea class="form-control" id="tx_mensaje_masivo" name="tx_mensaje_masivo" placeholder="Escriba qui su mensaje..."></textarea>
               
            </div>

                        <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                <button  onclick="enviar_mensaje()" class="btn btn-primary font-weight-bold">Enviar Mensaje</button>
            </div>

        </div>
    </div>
</div>




                                    
<script type="text/javascript">

    var limite_incio = 0;
    var limite_final = 100;
    var co_usuario = '<?php echo $this->ion_auth->user_id(); ?>';


   $("#checkall").change(function () {
   
   $("input:checkbox").prop('checked', $(this).prop("checked"));
   
   
   });




 $(document).ready(function(){





      }); // Fin ready



function enviar_mensaje()
{



         var tx_mensaje_masivo = $('#tx_mensaje_masivo').val();


         if (tx_mensaje_masivo == '') {
   
          toastr.error("Escriba un mensaje", 'Error');
           $('#tx_mensaje_masivo').focus();
            return;
   
       };

               var selected = new Array();
        $(".check_get:checked").each(function () {
            selected.push(this.value);
        });

      if (selected.length === 0) { toastr.error("Error", 'Por favor seleccione un contacto');  return false; }


            var data = new FormData();

            data.append('tx_mensaje_masivo', tx_mensaje_masivo);
            data.append('selected', selected);

    
            var url = "<?php echo site_url('chats/ejecutar_enviar_mensaje_masivo') ?>";


                $.ajax({
                url:url,
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false}).done(function( data ) { 
                   var obj = JSON.parse(data);


                       if (obj.error == 0) {


                        toastr.success(obj.message, 'Error');
                        $('#ajax_remote').modal('hide');
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 



}

function eliminar_contacto(username_contacto)
{


            var data = new FormData();
            data.append('username_contacto', username_contacto);
            
            var url = "<?php echo site_url('chats/eliminar_contacto') ?>";


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




  </script>