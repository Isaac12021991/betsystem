
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Reportes</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                 <form id="filtro_form" method="GET" action="<?= site_url('/reportes/index') ?>" class="mr-2 ml-2">
                                    <div class="row">
   
                                    <div class="col-6">
                                <select class="form-control form-control-solid form-control-sm mr-0" id="nb_sede" name="nb_sede" onChange="filtro_carrera()">
                                    <option value="">Hipodromo:</option>
                                   <?php foreach($lista_sede->result() as $row){
                                    echo "<option value='".$row->nb_sede."'>".$row->nb_sede."</option>";
                                    } ?>
                                    </select>
                                    </div>

                                                                        <div class="col-6">
                                <select class="form-control form-control-solid form-control-sm mr-0" id="nb_modo_juego" name="nb_modo_juego" onChange="filtro_carrera()">
                                    <option value="">Modo:</option>
                                    <option value="">Todos</option>
                                    <option value="Ganadores">Ganadores</option>
                                    <option value="Remate">Remate</option>
                                    </select>
                                    </div>

                                    </div>

                                    </form>
                                
                                
    
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

           
                                <div class="col-lg-12">


                                    <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Reporte
                                    <small></small>
                                    </h3>
                                    </div>
                                    </div>
                                   <div class="card-body pl-2 pr-2 pt-0">

 <?php if ($list_reportes->num_rows() > 0) : ?>
       <table class="table table-hover dt-responsive nowrap table-sm table-striped" id="myTable">
               <thead>
                  <tr>
                    <th class="all">Hip</th>
                     <th class="all">Carrera #</th>
                     <th class="all">Total tabla</th>
                     <th>Casa Porcentaje</th>
                     <th class="all">Juega Casa</th>
                     <th class="">Tabla casa</th>
                     <th>Pote tablazo</th>
                     <th class="" >Pote</th>
                     <th class="" >Total ganancia casa</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;  ?>
                  <?php $var_end = 0; foreach ($list_reportes->result() as $row) : $con ++; ?>
                  <tr>
                    <td><?php echo $row->nb_sede; ?> </td>
                     <td><?php echo $row->nu_carrera; ?> </td>
                     <td><?php echo $row->ca_total_apuesta; ?> </td>
                     <td><?php echo $ca_porcentaje_casa = $row->ca_total_apuesta * 0.02; ?></td>
                     <td><?php echo $row->ca_total_apuesta_administrador; ?></td>
                     <td><?php if($row->co_usuario == $this->ion_auth->user_id()): 

                     echo $ca_tabla_casa =  $row->ca_monto_pago + $row->ca_pote + $row->ca_pote_tablazo; ?> 

                        <?php else: echo $ca_tabla_casa = 0; ?>
                         
                         <?php endif; ?>
                     </td>
                     <td><?php echo $row->ca_pote_tablazo; ?> </td>
                     <td><?php echo $row->ca_pote; ?> </td>
                     <td>

                        <?php if($row->co_usuario != $this->ion_auth->user_id()): 

                            $var_1 = $ca_porcentaje_casa - $row->ca_total_apuesta_administrador;
                            $total_pote = $row->ca_pote_tablazo + $row->ca_pote;

                            $var_2 = $var_1 - $total_pote;

                            echo $var_3 = $var_2 + $ca_tabla_casa;
                            $var_end += $var_1;

                           endif; ?> 

                            <?php if($row->co_usuario == $this->ion_auth->user_id()): 

                                $total_pote = $row->ca_pote_tablazo + $row->ca_pote;
                                echo $var_1 = $row->ca_total_apuesta -  $row->ca_total_apuesta_administrador + $total_pote;

                                $var_end += $var_1;


                                endif; ?>



                    </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
               <tr>
                <td colspan="8" align="right">TOTAL:</td>
                <td><?php echo $var_end; ?> $</td>
               </tr>
            </table>
            <?php else: ?>
                <div class="p-4">
            <h4>Sin registro</h4>
            </div>
            <p></p>
            <?php endif; ?>


                                    </div>
                                    </div>

                                          



    

                            </div>

                            <div class="col-lg-12">

                                     <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Reporte en vivo ganadores
                                    <small></small>
                                    </h3>
                                    </div>
                                    </div>
                                   <div class="card-body pl-2 pr-2 pt-0">


 <?php if ($list_ganadores->num_rows() > 0) : $ca_monto_final = 0; ?>
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
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;  ?>
                  <?php $var_end = 0; foreach ($list_ganadores->result() as $row) : $con ++; ?>
                  <tr>
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
                  </tr>
                  <?php $ca_monto_final += $ca_monto_casa; endforeach; ?>   
               </tbody>
                              <tr>
                <td colspan="6" align="right"><b>TOTAL:</b></td>
                <td><span class="font-weight-bold"><?php echo number_format($ca_monto_final, 2, ',','.'); ?> $ </span></td>
               </tr>
            </table>
            <?php else: ?>
                <div class="p-4">
            <h4>Sin registro</h4>
            </div>
            <p></p>
            <?php endif; ?>


                                    </div>
                                    </div>



                            </div>

                                                        <div class="col-lg-12">

                                     <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Reporte de taquilla
                                    <small></small>
                                    </h3>
                                    </div>

                                    <div class="card-toolbar">
           <select class="form-control form-control-solid form-control-sm" id="co_taquilla" name="co_taquilla" onchange="filtro_taquillas()">
            <option value="">Taquillas:</option>
             <?php foreach($list_taquillas->result() as $row){
            echo "<option value='".$row->id."'>".$row->nb_taquilla."</option>";
                } ?>
           </select>
        </div>
                                    </div>
                                   <div class="card-body pl-2 pr-2 pt-0" id="reload_reporte_taquilla_usuario">


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
                       <td><?php $info_usuario = $this->reporte_library->get_info_usuario_taquilla($row->co_taquilla); ?>
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


                                    </div>
                                    </div>



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

    $('#nb_sede').val('<?php echo $nb_sede; ?>');
    $('#nb_modo_juego').val('<?php echo $nb_modo_juego; ?>');

    function filtro_carrera() {

$('#filtro_form').submit();
    // body...
}



 $(document).ready(function(){

      $('#myTable').dataTable({searching: false, paging: false, info: false});

      }); // Fin ready




    function filtro_taquillas() {

        var co_taquilla = $('#co_taquilla').val();         

                                                 $.ajax({
   method: "POST",
   data: {'co_taquilla':co_taquilla},
   url: "<?php echo site_url('reportes/reload_ver_sala_taquilla_usuario') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 
   
               $("#reload_reporte_taquilla_usuario").html(data);
   

                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
      
      
 

    // body...
}



function ver_detalle_reporte_taquilla(co_sala) {

    $(location).attr('href',"<?php echo site_url() ?>reportes/ver_sala_taquilla_usuario/"+ co_sala);
}

   
  </script>