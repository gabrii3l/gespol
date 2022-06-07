<?php

class Crud extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
    }

    /* Metodo: Active Record
      Autor: Gabriel Loyola Z. */

    function llenartabla($llen)
    {
        $data = array(

            'td_descripcion' => $llen,
            'td_estado' => 0
        );
        $this->gespol->insert('ta_licencia', $data);
        $query = $this->gespol->get();
        return $query->row();
    }

    /*     * ******************************************           SAVE()             ********************************************************* */

    function save_evento($usuario, $cbxevento, $txtfecha, $txthora, $txtobservacion, $txtlatitud, $txtlongitud)
    {
        $data = array(
            'IDTA_USUARIO' => $usuario,
            'IDTA_TIPODOCUMENTO' => 1,
            'IDTA_TIPOEVENTO' => $cbxevento,
            'TD_FECHA' => $txtfecha,
            'TD_HORA' => $txthora,
            'TD_DESCRIPCION' => $txtobservacion,
            'TD_COORDENADA1' => $txtlatitud,
            'TD_COORDENADA2' => $txtlongitud
        );
        $this->gespol->insert('TA_EVENTO', $data);
        $this->gespol->select('LAST_INSERT_ID() as ID');
        $query = $this->gespol->get();
        return $query->row();
    }

    function agregafuncionario($idfun, $evento)
    {
        $this->gespol->select('*');
        $this->gespol->from('ta_funcionario_evento');
        $this->gespol->where('idta_funcionario  =', $idfun);
        $this->gespol->where('idta_evento =', $evento);
        $query = $this->gespol->get();

        if (empty($query->result_array())) {
            $data = array(
                'idta_funcionario' => $idfun,
                'idta_evento' => $evento
            );
            $this->gespol->insert('ta_funcionario_evento', $data);
            $query = $this->gespol->get();
        }
        return $query->result_array();
    }

    /*     * ******************************************           LIST()             ********************************************************* */

    function traefuncionario($identidad)
    {

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
        $this->gespol->where('tfun.td_estado =', 0);
        $query = $this->gespol->get();
        return $query->result_array();
    }

    function eliminafuncionario($idfun, $evento)
    {
        $this->gespol->where('idta_funcionario  =', $idfun);
        $this->gespol->where('idta_evento  =', $evento);
        $this->gespol->delete('ta_funcionario_evento');
        $query = $this->gespol->get();
        return $query->result_array();
    }

    function traefuncionarioevent($evento)
    {

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
	tcargo.td_descripcion AS Cargo,
	tgrado.td_descripcion AS Grado,
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
        $this->gespol->join('ta_funcionario_evento tfunevent', 'tfun.idta_funcionario = tfunevent.`idta_funcionario`');
        $this->gespol->join('ta_cargos tcargo', 'tfun.idta_cargos = tcargo.idta_cargos');
        $this->gespol->join('ta_grado tgrado', 'tgrado.idta_grado = tfun.idta_grado');
        $this->gespol->join('ta_entidad ten', 'tfun.idta_entidad = ten.idta_entidad');
        $this->gespol->join('ta_comuna tcom', 'ten.idta_comuna = tcom.idta_comuna');
        $this->gespol->join('ta_provincia tp', 'tp.idta_provincia = tcom.idta_provincia');
        $this->gespol->join('ta_region treg', 'treg.idta_region = tp.idta_region');
        $this->gespol->join('ta_pais tpa', 'treg.idta_pais = tpa.`idta_pais`');
        $this->gespol->join('ta_continente tcont', 'tpa.idta_continente = tcont.idta_continente');
        $this->gespol->join('ta_planeta tpla', 'tcont.`idta_planeta` = tpla.`idta_planeta`');
        $this->gespol->where('tfunevent.idta_evento=', $evento);
        $query = $this->gespol->get();
        return $query->result_array();
    }

    function consulta_provincia($region)
    {
        $this->gespol->select('idta_provincia,
                               td_descripcion ');
        $this->gespol->from('ta_provincia');
        $this->gespol->where('idta_region =', $region);
        $query = $this->gespol->get();
        return $query->result_array();
    }

    function consulta_comuna($provincia)
    {
        $this->gespol->select('idta_comuna,
                               td_descripcion ');
        $this->gespol->from('ta_comuna');
        $this->gespol->where('idta_provincia =', $provincia);
        $query = $this->gespol->get();
        return $query->result_array();
    }

    function guarda_nuevainfraccion($nuevainfraccion)
    {
        $data = array(
            'td_descripcion' => $nuevainfraccion,
            'td_estado' => 0
        );
        $this->gespol->insert('ta_tipoinfraccion', $data);
        $query = $this->gespol->get();

        return $this->gespol->affected_rows();
    }

    function guarda_nuevaocurrencia($nuevaocurrencia)
    {
        $data = array(
            'td_descripcion' => $nuevaocurrencia,
            'td_estado' => 0
        );
        $this->gespol->insert('ta_lugarocurrencia', $data);
        $query = $this->gespol->get();

        return $this->gespol->affected_rows();
    }







    /*     * ************************************************************************************************************************************** */
    /*     * ************************************************************************************************************************************** */

    /*
      Metodo: Procedimiento Almacenado
      Autor: Gabriel Loyola Z.

      /*     * ******************************************           SAVE()             ********************************************************* */

    function save_evento_sp($usuario, $cbxevento, $txtfecha, $txthora, $txtobservacion, $txtlatitud, $txtlongitud)
    {
        $db = $this->load->database('gespol', TRUE);
        $result = $db->query("CALL SP_GUARDA_EVENTO (" . $usuario . "," . $cbxevento . ",'" . $txtfecha . "','" . $txthora . "','" . $txtobservacion . "','" . $txtlatitud . "','" . $txtlongitud . "');");

        //        $DAT ="CALL SP_GUARDA_EVENTO (" . $usuario . "," . $cbxevento . ",'" . $txtfecha . "','" . $txthora . "','" . $txtobservacion . "','" . $txtlatitud . "','".$txtlongitud."');";
        //       RETURN $DAT;
        return $result->row();
    }

    function agregafuncionario_sp($idfun, $evento)
    {
        $db = $this->load->database('gespol', TRUE);
        $result = $db->query("CALL sp_agrega_funcionario (" . $idfun . "," . $evento . ");");

        //  $data = "CALL sp_agrega_funcionario (" . $idfun . ",".$evento.");";
        return $result->result_array();
    }

    /*     * ******************************************           LIST()             ********************************************************* */

    function traefuncionario_sp($identidad)
    {
        $db = $this->load->database('gespol', TRUE);
        $result = $db->query("CALL sp_consulta_funcionario_entidad (" . $identidad . ");");
        $data = $result->result_array();
        return $data;
    }

    function eliminafuncionario_sp($idfun, $evento)
    {
        $db = $this->load->database('gespol', TRUE);
        $result = $db->query("CALL sp_elimina_funcionario (" . $idfun . "," . $evento . ");");

        //  $data = "CALL sp_agrega_funcionario (" . $idfun . ",".$evento.");";
        return $result->result_array();
    }

    function traefuncionarioevent_sp($evento)
    {
        $db = $this->load->database('gespol', TRUE);
        $result = $db->query("CALL sp_consulta_funevento (" . $evento . ");");
        $data = $result->result_array();
        //$data = "CALL sp_consulta_funevento (".$evento.");";
        return $data;
    }
}
