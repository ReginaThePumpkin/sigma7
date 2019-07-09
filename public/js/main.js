$(document).ready(function(e) {
	//breadcrumb
	//! Esto cambia por cada vista $('#breadc').html('<li class="active"><strong>HOME</strong></li>');
	
    $('#container').height($('#referencia').height()-$('#my_nav').height()-$('#my_footer').height()-$('#breadc').height()-7);
});

function breadcrumb(datos){ //!Esta funcion esta muy primivita , no debe dejarse asi, necesito juntar mas datos de las vistas para mejorarla
    $('#breadc').html(datos);
}