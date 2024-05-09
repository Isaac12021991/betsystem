<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Empresa_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }


        function get_info_empresa() {
        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM i00t_empresas as a limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
    }

            function get_info_usuario($co_usuario) {
        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM lu_users as a where a.id = $co_usuario";
        $query = $obj->db->query($sql);
        return $query->row();
    }

            function get_info_aplicacion() {
        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM lu_app as a limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
    }


                function get_info_partner($co_partner) {
        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM j049t_empresas_farmaceuticas_todas as a where a.id = $co_partner limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
    }

                    function get_logo_partner() {
        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();    

        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM j049t_empresas_farmaceuticas_todas as a where a.id = $co_partner limit 1";
        $query = $obj->db->query($sql);
        $info_empresa = $query->row();
        return $info_empresa->nb_url_foto;
    }



            function get_partner_actual() {
        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();    

        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM j049t_empresas_farmaceuticas_todas as a where a.id = $co_partner limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
    }


// Configuracion partner


            function get_partner_configuracion($nb_partner_configuracion) {
        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();    

        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM j085t_partner_configuracion as a where a.co_partner = $co_partner and a.nb_partner_configuracion = '$nb_partner_configuracion' order by a.id desc limit 1";
        $query = $obj->db->query($sql);

        if ($query->num_rows() > 0): return $query->row(); else: return false; endif;
        
    }


            function get_partner_configuracion_gaceta_sede($nb_partner_configuracion, $nb_sede) {
        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();    

        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM j085t_partner_configuracion as a where a.co_partner = $co_partner and a.nb_partner_configuracion = '$nb_partner_configuracion' and a.nb_sede = '$nb_sede' order by a.id desc limit 1";
        $query = $obj->db->query($sql);

        if ($query->num_rows() > 0): return $query->row(); else: return false; endif;
        
    }


            function get_partner_configuracion_gaceta_sala($nb_partner_configuracion, $co_sala) {
        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();    

        $obj =& get_instance();
        $sql   = "SELECT a.*
            FROM j085t_partner_configuracion as a where a.co_partner = $co_partner and a.nb_partner_configuracion = '$nb_partner_configuracion' and a.co_sala = '$co_sala' order by a.id desc limit 1";
        $query = $obj->db->query($sql);

        if ($query->num_rows() > 0): return $query->row(); else: return false; endif;
        
    }





    
}
?>