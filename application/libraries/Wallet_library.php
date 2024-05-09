<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Wallet_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL


                function get_saldo_usuario($co_usuario, $co_partner) {

        $obj =& get_instance();

        $sql   = "SELECT a.*
              FROM j081t_wallet as a
            where a.in_activo = true and a.co_usuario = '$co_usuario' and a.co_partner = $co_partner and a.co_moneda = 2";
        $query_uno = $obj->db->query($sql);
        $info_saldo = $query_uno->row();

        $sql   = "SELECT sum(a.ca_monto) as ca_monto
              FROM e003t_apuesta_compra as a
              left join x002t_sala_linea as b on b.id = a.co_sala_linea
              left join j082t_sala as c on c.id = b.co_sala
            where a.in_activo = true and a.co_usuario = '$co_usuario' and a.co_partner = $co_partner and a.nb_estatus = 'APOSTADO' and c.nb_estatus in ('ABIERTO','CERRADO') and b.in_activo = true and c.in_activo = true";
        $query_dos = $obj->db->query($sql);
        $info_apuesta_actual = $query_dos->row();

        $ca_saldo = $info_saldo->ca_saldo - $info_apuesta_actual->ca_monto;

        return $ca_saldo;
    }

             function get_info_wallet($co_usuario, $co_partner)
    {
        $obj =& get_instance();

        $sql = "SELECT a.*
        FROM
        j081t_wallet AS a
        where a.co_usuario = '$co_usuario' and a.co_partner = '$co_partner'";
        $query = $obj->db->query($sql);
        return $query->row();
    }



                function get_saldo_congelado($co_usuario, $co_partner) {

        $obj =& get_instance();


        $sql   = "SELECT sum(a.ca_monto) as ca_monto
              FROM e003t_apuesta_compra as a
              left join x002t_sala_linea as b on b.id = a.co_sala_linea
              left join j082t_sala as c on c.id = b.co_sala
            where a.in_activo = true and a.co_usuario = '$co_usuario' and a.co_partner = $co_partner and a.nb_estatus = 'APOSTADO' and c.nb_estatus in ('ABIERTO','CERRADO') and b.in_activo = true and c.in_activo = true";
        $query_dos = $obj->db->query($sql);
        $info_apuesta_actual = $query_dos->row();

        $ca_saldo = $info_apuesta_actual->ca_monto;

        return $ca_saldo;
    }

                    function get_limite_apuesta($co_usuario, $co_partner) {

        $obj =& get_instance();


        $sql   = "SELECT a.ca_limite_apuesta
              FROM lu_users as a
            where a.id = $co_usuario";
        $query_dos = $obj->db->query($sql);
        $info_apuesta_actual = $query_dos->row();

        $ca_saldo = $info_apuesta_actual->ca_limite_apuesta;

        return $ca_saldo;
    }


    


}
?>