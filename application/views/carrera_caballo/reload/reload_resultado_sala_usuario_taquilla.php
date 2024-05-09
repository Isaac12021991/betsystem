 <?php if($sala_linea_posiciones->num_rows() > 0): ?>

                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-primary text-center align-middle" width="50%">Lugar</th>
                                                            <th class="text-primary text-center align-middle" width="50%">Ejemplar</th>
    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($sala_linea_posiciones->result() as $key): ?>
                                                        <tr>
                                                            <td class="text-center align-middle" scope="row"><?php if($key->nu_posicion == 1): ?> <b>Ganador</b>  <?php elseif($key->nu_posicion == 2): ?> <b>Place</b>  <?php else: ?> <?php echo $key->nu_posicion; ?> 

                                                            Lugar  <?php endif; ?> </td>

                                                            <td class="text-center align-middle"><?php echo $key->nu_casilla.' '.$key->nb_competidor; ?></td>
                                                            <?php $info_ganador = $this->carrera_caballo_library->get_info_mi_posicion_ganado($key->co_sala, $this->ion_auth->user_id(), $key->nu_posicion); ?>

                                                           
                                                        </tr>
                                                         <?php endforeach ?>

                                                    </tbody>
                                                </table>

                                                
                                        <?php if ($this->carrera_caballo_library->get_info_mi_posicion_ganado($info_sala->id, $this->ion_auth->user_id(), 2)): ?>
                                           <script type="text/javascript">

                                            abrir_ruleta();
                                               
                                               alert('segundo lugar');
                                           </script>
                                        <?php endif; ?>
   
                                                <?php else: ?>

                                                <h4 align="text-center">ESPERANDO RESULTADOS ...</h4>

                                                <?php endif; ?>


<script type="text/javascript">
    


</script>