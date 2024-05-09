
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
                                            <div class="card-body">
                                                <!--begin:Search-->
                                                <h3  align="center" class="font-weight-bold p-0">Chat recientes</h3>
                                                <!--end:Search-->
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

        </div>
    </div>
</div>


                                    
<script type="text/javascript">

    var limite_incio = 0;
    var limite_final = 100;
    var co_usuario = '<?php echo $this->ion_auth->user_id(); ?>';





 $(document).ready(function(){





      }); // Fin ready




  </script>