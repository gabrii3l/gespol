<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ingreso extends CI_Controller {

    public function index() {
        $datos = $this->session->userdata('usuario');
        $this->load->view('proyecto/header');
        $this->load->view('proyecto/ingresos/carga', $datos);
        $this->load->view('proyecto/footer');
    }
}
