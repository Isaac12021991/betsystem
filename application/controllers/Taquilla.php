<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Taquilla extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Taquilla_model', 'taquilla');
         $this->load->model('carrera_caballo_model');
        $this->load->library('carrera_caballo_library');
        $this->load->library('taquilla_library');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }

    }
    public function index() {

        $lista_taquilla = $this->taquilla->get_taquilla_model();

        if($this->usuario_library->permiso_empresa("'USUARIO'")):

        if($lista_taquilla->num_rows() > 0): $info_taquilla = $lista_taquilla->row();

        redirect('taquilla/ver_sala_taquilla/'.$info_taquilla->id);

        else:  

        redirect('inicio/index');

        endif;

        endif;

        $data['list_taquilla'] = $lista_taquilla;
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('taquilla/taquilla_main_view');
        $this->load->view('layout/footer_view');
    }
    // Buscar taquilla
        public function crear_taquilla() {
        $data['list_usuario'] = $this->taquilla->get_usuario_model();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('taquilla/add/form_agregar_taquilla_view');
        $this->load->view('layout/footer_view');
    }

    // Guardar taquilla
    
        public function guardar_nuevo_taquilla() {
        $error            = 0;
        $message          = '';

        $nb_taquilla       = trim($this->input->post('nb_taquilla'));
        $co_usuario     = trim($this->input->post('co_usuario'));
        $tx_descripcion     = trim($this->input->post('tx_descripcion'));
        $ca_porcentaje     = trim($this->input->post('ca_porcentaje'));
        // Validacion 1
        if ($error == 0) {
            $this->taquilla->guardar_nuevo_taquilla_model($nb_taquilla, $co_usuario, $tx_descripcion, $ca_porcentaje);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

            public function editar_taquilla($co_taquilla) {

        $data['info_taquilla'] = $this->taquilla->get_taquilla_one_model($co_taquilla);
        $data['co_taquilla'] = $co_taquilla;
        $data['list_usuario'] = $this->taquilla->get_usuario_model();
        $this->load->view('layout/header_aside_view', $data);
       $this->load->view('layout/left_sidebar_view');
        $this->load->view('taquilla/edit/form_editar_taquilla_view');
        $this->load->view('layout/footer_view');
    }

    
            public function write_taquilla() {
        $error            = 0;
        $message          = '';

        $co_taquilla       = trim($this->input->post('co_taquilla'));
        $nb_taquilla       = trim($this->input->post('nb_taquilla'));
        $co_usuario     = trim($this->input->post('co_usuario'));
        $ca_porcentaje     = trim($this->input->post('ca_porcentaje'));
        $tx_descripcion     = trim($this->input->post('tx_descripcion'));
        // Validacion 1
        if ($error == 0) {
            $this->taquilla->write_taquilla_model($co_taquilla, $nb_taquilla, $co_usuario, $tx_descripcion, $ca_porcentaje);
            $message .= 'Actualizado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


            public function unlink_taquilla() {
        $error            = 0;
        $message          = '';

        $co_taquilla       = trim($this->input->post('co_taquilla'));

        // Validacion 1
        if ($error == 0) {
            $this->taquilla->unlink_taquilla($co_taquilla);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

    

            public function apostar_taquilla_usuario($co_sala, $co_taquilla) {

        $data['co_sala'] = $co_sala;
        $data['co_taquilla'] = $co_taquilla;
        $data['list_ejemplar'] = $this->taquilla->get_list_ejemplar_model($co_sala);
        $this->load->view('taquilla/apostar/apostar_taquilla_usuario_view', $data);

    }

    

                public function ver_sala_taquilla_usuario($co_taquilla, $co_sala) {


        $data['co_sala'] = $co_sala;
        $info_sala = $this->carrera_caballo_model->get_sala_modo_usuario($co_sala);

        if (is_null($info_sala)): 
            redirect('carrera_caballo/index');
        endif;
        $data['sala_linea_apuesta'] = $this->taquilla->get_info_apuesta_usuario($co_sala);

        $data['sala_linea_posiciones'] = $this->carrera_caballo_model->get_sala_linea_posiciones($co_sala);
        

        $data['info_sala'] = $info_sala;


        if($info_sala->nb_modo_juego == 'Ganadores'):

        $data['info_taquilla'] = $this->taquilla->get_taquilla_one_model($co_taquilla);
        $data['co_taquilla'] = $co_taquilla;
        $data['co_sala'] = $co_sala;
        $this->load->view('layout/header_aside_view', $data);
       $this->load->view('layout/left_sidebar_view');
        $this->load->view('taquilla/ver_sala_taquilla/ver_sala_taquilla_usuario_view');
        $this->load->view('layout/footer_view');

        endif;
    }


        public function ver_sala_taquilla($co_taquilla) {

        $data['co_taquilla'] = $co_taquilla;
        $data['carrera_hipodromo_modo_juego'] = $this->taquilla->get_ver_sala_taquilla_model($co_taquilla);
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('taquilla/ver_sala_taquilla/ver_sala_taquilla_view');
        $this->load->view('layout/footer_view');

    }

                public function eliminar_apuesta() {
        $error            = 0;
        $message          = '';

        $co_apuesta_compra       = trim($this->input->post('co_apuesta_compra'));

        // Validacion 1
        if ($error == 0) {
            $this->taquilla->eliminar_apuesta_model($co_apuesta_compra);
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