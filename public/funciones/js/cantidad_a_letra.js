var o=new Array("diez", "once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve", "veinte", "veintiuno", "veintidós", "veintitrés", "veinticuatro", "veinticinco", "veintiséis", "veintisiete", "veintiocho", "veintinueve");
var u=new Array("cero", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve");
var d=new Array("", "", "", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa");
var c=new Array("", "ciento", "doscientos", "trescientos", "cuatrocientos", "quinientos", "seiscientos", "setecientos", "ochocientos", "novecientos");
 
function nn(n)
{
  var n=parseFloat(n).toFixed(2); /*se limita a dos decimales, no sabía que existía toFixed() :)*/
  var p=n.toString().substring(n.toString().indexOf(".")+1); /*decimales*/
  var m=n.toString().substring(0,n.toString().indexOf(".")); /*número sin decimales*/
  var m=parseFloat(m).toString().split("").reverse(); /*tampoco que reverse() existía :D*/
  var t="";
 
  /*Se analiza cada 3 dígitos*/
  for (var i=0; i<m.length; i+=3)
  {
    var x=t;
    /*formamos un número de 2 dígitos*/
    var b=m[i+1]!=undefined?parseFloat(m[i+1].toString()+m[i].toString()):parseFloat(m[i].toString());
    /*analizamos el 3 dígito*/
    t=m[i+2]!=undefined?(c[m[i+2]]+" "):"";
    t+=b<10?u[b]:(b<30?o[b-10]:(d[m[i+1]]+(m[i]=='0'?"":(" y "+u[m[i]]))));
    t=t=="ciento cero"?"cien":t;
    if (2<i&&i<6)
      t=t=="uno"?"mil ":(t.replace("uno","un")+" mil ");
    if (5<i&&i<9)
      t=t=="uno"?"un millón ":(t.replace("uno","un")+" millones ");
    t+=x;
    //t=i<3?t:(i<6?((t=="uno"?"mil ":(t+" mil "))+x):((t=="uno"?"un millón ":(t+" millones "))+x));
  }
  //alert(p);
  switch(p){
	  case '00':
	  p='';
	  break
	  case '0':
	  p='';
	  break
	  case '10':
	  p='con diez centavos';
	  break
	  case '20':
	  p='con veinte centavos';
	  break
	  case '30':
	  p='con treinta centavos';
	  break
	  case '40':
	  p='con cuarenta centavos';
	  break
	  case '50':
	  p='con cincuenta centavos';
	  break
	  case '60':
	  p='con sesenta centavos';
	  break
	  case '70':
	  p='con setenta centavos';
	  break
	  case '80':
	  p='con ochenta centavos';
	  break
	  case '90':
	  p='con noventa centavos';
	  break
	  default:
	  p='';
  }
 //alert(p);
  //t+=" con "+p+"/100";
  //t+=" pesos con "+p+" centavos M/N";
  t+=" pesos "+p+" m/n";
  /*correcciones*/
  t=t.replace("  "," ");
  t=t.replace(" cero","");
  //t=t.replace("ciento y","cien y");
  //este si va alert("Numero: "+n+"\nNº Dígitos: "+m.length+"\nDígitos: "+m+"\nDecimales: "+p+"\nt: "+t);
  //document.getElementById("esc").value=t;
  //alert(t);
  return t;
}