<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function index() {
            $datos['menu'] = 'inicio'; 
            $this->load->view('Publicitaria/header', $datos);
            $this->load->view('Publicitaria/index');
            $this->load->view('Publicitaria/footer');
    }

    public function nosotros() {
        $datos['menu'] = 'nosotros';
        $this->load->view('Publicitaria/header', $datos);
        $this->load->view('Publicitaria/nosotros');
        $this->load->view('Publicitaria/footer');
    }

    public function noticias() {
        $datos['menu'] = 'noticias';
        $this->load->view('Publicitaria/header', $datos);
        $this->load->view('Publicitaria/noticias');
        $this->load->view('Publicitaria/footer');
    }

    public function contact() {
        $datos['menu'] = 'conact';
        $this->load->view('Publicitaria/header', $datos);
        $this->load->view('Publicitaria/404_noticias');
        $this->load->view('Publicitaria/footer');
    }

    public function envio() {

        $nombre = $this->input->post("txtnombre");
        $email = $this->input->post("txtemail");
        $cbxemail = $this->input->post("cbxemail");
        $cbxtitulo = $this->input->post("txttitulo");
        $cbxmensagge = $this->input->post("txtmensage");


        $destinatario = "gabriel.loyola.info@gmail.com";
        $asunto = "Este mensaje es de prueba";
        $cuerpo = ' 
                        <html> 
                        <head> 
                           <title>Enviar Informacion</title> 
                        </head> 
                        <body> 
                        <h1>al respecto se informa</h1> 
                        <p> 
                         '.$cbxmensagge.'
                        </p> 
                        </body> 
                        </html> 
                        ';

        //para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        //dirección del remitente 
        $headers .= "From: Persona <'.$email.'>\r\n";

        //dirección de respuesta, si queremos que sea distinta que la del remitente 
        //$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 
        //ruta del mensaje desde origen a destino 
        // $headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 
        //direcciones que recibián copia 
        // $headers .= "Cc: maria@desarrolloweb.com\r\n"; 
        //direcciones que recibirán copia oculta 
        //$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

        mail($destinatario, $asunto, $cuerpo, $headers);
        echo "<script>alert('A la brevedad le enviaremos informacion');</script>";
        $datos['menu'] = 'conact';
        $this->load->view('Publicitaria/header', $datos);
        $this->load->view('Publicitaria/contactanos');
        $this->load->view('Publicitaria/footer');
//        
    }

}
