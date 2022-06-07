<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cargaexcel extends CI_Controller {

    public function index() {
        $datos = $this->session->userdata('usuario');
        $this->load->view('proyecto/header');
        $this->load->view('proyecto/ingresos/carga', $datos);
        $this->load->view('proyecto/footer');
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

//
//
//        require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
//        //Variable con el nombre del archivo
//        $nombreArchivo = $_FILES['archivo']['tmp_name'];
//
//
//        // Cargo la hoja de cálculo
//        $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
//
//        //Asigno la hoja de calculo activa
//        $objPHPExcel->setActiveSheetIndex(0);
//        //Obtengo el numero de filas del archivo
//        $numRows = $objPHPExcel->setActiveSheetIndex(1)->getHighestRow();
//
//      
////       
//        echo '<table border=1>'
//        . '<td> N° </td>'
//        . '<td> ALTA REPARTICIÓN </td>'
//        . '<td> REPARTICIÓN </td>'
//        . '<td> PROCESO TRANSVERSAL </td>'
//        . '<td> PROCESO CRÍTICO </td>'
//        . '<td> SUBPROCESO </td>'
//        . '<td> PONDERACIÓN ESTRATÉGICA SUBPROCESO </td>'
//        . '<td> ETAPA </td>'
//        . '<td> OBJETIVO </td>'
//        . '<td> DESCRIPCIÓN RIESGO ESPECÍFICO </td>'
//        . '<td> FUENTE DE RIESGO </td>'
//        . '<td> TIPO DE RIESGO </td>'
//        . '<td> SEÑAL DE ALERTA LA/FT/DF ASOCIADA </td>'
//        . '<td> CARGO(S) FUNCIONARIO RELACIONADO </td>'
//        . '<td> PROBABILIDAD: CLASIF. </td>'
//        . '<td> PROBABILIDAD: VALOR. </td>'
//        . '<td> IMPACTO: CLASIF. </td>'
//        . '<td> PROBABILIDAD: VALOR. </td>'
//        . '<td> SEVERIDAD DEL RIESGO: CLASIF. </td>'
//        . '<td> SEVERIDAD DEL RIESGO: VALOR. </td>'
//        . '<td> DESCRIPCIÓN DEL CONTROL </td>'
//        . '<td> Cumple elementos de Control adecuado </td>'
//        . '<td> NIVEL DE EFECTIVIDAD: PERIODICIDAD </td>'
//        . '<td> NIVEL DE EFECTIVIDAD: OPORTUNIDAD </td>'
//        . '<td> NIVEL DE EFECTIVIDAD: AUTOMATIZACION </td>'
//        . '<td> VALOR </td>'
//        . '<td> RIESGO ESPECIFICO: NIVEL </td>'
//        . '<td> RIESGO ESPECIFICO: VALOR </td>'
//        . '<td> ETAPA: NIVEL </td>'
//        . '<td> ETAPA: VALOR </td>'
//        . '<td> SUBPROCESO: NIVEL </td>'
//        . '<td> SUBPROCESO: VALOR </td>'
//        . '<td> SUBPROCESO: VALOR </td>'
//        . '<td> SUBPROCESO: RANKING </td>'
//        . '<td> PROCESO: NIVEL </td>'
//        . '<td> PROCESO: VALOR </td>'
//        . '<td> PROCESO: RANKING </td>'
//        . '<td> Estrategia Genérica </td>'
//        . '<td> Descripción de la Estrategia a Aplicar </td>'
//        . '<td> Efecto Potencial en la Severidad de Riesgo y/o Efectividad del Control (11) </td>'
//        . '<td> Efecto Potencial en la Severidad de Riesgo y/o Efectividad del Control (11) </td>'
//        . '<td> Efecto Potencial en la Severidad de Riesgo y/o Efectividad del Control (11) </td>'
//        . '<td> Responsable de la Estrategia (12) </td>'
//        . '<td> Plazo </td>'
//        . '<td> Indicador de Logro (14) </td>'
//        . '<td> Periodo Medición del Indicador (15) </td>'
//        . '<td> Meta </td>'
//        . '<td> Evidencia que se Observará (17) </td>'
//        . '<td> Período (fecha) efectiva de evaluación de implementación de la estrategia </td>'
//        . '<td> Resultados de la medición de las metas </td>'
//        . '<td> Evidencia del cumplimiento </td>'
//        . '<td> Motivo del no cumplimiento o cumplimiento pacial (Si corresponde) </td>'
//        . '<td> Proyecciones de cumplimiento (Si corresponde) </td>'
//        . '<td> Recomendaciones (Si corresponde) </td>'
//        . '<td> Descripción de la estrategia a aplicar </td>'
//      . '</tr>';
//
//
//
//        for ($i = 1; $i <= $numRows; $i++) {
//
//            if ($i >= 8) {
//                $variable1 = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
//                $variable2 = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
//                $variable3 = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
//                $variable4 = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
//                $variable5 = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
//                $variable6 = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
//                $variable7 = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
//                $variable8 = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
//                $variable9 = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
//                $variable10 = $objPHPExcel->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
//                $variable11 = $objPHPExcel->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
//                $variable12 = $objPHPExcel->getActiveSheet()->getCell('L' . $i)->getCalculatedValue();
//                $variable13 = $objPHPExcel->getActiveSheet()->getCell('M' . $i)->getCalculatedValue();
//                $variable14 = $objPHPExcel->getActiveSheet()->getCell('N' . $i)->getCalculatedValue();
//                $variable15 = $objPHPExcel->getActiveSheet()->getCell('O' . $i)->getCalculatedValue();
//                $variable16 = $objPHPExcel->getActiveSheet()->getCell('P' . $i)->getCalculatedValue();
//                $variable17 = $objPHPExcel->getActiveSheet()->getCell('Q' . $i)->getCalculatedValue();
//                $variable18 = $objPHPExcel->getActiveSheet()->getCell('R' . $i)->getCalculatedValue();
//                $variable19 = $objPHPExcel->getActiveSheet()->getCell('S' . $i)->getCalculatedValue();
//                $variable20 = $objPHPExcel->getActiveSheet()->getCell('T' . $i)->getCalculatedValue();
//                $variable21 = $objPHPExcel->getActiveSheet()->getCell('U' . $i)->getCalculatedValue();
//                $variable22 = $objPHPExcel->getActiveSheet()->getCell('V' . $i)->getCalculatedValue();
//                $variable23 = $objPHPExcel->getActiveSheet()->getCell('W' . $i)->getCalculatedValue();
//                $variable24 = $objPHPExcel->getActiveSheet()->getCell('X' . $i)->getCalculatedValue();
//                $variable25 = $objPHPExcel->getActiveSheet()->getCell('Y' . $i)->getCalculatedValue();
//                $variable26 = $objPHPExcel->getActiveSheet()->getCell('Z' . $i)->getCalculatedValue();
//                $variable27 = $objPHPExcel->getActiveSheet()->getCell('AA' . $i)->getCalculatedValue();
//                $variable28 = $objPHPExcel->getActiveSheet()->getCell('AB' . $i)->getCalculatedValue();
//                $variable29 = $objPHPExcel->getActiveSheet()->getCell('AC' . $i)->getCalculatedValue();
//                $variable30 = $objPHPExcel->getActiveSheet()->getCell('AD' . $i)->getCalculatedValue();
//                $variable31 = $objPHPExcel->getActiveSheet()->getCell('AE' . $i)->getCalculatedValue();
//                $variable32 = $objPHPExcel->getActiveSheet()->getCell('AF' . $i)->getCalculatedValue();
//                $variable33 = $objPHPExcel->getActiveSheet()->getCell('AG' . $i)->getCalculatedValue();
//                $variable34 = $objPHPExcel->getActiveSheet()->getCell('AH' . $i)->getCalculatedValue();
//                $variable35 = $objPHPExcel->getActiveSheet()->getCell('AI' . $i)->getCalculatedValue();
//                $variable36 = $objPHPExcel->getActiveSheet()->getCell('AJ' . $i)->getCalculatedValue();
//                $variable37 = $objPHPExcel->getActiveSheet()->getCell('AK' . $i)->getCalculatedValue();
//                $variable38 = $objPHPExcel->getActiveSheet()->getCell('AL' . $i)->getCalculatedValue();
//                $variable39 = $objPHPExcel->getActiveSheet()->getCell('AM' . $i)->getCalculatedValue();
//                $variable40 = $objPHPExcel->getActiveSheet()->getCell('AN' . $i)->getCalculatedValue();
//                $variable41 = $objPHPExcel->getActiveSheet()->getCell('AO' . $i)->getCalculatedValue();
//                $variable42 = $objPHPExcel->getActiveSheet()->getCell('AP' . $i)->getCalculatedValue();
//                $variable43 = $objPHPExcel->getActiveSheet()->getCell('AQ' . $i)->getCalculatedValue();
//                $variable44 = $objPHPExcel->getActiveSheet()->getCell('AR' . $i)->getCalculatedValue();
//                $variable45 = $objPHPExcel->getActiveSheet()->getCell('AS' . $i)->getCalculatedValue();
//                $variable46 = $objPHPExcel->getActiveSheet()->getCell('AT' . $i)->getCalculatedValue();
//                $variable47 = $objPHPExcel->getActiveSheet()->getCell('AU' . $i)->getCalculatedValue();
//                $variable48 = $objPHPExcel->getActiveSheet()->getCell('AV' . $i)->getCalculatedValue();
//                $variable49 = $objPHPExcel->getActiveSheet()->getCell('AW' . $i)->getCalculatedValue();
//                $variable50 = $objPHPExcel->getActiveSheet()->getCell('AX' . $i)->getCalculatedValue();
//                $variable51 = $objPHPExcel->getActiveSheet()->getCell('AY' . $i)->getCalculatedValue();
//                $variable52 = $objPHPExcel->getActiveSheet()->getCell('AZ' . $i)->getCalculatedValue();
//                $variable53 = $objPHPExcel->getActiveSheet()->getCell('BA' . $i)->getCalculatedValue();
//                $variable54 = $objPHPExcel->getActiveSheet()->getCell('BB' . $i)->getCalculatedValue();
//                $variable55 = $objPHPExcel->getActiveSheet()->getCell('BC' . $i)->getCalculatedValue();
//
//
//                echo '<tr>';
//                // GRUPO PLOMO CLARO
//                echo '<td>' . $variable1 . '</td>'; //N°
//                echo '<td>' . $variable2 . '</td>'; // ALTA REPARTICIÓN
//                // GRUPO AZUL
//                echo '<td>' . $variable3 . '</td>'; // REPARTICIÓN
//                echo '<td>' . $variable4 . '</td>'; // PROCESO TRANSVERSAL
//                echo '<td>' . $variable5 . '</td>'; // PROCESO CRÍTICO
//                echo '<td>' . $variable6 . '</td>'; // SUBPROCESO
//                echo '<td>' . $variable7 . '</td>'; // PONDERACIÓN ESTRATÉGICA SUBPROCESO
//                echo '<td>' . $variable8 . '</td>'; // ETAPA
//                echo '<td>' . $variable9 . '</td>'; // OBJETIVO
//                // GRUPO NARANJO
//                echo '<td>' . $variable10 . '</td>'; // DESCRIPCIÓN  RIESGO ESPECÍFICO
//                echo '<td>' . $variable11 . '</td>'; // FUENTE DE RIESGO
//                echo '<td>' . $variable12 . '</td>'; // TIPO DE RIESGO
//                echo '<td>' . $variable13 . '</td>'; // SEÑAL DE ALERTA LA/FT/DF ASOCIADA
//                echo '<td>' . $variable14 . '</td>'; // CARGO(S) FUNCIONARIO RELACIONADO
//                echo '<td>' . $variable15 . '</td>'; // PROBABILIDAD: CLASIF.
//                echo '<td>' . $variable16 . '</td>'; // PROBABILIDAD: VALOR.
//                echo '<td>' . $variable17 . '</td>'; // IMPACTO: CLASIF.
//                echo '<td>' . $variable18 . '</td>'; // PROBABILIDAD: VALOR.
//                echo '<td>' . $variable19 . '</td>'; // SEVERIDAD DEL  RIESGO: CLASIF.
//                echo '<td>' . $variable20 . '</td>'; // SEVERIDAD DEL  RIESGO: VALOR.
//                // GRUPO PLOMO OBSCURO
//                echo '<td>' . $variable21 . '</td>'; // DESCRIPCIÓN DEL CONTROL
//                echo '<td>' . $variable22 . '</td>'; //  Cumple elementos de Control adecuado
//                echo '<td>' . $variable23 . '</td>'; // NIVEL DE EFECTIVIDAD: PERIODICIDAD
//                echo '<td>' . $variable24 . '</td>'; // NIVEL DE EFECTIVIDAD: OPORTUNIDAD
//                echo '<td>' . $variable25 . '</td>'; // NIVEL DE EFECTIVIDAD: AUTOMATIZACION
//                echo '<td>' . $variable26 . '</td>'; // VALOR
//                // GRUPO VERDE
//                echo '<td>' . $variable27 . '</td>'; // RIESGO ESPECIFICO: NIVEL
//                echo '<td>' . $variable28 . '</td>'; // RIESGO ESPECIFICO: VALOR
//                echo '<td>' . $variable29 . '</td>'; // ETAPA: NIVEL
//                echo '<td>' . $variable30 . '</td>'; // ETAPA: VALOR
//                echo '<td>' . $variable31 . '</td>'; // SUBPROCESO: NIVEL
//                echo '<td>' . $variable32 . '</td>'; // SUBPROCESO: VALOR
//                echo '<td>' . $variable33 . '</td>'; // SUBPROCESO: VALOR
//                echo '<td>' . $variable34 . '</td>'; // SUBPROCESO: RANKING
//                echo '<td>' . $variable35 . '</td>'; // PROCESO: NIVEL
//                echo '<td>' . $variable36 . '</td>'; // PROCESO: VALOR
//                echo '<td>' . $variable37 . '</td>'; // PROCESO: RANKING
//                //GRUPO AZUL
//                echo '<td>' . $variable38 . '</td>'; //  Estrategia Genérica 
//                echo '<td>' . $variable39 . '</td>'; // Descripción de la Estrategia a Aplicar 
//                echo '<td>' . $variable40 . '</td>'; // Efecto Potencial en la Severidad de Riesgo y/o Efectividad del Control (11)
//                echo '<td>' . $variable41 . '</td>'; // Efecto Potencial en la Severidad de Riesgo y/o Efectividad del Control (11)
//                echo '<td>' . $variable42 . '</td>'; // Efecto Potencial en la Severidad de Riesgo y/o Efectividad del Control (11)
//                echo '<td>' . $variable43 . '</td>'; //Responsable de la Estrategia (12)     
//                echo '<td>' . $variable44 . '</td>'; //  Plazo 
//                echo '<td>' . $variable45 . '</td>'; // Indicador de Logro (14)
//                echo '<td>' . $variable46 . '</td>'; // Periodo Medición del Indicador (15) 
//                echo '<td>' . $variable47 . '</td>'; //  Meta
//                echo '<td>' . $variable48 . '</td>'; // Evidencia que se Observará (17)
//                // GRUPO PLOMO ULTIMO
//                echo '<td>' . $variable49 . '</td>'; // Período (fecha) efectiva de evaluación de implementación de la estrategia
//                echo '<td>' . $variable50 . '</td>'; // Resultados de la medición de las metas 
//                echo '<td>' . $variable51 . '</td>'; // Evidencia del cumplimiento
//                echo '<td>' . $variable52 . '</td>'; // Motivo del no cumplimiento o cumplimiento pacial (Si corresponde)   
//                echo '<td>' . $variable53 . '</td>'; // Proyecciones de cumplimiento (Si corresponde)
//                echo '<td>' . $variable54 . '</td>'; // Recomendaciones (Si corresponde)
//                echo '<td>' . $variable55 . '</td>'; // Descripción de la estrategia a aplicar 
//                echo '</tr>';
//            }
//
////		
////		
//        }
////	
////        
//        echo '<table>';
//        
        $datos = $this->session->userdata('usuario');
        $datos2['var'] = "table";
        $this->load->view('proyecto/header', $datos2);
        $this->load->view('proyecto/print/carga', $datos);
        $this->load->view('proyecto/footer');
//        
    }

}
