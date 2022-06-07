<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Persona_Delito extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('getFecha'));
    }

    public function index() {
        $this->load->model('M_Inicio');
        $datos['TipoPatente'] = $this->M_Inicio->consulta_lista("TipoPatente");
        $datos['MarcaVehiculo'] = $this->M_Inicio->consulta_lista("MarcaVehiculo");
        $datos['calidad'] = $this->M_Inicio->consulta_lista("Calidad");
        $datos['region'] = $this->M_Inicio->consulta_lista("region");
        $datos['tipoper'] = $this->M_Inicio->consulta_lista("Tipoper");
        $datos['tipoidentificacion'] = $this->M_Inicio->consulta_lista("tipoidentificacion");
        $datos['identificacion'] = $this->M_Inicio->consulta_lista("identificacion");
        $datos['sexo'] = $this->M_Inicio->consulta_lista("sexo");
        $datos['estudios'] = $this->M_Inicio->consulta_lista("estudios");
        $datos['estadocivil'] = $this->M_Inicio->consulta_lista("estadocivil");
        $datos['profesion'] = $this->M_Inicio->consulta_lista("profesion");
        $datos['tipolicencia'] = $this->M_Inicio->consulta_lista("tipolicencia");
        $datos['Nacionalidad'] = $this->M_Inicio->consulta_lista("Nacionalidad");
        $datos['Calidadelito'] = $this->M_Inicio->cosulta_listaconvarible("calidadelito",1);
        $this->load->view('proyecto/vistas/delitos/vista_personadelito', $datos);
    }

    public function vista_empresa() {
        $this->load->view('proyecto/vistas/delitos/vista_personaempresa');
    }

    public function busca_persona() {
        $numero = "";
        $dv = "";
        $txtnum_identificacion_delito = $this->input->post('txtnum_identificacion_delito');
        $cbxDocDdentificacion_delito = $this->input->post('cbxDocDdentificacion_delito');

        if ($cbxDocDdentificacion_delito == 1) {
            if ($this->valida_rut($txtnum_identificacion_delito) == true) {
                $rut = preg_replace('/[^k0-9]/i', '', $txtnum_identificacion_delito);
                $dv = substr($rut, -1);
                $numero = substr($rut, 0, strlen($rut) - 1);
                $this->load->model('delito/Crud_Persona_Delito');
                $resultado = $this->Crud_Persona_Delito->busca_persona_crud($numero);
                if (empty($resultado)) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        } else {
            $dv = "";
            $numero = $txtnum_identificacion_delito;
            $this->load->model('delito/Crud_Persona_Delito');
            $resultado = $this->Crud_Persona_Delito->busca_persona_crud($numero);
            if (empty($resultado)) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }

    public function btnbusca_persona() {
        $numero = "";
        $dv = "";
        $txtnum_identificacion_delito = $this->input->post('txtnum_identificacion_delito');
        $cbxDocDdentificacion_delito = $this->input->post('cbxDocDdentificacion_delito');

        if ($cbxDocDdentificacion_delito == 1) {
            if ($this->valida_rut($txtnum_identificacion_delito) == true) {
                $rut = preg_replace('/[^k0-9]/i', '', $txtnum_identificacion_delito);
                $dv = substr($rut, -1);
                $numero = substr($rut, 0, strlen($rut) - 1);
                $this->load->model('delito/Crud_Persona_Delito');
                $resultado = $this->Crud_Persona_Delito->btnbusca_persona_crud($numero);
                if (empty($resultado)) {
                    echo 1;
                } else {
                    echo json_encode($resultado, true);
                }
            } else {
                echo 0;
            }
        } else {
            $dv = "";
            $numero = $txtnum_identificacion_delito;
            $this->load->model('delito/Crud_Persona_Delito');
            $resultado = $this->Crud_Persona_Delito->btnbusca_persona_crud($numero);
            if (empty($resultado)) {
                echo 1;
            } else {
                echo json_encode($resultado, true);
            }
        }
    }

    public function btnbusca_empresa() {

        $txtrunempresa_delito = $this->input->post('txtrunempresa_delito');

        $this->load->model('delito/Crud_Persona_Delito');
        $resultado = $this->Crud_Persona_Delito->btnbusca_empresa_crud($txtrunempresa_delito);
        if (empty($resultado)) {
            echo 1;
        } else {
            echo json_encode($resultado, true);
        }
    }

    function valida_rut($rut) {
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11)
            $dvr = 0;
        if ($dvr == 10)
            $dvr = 'K';
        if ($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }

    public function save_personaprod() {

        $opcion = $this->input->post('opcion');
        $cbxtipoper_delito = $this->input->post('cbxtipoper_delito');
        $cbxtipoidentificacion_delito = $this->input->post('cbxtipoidentificacion_delito');
        $cbxcalidadelito_delito = $this->input->post('cbxcalidadelito_delito');


        $txtrunempresa_delito = $this->input->post('txtrunempresa_delito');
        $txtnombreempresa_delito = $this->input->post('txtnombreempresa_delito');
        $txtrazonsocialempresa_delito = $this->input->post('txtrazonsocialempresa_delito');
        $txtgirocomercialempresa_delito = $this->input->post('txtgirocomercialempresa_delito');
        $txttelefonoempresa_delito = $this->input->post('txttelefonoempresa_delito');
        $txtmovilempresa_delito = $this->input->post('txtmovilempresa_delito');
        $txtemailempresa_delito = $this->input->post('txtemailempresa_delito');

        $cbxDocDdentificacion_delito = $this->input->post('cbxDocDdentificacion_delito');
        $txtnum_identificacion_delito = $this->input->post('txtnum_identificacion_delito');
        $primernombre_delito = $this->input->post('primernombre_delito');
        $segundonombre_delito = $this->input->post('segundonombre_delito');
        $primerapellido_delito = $this->input->post('primerapellido_delito');
        $segundoapellido_delito = $this->input->post('segundoapellido_delito');
        $fechanac_delito = $this->input->post('fechanac_delito');
        $celular_delito = $this->input->post('celular_delito');

        $telefono_delito = $this->input->post('telefono_delito');
        $email_delito = $this->input->post('email_delito');
        $cbxnacionalidad_delito = $this->input->post('cbxnacionalidad_delito');
        $cbxsexo_delito = $this->input->post('cbxsexo_delito');
        $cbxestudios_delito = $this->input->post('cbxestudios_delito');
        $cbxestadocivil_delito = $this->input->post('cbxestadocivil_delito');
        $cbxprofesion_delito = $this->input->post('cbxprofesion_delito');
        $cbxregionper_delito = $this->input->post('cbxregionper_delito');
        $cbxprovinciaper_delito = $this->input->post('cbxprovinciaper_delito');
        $cbxcomunaper_delito = $this->input->post('cbxcomunaper_delito');
        $idnumeropersona_delito = $this->input->post('idnumeropersona_delito');
        $iddeptopersona_delito = $this->input->post('iddeptopersona_delito');
        $idblockpersona_delito = $this->input->post('idblockpersona_delito');
        $txtvillapersona_delito = $this->input->post('txtvillapersona_delito');
        $latitudpersona_delito = $this->input->post('latitudpersona_delito');
        $longitudpersona_delito = $this->input->post('longitudpersona_delito');
        $direccionpersona_delito = $this->input->post('direccionpersona_delito');

        if ($cbxDocDdentificacion_delito == 1) {
            $rut = preg_replace('/[^k0-9]/i', '', $txtnum_identificacion_delito);
            $dv = substr($rut, -1);
            $numero = substr($rut, 0, strlen($rut) - 1);
        } else {
            $dv = "";
            $numero = $txtnum_identificacion_delito;
        }

        $data = array(
            'idta_nacionalidad' => $cbxnacionalidad_delito,
            'idta_pais' => 1,
            'idta_region' => $cbxregionper_delito,
            'idta_provincia' => $cbxprovinciaper_delito,
            'idta_comuna' => $cbxcomunaper_delito,
            'idta_tipopersona' => 1,
            'idta_identificacion' => $cbxDocDdentificacion_delito,
            'idta_sexo' => $cbxsexo_delito,
            'idta_estudios' => $cbxestudios_delito,
            'idta_estadocivil' => $cbxestadocivil_delito,
            'idta_profesion' => $cbxprofesion_delito,
            'td_run' => $numero,
            'td_codigo' => $dv,
            'td_primernombre' => $primernombre_delito,
            'td_segundonombre' => $segundonombre_delito,
            'td_apellidopaterno' => $primerapellido_delito,
            'td_apellidomaterno' => $segundoapellido_delito,
            'td_fechanacimiento' => $fechanac_delito,
            'td_celular' => $celular_delito,
            'td_email' => $email_delito,
            'td_direccion' => $direccionpersona_delito,
            'td_latitud' => $latitudpersona_delito,
            'td_longitud' => $longitudpersona_delito,
            'td_depto' => $iddeptopersona_delito,
            'td_numero' => $idnumeropersona_delito,
            'td_block' => $idblockpersona_delito,
            'td_villapoblacion' => $txtvillapersona_delito);

        $this->load->model('delito/Crud_Persona_Delito');

        if ($opcion == 0) {
            
        } else {
            $resultado = $this->Crud_Persona_Delito->save_persona($data, $numero);
        }

        switch ($opcion) {
            case 0:
                $resultado = $this->Crud_Persona_Delito->update_persona($data, $numero, $dv);
                break;
            case 1:
                $resultado = $this->Crud_Persona_Delito->busca_persona_crud($numero);
                break;
            case 2:
                $resultado = $this->Crud_Persona_Delito->save_persona($data, $numero);
                break;
        }
        if (empty($resultado)) {
            $resultado = $this->Crud_Persona_Delito->busca_persona_crud($numero);
        }

        $data2 = array(
            'idta_persona' => $resultado->ID,
            'idta_prodacto' => $this->session->userdata('idprodacto'),
            'idta_tipopersona' => $cbxtipoper_delito,
            'idta_tipoidentificacion' => $cbxtipoidentificacion_delito,
            'idta_calidadelito' => $cbxcalidadelito_delito,
            'td_estado' => 0);

        $resultado2 = $this->Crud_Persona_Delito->save_prodper($resultado->ID, $this->session->userdata('idprodacto'), $data2);
        if (empty($resultado2)) {
            echo "Error Cod-331";
        } else {
            if ($cbxtipoper_delito == 2) {
                $data_empresa = array(
                    'td_run' => $txtrunempresa_delito,
                    'td_nombrefantasia' => $txtnombreempresa_delito,
                    'td_razonsocial' => $txtrazonsocialempresa_delito,
                    'td_girocomercial' => $txtgirocomercialempresa_delito,
                    'td_telefono' => $txttelefonoempresa_delito,
                    'td_estado' => 0);
                $resultado_empresa = $this->Crud_Persona_Delito->save_empresa($txtrunempresa_delito,$data_empresa);

                $prodmep = array(
                    'idta_prodacto' => $this->session->userdata('idprodacto'),
                    'idta_empresa' => $resultado_empresa->ID,
                    'td_estado' => 0);
                $resultado_prodmep = $this->Crud_Persona_Delito->save_prodemp($resultado_empresa->ID, $prodmep);

                if (empty($resultado_prodmep)) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        }
    }

}
