<?php

class Auditoria_log_model extends CI_Model {


    function __construct()
    {
                parent::__construct();
        
    }


    function cerrar_notificacion_model($co_auditoria)
    {
        

        $this->db->trans_start();
        $x009t_log_usuario_biomercado['in_visto'] = 1;
        $this->db->where("id", $co_auditoria);
        $this->db->update("x009t_log_usuario_biomercado", $x009t_log_usuario_biomercado);
        $this->db->trans_complete();
        return true;

    }

  

}
?>