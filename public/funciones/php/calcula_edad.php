<?php
function edad($fecha_nac){
//Esta funcion toma una fecha de nacimiento 
//desde una base de datos mysql
//en formato aaaa/mm/dd y calcula la edad en números enteros

$dia=date("j");
$mes=date("n");
$anno=date("Y");
$hora=date("H");
$minuto=date("i");
$segundo=date("s");

//descomponer fecha de nacimiento
$dia_nac=substr($fecha_nac, 8, 2);
$mes_nac=substr($fecha_nac, 5, 2);
$anno_nac=substr($fecha_nac, 0, 4);

$hora_nac=substr($fecha_nac, 9, 2);
$minuto_nac=substr($fecha_nac, 12, 2);
$segundo_nac=substr($fecha_nac, 15, 2);

if($mes_nac>$mes){
$calc_edad= $anno-$anno_nac-1;
}else{
if($mes==$mes_nac AND $dia_nac>$dia){
$calc_edad= $anno-$anno_nac-1; 
}else{
$calc_edad= $anno-$anno_nac;
}
}

if ($calc_edad>0){
return $calc_edad;}
if($calc_edad==0){
	return $rNacido;
}
} 
echo edad('1982-09-20 00:00:00');
?>
