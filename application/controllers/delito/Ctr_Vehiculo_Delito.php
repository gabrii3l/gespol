<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Vehiculo_Delito extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index() {
        $this->load->model('M_Inicio');
        $datos['patente'] = $this->M_Inicio->consulta_lista("Patente");
        $datos['TipoPatente'] = $this->M_Inicio->consulta_lista("TipoPatente");
        $datos['MarcaVehiculo'] = $this->M_Inicio->consulta_lista("MarcaVehiculo");
        $datos['calidad'] = $this->M_Inicio->consulta_lista("Calidad");
        $datos['TipoVehiculo'] = $this->M_Inicio->consulta_lista("TipoVehiculo");
        $datos['Color'] = $this->M_Inicio->consulta_lista("Color");
        $datos['Ano'] = $this->M_Inicio->consulta_lista("Ano");
        $this->load->view('proyecto/vistas/delitos/vista_vehiculo', $datos);
    }

    public function save_vehiculodelito() {

        $opcion = $this->input->post('opcion');
        $cbxtipopatente_delito = $this->input->post('cbxtipopatente_delito');
        $txtpatente_delito2 = $this->input->post('txtpatente_delito2');
        $cbxmarca_delito = $this->input->post('cbxmarca_delito');
        $cbxmodelo_delito = $this->input->post('cbxmodelo_delito');
        $cbxtipvehiculo_delito = $this->input->post('cbxtipvehiculo_delito');
        $cbxcolor_delito = $this->input->post('cbxcolor_delito');
        $cbxano_delito = $this->input->post('cbxano_delito');
        $NroChassis_delito = $this->input->post('NroChassis_delito');
        $NroMotor_delito = $this->input->post('NroMotor_delito');
        $Avaluto_delito = $this->input->post('Avaluto_delito');


        $data = array(
            'idta_tipovehiculo' => $cbxtipvehiculo_delito,
            'idta_tipopatente' => $cbxtipopatente_delito,
            'idta_color' => $cbxcolor_delito,
            'idta_ano' => $cbxano_delito,
            'idta_marcavehiculo' => $cbxmarca_delito,
            'idta_modelo' => $cbxmodelo_delito,
            'td_patente' => $txtpatente_delito2,
            'td_numerochassis' => $NroChassis_delito,
            'td_nromotor' => $NroMotor_delito,
            'td_avaluo' => $Avaluto_delito);




        $this->load->model('delito/Crud_Vehiculo_Delito');
        switch ($opcion) {
            case 0:
                $resultado = $this->Crud_Vehiculo_Delito->update_vehiculo($data, $txtpatente_delito2, $cbxtipopatente_delito);
                break;
            case 1:
                $resultado = $this->Crud_Vehiculo_Delito->busca_vehiculo_crud($txtpatente_delito2);
                break;
            case 2:
                $resultado = $this->Crud_Vehiculo_Delito->save_vehiculo($data, $txtpatente_delito2);
                break;
        }
        if (empty($resultado)) {
            $resultado = $this->Crud_Vehiculo_Delito->busca_vehiculo_crud($txtpatente_delito2);
        }


        $data2 = array(
            'idta_vehiculo' => $resultado->ID,
            'idta_prodacto' => $this->session->userdata('idprodacto'),
//            'idta_prodacto' => 1,
            'td_empadronado' => 1,
            'td_estado' => 0);

        $resultado2 = $this->Crud_Vehiculo_Delito->save_prodvehiculo($resultado->ID, $this->session->userdata('idprodacto'), $data2);
        if (empty($resultado2)) {
            echo "Error Cod-331";
        } else {
            echo 0;
        }
    }

    public function busca_vehiculo() {

        $cbxtipopatente_delito = $this->input->post('cbxtipopatente_delito');
        $txtpatente_delito = $this->input->post('txtpatente_delito');
        $this->load->model('delito/Crud_Vehiculo_Delito');
        $resultado = $this->Crud_Vehiculo_Delito->busca_vehiculo($txtpatente_delito, $cbxtipopatente_delito);

        if (empty($resultado)) {
            echo 0;
        } else {
            echo json_encode($resultado, true);
        }
    }

    public function busca_modelo() {
        $marca = $this->input->post('marca');
        $this->load->model('M_Inicio');
        $resultado = $this->M_Inicio->cosulta_listaconvarible("modelo", $marca);
        if (empty($resultado)) {
            
        } else {
            $html = "";
            foreach ($resultado as $val) {

                $html .= "<option value='" . $val['idta_modelo'] . "'>" . $val['td_descripcion'] . "</option>";
            }
            echo $html;
        }
    }

}
