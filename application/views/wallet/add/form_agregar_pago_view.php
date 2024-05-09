
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Wallet</h5>
                                    
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted">Abonar</a>
                                            </li>
                                        </ul>

                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                <a onclick="abonar()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            Abonar
                                            <small>Abonar monto</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Monto:</label>
                                               <div class="col-9">
                                                <input type="text" name="ca_monto" id="ca_monto" class="form-control form-control-solid ca_monto_mask" placeholder="Monto"> 
                                               </div>
                                              </div>

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Descripcion:</label>
                                               <div class="col-9">
                                                 <textarea class="form-control form-control-solid" maxlength="50" id="tx_descripcion" name="tx_descripcion" placeholder="Descripcion del pago"></textarea>
                                               </div>
                                              </div>


                                          </div>

                                           <div class="col-lg-6">

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Fecha de pago:</label>
                                               <div class="col-9">
                                                  <input type="text" name="ff_pago" id="ff_pago" class="form-control date_picker" autocomplete="off" placeholder="Fecha de pago" value="">
                                               </div>
                                              </div>

                                                                                           <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Cuenta destino:</label>
                                               <div class="col-9">
                                                <select id="co_diario" name="co_diario" class="form-control">
                                                    <?php foreach ($lista_diario->result() as $row): ?>
                                                      <option value="<?php echo $row->id; ?>"><?php echo $row->nb_diario; ?></option>
                                
                                                    <?php endforeach ?>

                                                   </select>
                                               </div>
                                              </div>

                                               <?php if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")): ?> 

                                            <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Usuarios:</label>
                                               <div class="col-9">
                                                <select id="co_usuario" name="co_usuario" class="form-control js-example-basic-single">
                                                    <?php foreach ($lista_usuario->result() as $row): ?>
                                                      <option value="<?php echo $row->id; ?>"><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></option>
                                                    <?php endforeach ?>

                                                   </select>
                                               </div>
                                              </div>

                                          <?php endif; ?>

                                           </div>
                                           </div>

                                           <div class="row">

                                            <div class="col-lg-12">
                                            
                 <ul class="nav nav-tabs nav-tabs-line">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Adjunto</a>
    </li>
</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
                        <div class="row">


            <div class="col-lg-6">

                         <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Adjunto:</label>

           <div class="col-9">
                <div class="image-input image-input-outline" id="kt_image_1">
            <div class="image-input-wrapper" style="background-image: url('<?php echo base_url(); ?>img/producto_publicaciones/producto-sin-imagen.jpg');"></div>
            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Cambiar imagen">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="nb_url_foto" id="nb_url_foto" accept=".png, .jpg, .jpeg">

            </label>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancelar foto">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>

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



<script type="text/javascript">


      <?php if($this->usuario_library->permiso_empresa("'USUARIO'")): ?> 

document.body.style.backgroundColor = "#002505";

<?php endif; ?>


      $(document).ready(function(){

          $('.ca_monto_mask').mask('000.000.000.000.000,00', {reverse: true});


        $('#tx_descripcion').maxlength({
            threshold: 20
        });

    $('.js-example-basic-single').select2();

$('.date_picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true,
    orientation: "bottom"
    });


                 }); // Fin ready



   function abonar()
   {

                  var ca_monto = $('#ca_monto').val();
                  var tx_descripcion = $('#tx_descripcion').val();
                  var ff_pago = $('#ff_pago').val(); 
                   var co_diario = $('#co_diario').val();

                    <?php if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")): ?> 
                   var co_usuario = $('#co_usuario').val();

                <?php else: ?>
                var co_usuario = '<?php echo $this->ion_auth->user_id(); ?>'
                <?php endif; ?>

                  var nb_url_foto = document.getElementById('nb_url_foto');


             
         if (ca_monto == '') {
   
          toastr.error("Ingrese el monto", 'Error');
           $('#ca_monto').focus();
            return;
   
       };


         if (ca_monto == 0) {
   
          toastr.error("Ingrese el monto", 'Error');
           $('#ca_monto').focus();
            return;
   
       };

                if (ca_monto < 0) {
   
          toastr.error("Ingrese el monto", 'Error');
           $('#ca_monto').focus();
            return;
   
       };

                if (ff_pago == '') {
             toastr.error("Ingrese la fecha de pago", 'Error');
           $('#ff_pago').focus();
            return;
   
       };
            var file = nb_url_foto.files[0];

            var data = new FormData();

            data.append('mi_archivo', file);
            data.append('ca_monto', ca_monto);
            data.append('ff_pago', ff_pago);
            data.append('co_diario', co_diario);
            data.append('tx_descripcion', tx_descripcion);
            data.append('co_usuario', co_usuario);

            var url = "<?php echo site_url('wallet/ejecutar_abonar') ?>";

            KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.2,
              state: 'primary' // a bootstrap color
             });


                $.ajax({
                url:url,
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false}).done(function( data ) { 

                    KTApp.unblockPage();
                   var obj = JSON.parse(data);



                       if (obj.error == 0) {

                     $(location).attr('href',"<?php echo site_url() ?>wallet/index");
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   

   
                                      
</script>


