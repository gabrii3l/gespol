<?php

class Crud_Empresa extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
          $this->load->helper('security');
    }

    function save_empresa($data, $rut) {

        $this->gespol->select('idta_empresa as ID');
        $this->gespol->from('ta_empresa');
        $this->gespol->where('td_run =', $rut); //you can use another field
        $query = $this->gespol->get();

        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_empresa', $data);
            $this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }


        return $query->row();
        //return $query->row();
        // return $query->row();
//    else {
//      $query = $this->db->update('mytable', $data, array('title'=>$feeds_data[0]));//update with the condition where title exist
//    }
    }

    function save_prodempresa($data, $Idempresa,$prodacto ) {

        $this->gespol->select('*');
        $this->gespol->from('ta_prodemp');
        $this->gespol->where('idta_empresa =', $Idempresa);
        $this->gespol->where('idta_prodacto =', $prodacto);
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
    
    
     function get_empresa($prodacto) {

            $this->gespol->SELECT('emp.td_nombrefantasia AS nombre,
                                    emp.td_razonsocial AS razonsocial,
                                    emp.td_girocomercial AS girocomercial,
                                    emp.td_telefono AS telefono,
                                    emp.td_telefonomovil AS telefonomovil,
                                    emp.td_email AS email,
                                    reg.td_descripcion AS region,
                                    prov.td_descripcion AS provincia,
                                    com.td_descripcion AS comuna,
                                    emp.td_direccion AS direccion');
        $this->gespol->FROM('ta_prodacto pac');
        $this->gespol->JOIN('ta_prodemp em', 'pac.idta_prodacto = em.idta_prodacto');
        $this->gespol->JOIN('ta_empresa emp', 'em.idta_empresa = emp.idta_empresa');
        $this->gespol->JOIN('ta_region reg', 'reg.idta_region = emp.idta_region');
        $this->gespol->JOIN('ta_provincia prov', 'prov.idta_provincia = emp.idta_provincia');
        $this->gespol->JOIN('ta_comuna com', 'com.idta_comuna = emp.idta_comuna ');        
        $this->gespol->WHERE('pac.idta_prodacto =', $prodacto); //you can USE another FIELD
        $query = $this->gespol->get();
        return $query->result_array();
    }
    
    

}
