<?php
class Sede_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // Verificar si el registro esta repetido
    
    function get_list_sedes_model() {
        $sql   = "SELECT
            a.*
            FROM
            i001t_sede AS a
            where a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_sede_one_model($co_sede) {
        $sql   = "SELECT
            a.*
            FROM
            i001t_sede AS a
            where a.id = $co_sede";
        $query = $this->db->query($sql);
        return $query->row();
    }


    

        function guardar_nuevo_sede_model($nb_sede, $tx_descripcion, $in_webservice, $nombre_archivo) {
        $this->db->trans_start();

        $data_listado['nb_sede']  = strtoupper($nb_sede);
        $data_listado['tx_descripcion']   = $tx_descripcion;
        $data_listado['in_webservice']   = $in_webservice;
        $data_listado['nb_url_foto'] = $nombre_archivo;
        $this->db->insert("i001t_sede", $data_listado);
        $co_new_sede = $this->db->insert_id();
        $this->db->trans_complete();
        return $co_new_sede;
    }

            function write_sede_model($co_sede, $nb_sede, $tx_descripcion, $in_webservice, $nombre_archivo) {
        $this->db->trans_start();

        $data_listado['nb_url_foto'] = $nombre_archivo;
        $data_listado['nb_sede']  = strtoupper($nb_sede);
        $data_listado['tx_descripcion']   = $tx_descripcion;
        $data_listado['in_webservice']   = $in_webservice;
        $this->db->where("id", $co_sede);
        $this->db->update("i001t_sede", $data_listado);
        $this->db->trans_complete();
        return true;
    }

        function unlink_sede($co_sede) {
        $this->db->trans_start();
        $data_listado['in_activo']    = false;
        $this->db->where("id", $co_sede);
        $this->db->update("i001t_sede", $data_listado);
        $this->db->trans_complete();
        return true;
    }

    
}
?>