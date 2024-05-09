<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

 <!--begin::Form-->
 <form>

                <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="alert alert-success" role="alert" id="resp_info_ganador" align="center">
            <h4>Elija posicion final</h4>
    
</div>
</div>


</div>


            <div class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Ejemplar</label>
    <div class="col-9">
    <select class="form-control" id="co_sala_linea" name="co_sala_linea">
    <?php foreach($info_linea_sala->result() as $row){
    echo "<option value='".$row->id."'>".$row->nu_casilla.' '.$row->nb_competidor."</option>";
    } ?>
    </select>  
    </div>
   </div>
</div>



     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Posicion Final</label>
    <div class="col-9">
             <input type="number" name="nu_posicion" id="nu_posicion" maxlength="50" class="form-control" placeholder="Posicion" value="0" onchange="cambiar_posicion()">
    
    </div>
   </div>
</div>

     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Pagar ejemplar</label>
    <div class="col-9">

            <select id="in_ejecutar_pago" name="in_ejecutar_pago" class="form-control form-control-solid">
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
    
    </div>
   </div>
</div>


</div>

<?php if ($info_sala->nb_modo_juego == 'Ganadores'): ?>

    <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Dividendo</label>
    <div class="col-9">
         <input type="text" name="ca_dividendo" id="ca_dividendo" maxlength="25" class="form-control" placeholder="Casilla" value="0">

    </div>
   </div>
</div>

     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Monto INH</label>
    <div class="col-9">
     <input type="number" name="ca_monto_inh" id="ca_monto_inh" maxlength="50" class="form-control" placeholder="Monto INH" value="0">
    </div>
   </div>
</div>

</div>

<?php endif; ?>


 </form>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="agregar_ganador()" class="btn btn-light-primary font-weight-bold mr-2">Agregar</a>

            </div>



  <script type="text/javascript">

    function cambiar_posicion() {

        var nu_posicion =  $('#nu_posicion').val();

        if(nu_posicion == 1){

            $('#resp_info_ganador').html('<h4>¡Ganador! Primer Lugar</h4>');

        }else{

            $('#resp_info_ganador').html('<h4>'+nu_posicion+' Lugar </h4>');
        }
        // body...
    }

  
     function agregar_ganador(){   


  var co_sala_linea =  $('#co_sala_linea').val();   
  var nu_posicion =  $('#nu_posicion').val();
  var ca_monto_inh =  $('#ca_monto_inh').val();
  var ca_dividendo =  $('#ca_dividendo').val();
var in_ejecutar_pago =  $('#in_ejecutar_pago').val();

        if (co_sala_linea == '') {
         toastr.error('Seleccione el ejemplar ganador', 'Error');
         $('#co_sala_linea').focus();
         return;

    };


      if (nu_posicion == '') {
         toastr.error('Ingrese el posicion final del ganador', 'Error');
         $('#nu_posicion').focus();
         return;

    };


          if (nu_posicion == 0) {
         toastr.error('Ingrese el posicion final del ganador', 'Error');
         $('#nu_posicion').focus();
         return;

    };

     KTApp.block('.modal-content');

                           $.ajax({
    method: "POST",
    data: {'co_sala_linea':co_sala_linea, 'nu_posicion':nu_posicion, 'ca_monto_inh':ca_monto_inh, 'co_sala':'<?php echo $co_sala ?>', 'ca_dividendo':ca_dividendo, 'in_ejecutar_pago':in_ejecutar_pago},
    url: "<?php echo site_url('carrera_caballo/agregar_ganador') ?>",
                 }).done(function(data) { 

                   KTApp.unblock('.modal-content');
                   
                $("#reload_sala_linea").load('<?php echo site_url('carrera_caballo/reload_linea_sala/') ?>' + '<?php echo $co_sala ?>');
                $('#ajax_remote').modal('hide');
      
   
                  }).fail(function(){
                KTApp.unblock('.modal-content'); 
   
                alert('Error de conexion');
   
   
                  }); 
   }

</script>