<?php

class Crud_Persona extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
        $this->load->helper('security');
    }

    function lista($opcion, $id) {


        if ($opcion == "modelo") {
            $this->gespol->select('
            idta_modelo,
            td_descripcion');
            $this->gespol->from('ta_modelo');
            $this->gespol->where('idta_marcavehiculo  =', $id);
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
        }

        if ($opcion == "tipoidentificacion") {
            $this->gespol->select('
            idta_identificacion,
            td_descripcion');
            $this->gespol->from('ta_identificacion');
            $query = $this->gespol->get();
        }
        if ($opcion == "sexo") {
            $this->gespol->select('
            idta_sexo,
            td_descripcion');
            $this->gespol->from('ta_sexo');
            $query = $this->gespol->get();
        }
        if ($opcion == "estudios") {
            $this->gespol->select('
            idta_estudios,
            td_descripcion');
            $this->gespol->from('ta_estudios');
            $query = $this->gespol->get();
        }
        if ($opcion == "estadocivil") {
            $this->gespol->select('
            idta_estadocivil,
            td_descripcion');
            $this->gespol->from('ta_estadocivil');
            $query = $this->gespol->get();
        }

        if ($opcion == "profesion") {
            $this->gespol->select('
            idta_profesion,
            td_descripcion');
            $this->gespol->from('ta_profesion');
            $query = $this->gespol->get();
        }

        if ($opcion == "tipolicencia") {
            $this->gespol->select('
            idta_licencia,
            td_descripcion');
            $this->gespol->from('ta_licencia');
            $query = $this->gespol->get();
        }

        return $query->result_array();
    }

    function busca_persona($identificacion, $cbxidentificacion) {
        $this->gespol->select('*');
        $this->gespol->from('ta_persona');
        $this->gespol->where('idta_identificacion =', $cbxidentificacion); 
        $this->gespol->where('td_run =', $identificacion); 
        $query = $this->gespol->get();
       return $query->row();
    }

    function get_persona($prodacto) {

            $this->gespol->SELECT('pers.td_primernombre as primernombre,
                                pers.td_segundonombre as segundonombre,
                                pers.td_apellidopaterno as apellidopaterno,
                                pers.td_apellidomaterno as apellidomaterno,
                                pers.td_run as run,
                                pers.td_codigo as digito,
                                pers.td_email as correo,
                                pers.td_fechanacimiento as fechanac,
                                pers.td_celular as fono,
                                pers.td_villapoblacion as villapoblacon,
                                pers.td_direccion as direccion,
                                pers.td_latitud as latitud,
                                pers.td_longitud as longitud,
                                calper.td_descripcion as calidadper,
                                cal.td_descripcion as calidad,
                                nacion.td_descripcion as nacionalidad,
                                pais.td_descripcion as pais,
                                reg.td_descripcion as region,
                                prov.td_descripcion as provincia,
                                com.td_descripcion as comuna,
                                tipoper.td_descripcion as tipoper,
                                ident.td_descripcion as indetificacion,
                                ident.idta_identificacion as indetificacionid,
                                sex.td_descripcion as sexo,
                                estud.td_descripcion as estudios,
                                ecivil.td_descripcion as estadocivil,
                                prof.td_descripcion as profesion,
                                licen.td_descripcion as tipolicencia,
                                pers.td_numlicencia as numlicencia');
        $this->gespol->FROM('ta_prodacto pac');
        $this->gespol->JOIN('ta_prodper per', 'pac.idta_prodacto = per. idta_prodacto');
        $this->gespol->JOIN('ta_persona pers ', 'per.idta_persona = pers.idta_persona ');
        $this->gespol->JOIN('ta_calidadper calper ', 'per.idta_calidadper = calper.idta_calidadper');
        $this->gespol->JOIN('ta_calidad cal ', 'cal.idta_calidad = per.idta_calidad ');
        $this->gespol->JOIN('ta_nacionalidad nacion ', 'nacion.idta_nacionalidad = pers.idta_nacionalidad ');
        $this->gespol->JOIN('ta_pais pais ', 'pais.idta_pais = pers.idta_pais ');
        $this->gespol->JOIN('ta_region reg ', ' reg.idta_region = pers.idta_region ');
        $this->gespol->JOIN('ta_provincia prov ', 'prov.idta_provincia = pers.idta_provincia ');
        $this->gespol->JOIN('ta_comuna com ', ' com.idta_comuna = pers.idta_comuna ');
        $this->gespol->JOIN('ta_tipopersona tipoper ', 'tipoper.idta_tipopersona = pers.idta_tipopersona ');
        $this->gespol->JOIN('ta_identificacion ident ', 'ident.idta_identificacion = pers.idta_identificacion ');
        $this->gespol->JOIN('ta_sexo sex', 'sex.idta_sexo = pers.idta_sexo');
        $this->gespol->JOIN('ta_estudios estud', 'estud.idta_estudios = pers.idta_estudios');
        $this->gespol->JOIN('ta_estadocivil ecivil', ' ecivil.idta_estadocivil = pers.idta_estadocivil');
        $this->gespol->JOIN('ta_profesion prof', 'prof.idta_profesion = pers.idta_profesion');
        $this->gespol->JOIN('ta_licencia licen', 'licen.idta_licencia = pers.idta_licencia');
        $this->gespol->WHERE('pac.idta_prodacto =', $prodacto); //you can USE another FIELD
        $query = $this->gespol->get();
        return $query->result_array();
    }
    
    
    
    function get_persona_dueno($prodacto) {

        $this->gespol->SELECT('pers.td_primernombre as primernombre,
                                pers.td_segundonombre as segundonombre,
                                pers.td_apellidopaterno as apellidopaterno,
                                pers.td_apellidomaterno as apellidomaterno,
                                pers.td_run as run,
                                pers.td_codigo as digito,
                                pers.td_email as correo,
                                pers.td_fechanacimiento as fechanac,
                                pers.td_celular as fono,
                                pers.td_villapoblacion as villapoblacon,
                                pers.td_direccion as direccion,
                                pers.td_latitud as latitud,
                                pers.td_longitud as longitud,
                                calper.td_descripcion as calidadper,
                                cal.td_descripcion as calidad,
                                nacion.td_descripcion as nacionalidad,
                                pais.td_descripcion as pais,
                                tipoper.td_descripcion as tipoper,
                                ident.td_descripcion as indetificacion,
                                ident.idta_identificacion as indetificacionid,
                                sex.td_descripcion as sexo,
                                estud.td_descripcion as estudios,
                                ecivil.td_descripcion as estadocivil,
                                prof.td_descripcion as profesion');
        $this->gespol->FROM('ta_prodacto pac');
        $this->gespol->JOIN('ta_prodper per', 'pac.idta_prodacto = per. idta_prodacto');
        $this->gespol->JOIN('ta_persona pers ', 'per.idta_persona = pers.idta_persona ');
        $this->gespol->JOIN('ta_calidadper calper ', 'per.idta_calidadper = calper.idta_calidadper');
        $this->gespol->JOIN('ta_calidad cal ', 'cal.idta_calidad = per.idta_calidad ');
        $this->gespol->JOIN('ta_nacionalidad nacion ', 'nacion.idta_nacionalidad = pers.idta_nacionalidad ');
        $this->gespol->JOIN('ta_pais pais ', 'pais.idta_pais = pers.idta_pais ');
        $this->gespol->JOIN('ta_tipopersona tipoper ', 'tipoper.idta_tipopersona = pers.idta_tipopersona ');
        $this->gespol->JOIN('ta_identificacion ident ', 'ident.idta_identificacion = pers.idta_identificacion ');
        $this->gespol->JOIN('ta_sexo sex', 'sex.idta_sexo = pers.idta_sexo');
        $this->gespol->JOIN('ta_estudios estud', 'estud.idta_estudios = pers.idta_estudios');
        $this->gespol->JOIN('ta_estadocivil ecivil', ' ecivil.idta_estadocivil = pers.idta_estadocivil');
        $this->gespol->JOIN('ta_profesion prof', 'prof.idta_profesion = pers.idta_profesion');
        $this->gespol->WHERE('pac.idta_prodacto =', $prodacto); 
        $this->gespol->WHERE('per.idta_calidadper =2');
        $query = $this->gespol->get();
        return $query->result_array();
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

    function save_prodper($data, $prodacto, $Idusuario) {

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

}
