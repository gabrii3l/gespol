<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Evento extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index()
    {

        $this->load->view('login');
    }

    public function inicio()
    {
        $datos['sesion'] = $this->session->userdata();
        $datos['fecha_actual'] = fecha_actual();
        $datos['opcion'] = "form";

        $this->load->view('proyecto/header', $datos);
        $this->load->view('proyecto/inicio');
        $this->load->view('proyecto/footer');
    }

    /* Todo para el módulo de ingreso de Datos Principales de procedimiento policial */ //////

    public function ingresar_conserjeria()
    {
        $dat = $this->session->userdata();
        if ($dat["idperfil"] == null) {
            redirect('Inicio');
            return false;
        }
        $this->load->model('M_Inicio');
        $datos['categoria'] = $this->M_Inicio->cosulta_listaconvarible("categoria", 1);
        $datos['calidadelito'] = $this->M_Inicio->cosulta_listaconvarible("calidadelito", 2);
        $datos['destino'] = $this->M_Inicio->cosulta_listaconvarible("destino", 1);
        $datos['sesion'] = $this->session->userdata();
        $datos['fecha_actual'] = fecha_actual();
        $datos['opcion'] = "form";
        $this->load->view('proyecto/header', $datos);
        $this->load->view('proyecto/vistas/conserjeria/conserje', $datos);
        $this->load->view('proyecto/footer');
    }



    public function ingresar()
    {
        $dat = $this->session->userdata();
        if ($dat["idperfil"] == null) {
            redirect('Inicio');
            return false;
        }
        $this->load->model('Crud_Reportes');
        $resultado = $this->Crud_Reportes->getcantidadinfraccion();
        $datos['cantinfraccion'] = $resultado;


        $this->load->model('M_Inicio');
        $tipoevento = $this->M_Inicio->consulta_lista("Procedimientos");

        $datos['tipoevento'] = $tipoevento;
        $datos['sesion'] = $this->session->userdata();
        $datos['fecha_actual'] = fecha_actual();
        $datos['opcion'] = "form";

        $this->load->view('proyecto/header', $datos);
        $this->load->view('proyecto/evento/ingresar');
        $this->load->view('proyecto/footer');
    }

    public function mantenedor_usuario()
    {

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
        $datos['Calidadelito'] = $this->M_Inicio->cosulta_listaconvarible("calidadelito", 1);
        $datos['delito'] = $this->M_Inicio->consulta_lista("delito");
        $datos['grado'] = $this->M_Inicio->consulta_lista("grado");
        $datos['perfil'] = $this->M_Inicio->consulta_lista("perfil");
        $datos['get_usuario'] = $this->M_Inicio->get_usuario();

        $datos['sesion'] = $this->session->userdata();
        $datos['fecha_actual'] = fecha_actual();
        $datos['opcion'] = "form";

        $this->load->view('proyecto/header', $datos);
        $this->load->view('proyecto/vistas/mantenedores/mantenedor_usuario', $datos);
        $this->load->view('proyecto/footer');
    }

    public function ingresar_save()
    {

        $cbxevento = $this->input->post('cbxevento');
        $txtfecha = $this->input->post('txtfecha');
        $txthora = $this->input->post('txthora');
        $txtobservacion = $this->input->post('txtobservacion');
        $txtlatitud = $this->input->post('txtlatitud');
        $txtlongitud = $this->input->post('txtlongitud');


        $this->session->userdata('identidad');


        $this->load->model('crud');
        $resultado = $this->crud->save_evento($this->session->userdata('Idusuario'), $cbxevento, $txtfecha, $txthora, $txtobservacion, $txtlatitud, $txtlongitud);


        if (empty($resultado)) {
            echo "No guardó nada";
        } else {
            $this->session->set_userdata("idevento", $resultado->ID);
            echo $resultado->ID;
        }
    }

    /* Todo para el módulo de ingreso de funcionarios a procedimiento policial */ //////

    public function traefuncionarios()
    {
        $this->load->model('crud');
        $resultado = $this->crud->traefuncionario($this->session->userdata('identidad'));
        if (empty($resultado)) {
            echo "No guardó nada";
        } else {

            $prods = $this->input->post('prod');
            foreach ($resultado as $val) {
                echo "<tr style='text-align: left;' class='identificador' data-valor='" . $val['idfun'] . "' Id='row2'>";
                echo "<td class='numero'><input type='checkbox' value=" . $val['idfun'] . " name='chkSeleccion'></input></td>";
                //echo "<td>".$prods."</td>";                                 
                echo "<td>" . $val['RunUsuario'] . "-" . $val['DigitoUsuario'] . "</td>";
                echo "<td>" . $val['PrimerNombre'] . " " . $val['SegundoNombre'] . " " . $val['ApellidoPaterno'] . " " . $val['ApellidoMaterno'] . "</td>";
                echo "<td>" . $val['Cargo'] . "</td>";
                echo "<td>" . $val['Grado'] . "</td>";
                echo "<td>" . $val['Comuna'] . "</td>";
                echo "</tr>";
            }
        }
    }

    public function agrega_fun()
    {
        $fun = $this->input->post('fun');
        //$evento = $this->input->post('idevent');
        //$evento=$this->session->flashdata('idevento');        

        $evento = $this->session->userdata("idevento");




        $this->load->model('crud');
        $agrega = $this->crud->agregafuncionario($fun, $evento);
        // var_dump($resultado2);
        //return false;
    }

    public function elimina_fun()
    {
        $fun = $this->input->post('fun');
        // $evento = $this->input->post('idevent');

        $evento = $this->session->userdata("idevento");
        $this->load->model('crud');
        $agrega = $this->crud->eliminafuncionario($fun, $evento);
        // var_dump($resultado2);
        //return false;
    }

    public function trae_funeven()
    {
        //  var_dump("llega");
        // return false;    
        $this->load->model('crud');
        //        $event = $this->input->post('idevent');
        $event = $this->session->userdata("idevento");
        $listafun = $this->crud->traefuncionarioevent($event);
        //var_dump($listafun);
        //return false;  

        if ($listafun) {
            foreach ($listafun as $val) {
                echo "<tr>";
                //  echo "<td class='numero'><input id='myCheck' type='checkbox' value=".$val['idfun']." name='chkSeleccion'></input></td>";                                  
                echo "<td>" . $val['RunUsuario'] . "-" . $val['DigitoUsuario'] . "</td>";
                echo "<td>" . $val['PrimerNombre'] . " " . $val['SegundoNombre'] . " " . $val['ApellidoPaterno'] . " " . $val['ApellidoMaterno'] . "</td>";
                echo "<td>" . $val['Cargo'] . "</td>";
                echo "<td>" . $val['Grado'] . "</td>";
                echo "<td>" . $val['Comuna'] . "</td>";
                echo "</tr>";
            }
        }
    }

    public function trae_funeven2()
    {
        //  var_dump("llega");
        // return false;    
        $this->load->model('crud');
        //$event = $this->input->post('idevent');   
        $event = $_POST['idevent'];

        $resultado2 = $this->crud->traefuncionarioevent($event);
    }

    /* Todo para el módulo de ingreso de personas a procedimiento policial */ //////

    public function vista_personas()
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

    public function vista_infraccion()
    {

        $this->load->model('M_Inicio');
        $datos['tipoinfraccion'] = $this->M_Inicio->consulta_lista("tipoinfraccion");
        $datos['lugarocurrencia'] = $this->M_Inicio->consulta_lista("lugarocurrencia");
        $datos['region'] = $this->M_Inicio->consulta_lista("region");
        $this->load->view('proyecto/evento/vista_infraccion', $datos);
    }

    public function vista_vehiculos()
    {
        $this->load->model('m_inicio');
        $datos['patente'] = $this->m_inicio->consulta_lista("Patente");
        $this->load->view('proyecto/vistas/vista_vehiculo', $datos);
    }

    public function vista_especies()
    {
        $this->load->view('proyecto/vistas/vista_especies');
    }

    public function vista_armas()
    {
        $this->load->view('proyecto/vistas/vistas_armas');
    }

    public function vista_drogas()
    {
        $this->load->view('proyecto/vistas/vista_drogas');
    }

    public function vista_perito()
    {
        $this->load->view('proyecto/vistas/vista_perito');
    }

    public function vista_funcionarios()
    {
        $this->load->model('crud');
        $resultado = $this->crud->traefuncionario($this->session->userdata('identidad'));
        if (empty($resultado)) {
            echo "No guardó nada";
        } else {
            $datos['sesion'] = $this->session->userdata();
            $datos['funcionarios'] = $resultado;
            $this->load->view('proyecto/vistas/vista_funcionario', $datos);
        }
    }

    public function vista_delito()
    {
        $this->load->model('M_Inicio');
        $datos['tipoinfraccion'] = $this->M_Inicio->consulta_lista("tipoinfraccion");
        $datos['lugarocurrencia'] = $this->M_Inicio->consulta_lista("lugarocurrencia");
        $datos['region'] = $this->M_Inicio->consulta_lista("region");
        $this->load->view('proyecto/vistas/vista_delito', $datos);
    }

    public function vista_terminar()
    {
        $this->load->view('proyecto/vistas/vista_terminar');
    }


    /*     * *********************** llena listas infraccion ******************************* */

    public function traeprovincia()
    {
        $idregion = $this->input->post('idregion');
        $this->load->model('crud');
        $resultado = $this->crud->consulta_provincia($idregion);

        if (empty($resultado)) {
            echo "No guardó nada";
        } else {
            $html = "<option value='' selected>Seleccionar Provincia</option>";
            foreach ($resultado as $val) {

                $html .= "<option value='" . $val['idta_provincia'] . "'>" . $val['td_descripcion'] . "</option>";
            }
            echo $html;
        }
    }

    public function traecomuna()
    {
        $idprovincia = $this->input->post('idprovincia');
        $this->load->model('Crud');
        $resultado = $this->Crud->consulta_comuna($idprovincia);

        if (empty($resultado)) {
            echo "No guardó nada";
        } else {
            $html = "<option value='' selected>Seleccionar Comuna</option>";
            foreach ($resultado as $val) {

                $html .= "<option value='" . $val['idta_comuna'] . "'>" . $val['td_descripcion'] . "</option>";
            }

            echo $html;
        }
    }

    public function guardanuevainfraccion()
    {

        $nuevainfraccion = $this->input->post('nuevainfraccion');

        $cadena_devuelta = strtoupper($nuevainfraccion);
        $this->load->model('Crud');
        $resultado = $this->Crud->guarda_nuevainfraccion($cadena_devuelta);


        if (empty($resultado)) {
            echo "<option value='' selected>Seleccionar Tipo Infracción</option>";
        } else {
            $this->load->model('M_Inicio');
            $resultado2 = $this->M_Inicio->consulta_lista("tipoinfraccion");
            $html = "<option value='' selected>Seleccionar Tipo Infracción</option>";
            foreach ($resultado2 as $val) {

                $html .= "<option value='" . $val['idta_tipoinfraccion'] . "'>" . $val['td_descripcion'] . "</option>";
            }
            $html .= "<option value='0'>OTRO TIPO DE INFRACCIÓN</option>";
            echo $html;
        }
    }

    public function guardanuevaocurrencia()
    {

        $nuevaocurrencia = $this->input->post('nuevaocurrencia');

        $cadena_devuelta = strtoupper($nuevaocurrencia);
        $this->load->model('Crud');
        $resultado = $this->Crud->guarda_nuevaocurrencia($cadena_devuelta);


        if (empty($resultado)) {
            echo "<option value='' selected>Seleccionar Lugar de Ocurrencia</option>";
        } else {
            $this->load->model('M_Inicio');
            $resultado2 = $this->M_Inicio->consulta_lista("lugarocurrencia");
            $html = "<option value='' selected>Seleccionar Tipo Infracción</option>";
            foreach ($resultado2 as $val) {

                $html .= "<option value='" . $val['idta_lugarocurrencia'] . "'>" . $val['td_descripcion'] . "</option>";
            }
            $html .= "<option value='0'>OTRO LUGAR DE OCURRENCIA</option>";
            echo $html;
        }
    }

    public function busca_personaspellido()
    {
        $this->load->model('Crud');
        $resultado = $this->Crud->traefuncionario($this->session->userdata('identidad'));
        if (empty($resultado)) {
            echo "No guardó nada";
        } else {
            $datos['sesion'] = $this->session->userdata();
            $datos['funcionarios'] = $resultado;
            $this->load->view('proyecto/vistas/vista_funcionario', $datos);
        }
    }

    public function Buscar()
    {
        $dat = $this->session->userdata();
        if ($dat["idperfil"] == "") {
            redirect('inicio/cerrarsesion');
            return false;
        }
        $this->load->model('Crud_Reportes');
        $resultado = $this->Crud_Reportes->getcantidadinfraccion();
        $datos['cantinfraccion'] = $resultado;
        $this->load->model('M_Inicio');
        $tipoacto = $datos['sesion'] = $this->session->userdata();
        $datos['fecha_actual'] = fecha_actual();
        $datos['opcion'] = "buscar";
        $datos['actos'] = $this->M_Inicio->consulta_lista("Procedimientos");
        $this->load->view('proyecto/header', $datos);
        $this->load->view('proyecto/vistas/vista_buscar');
        $this->load->view('proyecto/footer');
    }

    /*     * * LLENAR TABLAS** */

    public function ingresa_combo()
    {


        $llen = $this->input->post('llenado');

        $this->load->model('Crud');
        $resultado = $this->Crud->llenartabla($llen);


        if (empty($resultado)) {
            echo "No guardó nada";
        } else {
            $this->session->set_userdata("idevento", $resultado->ID);
            echo $resultado->ID;
        }
    }

    public function genera_menu()
    {

        $this->session->set_userdata("idprodacto", '');
        $menu = $this->input->post('opcionmenu');
        switch ($menu) {
            case 0:
                $this->session->set_userdata("idacto", $menu);
                $this->load->view('proyecto/menu/menu_inicio');
                break;
            case 1:
                $this->session->set_userdata("idacto", $menu);
                $this->load->view('proyecto/menu/menu_evento');
                break;
            case 2:
                $this->session->set_userdata("idacto", $menu);
                $this->load->view('proyecto/menu/menu_infraccion');
                break;
            case 4:
                $this->load->view('proyecto/menu/menu_controlvehicular');
                break;
            case 9:
                $this->load->view('proyecto/menu/menu_conserjeria');
                break;
        }
    }

    public function estadistica()
    {
        $this->load->model('Crud_Reportes');
        $resultado = $this->Crud_Reportes->getcantidadinfraccion();
        $datos['cantinfraccion'] = $resultado;
        $tipoacto = $datos['sesion'] = $this->session->userdata();
        $datos['fecha_actual'] = fecha_actual();
        $datos['opcion'] = "estadistica";
        $this->load->view('proyecto/header', $datos);
        $this->load->view('proyecto/vistas/estadisticas/vista_estadistica');
        $this->load->view('proyecto/footer');
    }

    public function villa()
    {
        $this->load->model('Crud_Reportes');
        $resultado = $this->Crud_Reportes->getcantidadinfraccion();
        $datos['cantinfraccion'] = $resultado;
        $tipoacto = $datos['sesion'] = $this->session->userdata();
        $datos['fecha_actual'] = fecha_actual();
        $datos['opcion'] = "estadistica";
        $this->load->view('proyecto/header', $datos);
        $this->load->view('proyecto/vistas/estadisticas/vista_ingresovilla');
        $this->load->view('proyecto/footer');
    }

    public function cuadrante()
    {
        $this->load->model('Crud_Reportes');
        $resultado = $this->Crud_Reportes->getcantidadinfraccion();
        $datos['cantinfraccion'] = $resultado;
        $tipoacto = $datos['sesion'] = $this->session->userdata();
        $datos['fecha_actual'] = fecha_actual();
        $datos['opcion'] = "estadistica";
        $this->load->view('proyecto/header', $datos);
        $this->load->view('proyecto/vistas/estadisticas/vista_ingresoplancuadrante');
        $this->load->view('proyecto/footer');
    }
}
