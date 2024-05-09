<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sede extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Sede_model', 'sede');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }

        $this->load->library('encrypt');

    }
    public function index() {
        $data['list_sedes'] = $this->sede->get_list_sedes_model();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('sede/sede_main_view');
        $this->load->view('layout/footer_view');
    }
    // Buscar sede
        public function crear_sede() {
        $this->load->view('layout/header_aside_view');
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('sede/add/form_agregar_sede_view');
        $this->load->view('layout/footer_view');
    }

    // Guardar sede
    
    public function guardar_nuevo_sede() {
        $error               = 0;
        $message             = '';
        $nb_sede = trim($this->input->post('nb_sede'));
        $tx_descripcion        = trim($this->input->post('tx_descripcion'));
        $in_webservice        = trim($this->input->post('in_webservice'));

        $nombre_archivo = '';

                if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/sede/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/sede";
        $config['file_name'] = $nombre_archivo_guardar.'.'.$ext;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "3000";
        $config['max_width'] = "3000";
        $config['max_height'] = "3000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();

            $message = $this->upload->display_errors();
            $error ++;

        }else{

            $data['uploadSuccess'] = $this->upload->data();

        }


        endif;


        if ($error == 0) {
            $this->sede->guardar_nuevo_sede_model($nb_sede, $tx_descripcion, $in_webservice, $nombre_archivo);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

            public function editar_sede($co_sede) {

        $data['info_sede'] = $this->sede->get_sede_one_model($co_sede);
        $data['co_sede'] = $co_sede;
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('sede/edit/form_editar_sede_view');
        $this->load->view('layout/footer_view');
    }

    
     public function write_sede() {
        $error               = 0;
        $message             = '';
        $co_sede = trim($this->input->post('co_sede'));
        $nb_sede = trim($this->input->post('nb_sede'));
        $tx_descripcion        = trim($this->input->post('tx_descripcion'));
        $in_webservice        = trim($this->input->post('in_webservice'));

        $nombre_archivo = '';

                if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/sede/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/sede";
        $config['file_name'] = $nombre_archivo_guardar.'.'.$ext;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "3000";
        $config['max_width'] = "3000";
        $config['max_height'] = "3000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();

            $message = $this->upload->display_errors();
            $error ++;

        }else{

            $data['uploadSuccess'] = $this->upload->data();

        }


        endif;


        if ($error == 0) {
            $this->sede->write_sede_model($co_sede, $nb_sede, $tx_descripcion, $in_webservice, $nombre_archivo);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



            public function unlink_sede() {
        $error            = 0;
        $message          = '';

        $co_sede       = trim($this->input->post('co_sede'));

        // Validacion 1
        if ($error == 0) {
            $this->sede->unlink_sede($co_sede);
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