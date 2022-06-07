<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Perito extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index() {
          $this->load->view('proyecto/vistas/delitos/vista_perito');
    }



}
