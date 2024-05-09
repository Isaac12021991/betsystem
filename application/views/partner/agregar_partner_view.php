
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Clubes</h5>
                                    
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted">Crear</a>
                                            </li>
                                        </ul>
                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                
                                    
                                <a onclick="agregar_partner()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            Crear
                                            <small>Crear nueva empresa</small>
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
                                                  <input type="text" name="nu_identificacion" id="nu_identificacion" class="form-control input-sm input-lg" placeholder="Identificacion" value="">
                                               </div>
                                              </div>
                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Nombre:</label>
                                               <div class="col-9">
                                               <input type="text" name="nb_partner" id="nb_partner" class="form-control input-sm" placeholder="Nombre" value="">
                                               </div>
                                              </div>


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Representante:</label>
                                               <div class="col-9">
    
                                            <input type="text" name="nb_representante" id="nb_representante" class="form-control input-sm" placeholder="Representante" value="">  
                                               </div>
                                              </div>

                                          </div>

                                           <div class="col-lg-6">


                                                 <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Telefono:</label>
                                               <div class="col-9">
    
                                                <input type="text" name="nu_telefono" id="nu_telefono" class="form-control input-sm" value="" placeholder="Telefono / Celular">  
                                               </div>
                                              </div>


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Email:</label>
                                               <div class="col-9">
                                             <input type="text"  name="tx_email" id="tx_email" class="form-control" value="" placeholder="Email">  
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
                                            <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Usuario</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-5" id="myTabContent">
                                        <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
                                                    <div class="row">
                                                 <div class="col-lg-6">


                                                    <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Direccion:</label>
                                               <div class="col-9">
                                                 <textarea class="form-control" id="tx_direccion" name="tx_direccion"></textarea>
                                               </div>
                                              </div>


        
                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Latitud:</label>
                                               <div class="col-9">
                                                  <input type="text" name="tx_latitud" value="" id="tx_latitud" class="form-control input-sm" placeholder="Latitud">  
                                               </div>
                                              </div>


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Longitud:</label>
                                               <div class="col-9">
                                             <input type="text" name="tx_longitud" id="tx_longitud" class="form-control input-sm" placeholder="Longitud" value="">  
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
                                                 <div class="col-lg-6">


                                                    <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Seudonimo:</label>
                                               <div class="col-9">
                                                  <input type="text" name="username" value="" id="username" class="form-control" placeholder="Seudonimo"> 
                                               </div>
                                              </div>


                                                 </div>
                                                 <div class="col-lg-6">


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Clave:</label>
                                               <div class="col-9">
                                                <input type="password" autocomplete="off" name="password" id="password" class="form-control" placeholder="Contraseña" value="">
                                               </div>
                                              </div>


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Repetir Clave:</label>
                                               <div class="col-9">
                                           <input type="password" name="password_repeat" autocomplete="off" id="password_repeat" class="form-control" placeholder="Confirmar contraseña" maxlength="50" value=""> 
                                               </div>
                                              </div>




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





                            



    $(document).ready(function() {


      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   



});





function agregar_partner()
{

    
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
    var tx_condiciones = '';

    var password_repeat = $('#password_repeat').val(); 
    var password = $('#password').val();
    var username = $('#username').val();


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


      if (tx_email == '') {
         toastr.error('Ingrese el email', 'Error');
         $('#tx_email').focus();
         return;

    };


      if (username == '') {
         toastr.error('Ingrese el seudonimo', 'Error');
         $('#username').focus();
         return;

    };


                          if(password.length <= 4){

      toastr.error('Ingrese un minimo de 6 caracateres en su contraseña', 'Error');
      $('#nu_cedula').focus();
      return false;
    }


       if ($('#password').val() != $('#password_repeat').val()) {

         toastr.error('Las contraseña no son iguales por favor verifique', 'Error');
         $('#password').focus();
         return;

       }

              if ($('#password').val() == '') {

         toastr.error('Ingrese una contraseña', 'Error');
         $('#password').focus();
         return;

       }

          


                               $.ajax({
        method: "POST",
        data: {'nu_identificacion':nu_identificacion,'nb_partner':nb_partner, 'nu_telefono':nu_telefono, 'tx_direccion':tx_direccion, 'tx_email':tx_email, 'nb_estado':nb_estado, 'nb_municipio':nb_municipio, 'nb_parroquia':nb_parroquia, 'tx_latitud':tx_latitud, 'tx_longitud':tx_longitud, 'tx_condiciones':tx_condiciones, 'nb_representante':nb_representante, 'username':username, 'password':password},
        url: "<?php echo site_url('partner/agregar_partner') ?>",
                     }).done(function( data ) { 

                        alert(data);
                        return;

                      var obj = JSON.parse(data);

                      if (obj.error > 0)

                      {
      
                        toastr.error(obj.message, 'Error');
                        return;


                      }else{
      
                   toastr.success(obj.message, 'Exito');
  
                $(location).attr('href',"<?php echo site_url() ?>partner/index"); 
                    
                

                      }

   
                      }).fail(function(){


                    alert('Fallo');


                      }); 




}



                                      
</script>


