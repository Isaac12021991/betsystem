          <script src="<?php echo base_url(); ?>assets/plugins/custom/jquery.timeago/jquery.timeago.js"></script>

      <link href="<?php echo base_url(); ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Carrera de caballos</h5>
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


        <div class="btn-group ml-2">
                    <button type="button" class="btn btn-sm btn-light-primary font-weight-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accion
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" style="">
                        <a class="dropdown-item" onclick="accion_masiva_check('Iniciar')" href="javascript::">Abrir</a>
                        <a class="dropdown-item" onclick="accion_masiva_check('Finalizar')" href="javascript::">Cerrar</a>
                        <a class="dropdown-item" href="javascript::" onclick="accion_masiva_check('Eliminar')">Eliminar</a>
                    </div>
                </div>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                       <form action="<?= site_url('/carrera_caballo/index') ?>" id="filtro_form"  method="GET">
                                        <div class="row">
                                            

                                   
                                            <div class="col-9">
                                 <div class='input-group' id='kt_daterangepicker_6'>
                                  <input type='text' class="form-control form-control-solid" onchange="filtro_carrera()" readonly  placeholder="Seleccione fecha" id="rango_fecha" name="rango_fecha"/>
                                  <div class="input-group-append">
                                   <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                  </div>
                                 </div>

                             </div>


                                <div class="col-3">

                                <div class="dropdown">

                                    <!--begin::Toggle-->
                                    <div class="topbar-item" data-toggle="dropdown">
                                        <div class="btn btn-sm btn-dropdown mr-2">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span> 
                                        </div>
                                    </div>

                                    <!--end::Toggle-->

                                    <!--begin::Dropdown-->
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up" id="menu_dropdown">
                                       

                                        
<!--begin::Header-->
                                            <div class="d-flex align-items-center py-4 px-4 bgi-size-cover bgi-no-repeat rounded-top" 
                                            style="background-image: url(<?php echo base_url(); ?>assets/media/misc/bg-1.jpg)">
                                                <span class="btn btn-md btn-icon bg-white-o-15 mr-4">
                                                    <i class="flaticon-search text-primary"></i>
                                                </span>
                                                <h4 class="text-white m-0 flex-grow-1 mr-3">Filtrar</h4>
                                            </div>

                                            <!--end::Header-->

                                            <!--begin::Scroll-->
                                            <div class="scroll scroll-push" data-scroll="true" data-height="400" data-mobile-height="200">

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center justify-content-between p-2">
                   
                                                <div class="card-body">


                                                <div class="form-group row mb-1">
                                                <label for="example-search-input" class="col-12 col-lg-3 col-form-label">Modo de Juego</label>
                                                <div class="col-12 col-lg-9">
                                                         <select class="form-control form-control-solid form-control-sm mr-0" id="nb_modo_juego" name="nb_modo_juego">
                                                                <option value="">Modo de Juego:</option>
                                                                <option value="">Todo</option>
                                                                <option value="Remate">Remate</option>
                                                                <option value="Ganadores">Ganadores</option>
                                                                </select>
                                                </div>
                                                </div>


                                                    <div class="form-group row mb-1">
                                                    <label for="example-email-input" class="col-12 col-lg-3 col-form-label">Hipodromo</label>
                                                    <div class="col-12 col-lg-9">

                                <select class="form-control form-control-solid form-control-sm" id="nb_sede" name="nb_sede">
                                    <option value="">Todos:</option>
                                   <?php foreach($lista_sede->result() as $row){
                                    echo "<option value='".$row->nb_sede."'>".$row->nb_sede."</option>";
                                    } ?>
                                    </select>
                                                    </div>
                                                    </div>


                                                    <div class="form-group row mb-1">
                                                    <label for="example-email-input" class="col-12 col-lg-3 col-form-label">Estatus</label>
                                                    <div class="col-12 col-lg-9">

                                                    <select class="form-control form-control-solid form-control-sm" id="nb_estatus" name="nb_estatus">
                                                        <option value="">Todos</option>
                                                        <option value="ABIERTO">ABIERTO</option>
                                                        <option value="CERRADO">CERRADO</option>
                                                        <option value="FINALIZADO">FINALIZADO</option>
                                                    
                                                        </select>
                                                    </div>
                                                    </div>

                                                    <h5 class="font-weight-bolder mt-4 mb-4">Ordenar</h5>


                                                    <div class="form-group row mb-1">
                                                    <label for="example-email-input" class="col-12 col-lg-3 col-form-label">Ordenar por</label>
                                                    <div class="col-12 col-lg-9">

                                                    <select class="form-control form-control-solid form-control-sm" id="ordenar_registro" name="ordenar_registro">

                                                    <optgroup label="Fecha de Creacion">
                                                    <option selected='selected' value="order by a.ff_sistema_time desc">RECIENTEMENTE</option>
                                                        <option value="order by a.ff_sistema_time asc">MAS ANTIGUA</option>
                                                    </optgroup>

                                                        <optgroup label="Fecha de Inicio de actividad">
                                                        <option value="order by a.ff_inicio_actividad_time asc">MAS CERCANA</option>
                                                        <option value="order by a.ff_inicio_actividad_time desc">MAS LEJOS</option>
                                                    </optgroup>

                                                        </select>
                                                    </div>
                                                    </div>




                                                    </div>


    
                                                </div>


                                                <!--end::Item-->

                                                <!--begin::Separator-->
                                                <div class="separator separator-solid"></div>


                                                <!--end::Item-->
                                            </div>

                                            <!--end::Scroll-->

                                            <!--begin::Summary-->
                                            <div class="p-4">
  
                                                <div class="text-right">
                                                    <button onclick="filtro_carrera()" class="btn btn-primary btn-sm text-weight-bold">Aplicar</button>
                                                </div>
                                            </div>

                                            <!--end::Summary-->

                                        
                                    </div>

                                    <!--end::Dropdown-->
                                </div>
                            </div>
                                           </div>

                                        </form>  
                                          
                  
                                          
                                    
                                <a href="<?php echo site_url("carrera_caballo/nueva_carrera");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>

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


                                    <div class="card card-custom gutter-b" id="div_body">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Salas
                                    <small></small>
                                    </h3>
                                    </div>
                                    <div class="card-toolbar">
                                                            
                                     </div>
                                    </div>
                                    <div class="card-body pl-2 pr-2 pt-0">

                                          <?php $con = 0; if (isset($salas)) : ?>
             <?php if ($salas->num_rows() > 0) : ?>
            
            <table class="table table-hover dt-responsive nowrap table-sm table-striped" id="myTable" width="100%">
               <thead class="">
                  <tr>
                    <th class="text-center align-middle"><input type="checkbox" name="checkall" id="checkall" /></th>
                    <th>Creado el</th>
                     <th class="all">Modo de Juego</th>
                     <th>Carrera </span> </th>
                     <th class="text-center align-middle"> Hipodromo</th>
                     <th class="text-center align-middle">Distancia</th>
                     <th class="text-center align-middle all">Estatus</th>
                     <th class="text-center align-middle all"></th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($salas->result() as $row) : ?>
                  <tr>
                    <td class="text-center align-middle"> <input type="checkbox" class="checkbox_comprobar check_get" name="accion_check" id="accion_check" value="<?php echo $row->id; ?>" />   </td>
                    <td>   <?php if($row->ff_sistema_time != 0): ?>  <?php echo date('d-m-Y',$row->ff_sistema_time); ?><br> <?php echo date('h:i:s a', $row->ff_sistema_time); ?> <?php endif; ?>  <span class="d-block d-sm-none">  <?php echo date('d-m-Y',$row->ff_sistema_time); ?>  </td>
                     <td> <?php echo $row->nb_modo_juego; ?> <span class="d-block d-lg-block"> <?php echo $row->nb_sede; ?> </span> </td>
                     <td>  N° <?php echo $row->nu_carrera; ?> <br>

                         <time class="timeago" datetime="<?php echo $row->ff_inicio_actividad; ?>">
                             <?php if($row->ff_inicio_actividad != ''): echo time_stamp_inicio_evento(date('Y-m-d H:i:s', strtotime($row->ff_inicio_actividad))); endif; ?></time>

                        </td>
                     <td class="text-center align-middle">  <?php echo $row->nb_sede; ?> </td>
                     <td class="text-center align-middle">  <?php echo $row->nu_distancia; ?> </td>
                      <td class="text-center align-middle"> 
                        <?php if($row->nb_estatus == 'EN ESPERA'): ?> <span class="label label-lg label-light-primary label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                      <?php if($row->nb_estatus == 'ABIERTO'): ?> <span class="label label-lg label-light-success label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                       <?php if($row->nb_estatus == 'CERRADO'): ?> <span class="label label-lg label-light-info label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
               <?php if($row->nb_estatus == 'FINALIZADO'): ?> <span class="label label-lg label-light-danger label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                        </td>
                     <td class="text-center align-middle">

                                        <div class="dropdown dropdown-inline mr-4">
                    <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="ki ki-bold-more-hor"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <a class="dropdown-item" href='<?php echo site_url("carrera_caballo/editar_carrera/$row->id");?>'>Editar</a>
                        <a class="dropdown-item" href="<?php echo site_url("carrera_caballo/ver_sala_modo_administrador/$row->id");?>">Ver carrera</a>
                         <?php if($row->nb_estatus == 'CERRADO'): ?> 
                        <a class="dropdown-item" onclick="elegir_ganador(<?php echo $row->id; ?>)" href="javascript:">Elegir ganador</a>
                    <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="cambiar_estatus('ABIERTO', '<?php echo $row->id; ?>')" href="javascript:">Iniciar</a>

                       <a class="dropdown-item" onclick="cambiar_estatus('CERRADO', '<?php echo $row->id; ?>')" href="javascript:">Cerrar</a>

                        <a class="dropdown-item" onclick="cambiar_estatus('FINALIZADO', '<?php echo $row->id; ?>')" href="javascript:">Finalizar</a>

                         <div class="dropdown-divider"></div>

                     <a class="dropdown-item" onclick="duplicar_registro('<?php echo $row->id; ?>')" href="javascript:">Duplicar</a>

                        <a class="dropdown-item" onclick="eliminar_carrera_caballo(<?php echo $row->id; ?>)" href="javascript:">Eliminar</a>


                    </div>
                </div>


     



                     </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
      
            <?php else: ?>
                <span class="text-center p-4">
            <h4>Sin registros</h4>
            <p>No se encontrado carreras</p>
        </span>
            <?php endif; ?>
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

    $('#menu_dropdown').on('click', function(event){
    // The event won't be propagated up to the document NODE and 
    // therefore delegated events won't be fired
    event.stopPropagation();
});




   $("time.timeago").timeago();

//document.getElementById('div_body').style.display='none';


   $("#checkall").change(function () {
   
   $("input:checkbox").prop('checked', $(this).prop("checked"));
   
   
   });



$('#nb_modo_juego').val('<?php echo $nb_modo_juego; ?>');
$('#nb_sede').val('<?php echo $nb_sede; ?>');

$('#nb_estatus').val('<?php echo $nb_estatus; ?>');

$('#ordenar_registro').val('<?php echo $ordenar_registro; ?>');





function filtro_carrera() {

$('#filtro_form').submit();
    // body...
}



   $(document).ready(function(){

        <?php if($rango_fecha == ''): ?>
    $('#rango_fecha').val( moment().format('DD-MM-YYYY') + ' / ' + moment().format('DD-MM-YYYY'));

    <?php else: ?>

 $('#rango_fecha').val('<?php echo $rango_fecha; ?>');
<?php endif; ?>



      var start = moment().subtract(29, 'days');
  var end = moment();



      $('#kt_daterangepicker_6').daterangepicker({
   buttonClasses: ' btn',
   applyClass: 'btn-primary',
   cancelClass: 'btn-secondary',

   startDate: start,
   endDate: end,
   ranges: {
   'Hoy': [moment(), moment()],
   'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
   'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
   'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
   'Este Mes': [moment().startOf('month'), moment().endOf('month')],
   'Pasado mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
   }
  }, function(start, end, label) {
   $('#rango_fecha').val( start.format('DD-MM-YYYY') + ' / ' + end.format('DD-MM-YYYY'));
   filtro_carrera();
  });
 



    document.getElementById('div_body').style.display='block';

   $('#myTable').dataTable({searching: false, paging: false, info: false, aaSorting: []});

      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
   

                        function elegir_ganador(co_sala) {

                            $.get("<?php echo site_url('carrera_caballo/elegir_ganador/') ?>" + co_sala,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


                                  function eliminar_carrera_caballo(co_sala)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar',
   content: '¿Estas seguro que deseas eliminar esta sala?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
            $.ajax({
   method: "POST",
   data: {'co_sala':co_sala},
   url: "<?php echo site_url('carrera_caballo/eliminar_carrera_caballo') ?>",
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              $(location).attr('href',"<?php echo site_url() ?>carrera_caballo/index");
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });

   
   
   }


   
            function cambiar_estatus(nb_estatus, co_sala)
   {

                KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.2,
              state: 'primary' // a bootstrap color
             });
   
    $.ajax({
   method: "POST",
   data: {'nb_estatus':nb_estatus, 'co_sala':co_sala},
   url: "<?php echo site_url('carrera_caballo/cambiar_estatus_carrera') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 

                    KTApp.unblockPage();

                    var obj = JSON.parse(data);


                      if (obj.error == 0) {

                     location.reload();
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }


   

                 }).fail(function(){

                KTApp.unblockPage();
   
               alert('Fallo');
   
   
                 }); 
      
      
   
   }


    function duplicar_registro(co_sala)
   {
   


   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Duplicar',
   content: '¿Estas seguro que deseas duplicar esta sala?.',
   type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
            $.ajax({
   method: "POST",
   data: {'co_sala':co_sala},
   url: "<?php echo site_url('carrera_caballo/duplicar_registro') ?>",
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              $(location).attr('href',"<?php echo site_url() ?>carrera_caballo/editar_carrera/" + obj.message);
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }



   
   function accion_masiva_check(nb_accion)
   {
   

        var selected = new Array();
        $(".check_get:checked").each(function () {
            selected.push(this.value);
        });

      if (selected.length === 0) { toastr.error("Error", 'Por favor seleccione una carrera');  return false; }


      

   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: nb_accion,
   content: '¿Estas seguro que deseas '+nb_accion+' estas carreras ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'input_check':selected, 'nb_accion':nb_accion},
   url: "<?php echo site_url('carrera_caballo/accion_masiva_check') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
                toastr.info("Exito", obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }
   
</script>
