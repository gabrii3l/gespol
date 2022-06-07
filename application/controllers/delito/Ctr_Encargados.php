<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Encargados extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index() {
        $this->load->model('crud');
        $resultado = $this->crud->traefuncionario($this->session->userdata('identidad'));
        if (empty($resultado)) {
            echo "No guardó nada";
        } else {
            $datos['sesion'] = $this->session->userdata();
            $datos['funcionarios'] = $resultado;
            $this->load->view('proyecto/vistas/delitos/vista_funcionario', $datos);
        }
    }

    public function buscar_funcionario() {
        $idfuncionario = $this->input->post('idfuncionario');
        $this->load->model('Crud_Delito');
        $resultado = $this->Crud_Delito->buscarfuncionario($idfuncionario, $this->session->userdata('identidad'));
        if (empty($resultado)) {
            echo "No hay datos para este RUN";
        } else {
            foreach ($resultado as $val) {
                echo "<tr style='text-align: left;' class='identificador' data-valor='" . $val['idfun'] . "' Id='fila" . $val['idfun'] . "'>";

                echo "<td>" . $val['RunUsuario'] . "" . $val['DigitoUsuario'] . "</td>";
                echo "<td>" . $val['PrimerNombre'] . " " . $val['SegundoNombre'] . " " . $val['ApellidoPaterno'] . " " . $val['ApellidoMaterno'] . "</td>";
                echo "<td>" . $val['Correo'] . "</td>";
                echo "<td>" . $val['Telefono'] . "</td>";
                echo "<td><button id='btneliminar2' onclick='remueve_funcionario(" . $val['idfun'] . ")' type='button' value=" . $val['idfun'] . " name='chkSeleccion'>Eliminar</button></td>";
                echo "</tr>";
            }
        }
    }

    public function save_funcionario() {
        $idfuncionario = $this->input->post('idfuncionario');
        $this->load->model('delito/Crud_Encargado');
        $data = array(
            'idta_prodacto' => $this->session->userdata('idprodacto'),
            'idta_funcionario' => $idfuncionario,
            'td_estado' => 0);
        $insertfun = $this->Crud_Encargado->save_funcionario($data);
        if (empty($insertfun)) {
            echo "Error de ingreso";
        } else {

            echo 0;
        }
    }

}
