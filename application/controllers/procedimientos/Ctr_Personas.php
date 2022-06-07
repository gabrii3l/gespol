<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ctr_Personas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index()
    {
        $this->load->model('M_Inicio');
        $datos['TipoPatente'] = $this->M_Inicio->consulta_lista("TipoPatente");
        $datos['MarcaVehiculo'] = $this->M_Inicio->consulta_lista("MarcaVehiculo");
        $datos['calidad'] = $this->M_Inicio->consulta_lista("Calidad");
        $datos['TipoVehiculo'] = $this->M_Inicio->consulta_lista("TipoVehiculo");
        $datos['Color'] = $this->M_Inicio->consulta_lista("Color");
        $datos['Ano'] = $this->M_Inicio->consulta_lista("Ano");
        $datos['region'] = $this->M_Inicio->consulta_lista("region");
        $this->load->view('proyecto/vistas/personas/vista_persona', $datos);
    }

    public function vista_terminar()
    {


        $this->load->model('Crud_Vehiculo');
        $this->load->model('Crud_Persona');
        $this->load->model('Crud_Funcionario');
        $this->load->model('Crud_Infraccion');
        $this->load->model('Crud_Empresa');

        if ($this->session->userdata('idcalidad') == 1) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($this->session->userdata('idprodacto'));
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($this->session->userdata('idprodacto'));
            $datos['persona'] = $this->Crud_Persona->get_persona($this->session->userdata('idprodacto'));
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($this->session->userdata('idprodacto'));
        }

        if ($this->session->userdata('idcalidad') == 2) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($this->session->userdata('idprodacto'));
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($this->session->userdata('idprodacto'));
            $datos['persona'] = $this->Crud_Persona->get_persona($this->session->userdata('idprodacto'));
            $datos['personadueno'] = $this->Crud_Persona->get_persona_dueno($this->session->userdata('idprodacto'));
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($this->session->userdata('idprodacto'));
        }

        if ($this->session->userdata('idcalidad') == 3) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($this->session->userdata('idprodacto'));
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($this->session->userdata('idprodacto'));
            $datos['empresa'] = $this->Crud_Empresa->get_empresa($this->session->userdata('idprodacto'));
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($this->session->userdata('idprodacto'));
        }

        if ($this->session->userdata('idcalidad') == 4) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($this->session->userdata('idprodacto'));
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($this->session->userdata('idprodacto'));
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($this->session->userdata('idprodacto'));
        }


        $this->load->view('proyecto/vistas/vista_terminar', $datos);
    }

    public function calidad()
    {


        $tipoper = "";
        $this->load->model('M_Inicio');
        $this->load->model('Crud_Persona');


        $datos['tipoidentificacion'] = $this->Crud_Persona->lista("tipoidentificacion", $tipoper);
        $datos['sexo'] = $this->Crud_Persona->lista("sexo", $tipoper);
        $datos['estudios'] = $this->Crud_Persona->lista("estudios", $tipoper);
        $datos['estadocivil'] = $this->Crud_Persona->lista("estadocivil", $tipoper);
        $datos['profesion'] = $this->Crud_Persona->lista("profesion", $tipoper);
        $datos['tipolicencia'] = $this->Crud_Persona->lista("tipolicencia", $tipoper);
        $datos['Nacionalidad'] = $this->M_Inicio->consulta_lista("Nacionalidad");
        $calidad = $this->input->post('calidad');
        switch ($calidad) {
            case 1:
                $this->load->view('proyecto/vistas/personas/vista_conductordueno', $datos);
                break;
            case 2:
                $this->load->view('proyecto/vistas/personas/vista_soloconductor', $datos);
                $this->load->view('proyecto/vistas/personas/vista_conductordueno', $datos);
                break;
            case 3:

                $this->load->view('proyecto/vistas/personas/vista_empresa');
                break;
            case 4:
                //                $this->load->view('proyecto/vistas/personas/vista_empadronado', $datos);
                break;
        }
    }

    public function modelo()
    {
        $marca = $this->input->post('marca');
        $this->load->model('Crud_Persona');
        $resultado = $this->Crud_Persona->lista("modelo", $marca);
        if (empty($resultado)) {
        } else {
            $html = "";
            foreach ($resultado as $val) {

                $html .= "<option value='" . $val['idta_modelo'] . "'>" . $val['td_descripcion'] . "</option>";
            }
            echo $html;
        }
    }

    public function tipoinfractor()
    {
        $tipoper = $this->input->post('tipo');
        if (empty($tipoper)) {
        } else {

            $html = "";
            $html .= "<div class = 'col-md-5'>";
            $html .= "<input type ='text' id ='Itxtidentificacion' name =' state-danger' class = 'form-control' onkeyup='this.value = soloNumeros(this.value)'  placeholder = ''>";
            $html .= "</div>";
            $html .= "<div class = 'col-md-3'>";
            $html .= "<button id = 'btnidentificacion' onclick='personaexiste();' type = 'button' class = 'btn btn-inverse waves-effect w-md waves-light'>Buscar</button>";
            $html .= "</div>";
            echo $html;
        }
    }

    public function tipodueno()
    {
        $tipoper = $this->input->post('tipo');
        if (empty($tipoper)) {
        } else {
            $html = "";
            $html .= "<div class = 'col-md-5'>";
            $html .= "<input type ='text' id ='Dtxtidentificacion' name =' state-danger' class = 'form-control' onkeyup='this.value = soloNumeros(this.value)'  placeholder = ''>";
            $html .= "</div>";
            $html .= "<div class = 'col-md-3'>";
            $html .= "<button id = 'cbxnuevainfraccion' type = 'button' class = 'btn btn-inverse waves-effect w-md waves-light'>Buscar</button>";
            $html .= "</div>";
            echo $html;
        }
    }

    public function buscar_funcionario()
    {
        $rutfuncionario = $this->input->post('rutfuncionario');
        if ($this->valida_rut($rutfuncionario) == true) {

            $rut = preg_replace('/[^k0-9]/i', '', $rutfuncionario);
            $dv = substr($rut, -1);
            $numero = substr($rut, 0, strlen($rut) - 1);
            $this->load->model('Crud_Infraccion');
            $resultado = $this->Crud_Infraccion->buscafuncionario($numero, $this->session->userdata('identidad'));
            if (empty($resultado)) {
                echo "No hay datos para este RUN";
            } else {
                foreach ($resultado as $val) {
                    echo "<tr style='text-align: left;' class='identificador' data-valor='" . $val['idfun'] . "' Id='fila" . $val['idfun'] . "'>";
                    echo "<td>" . $val['RunUsuario'] . "" . $val['DigitoUsuario'] . "</td>";
                    echo "<td>" . $val['PrimerNombre'] . " " . $val['SegundoNombre'] . " " . $val['ApellidoPaterno'] . " " . $val['ApellidoMaterno'] . "</td>";
                    echo "<td>" . $val['Correo'] . "</td>";
                    echo "<td>" . $val['Telefono'] . "</td>";
                    echo "<td><button id='btneliminar2' onclick='remueve(" . $val['idfun'] . ")' type='button' value=" . $val['idfun'] . " name='chkSeleccion'>Eliminar</button></td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "RUN no valido";
        }
    }

    public function save_infraccion()
    {

        $fechasuceso = $this->input->post('fechasuceso');
        $horasuceso = $this->input->post('horasuceso');
        $fechacitacion = $this->input->post('fechacitacion');
        $horacitacion = $this->input->post('horacitacion');
        $numboleta = $this->input->post('numboleta');
        $cbxtipoinfraccion = $this->input->post('cbxtipoinfraccion');
        $cbxlugarocurrencia = $this->input->post('cbxlugarocurrencia');
        $cbxregion = $this->input->post('cbxregion');
        $cbxprovincia = $this->input->post('cbxprovincia');
        $cbxcomuna = $this->input->post('cbxcomuna');
        $idnumero = $this->input->post('idnumero');
        $iddepto = $this->input->post('iddepto');
        $idblock = $this->input->post('idblock');
        $txtvilla = $this->input->post('txtvilla');
        $latitudinfraccion = $this->input->post('latitudinfraccion');
        $longitudinfraccion = $this->input->post('longitudinfraccion');
        $autocompletado2 = $this->input->post('autocompletado2');
        $textarea = $this->input->post('textarea');
        $this->load->model('Crud_Infraccion');

        $idprodacto = $this->Crud_Infraccion->save_prodacto($this->session->userdata('idgrupo'), $this->session->userdata('idacto'));
        $this->session->set_userdata("idprodacto", $idprodacto->ID);
        $data = array(
            'idta_prodacto' => $idprodacto->ID,
            'idta_tipoinfraccion' => $cbxtipoinfraccion,
            'idta_lugarocurrencia' => $cbxlugarocurrencia,
            'idta_region' => $cbxregion,
            'idta_provincia' => $cbxprovincia,
            'idta_comuna' => $cbxcomuna,
            'td_fechasuceso' => $fechasuceso,
            'td_horasuceso' => $horasuceso,
            'td_fechacitacion' => $fechacitacion,
            'td_horacitacion' => $horacitacion,
            'td_numboleta' => $numboleta,
            'td_numero' => $idnumero,
            'td_depto' => $iddepto,
            'td_block' => $idblock,
            'td_villapoblacion' => $txtvilla,
            'td_latitud' => $latitudinfraccion,
            'td_longitud' => $longitudinfraccion,
            'td_direccion' => $autocompletado2,
            'td_descripcion' => $textarea,
            'td_estado' => 0
        );
        //
        $resultado = $this->Crud_Infraccion->save_infraccion($data);


        //  echo $idprodacto->ID;

        if (empty($resultado)) {
            echo "Error de ingreso";
        } else {
            echo " <h3 class='m-t-0 header-title'><b>Su número de Infracción es el: " . $resultado->ID . " </h3> </b></br>";
        }
    }

    public function save_infraccion_fun()
    {
        $Idusuario = $this->input->post('Idusuario');
        $this->load->model('Crud_Infraccion');
        $data = array(
            'idta_prodacto' => $this->session->userdata('idprodacto'),
            'idta_funcionario' => $Idusuario,
            'td_estado' => 0
        );
        $prodacto_fun = $this->Crud_Infraccion->save_prodacto_fun($data);
        if (empty($prodacto_fun)) {
            echo "Error de ingreso";
        } else {
            echo "Dato Ingresado";
        }
    }

    public function busca_persona()
    {
        $cbxDocIdentificacion = $this->input->post('cbxDocIdentificacion');
        $Itxtidentificacion = $this->input->post('Itxtidentificacion');

        if ($cbxDocIdentificacion == 1) {
            if ($this->valida_rut($Itxtidentificacion) == true) {
                $rut = preg_replace('/[^k0-9]/i', '', $Itxtidentificacion);
                $dv = substr($rut, -1);
                $numero = substr($rut, 0, strlen($rut) - 1);
                $this->load->model('Crud_Persona');
                $resultado = $this->Crud_Persona->busca_persona($numero, $cbxDocIdentificacion);

                if (empty($resultado)) {
                    echo 0;
                } else {
                    echo json_encode($resultado, true);
                }
            } else {
                echo 1;
            }
        } else {
            $this->load->model('Crud_Persona');
            $resultado = $this->Crud_Persona->busca_persona($Itxtidentificacion, $cbxDocIdentificacion);

            if (empty($resultado)) {
                echo 0;
            } else {
                echo json_encode($resultado, true);
            }
        }
    }

    public function save_persona()
    {

        $calidad = $this->input->post('calidad');
        $calidadtext = $this->input->post('calidadtext');
        /*         * ******************** Datos del Vehiculo ********************* */
        $cbxtipopatente = $this->input->post('cbxtipopatente');
        $txtpatente = $this->input->post('txtpatente');
        $cbxmarca = $this->input->post('cbxmarca');
        $cbxmodelo = $this->input->post('cbxmodelo');
        $cbxtipvehiculo = $this->input->post('cbxtipvehiculo');
        $cbxcolor = $this->input->post('cbxcolor');
        $cbxano = $this->input->post('cbxano');
        /*         * ******************** Datos de Infractor ********************* */
        $cbxDocIdentificacion = $this->input->post('cbxDocIdentificacion');
        $Itxtidentificacion = $this->input->post('Itxtidentificacion');
        $Iprimernombre = $this->input->post('Iprimernombre');
        $Isegundonombre = $this->input->post('Isegundonombre');
        $Iprimerapellido = $this->input->post('Iprimerapellido');
        $Isegundopellido = $this->input->post('Isegundopellido');
        $Ifechanac = $this->input->post('Ifechanac');
        $Icelular = $this->input->post('Icelular');
        $Itelefono = $this->input->post('Itelefono');
        $Iemail = $this->input->post('Iemail');
        $cbxIsexo = $this->input->post('cbxIsexo');
        $cbxInacionalidad = $this->input->post('cbxInacionalidad');
        $cbxIestudios = $this->input->post('cbxIestudios');
        $cbxIestadocivil = $this->input->post('cbxIestadocivil');
        $cbxIprofesion = $this->input->post('cbxIprofesion');
        /*         * ******************** Datos de Licencia ********************* */
        $txtlicenciaconducir = $this->input->post('txtlicenciaconducir');
        $cbxlicencia = $this->input->post('cbxlicencia');
        $cbxcomunalincencia = $this->input->post('cbxcomunalincencia');
        /*         * ******************** Datos de Dueño para opcion solo conductor ********************* */
        $cbxDocDdentificacion = $this->input->post('cbxDocDdentificacion');
        $Dtxtidentificacion = $this->input->post('Dtxtidentificacion');
        $Dprimernombre = $this->input->post('Dprimernombre');
        $Dsegundonombre = $this->input->post('Dsegundonombre');
        $Dprimerapellido = $this->input->post('Dprimerapellido');
        $Dsegundopellido = $this->input->post('Dsegundopellido');
        $Dfechanac = $this->input->post('Dfechanac');
        $Dcelular = $this->input->post('Dcelular');
        $Dtelefono = $this->input->post('Dtelefono');
        $Demail = $this->input->post('Demail');
        $cbxDnacionalidad = $this->input->post('cbxDnacionalidad');
        $cbxDsexo = $this->input->post('cbxDsexo');
        $cbxDestudios = $this->input->post('cbxDestudios');
        $cbxDestadocivil = $this->input->post('cbxDestadocivil');
        $cbxDprofesion = $this->input->post('cbxDprofesion');
        /*         * ******************* Empresa ********************* */
        $txtrunempresa = $this->input->post('txtrunempresa');
        $txtnombreempresa = $this->input->post('txtnombreempresa');
        $txtrazonsocialempresa = $this->input->post('txtrazonsocialempresa');
        $txtgirocomercialempresa = $this->input->post('txtgirocomercialempresa');
        $txttelefonoempresa = $this->input->post('txttelefonoempresa');
        $txtmovilempresa = $this->input->post('txtmovilempresa');
        $txtemailempresa = $this->input->post('txtemailempresa');
        /*         * ******************* Direccion ********************* */
        $cbxregion2 = $this->input->post('cbxregion2');
        $cbxprovincia2 = $this->input->post('cbxprovincia2');
        $cbxcomuna2 = $this->input->post('cbxcomuna2');
        $idnumero = $this->input->post('idnumeroP');
        $iddepto = $this->input->post('iddeptoP');
        $idblock = $this->input->post('idblockP');
        $txtvilla = $this->input->post('txtvillaP');
        $latitudpersona = $this->input->post('latitudpersona');
        $longitudpersona = $this->input->post('longitudpersona');
        $direccionpersona = $this->input->post('direccionpersona');

        if ($this->validapagina($calidad, $calidadtext) > 0) {

            if ($calidad == 1) {
                /* Este código realiza el insert del vehiculo a la ta_vehiculo y a la ta_prodvehiculo */
                if ($this->vadilacamposvehiculo($cbxtipopatente, $txtpatente, $cbxmarca, $cbxmodelo, $cbxtipvehiculo, $cbxcolor, $cbxano) == "") {
                    if ($this->validacamposInfractor($cbxInacionalidad, $cbxregion2, $cbxprovincia2, $cbxcomuna2, $cbxDocIdentificacion, $cbxIsexo, $cbxIestudios, $cbxIestadocivil, $cbxIprofesion, $cbxlicencia, $direccionpersona) == "") {
                        $count = 0;
                        /* Ingreso de Vehiculo */
                        $this->load->model('Crud_Vehiculo');
                        $dataV = array(
                            'idta_tipovehiculo' => $cbxtipvehiculo,
                            'idta_tipopatente' => $cbxtipopatente,
                            'idta_color' => $cbxcolor,
                            'idta_ano' => $cbxano,
                            'idta_marcavehiculo' => $cbxmarca,
                            'idta_modelo' => $cbxmodelo,
                            'idta_serviciovehiculo' => 3,
                            'td_patente' => $txtpatente,
                            'td_numerochassis' => ''
                        );

                        $resultadoV = $this->Crud_Vehiculo->save_vehiculo($dataV, $txtpatente);

                        $data2V = array(
                            'idta_vehiculo' => $resultadoV->ID,
                            'idta_prodacto' => $this->session->userdata('idprodacto'),
                            'td_estado' => 0,
                            'td_empadronado' => 1
                        );
                        $resultado2 = $this->Crud_Vehiculo->save_prodvehiculo($data2V, $resultadoV->ID, $this->session->userdata('idprodacto'));
                        if ($resultado2) {
                            $count = $count + 1;
                        } else {
                            echo "Error Cod-302";
                        }

                        /* Ingreso de Infractor */
                        if ($cbxDocIdentificacion == 1) {
                            if ($Itxtidentificacion == "") {
                                echo "Debe Ingresar un RUN";
                            } else {
                                if ($this->valida_rut($Itxtidentificacion) == true) {
                                    /* Insert tabla persona de Infractor */
                                    $rut = preg_replace('/[^k0-9]/i', '', $Itxtidentificacion);
                                    $dv = substr($rut, -1);
                                    $numero = substr($rut, 0, strlen($rut) - 1);
                                    $this->load->model('Crud_Persona');
                                    $data = array(
                                        'idta_nacionalidad' => $cbxInacionalidad,
                                        'idta_pais' => 1,
                                        'idta_region' => '',
                                        'idta_provincia' => '',
                                        'idta_comuna' => '',
                                        'idta_tipopersona' => 1,
                                        'idta_identificacion' => $cbxDocIdentificacion,
                                        'idta_sexo' => $cbxIsexo,
                                        'idta_estudios' => $cbxIestudios,
                                        'idta_estadocivil' => $cbxIestadocivil,
                                        'idta_profesion' => $cbxIprofesion,
                                        'idta_licencia' => $cbxlicencia,
                                        'idta_comunalin' => $cbxcomunalincencia,
                                        'td_run' => $numero,
                                        'td_codigo' => $dv,
                                        'td_numlicencia' => $txtlicenciaconducir,
                                        'td_primernombre' => $Iprimernombre,
                                        'td_segundonombre' => $Isegundonombre,
                                        'td_apellidopaterno' => $Iprimerapellido,
                                        'td_apellidomaterno' => $Isegundopellido,
                                        'td_fechanacimiento' => $Ifechanac,
                                        'td_celular' => $Icelular,
                                        'td_email' => $Iemail,
                                        'td_direccion' => $direccionpersona,
                                        'td_latitud' => $latitudpersona,
                                        'td_longitud' => $longitudpersona,
                                        'td_depto' => $iddepto,
                                        'td_numero' => $idnumero,
                                        'td_block' => $idblock,
                                        'td_villapoblacion' => $txtvilla
                                    );

                                    $resultado = $this->Crud_Persona->save_persona($data, $numero);

                                    $data2 = array(
                                        'idta_persona' => $resultado->ID,
                                        'idta_prodacto' => $this->session->userdata('idprodacto'),
                                        'idta_calidad' => $calidad,
                                        'idta_calidadper' => 1,
                                        'td_estado' => 0
                                    );
                                    $resultado2 = $this->Crud_Persona->save_prodper($data2, $this->session->userdata('idprodacto'), $resultado->ID);
                                    if (empty($resultado2)) {
                                        echo "Error Cod-331";
                                    } else {
                                        $count = $count + 1;
                                    }
                                } else {
                                    echo "Rut Invalido";
                                }
                            }
                        } else {
                            if ($Itxtidentificacion == "") {
                                echo "Debe Ingresar un N° de Pasaporte";
                            } else {
                                $this->load->model('Crud_Persona');
                                $data = array(
                                    'idta_nacionalidad' => $cbxInacionalidad,
                                    'idta_pais' => 1,
                                    'idta_region' => $cbxregion2,
                                    'idta_provincia' => $cbxprovincia2,
                                    'idta_comuna' => $cbxcomuna2,
                                    'idta_tipopersona' => 1,
                                    'idta_identificacion' => $cbxDocIdentificacion,
                                    'idta_sexo' => $cbxIsexo,
                                    'idta_estudios' => $cbxIestudios,
                                    'idta_estadocivil' => $cbxIestadocivil,
                                    'idta_profesion' => $cbxIprofesion,
                                    'idta_licencia' => $cbxlicencia,
                                    'idta_comunalin' => $cbxcomunalincencia,
                                    'td_run' => $Itxtidentificacion,
                                    'td_codigo' => '',
                                    'td_numlicencia' => $txtlicenciaconducir,
                                    'td_primernombre' => $Iprimernombre,
                                    'td_segundonombre' => $Isegundonombre,
                                    'td_apellidopaterno' => $Iprimerapellido,
                                    'td_apellidomaterno' => $Isegundopellido,
                                    'td_fechanacimiento' => $Ifechanac,
                                    'td_celular' => $Icelular,
                                    'td_email' => $Iemail,
                                    'td_direccion' => $direccionpersona,
                                    'td_latitud' => $latitudpersona,
                                    'td_longitud' => $longitudpersona,
                                    'td_depto' => $iddepto,
                                    'td_numero' => $idnumero,
                                    'td_block' => $idblock,
                                    'td_villapoblacion' => $txtvilla
                                );
                                $resultado = $this->Crud_Persona->save_persona($data, $Itxtidentificacion);
                                if (empty($resultado)) {
                                    echo "Error Cod-318";
                                } else {

                                    $data2 = array(
                                        'idta_persona' => $resultado->ID,
                                        'idta_prodacto' => $this->session->userdata('idprodacto'),
                                        'idta_calidad' => $calidad,
                                        'idta_calidadper' => 1,
                                        'td_estado' => 0
                                    );
                                    $resultado2 = $this->Crud_Persona->save_prodper($data2, $this->session->userdata('idprodacto'), $resultado->ID);
                                    if ($resultado2) {
                                        $count = $count + 1;
                                    } else {
                                        echo "Error Cod-331";
                                    }
                                }
                            }
                        }


                        if ($count == 2) {
                            $this->session->set_userdata("idcalidad", $calidad);


                            $this->session->userdata('idinfraccion');
                            $this->load->model('Crud_Infraccion');
                            $resultado2 = $this->Crud_Infraccion->update_infraccion($this->session->userdata('idinfraccion'), $calidad);



                            echo 1;
                        }
                    } else {
                        echo $this->validacamposInfractor($cbxInacionalidad, $cbxregion2, $cbxprovincia2, $cbxcomuna2, $cbxDocIdentificacion, $cbxIsexo, $cbxIestudios, $cbxIestadocivil, $cbxIprofesion, $cbxlicencia, $direccionpersona);
                    }
                } else {
                    echo $this->vadilacamposvehiculo($cbxtipopatente, $txtpatente, $cbxmarca, $cbxmodelo, $cbxtipvehiculo, $cbxcolor, $cbxano);
                }
            }

            if ($calidad == 2) {
                /* Este código realiza el insert del vehiculo a la ta_vehiculo y a la ta_prodvehiculo */
                if ($this->vadilacamposvehiculo($cbxtipopatente, $txtpatente, $cbxmarca, $cbxmodelo, $cbxtipvehiculo, $cbxcolor, $cbxano) == "") {
                    if ($this->validacamposInfractor($cbxInacionalidad, $cbxregion2, $cbxprovincia2, $cbxcomuna2, $cbxDocIdentificacion, $cbxIsexo, $cbxIestudios, $cbxIestadocivil, $cbxIprofesion, $cbxlicencia, $direccionpersona) == "") {
                        if ($this->validacamposDueno($cbxDnacionalidad, $cbxDocDdentificacion, $cbxDsexo, $cbxDestudios, $cbxDestadocivil, $cbxDprofesion) == "") {
                            $count = 0;
                            /* Dueños de Vehiculo */
                            $this->load->model('Crud_Vehiculo');
                            $dataV = array(
                                'idta_tipovehiculo' => $cbxtipvehiculo,
                                'idta_tipopatente' => $cbxtipopatente,
                                'idta_color' => $cbxcolor,
                                'idta_ano' => $cbxano,
                                'idta_marcavehiculo' => $cbxmarca,
                                'idta_modelo' => $cbxmodelo,
                                'idta_serviciovehiculo' => 3,
                                'td_patente' => $txtpatente,
                                'td_numerochassis' => ''
                            );
                            $resultadoV = $this->Crud_Vehiculo->save_vehiculo($dataV, $txtpatente);
                            $data2V = array(
                                'idta_vehiculo' => $resultadoV->ID,
                                'idta_prodacto' => $this->session->userdata('idprodacto'),
                                'td_estado' => 0,
                                'td_empadronado' => 1
                            );
                            $resultado2 = $this->Crud_Vehiculo->save_prodvehiculo($data2V, $resultadoV->ID, $this->session->userdata('idprodacto'));
                            if ($resultado2) {
                                $count = $count + 1;
                            } else {
                                echo "Error Cod-302";
                            }


                            /* Datos de infractor */
                            if ($cbxDocIdentificacion == 1) {
                                if ($Itxtidentificacion == "") {
                                    echo "Debe Ingresar un RUN";
                                } else {
                                    if ($this->valida_rut($Itxtidentificacion) == true) {
                                        /* Insert tabla persona de Infractor */
                                        $rut = preg_replace('/[^k0-9]/i', '', $Itxtidentificacion);
                                        $dv = substr($rut, -1);
                                        $numero = substr($rut, 0, strlen($rut) - 1);
                                        $this->load->model('Crud_Persona');
                                        $data = array(
                                            'idta_nacionalidad' => $cbxInacionalidad,
                                            'idta_pais' => 1,
                                            'idta_region' => '',
                                            'idta_provincia' => '',
                                            'idta_comuna' => '',
                                            'idta_tipopersona' => 1,
                                            'idta_identificacion' => $cbxDocIdentificacion,
                                            'idta_sexo' => $cbxIsexo,
                                            'idta_estudios' => $cbxIestudios,
                                            'idta_estadocivil' => $cbxIestadocivil,
                                            'idta_profesion' => $cbxIprofesion,
                                            'idta_licencia' => $cbxlicencia,
                                            'idta_comunalin' => $cbxcomunalincencia,
                                            'td_run' => $numero,
                                            'td_codigo' => $dv,
                                            'td_numlicencia' => $txtlicenciaconducir,
                                            'td_primernombre' => $Iprimernombre,
                                            'td_segundonombre' => $Isegundonombre,
                                            'td_apellidopaterno' => $Iprimerapellido,
                                            'td_apellidomaterno' => $Isegundopellido,
                                            'td_fechanacimiento' => $Ifechanac,
                                            'td_celular' => $Icelular,
                                            'td_email' => $Iemail,
                                            'td_direccion' => $direccionpersona,
                                            'td_latitud' => $latitudpersona,
                                            'td_longitud' => $longitudpersona,
                                            'td_depto' => $iddepto,
                                            'td_numero' => $idnumero,
                                            'td_block' => $idblock,
                                            'td_villapoblacion' => $txtvilla
                                        );
                                        $resultado = $this->Crud_Persona->save_persona($data, $numero);

                                        $data2 = array(
                                            'idta_persona' => $resultado->ID,
                                            'idta_prodacto' => $this->session->userdata('idprodacto'),
                                            'idta_calidad' => $calidad,
                                            'idta_calidadper' => 1,
                                            'td_estado' => 0
                                        );
                                        $resultado2 = $this->Crud_Persona->save_prodper($data2, $this->session->userdata('idprodacto'), $resultado->ID);
                                        if (empty($resultado2)) {
                                            echo "Error Cod-331";
                                        } else {
                                            $count = $count + 1;
                                        }
                                    } else {
                                        echo "Rut Invalido";
                                    }
                                }
                            } else {
                                if ($Itxtidentificacion == "") {
                                    echo "Debe Ingresar un N° de Pasaporte";
                                } else {
                                    $this->load->model('Crud_Persona');
                                    $data = array(
                                        'idta_nacionalidad' => $cbxInacionalidad,
                                        'idta_pais' => 1,
                                        'idta_region' => $cbxregion2,
                                        'idta_provincia' => $cbxprovincia2,
                                        'idta_comuna' => $cbxcomuna2,
                                        'idta_tipopersona' => 1,
                                        'idta_identificacion' => $cbxDocIdentificacion,
                                        'idta_sexo' => $cbxIsexo,
                                        'idta_estudios' => $cbxIestudios,
                                        'idta_estadocivil' => $cbxIestadocivil,
                                        'idta_profesion' => $cbxIprofesion,
                                        'idta_licencia' => $cbxlicencia,
                                        'idta_comunalin' => $cbxcomunalincencia,
                                        'td_run' => $Itxtidentificacion,
                                        'td_codigo' => '',
                                        'td_numlicencia' => $txtlicenciaconducir,
                                        'td_primernombre' => $Iprimernombre,
                                        'td_segundonombre' => $Isegundonombre,
                                        'td_apellidopaterno' => $Iprimerapellido,
                                        'td_apellidomaterno' => $Isegundopellido,
                                        'td_fechanacimiento' => $Ifechanac,
                                        'td_celular' => $Icelular,
                                        'td_email' => $Iemail,
                                        'td_direccion' => $direccionpersona,
                                        'td_latitud' => $latitudpersona,
                                        'td_longitud' => $longitudpersona,
                                        'td_depto' => $iddepto,
                                        'td_numero' => $idnumero,
                                        'td_block' => $idblock,
                                        'td_villapoblacion' => $txtvilla
                                    );
                                    $resultado = $this->Crud_Persona->save_persona($data, $Itxtidentificacion);
                                    $data2 = array(
                                        'idta_persona' => $resultado->ID,
                                        'idta_prodacto' => $this->session->userdata('idprodacto'),
                                        'idta_calidad' => $calidad,
                                        'idta_calidadper' => 1,
                                        'td_estado' => 0
                                    );
                                    $resultado2 = $this->Crud_Persona->save_prodper($data2, $this->session->userdata('idprodacto'), $resultado->ID);
                                    if ($resultado2) {
                                        $count = $count + 1;
                                    } else {
                                        echo "Error Cod-331";
                                    }
                                }
                            }

                            /* Datos de Dueño */
                            if ($cbxDocDdentificacion == 1) {
                                if ($Dtxtidentificacion == "") {
                                    echo "Debe Ingresar un RUN";
                                    return false;
                                } else {
                                    if ($this->valida_rut($Dtxtidentificacion) == true) {
                                        /* Insert tabla persona de Infractor */
                                        $rut = preg_replace('/[^k0-9]/i', '', $Dtxtidentificacion);
                                        $dv = substr($rut, -1);
                                        $numero = substr($rut, 0, strlen($rut) - 1);
                                        $this->load->model('Crud_Persona');
                                        $data = array(
                                            'idta_nacionalidad' => $cbxDnacionalidad,
                                            'idta_pais' => 1,
                                            //                                    'idta_region' => $cbxregion2,
                                            //                                    'idta_provincia' => $cbxprovincia2,
                                            //                                    'idta_comuna' => $cbxcomuna2,
                                            'idta_tipopersona' => 1,
                                            'idta_identificacion' => $cbxDocDdentificacion,
                                            'idta_sexo' => $cbxDsexo,
                                            'idta_estudios' => $cbxDestudios,
                                            'idta_estadocivil' => $cbxDestadocivil,
                                            'idta_profesion' => $cbxDprofesion,
                                            //                                    'idta_licencia' => $cbxlicencia,
                                            'td_run' => $numero,
                                            'td_codigo' => $dv,
                                            //                                    'td_numlicencia' => $txtlicenciaconducir,
                                            'td_primernombre' => $Dprimernombre,
                                            'td_segundonombre' => $Dsegundonombre,
                                            'td_apellidopaterno' => $Dprimerapellido,
                                            'td_apellidomaterno' => $Dsegundopellido,
                                            'td_fechanacimiento' => $Dfechanac,
                                            'td_celular' => $Dcelular,
                                            'td_email' => $Demail
                                        );
                                        //                                            'td_direccion' => $direccionpersona,
                                        //                                            'td_latitud' => $latitudpersona,
                                        //                                            'td_longitud' => $longitudpersona,
                                        //                                            'td_depto' => $iddepto,
                                        //                                            'td_numero' => $idnumero,
                                        //                                            'td_block' => $idblock,
                                        //                                            'td_villapoblacion' => $txtvilla);

                                        $resultado = $this->Crud_Persona->save_persona($data, $numero);

                                        $data2 = array(
                                            'idta_persona' => $resultado->ID,
                                            'idta_prodacto' => $this->session->userdata('idprodacto'),
                                            'idta_calidad' => $calidad,
                                            'idta_calidadper' => 2,
                                            'td_estado' => 0
                                        );
                                        $resultado2 = $this->Crud_Persona->save_prodper($data2, $this->session->userdata('idprodacto'), $resultado->ID);
                                        if ($resultado2) {
                                            $count = $count + 1;
                                        } else {
                                            echo "Error Cod-331";
                                        }
                                    } else {
                                        echo "Rut del Dueño es Invalido";
                                    }
                                }
                            } else {
                                if ($Dtxtidentificacion == "") {
                                    echo "Debe Ingresar un N° de Pasaporte";
                                    return false;
                                } else {
                                    $this->load->model('Crud_Persona');

                                    $data = array(
                                        'idta_nacionalidad' => $cbxDnacionalidad,
                                        'idta_pais' => 1,
                                        //                                    'idta_region' => $cbxregion2,
                                        //                                    'idta_provincia' => $cbxprovincia2,
                                        //                                    'idta_comuna' => $cbxcomuna2,
                                        'idta_tipopersona' => 1,
                                        'idta_identificacion' => $cbxDocDdentificacion,
                                        'idta_sexo' => $cbxDsexo,
                                        'idta_estudios' => $cbxDestudios,
                                        'idta_estadocivil' => $cbxDestadocivil,
                                        'idta_profesion' => $cbxDprofesion,
                                        //                                'idta_licencia' => $cbxlicencia,
                                        'td_run' => $Dtxtidentificacion,
                                        'td_codigo' => '',
                                        //                                    'td_numlicencia' => $txtlicenciaconducir,
                                        'td_primernombre' => $Dprimernombre,
                                        'td_segundonombre' => $Dsegundonombre,
                                        'td_apellidopaterno' => $Dprimerapellido,
                                        'td_apellidomaterno' => $Dsegundopellido,
                                        'td_fechanacimiento' => $Dfechanac,
                                        'td_celular' => $Dcelular,
                                        'td_email' => $Demail
                                    );
                                    //                                        'td_direccion' => $direccionpersona,
                                    //                                        'td_latitud' => $latitudpersona,
                                    //                                        'td_longitud' => $longitudpersona,
                                    //                                        'td_depto' => $iddepto,
                                    //                                        'td_numero' => $idnumero,
                                    //                                        'td_block' => $idblock,
                                    //                                        'td_villapoblacion' => $txtvilla);
                                    $resultado = $this->Crud_Persona->save_persona($data, $Dtxtidentificacion);

                                    $data2 = array(
                                        'idta_persona' => $resultado->ID,
                                        'idta_prodacto' => $this->session->userdata('idprodacto'),
                                        'idta_calidad' => $calidad,
                                        'idta_calidadper' => 2,
                                        'td_estado' => 0
                                    );
                                    $resultado2 = $this->Crud_Persona->save_prodper($data2, $this->session->userdata('idprodacto'), $resultado->ID);
                                    if ($resultado2) {
                                        $count = $count + 1;
                                    } else {
                                        echo "Error Cod-331";
                                    }
                                }
                            }

                            if ($count == 3) {
                                $this->session->set_userdata("idcalidad", $calidad);


                                $this->session->userdata('idinfraccion');
                                $this->load->model('Crud_Infraccion');
                                $resultado2 = $this->Crud_Infraccion->update_infraccion($this->session->userdata('idinfraccion'), $calidad);


                                echo 1;
                            }
                        } else {
                            echo $this->validacamposDueno($cbxDnacionalidad, $cbxDocDdentificacion, $cbxDsexo, $cbxDestudios, $cbxDestadocivil, $cbxDprofesion);
                        }
                    } else {
                        echo $this->validacamposInfractor($cbxInacionalidad, $cbxregion2, $cbxprovincia2, $cbxcomuna2, $cbxDocIdentificacion, $cbxIsexo, $cbxIestudios, $cbxIestadocivil, $cbxIprofesion, $cbxlicencia, $direccionpersona);
                    }
                } else {
                    echo $this->vadilacamposvehiculo($cbxtipopatente, $txtpatente, $cbxmarca, $cbxmodelo, $cbxtipvehiculo, $cbxcolor, $cbxano);
                }
            }

            if ($calidad == 3) {
                /* Este código realiza el insert del vehiculo a la ta_vehiculo y a la ta_prodvehiculo */
                if ($this->vadilacamposvehiculo($cbxtipopatente, $txtpatente, $cbxmarca, $cbxmodelo, $cbxtipvehiculo, $cbxcolor, $cbxano) == "") {
                    if ($this->validacamposempresa($txtrunempresa, $txtnombreempresa, $txtrazonsocialempresa, $txtgirocomercialempresa, $txttelefonoempresa, $txtmovilempresa, $txtemailempresa, $cbxregion2, $cbxprovincia2, $cbxcomuna2, $direccionpersona) == "") {
                        $count = 0;
                        /* Datos de Vehiculo */
                        $this->load->model('Crud_Vehiculo');
                        $dataV = array(
                            'idta_tipovehiculo' => $cbxtipvehiculo,
                            'idta_tipopatente' => $cbxtipopatente,
                            'idta_color' => $cbxcolor,
                            'idta_ano' => $cbxano,
                            'idta_marcavehiculo' => $cbxmarca,
                            'idta_modelo' => $cbxmodelo,
                            'idta_serviciovehiculo' => 3,
                            'td_patente' => $txtpatente,
                            'td_numerochassis' => ''
                        );

                        $resultadoV = $this->Crud_Vehiculo->save_vehiculo($dataV, $txtpatente);

                        $data2V = array(
                            'idta_vehiculo' => $resultadoV->ID,
                            'idta_prodacto' => $this->session->userdata('idprodacto'),
                            'td_estado' => 0,
                            'td_empadronado' => 1
                        );
                        $resultado2 = $this->Crud_Vehiculo->save_prodvehiculo($data2V, $resultadoV->ID, $this->session->userdata('idprodacto'));
                        if ($resultado2) {
                            $count = $count + 1;
                        } else {
                            echo "Error Cod-302";
                        }

                        /* Datos de Empresa */
                        $this->load->model('Crud_Empresa');
                        $dataE = array(
                            'idta_region' => $cbxregion2,
                            'idta_provincia' => $cbxprovincia2,
                            'idta_comuna' => $cbxcomuna2,
                            'td_run' => $txtrunempresa,
                            'td_digito' => $cbxmarca,
                            'td_nombrefantasia' => $txtnombreempresa,
                            'td_razonsocial' => $txtrazonsocialempresa,
                            'td_girocomercial' => $txtgirocomercialempresa,
                            'td_telefono' => $txttelefonoempresa,
                            'td_telefonomovil' => $txtmovilempresa,
                            'td_email' => $txtemailempresa,
                            'td_numero' => $idnumero,
                            'td_depto' => $iddepto,
                            'td_numero' => $idnumero,
                            'td_block' => $idblock,
                            'td_latitud' => $latitudpersona,
                            'td_longitud' => $longitudpersona,
                            'td_direccion' => $direccionpersona,
                            'td_estado' => 0
                        );




                        $resultadoE = $this->Crud_Empresa->save_empresa($dataE, $txtrunempresa);

                        $data2E = array(
                            'idta_prodacto' => $this->session->userdata('idprodacto'),
                            'idta_empresa' => $resultadoE->ID,
                            'td_estado' => 0
                        );
                        $resultado2E = $this->Crud_Empresa->save_prodempresa($data2E, $resultadoE->ID, $this->session->userdata('idprodacto'));
                        if ($resultado2E) {
                            $count = $count + 1;
                        } else {
                            echo "Error Cod-302";
                        }

                        if ($count == 2) {
                            $this->session->set_userdata("idcalidad", $calidad);

                            $this->session->userdata('idinfraccion');
                            $this->load->model('Crud_Infraccion');
                            $resultado2 = $this->Crud_Infraccion->update_infraccion($this->session->userdata('idinfraccion'), $calidad);

                            echo 1;
                        }
                    } else {
                        echo $this->validacamposempresa($txtrunempresa, $txtnombreempresa, $txtrazonsocialempresa, $txtgirocomercialempresa, $txttelefonoempresa, $txtmovilempresa, $txtemailempresa, $cbxregion2, $cbxprovincia2, $cbxcomuna2, $direccionpersona);
                    }
                } else {
                    echo $this->vadilacamposvehiculo($cbxtipopatente, $txtpatente, $cbxmarca, $cbxmodelo, $cbxtipvehiculo, $cbxcolor, $cbxano);
                }
            }

            if ($calidad == 4) {
                /* Este código realiza el insert del vehiculo a la ta_vehiculo y a la ta_prodvehiculo */
                if ($this->vadilacamposvehiculo($cbxtipopatente, $txtpatente, $cbxmarca, $cbxmodelo, $cbxtipvehiculo, $cbxcolor, $cbxano) == "") {

                    $this->load->model('Crud_Vehiculo');
                    $dataV = array(
                        'idta_tipovehiculo' => $cbxtipvehiculo,
                        'idta_tipopatente' => $cbxtipopatente,
                        'idta_color' => $cbxcolor,
                        'idta_ano' => $cbxano,
                        'idta_marcavehiculo' => $cbxmarca,
                        'idta_modelo' => $cbxmodelo,
                        'idta_serviciovehiculo' => 3,
                        'td_patente' => $txtpatente,
                        'td_numerochassis' => ''
                    );


                    $resultadoV = $this->Crud_Vehiculo->save_vehiculo($dataV, $txtpatente);


                    $data2V = array(
                        'idta_vehiculo' => $resultadoV->ID,
                        'idta_prodacto' => $this->session->userdata('idprodacto'),
                        'td_estado' => 0,
                        'td_empadronado' => 0
                    );
                    $resultado2 = $this->Crud_Vehiculo->save_prodvehiculo($data2V, $resultadoV->ID, $this->session->userdata('idprodacto'));
                    if ($resultado2) {
                        $this->session->set_userdata("idcalidad", $calidad);

                        $this->session->userdata('idinfraccion');
                        $this->load->model('Crud_Infraccion');
                        $resultado2 = $this->Crud_Infraccion->update_infraccion($this->session->userdata('idinfraccion'), $calidad);

                        echo 1;
                    } else {
                        echo "Error Cod-302";
                    }
                } else {
                    echo $this->vadilacamposvehiculo($cbxtipopatente, $txtpatente, $cbxmarca, $cbxmodelo, $cbxtipvehiculo, $cbxcolor, $cbxano);
                }
            }
        } else {
            echo "Código-1327 Usted está intentando modificar el código fuente de la pagina y eso constituye un delito";
        }
    }

    function vadilacamposvehiculo($cbxtipopatente, $txtpatente, $cbxmarca, $cbxmodelo, $cbxtipvehiculo, $cbxcolor, $cbxano)
    {
        $html = "";

        if ($cbxtipopatente == "") {
            $html .= "- Debe Seleccionar Tipo Patente del Vehículo</br>";
        }
        if ($txtpatente == "") {
            $html .= "- Debe Ingresar N° Patente del Vehículo</br>";
        }
        if ($cbxmarca == "") {
            $html .= "- Debe Seleccionar Marca del Vehículo</br>";
        }
        if ($cbxmodelo == "") {
            $html .= "- Debe Seleccionar Modelo del Vehículo</br>";
        }
        if ($cbxtipvehiculo == "") {
            $html .= "- Debe Seleccionar Tipo de Vehículo</br>";
        }
        if ($cbxcolor == "") {
            $html .= "- Debe Seleccionar Color del Vehículo</br>";
        }
        if ($cbxano == "") {
            $html .= "- Debe Seleccionar Año del Vehículo</br>";
        }


        return $html;
    }

    function validacamposInfractor($cbxInacionalidad, $cbxregion2, $cbxprovincia2, $cbxcomuna2, $cbxDocIdentificacion, $cbxIsexo, $cbxIestudios, $cbxIestadocivil, $cbxIprofesion, $cbxlicencia, $direccionpersona)
    {
        $html = "";

        if ($cbxInacionalidad == "") {
            $html .= "- Debe Seleccionar Nacionalidad del Infractor</br>";
        }
        if ($cbxDocIdentificacion == "") {
            $html .= "- Debe Seleccionar Documento de Identificacion</br>";
        }
        if ($cbxIsexo == "") {
            $html .= "- Debe Seleccionar Sexo del Infractor</br>";
        }
        if ($cbxIestudios == "") {
            $html .= "- Debe Seleccionar Estudios del Infractor </br>";
        }
        if ($cbxIprofesion == "") {
            $html .= "- Debe Seleccionar Profesion del Infractor </br>";
        }
        if ($cbxlicencia == "") {
            $html .= "- Debe Seleccionar Tipo Licencia del Infractor </br>";
        }
        if ($cbxIestadocivil == "") {
            $html .= "- Debe Seleccionar Estado Civil del Infractor</br>";
        }

        if ($cbxregion2 == "") {
            $html .= "- Debe Seleccionar Region del Infractor </br>";
        }
        if ($cbxprovincia2 == "") {
            $html .= "- Debe Seleccionar Provincia del Infractor </br>";
        }
        if ($cbxcomuna2 == "") {
            $html .= "- Debe Seleccionar Comuna del Infractor</br>";
        }

        if ($direccionpersona == "") {
            $html .= "- Debe Ingresar Dirección del Infractor</br>";
        }


        return $html;
    }

    function validacamposDueno($cbxDnacionalidad, $cbxDocDdentificacion, $cbxDsexo, $cbxDestudios, $cbxDestadocivil, $cbxDprofesion)
    {

        $html = "";
        if ($cbxDnacionalidad == "") {
            $html .= "- Debe Seleccionar Nacionalidad del Dueño</br>";
        }
        if ($cbxDocDdentificacion == "") {
            $html .= "- Debe Seleccionar Tipo de Identificacion del Dueño</br>";
        }
        if ($cbxDsexo == "") {
            $html .= "- Debe Seleccionar Tipo de Sexo del Dueño </br>";
        }
        if ($cbxDestudios == "") {
            $html .= "- Debe Seleccionar Tipo de Estudios del Dueño</br>";
        }
        if ($cbxDestadocivil == "") {
            $html .= "- Debe Seleccionar Estado Civil del Dueño</br>";
        }
        if ($cbxDprofesion == "") {
            $html .= "- Debe Seleccionar Profesion del Dueño</br>";
        }



        return $html;
    }

    function validacamposempresa($txtrunempresa, $txtnombreempresa, $txtrazonsocialempresa, $txtgirocomercialempresa, $txttelefonoempresa, $txtmovilempresa, $txtemailempresa, $cbxregion2, $cbxprovincia2, $cbxcomuna2, $direccionpersona)
    {
        $html = "";
        if ($txtrunempresa == "") {
            $html .= "- Debe Ingresar RUT de Empresa</br>";
        }
        if ($txtnombreempresa == "") {
            $html .= "- Debe Ingresar Nombre de Empresa</br>";
        }
        if ($txtrazonsocialempresa == "") {
            $html .= "- Debe Ingresar RUT de Empresa </br>";
        }
        if ($txtgirocomercialempresa == "") {
            $html .= "- Debe Ingresar Giro Comercial de Empresa</br>";
        }
        if ($txtmovilempresa == "") {
            $html .= "- Debe Ingresar Movil de Empresa</br>";
        }
        if ($txtemailempresa == "") {
            $html .= "- Debe Ingresar Email de Empresa</br>";
        }
        if ($cbxregion2 == "") {
            $html .= "- Debe Seleccionar Region de Empresa</br>";
        }
        if ($cbxprovincia2 == "") {
            $html .= "- Debe Seleccionar Provincia de Empresa</br>";
        }
        if ($cbxcomuna2 == "") {
            $html .= "- Debe Seleccionar Comuna de Empresa/br>";
        }
        if ($direccionpersona == "") {
            $html .= "- Debe Ingresar Dirección de Empresa</br>";
        }
        return $html;
    }

    function valida_rut($rut)
    {
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

    function validapagina($calidad, $calidadtext)
    {
        $count = 0;
        if ($calidad == 1 && $calidadtext == "CONDUCTOR Y DUENO DEL VEHICULO") {
            $count = $count + 1;
        }
        if ($calidad == 2 && $calidadtext == "SOLO CONDUCTOR") {
            $count = $count + 1;
        }
        if ($calidad == 3 && $calidadtext == "EMPRESA") {
            $count = $count + 1;
        }
        if ($calidad == 4 && $calidadtext == "EMPADRONADO") {
            $count = $count + 1;
        }
        return $count;
    }
}
