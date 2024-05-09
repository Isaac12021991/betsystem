                                                    <?php if($list_user_reciente->num_rows() > 0): ?>
                                                        <?php foreach ($list_user_reciente->result() as $row): ?>

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
                                                                <a href='<?php echo site_url("chats/chats_user/$row->nombre_emisor"); ?>' id="link_usuario_<?php echo $row->nombre_emisor; ?>" class="text-dark text-hover-primary font-size-lg <?php if($row->ca_mensajes_nuevos != 0): ?> font-weight-boldest <?php endif; ?> "><?php echo $row->nb_nombre_contacto; ?></a>
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
                                                <?php endforeach; ?>
                                            <?php endif; ?>