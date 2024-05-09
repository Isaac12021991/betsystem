<?php
class Partner_configuracion_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // Verificar si el registro esta repetido
    
    function get_partner_configuracion_model() {
        $sql   = "SELECT
            a.*
            FROM
            j085t_partner_configuracion AS a
            where a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_partner_configuracion_one_model($co_partner_configuracion) {
        $sql   = "SELECT
            a.*
            FROM
            j085t_partner_configuracion AS a
            where a.id = $co_partner_configuracion";
        $query = $this->db->query($sql);
        return $query->row();
    }

                function get_sedes() {

        $sql = "SELECT a.*
        FROM
        i001t_sede AS a
        where a.in_activo = true and a.nb_deporte = 'CABALLO'";
        $query = $this->db->query($sql);
        return $query;
    }



    

        function guardar_nuevo_partner_configuracion_model($nb_partner_configuracion, $tx_link, $tx_descripcion, $nb_sede, $co_sala) {
        $this->db->trans_start();

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $j085t_partner_configuracion['nb_partner_configuracion']  = strtoupper($nb_partner_configuracion);
        $j085t_partner_configuracion['tx_link']   = $tx_link;
        $j085t_partner_configuracion['nb_sede']   = $nb_sede;
        $j085t_partner_configuracion['tx_descripcion'] = $tx_descripcion;
        $j085t_partner_configuracion['co_partner'] = $co_partner;
        $j085t_partner_configuracion['co_usuario'] = $co_usuario;
        $j085t_partner_configuracion['co_sala'] = $co_sala;
        $this->db->insert("j085t_partner_configuracion", $j085t_partner_configuracion);
        $co_new_partner_configuracion = $this->db->insert_id();
        $this->db->trans_complete();
        return $co_new_partner_configuracion;
    }

            function write_partner_configuracion_model($co_partner_configuracion, $nb_partner_configuracion, $tx_link, $tx_descripcion, $nb_sede, $co_sala) {
        $this->db->trans_start();

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $j085t_partner_configuracion['nb_partner_configuracion']  = strtoupper($nb_partner_configuracion);
        $j085t_partner_configuracion['tx_link']   = $tx_link;
        $j085t_partner_configuracion['nb_sede']   = $nb_sede;
        $j085t_partner_configuracion['tx_descripcion'] = $tx_descripcion;
        $j085t_partner_configuracion['co_partner'] = $co_partner;
        $j085t_partner_configuracion['co_usuario'] = $co_usuario;
        $j085t_partner_configuracion['co_sala'] = $co_sala;
        $this->db->where("id", $co_partner_configuracion);
        $this->db->update("j085t_partner_configuracion", $j085t_partner_configuracion);
        $this->db->trans_complete();
        return true;
    }

        function unlink_partner_configuracion($co_partner_configuracion) {
        $this->db->trans_start();
        $data_listado['in_activo']    = false;
        $this->db->where("id", $co_partner_configuracion);
        $this->db->update("j085t_partner_configuracion", $data_listado);
        $this->db->trans_complete();
        return true;
    }

            function get_list_sala_model() {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
            a.*
            FROM
            j082t_sala AS a
            where a.in_activo = true and a.co_partner = '$co_partner' and a.nb_estatus in ('EN ESPERA','INICIADO','FINALIZADO') order by a.id desc";
        $query = $this->db->query($sql);
        return $query;
    }

    
}
?>