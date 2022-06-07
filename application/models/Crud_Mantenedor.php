<?php

class Crud_Mantenedor extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
        $this->load->helper('security');
    }

    function save_funcionario($data) {
       
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_funcionario', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
     
    }
    function save_usuario($data) {
       
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_usuario', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
     
    }

}
