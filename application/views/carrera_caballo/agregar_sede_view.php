<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo hipodromo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

 <!--begin::Form-->
 <form>

    <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Nombre</label>
    <div class="col-9">
     <input type="text" name="nb_sede_modal" id="nb_sede_modal" maxlength="50" class="form-control" placeholder="Hipodromo" value="">
    </div>
   </div>
</div>


</div>

 </form>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="agregar_sede()" class="btn btn-light-primary font-weight-bold mr-2">Agregar</a>

            </div>



  <script type="text/javascript">

  
     function agregar_sede(){
   
  var nb_sede_modal =  $('#nb_sede_modal').val();


      if (nb_sede_modal == '') {
         toastr.error('Ingrese el hipodromo', 'Error');
         $('#nb_sede_modal').focus();
         return;

    };

     KTApp.block('.modal-content');

                           $.ajax({
    method: "POST",
    data: {'nb_sede_modal':nb_sede_modal},
    url: "<?php echo site_url('carrera_caballo/ejecutar_agregar_sede') ?>",
    beforeSend: function(){  },
                 }).done(function(data) { 

                    var obj = JSON.parse(data);

                   KTApp.unblock('.modal-content');

                $('#nb_sede').prepend("<option value='"+obj.message+"'>"+obj.message+"</option>");

                $('#nb_sede').val(obj.message);
                   
                $('#ajax_remote').modal('hide');
      
   
                  }).fail(function(){
                KTApp.unblock('.modal-content'); 
   
                alert('Error de conexion');
   
   
                  }); 
   }

</script>