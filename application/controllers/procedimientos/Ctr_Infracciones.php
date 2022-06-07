<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Infracciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code
        $this->load->helper(array('getFecha'));
    }

    public function index() {
        $this->load->model('M_Inicio');
        $datos['tipoinfraccion'] = $this->M_Inicio->consulta_lista("tipoinfraccion");
        $datos['lugarocurrencia'] = $this->M_Inicio->consulta_lista("lugarocurrencia");
        $datos['region'] = $this->M_Inicio->consulta_lista("region");
        $this->load->view('proyecto/evento/vista_infraccion', $datos);
    }

    public function validainfraccion() {
        $this->load->model('Crud_Infraccion');
        $resultado = $this->Crud_Infraccion->valida_infraccion($this->session->userdata('idprodacto'));
        if ($resultado == true) {
            echo 0;
            $this->session->set_userdata("idprodacto","");
        } else {
            echo 1;
        }
    }

    public function buscar_evidencia() {


        $idinfraccion = $this->input->post('idinfraccion');

        $this->load->model('Crud_Infraccion');
        $resultado = $this->Crud_Infraccion->get_img($idinfraccion);


        $this->load->view('proyecto/vistas/vehiculo/vista_evidencia', $resultado);
    }

    public function buscar_funcionario() {
        $rutfuncionario = $this->input->post('rutfuncionario');
        if ($this->valida_rut($rutfuncionario) == true) {

            $rut = preg_replace('/[^k0-9]/i', '', $rutfuncionario);
            $dv = substr($rut, -1);
            $numero = substr($rut, 0, strlen($rut) - 1);
            $this->load->model('Crud_Infraccion');
            $resultado = $this->Crud_Infraccion->buscafuncionario($numero, $this->session->userdata('identidad'));
            if (empty($resultado)) {
                echo "No hay datos para este RUN";
            } else {
                foreach ($resultado as $val) {
                    echo "<tr style='text-align: left;' class='identificador' data-valor='" . $val['idfun'] . "' Id='fila" . $val['idfun'] . "'>";

                    echo "<td>" . $val['RunUsuario'] . "" . $val['DigitoUsuario'] . "</td>";
                    echo "<td>" . $val['PrimerNombre'] . " " . $val['SegundoNombre'] . " " . $val['ApellidoPaterno'] . " " . $val['ApellidoMaterno'] . "</td>";
                    echo "<td>" . $val['Correo'] . "</td>";
                    echo "<td>" . $val['Telefono'] . "</td>";
                    echo "<td><button id='btneliminar2' onclick='remueve(" . $val['idfun'] . ")' type='button' value=" . $val['idfun'] . " name='chkSeleccion'>Eliminar</button></td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "RUN no valido";
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
            return false;
    }

    public function get_location() {
        $this->load->model('Crud_Infraccion');
        $resultado = $this->Crud_Infraccion->get_location($this->session->userdata('idprodacto'));

        
        echo json_encode($resultado, true);
    }

    public function save_infraccion2() {


        $this->load->library('upload');

        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = 'evi/';
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['max_size'] = 0;
            $config['encrypt_name'] = TRUE;
        }
        $this->upload->initialize($config);
        $this->upload->do_upload('file');

        /* Nombre de archivos */
        echo "Nombre" . $this->upload->data('file_name') . "</BR>";
        echo $this->upload->data('orig_name');

        if (!empty($_FILES['file2']['name'])) {
            $config['upload_path'] = 'evi/';
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['max_size'] = 0;
            $config['encrypt_name'] = TRUE;
        }
        $this->upload->initialize($config);
        $this->upload->do_upload('file2');

        /* Nombre de archivos */
        echo "Nombre" . $this->upload->data('file_name') . "</BR>";
        echo $this->upload->data('orig_name');
    }

    public function save_infraccion() {


        $archivo1 = $this->input->post('archivo1');
        $archivo2 = $this->input->post('archivo2');
        $fechasuceso = $this->input->post('fechasuceso');
        $horasuceso = $this->input->post('horasuceso');
        $fechacitacion = $this->input->post('fechacitacion');
        $horacitacion = $this->input->post('horacitacion');
        $numboleta = $this->input->post('numboleta');
        $cbxtipoinfraccion = $this->input->post('cbxtipoinfraccion');
        $cbxlugarocurrencia = $this->input->post('cbxlugarocurrencia');
        $cbxregion = $this->input->post('cbxregion');
        $cbxprovincia = $this->input->post('cbxprovincia');
        $cbxcomuna = $this->input->post('cbxcomuna');
        $idnumero = $this->input->post('idnumero');
        $iddepto = $this->input->post('iddepto');
        $idblock = $this->input->post('idblock');
        $txtvilla = $this->input->post('txtvilla');
        $latitudinfraccion = $this->input->post('latitudinfraccion');
        $longitudinfraccion = $this->input->post('longitudinfraccion');
        $autocompletado2 = $this->input->post('autocompletado2');
        $textarea = $this->input->post('textarea');
        $this->load->model('Crud_Infraccion');


        if ($this->session->userdata('idprodacto') == "") {

            $idprodacto = $this->Crud_Infraccion->save_prodacto($this->session->userdata('idgrupo'), $this->session->userdata('idacto'));
            $this->session->set_userdata("idprodacto", $idprodacto->ID);


            $this->load->library('upload');
            $status = "";
            $carpeta = "C:/xampp/htdocs/gespol/Evi/";
            $this->load->library('encrypt');

            $img1 = "";
            $img2 = "";



            if ($archivo1 == "") {
                $img1 = "";
            } else {

                if (!empty($_FILES['file']['name'])) {

                    $tamano = $_FILES["file"]['size'];
                    $tipo = $_FILES["file"]['type'];
                    $archivo = $_FILES["file"]['name'];
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $Proporciones_Archivo = getimagesize($_FILES["file"]['tmp_name']);
                    $Ancho = $Proporciones_Archivo[0];
                    $Alto = $Proporciones_Archivo[1];
                    $Temporal_Archivo = $_FILES["file"]['tmp_name'];
                    $extension = explode(".", $archivo);
                    $num = count($extension) - 1;
                    $nombre = basename($archivo, "." . $extension[$num]);
                    $imagen = $nombre . "_" . $prefijo . "." . $extension[$num];




                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('blowfish'));
                    $cifrado = openssl_encrypt($imagen, 'blowfish', "APANtByIGI1BpVXZTJgcsAG8GZl8pdwwa84", 0, $iv);
                    $nomre = base64_encode($cifrado);
                    $imagen = $nomre . "." . $extension[$num];


                    if ($archivo != "") {

                        $ext = strtolower($extension[$num]);
                        if ($ext == 'jpg' or $ext == 'png' or $ext == 'bmp') {

                            $destino = $carpeta . $imagen;

                            if (is_uploaded_file($Temporal_Archivo)) {

                                move_uploaded_file($Temporal_Archivo, $destino);


                                $Nueva_Imagen = imagecreatetruecolor(600, 400);     /* Crea una nueva imagen en blanco de 600 x 400 */

                                //$Origen = imagecreatefromjpeg($destino);            /* Crea una imagen en base de otra imagen */

                                if ($ext == 'png') {
                                    $Origen = imagecreatefrompng($destino);
                                    imagealphablending($Nueva_Imagen, false);
                                    imagesavealpha($Nueva_Imagen, true);
                                    $transparent = imagecolorallocatealpha($Nueva_Imagen, 255, 255, 255, 127);
                                    imagefilledrectangle($Nueva_Imagen, 0, 0, $Ancho, $Alto, $transparent);
                                    $src_w = imagesx($Origen);
                                    $src_h = imagesy($Origen);
                                    imagecopyresampled($Nueva_Imagen, $Origen, 0, 0, 0, 0, $Ancho, $Alto, $src_w, $src_h);
                                } else {
                                    $Origen = imagecreatefromjpeg($destino);
                                    imagecopyresized($Nueva_Imagen, $Origen, 0, 0, 0, 0, 600, 400, $Ancho, $Alto);      /* Modifica la imagen cargada y la agrega a la imagen en Blanco */
                                    imagejpeg($Nueva_Imagen, $destino, 15); /* Remplaza la imagen */
                                }

                                $img1 = $imagen;
                            } else {
                                $status = "Error: No se logro subir el archivo";
                            }
                        } else {
                            $status = "Error: Solo se permiten (*.jpg,*.png,*.bmp)";
                        }
                    } else {
                        $status = "Error: Archivo no encontrada para subir al Servidor";
                    }
                }
            }

            if ($archivo2 == "") {
                $img2 = "";
            } else {
                if (!empty($_FILES['file2']['name'])) {

                    $tamano = $_FILES["file2"]['size'];
                    $tipo = $_FILES["file2"]['type'];
                    $archivo = $_FILES["file2"]['name'];
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $Proporciones_Archivo = getimagesize($_FILES["file2"]['tmp_name']);
                    $Ancho = $Proporciones_Archivo[0];
                    $Alto = $Proporciones_Archivo[1];
                    $Temporal_Archivo = $_FILES["file2"]['tmp_name'];
                    $extension = explode(".", $archivo);
                    $num = count($extension) - 1;
                    $nombre = basename($archivo, "." . $extension[$num]);
                    $imagen2 = $nombre . "_" . $prefijo . "." . $extension[$num];


                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('blowfish'));
                    $cifrado = openssl_encrypt($imagen2, 'blowfish', "APANtByIGI1BpVXZTJgcsAG8GZl8pdwwa84", 0, $iv);
                    $nomre = base64_encode($cifrado);
                    $imagen2 = $nomre . "." . $extension[$num];


                    if ($archivo != "") {
                        $ext = strtolower($extension[$num]);
                        if ($ext == 'jpg' or $ext == 'png' or $ext == 'bmp') {

                            $destino = $carpeta . $imagen2;

                            if (is_uploaded_file($Temporal_Archivo)) {

                                move_uploaded_file($Temporal_Archivo, $destino);
                                $Nueva_Imagen = imagecreatetruecolor(600, 400);

                                if ($ext == 'png') {
                                    $Origen = imagecreatefrompng($destino);
                                    imagealphablending($Nueva_Imagen, false);
                                    imagesavealpha($Nueva_Imagen, true);
                                    $transparent = imagecolorallocatealpha($Nueva_Imagen, 255, 255, 255, 127);
                                    imagefilledrectangle($Nueva_Imagen, 0, 0, $Ancho, $Alto, $transparent);
                                    $src_w = imagesx($Origen);
                                    $src_h = imagesy($Origen);
                                    imagecopyresampled($Nueva_Imagen, $Origen, 0, 0, 0, 0, $Ancho, $Alto, $src_w, $src_h);
                                } else {
                                    $Origen = imagecreatefromjpeg($destino);
                                    imagecopyresized($Nueva_Imagen, $Origen, 0, 0, 0, 0, 600, 400, $Ancho, $Alto);      /* Modifica la imagen cargada y la agrega a la imagen en Blanco */
                                    imagejpeg($Nueva_Imagen, $destino, 15); /* Remplaza la imagen */
                                }
                                $img2 = $imagen2;
                            } else {
                                $status = "Error: No se logro subir el archivo";
                            }
                        } else {
                            $status = "Error: Solo se permiten (*.jpg,*.png,*.bmp)";
                        }
                    } else {
                        $status = "Error: Archivo no encontrada para subir al Servidor";
                    }
                }
            }









            $data = array(
                'idta_prodacto' => $idprodacto->ID,
                'idta_tipoinfraccion' => $cbxtipoinfraccion,
                'idta_lugarocurrencia' => $cbxlugarocurrencia,
                'idta_region' => $cbxregion,
                'idta_provincia' => $cbxprovincia,
                'idta_comuna' => $cbxcomuna,
                'td_fechasuceso' => $fechasuceso,
                'td_horasuceso' => $horasuceso,
                'td_fechacitacion' => $fechacitacion,
                'td_horacitacion' => $horacitacion,
                'td_numboleta' => $numboleta,
                'td_numero' => $idnumero,
                'td_depto' => $iddepto,
                'td_block' => $idblock,
                'td_villapoblacion' => $txtvilla,
                'td_latitud' => $latitudinfraccion,
                'td_longitud' => $longitudinfraccion,
                'td_direccion' => $autocompletado2,
                'td_descripcion' => $textarea,
                'td_evidencia1' => $img1,
                'td_evidencia2' => $img2,
                'td_estado' => 0);


            $resultado = $this->Crud_Infraccion->save_infraccion($data);

            $this->session->set_userdata("idinfraccion", $resultado->ID);

            //  echo $idprodacto->ID;

            if (empty($resultado)) {
                echo "Error de ingreso";
            } else {
                echo 0;
            }
        } else {



//            $destino="http://localhost:8080/gespol/evi/";
//
//            echo $_FILES['file']['name']."llega";
//            
//            $imagen = $this->optimizar_imagen($_FILES['file']['tmp_name'], $destino, 40);
//            
//            return false;
//
//            if (!empty($_FILES['file']['name'])) {
//
//
//
//                $tamano = $_FILES["file"]['size'];          /* Tamaño del archivo en bytes */
//                $tipo = $_FILES["file"]['type'];            /* Extencion del archivo */
//                $archivo = $_FILES["file"]['name'];         /* Nombre del archivo */
//                $prefijo = substr(md5(uniqid(rand())), 0, 6);    /* Prefijo aleatorio */
//
//                $Proporciones_Archivo = getimagesize($_FILES["file"]['tmp_name']);  /* Obtencion de las proporciones del archivo */
//                $Ancho = $Proporciones_Archivo[0];                                   /* Proporcion en Ancho */
//                $Alto = $Proporciones_Archivo[1];                                    /* Proporcion en Alto */
//                $Temporal_Archivo = $_FILES["file"]['tmp_name'];
//
//                $extension = explode(".", $archivo);
//                $num = count($extension) - 1;
//
//                $nombre = basename($archivo, "." . $extension[$num]);     /* Nombre base del archivo */
//                $imagen = $nombre . "_" . $prefijo . "." . $extension[$num];   /* Nombre real de la imagen */
//
//
//
//
//                $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('blowfish'));
//                // Ciframos los datos usando blowfish
//                $cifrado = openssl_encrypt($imagen, 'blowfish', "APANtByIGI1BpVXZTJgcsAG8GZl8pdwwa84", 0, $iv);
//
//                $nomre = base64_encode($cifrado);
//
//                $imagen = $nomre . "." . $extension[$num];
//
//
////                $this->encrypt->set_cipher(mcrypt_enc_get_modes_name);
////
////                $imagen2 = $this->encrypt->encode($imagen);
////               // strtr($imagen2, array('+' => '', '=' => '', '/' => ''));
////                $imagen = $imagen2 . "." . $extension[$num];
//
//
//                if ($archivo != "") {
//
//                    $ext = strtolower($extension[$num]);
//                    if ($ext == 'jpg' or $ext == 'png' or $ext == 'bmp') {
//
//                        $destino = $carpeta . $imagen;
//
//                        if (is_uploaded_file($Temporal_Archivo)) {
//
//
//                            move_uploaded_file($Temporal_Archivo, $destino);
//
//
//
//                            $Nueva_Imagen = imagecreatetruecolor(600, 400);     /* Crea una nueva imagen en blanco de 600 x 400 */
//
//                            //$Origen = imagecreatefromjpeg($destino);            /* Crea una imagen en base de otra imagen */
//
//                            if ($ext == 'png') {
//                                $Origen = imagecreatefrompng($destino);
//                                imagealphablending($Nueva_Imagen, false);
//                                imagesavealpha($Nueva_Imagen, true);
//                                $transparent = imagecolorallocatealpha($Nueva_Imagen, 255, 255, 255, 127);
//                                imagefilledrectangle($Nueva_Imagen, 0, 0, $Ancho, $Alto, $transparent);
//                                $src_w = imagesx($Origen);
//                                $src_h = imagesy($Origen);
//                                imagecopyresampled($Nueva_Imagen, $Origen, 0, 0, 0, 0, $Ancho, $Alto, $src_w, $src_h);
//                            } else {
//                                $Origen = imagecreatefromjpeg($destino);
//                                imagecopyresized($Nueva_Imagen, $Origen, 0, 0, 0, 0, 600, 400, $Ancho, $Alto);      /* Modifica la imagen cargada y la agrega a la imagen en Blanco */
//                                imagejpeg($Nueva_Imagen, $destino, 15); /* Remplaza la imagen */
//                            }
//
//                            $status = "Archivo subido: <b>" . $imagen . "</b>";
//                            echo $status;
//                        } else {
//                            $status = "Error: No se logro subir el archivo";
//                        }
//                    } else {
//                        $status = "Error: Solo se permiten (*.jpg,*.png,*.bmp)";
//                    }
//                } else {
//                    $status = "Error: Archivo no encontrada para subir al Servidor";
//                }
//
//                echo $status;
//            }
//


            $this->load->library('upload');
            $status = "";
            $carpeta = "C:/xampp/htdocs/gespol/Evi/";
            $this->load->library('encrypt');

            $img1 = "";
            $img2 = "";


            if ($archivo1 == "") {
                $img1 = "";
            } else {

                if (!empty($_FILES['file']['name'])) {

                    $tamano = $_FILES["file"]['size'];
                    $tipo = $_FILES["file"]['type'];
                    $archivo = $_FILES["file"]['name'];
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $Proporciones_Archivo = getimagesize($_FILES["file"]['tmp_name']);
                    $Ancho = $Proporciones_Archivo[0];
                    $Alto = $Proporciones_Archivo[1];
                    $Temporal_Archivo = $_FILES["file"]['tmp_name'];
                    $extension = explode(".", $archivo);
                    $num = count($extension) - 1;
                    $nombre = basename($archivo, "." . $extension[$num]);
                    $imagen = $nombre . "_" . $prefijo . "." . $extension[$num];




                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('blowfish'));
                    $cifrado = openssl_encrypt($imagen, 'blowfish', "APANtByIGI1BpVXZTJgcsAG8GZl8pdwwa84", 0, $iv);
                    $nomre = base64_encode($cifrado);
                    $imagen = $nomre . "." . $extension[$num];


                    if ($archivo != "") {

                        $ext = strtolower($extension[$num]);
                        if ($ext == 'jpg' or $ext == 'png' or $ext == 'bmp') {

                            $destino = $carpeta . $imagen;

                            if (is_uploaded_file($Temporal_Archivo)) {

                                move_uploaded_file($Temporal_Archivo, $destino);


                                $Nueva_Imagen = imagecreatetruecolor(600, 400);     /* Crea una nueva imagen en blanco de 600 x 400 */

                                //$Origen = imagecreatefromjpeg($destino);            /* Crea una imagen en base de otra imagen */

                                if ($ext == 'png') {
                                    $Origen = imagecreatefrompng($destino);
                                    imagealphablending($Nueva_Imagen, false);
                                    imagesavealpha($Nueva_Imagen, true);
                                    $transparent = imagecolorallocatealpha($Nueva_Imagen, 255, 255, 255, 127);
                                    imagefilledrectangle($Nueva_Imagen, 0, 0, $Ancho, $Alto, $transparent);
                                    $src_w = imagesx($Origen);
                                    $src_h = imagesy($Origen);
                                    imagecopyresampled($Nueva_Imagen, $Origen, 0, 0, 0, 0, $Ancho, $Alto, $src_w, $src_h);
                                } else {
                                    $Origen = imagecreatefromjpeg($destino);
                                    imagecopyresized($Nueva_Imagen, $Origen, 0, 0, 0, 0, 600, 400, $Ancho, $Alto);      /* Modifica la imagen cargada y la agrega a la imagen en Blanco */
                                    imagejpeg($Nueva_Imagen, $destino, 15); /* Remplaza la imagen */
                                }

                                $img1 = $imagen;
                            } else {
                                $status = "Error: No se logro subir el archivo";
                            }
                        } else {
                            $status = "Error: Solo se permiten (*.jpg,*.png,*.bmp)";
                        }
                    } else {
                        $status = "Error: Archivo no encontrada para subir al Servidor";
                    }
                }
            }

            if ($archivo2 == "") {
                $img2 = "";
            } else {
                if (!empty($_FILES['file2']['name'])) {

                    $tamano = $_FILES["file2"]['size'];
                    $tipo = $_FILES["file2"]['type'];
                    $archivo = $_FILES["file2"]['name'];
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $Proporciones_Archivo = getimagesize($_FILES["file2"]['tmp_name']);
                    $Ancho = $Proporciones_Archivo[0];
                    $Alto = $Proporciones_Archivo[1];
                    $Temporal_Archivo = $_FILES["file2"]['tmp_name'];
                    $extension = explode(".", $archivo);
                    $num = count($extension) - 1;
                    $nombre = basename($archivo, "." . $extension[$num]);
                    $imagen2 = $nombre . "_" . $prefijo . "." . $extension[$num];


                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('blowfish'));
                    $cifrado = openssl_encrypt($imagen2, 'blowfish', "APANtByIGI1BpVXZTJgcsAG8GZl8pdwwa84", 0, $iv);
                    $nomre = base64_encode($cifrado);
                    $imagen2 = $nomre . "." . $extension[$num];


                    if ($archivo != "") {
                        $ext = strtolower($extension[$num]);
                        if ($ext == 'jpg' or $ext == 'png' or $ext == 'bmp') {

                            $destino = $carpeta . $imagen2;

                            if (is_uploaded_file($Temporal_Archivo)) {

                                move_uploaded_file($Temporal_Archivo, $destino);
                                $Nueva_Imagen = imagecreatetruecolor(600, 400);

                                if ($ext == 'png') {
                                    $Origen = imagecreatefrompng($destino);
                                    imagealphablending($Nueva_Imagen, false);
                                    imagesavealpha($Nueva_Imagen, true);
                                    $transparent = imagecolorallocatealpha($Nueva_Imagen, 255, 255, 255, 127);
                                    imagefilledrectangle($Nueva_Imagen, 0, 0, $Ancho, $Alto, $transparent);
                                    $src_w = imagesx($Origen);
                                    $src_h = imagesy($Origen);
                                    imagecopyresampled($Nueva_Imagen, $Origen, 0, 0, 0, 0, $Ancho, $Alto, $src_w, $src_h);
                                } else {
                                    $Origen = imagecreatefromjpeg($destino);
                                    imagecopyresized($Nueva_Imagen, $Origen, 0, 0, 0, 0, 600, 400, $Ancho, $Alto);      /* Modifica la imagen cargada y la agrega a la imagen en Blanco */
                                    imagejpeg($Nueva_Imagen, $destino, 15); /* Remplaza la imagen */
                                }
                                $img2 = $imagen2;
                            } else {
                                $status = "Error: No se logro subir el archivo";
                            }
                        } else {
                            $status = "Error: Solo se permiten (*.jpg,*.png,*.bmp)";
                        }
                    } else {
                        $status = "Error: Archivo no encontrada para subir al Servidor";
                    }
                }
            }





















//            if ($archivo1 == "") {
//                $img1 = "";
//            } else {
//                if (!empty($_FILES['file']['name'])) {
//                    $config['upload_path'] = 'evi/';
//                    $config['allowed_types'] = 'png|jpg|jpeg';
//                    $config['max_size'] = 0;
//                    $config['encrypt_name'] = TRUE;
//                    $this->upload->initialize($config);
//                    $this->upload->do_upload('file');
//                    $img1 = $this->upload->data('file_name');
//                }
//            }
//
//            if ($archivo2 == "") {
//                $img2 = "";
//            } else {
//                if (!empty($_FILES['file2']['name'])) {
//                    $config['upload_path'] = 'evi/';
//                    $config['allowed_types'] = 'png|jpg|jpeg';
//                    $config['max_size'] = 0;
//                    $config['encrypt_name'] = TRUE;
//                    $config['width'] = 800;
//                    $config['height'] = 800;
//                    $this->upload->initialize($config);
//                    $this->upload->do_upload('file2');
//                    $img2 = $this->upload->data('file_name');
//                }
//            }






            $data = array(
                'idta_prodacto' => $this->session->userdata('idprodacto'),
                'idta_tipoinfraccion' => $cbxtipoinfraccion,
                'idta_lugarocurrencia' => $cbxlugarocurrencia,
                'idta_region' => $cbxregion,
                'idta_provincia' => $cbxprovincia,
                'idta_comuna' => $cbxcomuna,
                'td_fechasuceso' => $fechasuceso,
                'td_horasuceso' => $horasuceso,
                'td_fechacitacion' => $fechacitacion,
                'td_horacitacion' => $horacitacion,
                'td_numboleta' => $numboleta,
                'td_numero' => $idnumero,
                'td_depto' => $iddepto,
                'td_block' => $idblock,
                'td_villapoblacion' => $txtvilla,
                'td_latitud' => $latitudinfraccion,
                'td_longitud' => $longitudinfraccion,
                'td_direccion' => $autocompletado2,
                'td_descripcion' => $textarea,
                'td_evidencia1' => $img1,
                'td_evidencia2' => $img2,
                'td_estado' => 0);

            $resultado = $this->Crud_Infraccion->save_infraccion($data);

            $this->session->set_userdata("idinfraccion", $resultado->ID);
            //  echo $idprodacto->ID;

            if (empty($resultado)) {
                echo "Error de ingreso";
            } else {

                echo 1;
            }
        }
    }

    function encrypt($pure_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_Rand);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
        return $encrypted_string;
    }

    function optimizar_imagen($origen, $destino, $calidad) {

//        echo $destino."llega";


        $info = getimagesize($origen);

        if ($info['mime'] == 'image/jpeg') {
            $imagen = imagecreatefromjpeg($origen);
        } else if ($info['mime'] == 'image/gif') {
            $imagen = imagecreatefromgif($origen);
        } else if ($info['mime'] == 'image/png') {
            $imagen = imagecreatefrompng($origen);
        }

        imagejpeg($imagen, $destino, $calidad);

        return $destino;
    }

    public function save_infraccion_fun() {
        $Idusuario = $this->input->post('Idusuario');
        $this->load->model('Crud_Infraccion');
        $data = array(
            'idta_prodacto' => $this->session->userdata('idprodacto'),
            'idta_funcionario' => $Idusuario,
            'td_estado' => 0);
        $prodacto_fun = $this->Crud_Infraccion->save_prodacto_fun($data, $Idusuario, $this->session->userdata('idprodacto'));
        if (empty($prodacto_fun)) {
            echo "Error de ingreso";
        } else {
            echo "Dato Ingresado";
        }
    }

    public function delete_infraccion_fun() {

        if ($this->session->userdata('idprodacto') == "") {
            return 1;
        } else {
            $Idusuario = $this->input->post('Idusuario');
            $this->load->model('Crud_Infraccion');
            $deleteprodacto_fun = $this->Crud_Infraccion->delete_prodacto_fun($Idusuario, $this->session->userdata('idprodacto'));
            return 0;
        }
    }

    public function pdf() {


        $id = base64_decode($this->input->get("id"));
        $this->load->model('Crud_Vehiculo');
        $this->load->model('Crud_Persona');
        $this->load->model('Crud_Funcionario');
        $this->load->model('Crud_Infraccion');
        $this->load->model('Crud_Empresa');

        if ($this->session->userdata('idcalidad') == 1) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($this->session->userdata('idprodacto'));
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccionID($this->session->userdata('idprodacto'), $id);
            $datos['persona'] = $this->Crud_Persona->get_persona($this->session->userdata('idprodacto'));
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($this->session->userdata('idprodacto'));
        }

        if ($this->session->userdata('idcalidad') == 2) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($this->session->userdata('idprodacto'));
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccionID($this->session->userdata('idprodacto'), $id);
            $datos['persona'] = $this->Crud_Persona->get_persona($this->session->userdata('idprodacto'));
            $datos['personadueno'] = $this->Crud_Persona->get_persona_dueno($this->session->userdata('idprodacto'));
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($this->session->userdata('idprodacto'));
        }

        if ($this->session->userdata('idcalidad') == 3) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($this->session->userdata('idprodacto'));
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccionID($this->session->userdata('idprodacto'), $id);
            $datos['empresa'] = $this->Crud_Empresa->get_empresa($this->session->userdata('idprodacto'));
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($this->session->userdata('idprodacto'));
        }

        if ($this->session->userdata('idcalidad') == 4) {
            $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($this->session->userdata('idprodacto'));
            $datos['infraccion'] = $this->Crud_Infraccion->get_infraccionID($this->session->userdata('idprodacto'), $id);
            $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($this->session->userdata('idprodacto'));
        }

//        $datos['funcionarios'] = $this->Crud_Funcionario->get_funcionario($this->session->userdata('idprodacto'));
////        $datos['infraccion'] = $this->crud_infraccion->get_infraccion($this->session->userdata('idprodacto'));
//        $datos['persona'] = $this->Crud_Persona->get_persona($this->session->userdata('idprodacto'));
//        $datos['infraccion'] = $this->Crud_Infraccion->get_infraccionID($this->session->userdata('idprodacto'), $id);
//        $datos['vehiculo'] = $this->Crud_Vehiculo->get_vehiculo($this->session->userdata('idprodacto'));
        $datos['id'] = $id;



        $this->load->library('pdf');

        $this->pdf->load_view('proyecto/vistas/terminarpdf', $datos);

        $this->pdf->set_paper('legal', 'portrait');
        $this->pdf->render();
        #Esto es lo que imprime en el PDF el numero de paginas
        $canvas = $this->pdf->get_canvas();
        $footer = $canvas->open_object();
        $w = $canvas->get_width();
        $h = $canvas->get_height();
        $canvas->page_text($w - 60, $h - 28, "Página {PAGE_NUM} de {PAGE_COUNT}", Font_Metrics::get_font('helvetica'), 6);
        //        $canvas->page_text($w - 590, $h - 28, "El pie de p&aacute;gina del lado izquiero, Guadalajara, Jalisco C.P. XXXXX Tel. XX (XX) XXXX XXXX", Font_Metrics::get_font('helvetica'), 6);
        $canvas->close_object();
        $canvas->add_object($footer, "all");
        $this->pdf->stream('Infraccion_' . $id . '.pdf', array('Attachment' => 0));
        $this->pdf->stream('CuadroDemotrativo.pdf', array('Attachment' => 0));

//        $this->load->library('pdf');
//			$this->pdf->load_html('<html></body>hola</body></html>');
//			$this->pdf->set_paper('legal', 'portrait');
//			$this->pdf->render();
//			$this->pdf->stream('informe' . $elfolio . '.pdf', array('Attachment' => 0));
    }

}
