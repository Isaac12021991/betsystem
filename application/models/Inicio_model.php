<?php

class Inicio_model extends CI_Model {


    function __construct()
    {
                parent::__construct();
        
    }



function get_last_dolar_model()  {       

    $sql  = "SELECT ca_tasa_cambio, ff_sistema FROM x00t_moneda_paralela
             WHERE in_activo = true
            ORDER BY ff_sistema desc
            limit 1";
    $query = $this->db->query($sql);
    return $query;
 }

 function get_disciplina_activa()  {     

    $co_partner = $this->ion_auth->co_partner();  

        $sql = "SELECT a.nb_deporte
        FROM j082t_sala AS a 
        where a.in_activo = true 
        and a.co_partner = $co_partner 
        and a.nb_estatus in ('ABIERTO') group by a.nb_deporte";
        $query = $this->db->query($sql);
        return $query;

    }


 function get_deporte_resultado()  {     

    $co_partner = $this->ion_auth->co_partner();  

        $sql = "SELECT a.*, b.nb_competidor, b.nu_posicion
        FROM j082t_sala AS a 
        left join x002t_sala_linea as b on b.co_sala = a.id
        where a.in_activo = true 
        and a.co_partner = $co_partner 
        and a.nb_estatus in ('CERRADO', 'FINALIZADO')
        and b.nu_posicion != 0 order by a.id desc, b.nu_posicion asc limit 10";
        $query = $this->db->query($sql);
        return $query;

    }



         public function get_partner() 
    {

            $sql = "SELECT a.*
        FROM j049t_empresas_farmaceuticas_todas as a
        where a.in_activo = true";
        $query = $this->db->query($sql);
        return $query;

    }

 




}
?>