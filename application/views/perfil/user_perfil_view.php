                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">

                  <div class="page-bar">

                              <h4>Mi perfil</h4>
                              <div class="page-toolbar pull-left">
                          
                              </div>

                          <div class="page-toolbar pull-right"></div>
                          </div>

                <h1 class="page-title">    </h1>
                        <!-- BEGIN PAGE HEADER-->
                        <div class="row">

            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 ">


              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Informacion Personal
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                    <tr>
                    <td width="90%"><a href="<?php echo site_url('perfil/personal')?>"> <span id="ver_usuarios_activos"> Personal  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                    <tr>
                    <td width="90%"><a href="<?php echo site_url('perfil/email')?>"> <span id="ver_usuarios_activos"> Email  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                      <tr>
                    <td width="90%"><a href="<?php echo site_url('perfil/password')?>"> <span id="ver_usuarios_activos"> Contraseña  </span> </a></td>
                    <td width="10%"></td>
                    </tr>
                  </table>
                        </div>
                    </div>
                </div>

            </div>
              <?php  if ($this->usuario_library->perfil(array('ADMINISTRADOR'))): ?>
                                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Empresa
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                                          <tr>
                    <td width="90%"><a href="<?php echo site_url('bancos/index')?>">Bancos </a></td>
                    <td width="10%"></td>
                    </tr>

                    <tr>
                    <td width="90%"><a href="<?php echo site_url('empresa/index')?>">Empresa </a></td>
                    <td width="10%"></td>
                    </tr>

                          <tr>
                            <td width="90%"><a href='<?php echo site_url("almacen/index");?>'> <span class="items_menu" id="listado_nota_despachos"> Almacen  </span> </a></td>
                            <td width="10%"></td>
                         </tr>


                               <tr>
                            <td width="90%"><a href="<?php echo site_url('cuenta_banco/index')?>"> <span class="items_menu" id="cuentas_bancarias"> Cuentas bancarias  </span> </a></td>
                            <td width="10%"></td>
                         </tr>

                  </table>
                        </div>
                    </div>
                </div>

            </div>

          <?php endif; ?>


                                               <div class="list-group">
                                            <span class="list-group-item active">
                                                <h4 class="list-group-item-heading">Super Usuario</h4>
                                                <p class="list-group-item-text" id="info_adicional"> Modulo administrativo Super Usuario </p>
                                            </span>

                                            </div>




                                        <!-- END MENU -->
                                    </div>




                                   <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 ">

                                <div class="portlet light">
                                    <div class="portlet-body">

                      <h4 class="block"><?php echo $perfil->first_name; ?> <?php echo $perfil->last_name; ?></h4>
                  <p> Usted ha ingresado a <b>MI PERFIL</b>, si desea realizar algun cambio en su perfil de usuario en la parte izquierda de su pantalla encontrará las secciones de su cuenta. </p>

                                    </div>
                                </div>









                            </div>

                                  
                                </div>


                    </div>
                    <!-- END CONTENT BODY -->
                </div>



                                            <div class="modal fade bs-modal-lg" id="ajax_editar" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                 <div class="modal-content">
                                                    <div class="modal-body">
                                                        <span> &nbsp;&nbsp;Cargando... </span>
                                                    </div>
                                                </div>

                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>



                                    


                                    
<script type="text/javascript">

 $(document).ready(function(){

   $('#tabla_1').DataTable( {
   "responsive": true,
   "order": [],
   "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
   });

      }); // Fin ready
  </script>