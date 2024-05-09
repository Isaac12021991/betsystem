<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transmision_envivo extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('transmision_envivo_model', 'transmision_envivo');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }

    }
    public function index() {

         if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")):

        $data['list_video'] = $this->transmision_envivo->get_list_video_model();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('transmision_envivo/transmision_envivo_main_view');
        $this->load->view('layout/footer_view');

        else:

            redirect('transmision_envivo/ver_transmision');

        endif;
    }
    // Buscar transmision_envivo
        public function crear_transmision_envivo() {
        $data['sala'] = $this->transmision_envivo->get_list_sala_model();
        $data['sede'] = $this->transmision_envivo->get_list_sede_model();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('transmision_envivo/add/form_agregar_transmision_envivo_view');
        $this->load->view('layout/footer_view');
    }

    // Guardar transmision_envivo
    
        public function guardar_nuevo_transmision_envivo() {
        $error            = 0;
        $message          = '';

        $nb_video       = trim($this->input->post('nb_video'));
        $tx_descripcion     = trim($this->input->post('tx_descripcion'));
        $tx_src     = trim($this->input->post('tx_src'));

        $nb_origen     = trim($this->input->post('nb_origen'));
        $co_sala     = trim($this->input->post('co_sala'));
        $nb_sede     = trim($this->input->post('nb_sede'));

        
        // Validacion 1
        if ($error == 0) {
            $this->transmision_envivo->guardar_nuevo_transmision_envivo_model($nb_video, $tx_descripcion, $tx_src, $nb_origen, $co_sala, $nb_sede);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

            public function editar_transmision_envivo($co_transmision_envivo) {

        $data['info_transmision_envivo'] = $this->transmision_envivo->get_transmision_envivo_one_model($co_transmision_envivo);
        $data['co_transmision_envivo'] = $co_transmision_envivo;
        $data['sala'] = $this->transmision_envivo->get_list_sala_model();
        $data['sede'] = $this->transmision_envivo->get_list_sede_model();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('transmision_envivo/edit/form_editar_transmision_envivo_view');
        $this->load->view('layout/footer_view');
    }

    
            public function write_transmision_envivo() {
        $error            = 0;
        $message          = '';

        $co_transmision_envivo       = trim($this->input->post('co_transmision_envivo'));

        $nb_video       = trim($this->input->post('nb_video'));
        $tx_descripcion     = trim($this->input->post('tx_descripcion'));
        $tx_src     = trim($this->input->post('tx_src'));

        $nb_origen     = trim($this->input->post('nb_origen'));
        $co_sala     = trim($this->input->post('co_sala'));
        $nb_sede     = trim($this->input->post('nb_sede'));

        // Validacion 1
        if ($error == 0) {
            $this->transmision_envivo->write_transmision_envivo_model($co_transmision_envivo, $nb_video, $tx_descripcion, $tx_src, $nb_origen, $co_sala, $nb_sede);
            $message .= 'Actualizado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


            public function unlink_transmision_envivo() {
        $error            = 0;
        $message          = '';

        $co_transmision_envivo       = trim($this->input->post('co_transmision_envivo'));

        // Validacion 1
        if ($error == 0) {
            $this->transmision_envivo->unlink_transmision_envivo($co_transmision_envivo);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


    public function ver_transmision() {

        $nb_sede    = trim($this->input->get('nb_sede'));

        $data['nb_sede'] = $nb_sede;
        $data['list_video'] = $this->transmision_envivo->get_list_video_model($nb_sede);
        $data['sede'] = $this->transmision_envivo->get_list_sede_model();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('transmision_envivo/usuario/ver_transmision_envivo_main_view');
        $this->load->view('layout/footer_view');
    }

  
}
?>