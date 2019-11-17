// JavaScript Document
function fnCalculaCURP( pstNombre, pstPaterno, pstMaterno, dfecha, pstSexo, pnuCveEntidad ) {
	//pstNombre="EMMANUEL"; pstPaterno="ANZURES"; pstMaterno="BAUTISTA"; dfecha="1982-09-20"; pstSexo = "H"; pnuCveEntidad ="MS";
	
	var splitNombres = pstNombre.split(" ");
			
	if(pstMaterno==''){pstMaterno='X';}

if (pstSexo == 2){ pstSexo = "H"; } 
if (pstSexo == 1){ pstSexo = "M"; }

switch (pnuCveEntidad){
			case "AGUASCALIENTES": pnuCveEntidad = "AS"; break;
			case "BAJA CALIFORNIA": pnuCveEntidad = "BC"; break;
			case "BAJA CALIFORNIA SUR": pnuCveEntidad = "BS"; break;
			case "CAMPECHE": pnuCveEntidad = "CC"; break;
			case "CHIAPAS": pnuCveEntidad = "CS"; break;
			case "CHIHUAHUA": pnuCveEntidad = "CH"; break;
			case "COAHUILA DE ZARAGOZA": pnuCveEntidad = "CL"; break;
			case "COLIMA": pnuCveEntidad = "CM"; break;
			case "DISTRITO FEDERAL": pnuCveEntidad = "DF"; break;
			case "DURANGO": pnuCveEntidad = "DG"; break;
			case "GUANAJUATO": pnuCveEntidad = "GT"; break;
			case "GUERRERO": pnuCveEntidad = "GR"; break;
			case "HIDALGO": pnuCveEntidad = "HG"; break;
			case "JALISCO": pnuCveEntidad = "JC"; break;
			case "MEXICO": pnuCveEntidad = "MC"; break;
			case "MICHOACAN DE OCAMPO": pnuCveEntidad = "MN"; break;
			case "MORELOS": pnuCveEntidad = "MS"; break;
			case "NAYARIT": pnuCveEntidad = "NT"; break;
			case "NUEVO LEON": pnuCveEntidad = "NL"; break;
			case "OAXACA": pnuCveEntidad = "OC"; break;
			case "PUEBLA": pnuCveEntidad = "PL"; break;
			case "QUERETARO": pnuCveEntidad = "QT"; break;
			case "QUINTANA ROO": pnuCveEntidad = "QR"; break;
			case "SAN LUIS POTOSI": pnuCveEntidad = "SP"; break;
			case "SINALOA": pnuCveEntidad = "SL"; break;
			case "SONORA": pnuCveEntidad = "SR"; break;
			case "TABASCO": pnuCveEntidad = "TC"; break;
			case "TAMAULIPAS": pnuCveEntidad = "TS"; break;
			case "TLAXCALA": pnuCveEntidad = "TL"; break;
			case "VERACRUZ DE IGNACIO DE LA LLAVE": pnuCveEntidad = "VZ"; break;	
			case "YUCATAN": pnuCveEntidad = "YN"; break;	
			case "ZACATECAS": pnuCveEntidad = "ZS"; break;			
}
//pstNombre="EMMANUEL"; pstPaterno="ANZURES"; pstMaterno="BAUTISTA"; dfecha="1982-09-20"; pstSexo = "H"; pnuCveEntidad ="MS";

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
if (splitNombres[0] == 'JOSE' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'MARIA' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'MA.' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'MA' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'DE' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'LA' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'LAS' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'MC' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'VON' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'DEL' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }
 
if (splitNombres[0] == 'LOS' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'Y' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'MAC' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

if (splitNombres[0] == 'VAN' && splitNombres[1] != undefined) { NOMBRES = splitNombres[1]; } else { VARLOOPS = 1; }

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

if(pstCURP[0]=='Ñ'){pstCURP[0]='X';}

APATERNO1_LONGITUD= APATERNO1.length;
VARLOOPS = 0 // EMPIEZA EN UNO POR LA PRIMERA LETRA SE LA VA A SALTAR
var conta = 0;
while (APATERNO1_LONGITUD > VARLOOPS) {
		VARLOOPS = VARLOOPS + 1;

		var compara = APATERNO1.substr(parseInt(VARLOOPS),1);

		if (compara == 'A') { pstCURP = pstCURP + compara; VARLOOPS = APATERNO1_LONGITUD; conta++;}
		if (compara == 'E') { pstCURP = pstCURP + compara; VARLOOPS = APATERNO1_LONGITUD; conta++;}
		if (compara == 'I') { pstCURP = pstCURP + compara; VARLOOPS = APATERNO1_LONGITUD; conta++;}
		if (compara == 'O') { pstCURP = pstCURP + compara; VARLOOPS = APATERNO1_LONGITUD; conta++;}
		if (compara == 'U') { pstCURP = pstCURP + compara; VARLOOPS = APATERNO1_LONGITUD; conta++;}
		
		//if(conta==0){pstCURP = pstCURP + 'X'; VARLOOPS = APATERNO1_LONGITUD;}
	}
if(pstCURP.length==1){pstCURP = pstCURP+'X';}
// Se obtiene la primer letra del apellido materno 
pstCURP = pstCURP + AMATERNO1.substring(0,1);
// Se le agrega la primer letra del nombre
pstCURP = pstCURP + NOMBRES.substring(0,1);

// Se agrega la fecha de nacimiento, clave del sexo y clave de la entidad
var splitFecha = dfecha.split("/");
var splitAnio  = splitFecha[2].substr(2,2);
var splitMes   = splitFecha[1];
var splitDia   = splitFecha[0];

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

var malas = Array("BUEI","BUEY","CACA","CACO","CAGA","CAGO","CAKA","CAKO","COGE","COJA","KOGE","KOJO","KAKA","KULO",
				"MAME","MAMO","MEAR","MEAS","MEON","MION","COJE","COJI","COJO","CULO","FETO","GUEY","JOTO","KACA",
				"KACO","KAGA","KAGO","MOCO","MULA","PEDA","PEDO","PENE","PUTA","PUTO","QULO","RATA","RUIN");

//si se encuentra una mala palabra, sustituir la segunda letra con 'X'
if(pstCURP.match(malas.join('|'))){ //alert('mala');//pstCURP = pat_temp.char(0) + 'X' + mat_temp.char(0) + nom_temp.char(0);
	var alca = pstCURP.substring(0,1); var alca1 = 'X'; var alca2 = pstCURP.substring(2,17);
	pstCURP = alca+alca1+alca2;
}
	return pstCURP
} // End if