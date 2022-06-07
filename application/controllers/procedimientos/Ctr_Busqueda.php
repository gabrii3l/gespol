<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Busqueda extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index() {

        $this->load->view('login');
    }

    public function busqueda() {
        $txtprocedimiento = $this->input->post('txtprocedimiento');
        $txtacto = $this->input->post('txtacto');
        $cbxcalidad = $this->input->post('cbxcalidad');

        $this->load->model('Crud_Reportes');
        $infraccion = $this->Crud_Reportes->buscageneral($txtprocedimiento, $txtacto, $cbxcalidad);
        $datos['infraccion'] = $infraccion;
        if (empty($infraccion)) {
            echo 0;
        } else {

            $this->load->view('proyecto/vistas/buscar/buscar_tabla', $datos);
        }
    }

    public function buscar_evidencia() {


        $idinfraccion = $this->input->post('idinfraccion');

        $this->load->model('Crud_Infraccion');
        $resultado = $this->Crud_Infraccion->get_img($idinfraccion);


        $this->load->view('proyecto/vistas/vehiculo/vista_evidencia', $resultado);
    }

    public function pdf() {


        $id = base64_decode($this->input->get("id"));
        $acto = base64_decode($this->input->get("idacto"));
       
        $this->load->model('Crud_Infraccion');
        $resultado = $this->Crud_Infraccion->trae_idcalidad($id);

 $this->session->set_userdata("idcalidad", $resultado->ID);


        $this->load->model('Crud_Vehiculo');
        $this->load->model('Crud_Persona');
        $this->load->model('Crud_Funcionario');
        $this->load->model('Crud_Infraccion');
        $this->load->model('Crud_Empresa');

        if ($resultado->ID == 1) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($acto);
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($acto);
            $datos['persona'] = $this->Crud_Persona->get_persona($acto);
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($acto);
        }

        if ($resultado->ID == 2) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($acto);
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($acto);
            $datos['persona'] = $this->Crud_Persona->get_persona($acto);
            $datos['personadueno'] = $this->Crud_Persona->get_persona_dueno($acto);
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($acto);
        }

        if ($resultado->ID == 3) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($acto);
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($acto);
            $datos['empresa'] = $this->Crud_Empresa->get_empresa($acto);
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($acto);
        }

        if ($resultado->ID == 4) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($acto);
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($acto);
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($acto);
        }


        $datos['id'] = $id;



        $this->load->library('pdf');

        $this->pdf->load_view('proyecto/vistas/terminarpdf', $datos);

        $this->pdf->set_paper('legal', 'portrait');
        $this->pdf->render();
        #Esto es lo que imprime en el PDF el numero de paginas
        $canvas = $this->pdf->get_canvas();
        $footer = $canvas->open_object();
        $w = $canvas->get_width();
        $h = $canvas->get_height();
        $canvas->page_text($w - 60, $h - 28, "Página {PAGE_NUM} de {PAGE_COUNT}", Font_Metrics::get_font('helvetica'), 6);
        //        $canvas->page_text($w - 590, $h - 28, "El pie de p&aacute;gina del lado izquiero, Guadalajara, Jalisco C.P. XXXXX Tel. XX (XX) XXXX XXXX", Font_Metrics::get_font('helvetica'), 6);
        $canvas->close_object();
        $canvas->add_object($footer, "all");
        $this->pdf->stream('Infraccion_' . $id . '.pdf', array('Attachment' => 0));
        $this->pdf->stream('CuadroDemotrativo.pdf', array('Attachment' => 0));

//        $this->load->library('pdf');
//			$this->pdf->load_html('<html></body>hola</body></html>');
//			$this->pdf->set_paper('legal', 'portrait');
//			$this->pdf->render();
//			$this->pdf->stream('informe' . $elfolio . '.pdf', array('Attachment' => 0));
    }

    public function buscaid() {


        $acto = $this->input->get("idacto");
        $this->session->set_userdata("idprodacto", $acto);


        $id = base64_decode($this->input->get("id"));

        $this->load->model('Crud_Infraccion');
        $resultado = $this->Crud_Infraccion->trae_idcalidad($id);

     

        $this->load->model('Crud_Vehiculo');
        $this->load->model('Crud_Persona');
        $this->load->model('Crud_Funcionario');
        $this->load->model('Crud_Infraccion');
        $this->load->model('Crud_Empresa');

        if ($resultado->ID == 1) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($acto);
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($acto);
            $datos['persona'] = $this->Crud_Persona->get_persona($acto);
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($acto);
        }

        if ($resultado->ID == 2) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($acto);
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($acto);
            $datos['persona'] = $this->Crud_Persona->get_persona($acto);
            $datos['personadueno'] = $this->Crud_Persona->get_persona_dueno($acto);
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($acto);
        }

        if ($resultado->ID == 3) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($acto);
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($acto);
            $datos['empresa'] = $this->Crud_Empresa->get_empresa($acto);
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($acto);
        }

        if ($resultado->ID == 4) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($acto);
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccion($acto);
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($acto);
        }

        //echo "calidad".$this->session->userdata('idcalidad');
        $datos['sesion'] = $this->session->userdata();
        $datos['fecha_actual'] = fecha_actual();
        $datos['opcion'] = "buscar";
        $datos['idcalidad'] = $resultado->ID;
        $this->load->view('proyecto/header', $datos);
        $this->load->view('proyecto/vistas/buscar/buscar_detalle', $datos);
        $this->load->view('proyecto/footer');
























//        $this->load->view('proyecto/vistas/buscar/popup_busqueda', $datos);
//        $this->load->model('crud_reportes');
//        $resultado = $this->crud_reportes->buscaid($id, $acto);
//
//        $txtfecha = $this->input->post('txtfecha');
//        $txthora = $this->input->post('txthora');
//        $txtobservacion = $this->input->post('txtobservacion');
//        $this->session->userdata('identidad');
//
////echo "Aca carga datos de la session ".$this->session->userdata('identidad');
//
//        $this->load->model('crud_principal');
//        $resultado = $this->crud_principal->save_procedimiento($this->session->userdata('Idusuario'), $txtfecha, $txthora, $txtobservacion);
//
//
//        if (empty($resultado)) {
//            echo "No guardó nada";
//        } else {
//            $this->session->set_userdata("idgrupo", $resultado->ID);
//            echo $resultado->ID;
//        }
    }

    public function get_location2() {
        $this->load->model('Crud_Reportes');
        $resultado = $this->Crud_Reportes->get_location2($this->session->userdata('idprodacto'));

        
        
        echo json_encode($resultado, true);
    }

}
