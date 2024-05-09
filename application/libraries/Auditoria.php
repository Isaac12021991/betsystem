<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auditoria {

	function __construct() {
	}
	
	/**
	 * Registra la accion realizada por el usuario.
	 */
	function log_usuario($tx_modulo, $tx_accion,  $tx_descripcion, $co_usuario = 0, $co_usuario_notificar = 0, $co_producto_publicaciones = 0) {
		// Carga las librerias y helpers
		$obj =& get_instance();

		$nb_os = $obj->agent->platform();
		$nb_navegador = $obj->agent->browser();
		$tx_agente = $obj->agent->agent_string();  

		// Obtiene los datos del usuario
		$data = array(
               'tx_ip' => $obj->input->ip_address(),
               'tx_accion' => $tx_accion,
               'tx_descripcion' => $tx_descripcion,
               'tx_modulo' => $tx_modulo,
               'co_usuario' => $co_usuario,
               'nb_os' => $nb_os,
               'nb_navegador' => $nb_navegador,
               'tx_agente' => $tx_agente
            );
		
		// Inserta la accion en la tabla de auditoria
		$obj->db->insert('x00t_log_usuario', $data);
	}


	        function notificaciones()
    {
        $obj =& get_instance();
        $user_id = $obj->ion_auth->user_id();

            $sql = "SELECT
            *
            FROM x00t_log_usuario AS a
            WHERE
            a.in_activo = TRUE  order by a.id asc";
    $query = $obj->db->query($sql);
    return $query;  

        
    }


}
?>