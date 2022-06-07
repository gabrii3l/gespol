<?php

class Crud_Armas extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
        $this->load->helper('security');
    }

     function save_armas($data) {

            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_armas', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        
    }
    
    function save_prodarma($Idarma,$prodacto,$data) {

        $this->gespol->select('*');
        $this->gespol->from('ta_prodarma');
        $this->gespol->where('idta_armas =', $Idarma);
        $this->gespol->where('idta_prodacto =', $prodacto);        
        $query = $this->gespol->get();
        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_prodarma', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }
    

}
