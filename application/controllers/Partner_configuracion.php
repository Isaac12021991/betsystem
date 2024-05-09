<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Partner_configuracion extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Partner_configuracion_model', 'partner_configuracion');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }

    }
    public function index() {
        $data['list_partner_configuracion'] = $this->partner_configuracion->get_partner_configuracion_model();
                $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('partner_configuracion/partner_configuracion_main_view');
        $this->load->view('layout/footer_view');
    }
    // Buscar partner_configuracion
        public function crear_partner_configuracion() {
        $data['sede'] = $this->partner_configuracion->get_sedes();
        $data['sala'] = $this->partner_configuracion->get_list_sala_model();

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('partner_configuracion/add/form_agregar_partner_configuracion_view');
        $this->load->view('layout/footer_view');
    }

    // Guardar partner_configuracion
    
        public function guardar_nuevo_partner_configuracion() {
        $error            = 0;
        $message          = '';

        $nb_partner_configuracion       = trim($this->input->post('nb_partner_configuracion'));
        $tx_link     = trim($this->input->post('tx_link'));
        $tx_descripcion     = trim($this->input->post('tx_descripcion'));
        $nb_sede     = trim($this->input->post('nb_sede'));
        $co_sala     = trim($this->input->post('co_sala'));
        // Validacion 1
        if ($error == 0) {
            $this->partner_configuracion->guardar_nuevo_partner_configuracion_model($nb_partner_configuracion, $tx_link, $tx_descripcion, $nb_sede, $co_sala);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

            public function editar_partner_configuracion($co_partner_configuracion) {

        $data['sede'] = $this->partner_configuracion->get_sedes();
        $data['sala'] = $this->partner_configuracion->get_list_sala_model();
        $data['info_partner_configuracion'] = $this->partner_configuracion->get_partner_configuracion_one_model($co_partner_configuracion);
        $data['co_partner_configuracion'] = $co_partner_configuracion;
                $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('partner_configuracion/edit/form_editar_partner_configuracion_view');
        $this->load->view('layout/footer_view');
    }

    
            public function write_partner_configuracion() {
        $error            = 0;
        $message          = '';

        $co_partner_configuracion       = trim($this->input->post('co_partner_configuracion'));
        $nb_partner_configuracion       = trim($this->input->post('nb_partner_configuracion'));
        $tx_link     = trim($this->input->post('tx_link'));
        $tx_descripcion     = trim($this->input->post('tx_descripcion'));
        $nb_sede     = trim($this->input->post('nb_sede'));
        $co_sala     = trim($this->input->post('co_sala'));
        // Validacion 1
        if ($error == 0) {
            $this->partner_configuracion->write_partner_configuracion_model($co_partner_configuracion, $nb_partner_configuracion, $tx_link, $tx_descripcion, $nb_sede, $co_sala);
            $message .= 'Actualizado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


            public function unlink_partner_configuracion() {
        $error            = 0;
        $message          = '';

        $co_partner_configuracion       = trim($this->input->post('co_partner_configuracion'));

        // Validacion 1
        if ($error == 0) {
            $this->partner_configuracion->unlink_partner_configuracion($co_partner_configuracion);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
  
}
?>