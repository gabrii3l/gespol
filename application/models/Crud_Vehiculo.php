<?php

class Crud_Vehiculo extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
        $this->load->helper('security');
    }

    function get_vehiculo($prodacto) {

        $this->gespol->SELECT('tipaten.td_descripcion as tipopatente,
                                vehi.td_patente as patente,
                                marcaveh.td_descripcion as marcavehiculo,
                                model.td_descripcion as modelo,
                                tipveh.td_descripcion as tipovehiculo,
                                col.td_descripcion as color,
                                an.td_descripcion as ano,
                                serveh.td_descripcion as serviciovehiculo');
        $this->gespol->FROM('ta_prodacto pac');
        $this->gespol->JOIN('ta_prodvehiculo veh', 'pac.idta_prodacto= veh.idta_prodacto');
        $this->gespol->JOIN('ta_vehiculo vehi', 'veh.idta_vehiculo = vehi.idta_vehiculo');
        $this->gespol->JOIN('ta_tipovehiculo tipveh', 'tipveh.idta_tipovehiculo = vehi.idta_tipovehiculo');
        $this->gespol->JOIN('ta_tipopatente tipaten', 'tipaten.idta_tipopatente = vehi.idta_tipopatente');
        $this->gespol->JOIN('ta_color col', 'col.idta_color = vehi.idta_color');
        $this->gespol->JOIN('ta_ano an', 'an.idta_ano = vehi.idta_ano');
        $this->gespol->JOIN('ta_marcavehiculo marcaveh ', 'marcaveh.idta_marcavehiculo = vehi.idta_marcavehiculo');
        $this->gespol->JOIN('ta_modelo model', 'model.idta_modelo = vehi.idta_modelo');
        $this->gespol->JOIN('ta_serviciovehiculo serveh ', 'serveh.idta_serviciovehiculo = vehi.idta_serviciovehiculo');
        $this->gespol->WHERE('pac.idta_prodacto =', $prodacto); //you can USE another FIELD
        $query = $this->gespol->get();
        return $query->result_array();
    }

    function busca_vehiculo($txtpatente,$cbxtipopatente, $cbxcalidad) {


        $this->gespol->select('*');
        $this->gespol->from('ta_prodacto p');
        $this->gespol->join('ta_prodvehiculo v', 'p.idta_prodacto =v.idta_prodacto');
        $this->gespol->join('ta_vehiculo ve', 'v.idta_vehiculo = ve.idta_vehiculo');
        $this->gespol->join('ta_prodper pper', 'pper.idta_prodacto  = p.idta_prodacto');
        $this->gespol->join('ta_persona per', 'pper.idta_persona = per.idta_persona');
        $this->gespol->where('ve.td_patente  =', $txtpatente); 
        $this->gespol->where('ve.idta_tipopatente  =', $cbxtipopatente); 
         $this->gespol->where('pper.idta_calidad  =', $cbxcalidad);
        $query = $this->gespol->get();
        return $query->row();
    }

    function save_vehiculo($data, $patente) {

        $this->gespol->select('idta_vehiculo as ID');
        $this->gespol->from('ta_vehiculo');
        $this->gespol->where('td_patente =', $patente); //you can use another field   
        $this->gespol->limit(1);
        $query = $this->gespol->get();

        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_vehiculo', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
        }

        return $query->row();

        //return $query->row();
        // return $query->row();
//    else {
//      $query = $this->db->update('mytable', $data, array('title'=>$feeds_data[0]));//update with the condition where title exist
//    }
    }

    function save_prodvehiculo($data, $idtavehiculo, $prodacto) {


        $this->gespol->select('*');
        $this->gespol->from('ta_prodvehiculo');
        $this->gespol->where('idta_vehiculo =', $idtavehiculo);
        $this->gespol->where('idta_prodacto =', $prodacto);
        $query = $this->gespol->get();

        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_prodvehiculo', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }

}
