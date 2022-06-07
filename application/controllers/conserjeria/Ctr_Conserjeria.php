<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ctr_Conserjeria extends CI_Controller
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
        $datos['categoria'] = $this->M_Inicio->cosulta_listaconvarible("categoria", 1);
        $datos['calidadelito'] = $this->M_Inicio->cosulta_listaconvarible("calidadelito", 2);
        $datos['destino'] = $this->M_Inicio->cosulta_listaconvarible("destino", 1);
        $datos['sesion'] = $this->session->userdata();
        $datos['fecha_actual'] = fecha_actual();
        $this->load->view('proyecto/vistas/conserjeria/conserje', $datos);
    }
   
}
