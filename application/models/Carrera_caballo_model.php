<?php
class Carrera_caballo_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

                function get_salas($nb_modo_juego, $nb_sede, $nb_estatus, $ordenar_registro, $query_rango_fecha) {

        if ($nb_modo_juego != ''): $nb_modo_juego = "and a.nb_modo_juego = '$nb_modo_juego'"; endif;
        if ($nb_sede != ''): $nb_sede = "and a.nb_sede = '$nb_sede'"; endif;

        if($nb_estatus != ''): $nb_estatus = "and a.nb_estatus = '$nb_estatus'"; endif;
        

    

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT a.*
        FROM
        j082t_sala AS a
        where a.in_activo = true and a.nb_deporte = 'CABALLOS' and a.co_partner = $co_partner $query_rango_fecha $nb_modo_juego $nb_sede $nb_estatus $ordenar_registro";
        $query = $this->db->query($sql);
        return $query;
    }


            function get_pote_acumulado($nb_modo_juego, $nb_sede) {

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT coalesce(sum(a.ca_pote_tablazo),0) as ca_pote_acumulado
        FROM
        j082t_sala AS a
        where a.in_activo = true and a.nb_deporte = 'CABALLOS' and a.nb_modo_juego = '$nb_modo_juego' and a.co_partner = $co_partner and a.nb_sede = '$nb_sede' and a.nb_estatus = 'FINALIZADO' order by a.id desc limit 1";

        $query = $this->db->query($sql);
        $info_pote = $query->row();
        return $info_pote->ca_pote_acumulado;
    }


            function get_info_sala($co_sala) {

        $sql = "SELECT a.*
        FROM
        j082t_sala AS a
        where a.in_activo = true and a.nb_deporte = 'CABALLOS' and a.id = $co_sala";
        $query = $this->db->query($sql);
        return $query->row();
    }

                function get_info_ejemplares($co_sala) {

        $sql = "SELECT a.*
        FROM
        x002t_sala_linea AS a
        where a.in_activo = true and a.co_sala = '$co_sala'";
        $query = $this->db->query($sql);
        return $query;
    }



            function get_sedes() {

        $sql = "SELECT a.*
        FROM
        i001t_sede AS a
        where a.in_activo = true and a.nb_deporte = 'CABALLO'";
        $query = $this->db->query($sql);
        return $query;
    }


            function verificar_eligio_ganador($co_sala) {

        $sql = "SELECT a.*
        FROM
        x002t_sala_linea AS a
        where a.in_activo = true and a.co_sala = '$co_sala' and a.nu_posicion != 0";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0): return true; else: return false; endif;
        
    }

                    function get_info_sede_model($nb_sede) {

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT SUM(CASE 
             WHEN a.nb_estatus = 'ABIERTO' THEN 1
             ELSE 0
           END) AS carreras_abiertas,
           SUM(CASE 
             WHEN a.nb_estatus = 'CERRADO' THEN 1
             ELSE 0
           END) AS carreras_cerradas,
           SUM(CASE 
             WHEN a.nb_estatus = 'FINALIZADO' THEN 1
             ELSE 0
           END) AS carreras_finalizadas,
             SUM(CASE 
             WHEN a.nb_modo_juego = 'Ganadores' THEN 1
             ELSE 0
           END) AS carreras_ganadores,
                        SUM(CASE 
             WHEN a.nb_modo_juego = 'Remate' THEN 1
             ELSE 0
           END) AS carreras_remate
        FROM j082t_sala AS a 
        where a.in_activo = true 
        and a.nb_deporte = 'CABALLOS' 
        and a.co_partner = $co_partner
        and a.nb_sede = '$nb_sede'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    

    function add_tmp_ejemplar_model($nb_competidor, $ca_monto, $nu_casilla, $nu_color) {

        $user_id = $this->ion_auth->user_id();
                 
        $this->db->trans_start();

        $array = array('nu_casilla'=>$nu_casilla, 'nb_competidor'=>$nb_competidor, 'ca_monto'=>$ca_monto, 'nu_color'=>$nu_color);

        $i00t_z00t_data['tx_modulo'] = 'CARRERA CABALLO';
        $i00t_z00t_data['tx_carga'] = json_encode($array);
        $i00t_z00t_data['co_user'] = $user_id;
        $this->db->insert("z00t_temporal_json", $i00t_z00t_data);
        $this->db->trans_complete();
        return 'Ejemplar agregado';
    }


            function get_tmp_competidor() {

        $user_id = $this->ion_auth->user_id();

        $sql   = "SELECT a.* FROM
        z00t_temporal_json AS a WHERE a.co_user = $user_id";
        $query = $this->db->query($sql);
        return $query;
    }


        function eliminar_tmp_competidor_model($co_temp) {
        $this->db->trans_start();
        $this->db->where("id", $co_temp);
        $this->db->delete("z00t_temporal_json");
        $this->db->trans_complete();
        return 'Eliminado';
    }
  


        function ejecutar_agregar_sede_model($nb_sede_modal) {

        $this->db->trans_start();
        $i001t_sede['nb_deporte'] = 'CABALLO';
        $i001t_sede['nb_sede'] = $nb_sede_modal;
        $this->db->insert("i001t_sede", $i001t_sede);
        $this->db->trans_complete();
        return 'Agregado';
    }



        function agregar_carrera_caballo_model($nu_carrera, $nb_sede, $ca_minutos_cierre, $nb_modo_juego, $nb_tipo_carrera, $nu_distancia, $nb_estatus, $ca_pote, $ca_pote_tablazo, $ca_porcentaje_pote_tablazo, $nb_anuncio_uno, $nb_anuncio_dos, $tx_publicidad_sala_ubicacion) {


    $co_usuario = $this->ion_auth->user_id();
    $co_partner = $this->ion_auth->co_partner();



    if($nb_modo_juego == 'Dual'): 

        $array_modo_juego = array('Remate', 'Ganadores');

    else:

        $array_modo_juego = array($nb_modo_juego);

    endif;


    foreach ($array_modo_juego as $val):

        $this->db->trans_start();
        $j082t_sala['nu_carrera']     = $nu_carrera;
        $j082t_sala['nb_sede']    = $nb_sede;
        $j082t_sala['nb_estatus'] = $nb_estatus;
        $j082t_sala['ca_minutos_cierre']         = $ca_minutos_cierre;
        $j082t_sala['nb_modo_juego']      = $val;
        $j082t_sala['nb_tipo_carrera']     = $nb_tipo_carrera;
        $j082t_sala['co_partner']      = $co_partner;
        $j082t_sala['co_usuario']      = $co_usuario;
        $j082t_sala['nu_distancia']      = $nu_distancia;

        $j082t_sala['ca_pote']      = $ca_pote;
        $j082t_sala['ca_pote_tablazo']      = $ca_pote_tablazo;
        $j082t_sala['ca_porcentaje_pote_tablazo']      = $ca_porcentaje_pote_tablazo;

        $j082t_sala['nb_anuncio_uno']      = $nb_anuncio_uno;
        $j082t_sala['nb_anuncio_dos']      = $nb_anuncio_dos;
        $j082t_sala['tx_publicidad_sala_ubicacion']      = $tx_publicidad_sala_ubicacion;

        if($nb_estatus == 'ABIERTO'):
        $j082t_sala['ff_activacion_time']      = time();
        endif;

        $j082t_sala['ff_sistema_time']      = time();


        if($nb_estatus == 'ABIERTO'):
        if ($ca_minutos_cierre != 0):
            // Transformar minutos a segundos
            $ca_minutos_cierre_time = $ca_minutos_cierre * 60;
            $j082t_sala['ca_minutos_cierre_time']      = $ca_minutos_cierre_time;
            $j082t_sala['ff_cierre_time']      = time() + $ca_minutos_cierre_time;


        endif;
        endif;
        
        $j082t_sala['tx_descripcion']     = 'Hipodromo '.$nb_sede.', Carrera '.$nb_tipo_carrera.',  de '.$nu_distancia.' mts';

        $this->db->insert("j082t_sala", $j082t_sala);
        $co_new_sala = $this->db->insert_id();


        //Competidores

        $tmp_competidor = $this->get_tmp_competidor();
        $con = 0;
        foreach ($tmp_competidor->result() as $row) :
        $con ++;

        $array = json_decode($row->tx_carga, true);

            foreach ($array as $key => $row_2):
                if($key == 'ca_monto'): $ca_monto = $row_2; endif;
                if($key == 'nb_competidor'): $nb_competidor = $row_2; endif; 
                if($key == 'nu_casilla'): $nu_casilla = $row_2; endif;  
                if($key == 'nu_color'): $nu_color = $row_2; endif;                   
             endforeach;

        $x002t_sala_linea['nb_competidor']   = $nb_competidor;
        $x002t_sala_linea['ca_monto_apuesta_inicial']   = $ca_monto;
        $x002t_sala_linea['nu_casilla']   = $nu_casilla;
        $x002t_sala_linea['co_sala']   = $co_new_sala;
        $x002t_sala_linea['nu_color']   = $nu_color;

        $info_color = $this->carrera_caballo_library->get_color_competidor_color_uno($nu_color);
        $x002t_sala_linea['nu_color_letra']   = $info_color->nu_color_letra;

        $this->db->insert("x002t_sala_linea", $x002t_sala_linea);
        $co_new_sala_linea = $this->db->insert_id();

        if ($ca_monto != 0):

        $e003t_apuesta_compra['co_sala']   = $co_new_sala;
        $e003t_apuesta_compra['co_sala_linea']   = $co_new_sala_linea;
        $e003t_apuesta_compra['ca_monto']   = $ca_monto;
        $e003t_apuesta_compra['ff_sistema_time']   = time();
        $e003t_apuesta_compra['co_partner']   = $co_partner;
        $e003t_apuesta_compra['co_usuario']   = $co_usuario;
        $this->db->insert("e003t_apuesta_compra", $e003t_apuesta_compra);

        endif;

        
        endforeach;

        $this->db->trans_complete();

    endforeach;

        $this->eliminar_todo_tmp_competidor_model();
    
        return true;
    }


         function ejecutar_editar_carrera_caballo_model($co_sala, $nu_carrera, $nb_sede, $ca_minutos_cierre, $nb_modo_juego, $nb_tipo_carrera, $nu_distancia, $nb_estatus, $ca_pote, $ca_pote_tablazo, $ca_porcentaje_pote_tablazo, $nb_anuncio_uno, $nb_anuncio_dos, $tx_publicidad_sala_ubicacion) {


        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $this->db->trans_start();
        $j082t_sala['nu_carrera']     = $nu_carrera;
        $j082t_sala['nb_sede']    = $nb_sede;
        $j082t_sala['nb_estatus'] = $nb_estatus;
        $j082t_sala['ca_minutos_cierre']         = $ca_minutos_cierre;
        $j082t_sala['nb_modo_juego']      = $nb_modo_juego;
        $j082t_sala['nb_tipo_carrera']     = $nb_tipo_carrera;
        $j082t_sala['co_partner']      = $co_partner;
        $j082t_sala['co_usuario']      = $co_usuario;
        $j082t_sala['nu_distancia']      = $nu_distancia;

        $j082t_sala['ca_pote']      = $ca_pote;
        $j082t_sala['ca_pote_tablazo']      = $ca_pote_tablazo;
        $j082t_sala['ca_porcentaje_pote_tablazo']      = $ca_porcentaje_pote_tablazo;

        $j082t_sala['nb_anuncio_uno']      = $nb_anuncio_uno;
        $j082t_sala['nb_anuncio_dos']      = $nb_anuncio_dos;
        $j082t_sala['tx_publicidad_sala_ubicacion']      = $tx_publicidad_sala_ubicacion;

        if($row->nb_estatus == 'ABIERTO'):
        $j082t_sala['ff_activacion_time']      = time();
        elseif ($row->nb_estatus == 'EN ESPERA'):
        $j082t_sala['ff_activacion_time']      = '';
        endif;

        $j082t_sala['ff_sistema_time']      = time();

        if($nb_estatus == 'ABIERTO'):
        if ($ca_minutos_cierre != 0):
            // Transformar minutos a segundos
            $ca_minutos_cierre_time = $ca_minutos_cierre * 60;
            $j082t_sala['ca_minutos_cierre_time']      = $ca_minutos_cierre_time;
            $j082t_sala['ff_cierre_time']      = time() + $ca_minutos_cierre_time;
        endif;

        else:

            $j082t_sala['ca_minutos_cierre_time']      = '';
            $j082t_sala['ff_cierre_time']      = '';

        endif;

        if($row->nb_estatus == 'CERRADO'):
            $j082t_sala['ff_cierre_time']      = time();
        endif;

        $j082t_sala['tx_descripcion']     = 'Hipodromo '.$nb_sede.', Carrera '.$nb_tipo_carrera.',  de '.$nu_distancia.' mts';

        $this->db->where("id", $co_sala);
        $this->db->update("j082t_sala", $j082t_sala);
        $this->db->trans_complete();
        return true;
    }




            function eliminar_todo_tmp_competidor_model() {

        $user_id = $this->ion_auth->user_id();
        $this->db->trans_start();
        $this->db->where("tx_modulo", 'CARRERA CABALLO');
        $this->db->where("co_user", $user_id);
        $this->db->delete("z00t_temporal_json");
        $this->db->trans_complete();
        return 'Eliminado';
    }
    
    function add_ejemplar_model($co_sala, $nb_competidor, $ca_monto, $nu_casilla, $nu_color) {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();


        $info_color = $this->carrera_caballo_library->get_color_competidor_color_uno($nu_color);
        $nu_color_letra  = $info_color->nu_color_letra;


        $this->db->trans_start();
        $x002t_sala_linea = array('nu_casilla'=>$nu_casilla, 'nb_competidor'=>$nb_competidor, 'ca_monto_apuesta_inicial'=>$ca_monto, 'nu_color'=>$nu_color, 'nu_color_letra'=>$nu_color_letra);
        $x002t_sala_linea['co_sala'] = $co_sala;
        $this->db->insert("x002t_sala_linea", $x002t_sala_linea);
        $co_new_sala_linea = $this->db->insert_id();


        if ($ca_monto != 0 or $ca_monto != ''):

        $e003t_apuesta_compra['co_sala']   = $co_sala;
        $e003t_apuesta_compra['co_sala_linea']   = $co_new_sala_linea;
        $e003t_apuesta_compra['ca_monto']   = $ca_monto;
        $e003t_apuesta_compra['ff_sistema_time']   = time();
        $e003t_apuesta_compra['co_partner']   = $co_partner;
        $e003t_apuesta_compra['co_usuario']   = $co_usuario;
        $this->db->insert("e003t_apuesta_compra", $e003t_apuesta_compra);

        endif;


        $this->db->trans_complete();
        return 'Ejemplar agregado';
    }

    function get_info_linea_sala($co_sala_linea) {

        $sql = "SELECT a.*
        FROM
        x002t_sala_linea AS a
        where a.in_activo = true and a.id = '$co_sala_linea'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function get_info_linea_sala_ganador($co_sala) {

        $sql = "SELECT a.*
        FROM
        x002t_sala_linea AS a
        where a.in_activo = true and a.co_sala = '$co_sala' and a.nu_posicion = 0 and a.nb_estatus = 'ACTIVO'";
        $query = $this->db->query($sql);
        return $query;
    }



        function eliminar_competidor_model($co_sala_linea) {
        $this->db->trans_start();
        $x002t_sala_linea['in_activo']   = 0;
        $this->db->where("id", $co_sala_linea);
        $this->db->update("x002t_sala_linea", $x002t_sala_linea);

        $e003t_apuesta_compra['in_activo']   = 0;
        $this->db->where("co_sala_linea", $co_sala_linea);
        $this->db->update("e003t_apuesta_compra", $e003t_apuesta_compra);

        $this->db->trans_complete();
        return true;
    }


    function ejecutar_editar_ejemplar_model($co_sala_linea, $nb_competidor, $ca_monto, $nu_casilla, $co_sala, $nu_color) {

        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $info_color = $this->carrera_caballo_library->get_color_competidor_color_uno($nu_color);
        $nu_color_letra  = $info_color->nu_color_letra;


        $this->db->trans_start();
        $x002t_sala_linea = array('nu_casilla'=>$nu_casilla, 'nb_competidor'=>$nb_competidor, 'ca_monto_apuesta_inicial'=>$ca_monto, 'nu_color'=>$nu_color, 'nu_color_letra'=>$nu_color_letra);
        $this->db->where("id", $co_sala_linea);
        $this->db->update("x002t_sala_linea", $x002t_sala_linea);

        // Verificar si el registro esta apostado

        if ($this->get_verificar_apuesta($co_sala_linea)):

        if ($ca_monto != 0 or $ca_monto != ''):

        $e003t_apuesta_compra['ca_monto']   = $ca_monto;
        $e003t_apuesta_compra['ff_sistema_time']   = time();
        $this->db->where("co_sala_linea", $co_sala_linea);
        $this->db->update("e003t_apuesta_compra", $e003t_apuesta_compra);

        else:

        $e003t_apuesta_compra['in_activo']   = 0;
        $this->db->where("co_sala_linea", $co_sala_linea);
        $this->db->update("e003t_apuesta_compra", $e003t_apuesta_compra);


        endif;

        endif;


        if (!$this->get_verificar_apuesta($co_sala_linea)):

        if ($ca_monto != 0 or $ca_monto != ''):

        $e003t_apuesta_compra['co_sala']   = $co_sala;
        $e003t_apuesta_compra['co_sala_linea']   = $co_sala_linea;
        $e003t_apuesta_compra['ca_monto']   = $ca_monto;
        $e003t_apuesta_compra['ff_sistema_time']   = time();
        $e003t_apuesta_compra['co_partner']   = $co_partner;
        $e003t_apuesta_compra['co_usuario']   = $co_usuario;
        $this->db->insert("e003t_apuesta_compra", $e003t_apuesta_compra);


        endif;

        endif;


        $this->db->trans_complete();
        return true;
    }


    function get_verificar_apuesta($co_sala_linea) {

        $sql = "SELECT a.*
        FROM
        e003t_apuesta_compra AS a
        where a.in_activo = true and a.co_sala_linea = '$co_sala_linea'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0): return true; else: return false; endif;
        
    }



    function retirar_caballo_model($co_sala_linea) {
        $this->db->trans_start();
        $x002t_sala_linea['nb_estatus']   = 'RETIRADO';
        $this->db->where("id", $co_sala_linea);
        $this->db->update("x002t_sala_linea", $x002t_sala_linea);

        $e003t_apuesta_compra['in_activo']   = 0;
        $this->db->where("co_sala_linea", $co_sala_linea);
        $this->db->update("e003t_apuesta_compra", $e003t_apuesta_compra);

        $this->db->trans_complete();
        return true;
    }



    function agregar_ganador_model($co_sala_linea, $nu_posicion, $ca_monto_inh, $co_sala, $ca_dividendo, $in_ejecutar_pago) {
        $this->db->trans_start();
        $x002t_sala_linea['nu_posicion']   = $nu_posicion;
        $x002t_sala_linea['ca_monto_inh']   = $ca_monto_inh;
        $x002t_sala_linea['ca_dividendo']   = $ca_dividendo;
        $x002t_sala_linea['in_ejecutar_pago']   = $in_ejecutar_pago;
        $this->db->where("id", $co_sala_linea);
        $this->db->update("x002t_sala_linea", $x002t_sala_linea);

        // Registrar Pago



        $this->db->trans_complete();
        return true;
    }


    function cambiar_estatus_carrera_model($nb_estatus, $co_sala) {

        $info_sala = $this->get_info_sala($co_sala);

        $this->db->trans_start();

        if($nb_estatus == 'ABIERTO'):
        $j082t_sala['ff_activacion_time']      = time();
        endif;

        if($nb_estatus == 'EN ESPERA'):
        $j082t_sala['ff_activacion_time']      = '';
        endif;


         if($nb_estatus == 'ABIERTO'):
        if ($info_sala->ca_minutos_cierre != 0):
            // Transformar minutos a segundos
            $ca_minutos_cierre_time = $info_sala->ca_minutos_cierre * 60;
            $j082t_sala['ca_minutos_cierre_time']      = $ca_minutos_cierre_time;
            $j082t_sala['ff_cierre_time']      = time() + $ca_minutos_cierre_time;
        endif;

        else:

            $j082t_sala['ca_minutos_cierre_time']      = '';
            $j082t_sala['ff_cierre_time']      = '';

        endif;

        if($nb_estatus == 'CERRADO'):
            $j082t_sala['ff_cierre_time'] = time();
        endif;


        if ($info_sala->nb_estatus != 'FINALIZADO'):

        if($nb_estatus == 'FINALIZADO'):
            // Verificar si se eligigió ganador

            $this->ejecutar_pagos($co_sala);

        endif;

         endif;

        $j082t_sala['nb_estatus']   = $nb_estatus;
        $this->db->where("id", $co_sala);
        $this->db->update("j082t_sala", $j082t_sala);
        $this->db->trans_complete();
        return true;
    }


        function eliminar_carrera_caballo_model($co_sala) {
        $this->db->trans_start();
        $j082t_sala['in_activo']   = 0;
        $this->db->where("id", $co_sala);
        $this->db->update("j082t_sala", $j082t_sala);
        $this->db->trans_complete();
        return true;
    }
    

            function duplicar_registro_model($co_sala) {


        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $this->db->trans_start();

        // Sala principal

                $sql = "SELECT a.*
        FROM
        j082t_sala AS a
        where a.in_activo = true and a.nb_deporte = 'CABALLOS' and a.id = $co_sala";
        $query = $this->db->query($sql);


        foreach ($query->result() as $row):

        $j082t_sala['nb_deporte']   = $row->nb_deporte;
        $j082t_sala['nb_modo_juego']   = $row->nb_modo_juego;
        $j082t_sala['nu_carrera']   = $row->nu_carrera;
        $j082t_sala['nb_tipo_carrera']   = $row->nb_tipo_carrera;
        $j082t_sala['nb_anuncio_uno']   = $row->nb_anuncio_uno;
        $j082t_sala['nb_anuncio_dos']   = $row->nb_anuncio_dos;
        $j082t_sala['nb_sede']   = $row->nb_sede;
        $j082t_sala['ca_pote_tablazo']   = $row->ca_pote_tablazo;
        $j082t_sala['ca_pote']   = $row->ca_pote;
        $j082t_sala['ca_porcentaje_pote_tablazo']   = $row->ca_porcentaje_pote_tablazo;
        $j082t_sala['ca_minutos_cierre']         = $row->ca_minutos_cierre;
        $j082t_sala['nu_distancia']      = $row->nu_distancia;
        $j082t_sala['nb_estatus']   = 'EN ESPERA';
        $j082t_sala['co_usuario']   = $co_usuario;
        $j082t_sala['co_partner']   = $co_partner;

        if($row->nb_estatus == 'ABIERTO'):
        $j082t_sala['ff_activacion_time']      = time();
        elseif ($row->nb_estatus == 'EN ESPERA'):
        $j082t_sala['ff_activacion_time']      = '';
        endif;

        $j082t_sala['ff_sistema_time']      = time();


        if($row->nb_estatus == 'ABIERTO'):
        if ($row->ca_minutos_cierre != 0):
            // Transformar minutos a segundos
            $ca_minutos_cierre_time = $row->ca_minutos_cierre * 60;
            $j082t_sala['ca_minutos_cierre_time']      = $ca_minutos_cierre_time;
            $j082t_sala['ff_cierre_time']      = time() + $ca_minutos_cierre_time;
        endif;

        else:

            $j082t_sala['ca_minutos_cierre_time']      = '';
            $j082t_sala['ff_cierre_time']      = '';

        endif;


        $this->db->insert("j082t_sala", $j082t_sala);
        $co_new_sala = $this->db->insert_id();

        endforeach;

        $sql = "SELECT a.*
        FROM
        x002t_sala_linea AS a
        where a.in_activo = true and a.co_sala = '$co_sala'";
        $query_sala_linea = $this->db->query($sql);

        foreach ($query_sala_linea->result() as $row_linea):

        $x002t_sala_linea = array('nu_casilla'=>$row_linea->nu_casilla, 
        'nb_competidor'=>$row_linea->nb_competidor, 
        'nu_color'=>$row_linea->nu_color, 
        'nu_color_letra'=>$row_linea->nu_color_letra, 
        'ca_monto_apuesta_inicial'=>$row_linea->ca_monto_apuesta_inicial);
        $x002t_sala_linea['co_sala'] = $co_new_sala;
        $this->db->insert("x002t_sala_linea", $x002t_sala_linea);


        endforeach;


        $this->db->trans_complete();

        return $co_new_sala;
    }

// Modo jugador

                function get_hipodromos() {

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT a.nb_sede, b.nb_url_foto, b.tx_descripcion as descripcion_sede
        FROM j082t_sala AS a 
        join i001t_sede as b on b.nb_sede = a.nb_sede
        where a.in_activo = true 
        and a.nb_deporte = 'CABALLOS' 
        and a.co_partner = $co_partner 
        and a.nb_estatus in ('ABIERTO', 'CERRADO')
        GROUP BY a.nb_sede";
        $query = $this->db->query($sql);
        return $query;
    }

                    function get_hipodromos_carreras($nb_sede) {

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT a.*
        FROM j082t_sala AS a 
        where a.in_activo = true 
        and a.nb_deporte = 'CABALLOS' 
        and a.co_partner = $co_partner 
        and a.nb_estatus in ('ABIERTO', 'CERRADO')
        and a.nb_sede = '$nb_sede'";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_carrera_modo_juego($nb_modo_juego, $nb_sede) {

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT a.*
        FROM j082t_sala AS a 
        where a.in_activo = true 
        and a.nb_deporte = 'CABALLOS' 
        and a.co_partner = $co_partner 
        and a.nb_estatus in ('ABIERTO', 'CERRADO')
        and a.nb_sede = '$nb_sede'
        and a.nb_modo_juego = '$nb_modo_juego'";
        $query = $this->db->query($sql);
        return $query;
    }


        function get_sala_modo_usuario($co_sala) {

        $co_partner = $this->ion_auth->co_partner();

        $sql = "SELECT a.*,
        (SELECT count(aa.id) from x002t_sala_linea as aa where aa.co_sala = a.id and aa.nb_estatus = 'RETIRADO' and aa.in_activo = true) as caballos_retirados
        FROM j082t_sala AS a 
        where a.in_activo = true 
        and a.nb_deporte = 'CABALLOS' 
        and a.co_partner = $co_partner 
        and a.nb_estatus in ('ABIERTO', 'CERRADO', 'FINALIZADO')
        and a.id = $co_sala";
        $query = $this->db->query($sql);
        return $query->row();
    }
    

        function ejecutar_apuesta_model($co_sala_linea, $nu_posicion_apuesta, $ca_monto_apuesta, $co_sala) {


        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $this->db->trans_start();

        $e003t_apuesta_compra['co_sala']   = $co_sala;
        $e003t_apuesta_compra['co_sala_linea']   = $co_sala_linea;
        $e003t_apuesta_compra['ca_monto']   = $ca_monto_apuesta;
        $e003t_apuesta_compra['ff_sistema_time']   = time();
        $e003t_apuesta_compra['co_partner']   = $co_partner;
        $e003t_apuesta_compra['co_usuario']   = $co_usuario;
        $e003t_apuesta_compra['nu_posicion_apuesta']   = $nu_posicion_apuesta;
        $this->db->insert("e003t_apuesta_compra", $e003t_apuesta_compra);

        $this->db->trans_complete();
        return true;
    }


                function get_sala_linea_posiciones($co_sala) {

        $sql = "SELECT a.*
        FROM
        x002t_sala_linea AS a
        where a.in_activo = true and a.co_sala = '$co_sala' and a.nu_posicion != 0 order by a.nu_posicion asc";
        $query = $this->db->query($sql);
        return $query;
    }


                function get_sala_linea_posiciones_pago($co_sala) {

        $sql = "SELECT a.*, b.in_ejecutar_pago, b.nu_posicion, b.ca_dividendo, b.ca_monto_inh
                FROM e003t_apuesta_compra as a
                JOIN x002t_sala_linea as b on b.id = a.co_sala_linea
                where a.in_activo = true and a.nb_estatus = 'APOSTADO' and a.co_sala = $co_sala ORDER BY a.ca_monto DESC";
        $query = $this->db->query($sql);
        return $query;
    }

                    function get_sala_linea_posiciones_no_pago($co_sala) {

        $sql = "SELECT a.*
        FROM
        x002t_sala_linea AS a
        where a.in_activo = true and a.co_sala = '$co_sala' and a.nu_posicion != 0 and a.in_ejecutar_pago = false order by a.nu_posicion asc";
        $query = $this->db->query($sql);
        return $query;
    }


// Monto  por ejemplar 

                    function get_sala_linea_posiciones_administrador($co_sala, $nu_posicion) {

        $sql = "SELECT b.id, sum(a.ca_monto) as ca_monto
                FROM e003t_apuesta_compra as a
                JOIN x002t_sala_linea as b on b.id = a.co_sala_linea
                where a.in_activo = true and a.nb_estatus = 'APOSTADO' and b.nb_estatus = 'ACTIVO' and a.co_sala = $co_sala and a.nu_posicion_apuesta = '$nu_posicion' GROUP BY b.id ORDER BY b.id DESC";
        $query = $this->db->query($sql);
        return $query;
    }


        function ejecutar_apuesta_remate_model($co_sala_linea, $nu_posicion_apuesta, $ca_monto_apostar, $co_sala) {



        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $this->db->trans_start();

        $e003t_apuesta_compra_update['in_activo']   = 0;
        $this->db->where("co_sala_linea", $co_sala_linea);
        $this->db->update("e003t_apuesta_compra", $e003t_apuesta_compra_update);

        $e003t_apuesta_compra['co_sala']   = $co_sala;
        $e003t_apuesta_compra['co_sala_linea']   = $co_sala_linea;
        $e003t_apuesta_compra['ca_monto']   = $ca_monto_apostar;
        $e003t_apuesta_compra['ff_sistema_time']   = time();
        $e003t_apuesta_compra['co_partner']   = $co_partner;
        $e003t_apuesta_compra['co_usuario']   = $co_usuario;
        $e003t_apuesta_compra['nu_posicion_apuesta']   = $nu_posicion_apuesta;
        $this->db->insert("e003t_apuesta_compra", $e003t_apuesta_compra);

        $this->db->trans_complete();
        return $ca_monto_apostar;
    }



        function ejecutar_ruleta_model($co_apuesta_compra, $nu_posicion_ruleta) {


        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $this->db->trans_start();

        $e003t_apuesta_compra['nu_posicion_ruleta']   = $nu_posicion_ruleta;
        $this->db->where("id", $co_apuesta_compra);
        $this->db->update("e003t_apuesta_compra", $e003t_apuesta_compra);

        $this->db->trans_complete();
        return true;
    }

         function ejecutar_pagos($co_sala)
    {



        $this->load->model('wallet_model');
        $info_partner = $this->ion_auth->info_partner_todo();

        $info_sala_general = $this->get_info_sala($co_sala);
        $info_sala_linea = $this->get_sala_linea_posiciones_pago($co_sala);
       

        if ($info_sala_general->nb_modo_juego == 'Remate'):

                  //AGREGA GANANCIAS A LA CASA Y RESTA EL POTE
                  $total_recogido_tabla = $this->get_total_apuesta_tabla($co_sala);
                  $total_ganancias_administrador = $total_recogido_tabla * $info_partner->ca_porcentaje;


                    $total_casa_ganancias_administrador_final = $total_ganancias_administrador - $info_sala_general->ca_pote - $info_sala_general->ca_pote_tablazo;
                    // Insertar en pagos al administrador

                    // Buscar wallet
                    $info_wallet = $this->wallet_library->get_info_wallet($info_sala_general->co_usuario, $info_sala_general->co_partner);

                        $this->db->trans_start();
                            $j080t_pagos['co_diario']      = 1;
                            $j080t_pagos['co_sala']      = $co_sala;
                            $j080t_pagos['co_wallet']      = $info_wallet->id;
                            $j080t_pagos['co_partner']      = $info_sala_general->co_partner;
                            $j080t_pagos['tx_descripcion']      = 'Pago de carrera de caballo';
                            $j080t_pagos['co_usuario']      = $info_sala_general->co_usuario;
                            $j080t_pagos['ca_monto']      = $total_casa_ganancias_administrador_final;
                            $j080t_pagos['ff_pago']      = date('Y-m-d');
                            $j080t_pagos['nb_operacion']      = 'CREDITO';
                        $this->db->insert("j080t_pagos", $j080t_pagos);
                        $co_new_pago = $this->db->insert_id();
                        $this->db->trans_complete();


                        $this->wallet_model->aprobar_pago_model($co_new_pago);



            // Usuarios ganadores
        foreach ($info_sala_linea->result() as $row):

                    // AGREGA GANANCIAS A USUARIO Y RESTA EL POTE

                if($row->in_ejecutar_pago == true and $row->nu_posicion == '1'):

                    $total_ganancias_usuario = $total_recogido_tabla - $total_ganancias_administrador;
                    $total_ganancias_usuario_final = $total_ganancias_usuario + $info_sala_general->ca_pote + $info_sala_general->ca_pote_tablazo;

                    // Insertar en pagos usuario
                     $info_wallet = $this->wallet_library->get_info_wallet($row->co_usuario, $row->co_partner);

                        $this->db->trans_start();
                            $j080t_pagos['co_diario']      = 1;
                            $j080t_pagos['co_sala']      = $info_sala_general->id;
                            $j080t_pagos['co_sala_linea']      = $row->co_sala_linea;
                            $j080t_pagos['co_apuesta_compra']      = $row->id;
                            $j080t_pagos['co_wallet']      = $info_wallet->id;
                            $j080t_pagos['co_partner']      = $row->co_partner;
                            $j080t_pagos['tx_descripcion']      = 'Pago de carrera de caballo';
                            $j080t_pagos['co_usuario']      = $row->co_usuario;
                            $j080t_pagos['ca_monto']      = $total_ganancias_usuario_final;
                            $j080t_pagos['ff_pago']      = date('Y-m-d');
                            $j080t_pagos['nb_operacion']      = 'CREDITO';
                        $this->db->insert("j080t_pagos", $j080t_pagos);
                        $co_new_pago = $this->db->insert_id();
                        $this->db->trans_complete();


                        $this->wallet_model->aprobar_pago_model($co_new_pago);

                endif;




                    $info_wallet = $this->wallet_library->get_info_wallet($row->co_usuario, $row->co_partner);

                        $this->db->trans_start();
                            $j080t_pagos['co_diario']      = 1;
                            $j080t_pagos['co_sala']      = $info_sala_general->id;
                            $j080t_pagos['co_sala_linea']      = $row->co_sala_linea;
                            $j080t_pagos['co_apuesta_compra']      = $row->id;
                            $j080t_pagos['co_wallet']      = $info_wallet->id;
                            $j080t_pagos['co_partner']      = $row->co_partner;
                            $j080t_pagos['tx_descripcion']      = 'Apuesta de carrera de caballo';
                            $j080t_pagos['co_usuario']      = $row->co_usuario;
                            $j080t_pagos['ca_monto']      = $row->ca_monto;
                            $j080t_pagos['ff_pago']      = date('Y-m-d');
                            $j080t_pagos['nb_operacion']      = 'DEBITO';
                        $this->db->insert("j080t_pagos", $j080t_pagos);
                        $co_new_pago = $this->db->insert_id();
                        $this->db->trans_complete();


                     $this->wallet_model->aprobar_pago_model($co_new_pago);



        endforeach;




    endif;


    // Modo ganadores
    if ($info_sala_general->nb_modo_juego == 'Ganadores'):

          foreach ($info_sala_linea->result() as $row):

            if($row->in_ejecutar_pago == true):


            $ca_calculo = $row->ca_monto * $row->ca_monto_inh;
            $result_ca_dolar = $ca_calculo / $row->ca_dividendo;
            $result_ca_dolar  = round($result_ca_dolar, 2);


                    // Insertar en pagos usuario
         $info_wallet = $this->wallet_library->get_info_wallet($row->co_usuario, $row->co_partner);

            $this->db->trans_start();
                $j080t_pagos['co_diario']      = 1;
                $j080t_pagos['co_sala']      = $info_sala_general->id;
                $j080t_pagos['co_sala_linea']      = $row->co_sala_linea;
                $j080t_pagos['co_wallet']      = $info_wallet->id;
                $j080t_pagos['co_partner']      = $row->co_partner;
                $j080t_pagos['tx_descripcion']      = 'Pago de carrera de caballo';
                $j080t_pagos['co_usuario']      = $row->co_usuario;
                $j080t_pagos['ca_monto']      = $result_ca_dolar;
                $j080t_pagos['ff_pago']      = date('Y-m-d');
                $j080t_pagos['nb_operacion']      = 'CREDITO';
            $this->db->insert("j080t_pagos", $j080t_pagos);
            $co_new_pago = $this->db->insert_id();
            $this->db->trans_complete();


            $this->wallet_model->aprobar_pago_model($co_new_pago);



           else:


            $info_wallet = $this->wallet_library->get_info_wallet($row->co_usuario, $row->co_partner);

                $this->db->trans_start();
                    $j080t_pagos['co_diario']      = 1;
                    $j080t_pagos['co_sala']      = $info_sala_general->id;
                    $j080t_pagos['co_sala_linea']      = $row->co_sala_linea;
                    $j080t_pagos['co_wallet']      = $info_wallet->id;
                    $j080t_pagos['co_partner']      = $row->co_partner;
                    $j080t_pagos['tx_descripcion']      = 'Apuesta de carrera de caballo';
                    $j080t_pagos['co_usuario']      = $row->co_usuario;
                    $j080t_pagos['ca_monto']      = $row->ca_monto;
                    $j080t_pagos['ff_pago']      = date('Y-m-d');
                    $j080t_pagos['nb_operacion']      = 'DEBITO';
                $this->db->insert("j080t_pagos", $j080t_pagos);
                $co_new_pago = $this->db->insert_id();
                $this->db->trans_complete();


             $this->wallet_model->aprobar_pago_model($co_new_pago);


         endif;
            



          endforeach;


    endif;

        // code...
    }


 function get_total_apuesta_tabla($co_sala, $co_sala_linea = 0)

 
{

    if ($co_sala_linea == 0):
        $filtro = "";
    else:
        $filtro = "and not a.co_sala_linea = '$co_sala_linea'";
    endif;

                 $sql = "SELECT sum(a.ca_monto) as ca_monto
                FROM
                e003t_apuesta_compra AS a
                where a.co_sala = '$co_sala' $filtro and a.in_activo = true";
                $query = $this->db->query($sql);
                $query_info = $query->row();
                return $query_info->ca_monto;
}



 function get_total_apuesta_tabla_not_ganadores($co_sala, $co_sala_linea = 0)

 
{

    if ($co_sala_linea == 0):
        $filtro = "";
    else:
        $filtro = "and not a.co_sala_linea = '$co_sala_linea'";
    endif;

                 $sql = "SELECT sum(a.ca_monto) as ca_monto
                FROM
                e003t_apuesta_compra AS a
                where a.co_sala = '$co_sala' $filtro and a.in_activo = true";
                $query = $this->db->query($sql);
                return $query;
}

     function ejecutar_apuesta_taquilla_model($co_sala_linea, $nu_posicion_apuesta, $ca_monto_apuesta, $co_sala, $co_taquilla, $nu_identificacion, $nb_nombre, $nb_apellido) {


        $co_usuario = $this->ion_auth->user_id();
        $co_partner = $this->ion_auth->co_partner();

        $this->db->trans_start();


        $x004t_taquilla_usuarios['co_taquilla']   = $co_taquilla;
        $x004t_taquilla_usuarios['nu_identificacion']   = $nu_identificacion;
        $x004t_taquilla_usuarios['co_usuario']   = $co_usuario;
        $x004t_taquilla_usuarios['nb_nombre']   = $nb_nombre;
        $x004t_taquilla_usuarios['nb_apellido']   = $nb_apellido;
        $this->db->insert("x004t_taquilla_usuarios", $x004t_taquilla_usuarios);
        $co_taquilla_usuario = $this->db->insert_id();

        $e003t_apuesta_compra['co_sala']   = $co_sala;
        $e003t_apuesta_compra['co_sala_linea']   = $co_sala_linea;
        $e003t_apuesta_compra['ca_monto']   = $ca_monto_apuesta;
        $e003t_apuesta_compra['ff_sistema_time']   = time();
        $e003t_apuesta_compra['co_partner']   = $co_partner;
        $e003t_apuesta_compra['co_usuario']   = $co_usuario;
        $e003t_apuesta_compra['nu_posicion_apuesta']   = $nu_posicion_apuesta;
        $e003t_apuesta_compra['co_taquilla']   = $co_taquilla;
        $e003t_apuesta_compra['co_taquilla_usuario']   = $co_taquilla_usuario;
        $this->db->insert("e003t_apuesta_compra", $e003t_apuesta_compra);


        $this->db->trans_complete();
        return true;
    }


                function get_sala_linea_posiciones_sede($nb_sede) {

        $sql = "SELECT a.*, b.tx_descripcion, b.ff_sistema_time, b.nb_sede, b.nu_carrera, b.nb_modo_juego
        FROM
        x002t_sala_linea AS a
        join j082t_sala as b on b.id = a.co_sala
        where a.in_activo = true  and b.nb_sede = '$nb_sede' and a.nu_posicion != 0 and b.in_activo = true order by b.id desc, a.nu_posicion asc";

        $query = $this->db->query($sql);
        return $query;
    }



            function actualizar_pote_tablazo_model($co_sala, $pote_tablazo_final) {


        $this->db->trans_start();
        $j082t_sala['ca_pote_tablazo']   = $pote_tablazo_final;
        $this->db->where("id", $co_sala);
        $this->db->update("j082t_sala", $j082t_sala);
        $this->db->trans_complete();
        return true;
    }

    


            function accion_masiva_check_model($input_check, $nb_accion) {

        $this->db->trans_start();


        if($nb_accion == 'Iniciar'):

        foreach ($input_check as $key => $value):
        $j082t_sala['nb_estatus']      = 'ABIERTO';
        $this->db->where("id", $value);
        $this->db->update("j082t_sala", $j082t_sala);
        endforeach;



        endif;


        if($nb_accion == 'Finalizar'):

         foreach ($input_check as $key => $value):
        $j082t_sala['nb_estatus']      = 'CERRADO';
        $this->db->where("id", $value);
        $this->db->update("j082t_sala", $j082t_sala);
        endforeach;




        endif;

        if($nb_accion == 'Eliminar'):


        foreach ($input_check as $key => $value):
        $j082t_sala['in_activo']      = 0;
        $this->db->where("id", $value);
        $this->db->update("j082t_sala", $j082t_sala);
        endforeach;


        endif;



        $this->db->trans_complete();
        return true;
    }



    function pago_automatico_model($co_sala) {


        $this->db->trans_start();

            $this->ejecutar_pagos($co_sala);

        $j082t_sala['nb_estatus']   = 'FINALIZADO';
        $this->db->where("id", $co_sala);
        $this->db->update("j082t_sala", $j082t_sala);
        $this->db->trans_complete();
        return true;
    }
    

                    function get_carreras_pago_automatico_model() {

        $sql = "SELECT a.*
        FROM
        j082t_sala AS a
        where a.in_activo = true  and a.nb_estatus = 'CERRADO' and a.nb_pago_automatico = 'SI' order by a.id desc";

        $query = $this->db->query($sql);
        return $query;
    }


}
?>