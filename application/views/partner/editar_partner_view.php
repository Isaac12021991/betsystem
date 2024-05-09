
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Perfil</h5>
                                    
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted">Empresa</a>
                                            </li>
                                        </ul>
                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                
                                    
                                <a onclick="editar_partner()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

                                <a href="javascript:window.history.back();" class="btn btn-clean font-weight-bolder btn-sm mr-2">Descartar</a>
                                
                                    
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

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-10">



                                    <div class="card card-custom gutter-b">
                                         <div class="card-header">
                                          <div class="card-title">
                                           <h3 class="card-label">
                                            Editar
                                            <small>Editar informacion de la empresa</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Identificacion:</label>
                                               <div class="col-9">
                                                  <input type="text" name="nu_identificacion" id="nu_identificacion" class="form-control input-lg" placeholder="Identificacion" value="<?php echo $info_partner->nu_rif; ?>">
                                               </div>
                                              </div>
                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Nombre:</label>
                                               <div class="col-9">
                                               <input type="text" name="nb_partner" id="nb_partner" class="form-control" placeholder="Nombre" value="<?php echo $info_partner->nb_empresa; ?>">
                                               </div>
                                              </div>


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Representante:</label>
                                               <div class="col-9">
    
                                            <input type="text" name="nb_representante" id="nb_representante" class="form-control" placeholder="Representante" value="<?php echo $info_partner->nb_representante; ?>">  
                                               </div>
                                              </div>

                                          </div>

                                           <div class="col-lg-6">


                                                 <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Telefono:</label>
                                               <div class="col-9">
    
                                                <input type="text" name="nu_telefono" id="nu_telefono" class="form-control" value="<?php echo $info_partner->nu_telefono_celular; ?>" placeholder="Telefono / Celular">  
                                               </div>
                                              </div>


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Email:</label>
                                               <div class="col-9">
                                             <input type="text"  name="tx_email" id="tx_email" class="form-control" value="<?php echo $info_partner->tx_email; ?>" placeholder="Email">  
                                               </div>
                                              </div>


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Porcentaje Casa %:</label>
                                               <div class="col-9">
                                             <input type="number" max="100" min="1"  name="ca_porcentaje" id="ca_porcentaje" class="form-control" value="<?php echo $info_partner->ca_porcentaje * 100; ?>" placeholder="Porcentaje Casa">  
                                               </div>
                                              </div>


                                           </div>
                                           </div>

                                           <div class="row">

                                            <div class="col-lg-12">
                                            
                            <ul class="nav nav-tabs nav-tabs-line">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Ubicacion</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Usuarios</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-5" id="myTabContent">
                                        <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
                                                    <div class="row">
                                                 <div class="col-lg-6">


                                                    <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Direccion:</label>
                                               <div class="col-9">
                                                 <textarea class="form-control" id="tx_direccion" name="tx_direccion"><?php echo $info_partner->tx_direccion; ?></textarea>
                                               </div>
                                              </div>


        
                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Latitud:</label>
                                               <div class="col-9">
                                                  <input type="text" name="tx_latitud" value="<?php echo $info_partner->tx_latitud; ?>" id="tx_latitud" class="form-control" placeholder="Latitud">  
                                               </div>
                                              </div>


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Longitud:</label>
                                               <div class="col-9">
                                             <input type="text" name="tx_longitud" id="tx_longitud" class="form-control" placeholder="Longitud" value="<?php echo $info_partner->tx_longitud; ?>">  
                                               </div>
                                              </div>

                                                 </div>
                                                 <div class="col-lg-6">


                                        <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Estado:</label>
                                           <div class="col-9">
                                                <select id="nb_estado_accion" name="nb_estado_accion" class="form-control" onchange="buscar_municipio(this.value)">
                                                  <option value="">Sin estado</option>
                                             <?php foreach($estados->result() as $row){echo "<option value='".$row->nb_estado."'>".$row->nb_estado."</option>";} ?>
                                                </select>  
                                           </div>
                                          </div>

                                          <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Municipio:</label>
                                           <div class="col-9">
                                            <div id="div_municipio">
                                            <select id="nb_municipio_accion" name="nb_municipio_accion" class="form-control" onchange="buscar_parroquia(this.value)">
                                              <option value="">Sin municipio</option>
                                        
                                         <?php foreach($municipios->result() as $row){echo "<option value='".$row->nb_municipio."'>".$row->nb_municipio."</option>";} ?>
                                             
                                            </select>
                                            </div>
                                           </div>
                                          </div>


                                          <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Parroquia:</label>
                                           <div class="col-9">
                                            <div id="div_parroquia">
                                            <select id="nb_parroquia_accion" name="nb_parroquia_accion" class="form-control">
                                              <option value="">Sin parroquia</option>
                                         <?php foreach($parroquias->result() as $row){echo "<option value='".$row->nb_parroquia."'>".$row->nb_parroquia."</option>";} ?>
                                            </select>
                                            </div>
                                           </div>
                                          </div>



                                                 </div>


                                             </div>


    </div>
    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
        
            <div class="row">
            <div class="col-lg-12">

                 <?php if (isset($usuarios_partner)) : ?>
                <?php if ($usuarios_partner->num_rows() > 0) : ?>
                  <table class="table table-sm" width="100%">
                     <thead>
                        <tr>
                           <th width="30%">Nombre y Apellido</th>
                           <th width="10%">Seudonimo</th>
                           <th width="10%">Correo</th>
                            <th width="10%">Estado</th>
                           <th width="5%">Accion</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php foreach ($usuarios_partner->result() as $row) : ?>
                        <tr>
                            <td><?php echo $row->first_name; ?> <?php echo $row->last_name; ?>  </td>
                            <td><?php echo $row->username; ?> </td>
                           <td><?php echo $row->email; ?> </td>
                           <td><?php if ($row->in_activo == true):  echo 'Activo'; else: echo 'Desactivado'; endif; ?> </td>
                           <td>                         



                                                    <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="javascript::" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-0">

                                                         <li class="navi-item">
                                                                    <a href="javascript::" onclick="abrir_modal_permiso_usuario(<?php echo $row->co_usuario_partner; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Permisos</span>
                                                                    </a>
                                                                </li>

         
                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_usuario_partner(<?php echo $row->co_usuario_partner; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Suspender</span>
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
                  <?php endif; ?>
                  <?php else: ?>
                    <h4>Sin resultados</h4>
                  <?php endif; ?>

                    <a class="btn btn-sm btn-light-primary" onclick="abrir_modal_agregar_usuario_partner('<?php echo $co_partner; ?>')" title="Agregar"> Agregar usuario</a> 


            </div>

            </div>

    </div>

</div>
    </div>


                                           </div>


                                             </div>
                                             </form>
                                             
   
                                        </div>









                                </div>



                                <div class="col-lg-1"></div>

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

    function buscar_municipio(nb_estado) {

        $('#nb_parroquia_accion').val('');

                               $.ajax({
        method: "POST",
        data: {'nb_estado':nb_estado},
        url: "<?php echo site_url('partner/buscar_municipio') ?>",
                     }).done(function( data ) { 

                        $('#div_municipio').html(data);

   
                      }).fail(function(){


                    alert('Fallo');


                      }); 


        // body...
    }

        function buscar_parroquia(nb_municipio) {

                               $.ajax({
        method: "POST",
        data: {'nb_municipio':nb_municipio},
        url: "<?php echo site_url('partner/buscar_parroquia') ?>",
                     }).done(function( data ) { 

                        $('#div_parroquia').html(data);

   
                      }).fail(function(){


                    alert('Fallo');


                      }); 


        // body...
    }


   
                   function abrir_modal_agregar_usuario_partner(co_partner) {


                            $.get("<?php echo site_url('partner/agregar_usuario_partner') ?>" + "/"+co_partner,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }

                                             function abrir_modal_documento(co_partner) {


                            $.get("<?php echo site_url('partner/agregar_documento') ?>" + "/"+co_partner,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


                    function abrir_modal_permiso_usuario(co_partner) {

                            $.get("<?php echo site_url('partner/editar_usuario_partner_permisos') ?>" + "/"+co_partner,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }




                            



    $(document).ready(function() {


      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   



});




$('#nb_estado_accion').val('<?php echo $info_partner->nb_estado; ?>');
$('#nb_municipio_accion').val('<?php echo $info_partner->nb_municipio; ?>');
$('#nb_parroquia_accion').val('<?php echo $info_partner->nb_parroquia; ?>');





function editar_partner()
{

    
    var co_partner = '<?php echo $co_partner; ?>';
    var nu_identificacion = $('#nu_identificacion').val(); 
    var nb_partner = $('#nb_partner').val(); 
    var nb_representante = $('#nb_representante').val(); 
    var nu_telefono = $('#nu_telefono').val(); 
   var tx_email = $('#tx_email').val();
   var tx_direccion = $('#tx_direccion').val();
   var nb_estado = $('#nb_estado_accion').val(); 
   var nb_municipio = $('#nb_municipio_accion').val(); 
   var nb_parroquia = $('#nb_parroquia_accion').val(); 
    var tx_latitud = $('#tx_latitud').val(); 
   var tx_longitud = $('#tx_longitud').val();
   var ca_porcentaje = $('#ca_porcentaje').val(); 
   var tx_condiciones = '';


               if (nu_identificacion == '') {

          toastr.error("Ingrese el numero de identificacion", 'Error');
           $('#nu_identificacion').focus();
           return;

    };



        if (nb_partner == '') {

          toastr.error("Ingrese el nombre de la empresa", 'Error');
          $('#nb_partner').focus();
           return;

    };


                               $.ajax({
        method: "POST",
        data: {'co_partner':co_partner,'nu_identificacion':nu_identificacion,'nb_partner':nb_partner, 'nu_telefono':nu_telefono, 'tx_direccion':tx_direccion, 'tx_email':tx_email, 'nb_estado':nb_estado, 'nb_municipio':nb_municipio, 'nb_parroquia':nb_parroquia, 'tx_latitud':tx_latitud, 'tx_longitud':tx_longitud, 'tx_condiciones':tx_condiciones, 'nb_representante':nb_representante, 'ca_porcentaje':ca_porcentaje},
        url: "<?php echo site_url('partner/actualizar_partner_editar') ?>",
                     }).done(function( data ) { 

                      var obj = JSON.parse(data);

                      if (obj.error > 0)

                      {
      
                        toastr.error(obj.message, 'Error');
                        return;


                      }else{
      
                   toastr.success(obj.message, 'Exito');
  
                $(location).attr('href',"<?php echo site_url() ?>cuenta/cuenta"); 
                    
                

                      }

   
                      }).fail(function(){


                    alert('Fallo');


                      }); 




}




   function eliminar_usuario_partner(co_usuario_partner)
   {
   

   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar registro',
   content: '¿Estas seguro que deseas eliminar este usuario?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
    $.ajax({
   method: "POST",
   data: {'co_usuario_partner':co_usuario_partner},
   url: "<?php echo site_url('partner/eliminar_usuario_partner') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
               toastr.success(obj.message, 'Eliminado');
   
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


