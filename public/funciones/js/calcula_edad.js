// JavaScript Document
function edad_x(fecha) {
	hoy = new Date()
	var array_fecha = fecha.split("/")
	var ano
	ano = parseInt(array_fecha[2], 10);
	if (isNaN(ano))
		return false
	var mes
	mes = parseInt(array_fecha[1], 10);
	if (isNaN(mes))
		return false
	var dia
	dia = parseInt(array_fecha[0], 10);
	if (isNaN(dia))
		return false
	edad = hoy.getFullYear() - ano - 1;

	if (hoy.getMonth() + 1 - mes < 0) {
		return edad;

	}
	if (hoy.getMonth() + 1 - mes > 0) {
		edad = edad + 1
		return edad;
	}

	if (hoy.getUTCDate() - dia >= 0) {
		edad = edad + 1
		return edad;
	}

		 return edad;
}
function calcular_edad(fecha) {
	var fechaActual = new Date()
	var diaActual = fechaActual.getDate();
	var mmActual = fechaActual.getMonth() + 1;
	var yyyyActual = fechaActual.getFullYear();
	FechaNac = fecha.split("/");
	var diaCumple = FechaNac[0];
	var mmCumple = FechaNac[1];
	var yyyyCumple = FechaNac[2];
	//retiramos el primer cero de la izquierda
	if (mmCumple.substr(0,1) == 0) {
		mmCumple= mmCumple.substring(1, 2);
	}
	//retiramos el primer cero de la izquierda
	if (diaCumple.substr(0, 1) == 0) {
		diaCumple = diaCumple.substring(1, 2);
	}
	var edad = yyyyActual - yyyyCumple;
	
	//validamos si el mes de cumpleaños es menor al actual
	//o si el mes de cumpleaños es igual al actual
	//y el dia actual es menor al del nacimiento
	//De ser asi, se resta un año
	if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
		edad--;
	}
	//document.getElementById('edad1').value=edad;
	return edad+' Años';
};