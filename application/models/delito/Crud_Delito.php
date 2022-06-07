<?php

class Crud_Delito extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
        $this->load->helper('security');
    }

    function buscarfuncionario($run, $identidad) {
        $this->gespol->select('tfun.idta_funcionario AS idfun,
	tfun.td_primernombre AS PrimerNombre,
	tfun.td_segundonombre AS SegundoNombre,
	tfun.td_apellidopaterno AS ApellidoPaterno,
	tfun.td_apellidomaterno AS ApellidoMaterno,
	tfun.td_run AS RunUsuario,
	tfun.td_digito AS DigitoUsuario,
	tfun.td_correo AS Correo,
	tfun.td_fono AS Telefono,
	tfun.td_fechanacimiento AS Fecha_Nacimiento,
	tfun.td_imagen AS Imagen,
	ten.idta_entidad AS identidad,
	ten.td_descripcion AS Entidad,
	ten.td_rut AS Entidad_Rut,
	ten.td_digito AS Digito_Rut_Entidad,
	ten.td_direccion AS Dirección_Entidad,
	ten.td_telefono AS Telefono_Entidad,
	tcom.td_descripcion AS Comuna,
	tp.td_descripcion AS Provincia,
	treg.td_descripcion AS Region,
	tpa.td_descripcion AS País,
	tcont.td_descripcion AS Continente,
	tpla.td_descripcion AS Planeta');
        $this->gespol->from('ta_funcionario tfun');
        $this->gespol->join('ta_grado tgrado', 'tgrado.idta_grado = tfun.idta_grado');
        $this->gespol->join('ta_entidad ten', 'tfun.idta_entidad = ten.idta_entidad');
        $this->gespol->join('ta_comuna tcom', 'ten.idta_comuna = tcom.idta_comuna');
        $this->gespol->join('ta_provincia tp', 'tp.idta_provincia = tcom.idta_provincia');
        $this->gespol->join('ta_region treg', 'treg.idta_region = tp.idta_region');
        $this->gespol->join('ta_pais tpa', 'treg.idta_pais = tpa.`idta_pais`');
        $this->gespol->join('ta_continente tcont ', 'tpa.idta_continente = tcont.idta_continente');
        $this->gespol->join('ta_planeta tpla ', 'tcont.`idta_planeta` = tpla.`idta_planeta`');
        $this->gespol->where('ten.idta_entidad  =', $identidad);
        $this->gespol->where('tfun.idta_funcionario =', $run);
        $this->gespol->where('tfun.td_estado =', 0);
        $query = $this->gespol->get();
        return $query->result_array();
    }

    function save_prodacto($idprod, $idacto) {
        $data = array(
            'idta_procedimiento' => $idprod,
            'idta_acto' => $idacto,
            'td_estado' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->gespol->insert('ta_prodacto', $data);
        $this->gespol->select('LAST_INSERT_ID() as ID');
        $query = $this->gespol->get();
        return $query->row();
    }

    function save_partepol($data) {
        $data = $this->security->xss_clean($data);
        $this->gespol->insert('ta_partepol', $data);
        $this->gespol->select('LAST_INSERT_ID() as ID');
        $query = $this->gespol->get();
        return $query->row();
    }
     function save_delito($data) {
        $data = $this->security->xss_clean($data);
        $this->gespol->insert('ta_partedet', $data);
        $this->gespol->select('LAST_INSERT_ID() as ID');
        $query = $this->gespol->get();
        return $query->row();
    }

    

}
