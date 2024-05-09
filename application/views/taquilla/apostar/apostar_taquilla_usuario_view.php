<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva apuesta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

 <!--begin::Form-->
 <form>

        <div class="row">
     <div class="col-lg-6 col-md-12 col-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Ejemplar</label>
    <div class="col-9">
     <select class="form-control" id="co_sala_linea" name="co_sala_linea">
        <?php foreach($list_ejemplar->result() as $row){
        echo "<option value='".$row->id."'>".$row->nu_casilla."</option>";
        } ?>
        </select>  
    
    </div>
   </div>
</div>

     <div class="col-lg-6 col-md-12 col-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Lugar a apostar</label>
    <div class="col-9">
     <select class="form-control" id="nu_posicion_apuesta" name="nu_posicion_apuesta">
        <option value="1">Primer lugar</option>
         <option value="2">Segundo lugar</option>
        </select>  
    
    </div>
   </div>
</div>


</div>

    <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Identificacion</label>
    <div class="col-9">
         <input type="text" name="nu_identificacion" id="nu_identificacion" maxlength="25" class="form-control" placeholder="Cedula, Rif, Pasaporte" value="">

    </div>
   </div>
</div>

     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Nombre</label>
    <div class="col-9">
     <input type="text" name="nb_nombre" id="nb_nombre" maxlength="25" class="form-control" placeholder="Nombre" value="">
    </div>
   </div>
</div>

</div>


    <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="display:none;">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Apellido</label>
    <div class="col-9">
         <input type="text" name="nb_apellido" id="nb_apellido" maxlength="25" class="form-control" placeholder="Apellido" value="">

    </div>
   </div>
</div>

     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Monto</label>
    <div class="col-9">
     <input type="number" name="ca_monto_apuesta_taquilla" id="ca_monto_apuesta_taquilla" maxlength="50" class="form-control" placeholder="Monto" value="1" min="1">
    </div>
   </div>
</div>

</div>






 </form>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="ejecutar_apuesta_taquilla()" class="btn btn-light-primary font-weight-bold mr-2">Apostar</a>

            </div>



  <script type="text/javascript">

  
             function ejecutar_apuesta_taquilla()
   {

    var co_sala_linea =  $('#co_sala_linea').val();
    var nu_identificacion =  $('#nu_identificacion').val();
    var nb_nombre =  $('#nb_nombre').val();
    var nb_apellido =  $('#nb_apellido').val();
    var ca_monto_apuesta_taquilla =  $('#ca_monto_apuesta_taquilla').val();

    var nu_posicion_apuesta =  $('#nu_posicion_apuesta').val();
    var co_sala =  '<?php echo $co_sala; ?>';
    var co_taquilla =  '<?php echo $co_taquilla; ?>';

    if (ca_monto_apuesta_taquilla == 0) {
        toastr.error('ingrese el monto de la apuesta', 'Error');
        return;
    }

        if (ca_monto_apuesta_taquilla < 0) {
        toastr.error('ingrese el monto de la apuesta', 'Error');
        return;
    }

        if (ca_monto_apuesta_taquilla == '') {
        toastr.error('ingrese el monto de la apuesta', 'Error');
        return;
    }

           if (nu_identificacion == '') {
        toastr.error('ingrese una identifiacion del usuario, ejem: Cedula, Rif, Pasaporte, Celular', 'Error');
        return;
    }

       if (nb_nombre == '') {
        toastr.error('ingrese el nombre del usuario', 'Error');
        return;
    }
   
   
              $.ajax({
   method: "POST",
   data: {'co_sala_linea':co_sala_linea, 'nu_posicion_apuesta':nu_posicion_apuesta, 'ca_monto_apuesta_taquilla':ca_monto_apuesta_taquilla, 'co_sala':co_sala, 'co_taquilla':co_taquilla, 'nu_identificacion':nu_identificacion, 'nb_nombre':nb_nombre, 'nb_apellido':nb_apellido},
   url: "<?php echo site_url('carrera_caballo/ejecutar_apuesta_taquilla') ?>",
            }).done(function(data) { 

                   var obj = JSON.parse(data);
                   
                        if (obj.error == 0) {


        $('#ajax_remote').modal('hide');
        location.reload();                        
        $('#ca_monto_apuesta').val(0);
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                              

   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   }


</script>