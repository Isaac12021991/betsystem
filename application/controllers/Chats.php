<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chats extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Chats_model', 'chats');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            return;
        }
        $this->load->library('chats_library');
        $this->load->library('authjwt');

    }
    public function index() {
        
       // $data['list_user'] = $this->chats->get_contactos_resumen_model();
        $data['list_user_reciente'] = $this->chats->get_chats_usuario_resumen_model();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('chats/chats_contactos_recientes_view');
        $this->load->view('layout/footer_view');
    }

        public function contactos() {
        
        $data['list_user'] = $this->chats->get_contactos_resumen_model();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('chats/chats_contactos_view');
        $this->load->view('layout/footer_view');
    }

        public function chats_user($token_chats) {

        $info_token_chats =  $this->authjwt->decode_token($token_chats);
        
        $data['ca_mensajes'] = $this->chats->get_ca_mensajes_model($info_token_chats->username);
        $data['username_chats'] = $info_token_chats->username;
        $data['co_grupo_difusion'] = $info_token_chats->co_grupo_difusion;
        $data['list_user_reciente'] = $this->chats->get_chats_usuario_resumen_model();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('chats/chats_main_view');
        $this->load->view('layout/footer_view');
    }

    // reload chats nuevo

            public function reload_chats_nuevo_entrante() {
        
        // $data['ca_mensajes'] = $this->chats->get_ca_mensajes_model($username_chats);
        $data['list_user_reciente'] = $this->chats->get_chats_usuario_resumen_model();
        $this->load->view('chats/reload/reload_chats_nuevo_entrante_view', $data);
    }





        public function reload_mensaje() {


        $limite_incio     = trim($this->input->post('limite_incio'));
        $limite_final     = trim($this->input->post('limite_final'));
        $username_chats     = trim($this->input->post('username_chats'));
        $co_grupo_difusion     = trim($this->input->post('co_grupo_difusion'));

        $mensajes = $this->chats->get_chats_model($limite_incio, $limite_final, $username_chats, $co_grupo_difusion);

        $data = $mensajes->result_array();



        $arreglo = array(
            'array_new' => json_encode($data, JSON_PRETTY_PRINT)
        );
        echo json_encode($arreglo);
        die();



    }



    // Guardar banco
    
        public function ejecutar_enviar_mensaje() {
        $error            = 0;
        $message          = '';

        $tx_mensaje       = trim($this->input->post('tx_mensaje'));
        $username_chats       = trim($this->input->post('username_chats'));
        $co_grupo_difusion       = trim($this->input->post('co_grupo_difusion'));
        // Validacion 1
        if ($error == 0) {
            $this->chats->ejecutar_enviar_mensaje_model($tx_mensaje, $username_chats, $co_grupo_difusion);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


    
            public function conexion_chats_cliente_servidor() {
        $error            = 0;
        $message          = '';
        $ca_mensajes_nuevos = 0;


        if ($error == 0) {
          $message =  $this->chats->conexion_chats_cliente_servidor_model();
          $ca_mensajes_nuevos =  $this->chats->get_mensajes_nuevos();
        }

        $data = $message->result_array();

        $arreglo = array(
            'array_new_resultados' => json_encode($data, JSON_PRETTY_PRINT),
            'ca_mensajes_nuevos' => $ca_mensajes_nuevos
        );
        echo json_encode($arreglo);
        die();

    }


            public function eliminar_chats() {
        $error            = 0;
        $message          = '';

        $username_contacto       = trim($this->input->post('username_contacto'));

        // Validacion 1
        if ($error == 0) {
            $this->chats->eliminar_chats_model($username_contacto);
            $message .= 'Eliminado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


    public function reload_contacto() {
        $limite_incio       = trim($this->input->post('limite_incio'));
        $limite_final       = trim($this->input->post('limite_final'));
        $data['list_user_reciente'] = $this->chats->get_chats_usuario_resumen_reload_model($limite_incio, $limite_final);
        $this->load->view('chats/reload/reload_contacto_view', $data);

    }


                public function set_mensaje_recibido_leido() {

        $co_mensaje       = trim($this->input->post('co_mensaje'));
        $this->chats->set_mensaje_recibido_leido_model($co_mensaje);

        }

        // Nuevo contacto


            public function nuevo_contacto() {
        
      //  $data['list_user_reciente'] = $this->chats->get_chats_usuario_resumen_model();
        $this->load->view('layout/header_aside_view');
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('chats/contacto/form_agregar_contacto_view');
        $this->load->view('layout/footer_view');
    }

                public function guardar_nuevo_contacto() {
        $error            = 0;
        $message          = '';
        $co_usuario_contacto = '0';

        $username       = trim($this->input->post('username'));
        $nb_nombre       = trim($this->input->post('nb_nombre'));
        $nb_apellido       = trim($this->input->post('nb_apellido'));
        $nu_telefono_celular       = trim($this->input->post('nu_telefono_celular'));
        $tx_email       = trim($this->input->post('tx_email'));
        $tx_descripcion       = trim($this->input->post('tx_descripcion'));

        // Verificar si el usuario existe en mis contactos


        if ($this->chats->get_user_id_in_contacto($username) == true):

            $message = 'Este usuario ya existe en tus contactos.';
            $error ++;

        endif;



        // Verificar si existe en mi sistema

        $info_usuario = $this->chats->get_user_id($username);

        if (!$info_usuario):

            $message = 'Este usuario no existe en el sistema';
            $error ++;
        else:

            $co_usuario_contacto = $info_usuario->id;


        endif;


        // Validacion 1
        if ($error == 0) {
            $this->chats->guardar_nuevo_contacto_model($nb_nombre, $nb_apellido, $nu_telefono_celular, $tx_email, $tx_descripcion, $username);
            $message .= 'Guardado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


        public function ejecutar_enviar_mensaje_masivo() {
        $error            = 0;
        $message          = '';

        $tx_mensaje_masivo       = trim($this->input->post('tx_mensaje_masivo'));
        $username_chats       = $this->input->post('selected');

        // Validacion 1
        if ($error == 0) {
            $this->chats->ejecutar_enviar_mensaje_masivo_model($tx_mensaje_masivo, $username_chats);
            $message .= 'Mensaje enviado a todos los contactos seleccionado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

                public function eliminar_contacto() {
        $error            = 0;
        $message          = '';

        $username_contacto       = trim($this->input->post('username_contacto'));

        // Validacion 1
        if ($error == 0) {
            $this->chats->eliminar_chats_model($username_contacto);
            $this->chats->eliminar_contacto_model($username_contacto);
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