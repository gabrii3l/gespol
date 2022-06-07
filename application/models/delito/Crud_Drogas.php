<?php

class Crud_Drogas extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
        $this->load->helper('security');
    }

    
 function save_prodroga($Iddroa,$prodacto,$idfuncionacio,$data) {

        $this->gespol->select('*');
        $this->gespol->from('ta_prodrogas');
        $this->gespol->where('idta_drogas =', $Iddroa);
        $this->gespol->where('idta_prodacto =', $prodacto);      
        $this->gespol->where('idta_funcionario =', $idfuncionacio);  
        $query = $this->gespol->get();
        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_prodrogas', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }
     function save_drogas($data) {
        $data = $this->security->xss_clean($data);
        $this->gespol->insert('ta_drogas', $data);
        $this->gespol->select('LAST_INSERT_ID() as ID');
        $query = $this->gespol->get();
        return $query->row();
    }

}