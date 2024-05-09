                                                  <?php if ($info_linea_sala->num_rows() > 0) : ?>
 
               <table class="table table-striped table-hover" id="tabla_1" width="100%">
                  <thead>
                     <tr>
                        <th width="12%" class="all">Casilla</th>
                        <th width="12%" class="all">Ejemplar</th>
                        <th width="15%" class="desktop">Monto Inicial</th>
                         <th width="15%" class="desktop">Accion</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($info_linea_sala->result() as $row) : ?>
                     <tr  <?php if($row->nb_estatus == 'RETIRADO'): ?> class="text-danger" <?php endif; ?>>

                         <td><?php echo $row->nu_casilla; ?><?php if($row->nb_estatus == 'RETIRADO'): ?> <br> <span class="text-danger">Retirado</span>  <?php endif; ?>
                         <?php if($row->nu_posicion != 0): ?> <br> <?php if($row->nu_posicion == 1): ?> <span class="text-success">Ganador</span> <?php else: ?> <span class="text-primary"> <?php echo $row->nu_posicion.' Lugar'; ?></span>  <?php endif; ?> <?php endif; ?>
                     </td>
                          <td><?php echo $row->nb_competidor; ?></td>
                          <td><?php echo $row->ca_monto_apuesta_inicial; ?></td>
                                

                <td>

                    <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">
                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="editar_ejemplar_modal(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>


                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="retirar_caballo(<?php echo $row->id; ?>)" class="navi-link" class="navi-link">
                                                                         <span class="navi-icon">
                                                                            <i class="flaticon2-list-3"></i>
                                                                        </span>
                                                                        <span class="navi-text">Retirar</span>
                                                                    </a>
                                                                </li>

                                                                <li class="navi-item">
                                                                    <a href="javascript:" onclick="eliminar_ejemplar(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-list-3"></i>
                                                                        </span>
                                                                        <span class="navi-text">Eliminar</span>
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>
                                                </div>


                        </td>
                     </tr>
                     <?php endforeach; ?>   
                  </tbody>
               </table>
               <?php else: ?>
               <h4>Sin registro</h4>

               <?php endif; ?>

                                                 </div>