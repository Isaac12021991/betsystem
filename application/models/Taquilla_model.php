<?php
class Taquilla_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // Verificar si el registro esta repetido
    
    function get_taquilla_model() {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        if($this->usuario_library->permiso_empresa("'USUARIO'")):

            $filtro_usuario = " and a.co_usuario = '$co_usuario' and a.co_partner = '$co_partner'";
        else:
            $filtro_usuario = " and a.co_partner = '$co_partner'";

        endif;


        $sql   = "SELECT
            a.*, b.first_name, b.last_name
            FROM
            j084t_taquillas AS a
            left join lu_users as b on b.id = a.co_usuario
            where a.in_activo = true $filtro_usuario order by a.id desc";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_taquilla_one_model($co_banco) {
        $sql   = "SELECT
            a.*
            FROM
            j084t_taquillas AS a
            where a.id = $co_banco";
        $query = $this->db->query($sql);
        return $query->row();
    }



        function get_usuario_model() {

        $co_partner = $this->ion_auth->co_partner();

        $sql   = "SELECT
            a.*, b.first_name, b.last_name
            FROM
            j077t_usuario_partner AS a
            join lu_users as b on b.id = a.co_usuario
            where a.in_activo = true and a.co_partner = '$co_partner'";
        $query = $this->db->query($sql);
        return $query;
    }

    

        function guardar_nuevo_taquilla_model($nb_taquilla, $co_usuario, $tx_descripcion, $ca_porcentaje) {
        $this->db->trans_start();

        $co_partner = $this->ion_auth->co_partner();

        $data_listado['nb_taquilla']  = strtoupper($nb_taquilla);
        $data_listado['co_usuario']   = $co_usuario;
        $data_listado['co_partner']   = $co_partner;
        $data_listado['tx_descripcion'] = $tx_descripcion;
        $data_listado['ca_porcentaje'] = $ca_porcentaje / 100;

        $data_listado['in_activo']    = true;
        $this->db->insert("j084t_taquillas", $data_listado);
        $co_new_banco = $this->db->insert_id();
        $this->db->trans_complete();
        return $co_new_banco;
    }

            function write_taquilla_model($co_taquilla, $nb_taquilla, $co_usuario, $tx_descripcion, $ca_porcentaje) {
        $this->db->trans_start();

        $data_listado['nb_taquilla']  = strtoupper($nb_taquilla);
        $data_listado['co_usuario']   = $co_usuario;
        $data_listado['tx_descripcion'] = $tx_descripcion;
        $data_listado['ca_porcentaje'] = $ca_porcentaje / 100;
        $data_listado['in_activo']    = true;
        $this->db->where("id", $co_taquilla);
        $this->db->update("j084t_taquillas", $data_listado);
        $this->db->trans_complete();
        return true;
    }

        function unlink_taquilla($co_taquilla) {
        $this->db->trans_start();
        $data_listado['in_activo']    = false;
        $this->db->where("id", $co_taquilla);
        $this->db->update("j084t_taquillas", $data_listado);
        $this->db->trans_complete();
        return true;
    }

        function get_ver_sala_taquilla_model($co_taquilla) {

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT a.*
        FROM j082t_sala AS a 
        where a.in_activo = true 
        and a.nb_deporte = 'CABALLOS' 
        and a.co_partner = $co_partner
        and a.nb_modo_juego = 'Ganadores' 
        and a.nb_estatus in ('INICIADO', 'FINALIZADO')";
        $query = $this->db->query($sql);
        return $query;
    }

        function get_taquilla_usuario_model() {

        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT
            a.*, b.first_name, b.last_name
            FROM
            j084t_taquillas AS a
            left join lu_users as b on b.id = a.co_usuario
            where a.in_activo = true and a.co_partner = '$co_partner' and a.co_usuario = '$co_usuario'";
        $query = $this->db->query($sql);
        return $query;
    }

                        function get_info_apuesta_usuario($co_sala) {

        $sql = "SELECT a.*, b.nu_identificacion, b.nb_nombre, b.nb_apellido, c.nb_competidor, c.nu_casilla, c.nu_posicion, a.nu_posicion_apuesta, c.ca_monto_inh, c.ca_dividendo, c.in_ejecutar_pago
        FROM
        e003t_apuesta_compra AS a
        join x004t_taquilla_usuarios as b on b.id = a.co_taquilla_usuario
        join x002t_sala_linea as c on c.id = a.co_sala_linea
        where a.in_activo = true and a.co_sala = '$co_sala'";
        $query = $this->db->query($sql);
        return $query;
    }


                        function get_list_ejemplar_model($co_sala) {

        $sql = "SELECT a.*
        FROM
        x002t_sala_linea AS a
        where a.in_activo = true and a.co_sala = '$co_sala' and a.nb_estatus = 'ACTIVO'";
        $query = $this->db->query($sql);
        return $query;
    }

        function eliminar_apuesta_model($co_apuesta_compra) {
        $this->db->trans_start();
        $e003t_apuesta_compra['in_activo']    = false;
        $this->db->where("id", $co_apuesta_compra);
        $this->db->update("e003t_apuesta_compra", $e003t_apuesta_compra);
        $this->db->trans_complete();
        return true;
    }

    
}
?>