<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Ejemplar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

 <!--begin::Form-->
 <form>

        <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Ejemplar</label>
    <div class="col-9">
             <input type="text" name="nb_competidor" id="nb_competidor" maxlength="50" class="form-control" placeholder="Competidor" value="">
    
    </div>
   </div>
</div>


</div>

    <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Casilla</label>
    <div class="col-9">
        <?php $con = $consecutivo->num_rows() + 1; ?> 
         <input type="text" name="nu_casilla" id="nu_casilla" maxlength="25" class="form-control" placeholder="Casilla" value="<?php echo $con; ?>">

    </div>
   </div>
</div>

     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Monto Inicial</label>
    <div class="col-9">
     <input type="number" name="ca_monto" id="ca_monto" maxlength="50" class="form-control" placeholder="Monto" value="0">
    </div>
   </div>
</div>

</div>

    <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Color</label>
    <div class="col-9">

        <select class="form-control" name="nu_color" id="nu_color">
        <?php foreach($list_color->result() as $row){
        echo "<option value='".$row->nu_color."'>".$row->nb_color."</option>";
        } ?>
            </select>

    </div>
   </div>
</div>

     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

</div>

</div>




 </form>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="agregar_ejemplar()" class="btn btn-light-primary font-weight-bold mr-2">Agregar</a>

            </div>



  <script type="text/javascript">

    var con = '<?php echo $con; ?>';



      if(con == 1){$('#nu_color').val('#F10303');} 
      if(con == 2){$('#nu_color').val('#FFFFFF');} 
      if(con == 3){$('#nu_color').val('#032FB0');} 
      if(con == 4){$('#nu_color').val('#F5F500');} 
      if(con == 5){$('#nu_color').val('#073D00');} 
      if(con == 6){$('#nu_color').val('#000000');}
        if(con == 7){$('#nu_color').val('#F14109');} 
      if(con == 8){$('#nu_color').val('#F1285C');} 
      if(con == 9){$('#nu_color').val('#00A3D3');} 
      if(con == 10){$('#nu_color').val('#6841F7');} 
      if(con == 11){$('#nu_color').val('#3BD502');} 
      if(con == 12){$('#nu_color').val('#FFFFFF');} 
        if(con == 13){$('#nu_color').val('#F10303');} 
      if(con == 14){$('#nu_color').val('#3A1603');} 
      if(con == 15){$('#nu_color').val('#9E0A00');} 
      if(con == 16){$('#nu_color').val('#FFFFFF');} 




  
     function agregar_ejemplar(){
   
  var nb_competidor =  $('#nb_competidor').val();
  var ca_monto =  $('#ca_monto').val();
  var nu_casilla =  $('#nu_casilla').val();
  var nu_color =  $('#nu_color').val();


      if (nb_competidor == '') {
         toastr.error('Ingrese el ejemplar', 'Error');
         $('#nb_competidor').focus();
         return;

    };


     KTApp.block('.modal-content');

                           $.ajax({
    method: "POST",
    data: {'nb_competidor':nb_competidor, 'ca_monto':ca_monto, 'nu_casilla':nu_casilla, 'nu_color':nu_color},
    url: "<?php echo site_url('carrera_caballo/add_tmp_ejemplar') ?>",
    beforeSend: function(){  },
                 }).done(function(data) { 

                   KTApp.unblock('.modal-content');
                   
                $("#reload_tmp_competidor").load('<?php echo site_url('carrera_caballo/reload_leer_tmp_competidor') ?>');
                $('#ajax_remote').modal('hide');
      
   
                  }).fail(function(){
                KTApp.unblock('.modal-content'); 
   
                alert('Error de conexion');
   
   
                  }); 
   }

</script>