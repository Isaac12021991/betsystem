<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Entidad_monetaria extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Entidad_monetaria_model', 'entidad_monetaria');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }

    }
    public function index() {
        $data['list_entidad_monetaria'] = $this->entidad_monetaria->get_entidad_monetaria_model();
                $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('entidad_monetaria/banco_main_view');
        $this->load->view('layout/footer_view');
    }
    // Buscar Banco
        public function crear_banco() {
        $this->load->view('layout/header_aside_view');
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('entidad_monetaria/add/form_agregar_banco_view');
        $this->load->view('layout/footer_view');
    }

    // Guardar banco
    
        public function guardar_nuevo_banco() {
        $error            = 0;
        $message          = '';

        $nb_banco       = trim($this->input->post('nb_banco'));
        $tx_co_banco     = trim($this->input->post('tx_co_banco'));
        $tx_direccion     = trim($this->input->post('tx_direccion'));
        // Validacion 1
        if ($error == 0) {
            $this->entidad_monetaria->guardar_nuevo_banco_model($nb_banco, $tx_co_banco, $tx_direccion);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

            public function editar_banco($co_banco) {

        $data['info_banco'] = $this->entidad_monetaria->get_banco_one_model($co_banco);
        $data['co_banco'] = $co_banco;
                $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('entidad_monetaria/edit/form_editar_banco_view');
        $this->load->view('layout/footer_view');
    }

    
            public function write_banco() {
        $error            = 0;
        $message          = '';

        $co_banco       = trim($this->input->post('co_banco'));
        $nb_banco       = trim($this->input->post('nb_banco'));
        $tx_co_banco     = trim($this->input->post('tx_co_banco'));
        $tx_direccion     = trim($this->input->post('tx_direccion'));
        // Validacion 1
        if ($error == 0) {
            $this->entidad_monetaria->write_banco_model($co_banco, $nb_banco, $tx_co_banco, $tx_direccion);
            $message .= 'Actualizado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


            public function unlink_banco() {
        $error            = 0;
        $message          = '';

        $co_banco       = trim($this->input->post('co_banco'));

        // Validacion 1
        if ($error == 0) {
            $this->entidad_monetaria->unlink_banco($co_banco);
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