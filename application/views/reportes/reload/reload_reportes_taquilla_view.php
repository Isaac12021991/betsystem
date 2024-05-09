
 <?php if ($list_ganadores_taquilla->num_rows() > 0) : $ca_monto_final = 0; $ca_monto_total_comision = 0; ?>
       <table class="table table-hover dt-responsive nowrap table-sm table-striped" id="myTable">
               <thead>
                  <tr>
                    <th class="all">Hip</th>
                     <th class="all">Carrera #</th>
                     <th class="all">Total jugada ganadores</th>
                     <th>Total jugada place</th>
                     <th class="all">Pago cliente ganadores</th>
                     <th class="">Pago cliente place</th>
                     <th>Ganancia casa</th>
                     <th>%</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;  ?>
                  <?php $var_end = 0; foreach ($list_ganadores_taquilla->result() as $row) : $con ++; ?>
                  <tr class="text-primary" onclick="ver_detalle_reporte_taquilla('<?php echo $row->id; ?>')" role="botom">
                    <td><?php echo $row->nb_sede; ?> </td>
                     <td><?php echo $row->nu_carrera; ?> </td>
                     <td><?php echo $row->monto_apostado_primer_lugar; ?> </td>
                     <td><?php echo $row->monto_apostado_segundo_lugar?></td>
                     <td><?php echo $row->ca_pago_primer_lugar; ?></td>
                     <td><?php echo $row->ca_pago_segundo_lugar; ?></td>
                     <td><?php $ca_total_casa_todo = $row->monto_apostado_primer_lugar + $row->monto_apostado_segundo_lugar;
                          $ca_total_pago = $row->ca_pago_primer_lugar + $row->ca_pago_segundo_lugar;
                          $ca_monto_casa = $ca_total_casa_todo - $ca_total_pago;
                       echo number_format($ca_monto_casa, 2, ',','.'); ?></td>
                                              <td><?php $info_usuario = $this->reporte_library->get_info_usuario_taquilla($row->co_taquilla); 
                   ?>
                   <?php echo ''; ?> 
               </td>
                  </tr>
                                      <?php $ca_monto_final += $ca_monto_casa; endforeach;

                        $ca_monto_pago_usuario_responsable = $ca_monto_final * $info_usuario->ca_porcentaje;
                   ?>    
               </tbody>
                              <tr>
                <td colspan="6" align="right"><b>TOTAL:</b></td>
                <td><span class="font-weight-bold"><?php echo number_format($ca_monto_final, 2, ',','.'); ?> $ </span></td>
                  <td><span class="font-weight-bold"><?php echo number_format($ca_monto_pago_usuario_responsable, 2, ',','.'); ?> $ </span></td>
               </tr>
                                                            <tr>
                <td colspan="6" align="right"><b></b></td>
                <td><span class="font-weight-bold"><?php $ca_monto_final_casa = $ca_monto_final - $ca_monto_pago_usuario_responsable; echo number_format($ca_monto_final_casa, 2, ',','.'); ?> $ </span></td>
                  <td></td>
               </tr>
            </table>
            <?php else: ?>
                <div class="p-4">
            <h4>Sin registro</h4>
            </div>
            <p></p>
            <?php endif; ?>

