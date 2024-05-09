
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Cuentas bancarias</h5>
                                    
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

                                <a onclick="crear_cuenta()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            <small>Crear cuenta</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">


                                                <div class="row">

                                                 <div class="col-lg-6">


                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label"><span class="font-red-mint"> * </span>Nombre del diario</label>
                                               <div class="col-9">
                                                 <input type="text" name="nb_diario" id="nb_diario" class="form-control form-control-solid" placeholder="Nombre del diario"> 
                                               </div>
                                              </div>

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Tipo de diario:</label>
                                               <div class="col-9">
                                                                          <select id="tx_tipo_diario" name="tx_tipo_diario" class="form-control input-sm">
                                              <option value="Efectivo">Efectivo</option>
                                              <option value="Banco">Banco</option>
                                              <option value="General">General</option>
                                           </select>
                                               </div>
                                              </div>


                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label"><span class="font-red-mint"> * </span>Cedula o Rif</label>
                                               <div class="col-9">
                                                 <input type="text" class="form-control input-sm" placeholder="Cedula o Rif" id="tx_id_titular" name="tx_id_titular">
                                               </div>
                                              </div>


                                          </div>

                                           <div class="col-lg-6">

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Banco:</label>
                                               <div class="col-9">
                                                <select id="co_banco" name="co_banco" class="form-control">
                                                    <?php foreach ($list_banco->result() as $row): ?>
                                                      <option value="<?php echo $row->id; ?>"><?php echo $row->nb_banco; ?></option>
                                                      
                                                    <?php endforeach ?>

                                                   </select>
                                               </div>
                                              </div>


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Cuenta bancaria:</label>
                                               <div class="col-9">
                                     <input type="text" class="form-control" placeholder="0000000000000000" maxlength="20" id="nu_cuenta" name="nu_cuenta">
                                               </div>
                                              </div>


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label"><span class="font-red-mint"> * </span>Nombre del titular</label>
                                               <div class="col-9">
                                                <input type="text" class="form-control" placeholder="Titular" id="tx_nb_titular" name="tx_nb_titular">
                                               </div>
                                              </div>


                                           </div>


                                           </div>


                                                    <div class="row">

                                                 <div class="col-lg-12">

                                             <h3 class="font-size-lg text-dark font-weight-bold mb-6">Otra informacion:</h3>

                                                 </div>

                                             </div>


                                                    <div class="row">

                                            <div class="col-lg-6">

                                                <div class="form-group row mb-2">
                                                <label  class="col-3 col-form-label">Moneda</label>
                                                   <div class="col-9">
                                                <select id="co_moneda" name="co_moneda" class="form-control">
                                                <?php foreach ($list_moneda->result() as $row): ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->nb_moneda; ?></option>

                                                <?php endforeach ?>

                                                </select>
                                                   </div>
                                                  </div>


                                                  <div class="form-group row mb-2">
                                                <label  class="col-3 col-form-label">Descripcion</label>
                                                   <div class="col-9">
                                        <textarea class="form-control" id="tx_descripcion" name="tx_descripcion"></textarea>
                                                   </div>
                                                  </div>


                                                             </div>

                                                              <div class="col-lg-6">

                                <div class="form-group row mb-2">
                            <label  class="col-3 col-form-label">Tipo de cuenta</label>
                                               <div class="col-9">
                           <select id="tx_tipo_cuenta" name="tx_tipo_cuenta" class="form-control">
                              <option value="">No aplica</option>
                              <option value="Ahorro">Ahorro</option>
                              <option value="Corriente">Corriente</option>
                           </select>
                                               </div>
                                              </div>

                         <div class="form-group row mb-2">
                            <label  class="col-3 col-form-label">Email</label>
                         <div class="col-9">
                            <input type="text" class="form-control" placeholder="Email" id="tx_email" name="tx_email">
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



<script type="text/javascript">


      $(document).ready(function(){



                 }); // Fin ready



    function crear_cuenta() 
   
   {    
       var nb_diario = $('#nb_diario').val();
       var co_banco = $('#co_banco').val();
       var nu_cuenta = $('#nu_cuenta').val();
       var co_moneda = $('#co_moneda').val();
       var tx_email = $('#tx_email').val();
       var tx_descripcion = $('#tx_descripcion').val();
       var tx_tipo_diario = $('#tx_tipo_diario').val();
       var tx_tipo_cuenta = $('#tx_tipo_cuenta').val();
       var tx_id_titular = $('#tx_id_titular').val();
       var tx_nb_titular = $('#tx_nb_titular').val();
        

                  if (nb_diario == '') {
   
        toastr.error("Ingrese el nombre del diario", 'Error');
       $('#nb_diario').focus()
         return;
   
       };
        

        if (tx_tipo_diario == 'Banco'){


           if (nu_cuenta == '') {

       toastr.error("Ingrese el numero de cuenta", 'Error');
       $('#nu_cuenta').focus()
         return;
   
       };

                  if (co_banco == '') {
   

        toastr.error("Seleccione un banco", 'Error');
       $('#co_banco').focus()
         return;
   
       };


  


        }

                                 if (tx_nb_titular == '') {

       toastr.error("Ingrese el nombre del titular", 'Error');
       $('#tx_nb_titular').focus()
         return;
   
   
       };

                         if (tx_id_titular == '') {
   

       toastr.error("Ingrese la cedula o el rif del titular", 'Error');
       $('#tx_nb_titular').focus()
         return;
   
   
       };

   

   

   
                              $.ajax({
           method: "POST",
           data: {'nb_diario':nb_diario, 'tx_tipo_diario':tx_tipo_diario, 'co_banco':co_banco, 'tx_descripcion':tx_descripcion, 'co_moneda':co_moneda, 'tx_email':tx_email, 'nu_cuenta':nu_cuenta, 'tx_tipo_cuenta':tx_tipo_cuenta, 'tx_id_titular':tx_id_titular, 'tx_nb_titular':tx_nb_titular},
           url: "<?php echo site_url('cuenta_banco/guardar_cuenta_banco_base') ?>",
                        }).done(function( data ) { 
   
                         var obj = JSON.parse(data);
   
                         if(obj.error == 0){
   
                        $(location).attr('href',"<?php echo site_url() ?>cuenta_banco/index"); 
   
   
                         }else{
   

                                toastr.error(obj.message, 'Error');
                           return;
   
   
                         }
   
   
                         }).fail(function(){
   
                       alert('Fallo');
   
   
                         }); 
   
   
   }

   
   
                                
</script>
