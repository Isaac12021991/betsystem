<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reportes extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Reportes_model', 'reportes');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }

                 $this->load->model('carrera_caballo_model');
         $this->load->model('taquilla_model', 'taquilla');

        $this->load->library('carrera_caballo_library');
        $this->load->library('taquilla_library');
        $this->load->library('reporte_library');

    }
    public function index() {

        $nb_sede       = trim($this->input->get('nb_sede'));
        $nb_modo_juego       = trim($this->input->get('nb_modo_juego'));
        $data['list_reportes'] = $this->reportes->get_reportes_model($nb_sede, $nb_modo_juego);
        $data['lista_sede'] = $this->reportes->get_sedes();

        $data['nb_sede'] = $nb_sede;

        $data['nb_modo_juego'] = $nb_modo_juego;

        $data['list_ganadores'] = $this->reportes->get_reportes_envivo_ganadores_model();

        $data['list_ganadores_taquilla'] = $this->reportes->get_reportes_envivo_ganadores_taquilla_model();

        $data['list_taquillas'] = $this->taquilla->get_taquilla_model();


        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('reportes/reportes_main_view');
        $this->load->view('layout/footer_view');
    }



                public function ver_sala_taquilla_usuario($co_sala) {



        $data['co_sala'] = $co_sala;
        $info_sala = $this->carrera_caballo_model->get_sala_modo_usuario($co_sala);

        if (is_null($info_sala)): 
            redirect('carrera_caballo/index');
        endif;
        $data['sala_linea_apuesta'] = $this->taquilla->get_info_apuesta_usuario($co_sala);

        $data['sala_linea_posiciones'] = $this->carrera_caballo_model->get_sala_linea_posiciones($co_sala);
        

        $data['info_sala'] = $info_sala;


        if($info_sala->nb_modo_juego == 'Ganadores'):

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('reportes/ver_sala_taquilla_usuario_view');
        $this->load->view('layout/footer_view');

        endif;
    }


                    public function reload_ver_sala_taquilla_usuario() {

        $co_taquilla     = trim($this->input->post('co_taquilla'));
        $data['list_ganadores_taquilla'] = $this->reportes->get_reportes_envivo_ganadores_taquilla_filtro_model($co_taquilla);

        $this->load->view('reportes/reload/reload_reportes_taquilla_view', $data);

    }


  
}
?>