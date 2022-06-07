<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Vehiculo extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index() {
        $this->load->model('m_inicio');
        $datos['patente'] = $this->m_inicio->consulta_lista("Patente");
        $this->load->view('proyecto/vistas/vista_vehiculo', $datos);
    }

    public function busca_vehiculo() {

        $txtpatente = $this->input->post('txtpatente');
        $cbxtipopatente = $this->input->post('cbxtipopatente');
        $cbxcalidad = $this->input->post('cbxcalidad');
        $this->load->model('Crud_Vehiculo');
        $resultado = $this->Crud_Vehiculo->busca_vehiculo($txtpatente, $cbxtipopatente, $cbxcalidad);

        if (empty($resultado)) {
            echo 0;
        } else {
            echo json_encode($resultado, true);
        }
    }

}
