<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Reporte_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL
        function get_reportes_ganadores_pagos($co_sala, $nu_posicion) {

        $obj =& get_instance();

        $co_partner = $obj->ion_auth->co_partner();
        $co_usuario = $obj->ion_auth->user_id();

        $sql = "SELECT
        sum((aa.ca_monto * bb.ca_monto_inh) / bb.ca_dividendo) as ca_monto_pago
        from e003t_apuesta_compra as aa
        join x002t_sala_linea as bb on bb.id = aa.co_sala_linea
        where aa.co_sala = '$co_sala' 
        and aa.nb_estatus = 'APOSTADO' 
        and aa.nu_posicion_apuesta = $nu_posicion 
        and aa.in_activo = true";
        $query = $obj->db->query($sql);
        return $query->row();

    }
    // List

    // Info usuario taquilla

          function get_info_usuario_taquilla($co_taquilla) {

        $obj =& get_instance();

        $sql = "SELECT
        aa.*, bb.first_name, bb.last_name
        from j084t_taquillas as aa
        join lu_users as bb on bb.id = aa.co_usuario
        where aa.id = '$co_taquilla' 
        and aa.in_activo = true limit 1";
        $query = $obj->db->query($sql);
        return $query->row();

    }



}
?>