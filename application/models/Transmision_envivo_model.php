<?php
class Transmision_envivo_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // Verificar si el registro esta repetido
    
    function get_list_video_model($nb_sede = '') {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        if($nb_sede != ''): $nb_sede = " and a.nb_sede = '$nb_sede'"; else: $nb_sede = ''; endif;

        $sql   = "SELECT
            a.*
            FROM
            x005t_videos AS a
            where a.in_activo = true and a.co_partner = '$co_partner' $nb_sede order by a.id desc";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_list_sala_model() {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
            a.*
            FROM
            j082t_sala AS a
            where a.in_activo = true and a.co_partner = '$co_partner' and a.nb_estatus in ('EN ESPERA','ABIERTO','CERRADO') order by a.id desc";
        $query = $this->db->query($sql);
        return $query;
    }

            function get_list_sede_model() {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
            a.nb_sede
            FROM
            j082t_sala AS a
            where a.in_activo = true and a.co_partner = '$co_partner' group by a.nb_sede order by a.nb_sede asc";
        $query = $this->db->query($sql);
        return $query;
    }



        function get_transmision_envivo_one_model($co_transmision_envivo) {
        $sql   = "SELECT
            a.*
            FROM
            x005t_videos AS a
            where a.id = $co_transmision_envivo";
        $query = $this->db->query($sql);
        return $query->row();
    }


    

        function guardar_nuevo_transmision_envivo_model($nb_video, $tx_descripcion, $tx_src, $nb_origen, $co_sala, $nb_sede) {
        $this->db->trans_start();

        $tx_src = str_replace('watch?v=', 'embed/', $tx_src);

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $x005t_videos['nb_video']  = $nb_video;
        $x005t_videos['tx_descripcion']   = $tx_descripcion;
        $x005t_videos['tx_src'] = $tx_src;
        $x005t_videos['nb_origen']   = $nb_origen;
        $x005t_videos['co_sala'] = $co_sala;
        $x005t_videos['nb_sede'] = $nb_sede;
        $x005t_videos['co_usuario']   = $co_usuario;
        $x005t_videos['co_partner'] = $co_partner;
        $this->db->insert("x005t_videos", $x005t_videos);
        $co_new_transmision_envivo = $this->db->insert_id();
        $this->db->trans_complete();
        return $co_new_transmision_envivo;
    }

            function write_transmision_envivo_model($co_transmision_envivo, $nb_video, $tx_descripcion, $tx_src, $nb_origen, $co_sala, $nb_sede) {
        $this->db->trans_start();

        $tx_src = str_replace('watch?v=', 'embed/', $tx_src);

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $x005t_videos['nb_video']  = $nb_video;
        $x005t_videos['tx_descripcion']   = $tx_descripcion;
        $x005t_videos['tx_src'] = $tx_src;
        $x005t_videos['nb_origen']   = $nb_origen;
        $x005t_videos['co_sala'] = $co_sala;
        $x005t_videos['nb_sede'] = $nb_sede;
        $x005t_videos['co_usuario']   = $co_usuario;
        $x005t_videos['co_partner'] = $co_partner;
        $this->db->where("id", $co_transmision_envivo);
        $this->db->update("x005t_videos", $x005t_videos);
        $this->db->trans_complete();
        return true;
    }

        function unlink_transmision_envivo($co_transmision_envivo) {
        $this->db->trans_start();
        $x005t_videos['in_activo']    = false;
        $this->db->where("id", $co_transmision_envivo);
        $this->db->update("x005t_videos", $x005t_videos);
        $this->db->trans_complete();
        return true;
    }

    
}
?>