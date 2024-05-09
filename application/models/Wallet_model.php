<?php
class Wallet_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }


     function get_pagos_model()
    {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

         if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")):
            $filtro = "and a.co_partner = $co_partner";
         else:
            $filtro = "and a.co_usuario = $co_usuario and a.co_partner = $co_partner";
         endif; 

        $sql = "SELECT a.*, b.nb_acronimo, c.first_name, c.last_name
        FROM
        j080t_pagos AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        join lu_users as c on c.id = a.co_usuario
        where a.in_activo = true $filtro";
        $query = $this->db->query($sql);
        return $query;
    }

         function get_pagos_row_model($co_pago)
    {

        $sql = "SELECT a.*, b.nb_acronimo
        FROM
        j080t_pagos AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        where a.id = $co_pago";
        $query = $this->db->query($sql);
        return $query->row();
    }

         function get_saldo_row_model($co_wallet)
    {

        $sql = "SELECT a.*
        FROM
        j081t_wallet AS a
        where a.id = $co_wallet";
        $query = $this->db->query($sql);
        return $query->row();
    }

             function get_usuarios_model()
    {

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT a.*
        FROM
        lu_users AS a
        join j077t_usuario_partner as b on b.co_usuario = a.id
        where b.co_partner = '$co_partner'";
        $query = $this->db->query($sql);
        return $query;
    }


    function ejecutar_abonar_model($ca_monto, $tx_descripcion, $ff_pago, $nombre_archivo, $co_diario, $co_usuario) {

        // Verificar el Partner Empresa

        $co_partner = $this->ion_auth->co_partner();
        $info_saldo = $this->wallet_library->get_info_wallet($co_usuario, $co_partner);

        $this->db->trans_start();
        $j080t_pagos['co_diario']      = $co_diario;
        $j080t_pagos['co_wallet']      = $info_saldo->id;
        $j080t_pagos['co_partner']      = $co_partner;
        $j080t_pagos['tx_descripcion']      = $tx_descripcion;
        $j080t_pagos['co_usuario']      = $co_usuario;
        $j080t_pagos['ca_monto']      = $ca_monto;
        $j080t_pagos['ff_pago']      = date_system($ff_pago);
        $j080t_pagos['nb_url']      = $nombre_archivo;
        $j080t_pagos['nb_operacion']      = 'CREDITO';
        $this->db->insert("j080t_pagos", $j080t_pagos);
        $co_pago = $this->db->insert_id();
        $this->db->trans_complete();

         if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")):

            $this->aprobar_pago_model($co_pago);

        endif;  


        return true;
    }

        function ejecutar_retirar_model($ca_monto, $co_wallet) {

        // Verificar el Partner Empresa
        $co_partner = $this->ion_auth->co_partner();
        $co_usuario = $this->ion_auth->user_id();

        $this->db->trans_start();
        $j080t_pagos['co_diario']      = 1;
        $j080t_pagos['co_wallet']      = $co_wallet;
        $j080t_pagos['co_partner']      = $co_partner;
        $j080t_pagos['tx_descripcion']      = 'Solicitud de retiro';
        $j080t_pagos['co_usuario']      = $co_usuario;
        $j080t_pagos['ca_monto']      = $ca_monto;
        $j080t_pagos['nb_operacion']      = 'DEBITO';
        $this->db->insert("j080t_pagos", $j080t_pagos);
        $this->db->trans_complete();
        return true;
    }


        function eliminar_pago_model($co_pago) {

        $this->db->trans_start();
        $j080t_pagos['in_activo']      = 0;
        $this->db->where("id", $co_pago);
        $this->db->update("j080t_pagos", $j080t_pagos);
        $this->db->trans_complete();
        return true;
    }

            function aprobar_pago_model($co_pago) {

        $this->db->trans_start();

        $info_pago = $this->get_pagos_row_model($co_pago);
        $info_saldo = $this->get_saldo_row_model($info_pago->co_wallet);

        if($info_pago->nb_operacion == 'CREDITO'):
        // actualizar linea de wallet
        $x001t_wallet_linea['nb_operacion']      = $info_pago->nb_operacion;
        $x001t_wallet_linea['tx_concepto']      = 'Abono por parte del usuario';
        $x001t_wallet_linea['ca_monto']      = $info_pago->ca_monto;
        $x001t_wallet_linea['co_wallet']      = $info_pago->co_wallet;
        $this->db->insert("x001t_wallet_linea", $x001t_wallet_linea);

        $j081t_wallet['ca_saldo']      = $info_saldo->ca_saldo + $info_pago->ca_monto;
        $this->db->where("id", $info_pago->co_wallet);
        $this->db->update("j081t_wallet", $j081t_wallet);

        endif;


        if($info_pago->nb_operacion == 'DEBITO'):

        // actualizar linea de wallet
        $x001t_wallet_linea['nb_operacion']      = $info_pago->nb_operacion;
        $x001t_wallet_linea['tx_concepto']      = 'Retiro por parte del usuario';
        $x001t_wallet_linea['ca_monto']      = $info_pago->ca_monto;
        $x001t_wallet_linea['co_wallet']      = $info_pago->co_wallet;
        $this->db->insert("x001t_wallet_linea", $x001t_wallet_linea);

        $j081t_wallet['ca_saldo']      = $info_saldo->ca_saldo - $info_pago->ca_monto;
        $this->db->where("id", $info_pago->co_wallet);
        $this->db->update("j081t_wallet", $j081t_wallet);


        endif;


        $j080t_pagos['nb_estatus']      = 'Aprobado';
        $this->db->where("id", $co_pago);
        $this->db->update("j080t_pagos", $j080t_pagos);
        $this->db->trans_complete();
        return true;
    }

            function rechazar_pago_model($co_pago) {

        $this->db->trans_start();
        $j080t_pagos['nb_estatus']      = 'Rechazado';
        $this->db->where("id", $co_pago);
        $this->db->update("j080t_pagos", $j080t_pagos);
        $this->db->trans_complete();
        return true;
    }


         function get_balance()
    {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();
        $info_saldo = $this->ion_auth->saldo();

        $sql = "SELECT a.*
        FROM
        x001t_wallet_linea AS a
        where a.co_wallet = $info_saldo->id";
        $query = $this->db->query($sql);
        return $query;
    }
    

             function get_lista_diario_model()
    {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT a.*
        FROM
        x003t_cuenta_banco AS a
        where a.co_partner = $co_partner";
        $query = $this->db->query($sql);
        return $query;
    }
    

         function get_pagos_movimientos_model($co_usuario)
    {

        $co_partner = $this->ion_auth->co_partner();

         if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")):
            $filtro = "and a.co_usuario = $co_usuario and a.co_partner = $co_partner";
         else:
            $filtro = "and a.co_usuario = $co_usuario and a.co_partner = $co_partner";
         endif; 

        $sql = "SELECT a.*, b.nb_acronimo
        FROM
        j080t_pagos AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        where a.in_activo = true $filtro";
        $query = $this->db->query($sql);
        return $query;
    }



}
?>