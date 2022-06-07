<?php

class Crud_Vehiculo_Delito extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
        $this->load->helper('security');
    }

    function busca_vehiculo($txtpatente, $cbxtipopatente) {

        $this->gespol->select('*');
        $this->gespol->from('ta_vehiculo');
        $this->gespol->where('td_patente  =', $txtpatente);
        $this->gespol->where('idta_tipopatente  =', $cbxtipopatente);
        $query = $this->gespol->get();
        return $query->row();
    }

    function update_vehiculo($data, $patente, $tipopatente) {

        $this->gespol->where('td_patente', $patente);
        $this->gespol->where('idta_tipopatente', $tipopatente);
        $this->gespol->update('ta_vehiculo', $data);
        if ($this->gespol->affected_rows() > 0) {
            return $this->busca_vehiculo_crud($patente);
        } else {
            return false;
        }



        $query = $this->gespol->get();
        return $query->row();
    }

    function busca_vehiculo_crud($patente) {
        $this->gespol->select('idta_vehiculo as ID');
        $this->gespol->from('ta_vehiculo');
        $this->gespol->where('td_patente =', $patente);
        $query = $this->gespol->get();
        return $query->row();
    }

    function save_vehiculo($data, $patente) {


        $this->gespol->select('idta_vehiculo as ID');
        $this->gespol->from('ta_vehiculo');
        $this->gespol->where('td_patente =', $patente);
        $query = $this->gespol->get();

        if (empty($query->result_array())) {


            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_vehiculo', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }
    
    function save_prodvehiculo($Idvehiculo,$prodacto,$data) {

        $this->gespol->select('*');
        $this->gespol->from('ta_prodvehiculo');
        $this->gespol->where('idta_vehiculo =', $Idvehiculo);
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
