<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Principal extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index() {

        $this->load->view('login');
    }

    public function get_location() {
        $this->load->model('Crud_Principal');
        $resultado = $this->Crud_Principal->get_location($this->session->userdata('idprodacto'));

        echo json_encode($resultado, true);
    }

    public function ingresar_save() {

        $txtfecha = $this->input->post('txtfecha');
        $txthora = $this->input->post('txthora');
        $txtobservacion = $this->input->post('txtobservacion');
        $this->session->userdata('identidad');

//echo "Aca carga datos de la session ".$this->session->userdata('identidad');

        $this->load->model('Crud_Principal');
        $resultado = $this->Crud_Principal->save_procedimiento($this->session->userdata('Idusuario'), $txtfecha, $txthora, $txtobservacion);


        if (empty($resultado)) {
            echo "No guardo nada";
        } else {
            $this->session->set_userdata("idgrupo", $resultado->ID);
            echo $resultado->ID;
        }
    }

    public function combo_actos() {
        $this->load->model('M_Inicio');
        $tipoacto = $this->M_Inicio->cosulta_listaconvarible("Actos_usuario",$this->session->userdata('Idusuario'));
        $contador=0;
        $html = "<label class='col-lg-2 control-label' for='name'>Clasificación de Evento</label>";
        $html .= "<div class = 'col-lg-5'>";
        $html .= "<div class = 'col-sm-10'>";
        $html .= "<select id = 'cbxevento' name = 'cbxevento' class = 'form-control' onchange = 'cargamenu(this.value)'>";
        foreach ($tipoacto as $val) {$contador++;}
        if($contador>1){
            $html .= "<option value = '0' selected> -----. Seleccionar Acto . -----</option>";
        }
        foreach ($tipoacto as $val) {
            $html .= "<option  value='" . $val['idta_acto'] . "'>" . $val['td_descripcion'] . "</option>";
        }
        
        $html .= "</select>";
        $html .= "</div>   ";
        $html .= "</div>";

        echo $html;
    }

}
