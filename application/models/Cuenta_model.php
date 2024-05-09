<?php
class Cuenta_model extends CI_Model {
    protected $_ion_hooks;
    protected $esquema = array();
    public $tables = array();
    function __construct() {
        parent::__construct();
        $this->tables      = $this->config->item('tables', 'ion_auth');
        $this->esquema     = $this->config->item('esquema_db', 'ion_auth');
        $this->hash_method = $this->config->item('hash_method', 'ion_auth');
    }
    public function hash_password_db($id, $password, $use_sha1_override = FALSE) {
        if (empty($id) || empty($password)) {
            return FALSE;
        }
        $this->trigger_events('extra_where');
        $query            = $this->db->select('password, salt')->where('id', $id)->limit(1)->order_by('id', 'desc')->get($this->tables['users']);
        $hash_password_db = $query->row();
        if ($query->num_rows() !== 1) {
            return FALSE;
        }
        // bcrypt
        if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt') {
            if ($this->bcrypt->verify($password, $hash_password_db->password)) {
                return TRUE;
            }
            return FALSE;
        }
        // sha1
        if ($this->store_salt) {
            $db_password = sha1($password . $hash_password_db->salt);
        } else {
            $salt        = substr($hash_password_db->password, 0, $this->salt_length);
            $db_password = $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
        }
        if ($db_password == $hash_password_db->password) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function trigger_events($events) {
        if (is_array($events) && !empty($events)) {
            foreach ($events as $event) {
                $this->trigger_events($event);
            }
        } else {
            if (isset($this->_ion_hooks->$events) && !empty($this->_ion_hooks->$events)) {
                foreach ($this->_ion_hooks->$events as $name => $hook) {
                    $this->_call_hook($events, $name);
                }
            }
        }
    }
    public function salt() {
        $raw_salt_len = 16;
        $buffer       = '';
        $buffer_valid = false;
        if (function_exists('mcrypt_create_iv') && !defined('PHALANGER')) {
            $buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
            if ($buffer) {
                $buffer_valid = true;
            }
        }
        if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
            $buffer = openssl_random_pseudo_bytes($raw_salt_len);
            if ($buffer) {
                $buffer_valid = true;
            }
        }
        if (!$buffer_valid && @is_readable('/dev/urandom')) {
            $f    = fopen('/dev/urandom', 'r');
            $read = strlen($buffer);
            while ($read < $raw_salt_len) {
                $buffer .= fread($f, $raw_salt_len - $read);
                $read = strlen($buffer);
            }
            fclose($f);
            if ($read >= $raw_salt_len) {
                $buffer_valid = true;
            }
        }
        if (!$buffer_valid || strlen($buffer) < $raw_salt_len) {
            $bl = strlen($buffer);
            for ($i = 0; $i < $raw_salt_len; $i++) {
                if ($i < $bl) {
                    $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                } else {
                    $buffer .= chr(mt_rand(0, 255));
                }
            }
        }
        $salt            = $buffer;
        // encode string with the Base64 variant used by crypt
        $base64_digits   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $base64_string   = base64_encode($salt);
        $salt            = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);
        $salt            = substr($salt, 0, $this->salt_length);
        return $salt;
    }
    public function hash_password($password, $use_sha1_override = FALSE) {
        if (empty($password)) {
            return FALSE;
        }
        // bcrypt
        if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt') {
            return $this->bcrypt->hash($password);
        }
    }
    // Usuarios

        function get_estados_model() {
        $sql   = "SELECT * from i00t_estados where in_activo = true ORDER BY 1";
        $query = $this->db->query($sql);
        return $query;
    }

            function get_tipos_empresa_model() {
        $sql   = "SELECT * from j051t_tipo_empresa where in_activo = true ORDER BY 1";
        $query = $this->db->query($sql);
        return $query;
    }

    

    function get_user_usuario() {
        $sql   = "SELECT * from lu_users WHERE NOT id in(1,2)";
        $query = $this->db->query($sql);
        return $query->result();
    }
    // Usuarios Inactivos o con problemas
    function get_user_usuario_id($co_usuario) {
        $sql   = "SELECT a.* FROM lu_users as a
        WHERE NOT id = 1 and a.id = '$co_usuario'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    function active_user_model($co_usuario) {
        $this->db->trans_start();
        $data['active'] = '1';
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);
        $this->db->trans_complete();
        return "Usuario activado";
    }
    function desactive_user_model($co_usuario) {
        $this->db->trans_start();
        $data['active'] = '0';
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);
        $this->db->trans_complete();
        return "Usuario desactivado";
    }




    // Agregar nuevo usuario
    function nuevo_cuenta_model($email, $first_name, $last_name, $password, $token, $co_partner, $username, $link) {
        $this->db->trans_start();

        // Encriptar password 

        $new_password = $this->hash_password($password);

        $data['first_name']   = strtoupper($first_name);
        $data['last_name']    = strtoupper($last_name);
        $data['email']        = $email;
        $data['username']        = $username;
        $data['active']       = '1';
        $data['password']     = $new_password;
        $data['tx_link']     = $link;
        $data['created_on']   = time();

        $this->db->insert("lu_users", $data);

        $co_new_usuario    = $this->db->insert_id();

        $data5['user_id']  = $co_new_usuario;
        $data5['group_id'] = 7;
        $this->db->insert("lu_users_groups", $data5);


        $info_user_partner = $this->empresa_library->get_info_partner($co_partner);

        if($info_user_partner):


        $j077t_usuario_partner['co_usuario']   = $co_new_usuario;
        $j077t_usuario_partner['co_partner']    = $co_partner;
        $this->db->insert("j077t_usuario_partner", $j077t_usuario_partner);
        $co_usuario_partner    = $this->db->insert_id();

        $data_principal['co_usuario_partner'] = $co_usuario_partner;
        $data_principal['tx_permiso'] = 'USUARIO';
        $this->db->insert("j078t_usuario_partner_permiso", $data_principal);


        endif;

        $lu_users['co_partner'] = $co_partner;
        $this->db->where("id", $co_new_usuario);
        $this->db->update("lu_users", $lu_users);


        $j081t_wallet['co_usuario'] = $co_new_usuario;
        $j081t_wallet['co_partner'] =  $co_partner;
        $this->db->insert("j081t_wallet", $j081t_wallet);
        

        $this->auditoria->log_usuario('REGISTRO', 'CREACION DE CUENTA', 'USUARIO REGISTRADO EN EL SISTEMA', 'N/D', 'N/D', $data['first_name'].' '.$data['last_name'], $co_new_usuario);

        $this->db->trans_complete();

        $remember = '1';



        $this->ion_auth->login(trim($username), trim($password), $remember, $co_partner);

        return "Usuario Agregado";
    }
    // Actualizar Usuario

    function get_user_detail_usuario_id($co_usuario) {
        $sql   = "SELECT a.* 
        FROM lu_users as a
        where a.id = '$co_usuario'";
        $query = $this->db->query($sql);
        return $query->row();
    }

        function get_info_usuario() {

        $co_usuario = $this->ion_auth->user_id();

        $sql   = "SELECT a.* 
        FROM lu_users as a
        where a.id = '$co_usuario'";
        $query = $this->db->query($sql);
        return $query->row();
    }

        // Verificar correo existente
    function get_existente_username_model($username) {
        $sql   = "SELECT * FROM lu_users as a
        WHERE a.username = '$username'";
        $query = $this->db->query($sql);
        return $query;
    }


    // Verificar correo existente
    function get_email_existente_model($email) {
        $sql   = "SELECT * FROM lu_users as a
        WHERE a.email = '$email'";
        $query = $this->db->query($sql);
        return $query;
    }

    // Verificar rif existente

        function get_partner_existente_model($nu_rif) {
        $sql   = "SELECT a.nu_rif FROM j049t_empresas_farmaceuticas_todas as a
        join j077t_usuario_partner as b on b.co_partner = a.id
        WHERE a.nu_rif = '$nu_rif' and b.in_activo = true";
        $query = $this->db->query($sql);
        return $query;
    }



        function get_verificar_link($token) {
        $sql   = "SELECT * FROM lu_users as a
        WHERE a.tx_link = '$token' limit 1";
        $query = $this->db->query($sql);
        return $query;
    }



    function in_verificar_model($co_usuario) {
        $this->db->trans_start();
        $data['in_verificado'] = true;
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);
        

        $info_user = $this->get_user_detail_usuario_id($co_usuario);

        $this->auditoria->log_usuario('VERIFICACION', 'VERIFICACION DE CUENTA', 'EL USUARIO HA VERIFICADO SU CUENTA', 'N/D', 'N/D', $info_user->first_name.' '.$info_user->last_name, $co_usuario);
        $this->db->trans_complete();

        return $info_user;
    }

    // 

        function actualizar_cuenta_model($email, $first_name, $last_name, $nu_cedula, $token, $in_verificado, $link, $phone) {
        $this->db->trans_start();

        // Encriptar password 

        $co_usuario = $this->ion_auth->user_id();

        $data['first_name']   = strtoupper($first_name);
        $data['last_name']    = strtoupper($last_name);
        $data['nu_cedula']    = $nu_cedula;
        $data['email']        = $email;
        $data['phone']     = $phone;
        $data['active']       = '1';
        $data['tx_link']     = $link;
        $data['in_verificado']     = $in_verificado;
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);

        $this->auditoria->log_usuario('MODIFICACION', 'MODIFICACION DE CUENTA', 'EL USUARIO HA MODIFICADO SU CUENTA', 'N/D', 'N/D', $data['first_name'].' '.$data['last_name'], $co_usuario);

        $this->db->trans_complete();
        return "Usuario actualizado";
    }


        function verificar_password_actual($tx_password_actual) {

        $co_usuario = $this->ion_auth->user_id();

        $password = $this->hash_password_db($co_usuario, $tx_password_actual);

        if ($password == TRUE):

            return TRUE;

            else:

            return FALSE;

        endif;


    }

        function ejecutar_cambiar_password($password) {
        $this->db->trans_start();

        $co_usuario = $this->ion_auth->user_id();
        $new_password = $this->hash_password($password);
        $data['password'] = $new_password;

        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);

        $this->db->trans_complete();

        return "Usuario actualizado";
    }


        function eliminar_cuenta_ejecutar_model() {
        $this->db->trans_start();


        $co_usuario = $this->ion_auth->user_id();
        $data['active'] = 0;
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);

        $this->auditoria->log_usuario('ELIMINADO', 'CUENTA ELIMINADA', 'CUENTA ELIMINADA','EL USUARIO HA ELIMINADO SU CUENTA', '', $this->ion_auth->get_nombres(), $co_usuario);

        $this->db->trans_complete();

        return true;
    }


    function verificar_email_model($tx_email){

   $sql = "SELECT a.* FROM lu_users as a where a.email = '$tx_email' limit 1";

    $r = $this->db->query($sql);

    if ($r->num_rows() > 0):

            return $r;

    else:

            return false;

    endif;

    }


              function set_link_remember_password($co_usuario, $link) {
        $this->db->trans_start();
        $data['tx_link']    = $link;
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);
        $this->db->trans_complete();
        return true;
    }

              function restablecer_contrasena_ejecutar_model($co_usuario, $password) {
        $this->db->trans_start();
        $new_password = $this->hash_password($password);
        $data['password']    = $new_password;
        $data['tx_link']    = '';
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);
        $this->db->trans_complete();
        return "Usuario actualizado";
    }


            function get_usuario_row_model($co_usuario) {
        $sql   = "SELECT * FROM lu_users as a
        WHERE a.id = '$co_usuario' limit 1";
        $query = $this->db->query($sql);
        return $query;
    }


            function ejecutar_cambiar_foto_perfil_model($nb_foto_perfil) {
        $this->db->trans_start();
        $co_usuario = $this->ion_auth->user_id();
        $data['nb_foto_perfil'] = $nb_foto_perfil;
        $this->db->where("id", $co_usuario);
        $this->db->update("lu_users", $data);
        $this->db->trans_complete();
        return "Usuario actualizado";
    }


            function get_historial() {


        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

         if($this->usuario_library->permiso_empresa("'ADMINISTRADOR'")):
            $filtro = "and a.co_partner = $co_partner";
         else:
            $filtro = "and a.co_usuario = $co_usuario and a.co_partner = $co_partner";
         endif; 

        $sql = "SELECT  e.nb_modo_juego, e.nb_sede, 
sum(case WHEN a.nb_operacion = 'CREDITO' THEN a.ca_monto end) as ganado, 
sum(case WHEN a.nb_operacion = 'DEBITO' THEN a.ca_monto end) as aposto, e.nu_carrera
        FROM
        j080t_pagos AS a
        left join i00t_monedas as b on b.id = a.co_moneda
        left join lu_users as c on c.id = a.co_usuario
        left join e003t_apuesta_compra as d on d.id = a.co_apuesta_compra
        join j082t_sala as e on e.id = a.co_sala
        where a.in_activo = true $filtro
        group by e.nb_modo_juego, e.nb_sede, e.nu_carrera
        order by e.nb_sede, e.nu_carrera ";
        $query = $this->db->query($sql);
        return $query;    }

    


}
?>