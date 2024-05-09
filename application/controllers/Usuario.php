<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation', 'usuario_library'
        ));

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

    $this->load->model('usuario_model');
    }



    function users_index() {
        $data['user_usuario'] = $this->usuario_model->get_user_usuario();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('usuario/user/user_usuario_view', $data);
        $this->load->view('layout/footer_view');
    }
    function active_user() {
        $co_usuario = $this->input->post('co_usuario');
        $message    = $this->usuario_model->active_user_model($co_usuario);
    }
    function desactive_user() {
        $co_usuario = $this->input->post('co_usuario');
        $message    = $this->usuario_model->desactive_user_model($co_usuario);
    }
        function eliminar_perfil() {
        $co_perfil = $this->input->post('co_perfil');
        $message    = $this->usuario_model->eliminar_perfil_model($co_perfil);
    }

    public function users_inactive() {
        $data['user_usuario'] = $this->usuario_model->get_user_inactive_usuario();
        $this->load->view('usuario/user/user_inactive_usuario_view', $data);
    }
    // Agregar Usuarios
    function agregar_usuario() {
        $data['info_perfiles'] = $this->usuario_model->get_info_perfiles();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('usuario/user/add/user_form_view');
        $this->load->view('layout/footer_view');
    }
    public function agregar_usuario_ejecutar() {
        $error          = 0;
        $message        = '';
        $first_name     = trim($this->input->post('first_name'));
        $last_name      = trim($this->input->post('last_name'));
        $nu_cedula      = trim($this->input->post('nu_cedula'));
        $email          = trim($this->input->post('email'));
        $password          = trim($this->input->post('password'));
        $tx_permiso = $this->input->post('tx_permiso', true);

        $username  = trim($this->input->post('username'));
        $ca_limite_apuesta  = trim($this->input->post('ca_limite_apuesta'));

        // Validar Email
        $resp_existente = $this->usuario_model->get_email_existente_model($email);
        if ($resp_existente->num_rows() > 0) {
            $message .= 'El email: ' . $email . ' ya esta registrado en sistema';
            $error++;
        }
        // Validacion 1
        if ($error == 0) {
            $co_usuario = $this->usuario_model->nuevo_usuario_model($email, $first_name, $last_name, $nu_cedula, $password, $tx_permiso, $username, $ca_limite_apuesta);
            $message .= 'Agregado';
        }

        $data               = array(
            'nombre' => $first_name,
            'apellido' => $last_name,
            'cedula' => $nu_cedula,
            'email' => $email,
            'password' => $password
        );


        $htmlContent        = $this->load->view('/usuario/user/email/template_email_view', $data, true);
        $config['mailtype'] = 'html';
       /* $this->email->initialize($config);
        $this->email->to($email);
        $this->email->reply_to('admision@bionewpharma.com');
        $this->email->from('admision@bionewpharma.com', 'Bio New Pharma C.A');
        $this->email->subject('[BIENVENIDO]');
        $this->email->message($htmlContent);
        $this->email->send(); */


        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }
    // Editar Usuario
    function editar_usuario($co_usuario) {

        $data['info_usuario']             = $this->usuario_model->get_user_usuario_id($co_usuario);
        $data['co_usuario']               = $co_usuario;
        $co_partner = $this->ion_auth->co_partner();

        $info_usuario_empresa = $this->usuario_model->get_info_usuario_empresa($co_usuario, $co_partner);

        $data['tx_permiso'] = $this->usuario_model->get_permisos_partner($info_usuario_empresa->id);
        $data['co_usuario_partner']               = $info_usuario_empresa->id;

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('usuario/user/update/user_edit_view');
        $this->load->view('layout/footer_view');
    }   


    public function editar_usuario_ejecutar() {
        $error      = 0;
        $message    = '';
        $first_name = trim($this->input->post('first_name'));
        $last_name  = trim($this->input->post('last_name'));
        $nu_cedula  = trim($this->input->post('nu_cedula'));

        $username  = trim($this->input->post('username'));
        $ca_limite_apuesta  = trim($this->input->post('ca_limite_apuesta'));
        $email      = trim($this->input->post('email'));
        $co_usuario = trim($this->input->post('co_usuario'));
        $co_usuario_partner = trim($this->input->post('co_usuario_partner'));
        $tx_permiso = $this->input->post('tx_permiso', true);
        // Validacion 1
        if ($error == 0) {
            $co_usuario = $this->usuario_model->actualizar_usuario_model($co_usuario, $email, $first_name, $last_name, $nu_cedula, $tx_permiso, $co_usuario_partner, $username, $ca_limite_apuesta);
            $message .= 'Actualizado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

        function perfiles() {
        
        $data['lista_perfiles'] = $this->usuario_model->get_lista_perfiles();
                $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('usuario/perfiles/perfiles_view', $data);
        $this->load->view('layout/footer_view');

    }


        function nuevo_perfil() {

        $data['lista_privilegios'] = $this->usuario_model->get_lista_privilegios();
                $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('usuario/perfiles/add/nuevo_perfil_view', $data);
        $this->load->view('layout/footer_view');
        
    }

    function create_perfil() {
        $nb_perfil         = $this->input->post('nb_perfil');
        $tx_descripcion   = $this->input->post('tx_descripcion');
        $accion_check_reci = $this->input->post('accion_check', true);
        $this->usuario_model->create_perfil_model($nb_perfil, $tx_descripcion, $accion_check_reci);
        print_r('Activados');
    }

    // Editar perfil

           function editar_perfil($co_perfil) {

        $data['info_perfil'] = $this->usuario_model->get_info_perfil($co_perfil);
        $data['lista_privilegios'] = $this->usuario_model->get_lista_privilegios();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('usuario/perfiles/update/editar_perfil_view', $data);
        $this->load->view('layout/footer_view');
        
    }

        function write_perfil() {
        $co_perfil         = $this->input->post('co_perfil');
        $nb_perfil         = $this->input->post('nb_perfil');
        $tx_descripcion   = $this->input->post('tx_descripcion');
        $accion_check_reci = $this->input->post('accion_check', true);
        $this->usuario_model->write_perfil_model($co_perfil, $nb_perfil, $tx_descripcion, $accion_check_reci);

        print_r('Activados');
    }

                    function ver_historial($co_usuario) {


        $data["historial"] = $this->usuario_model->get_historial($co_usuario);
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('usuario/user/historial/historial_view');
        $this->load->view('layout/footer_view');
    }

    

}
?>