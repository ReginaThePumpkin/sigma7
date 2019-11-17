// JavaScript Document
function redondear(cantidad, decimales) { var cantidad = parseFloat(cantidad), decimales = parseFloat(decimales); decimales = (!decimales ? 2 : decimales); return Math.round(cantidad * Math.pow(10, decimales)) / Math.pow(10, decimales); }
function conMayusculas(field) { field.value = field.value.toUpperCase() } 
function conMinusculas(field) { field.value = field.value.toLowerCase() }   
function solo_letras(texto, caja){
texto=texto.replace(/(À|Á|Â|Ã|Ä|Å|Æ)/gi,'A'); // cambio las "A"s exoticas por "A"s sencillas mediante expresiones regulares
texto=texto.replace(/(È|É|Ê|Ë)/gi,'E'); //lo mismo con las "E" y resto de vocales y la "Ñ"
texto=texto.replace(/(Ì|Í|Î|Ï)/gi,'I');
texto=texto.replace(/(Ò|Ó|Ô|Ö)/gi,'O');
texto=texto.replace(/(Ù|Ú|Û|Ü)/gi,'U');
//texto=texto.replace(/(Ñ)/gi,'N'); 
document.getElementById(caja).value = texto; //envio mi cadena cambiada a la caja...
longitud = texto.length; //tomo la longitud de la cadena contenida en la caja
patolin = new Array(); //creo un array llamado "patolin"
for (i=0; i<longitud; i++) //inicio un FOR que tenga como limite la longitud de mi cadena
	{
	patolin[i]=texto.charAt(i); //guardo cada caracter en una posicion del array
	 codigo_tecla=texto.charCodeAt(i); //obtengo el ASCII DECIMAL de el caracter...
	 //
	 if (/*(codigo_tecla < 48 || codigo_tecla > 57) &&*/ (codigo_tecla < 65 || codigo_tecla > 90) && (codigo_tecla < 96 ||  codigo_tecla > 122) && (codigo_tecla != 13) /*&& (codigo_tecla != 44)&& (codigo_tecla != 45) && (codigo_tecla != 46) && (codigo_tecla != 47)*/ && (codigo_tecla != 8)  && (codigo_tecla != 16) && (codigo_tecla != 32) && (codigo_tecla != 0209) && (codigo_tecla != 165)) //Si el codigo ASCII DECIMAL esta fuera de este rango...
	 	{ patolin[i]=''; /*cambiamos ese caracter por un nulo...*/ } 
		
	}
var textof=''; //declaro una cariable textof (texto final)
for (i=0;i<longitud;i++) //con otro FOR construyo la nueva cadena
{ textof=textof+patolin[i];  }
document.getElementById(caja).value=textof; /*envio la cadena final a la caja...*/ } // y listo!!!!

function solo_numeros(texto, caja){
document.getElementById(caja).value = texto; //envio mi cadena cambiada a la caja...
longitud = texto.length; //tomo la longitud de la cadena contenida en la caja
patolin = new Array(); //creo un array llamado "patolin"
for (i=0; i<longitud; i++) //inicio un FOR que tenga como limite la longitud de mi cadena
	{
	patolin[i]=texto.charAt(i); //guardo cada caracter en una posicion del array
	 codigo_tecla=texto.charCodeAt(i); /*obtengo el ASCII DECIMAL de el caracter... */
	 if ((codigo_tecla < 48 || codigo_tecla > 57)) //Si el codigo ASCII DECIMAL esta fuera de este rango...
	 	{ patolin[i]=''; /*cambiamos ese caracter por un nulo...*/ } 
		
	}
var textof=''; //declaro una cariable textof (texto final)
for (i=0;i<longitud;i++) //con otro FOR construyo la nueva cadena
{
textof=textof+patolin[i]; 
}
document.getElementById(caja).value=textof; //envio la cadena final a la caja...
} // y listo!!!!

function solo_letras_numeros(texto, caja){
texto=texto.replace(/(À|Á|Â|Ã|Ä|Å|Æ)/gi,'A'); // cambio las "A"s exoticas por "A"s sencillas mediante expresiones regulares
texto=texto.replace(/(È|É|Ê|Ë)/gi,'E'); //lo mismo con las "E" y resto de vocales y la "Ñ"
texto=texto.replace(/(Ì|Í|Î|Ï)/gi,'I');
texto=texto.replace(/(Ò|Ó|Ô|Ö)/gi,'O');
texto=texto.replace(/(Ù|Ú|Û|Ü)/gi,'U');
//texto=texto.replace(/(Ñ)/gi,'N'); 
document.getElementById(caja).value = texto; //envio mi cadena cambiada a la caja...
longitud = texto.length; //tomo la longitud de la cadena contenida en la caja
patolin = new Array(); //creo un array llamado "patolin"
for (i=0; i<longitud; i++) //inicio un FOR que tenga como limite la longitud de mi cadena
	{
	patolin[i]=texto.charAt(i); //guardo cada caracter en una posicion del array
	 codigo_tecla=texto.charCodeAt(i); //obtengo el ASCII DECIMAL de el caracter...
	 //
	 if ((codigo_tecla < 48 || codigo_tecla > 57) && (codigo_tecla < 65 || codigo_tecla > 90) && (codigo_tecla < 96 ||  codigo_tecla > 122) && (codigo_tecla != 13) /*&& (codigo_tecla != 44)&& (codigo_tecla != 45) && (codigo_tecla != 46) && (codigo_tecla != 47)*/ && (codigo_tecla != 8)  && (codigo_tecla != 16) && (codigo_tecla != 32) && (codigo_tecla != 0209) && (codigo_tecla != 165)) //Si el codigo ASCII DECIMAL esta fuera de este rango...
	 	{
		patolin[i]=''; //cambiamos ese caracter por un nulo...
		} 
		
	}
var textof=''; //declaro una cariable textof (texto final)
for (i=0;i<longitud;i++) //con otro FOR construyo la nueva cadena
{
textof=textof+patolin[i]; 
}
document.getElementById(caja).value=textof; //envio la cadena final a la caja...
}
// y listo!!!!

function telefono(texto, caja){
document.getElementById(caja).value = texto; //envio mi cadena cambiada a la caja...
longitud = texto.length; //tomo la longitud de la cadena contenida en la caja
patolin = new Array(); //creo un array llamado "patolin"
for (i=0; i<longitud; i++) //inicio un FOR que tenga como limite la longitud de mi cadena
	{
	patolin[i]=texto.charAt(i); //guardo cada caracter en una posicion del array
	 codigo_tecla=texto.charCodeAt(i); //obtengo el ASCII DECIMAL de el caracter...
	 //
	 if ((codigo_tecla < 48 || codigo_tecla > 57) && (codigo_tecla != 40) && (codigo_tecla != 41) && (codigo_tecla != 45) && (codigo_tecla != 43)) //Si el codigo ASCII DECIMAL esta fuera de este rango...
	 	{
		patolin[i]=''; //cambiamos ese caracter por un nulo...
		} 
		
	}
var textof=''; //declaro una cariable textof (texto final)
for (i=0;i<longitud;i++) //con otro FOR construyo la nueva cadena
{
textof=textof+patolin[i]; 
}
document.getElementById(caja).value=textof; //envio la cadena final a la caja...
}
// y listo!!!!

function numeros_decimales(texto, caja){
document.getElementById(caja).value = texto; //envio mi cadena cambiada a la caja...
longitud = texto.length; //tomo la longitud de la cadena contenida en la caja
patolin = new Array(); //creo un array llamado "patolin"
for (i=0; i<longitud; i++) //inicio un FOR que tenga como limite la longitud de mi cadena
	{
	patolin[i]=texto.charAt(i); //guardo cada caracter en una posicion del array
	 codigo_tecla=texto.charCodeAt(i); //obtengo el ASCII DECIMAL de el caracter...
	 //
	 if ((codigo_tecla < 48 || codigo_tecla > 57) && (codigo_tecla != 46)) //Si el codigo ASCII DECIMAL esta fuera de este rango...
	 	{
		patolin[i]=''; //cambiamos ese caracter por un nulo...
		} 
		
	}
var textof=''; //declaro una cariable textof (texto final)
for (i=0;i<longitud;i++) //con otro FOR construyo la nueva cadena
{
textof=textof+patolin[i]; 
}
document.getElementById(caja).value=textof; //envio la cadena final a la caja...
}
// y listo!!!!

function nick(texto, caja){
	texto=texto.replace(/(À|Á|Â|Ã|Ä|Å|Æ)/gi,'A'); // cambio las "A"s exoticas por "A"s sencillas mediante expresiones regulares
	texto=texto.replace(/(È|É|Ê|Ë)/gi,'E'); //lo mismo con las "E" y resto de vocales y la "Ñ"
	texto=texto.replace(/(Ì|Í|Î|Ï)/gi,'I');
	texto=texto.replace(/(Ò|Ó|Ô|Ö)/gi,'O');
	texto=texto.replace(/(Ù|Ú|Û|Ü)/gi,'U');
	texto=texto.replace(/(Ñ)/gi,'N'); 
	document.getElementById(caja).value = texto; //envio mi cadena cambiada a la caja...
	longitud = texto.length; //tomo la longitud de la cadena contenida en la caja
	patolin = new Array(); //creo un array llamado "patolin"
	for (i=0; i<longitud; i++) //inicio un FOR que tenga como limite la longitud de mi cadena
		{	patolin[i]=texto.charAt(i); //guardo cada caracter en una posicion del array
			 codigo_tecla=texto.charCodeAt(i); //obtengo el ASCII DECIMAL de el caracter...
			 if ((codigo_tecla < 48 || codigo_tecla > 57) && (codigo_tecla < 65 || codigo_tecla > 90) && (codigo_tecla < 96 ||  codigo_tecla > 122) && (codigo_tecla != 13) /*&& (codigo_tecla != 44)&& (codigo_tecla != 45) && (codigo_tecla != 46) && (codigo_tecla != 47)*/ && (codigo_tecla != 8)  && (codigo_tecla != 16) && (codigo_tecla != 0209) && (codigo_tecla != 165)) //Si el codigo ASCII DECIMAL esta fuera de este rango...
	 		{
				patolin[i]=''; //cambiamos ese caracter por un nulo...
			} 
		}
	var textof=''; //declaro una cariable textof (texto final)
	for (i=0;i<longitud;i++) //con otro FOR construyo la nueva cadena
	{
		textof=textof+patolin[i]; 
	}
	document.getElementById(caja).value=textof; //envio la cadena final a la caja...
}
// y listo!!!!
function emailx(texto, caja){
texto=texto.replace(/(À|Á|Â|Ã|Ä|Å|Æ)/gi,'a'); // cambio las "A"s exoticas por "A"s sencillas mediante expresiones regulares
texto=texto.replace(/(È|É|Ê|Ë)/gi,'e'); //lo mismo con las "E" y resto de vocales y la "Ñ"
texto=texto.replace(/(Ì|Í|Î|Ï)/gi,'i');
texto=texto.replace(/(Ò|Ó|Ô|Ö)/gi,'o');
texto=texto.replace(/(Ù|Ú|Û|Ü)/gi,'u');
texto=texto.replace(/(Ñ)/gi,'n'); 
document.getElementById(caja).value = texto; //envio mi cadena cambiada a la caja...
longitud = texto.length; //tomo la longitud de la cadena contenida en la caja
patolin = new Array(); //creo un array llamado "patolin"
for (i=0; i<longitud; i++) //inicio un FOR que tenga como limite la longitud de mi cadena
	{
	patolin[i]=texto.charAt(i); //guardo cada caracter en una posicion del array
	 codigo_tecla=texto.charCodeAt(i); //obtengo el ASCII DECIMAL de el caracter...
	 //
	 if ((codigo_tecla < 48 || codigo_tecla > 57) && (codigo_tecla < 65 || codigo_tecla > 90) && (codigo_tecla < 96 ||  codigo_tecla > 122) /*&& (codigo_tecla != 44)&& (codigo_tecla != 45) && (codigo_tecla != 46) && (codigo_tecla != 47)*/ && (codigo_tecla != 64) && (codigo_tecla != 45) && (codigo_tecla != 95) && (codigo_tecla != 46)) //Si el codigo ASCII DECIMAL esta fuera de este rango...
	 	{
		patolin[i]=''; //cambiamos ese caracter por un nulo...
		} 
		
	}
var textof=''; //declaro una cariable textof (texto final)
for (i=0;i<longitud;i++) //con otro FOR construyo la nueva cadena
{
textof=textof+patolin[i]; 
}
document.getElementById(caja).value=textof; //envio la cadena final a la caja...
}
// y listo!!!!

function nuevo(texto, caja){
	texto=texto.replace(/(À|Á|Â|Ã|Ä|Å|Æ)/gi,'A'); // cambio las "A"s exoticas por "A"s sencillas mediante expresiones regulares
texto=texto.replace(/(È|É|Ê|Ë)/gi,'E'); //lo mismo con las "E" y resto de vocales y la "Ñ"
texto=texto.replace(/(Ì|Í|Î|Ï)/gi,'I');
texto=texto.replace(/(Ò|Ó|Ô|Ö)/gi,'O');
texto=texto.replace(/(Ù|Ú|Û|Ü)/gi,'U');
//texto=texto.replace(/(Ñ)/gi,'N'); 
document.getElementById(caja).value = texto; //envio mi cadena cambiada a la caja...
longitud = texto.length; //tomo la longitud de la cadena contenida en la caja
patolin = new Array(); //creo un array llamado "patolin"
for (i=0; i<longitud; i++) //inicio un FOR que tenga como limite la longitud de mi cadena
	{
	patolin[i]=texto.charAt(i); //guardo cada caracter en una posicion del array
	 codigo_tecla=texto.charCodeAt(i); //obtengo el ASCII DECIMAL de el caracter...
	}
var textof=''; //declaro una cariable textof (texto final)
for (i=0;i<longitud;i++) //con otro FOR construyo la nueva cadena
{
textof=textof+patolin[i]; 
}
document.getElementById(caja).value=textof; //envio la cadena final a la caja...
}
// y listo!!!!