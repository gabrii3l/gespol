<?php
function fecha_actual(){
  date_default_timezone_set('America/Santiago');
  /*Entrega la fecha y hora del sistema*/
  //Representacion numerica del dia con 2 digitos
  $dia = date('d');
  //Representacion numerica del mes con 2 digitos
  $mes =date('m');
  //Representacion numerica del año actual 4 digitos
  $anno = date('Y');
  //Hora actual del servidor
  $hora = date('H:i');
  //representa el dia de la semana 0= domingo, 6=sabado
  $dia_semana = date('w');

  switch ($dia_semana) {
    case '1':
      $hoy = 'Lunes';
      break;
    case '2':
      $hoy = 'Martes';
      break;
    case '3':
      $hoy = 'Miercoles';
      break;
    case '4':
      $hoy = 'Jueves';
      break;
    case '5':
      $hoy = 'Viernes';
      break;
    case '6':
      $hoy = 'Sabado';
      break;
    default:
      $hoy = 'Domingo';
      break;
  }
  switch ($mes) {
    case '01':
      // code...
      $mes_actual= 'Enero';
      break;
    case '02':
      // code...
      $mes_actual= 'Febrero';
      break;
    case '03':
      // code...
      $mes_actual= 'Marzo';
      break;
    case '04':
      // code...
      $mes_actual= 'Abril';
      break;
    case '05':
      // code...
      $mes_actual= 'Mayo';
      break;
    case '06':
      // code...
      $mes_actual= 'Junio';
      break;
    case '07':
      // code...
      $mes_actual= 'Julio';
      break;
    case '08':
      // code...
      $mes_actual= 'Agosto';
      break;
    case '09':
      // code...
      $mes_actual= 'Septiembre';
      break;
    case '10':
      // code...
      $mes_actual= 'Octubre';
      break;
    case '11':
      // code...
      $mes_actual= 'Noviembre';
      break;
    case '12':
      // code...
      $mes_actual= 'Diciembre';
      break;
  }

  $fecha_hoy = "Hoy es ".$hoy.", ".$dia." de ".$mes_actual." de ".$anno.". Hora actual: ".$hora;
  return $fecha_hoy;
}
?>
