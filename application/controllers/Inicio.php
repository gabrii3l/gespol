<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->helper(array('getFecha'));

//        $dat = $this->session->userdata();
//  
//        if ($dat["idperfil"] == "") {
//            redirect('inicio/cerrarsesion');
//            return false;
//        }
    }

    public function index() {

//        $this->load->view('login');
        $this->load->view('login');
    }

    public function login() {
        if (isset($_COOKIE['ci_session'])) {
            $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');
//            $this->form_validation->set_rules('txtrut', 'RUT', 'trim|required|xss_clean|min_length[9]|max_length[12]');
            $this->form_validation->set_rules('txtrut', 'RUT', 'trim|required|xss_clean|max_length[12]');
            $this->form_validation->set_rules('txtpass', 'CONTRASEÑA', 'trim|required|xss_clean|min_length[4]|callback_valida_usuario[' . $this->input->post('txtrut') . ']');
            $this->form_validation->set_message('valida_usuario', 'Datos de usuario incorrectos');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login2');
            } else {

                $dat = $this->session->userdata();
                if ($dat["idperfil"] == "") {
                    redirect('inicio/cerrarsesion');
                    return false;
                }

                $variable = "VY6WYTJSLDGG2C36";
                $this->load->library('Authenticator');


                /* Este código me permite generar codigo autometico (variable) */
//                $Authenticator = new Authenticator();
//                if (($this->session->userdata('auth_secret') == null)) {
//                    $secret = $Authenticator->generateRandomSecret();
//                    $this->session->set_userdata("auth_secret", $secret);
//                }


                if (($this->session->userdata('auth_secret') == null)) {
                    $secret = $variable;
                    $this->session->set_userdata("auth_secret", $secret);
                }

                if (($this->session->userdata('failed') == null)) {
                    $this->session->set_userdata("failed", false);
                }

                /* Este código me permite generar un qr automentico */
//                $qrCodeUrl = $Authenticator->getQR('Gespol', $this->session->userdata('auth_secret'));
//                $datos['sesion'] = $this->session->userdata();
//                $datos['qrCodeUrl'] = $qrCodeUrl;

                $datos['sesion'] = $this->session->userdata();
                $this->load->view('proyecto/autentificador/index', $datos);


//                $this->principal();
            }
        } else {
            header('Location: inicio');
        }
    }

    public function upload_file() {



        $this->load->library('upload');



        if (!empty($_FILES['archivo']['name'])) {
            $config['upload_path'] = 'files/';
            $config['allowed_types'] = 'xls|xlsx';
            $config['max_size'] = 0;
            $config['encrypt_name'] = TRUE;
        }
        $this->upload->initialize($config);
        $this->upload->do_upload('archivo');

        /* Nombre de archivos */
        echo $this->upload->data('file_name') . "</BR>";
        echo $this->upload->data('orig_name');

        /*


          if ($this->upload->do_upload('archivo')) {

          // echo json_encode($this->upload->data());
          $this->agrega_sesion_upload($this->upload->data());
          //Subimos el archivo de excel y lo leemos con la libreria PHPExcel.
          $data = array('upload_data' => $this->upload->data());
          $this->load->library('excelll');



          //$excel = $this->excelll->read_file($data['upload_data']['file_name']);


          } else {
          echo json_encode($this->upload->display_errors());
          }
          }

          echo $_FILES['archivo']['tmp_name'];

          return false;

          /*
          //The file stored in the server will be deleted, we don't need it anymore.
          //El archivo almacenado en el servidor sera eliminado, no lo necesitamos mas.
          unlink($config['upload_path'] . '/' . $data['upload_data']['file_name']);

          //Set the array result from the library function and pass it to the view.
          //Asignamos el arreglo resultante de la funcion de la libreria y lo pasamos a la vista.
          $data['excel'] = $excel;

          $this->load->view('view', $data); */



        require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
        //Variable con el nombre del archivo
        $nombreArchivo = $_FILES['archivo']['tmp_name'];
        ;
        // Cargo la hoja de cálculo
        $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);

        //Asigno la hoja de calculo activa
        $objPHPExcel->setActiveSheetIndex(0);
        //Obtengo el numero de filas del archivo
        $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

        $datos = $this->session->userdata('usuario');
        $datos2['var'] = "table";
        $this->load->view('proyecto/header', $datos2);
        $this->load->view('proyecto/print/carga', $datos);
        $this->load->view('proyecto/footer');

//       
//	echo '<table border=1><tr><td>Producto</td><td>Precio</td><td>Existencia</td></tr>';
//	
//	for ($i = 1; $i <= $numRows; $i++) {
//		
//		$nombre = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
//		$precio = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
//		$existencia = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
//                $existencia2 = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
//                $existencia3 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
//                $existencia4 = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
//                $existencia5 = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
//                $existencia6 = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
//                $existencia7 = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
//                $existencia8 = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
//                
//		
//		echo '<tr>';
//		echo '<td>'. $nombre.'</td>';
//		echo '<td>'. $precio.'</td>';
//		echo '<td>'. $existencia.'</td>';
//                echo '<td>'. $existencia2.'</td>';
//                echo '<td>'. $existencia3.'</td>';
//                echo '<td>'. $existencia4.'</td>';
//                echo '<td>'. $existencia5.'</td>';
//                echo '<td>'. $existencia6.'</td>';
//                echo '<td>'. $existencia7.'</td>';
//                echo '<td>'. $existencia8.'</td>';
//		echo '</tr>';
//		
//		
//	}
//	
//        
//        echo '<table>';
//        
//        
    }

    function agrega_sesion_upload($nuevo) {
        $dat = $this->session->userdata("usuario");
        if ($dat["rut_usuario"] == "") {
            redirect('inicio');
            return false;
        }
    }

    public function logout() {
        $this->session->session_destroy();
        $this->index();
    }

    public function valida_usuario($pass, $user) {
        $rut = str_replace(".", "", str_replace("-", "", trim($user)));
        $digito = substr($rut, -1);
        $rut2 = substr($rut, 0, -1);
        $this->load->model('M_Inicio');
        $resultado = $this->M_Inicio->inicio($rut2, $pass);

        if (!$resultado) {
            $this->form_validation->set_message('valida_usuario', 'Datos de usuario incorrectos');
            return FALSE;
        } else if ($resultado->estado == 1) {
            $this->form_validation->set_message('valida_usuario', 'Sr.Usuario no esta activo en el sistema, comunicarse con el Soporte de la Plataforma');
            return FALSE;
        } else {

            $perfilamiento = $this->M_Inicio->consulta_perfil($resultado->idperfil);


            $cont = 0;
            $perfil = "";
            foreach ($perfilamiento as $val) {

                $cont = $cont + 1;
                $perfil = $val["perfil"];
            }
//          
            if (empty($perfilamiento)) {
                $this->form_validation->set_message('valida_usuario', 'Sr.Usuario no tiene permiso para ingresar al Sistema');
            } else {

                $data = array(
                    'is_logued_in' => TRUE,
                    'ip_acceso_usuario' => $this->input->ip_address(),
                      'equipo_acceso_usuario' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
                    'menuperfil' => $perfilamiento,
                    'menucont' => $cont,
                    'descripcionperfil' => $perfil,
                    'idperfil' => $resultado->idperfil,
                    'Idusuario' => $resultado->idusuario,
                    'Usuario' => $resultado->Usuario,
                    'Pass' => $resultado->Pass,
                    'PrimerNombre' => $resultado->PrimerNombre,
                    'SegundoNombre' => $resultado->SegundoNombre,
                    'ApellidoPaterno' => $resultado->ApellidoPaterno,
                    'ApellidoMaterno' => $resultado->ApellidoMaterno,
                    'RunUsuario' => $resultado->RunUsuario,
                    'DigitoUsuario' => $resultado->DigitoUsuario,
                    'Correo' => $resultado->Correo,
                    'Telefono' => $resultado->Telefono,
                    'Fecha_Nacimiento' => $resultado->Fecha_Nacimiento,
                    'Imagen' => $resultado->Imagen,
                    'identidad' => $resultado->identidad,
                    'Entidad' => $resultado->Entidad,
                    'Entidad_Rut' => $resultado->Entidad_Rut,
                    'Digito_Rut_Entidad' => $resultado->Digito_Rut_Entidad,
                    'Dirección_Entidad' => $resultado->Dirección_Entidad,
                    'Telefono_Entidad' => $resultado->Telefono_Entidad,
                    'Comuna' => $resultado->Comuna,
                    'Provincia' => $resultado->Provincia,
                    'Region' => $resultado->Region,
                    'País' => $resultado->País,
                    'Continente' => $resultado->Continente,
                    'Planeta' => $resultado->Planeta,
                    'Img' => $resultado->img,
                    'idgrupo' => '',
                    'idacto' => '',
                    'idprodacto' => '',
                    'idcalidad' => '',
                    'auth_secret' => '',
                    'failed' => '',
                    'idpartepol' => '',
                    'iddroga' => ''
                );
                $this->session->set_userdata($data);

                return TRUE;
            }
        }
    }

    public function ingreso() {
        $datos = $this->session->userdata('usuario');
        $this->load->view('menu/header');
        $this->load->view('menu/menu', $datos);
//        $this->load->view('ingreso_mesada/cuerpo');
        $this->load->view('menu/footer');
    }

    public function principal() {
        $dat = $this->session->userdata();
        if ($dat["idperfil"] == "") {
            redirect('inicio/cerrarsesion');
            return false;
        }

        if ($dat["idperfil"] == 1) {
            $this->load->model('Crud_Reportes');
            $resultado = $this->Crud_Reportes->getcantidadinfraccion();
            $datos['cantinfraccion'] = $resultado;


            $this->load->model('M_Inicio');
            $tipoevento = $this->M_Inicio->consulta_lista("Procedimientos");

            $datos['tipoevento'] = $tipoevento;
            $datos['sesion'] = $this->session->userdata();
            $datos['fecha_actual'] = fecha_actual();
            $datos['opcion'] = "";

            $this->load->view('proyecto/header', $datos);
           $this->load->view('proyecto/inicio');
            $this->load->view('proyecto/footer');
        } else {
            $this->load->model('Crud_Reportes');
            $resultado = $this->Crud_Reportes->getcantidadinfraccion();
            $vehiculos = $this->Crud_Reportes->getcantidadvehiculos();

            $datos['sesion'] = $this->session->userdata();
            $datos['fecha_actual'] = fecha_actual();
            $datos['cantinfraccion'] = $resultado;
            $datos['cantinvehiculos'] = $vehiculos;
            $datos['cantinvehiculosNacionales'] = $this->Crud_Reportes->getcantidadvehiculosNacionales();
            $datos['cantinvehiculosExtranjeros'] = $this->Crud_Reportes->getcantidadvehiculosExtranjeras();
            $datos['cantinvehiculosSinPatente'] = $this->Crud_Reportes->getcantidadvehiculosSinPatente();
            $datos['opcion'] = "index";

            $this->load->view('proyecto/header', $datos);
            $this->load->view('proyecto/principal');
            $this->load->view('proyecto/footer');
        }

//    
    }
    
    public function estadisticaprincipal(){
        
         $this->load->model('Crud_Reportes');
            $resultado = $this->Crud_Reportes->getcantidadinfraccion();
            $vehiculos = $this->Crud_Reportes->getcantidadvehiculos();

            $datos['sesion'] = $this->session->userdata();
            $datos['fecha_actual'] = fecha_actual();
            $datos['cantinfraccion'] = $resultado;
            $datos['cantinvehiculos'] = $vehiculos;
            $datos['cantinvehiculosNacionales'] = $this->Crud_Reportes->getcantidadvehiculosNacionales();
            $datos['cantinvehiculosExtranjeros'] = $this->Crud_Reportes->getcantidadvehiculosExtranjeras();
            $datos['cantinvehiculosSinPatente'] = $this->Crud_Reportes->getcantidadvehiculosSinPatente();
            $datos['opcion'] = "index";

            $this->load->view('proyecto/header', $datos);
            $this->load->view('proyecto/principal');
            $this->load->view('proyecto/footer');
    }

    public function principal2() {

        $this->load->model('crud_reportes');
        $resultado = $this->crud_reportes->getinfraccion();

        $can1 = 0;
        $nom1 = "";
        $can2 = 0;
        $nom2 = "";
        $can3 = 0;
        $nom3 = "";
        $can4 = 0;
        $nom4 = "";
        foreach ($resultado as $val) {
            if ($val['id'] == 3) {
                $can1 = $can1 + 1;
                $nom1 = "ADELANTAMIENTOS INDEBIDOS";
            }
            if ($val['id'] == 4) {
                $can2 = $can2 + 1;
                $nom2 = "ADELANT. ZONAS PROHIBIDAS";
            }
            if ($val['id'] == 7) {
                $can3 = $can3 + 1;
                $nom3 = "ALIMENTOS, TRANSP. VEH. NO AUT.";
            }
            if ($val['id'] == 56) {
                $can4 = $can4 + 1;
                $nom4 = "COND.VEH.C\/VIDR. OSCUROS";
            }
        }
        $datos['can1'] = $can1;
        $datos['nom1'] = $nom1;
        $datos['can2'] = $can2;
        $datos['nom2'] = $nom2;
        $datos['can3'] = $can3;
        $datos['nom3'] = $nom3;
        $datos['can4'] = $can4;
        $datos['nom4'] = $nom4;


        $datos['can5'] = 22;
        $datos['nom5'] = "exameplasdae asd";
        $datos['can6'] = 11;
        $datos['nom6'] = "exameple2";


        echo json_encode($datos, true);
//    
    }

    public function cerrarsesion() {
        $this->load->library('session');
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        $this->session->sess_destroy();
        redirect('Inicio');
    }

    public function validagoogle() {
        $dat = $this->session->userdata();
        if ($dat["idperfil"] == "") {
            redirect('inicio/cerrarsesion');
            return false;
        }

        $this->load->library('Authenticator');
        $Authenticator = new Authenticator();
        $checkResult = $Authenticator->verifyCode($this->session->userdata('auth_secret'), $this->input->post('code'), 2);    // 2 = 2*30sec clock tolerance
        // $qrCodeUrl = $Authenticator->getQR('Gespol', $this->session->userdata('auth_secret'));

        if (!$checkResult) {
            $this->session->set_userdata("failed", true);
            // $datos['qrCodeUrl'] = $qrCodeUrl;
            $datos['sesion'] = $this->session->userdata();
            $this->load->view('proyecto/autentificador/index', $datos);
        } else {
            $this->principal();
        }
    }

}
