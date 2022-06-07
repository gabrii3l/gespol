<?php

class Crud_Persona_Delito extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
        $this->load->helper('security');
    }

    function save_persona($data, $run) {


        $this->gespol->select('idta_persona as ID');
        $this->gespol->from('ta_persona');
        $this->gespol->where('td_run =', $run);
        $query = $this->gespol->get();

        if (empty($query->result_array())) {


            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_persona', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }

    function update_persona($data, $run, $digito) {

        $this->gespol->where('td_run', $run);
        $this->gespol->where('td_codigo', $digito);
        $this->gespol->update('ta_persona', $data);
        if ($this->gespol->affected_rows() > 0) {
            return $this->busca_persona_crud($run);
        } else {
            return false;
        }



        $query = $this->gespol->get();
        return $query->row();
    }

    function save_prodper($Idusuario,$prodacto,$data) {

        $this->gespol->select('*');
        $this->gespol->from('ta_prodperdelito');
        $this->gespol->where('idta_persona =', $Idusuario);
        $this->gespol->where('idta_prodacto =', $prodacto);        
        $query = $this->gespol->get();
        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_prodperdelito', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }
    
    function save_empresa($rutempresa,$data) {

        $this->gespol->select('idta_empresa as ID');
        $this->gespol->from('ta_empresa');
        $this->gespol->where('td_run =', $rutempresa);       
        $query = $this->gespol->get();
        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_empresa', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }
    function save_prodemp($rutempresa,$data) {

        $this->gespol->select('*');
        $this->gespol->from('ta_prodemp');
        $this->gespol->where('idta_empresa =', $rutempresa);       
        $query = $this->gespol->get();
        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_prodemp', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }

    function save_prodper_2($data, $prodacto, $Idusuario) {

        $this->gespol->select('*');
        $this->gespol->from('ta_prodper');
        $this->gespol->where('idta_persona =', $Idusuario);
        $this->gespol->where('idta_prodacto =', $prodacto);
        $query = $this->gespol->get();

        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_prodper', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }

    function busca_persona_crud($run) {
        $this->gespol->select('idta_persona as ID');
        $this->gespol->from('ta_persona');
        $this->gespol->where('td_run =', $run);
        $query = $this->gespol->get();
        return $query->row();
    }
    function btnbusca_empresa_crud($run) {
        $this->gespol->select('*');
        $this->gespol->from('ta_empresa');
        $this->gespol->where('td_run =', $run);
        $query = $this->gespol->get();
        return $query->row();
    }
    
    
     function btnbusca_persona_crud($run) {
        $this->gespol->select('*');
        $this->gespol->from('ta_persona');
        $this->gespol->where('td_run =', $run);
        $query = $this->gespol->get();
        return $query->row();
    }

}
