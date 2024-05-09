<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Carrera_caballo extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('carrera_caballo_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
        $this->load->library('excel');
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->library('carrera_caballo_library');
        $this->load->library('taquilla_library');
        $this->load->library('reporte_library');
        $this->load->library('inicio_library');


    }

    // Actualizacion en estado real

    public function cambios_sala()
    {
        $error = 0;
        $message = '';
        $cambios_estatus = 0;
        $cambios_ganador = 0;

        $co_sala    = trim($this->input->post('co_sala'));
        $nb_estatus    = trim($this->input->post('nb_estatus'));
        $num_ganador    = trim($this->input->post('num_ganador'));

        $info_sala = $this->carrera_caballo_model->get_sala_modo_usuario($co_sala);
        $info_ganador = $this->carrera_caballo_model->get_sala_linea_posiciones($co_sala);

        $info_modo_carrera_administrador_ganadores_primer_lugar = $this->carrera_caballo_model->get_sala_linea_posiciones_administrador($co_sala, 1);
        $info_modo_carrera_administrador_ganadores_segundo_lugar = $this->carrera_caballo_model->get_sala_linea_posiciones_administrador($co_sala, 2);

        // Verificar si la tabla cerro
        if($info_sala->ca_minutos_cierre_time > 0):
        if(time() > $info_sala->ff_cierre_time):
            $this->carrera_caballo_model->cambiar_estatus_carrera_model('CERRADO', $co_sala);
        endif;
        endif;

        if($info_sala->nb_estatus != $nb_estatus):
            $cambios_estatus = 1;
        endif;

        if($info_ganador->num_rows() > $num_ganador):
            $cambios_ganador = 1;
        endif;



       $info_sala_linea = $this->carrera_caballo_model->get_info_ejemplares($co_sala);

        $array_new = [];
        $algun_caballo_retirado = 0;

        foreach ($info_sala_linea->result() as $row):

              $info_apuesta_actual = $this->carrera_caballo_library->get_info_apostado_remate($row->id, '1');
              if($info_apuesta_actual): $nb_usuario = substr($info_apuesta_actual->first_name, 0, 8); else: $nb_usuario = ''; endif;
              if($info_apuesta_actual): $ca_monto_actual = number_format($info_apuesta_actual->ca_monto_apostado, 0, ',','.');  else: $ca_monto_actual = 0;  endif;
              if($info_apuesta_actual): $co_usuario_apostador = $info_apuesta_actual->co_usuario;  else: $co_usuario_apostador = 0;  endif;

              if($row->nb_estatus == 'RETIRADO'):

                $algun_caballo_retirado ++;

              endif;


        $array = array(
        "co_sala_linea" => $row->id,
        "nb_usuario" => $nb_usuario,
        "ca_monto_actual" => $ca_monto_actual,
        "co_usuario_apostador" => $co_usuario_apostador,
        "estatus" => $row->nb_estatus
        );

       array_push($array_new , $array);

        endforeach;

       $co_usuario = $this->ion_auth->user_id(); $co_partner = $this->ion_auth->co_partner();
       $ca_saldo =  $this->wallet_library->get_saldo_usuario($co_usuario, $co_partner);


        $arreglo = array(
            'error' => $error,
            'message' => $message,
            'cambios_estatus' => $cambios_estatus,
            'cambios_ganador' => $cambios_ganador,
            'array_new' => json_encode($array_new, JSON_PRETTY_PRINT),
            'ca_saldo' => $ca_saldo,
            'algun_caballo_retirado' => $algun_caballo_retirado,
            'info_modo_carrera_administrador_ganadores_primer_lugar' => $info_modo_carrera_administrador_ganadores_primer_lugar->result_array(),
            'info_modo_carrera_administrador_ganadores_segundo_lugar' => $info_modo_carrera_administrador_ganadores_segundo_lugar->result_array()    
        );
        echo json_encode($arreglo);
        die();

        // code...
    }

    // reload_ganador

        public function reload_resultados($co_sala) {
        $data['sala_linea_posiciones'] = $this->carrera_caballo_model->get_sala_linea_posiciones($co_sala);
        $data['info_sala'] = $this->carrera_caballo_model->get_sala_modo_usuario($co_sala);
        $this->load->view('carrera_caballo/reload/reload_resultado_sala_usuario', $data);

    }


        public function reload_resultados_taquilla($co_sala) {
        $data['sala_linea_posiciones'] = $this->carrera_caballo_model->get_sala_linea_posiciones($co_sala);
        $data['info_sala'] = $this->carrera_caballo_model->get_sala_modo_usuario($co_sala);
        $this->load->view('carrera_caballo/reload/reload_resultado_sala_usuario_taquilla', $data);

    }



    public function set_response_json($error, $message) {
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
        die();
    }


    public function index() {

        if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")): 

         $nb_modo_juego    = trim($this->input->get('nb_modo_juego'));
         $nb_sede    = trim($this->input->get('nb_sede'));
         $nb_estatus    = trim($this->input->get('nb_estatus'));
         $rango_fecha    = trim($this->input->get('rango_fecha'));

         if($rango_fecha == ''):
            
            $fecha_hoy = date('Y-m-d');
            $query_rango_fecha = "and CAST(a.ff_sistema AS DATE) BETWEEN '$fecha_hoy' AND '$fecha_hoy'";



        else:

             $partes_fecha_rango = explode("/", $rango_fecha);

             $fecha_inicio_sistema = date_system($partes_fecha_rango[0]);

             $fecha_fin_sistema = date_system($partes_fecha_rango[1]);

             $query_rango_fecha = "and CAST(a.ff_sistema AS DATE) BETWEEN '$fecha_inicio_sistema' AND '$fecha_fin_sistema'";

         endif;

        
  
         $ordenar_registro    = trim($this->input->get('ordenar_registro'));

         if($ordenar_registro == ''):

            $ordenar_registro = "order by a.ff_sistema_time desc";

         endif;


        //die();

        $data['nb_modo_juego'] = $nb_modo_juego;
        $data['nb_sede'] = $nb_sede;
        $data['nb_estatus'] = $nb_estatus;
        $data['ordenar_registro'] = $ordenar_registro;
        $data['rango_fecha'] = $rango_fecha;

        $data['salas'] = $this->carrera_caballo_model->get_salas($nb_modo_juego, $nb_sede, $nb_estatus, $ordenar_registro, $query_rango_fecha);

        $data['lista_sede'] = $this->carrera_caballo_model->get_sedes();

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('carrera_caballo/administrador/carrera_caballo_main_view');
        $this->load->view('layout/footer_view');

       endif;

       if($this->usuario_library->permiso_empresa("'USUARIO'")): 

        $data['hipodromo'] = $this->carrera_caballo_model->get_hipodromos();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('carrera_caballo/usuario/carrera_caballo_main_hipodromo_view');
        $this->load->view('layout/footer_view');


       endif;
    }
    // Ajustar producto
    public function nueva_carrera() {
        $data['sede'] = $this->carrera_caballo_model->get_sedes();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('carrera_caballo/nueva_carrera_view', $data);
        $this->load->view('layout/footer_view');

    }

    // Buscar acumulado sede

       public function buscar_acumulado_pote_pablazo() {

         $nb_sede    = trim($this->input->post('nb_sede'));
         $ca_pote_tablazo_acumulado = $this->carrera_caballo_model->get_pote_acumulado('Remate', $nb_sede);
         echo $ca_pote_tablazo_acumulado;

    }



        public function nuevo_ejemplar() {


        $data['list_color'] = $this->carrera_caballo_library->get_color_competidor();
        $data['consecutivo'] = $this->carrera_caballo_model->get_tmp_competidor();
        $this->load->view('carrera_caballo/agregar_competidor/nuevo_competidor_view', $data);

    }

            public function agregar_sede() {
        $this->load->view('carrera_caballo/agregar_sede_view');

    }

    


                    public function ejecutar_agregar_sede() {
        
        $error          = 0;
        $message        = '';
        $nb_sede_modal    = trim($this->input->post('nb_sede_modal'));
        if ($error == 0) {
            $this->carrera_caballo_model->ejecutar_agregar_sede_model($nb_sede_modal);
            $message .= $nb_sede_modal;
        }
        $this->set_response_json($error, $message); 
        

    }

   
                    public function add_tmp_ejemplar() {
        
        $nb_competidor = trim($this->input->post('nb_competidor'));
        $ca_monto = trim($this->input->post('ca_monto'));
        $nu_casilla = trim($this->input->post('nu_casilla'));
        $nu_color = trim($this->input->post('nu_color'));
        $this->carrera_caballo_model->add_tmp_ejemplar_model($nb_competidor, $ca_monto, $nu_casilla, $nu_color); 
        

    }

                    public function reload_leer_tmp_competidor() {
        $data['tmp_competidor'] = $this->carrera_caballo_model->get_tmp_competidor();                 
        $this->load->view('carrera_caballo/agregar_competidor/tmp_competidor_view', $data);
    }


        function eliminar_tmp_competidor() {
        
        $error          = 0;
        $message        = '';
        $co_temp    = trim($this->input->post('co_temp'));
        if ($error == 0) {
            $this->carrera_caballo_model->eliminar_tmp_competidor_model($co_temp);
            $message .= 'Elminado';
        }
        $this->set_response_json($error, $message);
    }

        public function agregar_carrera_caballo() {
        $error               = 0;
        $message             = '';
        $nu_carrera = trim($this->input->post('nu_carrera'));
        $nb_sede        = trim($this->input->post('nb_sede'));
        $ca_minutos_cierre      = trim($this->input->post('ca_minutos_cierre'));
        $nb_modo_juego      = trim($this->input->post('nb_modo_juego'));
        $nb_tipo_carrera      = trim($this->input->post('nb_tipo_carrera'));
        $nu_distancia      = trim($this->input->post('nu_distancia'));
        $nb_estatus      = trim($this->input->post('nb_estatus'));

        $ca_pote      = trim($this->input->post('ca_pote'));
        $ca_pote_tablazo      = trim($this->input->post('ca_pote_tablazo'));
        $ca_porcentaje_pote_tablazo      = trim($this->input->post('ca_porcentaje_pote_tablazo'));

        $nb_anuncio_uno      = trim($this->input->post('nb_anuncio_uno'));
        $nb_anuncio_dos      = trim($this->input->post('nb_anuncio_dos'));
        $tx_publicidad_sala_ubicacion      = trim($this->input->post('tx_publicidad_sala_ubicacion'));
        

        $info_ejemplares = $this->carrera_caballo_model->get_tmp_competidor();

        if ($info_ejemplares->num_rows() == 0):

            $message = 'Debes de ingresar al menos un ejemplar.';
            $error ++;

        endif;


        if ($error == 0) {
            $this->carrera_caballo_model->agregar_carrera_caballo_model($nu_carrera, $nb_sede, $ca_minutos_cierre, $nb_modo_juego, $nb_tipo_carrera, $nu_distancia, $nb_estatus, $ca_pote, $ca_pote_tablazo, $ca_porcentaje_pote_tablazo, $nb_anuncio_uno, $nb_anuncio_dos, $tx_publicidad_sala_ubicacion);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

// Editar carrera


        public function editar_carrera($co_sala) {

        $query = $this->carrera_caballo_model->get_info_sala($co_sala);
        if(is_null($query)): redirect('carrera_caballo/index'); endif;

        $data['sede'] = $this->carrera_caballo_model->get_sedes();
        $data['info_sala'] = $this->carrera_caballo_model->get_info_sala($co_sala);
        $data['info_linea_sala'] = $this->carrera_caballo_model->get_info_ejemplares($co_sala);
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('carrera_caballo/editar_carrera_view', $data);
        $this->load->view('layout/footer_view');

    }

            public function ejecutar_editar_carrera_caballo() {
        $error               = 0;
        $message             = '';
        $co_sala = trim($this->input->post('co_sala'));
        $nu_carrera = trim($this->input->post('nu_carrera'));
        $nb_sede        = trim($this->input->post('nb_sede'));
        $ca_minutos_cierre      = trim($this->input->post('ca_minutos_cierre'));
        $nb_modo_juego      = trim($this->input->post('nb_modo_juego'));
        $nb_tipo_carrera      = trim($this->input->post('nb_tipo_carrera'));
        $nu_distancia      = trim($this->input->post('nu_distancia'));
        $nb_estatus      = trim($this->input->post('nb_estatus'));

        $nb_estatus_actual      = trim($this->input->post('nb_estatus_actual'));


        $ca_pote      = trim($this->input->post('ca_pote'));
        $ca_pote_tablazo      = trim($this->input->post('ca_pote_tablazo'));
        $ca_porcentaje_pote_tablazo      = trim($this->input->post('ca_porcentaje_pote_tablazo'));

        $nb_anuncio_uno      = trim($this->input->post('nb_anuncio_uno'));
        $nb_anuncio_dos      = trim($this->input->post('nb_anuncio_dos'));
        $tx_publicidad_sala_ubicacion      = trim($this->input->post('tx_publicidad_sala_ubicacion'));

        $info_ejemplares = $this->carrera_caballo_model->get_info_ejemplares($co_sala);

        if ($info_ejemplares->num_rows() == 0):

            $message = 'Debes de ingresar al menos un ejemplar.';
            $error ++;

        endif;

        if ($nb_estatus_actual == 'FINALIZADO'):

            $message = 'No es posible editar esta carrera.';
            $error ++;

        endif;


        if ($error == 0) {
            $this->carrera_caballo_model->ejecutar_editar_carrera_caballo_model($co_sala, $nu_carrera, $nb_sede, $ca_minutos_cierre, $nb_modo_juego, $nb_tipo_carrera, $nu_distancia, $nb_estatus, $ca_pote, $ca_pote_tablazo, $ca_porcentaje_pote_tablazo, $nb_anuncio_uno, $nb_anuncio_dos, $tx_publicidad_sala_ubicacion);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


                public function nuevo_ejemplar_editando($co_sala) {
        $data['consecutivo'] = $this->carrera_caballo_model->get_info_ejemplares($co_sala);
        $data['list_color'] = $this->carrera_caballo_library->get_color_competidor();
       $this->load->view('carrera_caballo/editar_competidor/nuevo_competidor_editando_view', $data);

    }

                       public function add_ejemplar() {
        
        $nb_competidor = trim($this->input->post('nb_competidor'));
        $ca_monto = trim($this->input->post('ca_monto'));
        $co_sala = trim($this->input->post('co_sala'));
        $nu_casilla = trim($this->input->post('nu_casilla'));
        $nu_color = trim($this->input->post('nu_color'));
        if ($error == 0) {
        $this->carrera_caballo_model->add_ejemplar_model($co_sala, $nb_competidor, $ca_monto, $nu_casilla, $nu_color); 
        $message .= 'Agregado';
        }

                $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
        

    }

                public function editar_ejemplar($co_sala_linea) {

       $data['info_linea_sala'] = $this->carrera_caballo_model->get_info_linea_sala($co_sala_linea);
       $data['list_color'] = $this->carrera_caballo_library->get_color_competidor();
       $this->load->view('carrera_caballo/editar_competidor/editar_competidor_view', $data);

    }


                    public function reload_linea_sala($co_sala) {
        $data['info_linea_sala'] = $this->carrera_caballo_model->get_info_ejemplares($co_sala);              
        $this->load->view('carrera_caballo/reload/reload_linea_sala_view', $data);
    }



        function eliminar_competidor() {
        
        $error          = 0;
        $message        = '';
        $co_sala_linea    = trim($this->input->post('co_sala_linea'));
        if ($error == 0) {
            $this->carrera_caballo_model->eliminar_competidor_model($co_sala_linea);
            $message .= 'Elminado';
        }
        $this->set_response_json($error, $message);
    }



                         public function ejecutar_editar_ejemplar() {
        
        $co_sala_linea = trim($this->input->post('co_sala_linea'));
        $nb_competidor = trim($this->input->post('nb_competidor'));
        $ca_monto = trim($this->input->post('ca_monto'));
        $co_sala = trim($this->input->post('co_sala'));
        $nu_casilla = trim($this->input->post('nu_casilla'));
        $nu_color = trim($this->input->post('nu_color'));
        if ($error == 0) {
        $this->carrera_caballo_model->ejecutar_editar_ejemplar_model($co_sala_linea, $nb_competidor, $ca_monto, $nu_casilla, $co_sala, $nu_color); 
        $message .= 'Actualizado';
        }

                $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
        

    }



        function retirar_caballo() {
        
        $error          = 0;
        $message        = '';
        $co_sala_linea    = trim($this->input->post('co_sala_linea'));
        if ($error == 0) {
            $this->carrera_caballo_model->retirar_caballo_model($co_sala_linea);
            $message .= 'Elminado';
        }
        $this->set_response_json($error, $message);
    }


// Elegir ganador

        public function elegir_ganador($co_sala) {

       $data['co_sala'] = $co_sala;
       $data['info_sala'] = $this->carrera_caballo_model->get_info_sala($co_sala);
       $data['info_linea_sala'] = $this->carrera_caballo_model->get_info_linea_sala_ganador($co_sala);
       $this->load->view('carrera_caballo/ganadores/ganador_competidor_view', $data);

    }


            function agregar_ganador() {
        
        $error          = 0;
        $message        = '';
        $co_sala_linea    = trim($this->input->post('co_sala_linea'));
        $nu_posicion    = trim($this->input->post('nu_posicion'));
        $ca_monto_inh    = trim($this->input->post('ca_monto_inh'));
        $co_sala    = trim($this->input->post('co_sala'));
        $ca_dividendo    = trim($this->input->post('ca_dividendo'));
        $in_ejecutar_pago    = trim($this->input->post('in_ejecutar_pago'));

        // Verificar si existe

        if ($error == 0) {
            $this->carrera_caballo_model->agregar_ganador_model($co_sala_linea, $nu_posicion, $ca_monto_inh, $co_sala, $ca_dividendo, $in_ejecutar_pago);
            $message .= 'Agregado';
        }
        $this->set_response_json($error, $message);
    }


        function cambiar_estatus_carrera() {
        
        $error          = 0;
        $message        = '';
        $nb_estatus    = trim($this->input->post('nb_estatus'));
        $co_sala    = trim($this->input->post('co_sala'));

        $info_sala = $this->carrera_caballo_model->get_info_sala($co_sala);

        if($nb_estatus == 'FINALIZADO'):

        if (!$this->carrera_caballo_model->verificar_eligio_ganador($co_sala)):

            $message = "Antes de finalizar la carrera debe de elegir un ganador";
            $error ++;  

        endif;

        if ($info_sala->nb_estatus == 'FINALIZADO'):

            $message = "Esta carrera ya esta finalizada";
            $error ++;  

        endif;


        endif;


        if ($error == 0) {
            $this->carrera_caballo_model->cambiar_estatus_carrera_model($nb_estatus, $co_sala);
            $message .= 'Cambiado';
        }
        $this->set_response_json($error, $message);
    }

    // Eliminar Carrera de caballo

            function eliminar_carrera_caballo() {
        
        $error          = 0;
        $message        = '';
        $co_sala    = trim($this->input->post('co_sala'));
        if ($error == 0) {
            $this->carrera_caballo_model->eliminar_carrera_caballo_model($co_sala);
            $message .= 'Eliminado';
        }
        $this->set_response_json($error, $message);
    }


// Duplicar registro


            function duplicar_registro() {
        
        $error          = 0;
        $message        = '';
        $co_sala    = trim($this->input->post('co_sala'));
        if ($error == 0) {
            $co_new_sala = $this->carrera_caballo_model->duplicar_registro_model($co_sala);
            $message = $co_new_sala;
        }
        $this->set_response_json($error, $message);
    }


// Ingresar carreras hipodromo


    public function ingresar_hipodromo_carrera() {

        $nb_sede    = trim($this->input->get('nb_sede'));
        $data['nb_sede'] = $nb_sede;
        $data['info_sede'] = $this->carrera_caballo_model->get_info_sede_model($nb_sede);
        $data['carrera_hipodromo'] = $this->carrera_caballo_model->get_hipodromos_carreras($nb_sede);
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('carrera_caballo/usuario/carrera_caballo_main_carrera_hipodromo_view');
        $this->load->view('layout/footer_view');

    }

    //resultados hipodromos


        public function carrera_hipodromo_resultado() {

        $nb_sede    = trim($this->input->get('nb_sede'));
        $data['nb_sede'] = $nb_sede;

        $data['info_resultados_hipodromo'] = $this->carrera_caballo_model->get_sala_linea_posiciones_sede($nb_sede);

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('carrera_caballo/usuario/carrera_caballo_main_resultado_hipodromo_view');
        $this->load->view('layout/footer_view');

    }

    



        public function ver_sala_modo_usuario($co_sala) {

        $data['co_sala'] = $co_sala;
        $info_sala = $this->carrera_caballo_model->get_sala_modo_usuario($co_sala);

        if (is_null($info_sala)): 
            redirect('carrera_caballo/index');
        endif;
        $data['sala_linea'] = $this->carrera_caballo_model->get_info_ejemplares($co_sala);
        $data['sala_linea_posiciones'] = $this->carrera_caballo_model->get_sala_linea_posiciones($co_sala);
        

        $data['info_sala'] = $info_sala;


        if($info_sala->nb_modo_juego == 'Ganadores'):

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('carrera_caballo/usuario/carrera_caballo_ver_sala_ganadores_view');
        $this->load->view('layout/footer_view');

        endif;

        if($info_sala->nb_modo_juego == 'Remate'):

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('carrera_caballo/usuario/carrera_caballo_ver_sala_remate_view');
        $this->load->view('layout/footer_view');

        endif;

    }

       public function ver_sala_modo_administrador($co_sala) {

        $data['co_sala'] = $co_sala;
        $info_sala = $this->carrera_caballo_model->get_sala_modo_usuario($co_sala);

        if (is_null($info_sala)): 
            redirect('carrera_caballo/index');
        endif;
        $data['sala_linea'] = $this->carrera_caballo_model->get_info_ejemplares($co_sala);
        $data['sala_linea_posiciones'] = $this->carrera_caballo_model->get_sala_linea_posiciones($co_sala);
        

        $data['info_sala'] = $info_sala;


        if($info_sala->nb_modo_juego == 'Ganadores'):

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('carrera_caballo/administrador/administrador_carrera_caballo_ver_sala_ganadores_view');
        $this->load->view('layout/footer_view');

        endif;

        if($info_sala->nb_modo_juego == 'Remate'):

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('carrera_caballo/administrador/administrador_carrera_caballo_ver_sala_remate_view');
        $this->load->view('layout/footer_view');

        endif;

    }

            function ejecutar_apuesta() {
        
        $error          = 0;
        $message        = '';
        $co_sala_linea    = trim($this->input->post('co_sala_linea'));
        $nu_posicion_apuesta    = trim($this->input->post('nu_posicion_apuesta'));
        $ca_monto_apuesta    = trim($this->input->post('ca_monto_apuesta'));
        $co_sala    = trim($this->input->post('co_sala'));

            // Condiciones
        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();
        $ca_saldo = $this->wallet_library->get_saldo_usuario($co_usuario, $co_partner);

        $ca_saldo_congelado = $this->wallet_library->get_saldo_congelado($co_usuario, $co_partner);
        
         $ca_saldo_limite = $this->wallet_library->get_limite_apuesta($co_usuario, $co_partner);

        if($ca_monto_apuesta > $ca_saldo):
            $message = "Su saldo es insuficiente para apostar";
            $error ++;  

        endif;

        if ($ca_saldo_limite != 0):

         if($ca_saldo_congelado > $ca_saldo_limite):
            $message = "Usted ha alcanzado el limite del monto para realizar una Apuesta";
            $error ++;  

        endif;

        if($ca_monto_apuesta > $ca_saldo_limite):
            $message = "Usted ha alcanzado el limite del monto para realizar una Apuesta";
            $error ++;  

        endif;


    endif;


        if ($error == 0) {
            $this->carrera_caballo_model->ejecutar_apuesta_model($co_sala_linea, $nu_posicion_apuesta, $ca_monto_apuesta, $co_sala);
            $message .= 'Apuesta realizada';
        }
        $this->set_response_json($error, $message);
    }

            function ejecutar_apuesta_remate() {
        
        $error          = 0;
        $message        = '';
        $co_sala_linea    = trim($this->input->post('co_sala_linea'));
        $nu_posicion_apuesta    = trim($this->input->post('nu_posicion_apuesta'));
        $ca_monto_apuesta    = trim($this->input->post('ca_monto_apuesta'));
        $co_sala    = trim($this->input->post('co_sala'));
        $ca_monto_apuesta_actual = 0;

            // Condiciones
        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();
        $ca_saldo = $this->wallet_library->get_saldo_usuario($co_usuario, $co_partner);

        $info_apuesta_actual = $this->carrera_caballo_library->get_info_apostado_remate($co_sala_linea, $nu_posicion_apuesta);


        if ($ca_monto_apuesta == 0):


         if(!$info_apuesta_actual):

            $ca_monto_apostar = 5;

         else:

                if($info_apuesta_actual->ca_monto_apostado < 50):

                   $ca_monto_apostar = $info_apuesta_actual->ca_monto_apostado + 5; 

                 endif;


                  if($info_apuesta_actual->ca_monto_apostado >= 50 and $info_apuesta_actual->ca_monto_apostado < 200):

                    $ca_monto_apostar = $info_apuesta_actual->ca_monto_apostado + 10; 

                 endif;

                    if($info_apuesta_actual->ca_monto_apostado >= 200 and $info_apuesta_actual->ca_monto_apostado < 500):

                    $ca_monto_apostar = $info_apuesta_actual->ca_monto_apostado + 20; 

                 endif;

                if($info_apuesta_actual->ca_monto_apostado >= 500 and $info_apuesta_actual->ca_monto_apostado < 1000):

                    $ca_monto_apostar = $info_apuesta_actual->ca_monto_apostado + 50; 

                 endif;

                if($info_apuesta_actual->ca_monto_apostado >= 1000):

                    $ca_monto_apostar = $info_apuesta_actual->ca_monto_apostado + 100; 

                 endif;


            endif;


          else:


        if($info_apuesta_actual):

        $ca_monto_apostar = $info_apuesta_actual->ca_monto_apostado + $ca_monto_apuesta;

        else:

        $ca_monto_apostar = $ca_monto_apuesta;

        endif;



        endif;


        if($ca_monto_apostar > $ca_saldo):
            $message = "Su saldo es insuficiente para apostar";
            $error ++;  

        endif;



        if ($error == 0) {
            $ca_monto_apuesta_actual = $this->carrera_caballo_model->ejecutar_apuesta_remate_model($co_sala_linea, $nu_posicion_apuesta, $ca_monto_apostar, $co_sala);
            $message = 'Apuesta realizada';
        }


        $arreglo = array(
            'error' => $error,
            'message' => $message,
            'ca_monto_apuesta_actual' => $ca_monto_apuesta_actual,
            'nb_usuario' => $this->ion_auth->get_nombres()

        );
        echo json_encode($arreglo);
        die();
    }



    // Ruleta

            public function ver_ruleta($co_sala) {

                // Buscar a que usuario le corresponde
        $co_usuario = $this->ion_auth->user_id();
        $info_ganador = $this->carrera_caballo_library->get_info_mi_posicion_ganado_by_usuario($co_sala, $co_usuario, 1);

        if($info_ganador):

             redirect("carrera_caballo/ver_sala_modo_usuario/$co_sala");

        endif;
        

        $info_sala_linea_segundo_lugar = $this->carrera_caballo_library->get_info_mi_posicion_ganado_by_usuario($co_sala, $co_usuario, 2);

        if($info_sala_linea_segundo_lugar):

        $data['co_sala'] = $co_sala;
        $info_sala = $this->carrera_caballo_model->get_sala_modo_usuario($co_sala);
        $data['sala_linea'] = $this->carrera_caballo_model->get_info_ejemplares($co_sala);
        $data['sala_linea_posiciones'] = $this->carrera_caballo_model->get_sala_linea_posiciones($co_sala);
        $data['sala_linea_segundo_lugar'] = $info_sala_linea_segundo_lugar;
        $data['info_sala'] = $info_sala;

        $this->load->view('carrera_caballo/ruleta/carrera_caballo_modal_ruleta_view', $data);

        else:

            redirect("carrera_caballo/ver_sala_modo_usuario/$co_sala");

        endif;


    }


            function ejecutar_ruleta() {
        
        $error          = 0;
        $message        = '';
        $co_apuesta_compra    = trim($this->input->post('co_apuesta_compra'));
        $nu_posicion_ruleta    = trim($this->input->post('nu_posicion_ruleta'));

            // Condiciones
        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();
        $ca_saldo = $this->wallet_library->get_saldo_usuario($co_usuario, $co_partner);


        if ($error == 0) {
            $this->carrera_caballo_model->ejecutar_ruleta_model($co_apuesta_compra, $nu_posicion_ruleta);
            $message .= 'Apuesta realizada';
        }
        $this->set_response_json($error, $message);
    }



            function ejecutar_apuesta_taquilla() {
        
        $error          = 0;
        $message        = '';
        $co_sala_linea    = trim($this->input->post('co_sala_linea'));
        $nu_posicion_apuesta    = trim($this->input->post('nu_posicion_apuesta'));
        $ca_monto_apuesta    = trim($this->input->post('ca_monto_apuesta_taquilla'));
        $co_sala    = trim($this->input->post('co_sala'));

        $co_taquilla    = trim($this->input->post('co_taquilla'));
        $nu_identificacion    = trim($this->input->post('nu_identificacion'));
        $nb_nombre    = trim($this->input->post('nb_nombre'));
        $nb_apellido    = trim($this->input->post('nb_apellido'));

            // Condiciones
        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();
        $ca_saldo = $this->wallet_library->get_saldo_usuario($co_usuario, $co_partner);

        $ca_saldo_congelado = $this->wallet_library->get_saldo_congelado($co_usuario, $co_partner);
        
         $ca_saldo_limite = $this->wallet_library->get_limite_apuesta($co_usuario, $co_partner);

        if($ca_monto_apuesta > $ca_saldo):
            $message = "Su saldo es insuficiente para apostar";
            $error ++;  

        endif;

        if ($ca_saldo_limite != 0):

         if($ca_saldo_congelado > $ca_saldo_limite):
            $message = "Usted ha alcanzado el limite del monto para realizar una Apuesta";
            $error ++;  

        endif;

        if($ca_monto_apuesta > $ca_saldo_limite):
            $message = "Usted ha alcanzado el limite del monto para realizar una Apuesta";
            $error ++;  

        endif;


    endif;


        if ($error == 0) {
            $this->carrera_caballo_model->ejecutar_apuesta_taquilla_model($co_sala_linea, $nu_posicion_apuesta, $ca_monto_apuesta, $co_sala, $co_taquilla, $nu_identificacion, $nb_nombre, $nb_apellido);
            $message .= 'Apuesta realizada';
        }
        $this->set_response_json($error, $message);
    }



            function actualizar_pote_tablazo() {
        
        $error          = 0;
        $message        = '';
        $pote_tablazo_final    = trim($this->input->post('pote_tablazo_final'));
        $co_sala    = trim($this->input->post('co_sala'));

        if ($error == 0) {
            $this->carrera_caballo_model->actualizar_pote_tablazo_model($co_sala, $pote_tablazo_final);
        }
        $this->set_response_json($error, $message);
    }


    // Accion masiva

         public function accion_masiva_check() {
        $error               = 0;
        $message             = '';

        $input_check = $this->input->post('input_check');
        $nb_accion = $this->input->post('nb_accion');


        if ($error == 0) {
            $this->carrera_caballo_model->accion_masiva_check_model($input_check, $nb_accion);
            $message .= 'Exito';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }







}
?>