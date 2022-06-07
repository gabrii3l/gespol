<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Delito extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('getFecha'));
    }

    public function index() {
        $this->load->model('M_Inicio');

        $datos['lugarocurrencia'] = $this->M_Inicio->consulta_lista("lugarocurrencia");
        $datos['adopcion'] = $this->M_Inicio->consulta_lista("adopcion");
        $datos['modoperanti'] = $this->M_Inicio->consulta_lista("modoperanti");
        $datos['delito'] = $this->M_Inicio->consulta_lista("delito");
        $datos['region'] = $this->M_Inicio->consulta_lista("region");
        $this->load->view('proyecto/vistas/delitos/vista_delito', $datos);
    }

    public function save_partepol() {

        $archivo1_delito = $this->input->post('archivo1_delito');
        $archivo2_delito = $this->input->post('archivo2_delito');
        $fechasuceso_delito = $this->input->post('fechasuceso_delito');
        $horasuceso_delito = $this->input->post('horasuceso_delito');
        $fechadenuncia_delito = $this->input->post('fechadenuncia_delito');
        $horadenuncia_delito = $this->input->post('horadenuncia_delito');
        $cbxadopcion_delito = $this->input->post('cbxadopcion_delito');
        $cbxmodoperanti_delito = $this->input->post('cbxmodoperanti_delito');
        $cbxlugar_delito = $this->input->post('cbxlugar_delito');
        $cbxregion_delito = $this->input->post('cbxregion_delito');
        $cbxprovincia_delito = $this->input->post('cbxprovincia_delito');
        $cbxcomuna_delito = $this->input->post('cbxcomuna_delito');
        $idnumero_delito = $this->input->post('idnumero_delito');
        $iddepto_delito = $this->input->post('iddepto_delito');
        $idblock_delito = $this->input->post('idblock_delito');
        $txtvilla_delito = $this->input->post('txtvilla_delito');
        $latituddelito_delito = $this->input->post('latituddelito_delito');
        $longituddelito_delito = $this->input->post('longituddelito_delito');
        $autocompletado_delito = $this->input->post('autocompletado_delito');
        $textarea_delito = $this->input->post('textarea_delito');
        $this->load->model('delito/Crud_Delito');


        if ($this->session->userdata('idprodacto') == "") {

            $idprodacto = $this->Crud_Delito->save_prodacto($this->session->userdata('idgrupo'), $this->session->userdata('idacto'));


            $this->session->set_userdata("idprodacto", $idprodacto->ID);

            $this->load->library('upload');
            $status = "";
            $carpeta = "C:/xampp/htdocs/gespol/Delito/";
            $this->load->library('encrypt');

            $img1 = "";
            $img2 = "";



            if ($archivo1_delito == "") {
                $img1 = "";
            } else {

                if (!empty($_FILES['file_delito']['name'])) {

                    $tamano = $_FILES["file_delito"]['size'];
                    $tipo = $_FILES["file_delito"]['type'];
                    $archivo = $_FILES["file_delito"]['name'];
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $Proporciones_Archivo = getimagesize($_FILES["file_delito"]['tmp_name']);
                    $Ancho = $Proporciones_Archivo[0];
                    $Alto = $Proporciones_Archivo[1];
                    $Temporal_Archivo = $_FILES["file_delito"]['tmp_name'];
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

            if ($archivo2_delito == "") {
                $img2 = "";
            } else {
                if (!empty($_FILES['file2_delito']['name'])) {

                    $tamano = $_FILES["file2_delito"]['size'];
                    $tipo = $_FILES["file2_delito"]['type'];
                    $archivo = $_FILES["file2_delito"]['name'];
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $Proporciones_Archivo = getimagesize($_FILES["file2_delito"]['tmp_name']);
                    $Ancho = $Proporciones_Archivo[0];
                    $Alto = $Proporciones_Archivo[1];
                    $Temporal_Archivo = $_FILES["file2_delito"]['tmp_name'];
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
                'idta_modoperanti' => $cbxmodoperanti_delito,
                'idta_lugaradopcion' => $cbxadopcion_delito,
                'idta_lugarocurrencia' => $cbxlugar_delito,
                'idta_region' => $cbxregion_delito,
                'idta_provincia' => $cbxprovincia_delito,
                'idta_comuna' => $cbxcomuna_delito,
                'td_fechasuceso' => $fechasuceso_delito,
                'td_horasuceso' => $horasuceso_delito,
                'td_fechadenuncia' => $fechadenuncia_delito,
                'td_horadenuncia' => $horadenuncia_delito,
                'td_numero' => $idnumero_delito,
                'td_depto' => $iddepto_delito,
                'td_block' => $idblock_delito,
                'td_villapoblacion' => $txtvilla_delito,
                'td_latitud' => $latituddelito_delito,
                'td_longitud' => $longituddelito_delito,
                'td_direccion' => $autocompletado_delito,
                'td_descripcion' => $textarea_delito,
                'td_evidencia1' => $img1,
                'td_evidencia2' => $img2,
                'td_estado' => 0);

            $resultado = $this->Crud_Delito->save_partepol($data);
            $this->session->set_userdata("idpartepol", $resultado->ID);



            if (empty($resultado)) {
                echo "Error de ingreso";
            } else {
                echo 0;
            }
        } else {



            $this->load->library('upload');
            $status = "";
            $carpeta = "C:/xampp/htdocs/gespol/Delito/";
            $this->load->library('encrypt');

            $img1 = "";
            $img2 = "";


            if ($archivo1_delito == "") {
                $img1 = "";
            } else {

                if (!empty($_FILES['file_delito']['name'])) {

                    $tamano = $_FILES["file_delito"]['size'];
                    $tipo = $_FILES["file_delito"]['type'];
                    $archivo = $_FILES["file_delito"]['name'];
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $Proporciones_Archivo = getimagesize($_FILES["file_delito"]['tmp_name']);
                    $Ancho = $Proporciones_Archivo[0];
                    $Alto = $Proporciones_Archivo[1];
                    $Temporal_Archivo = $_FILES["file_delito"]['tmp_name'];
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

            if ($archivo2_delito == "") {
                $img2 = "";
            } else {
                if (!empty($_FILES['file2_delito']['name'])) {

                    $tamano = $_FILES["file2_delito"]['size'];
                    $tipo = $_FILES["file2_delito"]['type'];
                    $archivo = $_FILES["file2_delito"]['name'];
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $Proporciones_Archivo = getimagesize($_FILES["file2_delito"]['tmp_name']);
                    $Ancho = $Proporciones_Archivo[0];
                    $Alto = $Proporciones_Archivo[1];
                    $Temporal_Archivo = $_FILES["file2_delito"]['tmp_name'];
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
                'idta_prodacto' => $this->session->userdata('idprodacto'),
                'idta_modoperanti' => $cbxmodoperanti_delito,
                'idta_lugaradopcion' => $cbxadopcion_delito,
                'idta_lugarocurrencia' => $cbxlugar_delito,
                'idta_region' => $cbxregion_delito,
                'idta_provincia' => $cbxprovincia_delito,
                'idta_comuna' => $cbxcomuna_delito,
                'td_fechasuceso' => $fechasuceso_delito,
                'td_horasuceso' => $horasuceso_delito,
                'td_fechadenuncia' => $fechadenuncia_delito,
                'td_horadenuncia' => $horadenuncia_delito,
                'td_numero' => $idnumero_delito,
                'td_depto' => $iddepto_delito,
                'td_block' => $idblock_delito,
                'td_villapoblacion' => $txtvilla_delito,
                'td_latitud' => $latituddelito_delito,
                'td_longitud' => $longituddelito_delito,
                'td_direccion' => $autocompletado_delito,
                'td_descripcion' => $textarea_delito,
                'td_evidencia1' => $img1,
                'td_evidencia2' => $img2,
                'td_estado' => 0);

            $resultado = $this->Crud_Delito->save_partepol($data);
            $this->session->set_userdata("idpartepol", $resultado->ID);

            if (empty($resultado)) {
                echo "Error de ingreso";
            } else {

                echo 0;
            }
        }
    }

    public function save_delito() {
        $iddelito = $this->input->post('iddelito');
        $this->load->model('delito/Crud_Delito');  
           $data = array(
                'idta_partepol' => $this->session->userdata('idpartepol'),
                'idta_delito' => $iddelito,             
                'td_estado' => 0);
        $insertdelito = $this->Crud_Delito->save_delito($data);
    }

    public function buscar_delito() {
        $iddelito = $this->input->post('iddelito');
        $this->load->model('M_Inicio');
        $resultado = $this->M_Inicio->cosulta_listaconvarible("delito", $iddelito);
        if (empty($resultado)) {
            echo "";
        } else {
            foreach ($resultado as $val) {
                echo "<tr style='text-align: left;' class='identificador' data-valor='" . $val['idta_delito'] . "' Id='fila_delito" . $val['idta_delito'] . "'>";

                echo "<td>" . $val['td_descripcion'] . "</td>";

                echo "<td><button id='btneliminar2' onclick='remueve(" . $val['idta_delito'] . ")' type='button' value=" . $val['idta_delito'] . " name='chkSeleccion'>Eliminar</button></td>";
                echo "</tr>";
            }
        }
    }

     public function vista_funcionarios() {
        $this->load->model('crud');
        $resultado = $this->crud->traefuncionario($this->session->userdata('identidad'));
        if (empty($resultado)) {
            echo "No guardó nada";
        } else {
            $datos['sesion'] = $this->session->userdata();
            $datos['funcionarios'] = $resultado;
            $this->load->view('proyecto/vistas/vista_funcionario', $datos);
        }
    }
    
    public function traeprovincia() {
        $idregion = $this->input->post('idregion');
        $this->load->model('crud');
        $resultado = $this->crud->consulta_provincia($idregion);

        if (empty($resultado)) {
            echo "No guardó nada";
        } else {
            $html = "<option value='' selected>Seleccionar Provincia</option>";
            foreach ($resultado as $val) {

                $html .= "<option value='" . $val['idta_provincia'] . "'>" . $val['td_descripcion'] . "</option>";
            }
            echo $html;
        }
    }

    public function traecomuna() {
        $idprovincia = $this->input->post('idprovincia');
        $this->load->model('Crud');
        $resultado = $this->Crud->consulta_comuna($idprovincia);

        if (empty($resultado)) {
            echo "No guardó nada";
        } else {
            $html = "<option value='' selected>Seleccionar Comuna</option>";
            foreach ($resultado as $val) {

                $html .= "<option value='" . $val['idta_comuna'] . "'>" . $val['td_descripcion'] . "</option>";
            }

            echo $html;
        }
    }

}
