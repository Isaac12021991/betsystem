<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Carrera_caballo_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }



            function get_info_apostado($co_sala_linea, $nu_posicion_apuesta) {
        $obj =& get_instance();

        $co_usuario = $obj->ion_auth->user_id();
        $co_partner = $obj->ion_auth->co_partner();

        $sql   = "SELECT coalesce(sum(ca_monto),0) as ca_monto_apostado from e003t_apuesta_compra as a 
        where a.co_sala_linea = '$co_sala_linea' and a.co_usuario = '$co_usuario' and a.nu_posicion_apuesta = '$nu_posicion_apuesta' and a.in_activo = true limit 1";
        $query = $obj->db->query($sql);
        $info_apostado = $query->row();
        return $info_apostado->ca_monto_apostado;
        
    }

             function get_info_apostado_remate($co_sala_linea, $nu_posicion_apuesta) {
        $obj =& get_instance();

        $co_partner = $obj->ion_auth->co_partner();

        $sql   = "SELECT coalesce(a.ca_monto, 0) as ca_monto_apostado, b.first_name, b.last_name, a.co_usuario from e003t_apuesta_compra as a 
        left join lu_users as b on b.id = a.co_usuario
        where a.co_sala_linea = '$co_sala_linea' and a.nu_posicion_apuesta = '$nu_posicion_apuesta' and a.in_activo = true order by a.ca_monto desc limit 1";
        $query = $obj->db->query($sql);

        if($query->num_rows() > 0): $info_apostado = $query->row(); else: $info_apostado = 0; endif;
        return $info_apostado;
        
    }


                 function get_info_mi_posicion_ganado($co_sala, $nu_posicion) {

        $obj =& get_instance();

        $sql = "SELECT a.*, b.nu_posicion_ruleta, b.id as co_apuesta_compra, c.first_name, c.last_name
        FROM
        x002t_sala_linea AS a
        join e003t_apuesta_compra as b on b.co_sala_linea = a.id
        join lu_users as c on c.id = b.co_usuario
        where a.in_activo = true and a.co_sala = '$co_sala' and a.nu_posicion = '$nu_posicion'  order by b.ca_monto desc limit 1";
        $query = $obj->db->query($sql);
        if($query->num_rows() > 0): return $query->row(); else: return false; endif;
        
    }


                     function get_info_mi_posicion_ganado_by_usuario($co_sala, $co_usuario, $nu_posicion) {

        $obj =& get_instance();

        $sql = "SELECT a.*, b.nu_posicion_ruleta, b.id as co_apuesta_compra, c.first_name, c.last_name
        FROM
        x002t_sala_linea AS a
        join e003t_apuesta_compra as b on b.co_sala_linea = a.id
        join lu_users as c on c.id = b.co_usuario
        where a.in_activo = true and a.co_sala = '$co_sala' and a.nu_posicion = '$nu_posicion' and b.co_usuario = '$co_usuario'  order by b.ca_monto desc limit 1";
        $query = $obj->db->query($sql);
        if($query->num_rows() > 0): return $query->row(); else: return false; endif;
        
    }
    
    
            function get_info_transmision_envivo($co_sala) {

        $obj =& get_instance();

        $sql   = "SELECT
            a.*
            FROM
            x005t_videos AS a
            where a.in_activo = true and a.co_sala = '$co_sala' and a.in_activo = true order by a.id desc";
        $query = $obj->db->query($sql);
       return $query;
        
    }

                function get_color_competidor() {

        $obj =& get_instance();

        $sql   = "SELECT
            a.*
            FROM
            j086t_colores_competidores AS a
            where a.in_activo = true order by a.id asc";
        $query = $obj->db->query($sql);
       return $query;
        
    }
    


                function get_color_competidor_color_uno($nu_color) {

        $obj =& get_instance();

        $sql   = "SELECT
            a.*
            FROM
            j086t_colores_competidores AS a
            where a.nu_color = '$nu_color'  and a.in_activo = true";
        $query = $obj->db->query($sql);
       return $query->row();
        
    }

                    function get_color_competidor_by_id($con) {

        $obj =& get_instance();

        $sql   = "SELECT
            a.*
            FROM
            j086t_colores_competidores AS a
            where a.id > '$con'  and a.in_activo = true";
        $query = $obj->db->query($sql);
       return $query;
        
    }


                function get_info_apostado_todo($co_sala_linea, $nu_posicion_apuesta) {
        $obj =& get_instance();


        $sql   = "SELECT coalesce(sum(ca_monto),0) as ca_monto_apostado from e003t_apuesta_compra as a 
        where a.co_sala_linea = '$co_sala_linea' and a.nu_posicion_apuesta = '$nu_posicion_apuesta' and a.in_activo = true limit 1";
        $query = $obj->db->query($sql);
        $info_apostado = $query->row();
        return $info_apostado->ca_monto_apostado;
        
    }
    
    
    

}
?>