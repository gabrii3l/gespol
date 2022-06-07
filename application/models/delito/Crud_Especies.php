<?php

class Crud_Especies extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
        $this->load->helper('security');
    }

     function save_especies($data) {

            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_especie', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        
    }
    
    function save_prodespecies($Idespecie,$prodacto,$data) {

        $this->gespol->select('*');
        $this->gespol->from('ta_prodespecie');
        $this->gespol->where('idta_especie =', $Idespecie);
        $this->gespol->where('idta_prodacto =', $prodacto);        
        $query = $this->gespol->get();
        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_prodespecie', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }
    

}
