<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Chats_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL

    function get_info_usuario($username_chats) {

        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();  
        $sql = "SELECT a.*
        FROM lu_users as a where a.username = '$username_chats'";
        $query = $obj->db->query($sql);
        return $query->row();
    }


    function get_info_usuario_contacto($username_chats) {

        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner(); 
        $username = $obj->ion_auth->username();

        $sql = "SELECT b.*, a.nb_foto_perfil,
        case WHEN b.username_contacto is null then a.username else concat(b.nb_nombre,' ',b.nb_apellido) end as nombre_contacto 
        FROM lu_users AS a
        left join c004t_usuario_contacto as b on b.username_contacto = a.username and b.username = '$username'
        WHERE a.username = '$username_chats'";

        $query = $obj->db->query($sql);
        if($query->num_rows() > 0): return $query->row(); else: return false; endif;
    }

   
        function get_info_grupo_difusion($co_grupo_difusion) {

        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner(); 
        $username = $obj->ion_auth->username();

        $sql = "SELECT *
        FROM c002t_grupo_difusion_chats AS a
        WHERE a.id = '$co_grupo_difusion' and a.in_activo = true";

        $query = $obj->db->query($sql);
        if($query->num_rows() > 0): return $query->row(); else: return false; endif;
    }
   


}
?>