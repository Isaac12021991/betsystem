<?php
class Reportes_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // Lista de almacenes
    function get_reportes_model($nb_sede, $nb_modo_juego) {
        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        if ($nb_sede != ''): $nb_sede = " and b.nb_sede = '$nb_sede'"; else: $nb_sede = ""; endif;

        if ($nb_modo_juego != ''): $nb_modo_juego = " and b.nb_modo_juego = '$nb_modo_juego'"; else: $nb_modo_juego = ""; endif;

        $sql = "SELECT
        sum(a.ca_monto) as ca_monto_pago,
        b.nu_carrera,
        b.ca_pote,
        b.ca_pote_tablazo,
        (SELECT sum(aa.ca_monto) FROM e003t_apuesta_compra as aa where aa.co_sala = b.id and   aa.nb_estatus = 'APOSTADO' and aa.in_activo) as ca_total_apuesta,
        COALESCE((SELECT sum(aa.ca_monto) FROM e003t_apuesta_compra as aa where aa.co_sala = b.id and  aa.nb_estatus = 'APOSTADO' and aa.in_activo = true and aa.co_usuario = b.co_usuario),0) as ca_total_apuesta_administrador,
        COALESCE((SELECT sum(aa.ca_monto) FROM e003t_apuesta_compra as aa where aa.co_sala = b.id and  aa.nb_estatus = 'APOSTADO' and aa.in_activo = true and not aa.co_usuario = b.co_usuario),0) as ca_total_apuesta_cliente,
        a.co_usuario,
        b.nb_sede
        from j080t_pagos as a
        left join j082t_sala as b on b.id = a.co_sala
        where a.co_sala is NOT NULL and a.co_partner = '$co_partner' and b.in_activo = true and a.nb_operacion = 'CREDITO' $nb_sede $nb_modo_juego group by 2,3,4,8,9";
        $query = $this->db->query($sql);
        return $query;
    }
    // Lista de Movimiento
   

            function get_sedes() {

        $sql = "SELECT a.*
        FROM
        i001t_sede AS a
        where a.in_activo = true and a.nb_deporte = 'CABALLO'";
        $query = $this->db->query($sql);
        return $query;
    }



        function get_reportes_envivo_ganadores_model() {

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT a.nu_carrera, a.nb_sede,
        (SELECT count(aa.id) from x002t_sala_linea as aa where aa.co_sala = a.id and aa.nb_estatus = 'RETIRADO' and aa.in_activo = true) as caballos_retirados,
        (SELECT sum(aa.ca_monto) from e003t_apuesta_compra as aa where aa.co_sala = a.id and aa.nb_estatus = 'APOSTADO' and aa.nu_posicion_apuesta = 1 and aa.in_activo = true) as monto_apostado_primer_lugar,
        
        (SELECT sum(aa.ca_monto) from e003t_apuesta_compra as aa where aa.co_sala = a.id and aa.nb_estatus = 'APOSTADO' and aa.nu_posicion_apuesta = 2 and aa.in_activo = true) as monto_apostado_segundo_lugar,
        
        (SELECT
        sum((aa.ca_monto * bb.ca_monto_inh) / bb.ca_dividendo) as ca_pago
        from e003t_apuesta_compra as aa
        join x002t_sala_linea as bb on bb.id = aa.co_sala_linea
        where aa.co_sala = a.id 
        and aa.nb_estatus = 'APOSTADO' 
        and aa.nu_posicion_apuesta = 1 
        and aa.in_activo = true) as ca_pago_primer_lugar,
        
        (SELECT
        sum((aa.ca_monto * bb.ca_monto_inh) / bb.ca_dividendo) as ca_pago
        from e003t_apuesta_compra as aa
        join x002t_sala_linea as bb on bb.id = aa.co_sala_linea
        where aa.co_sala = a.id 
        and aa.nb_estatus = 'APOSTADO' 
        and aa.nu_posicion_apuesta = 2 
        and aa.in_activo = true) as ca_pago_segundo_lugar
        
            FROM j082t_sala AS a 
            where a.in_activo = true 
            and a.nb_deporte = 'CABALLOS' 
            and a.co_partner = $co_partner 
            and a.nb_estatus in ('ABIERTO', 'CERRADO', 'FINALIZADO')
            and a.nb_modo_juego = 'Ganadores' and (SELECT count(aa.id) from e003t_apuesta_compra as aa where aa.co_sala = a.id and aa.nb_estatus = 'APOSTADO' and aa.in_activo = true and aa.co_taquilla > 0) = 0";
        $query = $this->db->query($sql);
        return $query;
    }
    

      function get_reportes_envivo_ganadores_taquilla_model() {

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT a.id, a.nu_carrera, a.nb_sede, ee.co_taquilla,
        (SELECT count(aa.id) from x002t_sala_linea as aa where aa.co_sala = a.id and aa.nb_estatus = 'RETIRADO' and aa.in_activo = true) as caballos_retirados,
        (SELECT sum(aa.ca_monto) from e003t_apuesta_compra as aa where aa.co_sala = a.id and aa.nb_estatus = 'APOSTADO' and aa.nu_posicion_apuesta = 1 and aa.in_activo = true) as monto_apostado_primer_lugar,
        
        (SELECT sum(aa.ca_monto) from e003t_apuesta_compra as aa where aa.co_sala = a.id and aa.nb_estatus = 'APOSTADO' and aa.nu_posicion_apuesta = 2 and aa.in_activo = true) as monto_apostado_segundo_lugar,
        
        (SELECT
        sum((aa.ca_monto * bb.ca_monto_inh) / bb.ca_dividendo) as ca_pago
        from e003t_apuesta_compra as aa
        join x002t_sala_linea as bb on bb.id = aa.co_sala_linea
        where aa.co_sala = a.id 
        and aa.nb_estatus = 'APOSTADO' 
        and aa.nu_posicion_apuesta = 1 
        and aa.in_activo = true) as ca_pago_primer_lugar,
        
        (SELECT
        sum((aa.ca_monto * bb.ca_monto_inh) / bb.ca_dividendo) as ca_pago
        from e003t_apuesta_compra as aa
        join x002t_sala_linea as bb on bb.id = aa.co_sala_linea
        where aa.co_sala = a.id 
        and aa.nb_estatus = 'APOSTADO' 
        and aa.nu_posicion_apuesta = 2 
        and aa.in_activo = true) as ca_pago_segundo_lugar
        
            FROM j082t_sala AS a 
            join e003t_apuesta_compra as ee on ee.co_sala = a.id
            where a.in_activo = true 
            and a.nb_deporte = 'CABALLOS' 
            and a.co_partner = $co_partner 
            and a.nb_estatus in ('ABIERTO', 'CERRADO', 'FINALIZADO')
            and a.nb_modo_juego = 'Ganadores' and (SELECT count(aa.id) from e003t_apuesta_compra as aa where aa.co_sala = a.id and aa.nb_estatus = 'APOSTADO' and aa.in_activo = true and aa.co_taquilla > 0) > 0 group by a.id, a.nu_carrera, a.nb_sede, ee.co_taquilla";
        $query = $this->db->query($sql);
        return $query;
    }
    


          function get_reportes_envivo_ganadores_taquilla_filtro_model($co_taquilla) {

        $co_partner = $this->ion_auth->co_partner();

        if ($co_taquilla == ''): $filtro_taquilla = ""; else: $filtro_taquilla = "and ee.co_taquilla = $co_taquilla"; endif;

        $sql = "SELECT a.id, a.nu_carrera, a.nb_sede, ee.co_taquilla,
        (SELECT count(aa.id) from x002t_sala_linea as aa where aa.co_sala = a.id and aa.nb_estatus = 'RETIRADO' and aa.in_activo = true) as caballos_retirados,
        (SELECT sum(aa.ca_monto) from e003t_apuesta_compra as aa where aa.co_sala = a.id and aa.nb_estatus = 'APOSTADO' and aa.nu_posicion_apuesta = 1 and aa.in_activo = true) as monto_apostado_primer_lugar,
        
        (SELECT sum(aa.ca_monto) from e003t_apuesta_compra as aa where aa.co_sala = a.id and aa.nb_estatus = 'APOSTADO' and aa.nu_posicion_apuesta = 2 and aa.in_activo = true) as monto_apostado_segundo_lugar,
        
        (SELECT
        sum((aa.ca_monto * bb.ca_monto_inh) / bb.ca_dividendo) as ca_pago
        from e003t_apuesta_compra as aa
        join x002t_sala_linea as bb on bb.id = aa.co_sala_linea
        where aa.co_sala = a.id 
        and aa.nb_estatus = 'APOSTADO' 
        and aa.nu_posicion_apuesta = 1 
        and aa.in_activo = true) as ca_pago_primer_lugar,
        
        (SELECT
        sum((aa.ca_monto * bb.ca_monto_inh) / bb.ca_dividendo) as ca_pago
        from e003t_apuesta_compra as aa
        join x002t_sala_linea as bb on bb.id = aa.co_sala_linea
        where aa.co_sala = a.id 
        and aa.nb_estatus = 'APOSTADO' 
        and aa.nu_posicion_apuesta = 2 
        and aa.in_activo = true) as ca_pago_segundo_lugar
            FROM j082t_sala AS a
            join e003t_apuesta_compra as ee on ee.co_sala = a.id $filtro_taquilla
            where a.in_activo = true 
            and a.nb_deporte = 'CABALLOS' 
            and a.co_partner = $co_partner 
            and a.nb_estatus in ('ABIERTO', 'CERRADO', 'FINALIZADO')
            and a.nb_modo_juego = 'Ganadores' and (SELECT count(aa.id) from e003t_apuesta_compra as aa where aa.co_sala = a.id and aa.nb_estatus = 'APOSTADO' and aa.in_activo = true and aa.co_taquilla > 0) > 0 group by a.id, a.nu_carrera, a.nb_sede, ee.co_taquilla";
        $query = $this->db->query($sql);
        return $query;
    }
    




}
?>