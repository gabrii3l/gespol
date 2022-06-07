<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Especies extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index() {
        $this->load->model('M_Inicio');
        $datos['categoria'] = $this->M_Inicio->cosulta_listaconvarible("categoria", 3);
        $datos['calidadelito'] = $this->M_Inicio->cosulta_listaconvarible("calidadelito", 2);
        $datos['destino'] = $this->M_Inicio->cosulta_listaconvarible("destino", 3);
        $this->load->view('proyecto/vistas/delitos/vista_especies', $datos);
    }

    public function busca_categoriadetalle() {
        $idcategoria = $this->input->post('idcategoria');
        $this->load->model('M_Inicio');
        $resultado = $this->M_Inicio->cosulta_listaconvarible("categoria_detalle", $idcategoria);
        if (empty($resultado)) {
            echo "";
        } else {
            $html = "";
            foreach ($resultado as $val) {

                $html .= "<option value='" . $val['idta_categoriadetalle'] . "'>" . $val['td_descripcion'] . "</option>";
            }
            echo $html;
        }
    }

    public function save_especies() {

        $observacion_especie = $this->input->post('observacion_especie');
        $cbxcalidadelito_especie = $this->input->post('cbxcalidadelito_especie');
        $cbxcategoria_especies = $this->input->post('cbxcategoria_especies');
        $txtnroserie_especie = $this->input->post('txtnroserie_especie');
        $txtnromarca_especie = $this->input->post('txtnromarca_especie');
        $cbx_descripciondelito = $this->input->post('cbx_descripciondelito');
        $txtavaluo_especie = $this->input->post('txtavaluo_especie');
        $txtcantidad_especie = $this->input->post('txtcantidad_especie');
        $cbxdestino_especies = $this->input->post('cbxdestino_especies');


        $data = array(
            'idta_categoria' => $cbxcategoria_especies,
            'idta_categoriadet' => $cbx_descripciondelito,
            'idta_destino' => $cbxdestino_especies,
            'idta_calidadelito' => $cbxcalidadelito_especie,
            'td_numespecie' => $txtnroserie_especie,
            'td_avaluo' => $txtavaluo_especie,
            'td_marca' => $txtnromarca_especie,
            'td_cantidad' => $txtcantidad_especie,
            'td_observaciones' => $observacion_especie,
            'td_estado' => 0);

        $this->load->model('delito/Crud_Especies');
        $resultado = $this->Crud_Especies->save_especies($data);
        if (empty($resultado)) {
            echo "Error de ingreso";
        } else {

            $data2 = array(
                'idta_especie' => $resultado->ID,
               'idta_prodacto' => $this->session->userdata('idprodacto'),
                'td_estado' => 0);

            $resultado2 = $this->Crud_Especies->save_prodespecies($resultado->ID, $this->session->userdata('idprodacto'), $data2);
            if (empty($resultado2)) {
                echo "Error Cod-331";
            } else {
                echo 0;
            }
        }
    }

}
