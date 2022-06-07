<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Drogas extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index() {
        $this->load->model('M_Inicio');
        $datos['categoria'] = $this->M_Inicio->cosulta_listaconvarible("categoria", 2);
        $datos['calidadelito'] = $this->M_Inicio->cosulta_listaconvarible("calidadelito", 2);
        $datos['destino'] = $this->M_Inicio->cosulta_listaconvarible("destino", 2);
        $datos['medicion'] = $this->M_Inicio->consulta_lista("medicion");
        $datos['ocultamiento'] = $this->M_Inicio->consulta_lista("ocultamiento");

        $this->load->model('crud');
        $resultado = $this->crud->traefuncionario($this->session->userdata('identidad'));
        $datos['sesion'] = $this->session->userdata();
        $datos['funcionarios_droga'] = $resultado;
        $this->load->view('proyecto/vistas/delitos/vista_drogas', $datos);
    }

    public function buscar_funcionario() {
        $idfuncionario = $this->input->post('idfuncionario');
        $this->load->model('Crud_Delito');
        $resultado = $this->Crud_Delito->buscarfuncionario($idfuncionario, $this->session->userdata('identidad'));
        if (empty($resultado)) {
            echo "No hay datos para este RUN";
        } else {
            foreach ($resultado as $val) {
                echo "<tr style='text-align: left;' class='identificador' data-valor='" . $val['idfun'] . "' Id='fila_droga" . $val['idfun'] . "'>";

                echo "<td>" . $val['RunUsuario'] . "" . $val['DigitoUsuario'] . "</td>";
                echo "<td>" . $val['PrimerNombre'] . " " . $val['SegundoNombre'] . " " . $val['ApellidoPaterno'] . " " . $val['ApellidoMaterno'] . "</td>";
                echo "<td>" . $val['Correo'] . "</td>";
                echo "<td>" . $val['Telefono'] . "</td>";
                echo "<td><button  onclick='remueve_funcionario_droga(" . $val['idfun'] . ")' type='button' value=" . $val['idfun'] . " name='chkSeleccion_drogas'>Eliminar</button></td>";
                echo "</tr>";
            }
        }
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

    public function save_drogas() {

        $cbxcalidadelito_drogas = $this->input->post('cbxcalidadelito_drogas');
        $cbxespecificacion_drogas = $this->input->post('cbxespecificacion_drogas');
        $cbxcatdetalle_drogas = $this->input->post('cbxcatdetalle_drogas');
        $cbxmedicion_drogas = $this->input->post('cbxmedicion_drogas');
        $txtavaluo_drogas = $this->input->post('txtavaluo_drogas');
        $cbxocultamiento_drogas = $this->input->post('cbxocultamiento_drogas');
        $cbxodestino_drogas = $this->input->post('cbxodestino_drogas');
        $textarea_Drogasdelito = $this->input->post('textarea_Drogasdelito');

        $data = array(
            'idta_categoria' => $cbxcatdetalle_drogas,
            'idta_categoriadet' => $cbxespecificacion_drogas,
            'idta_calidadelito' => $cbxcalidadelito_drogas,
            'idta_destino' => $cbxodestino_drogas,
            'idta_lugarocultamiento' => $cbxocultamiento_drogas,
            'idta_tipomedicion' => $cbxmedicion_drogas,
            'td_avaluo' => $txtavaluo_drogas,
            'td_comentario' => $textarea_Drogasdelito,
            'td_estado' => 0);


        $this->load->model('delito/Crud_Drogas');
        $resultado = $this->Crud_Drogas->save_drogas($data);
        if (empty($resultado)) {
            echo "Error de ingreso";
        } else {
            $this->session->set_userdata("iddroga", $resultado->ID);
            echo 0;
        }
    }

    public function save_prodroga() {
        $this->load->model('delito/Crud_Drogas');
        $id_funcionario = $this->input->post('id_funcionario');
        
    
        
        
        $data2 = array(
            'idta_drogas' => $this->session->userdata('iddroga'),
            'idta_prodacto' => $this->session->userdata('idprodacto'),
            'idta_funcionario' => $id_funcionario,
            'td_estado' => 0);

        $resultado2 = $this->Crud_Drogas->save_prodroga($this->session->userdata('iddroga'), $this->session->userdata('idprodacto'), $id_funcionario, $data2);
        if (empty($resultado2)) {
            echo "Error Cod-331";
        } else {
            echo 0;
        }
    }

}
