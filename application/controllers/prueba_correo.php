<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu_reporte
 *
 * @author El_Lorax
 */
class prueba_correo extends CI_Controller {


    public function index() {
        $rut = '';
        $nombre ='patricio urzua';
        $correo1 = 'patricio.urzua@carabineros.cl';

        $grado = 'cpr';
        $this->load->library("MY_PHPMailer");
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->Host = "10.10.10.19";
        $mail->SMTPAuth = true;
        $mail->Username = "003613X";
        $mail->Password = "31dejulio3";
        $mail->From = "gabriel.loyolaz@carabineros.cl";
        $mail->FromName = "Sistema de p7";
        $mail->AddAddress($correo1, $nombre);
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->Subject = "Intención de Permuta";
        $contenido = "<html><head></head><body>";
        $contenido = $contenido . "<p align='CENTER' style='font-size:25'>";
        $contenido = $contenido . "Sistema Automatizado De Gesti&oacute;n De Traslados<br>";
        $contenido = $contenido . "S.A.T<br>Sistema De p7<br>";
        $contenido = $contenido . "</p><div align='CENTER'>";
        $contenido = $contenido . "<p style='width:600px; text-align:justify;font-size:18;'>";
        $contenido = $contenido . "_____________________________<br><br>";
        $contenido = $contenido . "Estimado (a) " . $grado . " " . $nombre . ", con esta fecha (" . date("d/m/Y") . ") ";
        $contenido = $contenido . "BLA BLA";
        $contenido = $contenido . "ingresar al sistema presione ac&aacute; <a href='172.16.70.10:81/p7'>172.16.70.10:81/p7</a>";
        $contenido = $contenido . "_____________________________";
        $contenido = $contenido . "</p></div><br><br><br><br><div align='CENTER'>@Carabineros de Chile<br>";
        $contenido = $contenido . "Direcci&oacute;n Nacional de Personal</div><br><br><br><br><div align='CENTER'>";
        $contenido = $contenido . "Este E-Mail es una respuesta autom&aacute;tica del sistema ";
        $contenido = $contenido . "<a href='172.16.70.10:81/p7'>P7</a>, No responder este mensaje.";
        $contenido = $contenido . "</div></body></html>";
        $mail->Body = $contenido;
        if ($mail->Send()) {
            return "funciona";
        } else {
            return "error";
        }
    }


}
