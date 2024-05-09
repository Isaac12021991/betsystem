<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Pagos_library {
    protected $ci;
    function __construct() {
        $this->ci =& get_instance();
        $obj =& get_instance();
    }
    // GENERAL

    // Conciliado orden de compra    

    function get_orden_compra($co_orden_compra) {
        $obj =& get_instance();
        $sql = "SELECT
                a.id,
                a.nb_empresa,
                a.co_estatus,
                a.nu_rif,
                a.ff_fecha_elaboracion,
                a.ff_fecha_vencimiento,
                b.nb_estatus,
                a.nu_codigo_orden_compra,
                a.nu_telefono,
                a.tx_direccion,
                a.tx_email,
                a.nb_persona_contacto,
                a.co_presupuesto,
                d.nu_codigo_presupuesto,
                c.nb_tipo_pago,
                a.co_tipo_pago,
                a.in_aprobado,
                a.co_moneda,
                f.nb_moneda,
                f.nb_acronimo,
                f.nu_redondeo,
                a.co_contacto,
                (
                    SELECT
                        COUNT(aa.id)
                    FROM
                        x00t_orden_compra_detalle AS aa
                    WHERE
                        aa.co_orden_compra =a.id
                ) AS nu_productos,
                (
                    SELECT
                        SUM(
                            bb.nu_precio * bb.nu_unidades
                        )
                    FROM
                        x00t_orden_compra_detalle AS bb
                    WHERE
                        bb.co_orden_compra = a.id
                ) AS nu_precio,
                (SELECT count(cc.id) FROM x00t_orden_compra_archivo as cc where cc.co_orden_compra = a.id and cc.in_activo = true) as nu_archivos_cargados,
                (SELECT sum(dd.nu_precio * dd.nu_unidades) FROM x00t_orden_compra_detalle as dd where dd.co_orden_compra = a.id and dd.in_activo = true) as nu_total_orden_compra,
            COALESCE((SELECT sum(ee.ca_pago) FROM x00t_orden_compra_avance_financiero as ee where ee.co_orden_compra = a.id and ee.in_activo = true),0) as ca_pago_total,
            (SELECT sum(dd.nu_precio * dd.nu_unidades) FROM x00t_orden_compra_detalle as dd where dd.co_orden_compra = a.id and dd.in_activo = true) - COALESCE((SELECT sum(ee.ca_pago) FROM x00t_orden_compra_avance_financiero as ee where ee.co_orden_compra = a.id and ee.in_activo = true),0) as ca_restante,
            e.first_name,
            e.last_name,
            h.id as co_documento
                FROM
                i00t_orden_compra AS a
            JOIN i00t_estatus AS b ON b.id = a.co_estatus
            left JOIN i00t_tipo_pago as c on c.id = a.co_tipo_pago
            left JOIN i00t_presupuesto as d on d.id = a.co_presupuesto
            left join lu_users as e on e.id = a.co_usuario_empresa
            left join i00t_monedas as f on f.id = a.co_moneda
            left join i00t_documentos as h on h.co_orden_compra = a.id
            WHERE a.in_activo = true and a.id = '$co_orden_compra'";
        $query = $obj->db->query($sql);
        return $query->row()        ;
    }

        function get_documento($co_documento) {
        $obj =& get_instance();
         $sql = "SELECT
                    a.id,
                    a.ff_sistema,
                    a.nu_codigo,
                    a.co_orden_compra,
                    b.nu_rif,
                    b.nu_sicm,
                    a.nu_documento,
                    a.ff_emision,
                    a.co_cliente,
                    a.co_estatus,
                    b.nb_cliente,
                    b.tx_direccion,
                    b.nu_sicm,
                    c.nb_estatus,
                    d.nb_tipo_pago,
                    a.co_tipo_movimiento,
                    a.co_tipo_documento,
                    e.nb_documento,
                    f.nb_movimiento,
                    a.co_sucursal,
                    a.tx_observaciones,
                    a.ca_bulto,
                    a.ff_time,
                    h.first_name as nombre_vendedor,
                    h.last_name as apellido_vendedor,
                    h.email,
                    a.co_vendedor,
                    a.co_tipo_pago,
                    a.co_usuario_empresa,
                    a.ff_sistema,
                    a.ff_vencimiento,
                    a.nu_control,
                    a.co_documento,
                    a.co_moneda,
                    j.nb_acronimo,
                    j.nb_moneda,
                    i.nu_documento as nu_documento_origen,
                    (SELECT
                    max(nu_documento) as nu_documento_consecutivo
                    FROM
                    i00t_documentos
                    WHERE
                    co_estatus IN ('1','2','4')
                    AND co_tipo_movimiento = a.co_tipo_movimiento
                    AND co_tipo_documento = a.co_tipo_documento) as nu_factura_futura,
                    (SELECT count(aa.id) FROM x00t_documentos_detalle as aa where aa.co_documento = a.id and aa.in_activo = true) as nu_productos,
                    (SELECT sum(bb.nu_precio) FROM x00t_documentos_detalle as bb where bb.co_documento = a.id and bb.in_activo = true) as nu_precio,
                    (SELECT count(cc.id) FROM x00t_documento_archivo as cc where cc.co_documento = a.id and cc.in_activo = true) as nu_archivos_cargados,
                    (SELECT sum(bb.nu_precio * bb.nu_unidades) FROM x00t_documentos_detalle as bb where bb.co_documento = a.id and bb.in_activo = true) as nu_precio_factura,
                    (SELECT sum(bb.ca_pago) FROM x00t_orden_compra_avance_financiero as bb where bb.co_orden_compra = a.co_orden_compra and bb.in_activo = true) as ca_pago_monto,
                    (SELECT count(aa.id) FROM x00t_documentos_impresion as aa where aa.co_documento = a.id and aa.in_activo = true) as nu_impresion,
                    (SELECT sum(bb.nu_precio * bb.nu_unidades) FROM x00t_orden_compra_detalle as bb where bb.co_orden_compra = a.co_orden_compra and bb.in_activo = true) as nu_precio_orden_compra
                    FROM
                    i00t_documentos AS a
                    left JOIN i00t_clientes AS b ON b.id = a.co_cliente
                    left JOIN i00t_estatus AS c ON c.id = a.co_estatus
                    LEFT JOIN i00t_tipo_pago as d on d.id = a.co_tipo_pago
                    left join i00t_tipo_documentos as e on e.id = a.co_tipo_documento
                    left join i00t_tipo_movimiento as f on f.id = a.co_tipo_movimiento
                    left join lu_users as h on h.id = a.co_vendedor
                    left join i00t_documentos as i on i.id = a.co_documento
                    left join i00t_monedas as j on j.id = a.co_moneda
                    where a.id = '$co_documento' limit 1";
        $query = $obj->db->query($sql);
        return $query->row();
    }

            

                    function get_contacto($co_contacto) {
        $obj =& get_instance();
        $sql   = "SELECT * FROM i00t_clientes as a where a.in_activo = true and a.id = '$co_contacto'";
        $query = $obj->db->query($sql);
        return $query->row();
    }

        function get_info_cuenta_banco_model($co_cuenta_banco) {
        $obj =& get_instance();
        $sql   = "SELECT
            a.*,
            b.nb_banco,
            c.nb_moneda,
            c.nb_acronimo
            FROM
            i00t_cuenta_banco AS a
            JOIN i00t_banco AS b ON b.id = a.co_banco
            join i00t_monedas as c on c.id = a.co_moneda
            where a.id = $co_cuenta_banco";
        $query = $obj->db->query($sql);
        return $query->row();
    }

    // Creditos pendientes

            function get_pagos_registrados_pendiente_entrada($co_contacto) {

        $obj =& get_instance();


        $sql   = "SELECT a.id, a.nu_referencia, a.ff_pago, a.ff_sistema, b.nb_banco, c.nb_diario, c.nu_cuenta, a.nb_url, a.ca_pago, d.nb_banco as nb_banco_destino, a.tx_descripcion, a.tx_movimiento_pago,
              (select count(id) FROM i00t_pago_verificado where in_activo = true and co_orden_compra_avance_financiero = a.id) as in_verificado
              FROM x00t_orden_compra_avance_financiero as a
              left join i00t_banco as b on b.id = a.co_banco_origen
              left join i00t_cuenta_banco as c on c.id = a.co_cuenta_banco
              left join i00t_banco as d on d.id = c.co_banco
              left join i00t_documentos as e on e.id = a.co_documento
              left join i00t_clientes as f on f.id = a.co_contacto
            where a.in_activo = true and a.co_contacto = '$co_contacto' and a.tx_movimiento_pago = 'entrada' and a.co_documento = 0";
        $query = $obj->db->query($sql);
        return $query;
    }

                function get_pagos_registrados_pagado_entrada($co_contacto, $co_documento) {

        $obj =& get_instance();


        $sql   = "SELECT a.id, a.nu_referencia, a.ff_pago, a.ff_sistema, b.nb_banco, c.nb_diario, c.nu_cuenta, a.nb_url, a.ca_pago, d.nb_banco as nb_banco_destino, a.tx_descripcion, a.tx_movimiento_pago,
              (select count(id) FROM i00t_pago_verificado where in_activo = true and co_orden_compra_avance_financiero = a.id) as in_verificado
              FROM x00t_orden_compra_avance_financiero as a
              left join i00t_banco as b on b.id = a.co_banco_origen
              left join i00t_cuenta_banco as c on c.id = a.co_cuenta_banco
              left join i00t_banco as d on d.id = c.co_banco
              left join i00t_documentos as e on e.id = a.co_documento
              left join i00t_clientes as f on f.id = a.co_contacto
            where a.in_activo = true and a.co_contacto = '$co_contacto' and a.tx_movimiento_pago = 'entrada' and a.co_documento = $co_documento";
        $query = $obj->db->query($sql);
        return $query;
    }




}
?>