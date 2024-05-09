<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Taquilla_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL

    function get_info_usuario_taquilla($co_usuario) {

        $obj =& get_instance();
        $co_partner = $obj->ion_auth->co_partner();  
        $sql = "SELECT a.*
        FROM j084t_taquillas AS a 
        where a.in_activo = true 
        and a.co_partner = $co_partner";
        $query = $obj->db->query($sql);
        $info_usuario_taquilla = $query->row();
        if ($query->num_rows() > 0): return $query; else: false; endif;
    }

   



}
?>