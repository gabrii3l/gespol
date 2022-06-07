<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ctr_Armas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('getFecha'));
    }

    public function index()
    {
        $this->load->model('M_Inicio');
        $datos['categoria'] = $this->M_Inicio->cosulta_listaconvarible("categoria", 1);
        $datos['calidadelito'] = $this->M_Inicio->cosulta_listaconvarible("calidadelito", 2);
        $datos['destino'] = $this->M_Inicio->cosulta_listaconvarible("destino", 1);
        $this->load->view('proyecto/vistas/delitos/vista_arma', $datos);
    }

    public function busca_categoriadetalle()
    {
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

    public function save_armas()
    {

        $cbxcalidadelito_armas = $this->input->post('cbxcalidadelito_armas');
        $cbxcategoria_armas = $this->input->post('cbxcategoria_armas');
        $cbx_descripciondelito_armas = $this->input->post('cbx_descripciondelito_armas');
        $txtmarca_arma = $this->input->post('txtmarca_arma');
        $txtserie_arma = $this->input->post('txtserie_arma');
        $txtavaluo_arma = $this->input->post('txtavaluo_arma');
        $txtencargo_arma = $this->input->post('txtencargo_arma');
        $cbxdestino_arma = $this->input->post('cbxdestino_arma');
        $txtcalibre_arma = $this->input->post('txtcalibre_arma');
        $txtcantidad_arma = $this->input->post('txtcantidad_arma');
        $txtcadenacustodia_arma = $this->input->post('txtcadenacustodia_arma');
        $textarea_armasdelito = $this->input->post('textarea_armasdelito');

        $data = array(
            'idta_categoria' => $cbxcategoria_armas,
            'idta_categoriadet' => $cbx_descripciondelito_armas,
            'idta_calidadelito' => $cbxcalidadelito_armas,
            'idta_destino' => $cbxdestino_arma,
            'td_marca' => $txtmarca_arma,
            'td_serie' => $txtserie_arma,
            'td_avaluo' => $txtavaluo_arma,
            'td_encargo' => $txtencargo_arma,
            'td_calibre' => $txtcalibre_arma,
            'td_cantidadmunicion' => $txtcantidad_arma,
            'td_cadenacustodia' => $txtcadenacustodia_arma,
            'td_observaciones' => $textarea_armasdelito,
            'td_estado' => 0
        );

        $this->load->model('delito/Crud_Armas');
        $resultado = $this->Crud_Armas->save_armas($data);
        if (empty($resultado)) {
            echo "Error de ingreso";
        } else {

            $data2 = array(
                'idta_armas' => $resultado->ID,
                'idta_prodacto' => $this->session->userdata('idprodacto'),
                'td_estado' => 0
            );

            $resultado2 = $this->Crud_Armas->save_prodarma($resultado->ID, $this->session->userdata('idprodacto'), $data2);
            if (empty($resultado2)) {
                echo "Error Cod-331";
            } else {
                echo 0;
            }
        }
    }
}
