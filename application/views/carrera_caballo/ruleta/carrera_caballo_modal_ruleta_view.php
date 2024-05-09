     <script src="<?php echo base_url(); ?>assets/plugins/custom/winwheel/TweenMax.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/custom/winwheel/Winwheel.min.js"></script>

<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tablazo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">





                            <div class="row p-0">


                          <div  class="bgi-no-repeat bgi-size-cover p-0" style="background-image: url(<?php echo base_url(); ?>img/ruleta/ruleta_tablazo.png); background-size: 305px 328px; height:320px;">
                             
           
                                    
                                                  <canvas id="canvas" width="280" height="300" align="center" class="ml-4 mt-8">
                                    <p align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                                    </canvas>


          


                </div>

                <div class="col-lg-12 mt-2" id="response_rueda">
                </div>

                <div class="col-lg-12">

                <?php if($sala_linea_segundo_lugar->nu_posicion_ruleta != 0): ?>

        <p align="center" class="font-weight-bold">La ruleta ha sido girada y la posicion final fue : <?php echo $sala_linea_segundo_lugar->nu_posicion_ruleta; ?></p>

        <?php endif; ?>

            </div>

            </div>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">
                        <span class="symbol symbol-80">
        <img alt="Pic" src="<?php echo base_url(); ?>/img/ruleta/ruleta_atras.jpeg"/>
    </span>
</button>
                <?php if($sala_linea_segundo_lugar->nu_posicion_ruleta == 0): ?>
                 <a onclick="startSpin(3)"  id="response_rueda_girar" class="btn">
                                            <span class="symbol symbol-80">
        <img alt="Pic" src="<?php echo base_url(); ?>/img/ruleta/ruleta_activar_tablazo.jpeg"/>
    </span> </a>
                 <?php endif; ?>

            </div>




<script type="text/javascript">

            <?php if($sala_linea_segundo_lugar): $con = 0; ?>

       

                var nu_casilla_ganado = '<?php echo $sala_linea_segundo_lugar->nu_casilla ?>';

            // Create new wheel object specifying the parameters at creation time.
            var theWheel = new Winwheel({
                'numSegments'  : '17',     // Specify number of segments.
                'outerRadius'  : 125,   // Set outer radius so wheel fits inside the background.
                'innerRadius'     : 70,    
                'textFontSize' : 14,    // Set font size as desired.
                'textOrientation' : 'horizontal', // Make text vertial so goes down from the outside of wheel.
                'textAlignment'   : 'outer',
                'segments'     :        // Define segments including colour and text.
                [

                 <?php foreach ($sala_linea->result() as $row): $con ++; ?>
                        
                   {'fillStyle' : '<?php echo $row->nu_color; ?>', 'text' : '<?php echo $row->nu_casilla; ?>',  'textFillStyle' : '<?php echo $row->nu_color_letra; ?>'},


               <?php endforeach; ?>




               <?php if($con <= 17): ?>

               <?php $list_color = $this->carrera_caballo_library->get_color_competidor_by_id($con); ?>

                <?php foreach ($list_color->result() as $row): ?>

                {'fillStyle' : '<?php echo $row->nu_color; ?>', 'text' : '<?php echo $row->id; ?>',  'textFillStyle' : '<?php echo $row->nu_color_letra; ?>'},

                    
                <?php endforeach ?>



               <?php endif;  ?>

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