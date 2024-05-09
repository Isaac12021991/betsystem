<?php
class Chats_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }



        function get_mensajes_nuevos() {

        $co_partner = $this->ion_auth->co_partner();
        $username = $this->ion_auth->username();

        $sql   = "SELECT
                        count(cc.id) AS ca_mensajes_nuevos
                    FROM
                        c001t_chats AS cc
                    WHERE
                        cc.username_receptor REGEXP '$username'
                    and cc.in_visto_username not REGEXP '$username'
                    AND cc.in_activo = TRUE
                    AND cc.in_activo_usuario REGEXP '$username'";

        $query = $this->db->query($sql);
        $info_mensajes = $query->row();
        return $info_mensajes->ca_mensajes_nuevos;
    }



         function get_contactos_resumen_model($limite_incio = 0) {

        $co_partner = $this->ion_auth->co_partner();
       $username = $this->ion_auth->username();

        $sql   = "SELECT
                    a.username_contacto as nombre_emisor,
                    CONCAT(a.nb_nombre,' ',a.nb_apellido) as nb_nombre_contacto
            FROM
                c004t_usuario_contacto AS a
            WHERE
                a.username = '$username'
            AND a.in_activo = TRUE";

        $query = $this->db->query($sql);
        return $query;
    }



        function get_chats_usuario_resumen_reload_model($limite_incio = 0, $limite_final) {

        $co_partner = $this->ion_auth->co_partner();
        $username = $this->ion_auth->username();

        $sql   = "SELECT
    a1.nombre_emisor,
    a1.last_fecha_sistema,
    a1.last_mensaje,
    a1.nb_nombre_contacto,
    a1.nb_modo_mensaje,
    a1.co_grupo_difusion,
    (
        SELECT
            COUNT(cc. ID)
        FROM
            c001t_chats AS cc
        WHERE
            cc.username_receptor REGEXP '$username'
        and cc.in_visto_username not REGEXP '$username'
        and cc.in_visto_username not REGEXP '$username' 
        AND cc.in_activo = TRUE
        AND cc.in_activo_usuario REGEXP '$username'
        AND cc.username_emisor = a1.nombre_emisor and cc.nb_modo_mensaje = 'PRIVADO'
    ) AS ca_mensajes_nuevos
FROM
    (
        SELECT DISTINCT
            (
                CASE
                WHEN a.username_emisor != '$username' THEN
                    a.username_emisor
                WHEN a.username_receptor != '$username' THEN
                    a.username_receptor
                END
            ) AS nombre_emisor,
            a.ff_sistema AS last_fecha_sistema,
            a.tx_mensaje AS last_mensaje,
            a.nb_modo_mensaje,
            a.co_grupo_difusion,
            CASE
        WHEN a.username_emisor != '$username' THEN
            COALESCE (
                (
                    SELECT
                        nb_nombre
                    FROM
                        c004t_usuario_contacto
                    WHERE
                        username_contacto = a.username_emisor
                    LIMIT 1
                ),
                a.username_emisor
            )
        WHEN a.username_receptor != '$username' THEN
            COALESCE (
                (
                    SELECT
                        nb_nombre
                    FROM
                        c004t_usuario_contacto
                    WHERE
                        username_contacto = a.username_receptor
                    LIMIT 1
                ),
                a.username_receptor
            )
        END AS nb_nombre_contacto
        FROM
            c001t_chats AS a
        WHERE
            (
                a.username_emisor = '$username'
                OR a.username_receptor = '$username' 
            )
        AND (
            a.in_activo_usuario REGEXP '$username'
        ) and a.nb_modo_mensaje = 'PRIVADO' ORDER BY a.ff_sistema DESC
    ) AS a1
GROUP BY
    1, 5, 6
UNION
SELECT
    a1.nombre_emisor,
    a1.last_fecha_sistema,
    a1.last_mensaje,
    a1.nb_nombre_contacto,
    a1.nb_modo_mensaje,
    a1.co_grupo_difusion,
    (
        SELECT
            COUNT(cc. ID)
        FROM
            c001t_chats AS cc
        WHERE
            cc.username_receptor REGEXP '$username'
        and cc.in_visto_username not REGEXP '$username'
        AND cc.in_activo = TRUE
        AND cc.in_activo_usuario REGEXP '$username'
        AND cc.username_emisor = a1.nombre_emisor and cc.nb_modo_mensaje = 'GRUPO'
    ) AS ca_mensajes_nuevos
FROM
    (
        SELECT DISTINCT
            (
                CASE
                WHEN a.username_emisor != '$username' THEN
                    a.username_emisor
                WHEN a.username_receptor != '$username' THEN
                    a.username_receptor
                END
            ) AS nombre_emisor,
            a.ff_sistema AS last_fecha_sistema,
            a.tx_mensaje AS last_mensaje,
            a.nb_modo_mensaje,
            a.co_grupo_difusion,
            CASE
        WHEN a.username_emisor != '$username' THEN
            COALESCE (
                (
                    SELECT
                        nb_nombre
                    FROM
                        c004t_usuario_contacto
                    WHERE
                        username_contacto = a.username_emisor
                    LIMIT 1
                ),
                a.username_emisor
            )
        WHEN a.username_receptor != '$username' THEN
            COALESCE (
                (
                    SELECT
                        nb_nombre
                    FROM
                        c004t_usuario_contacto
                    WHERE
                        username_contacto = a.username_receptor
                    LIMIT 1
                ),
                a.username_receptor
            )
        END AS nb_nombre_contacto
        FROM
            c001t_chats AS a
        WHERE
            (
                a.username_emisor = '$username'
                OR a.username_receptor = '$username' 
            )
        AND (
            a.in_activo_usuario REGEXP '$username'
        ) and a.nb_modo_mensaje = 'GRUPO' ORDER BY A.ff_sistema DESC
    ) AS a1
GROUP BY
    5, 6
ORDER BY 2 DESC
            limit $limite_incio, $limite_final";


        $query = $this->db->query($sql);
        return $query;
    }



    function get_usuario_contacto_model() {

        $co_partner = $this->ion_auth->co_partner();
       $username = $this->ion_auth->username();


        $sql   = "SELECT a.*, b.first_name, b.last_name, b.username
        FROM c004t_usuario_contacto as a
        join lu_users as b on b.id = a.username_contacto
        where a.username = '$username' and a.in_activo = true";


        $query = $this->db->query($sql);
        return $query;
    }

        function get_chats_usuario_resumen_model($limite_incio = 0) {

        $co_partner = $this->ion_auth->co_partner();
       $username = $this->ion_auth->username();

        $sql   = "SELECT
    a1.nombre_emisor,
    a1.last_fecha_sistema,
    a1.last_mensaje,
    a1.nb_nombre_contacto,
    a1.nb_modo_mensaje,
    a1.co_grupo_difusion,
    (
        SELECT
            COUNT(cc. ID)
        FROM
            c001t_chats AS cc
        WHERE
            cc.username_receptor REGEXP '$username'
        and cc.in_visto_username not REGEXP '$username'
        AND cc.in_activo = TRUE
        AND cc.in_activo_usuario REGEXP '$username'
        AND cc.username_emisor = a1.nombre_emisor and cc.nb_modo_mensaje = 'PRIVADO'
    ) AS ca_mensajes_nuevos
FROM
    (
        SELECT DISTINCT
            (
                CASE
                WHEN a.username_emisor != '$username' THEN
                    a.username_emisor
                WHEN a.username_receptor != '$username' THEN
                    a.username_receptor
                END
            ) AS nombre_emisor,
            a.ff_sistema AS last_fecha_sistema,
            a.tx_mensaje AS last_mensaje,
            a.nb_modo_mensaje,
            a.co_grupo_difusion,
            CASE
        WHEN a.username_emisor != '$username' THEN
            COALESCE (
                (
                    SELECT
                        nb_nombre
                    FROM
                        c004t_usuario_contacto
                    WHERE
                        username_contacto = a.username_emisor and in_activo = true
                    LIMIT 1
                ),
                a.username_emisor
            )
        WHEN a.username_receptor != '$username' THEN
            COALESCE (
                (
                    SELECT
                        nb_nombre
                    FROM
                        c004t_usuario_contacto
                    WHERE
                        username_contacto = a.username_receptor and in_activo = true
                    LIMIT 1
                ),
                a.username_receptor
            )
        END AS nb_nombre_contacto
        FROM
            c001t_chats AS a
        WHERE
            (
                a.username_emisor = '$username'
                OR a.username_receptor = '$username' 
            )
        AND (
            a.in_activo_usuario REGEXP '$username'
        ) and a.nb_modo_mensaje = 'PRIVADO' ORDER BY a.ff_sistema DESC
    ) AS a1
GROUP BY
    1, 5, 6
UNION
SELECT
    a1.nombre_emisor,
    a1.last_fecha_sistema,
    a1.last_mensaje,
    a1.nb_nombre_contacto,
    a1.nb_modo_mensaje,
    a1.co_grupo_difusion,
    (
        SELECT
            COUNT(cc. ID)
        FROM
            c001t_chats AS cc
        WHERE
            cc.username_receptor REGEXP '$username'
        and cc.in_visto_username not REGEXP '$username'
        AND cc.in_activo = TRUE
        AND cc.in_activo_usuario REGEXP '$username'
        AND cc.username_emisor = a1.nombre_emisor and cc.nb_modo_mensaje = 'GRUPO'
    ) AS ca_mensajes_nuevos
FROM
    (
        SELECT DISTINCT
            (
                CASE
                WHEN a.username_emisor != '$username' THEN
                    a.username_emisor
                WHEN a.username_receptor != '$username' THEN
                    a.username_receptor
                END
            ) AS nombre_emisor,
            a.ff_sistema AS last_fecha_sistema,
            a.tx_mensaje AS last_mensaje,
            a.nb_modo_mensaje,
            a.co_grupo_difusion,
            CASE
        WHEN a.username_emisor != '$username' THEN
            COALESCE (
                (
                    SELECT
                        nb_nombre
                    FROM
                        c004t_usuario_contacto
                    WHERE
                        username_contacto = a.username_emisor and in_activo = true
                    LIMIT 1
                ),
                a.username_emisor
            )
        WHEN a.username_receptor != '$username' THEN
            COALESCE (
                (
                    SELECT
                        nb_nombre
                    FROM
                        c004t_usuario_contacto
                    WHERE
                        username_contacto = a.username_receptor and in_activo = true
                    LIMIT 1
                ),
                a.username_receptor
            )
        END AS nb_nombre_contacto
        FROM
            c001t_chats AS a
        WHERE
            (
                a.username_emisor = '$username'
                OR a.username_receptor = '$username' 
            )
        AND (
            a.in_activo_usuario REGEXP '$username'
        ) and a.nb_modo_mensaje = 'GRUPO' ORDER BY a.ff_sistema DESC
    ) AS a1
GROUP BY
    5, 6
ORDER BY 2 DESC";

        
        $query = $this->db->query($sql);
        return $query;
    }







    // Verificar si el registro esta repetido
    
    function get_chats_model($limite_incio, $limite_final, $username_en_chats, $co_grupo_difusion) {

        $co_partner = $this->ion_auth->co_partner();
       $username = $this->ion_auth->username();


       if($co_grupo_difusion == 0):


        $lista_username = "$username|$username_en_chats";


       else:

         $lista_username =  $this->get_miembro_grupo_difusion_busqueda_regex($co_grupo_difusion);


       endif;

        $sql   = "SELECT
            a.*,
            (case WHEN b.username_contacto is null then a.username_emisor else concat(b.nb_nombre,' ',b.nb_apellido) end) as nombre_emisor, 
            (case WHEN c.username_contacto is null then a.username_receptor else concat(c.nb_nombre,' ',c.nb_apellido)  end) as nombre_receptor, 
            a.ff_sistema
            FROM
            c001t_chats AS a
            left join c004t_usuario_contacto as b on b.username_contacto = a.username_emisor and b.in_activo = true and b.username = '$username'
            left join c004t_usuario_contacto as c on c.username_contacto = a.username_receptor and c.in_activo = true and c.username = '$username'
            where a.in_activo_usuario REGEXP '$username' and a.co_grupo_difusion = '$co_grupo_difusion'
            and a.username_emisor REGEXP '$lista_username' and a.username_receptor REGEXP '$lista_username'
            order by a.id desc limit $limite_incio, 20";

        $query = $this->db->query($sql);
        return $query;
    }


    
    function get_ca_mensajes_model($username_en_chats) {

        $co_partner = $this->ion_auth->co_partner();
       $username = $this->ion_auth->username();

        $this->set_mensajes_llegados($username);
        $this->set_mensajes_leidos($username, $username_en_chats);

        $sql   = "SELECT
            a.id
            FROM
            c001t_chats AS a
            where a.in_activo_usuario REGEXP '$username' 
            and  a.username_receptor in ('$username') and a.in_llegado_username is null
            order by a.id desc";

        $query = $this->db->query($sql);
        return $query->num_rows();
    }





      function set_mensajes_llegados($username)
     {
         $this->db->trans_start();

         $sql   = "SELECT a.id,
            a.in_llegado_username
            FROM
            c001t_chats AS a
            where a.in_activo_usuario REGEXP '$username' 
            and a.in_llegado_username not REGEXP '$username' 
            and  a.username_receptor REGEXP '$username' 
            order by a.id desc";

            $query = $this->db->query($sql);

            foreach ($query->result() as $key):
                // code...
                    $data['in_llegado_username'] = $key->in_llegado_username.','.$username;
                    $this->db->update('c001t_chats', $data, array('id' => $key->id));
                
            endforeach;

        $this->db->trans_complete();

     }

           function set_mensajes_leidos($username, $username_en_chats)
     {
         $this->db->trans_start();


                     $sql   = "SELECT a.id,
            a.in_visto_username
            FROM
            c001t_chats AS a
            where a.in_activo_usuario REGEXP '$username' 
            and a.in_visto_username not REGEXP '$username' 
            and  a.username_receptor REGEXP '$username'
            and a.username_emisor in ('$username_en_chats')
            order by a.id desc";

            $query = $this->db->query($sql);

            foreach ($query->result() as $key):
                // code...
                    $data['in_visto_username'] = $key->in_visto_username.','.$username;
                    $this->db->update('c001t_chats', $data, array('id' => $key->id));
                
            endforeach;

        $this->db->trans_complete();
     }


    

        function ejecutar_enviar_mensaje_model($tx_mensaje, $username_en_chats, $co_grupo_difusion) {


        $this->db->trans_start();

       $username = $this->ion_auth->username();

       $info_grupo_difusion = $this->get_miembro_grupo_difusion_array($co_grupo_difusion);

       if ($co_grupo_difusion != 0):

       if($info_grupo_difusion):


        $c001t_chats['tx_mensaje']  = $tx_mensaje;
        $c001t_chats['co_partner'] = 1;
        $c001t_chats['nb_modo_mensaje'] = 'GRUPO';
        $c001t_chats['co_grupo_difusion'] = $co_grupo_difusion;
        $c001t_chats['username_emisor']    = $username;
        $c001t_chats['username_receptor']    = $info_grupo_difusion;
        $c001t_chats['in_activo_usuario']    = $username.','.$info_grupo_difusion;
        $this->db->insert("c001t_chats", $c001t_chats);
         


        

    endif;

    endif;

    if ($co_grupo_difusion == 0):


        $c001t_chats['tx_mensaje']  = $tx_mensaje;
        $c001t_chats['co_partner'] = 1;
        $c001t_chats['nb_modo_mensaje'] = 'PRIVADO';
        $c001t_chats['co_grupo_difusion'] = $co_grupo_difusion;
        $c001t_chats['username_emisor']    = $username;
        $c001t_chats['username_receptor']    = $username_en_chats;
        $c001t_chats['in_activo_usuario']    = $username.','.$username_en_chats;
        $this->db->insert("c001t_chats", $c001t_chats);


    endif;


        $this->db->trans_complete();
        return true;


    }



        function eliminar_chats_model($username_chats) {

        $co_partner = $this->ion_auth->co_partner();
       $username = $this->ion_auth->username();

        $this->set_mensajes_leidos($username, $username_chats);

        $sql   = "SELECT
            a.*,
            (case WHEN b.username_contacto is null then a.username_emisor else concat(b.nb_nombre,' ',b.nb_apellido) end) as nombre_emisor, 
            (case WHEN c.username_contacto is null then a.username_receptor else concat(c.nb_nombre,' ',c.nb_apellido)  end) as nombre_receptor, 
            a.ff_sistema
            FROM
            c001t_chats AS a
            left join c004t_usuario_contacto as b on b.username_contacto = a.username_emisor
            left join c004t_usuario_contacto as c on c.username_contacto = a.username_receptor
            where a.in_activo_usuario REGEXP '$username' 
            and a.username_emisor in ('$username','$username_chats') and a.username_receptor in ('$username','$username_chats')
            order by a.id desc";
        $query = $this->db->query($sql);


        $this->db->trans_start();

        foreach ($query->result() as $row):

            $sql_update = "UPDATE c001t_chats SET in_activo_usuario = REPLACE(in_activo_usuario,'$username','0') WHERE id = '$row->id'";
            $this->db->query($sql_update);

        endforeach;

        $this->db->trans_complete();


        return true;
    }




   function conexion_chats_cliente_servidor_model() {

        $co_partner = $this->ion_auth->co_partner();
       $username = $this->ion_auth->username();

        $sql   = "SELECT
            a.*,
            (case WHEN b.username_contacto is null then a.username_emisor else concat(b.nb_nombre,' ',b.nb_apellido) end) as nombre_emisor, 
            (case WHEN c.username_contacto is null then a.username_receptor else concat(c.nb_nombre,' ',c.nb_apellido)  end) as nombre_receptor, 
            a.ff_sistema
            FROM
            c001t_chats AS a
            left join c004t_usuario_contacto as b on b.username_contacto = a.username_emisor and b.in_activo = true and b.username = '$username'
            left join c004t_usuario_contacto as c on c.username_contacto = a.username_receptor and c.in_activo = true and c.username = '$username'
            where a.in_activo_usuario REGEXP '$username' and 
            a.username_receptor in ('$username') and not a.in_llegado_username REGEXP '$username'
            order by a.id asc limit 0, 20";


        $query = $this->db->query($sql);

        if($query->num_rows() > 0):

           $this->set_mensajes_llegados($username);

        endif;

        return $query;
    }



 

        function set_mensaje_recibido_leido_model($co_mensaje) {


             $username = $this->ion_auth->username();

             $sql   = "SELECT a.*
            FROM
            c001t_chats AS a
            where a.id = '$co_mensaje'";
             $query = $this->db->query($sql);

        $this->db->trans_start();

                    foreach ($query->result() as $key):
                // code...
                    $data['in_visto_username'] = $key->in_visto_username.','.$username;
                    $this->db->update('c001t_chats', $data, array('id' => $key->id));
                
                     endforeach;


        $this->db->trans_complete();
        return true;
    }


    

        function guardar_nuevo_contacto_model($nb_nombre, $nb_apellido, $nu_telefono_celular, $tx_email, $tx_descripcion, $username_contacto) {
        $this->db->trans_start();

       $username = $this->ion_auth->username();

        $c001t_chats['nb_nombre']  = $nb_nombre;
        $c001t_chats['nb_apellido'] = $nb_apellido;
        $c001t_chats['nu_telefono_celular']    = $nu_telefono_celular;
        $c001t_chats['tx_email']    = $tx_email;
        $c001t_chats['tx_descripcion']    = $tx_descripcion;
        $c001t_chats['username']    = $username;
        $c001t_chats['username_contacto']    = $username_contacto;
        $this->db->insert("c004t_usuario_contacto", $c001t_chats);
        $co_new_usuario_contacto = $this->db->insert_id();
        $this->db->trans_complete();
        return $co_new_usuario_contacto;
    }

            function get_user_id($username) {

         $sql   = "SELECT
            a.*
            FROM
            lu_users AS a
            where active = true and a.username = '$username' limit 1";
             $query = $this->db->query($sql);

         if($query->num_rows() > 0):  return $query->row(); else: false; endif; 
    }

                function get_user_id_in_contacto($username_contacto) {

       $username = $this->ion_auth->username();

         $sql   = "SELECT
            a.*
            FROM
            c004t_usuario_contacto AS a
            where a.in_activo = true and a.username = '$username' and a.username_contacto = '$username_contacto'";

            $query = $this->db->query($sql);

         if($query->num_rows() > 0):  return true; else: false; endif; 
    }


                function get_miembro_grupo_difusion($co_grupo_difusion) {

                     $username = $this->ion_auth->username();

         $sql   = "SELECT
            a.*
            FROM
            c003t_grupo_difusion_chats_linea AS a
            where a.in_activo = true  and a.nb_estatus = 'ACEPTADO' and a.co_grupo_difusion_chats = $co_grupo_difusion";

            $query = $this->db->query($sql);

    if($query->num_rows() > 0):
                                                        
        $red_final = "";
        foreach ($query->result() as $row) :
            $red = "'".$row->username . "', ";
        $red_final = $red_final . $red;
        endforeach;
        $busqueda_final = substr($red_final, 0, -2);

        return $busqueda_final;

    else:

        return $busqueda_final = "''";

    endif;

    }


                function get_miembro_grupo_difusion_array($co_grupo_difusion) {

                     $username = $this->ion_auth->username();

         $sql   = "SELECT
            a.*
            FROM
            c003t_grupo_difusion_chats_linea AS a
            where a.in_activo = true  and a.nb_estatus = 'ACEPTADO' and a.co_grupo_difusion_chats = $co_grupo_difusion and not a.username = '$username'";

            $query = $this->db->query($sql);

    if($query->num_rows() > 0):
                                                        
        $red_final = "";
        foreach ($query->result() as $row) :
            $red = $row->username . ", ";
        $red_final = $red_final . $red;
        endforeach;
        $busqueda_final = substr($red_final, 0, -2);

        return $busqueda_final;

    else:

        return $busqueda_final = 0;

    endif;


    }


                function get_miembro_grupo_difusion_busqueda_regex($co_grupo_difusion) {

                     $username = $this->ion_auth->username();

         $sql   = "SELECT
            a.*
            FROM
            c003t_grupo_difusion_chats_linea AS a
            where a.in_activo = true  and a.nb_estatus = 'ACEPTADO' and a.co_grupo_difusion_chats = $co_grupo_difusion";

            $query = $this->db->query($sql);

    if($query->num_rows() > 0):
                                                        
        $red_final = "";
        foreach ($query->result() as $row) :
            $red = $row->username . "|";
        $red_final = $red_final . $red;
        endforeach;
        $busqueda_final = substr($red_final, 0, -1);

        return $busqueda_final;

    else:

        return $busqueda_final = 0;

    endif;


    }
    
            function ejecutar_enviar_mensaje_masivo_model($tx_mensaje_masivo, $username_en_chats) {


        $this->db->trans_start();

       $username = $this->ion_auth->username();


        $new_array = explode(',', $username_en_chats);

        foreach ($new_array as $key => $value):

        $c001t_chats['tx_mensaje']  = $tx_mensaje_masivo;
        $c001t_chats['co_partner'] = 1;
        $c001t_chats['nb_modo_mensaje'] = 'PRIVADO';
        $c001t_chats['co_grupo_difusion'] = 0;
        $c001t_chats['username_emisor']    = $username;
        $c001t_chats['username_receptor']    = $value;
        $c001t_chats['in_activo_usuario']    = $username.','.$value;
        $this->db->insert("c001t_chats", $c001t_chats);

        endforeach;


        $this->db->trans_complete();
        return true;


    }

 
      function eliminar_contacto_model($username_chats) {

        $co_partner = $this->ion_auth->co_partner();
        $username = $this->ion_auth->username();

        $this->db->trans_start();
        $c004t_usuario_contacto['in_activo']    = 0;
        $this->db->where("username", $username);
        $this->db->where("username_contacto", $username_chats);
        $this->db->update("c004t_usuario_contacto", $c004t_usuario_contacto);
        $this->db->trans_complete();


        return true;
    }




    
}
?>