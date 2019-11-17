// JavaScript Document
function ano_actualx(edad){
var ano=0, mes=0, dia=0, fecha = 0;	
	if (edad > -1 && edad <= 150 ){
		ano = document.getElementById("ano_actual").value-edad;
		dia = document.getElementById("dia_actual").value;
		mes = document.getElementById("mes_actual").value;
	}
	/*else{
		document.getElementById("ano").value="";
		document.getElementById("dia")[0].selected = true;
		document.getElementById("mes")[0].selected = true;
	}
	if (edad == ""){
		document.getElementById("ano").value="";
		document.getElementById("dia")[0].selected = true;
		document.getElementById("mes")[0].selected = true;
	}*/
	fecha=dia+'/'+mes+'/'+ano;
	return fecha;
}