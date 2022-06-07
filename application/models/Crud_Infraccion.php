<?php

class Crud_Infraccion extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
        $this->load->helper('security');
    }

    function buscafuncionario($run, $identidad) {
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
        $this->gespol->where('tfun.td_run =', $run);
        $this->gespol->where('tfun.td_estado =', 0);
        $query = $this->gespol->get();
        return $query->result_array();
    }

    function get_infraccion($prodacto) {

        $this->gespol->select('reg.td_descripcion AS region,
                                prov.td_descripcion AS provincia,
                                comu.td_descripcion AS comuna,
                                tipinf.td_descripcion AS tipoinfraccion,
                                lugocu.td_descripcion AS lugarocurrencia,
                                inf.td_fechasuceso AS fechasuceso,
                                inf.td_horasuceso AS horasuceso,
                                inf.td_fechacitacion AS fechacitacion,
                                inf.td_horacitacion AS horacitacion,
                                inf.td_numboleta AS numeroboleta,
                                inf.td_villapoblacion AS villapoblacion,
                                inf.td_direccion AS direccion,
                                inf.td_latitud AS latitud,
                                inf.td_longitud AS longitud,
                                inf.idta_infraccion AS id,
                                    inf.td_evidencia1 AS evidencia1,
                                inf.td_evidencia2 AS evidencia2,
                                   pac.idta_prodacto as idacto');
        $this->gespol->from('ta_prodacto pac');
        $this->gespol->join('ta_acto ac', ' pac.idta_acto = ac.idta_acto');
        $this->gespol->join('ta_infraccion inf', ' pac.idta_prodacto = inf.idta_prodacto');
        $this->gespol->join('ta_tipoinfraccion tipinf', ' inf.idta_tipoinfraccion = tipinf.idta_tipoinfraccion');
        $this->gespol->join('ta_lugarocurrencia lugocu', ' inf.idta_lugarocurrencia = lugocu.idta_lugarocurrencia');
        $this->gespol->join('ta_region reg', ' inf.`idta_region` = reg.idta_region');
        $this->gespol->join('ta_provincia prov', ' inf.idta_provincia = prov.idta_provincia');
        $this->gespol->join('ta_comuna comu', ' inf.idta_comuna = comu.idta_comuna');
        $this->gespol->where('pac.idta_prodacto =', $prodacto); //you can use another field
//         $this->gespol->where('PAC.IDTA_PROCEDIMIENTO  =', $prodacto); //you can use another field

        $query = $this->gespol->get();
        return $query->result_array();
    }

    function valida_infraccion($idtaprodacto) {
        $data = [
            'td_estado' => 0,
        ];

        $this->gespol->where('idta_prodacto', $idtaprodacto);
        $this->gespol->update('ta_prodacto', $data);
        if ($this->gespol->affected_rows() > 0) {

            return true;
        } else {
            return false;
        }



        $query = $this->gespol->get();
        return $query->row();
    }

    function get_infraccionID($prodacto, $id) {

        $this->gespol->select('reg.td_descripcion AS region,
                                prov.td_descripcion AS provincia,
                                comu.td_descripcion AS comuna,
                                tipinf.td_descripcion AS tipoinfraccion,
                                lugocu.td_descripcion AS lugarocurrencia,
                                inf.td_fechasuceso AS fechasuceso,
                                inf.td_horasuceso AS horasuceso,
                                inf.td_fechacitacion AS fechacitacion,
                                inf.td_horacitacion AS horacitacion,
                                inf.td_numboleta AS numeroboleta,
                                inf.td_villapoblacion AS villapoblacion,
                                inf.td_direccion AS direccion,
                                inf.td_latitud AS latitud,
                                inf.td_longitud AS longitud,
                                inf.idta_infraccion AS id,
                                inf.td_evidencia1 AS evidencia1,
                                inf.td_evidencia2 AS evidencia2');
        $this->gespol->from('ta_prodacto pac');
        $this->gespol->join('ta_infraccion inf', ' pac.idta_prodacto = inf.idta_prodacto');
        $this->gespol->join('ta_tipoinfraccion tipinf', ' inf.idta_tipoinfraccion = tipinf.idta_tipoinfraccion');
        $this->gespol->join('ta_lugarocurrencia lugocu', ' inf.idta_lugarocurrencia = lugocu.idta_lugarocurrencia');
        $this->gespol->join('ta_region reg', ' inf.`idta_region` = reg.idta_region');
        $this->gespol->join('ta_provincia prov', ' inf.idta_provincia = prov.idta_provincia');
        $this->gespol->join('ta_comuna comu', ' inf.idta_comuna = comu.idta_comuna');
        $this->gespol->where('pac.idta_prodacto =', $prodacto); //you can use another field
        $this->gespol->where('inf.idta_infraccion =', $id);
//         $this->gespol->where('PAC.IDTA_PROCEDIMIENTO  =', $prodacto); //you can use another field

        $query = $this->gespol->get();
        return $query->result_array();
    }

    function get_location($prodacto) {
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
        $this->gespol->where('pac.idta_prodacto =', $prodacto); //you can use another field
//         $this->gespol->where('PAC.IDTA_PROCEDIMIENTO  =', $prodacto); //you can use another field

        $query = $this->gespol->get();
        return $query->result_array();
    }

    function get_img($idinfraccion) {

        $this->gespol->select('td_evidencia1 as evidencia1,
                                td_evidencia2 as evidencia2');
        $this->gespol->from('ta_infraccion');
        $this->gespol->where('IDTA_INFRACCION  =', $idinfraccion); 
        $query = $this->gespol->get();
        return $query->row();
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

    function save_infraccion($data) {
        $data = $this->security->xss_clean($data);
        $this->gespol->insert('ta_infraccion', $data);
        $this->gespol->select('LAST_INSERT_ID() as ID');
        $query = $this->gespol->get();
        return $query->row();
    }

    function update_infraccion($idinfraccion, $idcalidad) {
        $data = array(
            'idta_calidad' => $idcalidad
        );

        $this->gespol->where('idta_infraccion', $idinfraccion);
        $this->gespol->update('ta_infraccion', $data);
    }

    function trae_idcalidad($idinfraccion) {
        $this->gespol->select('idta_calidad as ID');
        $this->gespol->from('ta_infraccion');
        $this->gespol->where('idta_infraccion', $idinfraccion);
        $query = $this->gespol->get();
        return $query->row();
    }

    function save_prodacto_fun($data, $Idusuario, $prodacto) {

        $this->gespol->select('*');
        $this->gespol->from('ta_prodfun');
        $this->gespol->where('idta_funcionario =', $Idusuario);
        $this->gespol->where('idta_prodacto =', $prodacto);
        $query = $this->gespol->get();

        if (empty($query->result_array())) {
            $data = $this->security->xss_clean($data);
            $this->gespol->insert('ta_prodfun', $data);
            //$this->gespol->select('LAST_INSERT_ID() as ID');
            $query = $this->gespol->get();
            return $query->row();
        }
        return $query->row();
    }

    function delete_prodacto_fun($Idusuario, $prodacto) {
        $this->gespol->where('idta_funcionario  =', $Idusuario);
        $this->gespol->where('idta_prodacto  =', $prodacto);
        $this->gespol->delete('ta_prodfun');
        $query = $this->gespol->get();
    }

}
