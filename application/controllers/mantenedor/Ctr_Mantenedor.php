<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Mantenedor extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index() {

        $this->load->view('login');
    }

    public function save_usuario() {

        $cbx_perfil = $this->input->post('cbx_perfil');
        $txt_run = $this->input->post('txt_run');
        $cbx_grado = $this->input->post('cbx_grado');
        $txt_primer_nombre = $this->input->post('txt_primer_nombre');
        $txt_segundo_nombre = $this->input->post('txt_segundo_nombre');
        $txt_apellido_pat = $this->input->post('txt_apellido_pat');
        $txt_apellido_mat = $this->input->post('txt_apellido_mat');
        $fecha_nac = $this->input->post('fecha_nac');
        $txt_celular = $this->input->post('txt_celular');
        $txt_telefono = $this->input->post('txt_telefono');
        $txt_email = $this->input->post('txt_email');
        $cbx_nacionalidad = $this->input->post('cbx_nacionalidad');
        $cbx_sexo = $this->input->post('cbx_sexo');
        $cbx_estudios = $this->input->post('cbx_estudios');
        $cbx_ecivil = $this->input->post('cbx_ecivil');
        $cbx_profesion = $this->input->post('cbx_profesion');
        $cbx_estado = $this->input->post('cbx_estado');
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger" ><h5 style="color:white;">', '</h5></span></br>');
        $this->form_validation->set_rules('txt_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('cbx_perfil', 'Perfil', 'required');
        $this->form_validation->set_rules('txt_run', 'RUT', 'trim|required|xss_clean|max_length[12]|callback_valida_rut[' . $this->input->post('txt_run') . ']');

        if ($this->form_validation->run() == FALSE) {

            $this->load->model('M_Inicio');


            $datos['sexo'] = $this->M_Inicio->consulta_lista("sexo");
            $datos['estudios'] = $this->M_Inicio->consulta_lista("estudios");
            $datos['estadocivil'] = $this->M_Inicio->consulta_lista("estadocivil");
            $datos['profesion'] = $this->M_Inicio->consulta_lista("profesion");
            $datos['Nacionalidad'] = $this->M_Inicio->consulta_lista("Nacionalidad");
            $datos['grado'] = $this->M_Inicio->consulta_lista("grado");
            $datos['perfil'] = $this->M_Inicio->consulta_lista("perfil");
            $datos['get_usuario'] = $this->M_Inicio->get_usuario();
            $datos['sesion'] = $this->session->userdata();
            $datos['fecha_actual'] = fecha_actual();
            $datos['opcion'] = "form";

            $this->load->view('proyecto/header', $datos);
            $this->load->view('proyecto/vistas/mantenedores/mantenedor_usuario', $datos);
            $this->load->view('proyecto/footer');
        } else {

            $data_funcionario = array(
                'idta_entidad' => $this->session->userdata('identidad'),
                'idta_grado' => $cbx_grado,
                'idta_sexo' => $cbx_sexo,
                'idta_estudios' => $cbx_estudios,
                'idta_estado_civil' => $cbx_ecivil,
                'td_primernombre' => $txt_primer_nombre,
                'td_segundonombre' => $txt_segundo_nombre,
                'td_apellidopaterno' => $txt_apellido_pat,
                'td_apellidomaterno' => $txt_apellido_mat,
                'td_correo' => $txt_email,
                'td_fono' => $txt_celular,
                'td_fechanacimiento' => $fecha_nac,
                'td_imagen' => '',
                'td_estado' =>$cbx_estado,
                'idta_profesion' => $cbx_profesion,
                'td_run' => $txt_run,
                'td_digito' => '');

            $this->load->model('Crud_Mantenedor');
            $resultado = $this->Crud_Mantenedor->save_funcionario($data_funcionario);


            if (empty($resultado)) {
                echo "No guardó nada";
            } else {
                $data_usuario = array(
                    'idta_perfil' => $cbx_perfil,
                    'idta_funcionario' => $resultado->ID,
                    'td_usuario' => $txt_run,
                    'td_password' => $txt_run,
                    'td_estado' => 0);
                $this->load->model('Crud_Mantenedor');
                $resultado_usuario = $this->Crud_Mantenedor->save_usuario($data_usuario);

                if (empty($resultado_usuario)) {
                    echo "No guardo datos";
                } else {
                    $this->load->model('M_Inicio');
                    $datos['TipoPatente'] = $this->M_Inicio->consulta_lista("TipoPatente");
                    $datos['MarcaVehiculo'] = $this->M_Inicio->consulta_lista("MarcaVehiculo");
                    $datos['calidad'] = $this->M_Inicio->consulta_lista("Calidad");
                    $datos['region'] = $this->M_Inicio->consulta_lista("region");
                    $datos['tipoper'] = $this->M_Inicio->consulta_lista("Tipoper");
                    $datos['tipoidentificacion'] = $this->M_Inicio->consulta_lista("tipoidentificacion");
                    $datos['identificacion'] = $this->M_Inicio->consulta_lista("identificacion");
                    $datos['sexo'] = $this->M_Inicio->consulta_lista("sexo");
                    $datos['estudios'] = $this->M_Inicio->consulta_lista("estudios");
                    $datos['estadocivil'] = $this->M_Inicio->consulta_lista("estadocivil");
                    $datos['profesion'] = $this->M_Inicio->consulta_lista("profesion");
                    $datos['tipolicencia'] = $this->M_Inicio->consulta_lista("tipolicencia");
                    $datos['Nacionalidad'] = $this->M_Inicio->consulta_lista("Nacionalidad");
                    $datos['Calidadelito'] = $this->M_Inicio->cosulta_listaconvarible("calidadelito", 1);
                    $datos['delito'] = $this->M_Inicio->consulta_lista("delito");
                    $datos['grado'] = $this->M_Inicio->consulta_lista("grado");
                    $datos['perfil'] = $this->M_Inicio->consulta_lista("perfil");
                    $datos['get_usuario'] = $this->M_Inicio->get_usuario();
                    $datos['sesion'] = $this->session->userdata();
                    $datos['fecha_actual'] = fecha_actual();
                    $datos['opcion'] = "form";

                    $this->load->view('proyecto/header', $datos);
                    $this->load->view('proyecto/vistas/mantenedores/mantenedor_usuario', $datos);
                    $this->load->view('proyecto/footer');
                }
            }
        }
    }

    function valida_rut($rut) {
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11)
            $dvr = 0;
        if ($dvr == 10)
            $dvr = 'K';
        if ($dvr == strtoupper($dv))
            return true;
        else
            $this->form_validation->set_message('valida_rut', 'RUN Incorrecto, debe ingresar uno correcto');
        return false;
    }

}
