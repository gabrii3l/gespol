<?php

class Crud_Reportes extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
          $this->load->helper('security');
    }

    function getcantidadinfraccion() {

        $this->gespol->select('COUNT(inf.   IDTA_INFRACCION) AS CONTADOR');
        $this->gespol->from('ta_infraccion inf');
        $this->gespol->join('ta_prodacto pro', 'inf.idta_prodacto = pro.idta_prodacto  ');
        $this->gespol->where('pro.td_estado', 0);
        $query = $this->gespol->get();
        return $query->row();
    }

    function buscageneral($txtprocedimiento, $txtacto, $cbxcalidad) {


        $this->gespol->select('reg.td_descripcion AS region,
                                prov.td_descripcion AS provincia,
                                comu.td_descripcion AS comuna,
                                tipinf.td_descripcion AS tipoinfraccion,
                                lugocu.td_descripcion AS lugarocurrencia,
                                inf.td_fechasuceso AS fechasuceso,
                                inf.td_horasuceso AS horasuceso,
                                inf.td_fechacitacion AS fechacitacion,
                                inf.td_horacitacion AS horacitacion,
                                inf.td_numboleta AS numeroboleta,
                                inf.td_villapoblacion AS villapoblacion,
                                inf.td_direccion AS direccion,
                                inf.td_latitud AS latitud,
                                inf.td_longitud AS longitud,
                                inf.idta_infraccion AS id,
                                inf.td_evidencia1 AS evidencia1,
                                inf.td_evidencia2 AS evidencia2,
                                ac.td_descripcion as acto,
                                pac.idta_prodacto as idacto');
        $this->gespol->from('ta_prodacto pac');
        $this->gespol->join('ta_acto ac', ' pac.idta_acto = ac.idta_acto');
        $this->gespol->join('ta_infraccion inf', ' pac.idta_prodacto = inf.idta_prodacto');
        $this->gespol->join('ta_tipoinfraccion tipinf', ' inf.idta_tipoinfraccion = tipinf.idta_tipoinfraccion');
        $this->gespol->join('ta_lugarocurrencia lugocu', ' inf.idta_lugarocurrencia = lugocu.idta_lugarocurrencia');
        $this->gespol->join('ta_region reg', ' inf.`idta_region` = reg.idta_region');
        $this->gespol->join('ta_provincia prov', ' inf.idta_provincia = prov.idta_provincia');
        $this->gespol->join('ta_comuna comu', ' inf.idta_comuna = comu.idta_comuna');
        if ($txtprocedimiento <> "") {
            $this->gespol->where('pac.idta_procedimiento', $txtprocedimiento);
        }

        if ($cbxcalidad == 2 && $txtacto <> "") {
            $this->gespol->where('inf.idta_infraccion', $txtacto);
        }




        $query = $this->gespol->get();
        return $query->result_array();
    }

    function get_location2($prodacto) {
        $this->gespol->select('inf.idta_infraccion as id,
                                inf.td_direccion AS direccion,
                                inf.td_latitud AS latitud,
                                inf.td_longitud AS longitud');
        $this->gespol->from('ta_prodacto pac');
        $this->gespol->join('ta_infraccion inf', ' pac.idta_prodacto = inf.idta_prodacto');
        $this->gespol->join('ta_tipoinfraccion tipinf', ' inf.idta_tipoinfraccion = tipinf.idta_tipoinfraccion');
        $this->gespol->join('ta_lugarocurrencia lugocu', ' inf.idta_lugarocurrencia = lugocu.idta_lugarocurrencia');
        $this->gespol->join('ta_region reg', ' inf.`idta_region` = reg.idta_region');
        $this->gespol->join('ta_provincia prov', ' inf.idta_provincia = prov.idta_provincia');
        $this->gespol->join('ta_comuna comu', ' inf.idta_comuna = comu.idta_comuna');
        $this->gespol->where('inf.idta_prodacto =', $prodacto); //you can use another field
//         $this->gespol->where('PAC.IDTA_PROCEDIMIENTO  =', $prodacto); //you can use another field

        $query = $this->gespol->get();
        return $query->row();
    }

    function get_infraccion2($prodacto) {

        $this->gespol->select('reg.td_descripcion AS region,
                                prov.td_descripcion AS provincia,
                                comu.td_descripcion AS comuna,
                                tipinf.td_descripcion AS tipoinfraccion,
                                lugocu.td_descripcion AS lugarocurrencia,
                                inf.td_fechasuceso AS fechasuceso,
                                inf.td_horasuceso AS horasuceso,
                                inf.td_fechacitacion AS fechacitacion,
                                inf.td_horacitacion AS horacitacion,
                                inf.td_numboleta AS numeroboleta,
                                inf.td_villapoblacion AS villapoblacion,
                                inf.td_direccion AS direccion,
                                inf.td_latitud AS latitud,
                                inf.td_longitud AS longitud,
                                inf.idta_infraccion AS id,
                                    inf.td_evidencia1 AS evidencia1,
                                inf.td_evidencia2 AS evidencia2,
                                   pac.idta_prodacto as idacto');
        $this->gespol->from('ta_prodacto pac');
        $this->gespol->join('ta_acto ac', ' pac.idta_acto = ac.idta_acto');
        $this->gespol->join('ta_infraccion inf', ' pac.idta_prodacto = inf.idta_prodacto');
        $this->gespol->join('ta_tipoinfraccion tipinf', ' inf.idta_tipoinfraccion = tipinf.idta_tipoinfraccion');
        $this->gespol->join('ta_lugarocurrencia lugocu', ' inf.idta_lugarocurrencia = lugocu.idta_lugarocurrencia');
        $this->gespol->join('ta_region reg', ' inf.`idta_region` = reg.idta_region');
        $this->gespol->join('ta_provincia prov', ' inf.idta_provincia = prov.idta_provincia');
        $this->gespol->join('ta_comuna comu', ' inf.idta_comuna = comu.idta_comuna');
        $this->gespol->where('inf.idta_infraccion =', $prodacto); //you can use another field
//         $this->gespol->where('PAC.IDTA_PROCEDIMIENTO  =', $prodacto); //you can use another field

        $query = $this->gespol->get();
        return $query->result_array();
    }

    function getcantidadvehiculos() {
        $this->gespol->select('COUNT(prod.IDTA_prodacto) AS CONTADOR ');
        $this->gespol->from('ta_prodacto prod');
        $this->gespol->join('ta_prodvehiculo veh', ' prod.idta_prodacto = veh.idta_prodacto');
        $this->gespol->where('prod.idta_acto', 2);
        $query = $this->gespol->get();
        return $query->row();
    }

    function getcantidadvehiculosNacionales() {
        $this->gespol->select('COUNT(prod.IDTA_prodacto) AS CONTADOR ');
        $this->gespol->from('ta_prodacto prod');
        $this->gespol->join('ta_prodvehiculo veh', ' prod.idta_prodacto = veh.idta_prodacto');
        $this->gespol->join('ta_vehiculo ve', ' veh.idta_vehiculo = ve.idta_vehiculo');
        $this->gespol->where('prod.idta_acto', 2);
        $this->gespol->where('ve.idta_tipopatente', 1);
        $query = $this->gespol->get();
        return $query->row();
    }

    function getcantidadvehiculosExtranjeras() {
        $this->gespol->select('COUNT(prod.IDTA_prodacto) AS CONTADOR ');
        $this->gespol->from('ta_prodacto prod');
        $this->gespol->join('ta_prodvehiculo veh', ' prod.idta_prodacto = veh.idta_prodacto');
        $this->gespol->join('ta_vehiculo ve', ' veh.idta_vehiculo = ve.idta_vehiculo');
        $this->gespol->where('prod.idta_acto', 2);
        $this->gespol->where('ve.idta_tipopatente', 2);
        $query = $this->gespol->get();
        return $query->row();
    }

    function getcantidadvehiculosSinPatente() {
        $this->gespol->select('COUNT(prod.IDTA_prodacto) AS CONTADOR ');
        $this->gespol->from('ta_prodacto prod');
        $this->gespol->join('ta_prodvehiculo veh', ' prod.idta_prodacto = veh.idta_prodacto');
        $this->gespol->join('ta_vehiculo ve', ' veh.idta_vehiculo = ve.idta_vehiculo');
        $this->gespol->where('prod.idta_acto', 2);
        $this->gespol->where('ve.idta_tipopatente', 3);
        $query = $this->gespol->get();
        return $query->row();
    }

    function getinfraccion() {



        $this->gespol->select('tip.idta_tipoinfraccion as id,
	tip.td_descripcion AS tipoinfrac');
        // $this->gespol->count('tip.idta_tipoinfraccion');
        $this->gespol->from('ta_infraccion inf');
        $this->gespol->join('ta_tipoinfraccion tip', 'inf.idta_tipoinfraccion = tip.idta_tipoinfraccion');
        $this->gespol->where('tip.idta_tipoinfraccion IN (3,4,7,56)');
        // $this->gespol->where('tip.idta_tipoinfraccion =', 4);

        $this->db->group_by('tip.idta_tipoinfraccion');
        $query = $this->gespol->get();
        return $query->result_array();
    }

    function get_infraccion($prodacto) {

        $this->gespol->select('reg.td_descripcion AS region,
                                prov.td_descripcion AS provincia,
                                comu.td_descripcion AS comuna,
                                tipinf.td_descripcion AS tipoinfraccion,
                                lugocu.td_descripcion AS lugarocurrencia,
                                inf.td_fechasuceso AS fechasuceso,
                                inf.td_horasuceso AS horasuceso,
                                inf.td_fechacitacion AS fechacitacion,
                                inf.td_horacitacion AS horacitacion,
                                inf.td_numboleta AS numeroboleta,
                                inf.td_villapoblacion AS villapoblacion,
                                inf.td_direccion AS direccion,
                                inf.td_latitud AS latitud,
                                inf.td_longitud AS longitud,
                                inf.idta_infraccion AS id');
        $this->gespol->from('ta_prodacto pac');
        $this->gespol->join('ta_infraccion inf', ' pac.idta_prodacto = inf.idta_prodacto');
        $this->gespol->join('ta_tipoinfraccion tipinf', ' inf.idta_tipoinfraccion = tipinf.idta_tipoinfraccion');
        $this->gespol->join('ta_lugarocurrencia lugocu', ' inf.idta_lugarocurrencia = lugocu.idta_lugarocurrencia');
        $this->gespol->join('ta_region reg', ' inf.`idta_region` = reg.idta_region');
        $this->gespol->join('ta_provincia prov', ' inf.idta_provincia = prov.idta_provincia');
        $this->gespol->join('ta_comuna comu', ' inf.idta_comuna = comu.idta_comuna');
        $this->gespol->where('pac.idta_prodacto =', $prodacto); //you can use another field
//         $this->gespol->where('PAC.IDTA_PROCEDIMIENTO  =', $prodacto); //you can use another field

        $query = $this->gespol->get();
        return $query->result_array();
    }

    function get_infraccionID($prodacto, $id) {

        $this->gespol->select('reg.td_descripcion AS region,
                                prov.td_descripcion AS provincia,
                                comu.td_descripcion AS comuna,
                                tipinf.td_descripcion AS tipoinfraccion,
                                lugocu.td_descripcion AS lugarocurrencia,
                                inf.td_fechasuceso AS fechasuceso,
                                inf.td_horasuceso AS horasuceso,
                                inf.td_fechacitacion AS fechacitacion,
                                inf.td_horacitacion AS horacitacion,
                                inf.td_numboleta AS numeroboleta,
                                inf.td_villapoblacion AS villapoblacion,
                                inf.td_direccion AS direccion,
                                inf.td_latitud AS latitud,
                                inf.td_longitud AS longitud,
                                inf.idta_infraccion AS id');
        $this->gespol->from('ta_prodacto pac');
        $this->gespol->join('ta_infraccion inf', ' pac.idta_prodacto = inf.idta_prodacto');
        $this->gespol->join('ta_tipoinfraccion tipinf', ' inf.idta_tipoinfraccion = tipinf.idta_tipoinfraccion');
        $this->gespol->join('ta_lugarocurrencia lugocu', ' inf.idta_lugarocurrencia = lugocu.idta_lugarocurrencia');
        $this->gespol->join('ta_region reg', ' inf.`idta_region` = reg.idta_region');
        $this->gespol->join('ta_provincia prov', ' inf.idta_provincia = prov.idta_provincia');
        $this->gespol->join('ta_comuna comu', ' inf.idta_comuna = comu.idta_comuna');
        $this->gespol->where('pac.idta_prodacto =', $prodacto); //you can use another field
        $this->gespol->where('inf.idta_infraccion =', $id);
//         $this->gespol->where('PAC.IDTA_PROCEDIMIENTO  =', $prodacto); //you can use another field

        $query = $this->gespol->get();
        return $query->result_array();
    }

    function get_location($prodacto) {
        $this->gespol->select('inf.idta_infraccion as id,
                                inf.td_direccion AS direccion,
                                inf.td_latitud AS latitud,
                                inf.td_longitud AS longitud');
        $this->gespol->from('ta_prodacto pac');
        $this->gespol->join('ta_infraccion inf', ' pac.idta_prodacto = inf.idta_prodacto');
        $this->gespol->join('ta_tipoinfraccion tipinf', ' inf.idta_tipoinfraccion = tipinf.idta_tipoinfraccion');
        $this->gespol->join('ta_lugarocurrencia lugocu', ' inf.idta_lugarocurrencia = lugocu.idta_lugarocurrencia');
        $this->gespol->join('ta_region reg', ' inf.`idta_region` = reg.idta_region');
        $this->gespol->join('ta_provincia prov', ' inf.idta_provincia = prov.idta_provincia');
        $this->gespol->join('ta_comuna comu', ' inf.idta_comuna = comu.idta_comuna');
        $this->gespol->where('pac.idta_prodacto =', $prodacto); //you can use another field
//         $this->gespol->where('PAC.IDTA_PROCEDIMIENTO  =', $prodacto); //you can use another field

        $query = $this->gespol->get();
        return $query->result_array();
    }

    function get_img($idinfraccion) {

        $this->gespol->select('td_evidencia1 as evidencia1,
                                td_evidencia2 as evidencia2');
        $this->gespol->from('ta_infraccion');
        $this->gespol->where('IDTA_INFRACCION  =', $idinfraccion); //you can use another field
//         $this->gespol->where('PAC.IDTA_PROCEDIMIENTO  =', $prodacto); //you can use another field

        $query = $this->gespol->get();
        return $query->row();
    }

    function save_prodacto($idprod, $idacto) {
        $data = array(
            'idta_procedimiento' => $idprod,
            'idta_acto' => $idacto,
            'td_estado' => 0
        );
         $data = $this->security->xss_clean($data);
        $this->gespol->insert('ta_prodacto', $data);
        $this->gespol->select('LAST_INSERT_ID() as ID');
        $query = $this->gespol->get();
        return $query->row();
    }

    function save_infraccion($data) {
         $data = $this->security->xss_clean($data);
        $this->gespol->insert('ta_infraccion', $data);
        $this->gespol->select('LAST_INSERT_ID() as ID');
        $query = $this->gespol->get();
        return $query->row();
    }

    function save_prodacto_fun($data, $Idusuario, $prodacto) {

        $this->gespol->select('*');
        $this->gespol->from('ta_prodfun');
        $this->gespol->where('idta_funcionario =', $Idusuario);
        $this->gespol->where('idta_prodacto =', $prodacto);
        $query = $this->gespol->get();

        if (empty($query->result_array())) {
             $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_prodfun', $data);
            //$this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }

    function delete_prodacto_fun($Idusuario, $prodacto) {
        $this->gespol->where('idta_funcionario  =', $Idusuario);
        $this->gespol->where('idta_prodacto  =', $prodacto);
        $this->gespol->delete('ta_prodfun');
        $query = $this->gespol->get();
    }

}
