<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Inicio_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL

    function get_publicidad_sala($tx_ubicacion) {

        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();  
        $sql = "SELECT a.*
        FROM j082t_sala AS a 
        where a.in_activo = true 
        and a.co_partner = $co_partner 
        and a.nb_estatus in ('INICIADO')
        and a.tx_publicidad_sala_ubicacion in ('$tx_ubicacion')";
        $query = $obj->db->query($sql);
        return $query;
    }

   
       function get_info_sala($nb_deporte) {

        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();  

        $sql = "SELECT a.*
        FROM j082t_sala AS a 
        where a.in_activo = true 
        and a.co_partner = $co_partner 
        and a.nb_estatus in ('INICIADO')
        and a.nb_deporte in ('$nb_deporte')";
        $query = $obj->db->query($sql);
        return $query;
    }

           function get_info_sala_linea($co_sala) {

        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();  

        $sql = "SELECT a.*
        FROM x002t_sala_linea AS a 
        where a.in_activo = true 
        and a.co_sala = $co_sala ";
        $query = $obj->db->query($sql);
        return $query;
    }

        function get_publicidad_sede_sala($tx_ubicacion, $nb_sede) {

        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();  
        $sql = "SELECT a.*
        FROM j082t_sala AS a 
        where a.in_activo = true 
        and a.co_partner = $co_partner 
        and a.nb_estatus in ('INICIADO')
        and a.tx_publicidad_sala_ubicacion in ('$tx_ubicacion')";
        $query = $obj->db->query($sql);
        return $query;
    }




}
?>