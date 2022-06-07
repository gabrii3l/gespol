<?php

class Crud_Principal extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
    }

    /* Metodo: Active Record
      Autor: Gabriel Loyola Z. */
 function get_location() {
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
        $this->gespol->where('pac.td_estado =', 0); //you can use another field
//         $this->gespol->where('PAC.IDTA_PROCEDIMIENTO  =', $prodacto); //you can use another field

        $query = $this->gespol->get();
        return $query->result_array();
    }
    function save_procedimiento($usuario, $txtfecha, $txthora, $txtobservacion) {
        $time = time();

        $data = array(
            'IDTA_USUARIO' => $usuario,
            'TD_FECHA' => $txtfecha,
            'TD_HORA' => $txthora,
            'TD_DESCRIPCION' => $txtobservacion,
            'TD_ESTADO'=>0
        );
        $this->gespol->set('TD_FECHACREACION', 'NOW()', FALSE);
        $this->gespol->insert('ta_procedimiento', $data);
        $this->gespol->select('LAST_INSERT_ID() as ID');
        $query = $this->gespol->get();
        return $query->row();
    }
    
    function save_acto(){
        
        
    }
    
    

    /* Metodo: Procedimiento Almacenado
      Autor: Gabriel Loyola Z. */

    function save_prod_sp($usuario, $txtfecha, $txthora, $txtobservacion) {
        $db = $this->load->database('gespol', TRUE);
        $result = $db->query("CALL SP_SAVE_PROD (" . $usuario . ",'" . $txtfecha . "','" . $txthora . "','" . $txtobservacion . "');");

//        $DAT ="CALL SP_GUARDA_EVENTO (" . $usuario . "," . $cbxevento . ",'" . $txtfecha . "','" . $txthora . "','" . $txtobservacion . "','" . $txtlatitud . "','".$txtlongitud."');";
//       RETURN $DAT;
        return $result->row();
    }

    function consulta_lista($lista) {
        $remun = $this->load->database('gespol', TRUE);
        $result = $remun->query("CALL sp_consulta_lista ('" . $lista . "'); ");
        $data = $result->result_array();
        return $data;
    }

}
