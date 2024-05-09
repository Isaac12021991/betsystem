     <script src="<?php echo base_url(); ?>assets/plugins/custom/winwheel/TweenMax.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/custom/winwheel/Winwheel.min.js"></script>

                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Carrera de caballos</h5>
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


        
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




                                <div class="col-lg-12">



                                                                        <div class="row mb-0">
                                        
                                          <div class="col-lg-12">

                                    <table class="table display-5">
                                    <thead>
                                    <tr class="thead-dark">
                                    <th>Hipodromo </th> <th> Carrera nro: <?php echo $info_sala->nu_carrera; ?> </th><th>  </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="table-light"><td><?php echo $info_sala->nb_sede; ?></td><td>Distancia: <?php echo $info_sala->nu_distancia; ?></td><td></td></tr>
                                    </tbody>
                                    <tfoot>
                                    <tr class="table-light"><td colspan="3"><marquee><?php echo $info_sala->nb_anuncio_uno; ?>  <?php echo $info_sala->nb_anuncio_dos; ?></marquee></td></tr>

                                    </tfoot>
                                    </table>


                                      
                                          </div>


                                            
                                    </div>


                                    <?php if($info_sala->nb_estatus == 'CERRADO'): ?>

                                        <?php if($sala_linea_segundo_lugar): ?>

                                   <div class="row justify-content-center align-items-center minh-100">

                                          <div class="col-lg-12 mt-2">

                                            <div class="card card-custom">
                                        <div class="card-header">
                                        <div class="card-title">
                                                <span class="card-icon">
                                                    <i class="flaticon2-chat-1 text-primary"></i>
                                                </span>
                                        <h3 class="card-label">
                                        Ruleta
                                        <small>Escoge la ruleta</small>
                                        </h3>
                                        </div>

                                        </div>
                                        <div class="card-body">



                                            <div class="row">
                                                <div class="col-lg-5 mt-2" >
                                

                                         <img src="<?php echo base_url(); ?>img/ruleta/wheel_back.png" width="60" height="60" style="margin-left:95px; margin-bottom:-4px"/>

                                        <div>
                                <canvas id="canvas" width="250" height="250" align="center" class="ml-0 mt-0">
                                    <p align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                                    </canvas>

                                </div>
                               


                                                </div>

                                                    <div class="col-lg-7 mt-2">
                                                        <?php if($sala_linea_segundo_lugar->nu_posicion_ruleta == 0): ?>
                                                          <a onclick="startSpin(3)" id="response_rueda_girar" class="btn btn-primary font-weight-bold mb-6">Girar rueda</a>
                                                      <?php else: ?>

                                                        <p>La ruleta ha sido girada y la posicion final fue : <?php echo $sala_linea_segundo_lugar->nu_posicion_ruleta; ?></p>

                                                        <?php endif; ?>
                                                        
                                             <table class="table table-bordered table-sm">
                                                <thead>
                                                <tr>
                                                <th  class="text-center align-middle" width="20%"> # </th> 
                                                <th  class="text-center align-middle" width="20%"> Ejemplar </th> 
                                                <th  class="text-center align-middle" width="20%"> Posicion </th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                            <?php foreach ($sala_linea->result() as $row): ?>
                                                <tr>
                                                    <td  class="text-center align-middle">  <span class="btn display-4 pt-1 pb-1" 
                                                        style="background:<?php echo $row->nu_color; ?>"><?php echo $row->nu_casilla; ?></span> </td>

                                                    <td  class="text-center align-middle"> <?php echo $row->nb_competidor; ?> </td>

                                                    <td  class="text-center align-middle"> <?php echo $row->nu_posicion; ?> </td> 
                                                </tr>
                                            <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                            <p>Gana si la ruleta selecciona el caballo que quedo en segunda posicion.<br>

                                            Casilla que quedo en 2 posicion: <b><?php echo $sala_linea_segundo_lugar->nu_casilla ?> <?php echo $sala_linea_segundo_lugar->nb_competidor; ?></b></p>



                                                    </div>

                                            </div>



                                            <div class="row mt-2">
                                    <table class="table table-sm display-4">
                                    <thead>
                                        <tr class="table-primary">
                                            <th class="text-center align-middle" width="50%" scope="col">Pote</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span id="div_pote"><?php echo $info_sala->ca_pote; ?></span></td>
                            
                                        </tr>
 
                                    </tbody>
                                    </table>

                                </div>


                                <div class="row mt-2">
                                    <div class="col-lg-12" id="response_rueda">
                                    </div>

                                </div>


                                      
                                        </div>
                                        </div>

                                          </div>

                                            
    
                                            

                                


                                    </div>

                            <div class="row mt-4">

                                <div class="col-lg-12">
                      


                            </div>
                                            
                                    </div>

                                                                <?php else: ?>

                                <div class="alert alert-custom alert-primary" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">Esta carrera no tiene disponible la ruleta</div>
</div>

                            <?php endif; ?>

                                <?php endif; ?>


      

                                    

                            </div>


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

            <?php if($sala_linea_segundo_lugar): ?>

                var nu_casilla_ganado = '<?php echo $sala_linea_segundo_lugar->nu_casilla ?>';

            // Create new wheel object specifying the parameters at creation time.
            var theWheel = new Winwheel({
                'numSegments'  : '<?php echo $sala_linea->num_rows(); ?>',     // Specify number of segments.
                'outerRadius'  : 125,   // Set outer radius so wheel fits inside the background.
                'innerRadius'     : 50,    
                'textFontSize' : 16,    // Set font size as desired.
                'textOrientation' : 'vertical', // Make text vertial so goes down from the outside of wheel.
                'textAlignment'   : 'outer',
                'segments'     :        // Define segments including colour and text.
                [

                 <?php foreach ($sala_linea->result() as $row): ?>

                   {'fillStyle' : '<?php echo $row->nu_color; ?>', 'text' : '<?php echo $row->nu_casilla; ?>'},

               <?php endforeach; ?>
                ],
                'animation' :           // Specify the animation to use.
                {
                    'type'     : 'spinToStop',
                    'duration' : 5,     // Duration in seconds.
                    'spins'    : '<?php echo $sala_linea->num_rows(); ?>',     // Number of complete spins.
                    'callbackFinished' : alertPrize
                }
            });

            // Vars used by the code in this page to do power controls.
            var wheelPower    = 0;
            var wheelSpinning = false;

            // -------------------------------------------------------
            // Function to handle the onClick on the power buttons.
            // -------------------------------------------------------
            function powerSelected(powerLevel)
            {
                // Ensure that power can't be changed while wheel is spinning.
                if (wheelSpinning == false)
                {
                    // Reset all to grey incase this is not the first time the user has selected the power.
                    document.getElementById('pw1').className = "";
                    document.getElementById('pw2').className = "";
                    document.getElementById('pw3').className = "";

                    // Now light up all cells below-and-including the one selected by changing the class.
                    if (powerLevel >= 1)
                    {
                        document.getElementById('pw1').className = "pw1";
                    }

                    if (powerLevel >= 2)
                    {
                        document.getElementById('pw2').className = "pw2";
                    }

                    if (powerLevel >= 3)
                    {
                        document.getElementById('pw3').className = "pw3";
                    }

                    // Set wheelPower var used when spin button is clicked.
                    wheelPower = powerLevel;

                    // Light up the spin button by changing it's source image and adding a clickable class to it.
                    document.getElementById('spin_button').src = "spin_on.png";
                    document.getElementById('spin_button').className = "clickable";
                }
            }

            // -------------------------------------------------------
            // Click handler for spin button.
            // -------------------------------------------------------
            function startSpin(wheelPower)
            {

                $('#response_rueda_girar').hide();
                // Ensure that spinning can't be clicked again while already running.
                if (wheelSpinning == false)
                {
                    // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                    // to rotate with the duration of the animation the quicker the wheel spins.
                    if (wheelPower == 1)
                    {
                        theWheel.animation.spins = 3;
                    }
                    else if (wheelPower == 2)
                    {
                        theWheel.animation.spins = 8;
                    }
                    else if (wheelPower == 3)
                    {
                        theWheel.animation.spins = 15;
                    }

                    // Disable the spin button so can't click again while wheel is spinning.
                 //   document.getElementById('spin_button').src       = "spin_off.png";
                   // document.getElementById('spin_button').className = "";

                    // Begin the spin animation by calling startAnimation on the wheel object.
                    theWheel.startAnimation();

                    // Set to true so that power can't be changed and spin button re-enabled during
                    // the current animation. The user will have to reset before spinning again.
                    wheelSpinning = true;
                }
            }

            // -------------------------------------------------------
            // Function for reset button.
            // -------------------------------------------------------
            function resetWheel()
            {
                theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
                theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
                theWheel.draw();                // Call draw to render changes to the wheel
                wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
            }

            // -------------------------------------------------------
            // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters
            // note the indicated segment is passed in as a parmeter as 99% of the time you will want to know this to inform the user of their prize.
            // -------------------------------------------------------
            function alertPrize(indicatedSegment)
            {
                // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
                
                

                if (nu_casilla_ganado == indicatedSegment.text){
                    $('#response_rueda').html('<h4 align="center">Felicidades has ganado el pote.</h4>');
                    alert("Felicidades has ganado el pote");

                    }else{

                        $('#response_rueda').html('<h4 align="center">Buen intento, sera para la proxima oportunidad.</h4>');
                        alert("Buen intento, sera para la proxima oportunidad");

                    }

            var co_apuesta_compra = '<?php echo $sala_linea_segundo_lugar->co_apuesta_compra; ?>';

             $.ajax({
                method: "POST",
                data: {'co_apuesta_compra':co_apuesta_compra, 'nu_posicion_ruleta':indicatedSegment.text},
                url: "<?php echo site_url('carrera_caballo/ejecutar_ruleta') ?>",
                }).done(function( data ) { 
   

                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 





            }

        <?php endif; ?>
        </script>