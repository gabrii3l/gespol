<?php

class M_Inicio extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->gespol = $this->load->database('gespol', TRUE);
    }

    function inicio($rut, $clave)
    {
        $this->gespol->select('tus.idta_perfil AS idperfil,
                                tus.td_estado AS estado,
                                tus.idta_usuario AS idusuario,
                                tus.td_usuario AS Usuario,
                                tus.td_password AS Pass,
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
                                tpla.td_descripcion AS Planeta,
                                tfun.td_imagen AS img');
        $this->gespol->from('ta_usuario tus');
        $this->gespol->join('ta_funcionario tfun', 'tus.idta_funcionario = tfun.idta_funcionario');
        $this->gespol->join('ta_grado tgrado', 'tgrado.idta_grado = tfun.idta_grado');
        $this->gespol->join('ta_entidad ten', 'tfun.idta_entidad = ten.idta_entidad');
        $this->gespol->join('ta_comuna tcom', 'ten.idta_comuna = tcom.idta_comuna');
        $this->gespol->join('ta_provincia tp', 'tp.idta_provincia = tcom.idta_provincia');
        $this->gespol->join('ta_region treg', 'treg.idta_region = tp.idta_region');
        $this->gespol->join('ta_pais tpa', 'treg.idta_pais = tpa.idta_pais');
        $this->gespol->join('ta_continente tcont', 'tpa.idta_continente = tcont.idta_continente');
        $this->gespol->join('ta_planeta tpla', ' tcont.`idta_planeta` = tpla.`idta_planeta`');
        $this->gespol->where('tus.td_usuario  =', $rut);
        $this->gespol->where('tus.td_password =', $clave);
        $query = $this->gespol->get();
        // print_r($query);
        return $query->row();
    }

    function get_usuario()
    {
        $this->gespol->select('tus.idta_perfil AS idperfil,
                                tus.td_estado AS estado,
                                tus.idta_usuario AS idusuario,
                                tus.td_usuario AS Usuario,
                                tus.td_password AS Pass,
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
                                tpla.td_descripcion AS Planeta,
                                tfun.td_imagen AS img,
                                tfun.idta_funcionario AS idfuncionario');
        $this->gespol->from('ta_usuario tus');
        $this->gespol->join('ta_funcionario tfun', 'tus.idta_funcionario = tfun.idta_funcionario');
        $this->gespol->join('ta_grado tgrado', 'tgrado.idta_grado = tfun.idta_grado');
        $this->gespol->join('ta_entidad ten', 'tfun.idta_entidad = ten.idta_entidad');
        $this->gespol->join('ta_comuna tcom', 'ten.idta_comuna = tcom.idta_comuna');
        $this->gespol->join('ta_provincia tp', 'tp.idta_provincia = tcom.idta_provincia');
        $this->gespol->join('ta_region treg', 'treg.idta_region = tp.idta_region');
        $this->gespol->join('ta_pais tpa', 'treg.idta_pais = tpa.idta_pais');
        $this->gespol->join('ta_continente tcont', 'tpa.idta_continente = tcont.idta_continente');
        $this->gespol->join('ta_planeta tpla', ' tcont.`idta_planeta` = tpla.`idta_planeta`');
        $query = $this->gespol->get();
        // print_r($query);
        return $query->result_array();
    }

    function consulta_perfil($idperfil)
    {
        $this->gespol->select('tdet.td_descripcion AS menu,
                                    tdet.td_ruta AS ruta,
                                    tpef.td_descripcion AS perfil,
                                    tdet.td_icono AS icono');
        $this->gespol->from('ta_menudetalle tmen');
        $this->gespol->join('ta_menu tdet', 'tmen.idta_menu = tdet.idta_menu');
        $this->gespol->join('ta_perfil tpef', 'tmen.idta_perfil = tpef.idta_perfil');
        $this->gespol->where('tmen.idta_perfil =', $idperfil);
        $this->gespol->where('tmen.td_estado =', 0);
        $query = $this->gespol->get();
        return $query->result_array();
    }

    function consulta_lista($lista)
    {

        /*
          try {



          } catch (Exception $e) {
          echo $e->getMessage();
          }
          return $result;


         */

        if ($lista == "perfil") {
            $this->gespol->select('
            idta_perfil,
            td_descripcion');
            $this->gespol->from('ta_perfil');
            $query = $this->gespol->get();
            return $query->result_array();
        }



        if ($lista == "grado") {
            $this->gespol->select('
            idta_grado,
            td_descripcion');
            $this->gespol->from('ta_grado');
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == "medicion") {
            $this->gespol->select('
            idta_tipomedicion,
            td_descripcion');
            $this->gespol->from('ta_tipomedicion');
            $query = $this->gespol->get();
            return $query->result_array();
        }
        if ($lista == "ocultamiento") {
            $this->gespol->select('
            idta_lugarocultamiento,
            td_descripcion');
            $this->gespol->from('ta_lugarocultamiento');
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == "identificacion") {
            $this->gespol->select('
            idta_identificacion,
            td_descripcion');
            $this->gespol->from('ta_identificacion');
            $query = $this->gespol->get();
            return $query->result_array();
        }
        if ($lista == "sexo") {
            $this->gespol->select('
            idta_sexo,
            td_descripcion');
            $this->gespol->from('ta_sexo');
            $query = $this->gespol->get();
            return $query->result_array();
        }
        if ($lista == "estudios") {
            $this->gespol->select('
            idta_estudios,
            td_descripcion');
            $this->gespol->from('ta_estudios');
            $query = $this->gespol->get();
            return $query->result_array();
        }
        if ($lista == "estadocivil") {
            $this->gespol->select('
            idta_estadocivil,
            td_descripcion');
            $this->gespol->from('ta_estadocivil');
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == "profesion") {
            $this->gespol->select('
            idta_profesion,
            td_descripcion');
            $this->gespol->from('ta_profesion');
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == "tipolicencia") {
            $this->gespol->select('
            idta_licencia,
            td_descripcion');
            $this->gespol->from('ta_licencia');
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'tipoidentificacion') {
            $this->gespol->select('*');
            $this->gespol->from('ta_tipoidentificacion');
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == 'Procedimientos') {
            $this->gespol->select('*');
            $this->gespol->from('ta_acto');
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'tipoinfraccion') {

            $this->gespol->select('*');
            $this->gespol->from('ta_tipoinfraccion');
            $this->gespol->where('td_estado =', 0);
            $this->gespol->order_by("td_descripcion", "ASC");
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == 'lugarocurrencia') {

            $this->gespol->select('*');
            $this->gespol->from('ta_lugarocurrencia');
            $this->gespol->where('td_estado =', 0);
            $this->gespol->order_by("td_descripcion", "ASC");
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'region') {
            $this->gespol->select('*');
            $this->gespol->from('ta_region');
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'provincia') {

            $this->gespol->select('*');
            $this->gespol->from('ta_provincia');
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'comuna') {

            $this->gespol->select('*');
            $this->gespol->from('ta_comuna');
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'Calidad') {

            $this->gespol->select('*');
            $this->gespol->from('ta_calidad');
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == 'TipoPatente') {

            $this->gespol->select('*');
            $this->gespol->from('ta_tipopatente');
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'MarcaVehiculo') {

            $this->gespol->select('*');
            $this->gespol->from('ta_marcavehiculo');
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'TipoVehiculo') {
            $this->gespol->select('*');
            $this->gespol->from('ta_tipovehiculo');
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'Nacionalidad') {
            $this->gespol->select('*');
            $this->gespol->from('ta_nacionalidad');
            $this->gespol->where('td_estado =', 0);
            $this->gespol->order_by("td_descripcion", "ASC");
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == 'Color') {
            $this->gespol->select('*');
            $this->gespol->from('ta_color');
            $this->gespol->where('td_estado =', 0);
            $this->gespol->order_by("td_descripcion", "ASC");
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'Ano') {
            $this->gespol->select('*');
            $this->gespol->from('ta_ano');
            $this->gespol->where('td_estado =', 0);
            $this->gespol->order_by("td_descripcion", "ASC");
            $query = $this->gespol->get();
            return $query->result_array();
        }
        if ($lista == 'adopcion') {
            $this->gespol->select('*');
            $this->gespol->from('ta_lugaradopcion');
            $this->gespol->where('td_estado =', 0);
            $this->gespol->order_by("td_descripcion", "ASC");
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == 'modoperanti') {
            $this->gespol->select('*');
            $this->gespol->from('ta_modoperanti');
            $this->gespol->where('td_estado =', 0);
            $this->gespol->order_by("td_descripcion", "ASC");
            $query = $this->gespol->get();
            return $query->result_array();
        }
        if ($lista == 'delito') {
            $this->gespol->select('*');
            $this->gespol->from('ta_delito');
            $this->gespol->where('td_estado =', 0);
            $this->gespol->order_by("td_descripcion", "ASC");
            $query = $this->gespol->get();
            return $query->result_array();
        }
        if ($lista == 'Tipoper') {
            $this->gespol->select('*');
            $this->gespol->from('ta_tipopersona');
            $this->gespol->where('td_estado =', 0);
            $this->gespol->order_by("td_descripcion", "ASC");
            $query = $this->gespol->get();
            return $query->result_array();
        }
    }

    function cosulta_listaconvarible($lista, $varible)
    {



        if ($lista == "calidadelito") {
            $this->gespol->select('*');
            $this->gespol->from('ta_calidadelito');
            $this->gespol->where('idta_calidadgrupo', $varible);
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == "categoria") {
            $this->gespol->select('*');
            $this->gespol->from('ta_categoria');
            $this->gespol->where('idta_grupocategoria', $varible);
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == "categoria_detalle") {
            $this->gespol->select('*');
            $this->gespol->from('ta_categoriadetalle');
            $this->gespol->where('idta_categoria', $varible);
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == "destino") {
            $this->gespol->select('*');
            $this->gespol->from('ta_destino');
            $this->gespol->where('idta_grupocategoria', $varible);
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == 'Actos_usuario') {
            $this->gespol->select('*');
            $this->gespol->from('ta_acto ac');
            $this->gespol->join('ta_usuarioacto usac', 'ac.idta_acto = usac.idta_acto');
            $this->gespol->where('usac.idta_usuario =', $varible);
            $this->gespol->where('ac.td_estado =', 0);
            $this->gespol->where('usac.td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }


        if ($lista == "CategoriaDetalle") {
            $this->gespol->select('*');
            $this->gespol->from('ta_categoriadetalle');
            $this->gespol->where('idta_categoria', $varible);
            $query = $this->gespol->get();
            return $query->result_array();
        }



        if ($lista == 'delito') {
            $this->gespol->select('*');
            $this->gespol->from('ta_delito');
            $this->gespol->where('td_estado =', 0);
            $this->gespol->where('idta_delito =', $varible);
            $this->gespol->order_by("td_descripcion", "ASC");
            $query = $this->gespol->get();
            return $query->result_array();
        }

        if ($lista == "modelo") {
            $this->gespol->select('
            idta_modelo,
            td_descripcion');
            $this->gespol->from('ta_modelo');
            $this->gespol->where('idta_marcavehiculo  =', $varible);
            $this->gespol->where('td_estado =', 0);
            $query = $this->gespol->get();
            return $query->result_array();
        }
    }

    function inicio_sp($rut, $clave)
    {
        $db = $this->load->database('gespol', TRUE);
        $result = $db->query("CALL sp_consultar_usuario ('" . $rut . "', '" . $clave . "'); ");
        //            echo "CALL sp_consultar_usuario ('" . $rut . "', '" . $clave . "'); ";
        return $result->row();
    }

    function consulta_perfil_sp($idperfil)
    {
        $remun = $this->load->database('gespol', TRUE);
        $result = $remun->query("CALL sp_consultar_perfil (" . $idperfil . "); ");
        $data = $result->result_array();
        return $data;
    }
}
