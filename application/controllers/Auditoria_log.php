<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditoria_log extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->model('auditoria_log_model');
	}

 function cerrar_notificacion() {
    $error               = 0;
    $message             = '';
    $co_auditoria     = $this->input->post('co_auditoria');
 	$this->auditoria_log_model->cerrar_notificacion_model($co_auditoria);
        $arreglo = array(
            'error' => $error,
            'message' => $message
        );
        echo json_encode($arreglo);

    }


}