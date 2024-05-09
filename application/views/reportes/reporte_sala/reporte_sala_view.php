
 <?php if ($list_entidad_monetaria->num_rows() > 0) : ?>
            <table class="table table-sm" id="tabla_1" width="100%">
               <thead>
                  <tr>
                     <th class="all" width="20%">Banco</th>
                     <th class="all" width="20%">Codigo de identificacion</th>
                     <th width="30%">Direccion</th>
                     <th class="all" width="10%">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;  ?>
                  <?php foreach ($list_entidad_monetaria->result() as $row) : $con ++; ?>
                  <tr>
                     <td><?php echo $row->nb_banco; ?> </td>
                     <td><?php echo $row->tx_co_banco; ?> </td>
                     <td><?php echo $row->tx_direccion; ?> </td>
                     <td>

                                       <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-0">

                                                                        <li class="navi-item">
                                                                    <a href="<?php echo site_url("entidad_monetaria/editar_banco/$row->id");?>"class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>

                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_banco(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
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
            <h4>Sin bancos</h4>
            <p></p>
            <?php endif; ?>