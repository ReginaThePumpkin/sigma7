<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sin título</title>
</head>

<body>
</body>
</html>
<script>
// JavaScript Document
alert(fnCalculaCURP());
	
function fnCalculaCURP( pstNombre, pstPaterno, pstMaterno, dfecha, pstSexo, pnuCveEntidad ) {
	pstNombre="EMMANUEL"; pstPaterno="ANZURES"; pstMaterno=""; dfecha="1982-09-20"; pstSexo = "H"; pnuCveEntidad ="MS";
	
	if(pstMaterno==''){pstMaterno='X';}

/*if (sexo == 1){ sexo = "H"; } 
if (sexo == 2){ sexo = "M"; }

switch (estado){
			case "1": estado = "AS"; break;
			case "2": estado = "BC"; break;
			case "3": estado = "BS"; break;
			case "4": estado = "CC"; break;
			case "5": estado = "CS"; break;
			case "6": estado = "CH"; break;
			case "7": estado = "CL"; break;
			case "8": estado = "CM"; break;
			case "9": estado = "DF"; break;
			case "10": estado = "DG"; break;
			case "11": estado = "GT"; break;
			case "12": estado = "GR"; break;
			case "13": estado = "HG"; break;
			case "14": estado = "JC"; break;
			case "15": estado = "MC"; break;
			case "16": estado = "MN"; break;
			case "17": estado = "MS"; break;
			case "18": estado = "NT"; break;
			case "19": estado = "NL"; break;
			case "20": estado = "OC"; break;
			case "21": estado = "PL"; break;
			case "22": estado = "QT"; break;
			case "23": estado = "QR"; break;
			case "24": estado = "SP"; break;
			case "25": estado = "SL"; break;
			case "26": estado = "SR"; break;
			case "27": estado = "TC"; break;
			case "28": estado = "TS"; break;
			case "29": estado = "TL"; break;
			case "30": estado = "VZ"; break;	
			case "31": estado = "YN"; break;	
			case "32": estado = "ZS"; break;			
}*/

pstCURP   =""; pstDigVer =""; contador  =0; contador1 =0; pstCom	  =""; numVer    =0.00; valor     =0; sumatoria =0;

// se declaran las varibale que se van a utilizar para ontener la CURP
NOMBRES  ="";
APATERNO ="";
AMATERNO ="";
T_NOMTOT ="";
NOMBRE1  =""; //PRIMER NOMBRE
NOMBRE2  =""; //DEMAS NOMBRES
NOMBRES_LONGITUD =0; //LONGITUD DE TODOS @NOMBRES
var NOMBRE1_LONGITUD =0; //LONGITUD DEL PRIMER NOMBRE(MAS UNO,EL QUE SOBRA ES UN ESPACIO EN BLANCO)
APATERNO1 =""; //PRIMER NOMBRE
APATERNO2 =""; //DEMAS NOMBRES
APATERNO_LONGITUD =0; //LONGITUD DE TODOS @NOMBRES
APATERNO1_LONGITUD =0; //LONGITUD DEL PRIMER NOMBRE(MAS UNO,EL QUE SOBRA ES UN ESPACIO EN BLANCO)
AMATERNO1 =""; //PRIMER NOMBRE
AMATERNO2 =""; //DEMAS NOMBRES
AMATERNO_LONGITUD =0; //LONGITUD DE TODOS @NOMBRES
AMATERNO1_LONGITUD =0; //LONGITUD DEL PRIMER NOMBRE(MAS UNO,EL QUE SOBRA ES UN ESPACIO EN BLANCO)
VARLOOPS =0; //VARIABLE PARA LOS LOOPS, SE INICIALIZA AL INICIR UN LOOP

// Se inicializan las variables para obtener la primera parte de la CURP
NOMBRES  = pstNombre.replace(/^\s+|\s+$/g,"");
APATERNO = pstPaterno.replace(/^\s+|\s+$/g,"");
AMATERNO = pstMaterno.replace(/^\s+|\s+$/g,"");

T_NOMTOT = APATERNO + ' '+ AMATERNO + ' '+ NOMBRES;

// Se procesan los nombres de pila
VARLOOPS = 0;

while (VARLOOPS != 1) {
		NOMBRES_LONGITUD = NOMBRES.length

		var splitNombres = NOMBRES.split(" ");
		var splitNombre1 = splitNombres[0];
		
		NOMBRE1_LONGITUD = splitNombre1.length;

		if (NOMBRE1_LONGITUD = 0) { NOMBRE1_LONGITUD = NOMBRES_LONGITUD; }
		    NOMBRE1 =  NOMBRES.substring(0,splitNombre1.length);
		    NOMBRE2 =  NOMBRES.substring(splitNombre1.length + 1, NOMBRES.length);

// Se quitan los nombres de JOSE, MARIA,MA,MA.
if (NOMBRE1 == 'JOSE' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'MARIA' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'MA.' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'MA' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'DE' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'LA' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'LAS' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'MC' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'VON' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'DEL' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }
 
if (NOMBRE1 == 'LOS' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'Y' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'MAC' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

if (NOMBRE1 == 'VAN' && NOMBRE2 != '') { NOMBRES = NOMBRE2; } else { VARLOOPS = 1; }

} // fin varloops <> 1


// Se procesan los APELLIDOS, PATERNO EN UN LOOP
VARLOOPS = 0;

while (VARLOOPS != 1) {
		APATERNO_LONGITUD = APATERNO.length;		
		
		var splitPaterno = APATERNO.split(" ");
		var splitPaterno1 = splitPaterno[0];
		APATERNO1_LONGITUD = splitPaterno1.length;

		if (APATERNO1_LONGITUD = 0) { APATERNO1_LONGITUD = APATERNO_LONGITUD; }

		APATERNO1 =  APATERNO.substring(0,splitPaterno1.length);
		APATERNO2 =  APATERNO.substring(splitPaterno1.length + 1, APATERNO.length);
		
		// Se quitan los sufijos
if ( APATERNO1 == 'DE' && APATERNO2 != '') { APATERNO = APATERNO2; } else { VARLOOPS = 1; }

if ( APATERNO1 == 'LA' && APATERNO2 != '') { APATERNO = APATERNO2; } else { VARLOOPS = 1; }

if ( APATERNO1 == 'LAS' && APATERNO2 != '') { APATERNO = APATERNO2; } else { VARLOOPS = 1; }

if ( APATERNO1 == 'MC' && APATERNO2 != '') { APATERNO = APATERNO2; } else { VARLOOPS = 1; }

if ( APATERNO1 == 'VON' && APATERNO2 != '') { APATERNO = APATERNO2; } else { VARLOOPS = 1; }

if ( APATERNO1 == 'DEL' && APATERNO2 != '') { APATERNO = APATERNO2; } else { VARLOOPS = 1; }

if ( APATERNO1 == 'LOS' && APATERNO2 != '') { APATERNO = APATERNO2; } else { VARLOOPS = 1; }

if ( APATERNO1 == 'Y' && APATERNO2 != '') { APATERNO = APATERNO2; } else { VARLOOPS = 1; }

if ( APATERNO1 == 'MAC' && APATERNO2 != '') { APATERNO = APATERNO2; } else { VARLOOPS = 1; }

if ( APATERNO1 == 'VAN' && APATERNO2 != '') { APATERNO = APATERNO2; } else { VARLOOPS = 1; }

} // fin varloops
// Faltan: )

// Se procesan los APELLIDOS, MATERNO EN UN LOOP
VARLOOPS = 0;

while (VARLOOPS != 1) {
		AMATERNO_LONGITUD = AMATERNO.length;		
		
		var splitMaterno = AMATERNO.split(" ");
		var splitMaterno1 = splitMaterno[0];
		AMATERNO1_LONGITUD = splitMaterno1.length;

		if (AMATERNO1_LONGITUD = 0) { AMATERNO1_LONGITUD = AMATERNO_LONGITUD; }

		AMATERNO1 =  AMATERNO.substring(0,splitMaterno1.length);
		AMATERNO2 =  AMATERNO.substring(splitMaterno1.length + 1, AMATERNO.length);

// Se quitan los sufijos
if ( AMATERNO1 == 'DE' && AMATERNO2 != '') { AMATERNO = AMATERNO2; } else { VARLOOPS = 1; }

if ( AMATERNO1 == 'LA' && AMATERNO2 != '') { AMATERNO = AMATERNO2; } else { VARLOOPS = 1; }

if ( AMATERNO1 == 'LAS' && AMATERNO2 != '') { AMATERNO = AMATERNO2; } else { VARLOOPS = 1; }

if ( AMATERNO1 == 'MC' && AMATERNO2 != '') { AMATERNO = AMATERNO2; } else { VARLOOPS = 1; }

if ( AMATERNO1 == 'VON' && AMATERNO2 != '') { AMATERNO = AMATERNO2; } else { VARLOOPS = 1; }

if ( AMATERNO1 == 'DEL' && AMATERNO2 != '') { AMATERNO = AMATERNO2; } else { VARLOOPS = 1; }

if ( AMATERNO1 == 'LOS' && AMATERNO2 != '') { AMATERNO = AMATERNO2; } else { VARLOOPS = 1; }

if ( AMATERNO1 == 'Y' && AMATERNO2 != '') { AMATERNO = AMATERNO2; } else { VARLOOPS = 1; }

if ( AMATERNO1 == 'MAC' && AMATERNO2 != '') { AMATERNO = AMATERNO2; } else { VARLOOPS = 1; }

if ( AMATERNO1 == 'VAN' && AMATERNO2 != '') { AMATERNO = AMATERNO2; } else { VARLOOPS = 1; }

} // fin varloops
// Se obtiene del primer apellido la primer letra y la primer vocal interna

pstCURP = APATERNO1.substring(0,1);

APATERNO1_LONGITUD= APATERNO1.length;
VARLOOPS = 0 // EMPIEZA EN UNO POR LA PRIMERA LETRA SE LA VA A SALTAR

while (APATERNO1_LONGITUD > VARLOOPS) {
		VARLOOPS = VARLOOPS + 1;

		var compara = APATERNO1.substr(parseInt(VARLOOPS),1);

		if (compara == 'A') { pstCURP = pstCURP + compara; VARLOOPS = APATERNO1_LONGITUD; }
		if (compara == 'E') { pstCURP = pstCURP + compara; VARLOOPS = APATERNO1_LONGITUD; }
		if (compara == 'I') { pstCURP = pstCURP + compara; VARLOOPS = APATERNO1_LONGITUD; }
		if (compara == 'O') { pstCURP = pstCURP + compara; VARLOOPS = APATERNO1_LONGITUD; }
		if (compara == 'U') { pstCURP = pstCURP + compara; VARLOOPS = APATERNO1_LONGITUD; }
	}
// Se obtiene la primer letra del apellido materno 
pstCURP = pstCURP + AMATERNO1.substring(0,1);
// Se le agrega la primer letra del nombre
pstCURP = pstCURP + NOMBRES.substring(0,1);

// Se agrega la fecha de nacimiento, clave del sexo y clave de la entidad
var splitFecha = dfecha.split("-");
var splitAnio  = splitFecha[0].substr(2,2);
var splitMes   = splitFecha[1];
var splitDia   = splitFecha[2];

pstCURP = pstCURP + splitAnio + splitMes + splitDia + pstSexo + pnuCveEntidad

// Se obtiene la primera consonante interna del apellido paterno
VARLOOPS = 0;

while (splitPaterno1.length > VARLOOPS) {
	VARLOOPS = VARLOOPS + 1
	var compara = APATERNO1.substr(parseInt(VARLOOPS),1);

	if (compara != 'A' && compara != 'E' && compara != 'I' && compara != 'O' && compara != 'U') {
	    if ( compara == 'Ñ') { pstCURP = pstCURP + 'X'; } else { pstCURP = pstCURP + compara; }

	    VARLOOPS = splitPaterno1.length;
	   }
      }

// Se obtiene la primera consonante interna del apellido materno
VARLOOPS = 0;

while (splitMaterno1.length > VARLOOPS) {
	VARLOOPS = VARLOOPS + 1;
	var compara = AMATERNO1.substr(parseInt(VARLOOPS),1);

	if (compara != 'A' && compara != 'E' && compara != 'I' && compara != 'O' && compara != 'U')
	   {
	    if ( compara == 'Ñ') { pstCURP = pstCURP + 'X'; } else { pstCURP = pstCURP + compara; }
		
	    VARLOOPS = splitMaterno1.length;
	   }
      }

// Se obtiene la primera consonante interna del nombre
VARLOOPS = 0;

while (splitNombre1.length > VARLOOPS) {

	VARLOOPS = VARLOOPS + 1;
	var compara = NOMBRE1.substr(parseInt(VARLOOPS),1);

	if (compara != 'A' && compara != 'E' && compara != 'I' && compara != 'O' && compara != 'U') {
	    if (compara=='Ñ') { pstCURP = pstCURP + 'X'; } else { pstCURP = pstCURP + compara; }

	    VARLOOPS = splitNombre1.length;
	   }
      }

// Se obtiene el digito verificador
var contador = 18;
var contador1 = 0;
var valor = 0;
var sumatoria = 0;

while (contador1 <= 15) { var pstCom = pstCURP.substr(parseInt(contador1),1);
     
		if (pstCom == '0') { valor = 0 * contador ; }
		if (pstCom == '1') { valor = 1 * contador; }
		if (pstCom == '2') { valor = 2 * contador; }
		if (pstCom == '3') { valor = 3 * contador; }
		if (pstCom == '4') { valor = 4 * contador; }
		if (pstCom == '5') { valor = 5 * contador; }
		if (pstCom == '6') { valor = 6 * contador; }
		if (pstCom == '7') { valor = 7 * contador; }
		if (pstCom == '8') { valor = 8 * contador; }
		if (pstCom == '9') { valor = 9 * contador; }
		if (pstCom == 'A') { valor = 10 * contador; }
		if (pstCom == 'B') { valor = 11 * contador; }
		if (pstCom == 'C') { valor = 12 * contador; }
		if (pstCom == 'D') { valor = 13 * contador; }
		if (pstCom == 'E') { valor = 14 * contador; }
		if (pstCom == 'F') { valor = 15 * contador; }
		if (pstCom == 'G') { valor = 16 * contador; }
		if (pstCom == 'H') { valor = 17 * contador; }
		if (pstCom == 'I') { valor = 18 * contador; }
		if (pstCom == 'J') { valor = 19 * contador; }
		if (pstCom == 'K') { valor = 20 * contador; }
		if (pstCom == 'L') { valor = 21 * contador; }
		if (pstCom == 'M') { valor = 22 * contador; }
		if (pstCom == 'N') { valor = 23 * contador; }
		if (pstCom == 'Ñ') { valor = 24 * contador; }
		if (pstCom == 'O') { valor = 25 * contador; }
		if (pstCom == 'P') { valor = 26 * contador; }
		if (pstCom == 'Q') { valor = 27 * contador; }
		if (pstCom == 'R') { valor = 28 * contador; }
		if (pstCom == 'S') { valor = 29 * contador; }
		if (pstCom == 'T') { valor = 30 * contador; }
		if (pstCom == 'U') { valor = 31 * contador; }
		if (pstCom == 'V') { valor = 32 * contador; }
		if (pstCom == 'W') { valor = 33 * contador; }
		if (pstCom == 'X') { valor = 34 * contador; }
		if (pstCom == 'Y') { valor = 35 * contador; }
		if (pstCom == 'Z') { valor = 36 * contador; }

		contador  = contador - 1;
		contador1 = contador1 + 1;
		sumatoria = sumatoria + valor;
	}

numVer  = sumatoria % 10;
numVer  = Math.abs(10 - numVer);
anio = splitFecha[0];

if (numVer == 10) { numVer = 0; }

if (anio < 2000) { pstDigVer = '0' + '' + numVer; }
if (anio >= 2000) { pstDigVer = 'A' + '' + numVer; }

pstCURP = pstCURP + pstDigVer;

	return pstCURP
} // End if
</script>