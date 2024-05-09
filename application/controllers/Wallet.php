<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wallet extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->model('Wallet_model', 'wallet');

        $this->load->library('pagination');
        $this->load->library('encrypt');

        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login');
            return;
        }
    }

    public function get_saldo_actual()
    {

        $co_usuario = $this->ion_auth->user_id(); $co_partner = $this->ion_auth->co_partner();
        echo $this->wallet_library->get_saldo_usuario($co_usuario, $co_partner).' $';
    }

    public function index() {
        $data['list_pagos'] = $this->wallet->get_pagos_model();
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('wallet/wallet_main_view');
        $this->load->view('layout/footer_view');
    }
    // Listado de parroquia y municipios

 
    // Agregar almacen
    public function abonar() {
        //$data['lista_banco'] = $this->pagos->get_bancos();
        $data['abonar'] = 'abonar';
        $data['lista_diario'] = $this->wallet->get_lista_diario_model();
        $data['lista_usuario'] = $this->wallet->get_usuarios_model();

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('wallet/add/form_agregar_pago_view');
        $this->load->view('layout/footer_view');
    }

    public function ejecutar_abonar() {
        $error               = 0;
        $message             = '';

        $tx_descripcion      = trim($this->input->post('tx_descripcion'));
        $ca_monto      = trim($this->input->post('ca_monto'));
        $ff_pago      = trim($this->input->post('ff_pago'));
        $co_diario      = trim($this->input->post('co_diario'));
        $co_usuario      = trim($this->input->post('co_usuario'));
        $nombre_archivo = '';

        // Formatear numero
        $ca_monto = str_replace(".", "", $ca_monto);
        $ca_monto = str_replace(",", ".", $ca_monto);

                if (isset($_FILES['mi_archivo']['name'])):

        $mi_archivo_2 = $_FILES['mi_archivo']['name'];

        $ext = pathinfo($mi_archivo_2, PATHINFO_EXTENSION);
        $nombre_archivo_guardar = $this->encrypt->encode($mi_archivo_2);
        $nombre_archivo_guardar = str_replace('=','', $nombre_archivo_guardar);
        $nombre_archivo_guardar = str_replace('/','', $nombre_archivo_guardar); 
        $nombre_archivo = base_url().'img/pagos/'.$nombre_archivo_guardar.'.'.$ext;

        $mi_archivo = 'mi_archivo';
        $config['upload_path'] = "img/pagos";
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
            $this->wallet->ejecutar_abonar_model($ca_monto, $tx_descripcion, $ff_pago, $nombre_archivo, $co_diario, $co_usuario);
            $message .= 'Agregado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }

        public function retirar() {
        //$data['lista_banco'] = $this->pagos->get_bancos();
        $data['retirar'] = 'retirar';
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('wallet/add/form_retirar_pago_view');
        $this->load->view('layout/footer_view');
    }

    

        public function ejecutar_retirar() {
        $error               = 0;
        $message             = '';

        $ca_monto      = trim($this->input->post('ca_monto'));

        if ($ca_monto <= 0):

            $message = 'Ingrese un monto válido';
            $error ++;
            // code...
        endif;

        // Verificar que no sea mayor
        $info_saldo = $this->ion_auth->saldo();

        if ($ca_monto > $info_saldo->ca_saldo):

            $message = 'El monto a retirar es mayor al disponible';
            $error ++;
            // code...
        endif;




        if ($error == 0) {
            $this->wallet->ejecutar_retirar_model($ca_monto, $info_saldo->id);
            $message .= 'Ejecutado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


        public function eliminar_pago() {
        $error               = 0;
        $message             = '';

        $co_pago      = trim($this->input->post('co_pago'));

        if ($error == 0) {
            $this->wallet->eliminar_pago_model($co_pago);
            $message .= 'Ejecutado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


    // Aprobar pago

        public function aprobar_pago() {
        $error               = 0;
        $message             = '';

        $co_pago      = trim($this->input->post('co_pago'));

        if ($error == 0) {
            $this->wallet->aprobar_pago_model($co_pago);
            $message .= 'Ejecutado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }


    // Aprobar pago

        public function rechazar_pago() {
        $error               = 0;
        $message             = '';

        $co_pago      = trim($this->input->post('co_pago'));

        if ($error == 0) {
            $this->wallet->rechazar_pago_model($co_pago);
            $message .= 'Ejecutado';
        }
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);
    }



        public function balance() {
        $data['info_balance'] = $this->wallet->get_balance();
        $data['balance'] = 'balance';
        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('wallet/info_balance_view');
        $this->load->view('layout/footer_view');
    }

    public function movimiento_wallet($co_usuario = 0) {

        $data['list_pagos'] = $this->wallet->get_pagos_movimientos_model($co_usuario);
        $ca_saldo_usuario = $this->wallet_library->get_saldo_usuario($co_usuario, $this->ion_auth->co_partner());
        $data['ca_saldo_usuario'] = $ca_saldo_usuario;

        $this->load->view('layout/header_aside_view', $data);
        $this->load->view('layout/left_sidebar_view');
        $this->load->view('wallet/wallet_main_movimiento_usuario_view');
        $this->load->view('layout/footer_view');
    }
    

}
?>