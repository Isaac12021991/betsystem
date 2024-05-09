<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inicio extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('inicio_model');
         $this->load->library('excel');
         $this->load->library('encrypt');
         $this->load->library('inicio_library');

    }
    function getRemoteFile($url, $timeout = 3) {
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return ($file_contents) ? $file_contents : FALSE;
}


    public function index() {
        
       if (!$this->ion_auth->logged_in()) {
            redirect('auth/index');
            return;
        }

        if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")): 

            redirect('carrera_caballo/index');

        endif;


         if($this->usuario_library->get_info_usuario_taquilla($this->ion_auth->user_id())):

              redirect('taquilla/index');


        endif;


         if($this->usuario_library->permiso_empresa("'USUARIO'")): 

              redirect('carrera_caballo/index');

        endif;

            $data['dolar_paralelo'] = $this->inicio_model->get_last_dolar_model();

            // Buscar disciplina pronto
            $data['disciplina_activa'] = $this->inicio_model->get_disciplina_activa();
            $data['deporte_resultado'] = $this->inicio_model->get_deporte_resultado();

           //  $data['class_body'] = 'page-full-width';
            $this->load->view('layout/header_aside_view', $data);
            $this->load->view('layout/left_sidebar_view');
            $this->load->view('inicio/inicio_view');
            $this->load->view('layout/footer_view');

    }


    function info()

    {

    $this->load->view('inicio/landing_page/header.html');
    $this->load->view('inicio/landing_page/index.html');
    $this->load->view('inicio/landing_page/footer.html');

    }

        function reglamentos()

    {

    $this->load->view('inicio/landing_page/header.html');
    $this->load->view('inicio/landing_page/reglamentos.html');
    $this->load->view('inicio/landing_page/footer.html');


    }

            function condiciones()

    {

    $this->load->view('inicio/landing_page/header.html');
    $this->load->view('inicio/landing_page/condiciones.html');
    $this->load->view('inicio/landing_page/footer.html');


    }

                function contacto()

    {

    $this->load->view('inicio/landing_page/header.html');
    $this->load->view('inicio/landing_page/contacto.html');
    $this->load->view('inicio/landing_page/footer.html');


    }

                    function clubes()

    {

    $data["partner"] = $this->inicio_model->get_partner();
    $this->load->view('inicio/landing_page/header.html');
    $this->load->view('inicio/landing_page/clubes.html', $data);
    $this->load->view('inicio/landing_page/footer.html');


    }


        public function webservice_get_track() {

$severKey="czBMdVFKZ2tUYWMzbGlLOWlqcXdxUkRPOEV6Mjo5Njc3YjI5YS1mOTY3LTQ2YjUtYjA0Ny0xYTU3YjM0ODMxOGE=";
$url_principal="http://api.horseapi.com/tracks";



$header=array(
    'Authorization: '.$severKey,
    'Content-Type: application/json'
);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url_principal);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result=curl_exec($ch);

    $data = json_decode($result);

    if(is_null($data)):
        echo 'Nada';
        die();
    endif;

     foreach ($data as $key => $value):

        if ($value->id == '') {
            continue;
        }

        $info_hipodromo_existente = $this->verificar_hipodromo_existente($value->id);

        if ($info_hipodromo_existente) {
            

            continue;

        }else{

        $this->db->trans_start();

        $i001t_sede['nb_sede_codigo']      = $value->id;
        $i001t_sede['nb_sede']      = $value->name;
        $i001t_sede['nb_deporte ']      = 'CABALLO';
        $i001t_sede['in_webservice']      = 'SI';
        $this->db->insert("i001t_sede", $i001t_sede);

        $this->db->trans_complete();

        }



     endforeach;

     curl_close($ch);



        
 }


    public function get_carrera_api_horse() {



    $severKey="czBMdVFKZ2tUYWMzbGlLOWlqcXdxUkRPOEV6Mjo5Njc3YjI5YS1mOTY3LTQ2YjUtYjA0Ny0xYTU3YjM0ODMxOGE=";


$header=array(
    'Authorization: '.$severKey,
    'Content-Type: application/json'
);


        // Obtener sedes

    $info_sedes_webservice = $this->get_sedes_webservice();

        if($info_sedes_webservice):

            foreach ($info_sedes_webservice->result() as $row):

                for ($i=1; $i < 15; $i++):

                    $estatus_actual = '';

                    
                    $info_carrera_existente = $this->verificar_carrera_existente($row->nb_sede_codigo, $i);

                        if(!$info_carrera_existente):


                            $url_secundaria ="http://api.horseapi.com/races/$row->nb_sede_codigo/$i";

                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL,$url_secundaria);
                            curl_setopt($ch, CURLOPT_POST, false);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                            $result=curl_exec($ch);

                                $data2 = json_decode($result);

                                if(is_null($data2)):
                                    echo 'Nada';
                                    die();
                                endif;



                                    foreach ($data2 as $key2 => $value2):

                                    // LLenan primera tabla

                                    if(!is_array($value2)):


                                        $j082t_sala['nu_carrera']     = $i;
                                        $j082t_sala['nb_sede']    = $row->nb_sede;
                                        $j082t_sala['nb_sede_codigo']    = $row->nb_sede_codigo;
                                        

                                    if ($key2== 'status'):

                                    if ($value2== 'OPEN'):

                                        $estatus_actual = 'OPEN';

                                        $j082t_sala['nb_estatus'] = 'ABIERTO';
                                        $j082t_sala['ff_activacion_time']      = time();

                                     endif;

                                      if ($value2== 'RACE_OFF'):

                                        continue;


                                     endif;

                                    endif;

                                        if ($key2== 'distance'):
                                       $j082t_sala['nu_distancia']      = $value2;
                                        endif;


                                        if ($key2== 'estimatedStartTime'):
                                            
                                       $j082t_sala['ff_inicio_actividad']      = $value2;
                                       $j082t_sala['ff_inicio_actividad_time']      = strtotime($value2);

                                       $ff_cierre_time = strtotime($value2) - 60;
                                       $diferencia = $ff_cierre_time - time();


                                       $j082t_sala['ff_cierre_time']      = $ff_cierre_time;
                                       $j082t_sala['ca_minutos_cierre_time'] = $diferencia;
                                       $j082t_sala['ca_minutos_cierre']      = $diferencia / 60;

                                        
                                       
                                        endif;

                                        

                                    endif;


                                    endforeach;


                                        if ($estatus_actual != 'OPEN'): continue; endif;
                                        $this->db->trans_start();

                                        $j082t_sala['ca_minutos_cierre']         = 0;
                                        $j082t_sala['nb_modo_juego']      = 'Ganadores';
                                        $j082t_sala['nb_tipo_carrera']     = 'INTERNACIONAL';
                                        $j082t_sala['co_partner']      = 1;
                                        $j082t_sala['co_usuario']      = 1;
                                        $j082t_sala['ca_pote']      = 0;
                                        $j082t_sala['ca_pote_tablazo']      = 0;
                                        $j082t_sala['ca_porcentaje_pote_tablazo']      = 0;
                                        $j082t_sala['nb_anuncio_uno']      = '';
                                        $j082t_sala['nb_anuncio_dos']      = '';
                                        $j082t_sala['ff_sistema_time']      = time();
                                        $j082t_sala['webservice']      = 'SI';
                                        $j082t_sala['nb_pago_automatico']      = 'SI';

                                        $this->db->insert("j082t_sala", $j082t_sala);
                                        $co_new_sala = $this->db->insert_id();

                                        // Insert de competidores



                                            foreach ($data2 as $key2 => $value2):

                                            // LLenan primera tabla

                                                if(is_array($value2)):

                                                if($key2 == 'runners'):

                                                    foreach ($value2 as $key_array) {
                                                       
                                                    $x002t_sala_linea['nb_competidor']   = $key_array->name;
                                                    $x002t_sala_linea['nu_casilla']   = $key_array->number;
                                                    $x002t_sala_linea['co_sala']   = $co_new_sala;
                                                    $x002t_sala_linea['nu_color']   = $key_array->saddleColor;
                                                    $this->db->insert("x002t_sala_linea", $x002t_sala_linea);
                                                    $co_new_sala_linea = $this->db->insert_id();

                                                        }



                                                endif;


                                                endif; 




                                                endforeach;

                                                 $this->db->trans_complete();







    


                        endif;


                endfor;

                // code...
            endforeach;


        endif;
 






        }




            public function verficar_cambios_horseapi() {

$severKey="czBMdVFKZ2tUYWMzbGlLOWlqcXdxUkRPOEV6Mjo5Njc3YjI5YS1mOTY3LTQ2YjUtYjA0Ny0xYTU3YjM0ODMxOGE=";
$header=array(
    'Authorization: '.$severKey,
    'Content-Type: application/json'
);



// Buscar careras de webservice

    $info_carrera_existente_webservice = $this->buscar_carrera_existente_webservice();


    if($info_carrera_existente_webservice):

        foreach ($info_carrera_existente_webservice->result() as $row):
                $estatus_actual = '';
            
             $url_secundaria ="http://api.horseapi.com/races/$row->nb_sede_codigo/$row->nu_carrera";


                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url_secundaria);
                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $result_secundaria =curl_exec($ch);

                $data2 = json_decode($result_secundaria);

                 if(is_null($data2)):
        echo 'Nada';
        continue;

    endif;


                foreach ($data2 as $key2 => $value2):

                     if(!is_array($value2)):


    if ($key2 == 'status'):

          if ($value2 == 'OPEN'):

          $estatus_actual == 'OPEN';

          endif;
  

      if ($value2 == 'RACE_OFF'):

        $this->db->trans_start();
        $j082t_sala['nb_estatus'] = 'CERRADO';
        $this->db->where("id", $row->id);
        $this->db->update("j082t_sala", $j082t_sala);
        $this->db->trans_complete();

        continue;


     endif;

    endif;

endif;


    endforeach;

    if ($estatus_actual == 'OPEN'): continue; endif;
        // code...


    // Detalle de la carrera


foreach ($data2 as $key2 => $value2):



// LLenan primera tabla

    if(is_array($value2)):

         echo $row->id;
 echo "<br>";

    if($key2 == 'results'):

        foreach ($value2 as $key_array) {

    
     if (!$this->verificar_competidor_ganador($row->id, $key_array->winningTicket)): 

        continue;

     endif;
            

            var_dump($key_array);
            echo "<br>";

               $this->db->trans_start();

            if ($key_array->resultType == 'WIN'):

        $nu_casilla = $key_array->winningTicket;

        $x002t_sala_linea['ca_monto_inh '] = '2';
        $x002t_sala_linea['ca_dividendo  '] = $key_array->payout;
        $x002t_sala_linea['nu_posicion'] = '1';
        $this->db->where("nu_casilla", $key_array->winningTicket);
        $this->db->where("co_sala", $row->id);
        $this->db->update("x002t_sala_linea", $x002t_sala_linea);
   

             endif;

         if ($key_array->resultType == 'PLACE'):

            // Verifiacr sie la caballo ya esta registrado como una posicion

        $x002t_sala_linea['ca_monto_inh '] = '2';
        $x002t_sala_linea['ca_dividendo  '] = $key_array->payout;
        $x002t_sala_linea['nu_posicion'] = '2';
        $this->db->where("nu_casilla", $key_array->winningTicket);
        $this->db->where("co_sala", $row->id);
        $this->db->update("x002t_sala_linea", $x002t_sala_linea);

      

             endif;

            
              $this->db->trans_complete();

            }

            
            

    endif;



    endif; 


                    // endif;


                endforeach;






curl_close($ch);

        endforeach;


    endif;






        }





        function verificar_carrera_existente($nb_sede_codigo, $nu_carrera)

        {

                    $sql = "SELECT a.*
        FROM
        j082t_sala AS a
        where a.in_activo = true and a.nb_sede_codigo = '$nb_sede_codigo' and a.nu_carrera = '$nu_carrera' and a.nb_estatus in ('ABIERTO','CERRADO')";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0): return true; else: return false; endif;


        }

                function buscar_carrera_existente_webservice()

        {

                    $sql = "SELECT a.*
        FROM
        j082t_sala AS a
        where a.in_activo = true and a.nb_estatus in ('ABIERTO','CERRADO') and a.webservice = 'SI'";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0): return $query; else: return false; endif;


        }


            function verificar_competidor_ganador($co_sala, $nu_casilla)

        {

                    $sql = "SELECT a.*
        FROM
        x002t_sala_linea AS a
        where a.in_activo = true and a.co_sala = '$co_sala' and a.nu_casilla = '$nu_casilla' and a.nu_posicion = 0";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0): return true; else: return false; endif;


        }



                function verificar_hipodromo_existente($nb_sede_codigo)

        {

                    $sql = "SELECT a.*
        FROM
        i001t_sede AS a
        where a.in_activo = true and a.nb_sede_codigo = '$nb_sede_codigo' and a.in_webservice = 'SI'";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0): return $query; else: return false; endif;


        }


                        function get_sedes_webservice()

        {

                    $sql = "SELECT a.*
        FROM
        i001t_sede AS a
        where a.in_activo = true and a.in_webservice = 'SI'";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0): return $query; else: return false; endif;


        }


        
                function pago_automatico() {

        $this->load->model('carrera_caballo_model');
        
        $error          = 0;
        $message        = '';

        // Buscar las carreras con cierre automatico
        $info_carreras_pago_automatico = $this->carrera_caballo_model->get_carreras_pago_automatico_model();

        if($info_carreras_pago_automatico->num_rows() > 0):

            foreach ($info_carreras_pago_automatico->result() as $row):



                        if (!$this->carrera_caballo_model->verificar_eligio_ganador($row->id)):

                                $message = "Antes de finalizar la carrera debe de elegir un ganador";
                                $error ++;  

                        endif;

                        if ($row->nb_estatus == 'FINALIZADO'):

                            $message = "Esta carrera ya esta finalizada";
                            $error ++;  

                        endif;


                    if ($error == 0) {
                        $this->carrera_caballo_model->pago_automatico_model($row->id);
                    }



            endforeach;



        endif;


    }


                function cierre_automatico() {

        
        // Buscar las carreras con cierre automatico
        $info_carreras_abiertas = $this->get_carreras_abiertas_model();

        if($info_carreras_abiertas):

            foreach ($info_carreras_abiertas->result() as $row):

                    
            $this->db->trans_start();
            $j082t_sala['nb_estatus']   = 'CERRADO';
            $this->db->where("id", $row->id);
            $this->db->update("j082t_sala", $j082t_sala);
            $this->db->trans_complete();


            endforeach;



        endif;


    }
        
    

                    function get_carreras_abiertas_model()

        {

            $time_unix = time();


                    $sql = "SELECT a.*
        FROM
        j082t_sala AS a
        where a.in_activo = true and a.nb_estatus = 'ABIERTO' and a.ff_cierre_time < $time_unix";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0): return $query; else: return false; endif;


        }


}
