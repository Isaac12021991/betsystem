                    <!--begin::Content-->
                    <?php $info_empresa_partner = $this->ion_auth->info_partner_todo(); ?>
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Inicio</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                
                                       
                                    
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

                                <div class="col-lg-8">

                                    <?php $info_sala = $this->inicio_library->get_publicidad_sala('INICIO'); ?>
                                    <?php if($info_sala->num_rows() > 0): ?>

                                        <?php foreach ($info_sala->result() as $row): ?>

                                        <div class="card card-custom mb-6">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 p-8 card-rounded bgi-no-repeat d-flex align-items-center" style="background-color: #FFF4DE; background-position: left bottom; background-size: auto 100%; background-image: url(<?php echo base_url(); ?>assets/media/svg/humans/custom-2.svg)">
                                                    <div class="row">
                                                        <div class="col-12 col-xl-5"></div>
                                                        <div class="col-12 col-xl-7">
                                                            <h4 class="text-primary font-weight-bolder"><?php echo $row->nb_deporte; ?> </h4>
                                                            <p class="text-dark-50 my-5 font-size-xl font-weight-bold"><?php echo $row->tx_descripcion; ?></p>
                                                            <a href='<?php echo site_url("carrera_caballo/ver_sala_modo_usuario/$row->id") ?>' class="btn btn-primary font-weight-bold py-2 px-6">Ver sala</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>

                                    <?php endif; ?>

                                    <?php if($disciplina_activa->num_rows() > 0): ?>
                                        <?php foreach ($disciplina_activa->result() as $row): ?>

                                        <div class="card card-custom">
                                     <div class="card-header">
                                      <div class="card-title">
                                                <span class="card-icon">
                                                    <i class="flaticon2-chat-1 text-primary"></i>
                                                </span>
                                       <h3 class="card-label">
                                      <?php  echo $row->nb_deporte; ?>
                                       </h3>
                                      </div>
                                            <div class="card-toolbar">
                                                Proximas carreras
                                            </div>
                                     </div>
                                     <div class="card-body">
                                          
                                        <?php $info_sala =  $this->inicio_library->get_info_sala($row->nb_deporte); ?>
                                        <div class="row">
                                        <?php foreach ($info_sala->result() as $key): ?>

                                            <div class="col-lg-6">

                                                <h4><?php echo $key->nb_sede; ?> <small> <?php echo 'Carrera: '.$key->nu_carrera; ?></small></h4>
                                                <span class="text-muted font-weight-bold"><?php echo $key->nb_modo_juego; ?></span>
                                         <?php $info_sala_linea =  $this->inicio_library->get_info_sala_linea($key->id); ?>

                                              <?php foreach ($info_sala_linea->result() as $key_linea): ?>
                                                
                                             <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Bullet-->
                                                   <div class="symbol symbol-45 symbol-light mr-4">
                                                                    <span class="symbol-label">
                                                                        <span class="svg-icon svg-icon-2x svg-icon-dark-50">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span>
                                                                    </span>
                                                                </div>
        
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1">
                                                        <a href="javascript:" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1"><?php echo $key_linea->nb_competidor ?></a>
                                                        <span class="text-muted font-weight-bold">Casilla: <?php echo $key_linea->nu_casilla; ?></span>
                                                    </div>



                                                </div>


                                                 <?php endforeach ?>

                                                 <a href='<?php echo site_url("carrera_caballo/ver_sala_modo_usuario/$key->id") ?>' class="btn btn-primary mt-4 p-2">Ver sala</a>

                                                </div>


                                            
                                        <?php endforeach ?>

                                        </div>


                                           
                                     </div>
                                    </div>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <h4>Sin registro</h4>

                                <?php endif; ?>
                                    
                                
                                </div>

                             <div class="col-lg-4">

                                <div class="card card-custom gutter-b">
                                 <div class="card-header">
                                  <div class="card-title">
                                   <h3 class="card-label">
                                    Resultados
                                    <small>ultimos resultados</small>
                                   </h3>
                                  </div>
                                 </div>
                                 <div class="card-body">

                                    <?php if ($deporte_resultado->num_rows() > 0): $co_sala = 0; ?>

                                        <?php foreach ($deporte_resultado->result() as $row): ?>
                                        <?php if($row->id != $co_sala): $co_sala = $row->id; ?>
                                            <h5><?php echo $row->nb_deporte; ?></h5>
                                            <span class="text-muted font-weight-bold"><?php echo $row->nb_sede; ?> <?php echo $row->nu_carrera; ?><br></span>

                                            <?php endif; ?>

                                           
                                              <span class="text-dark font-weight-bold"> <?php echo $row->nu_posicion; ?>:  <?php echo $row->nb_competidor; ?><br> </span>

                                            


                                        <?php endforeach; ?>

                                    <?php else: ?>

                                        <h4>No hay resultados pendiente</h4>
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


<script type="text/javascript">


 


</script>