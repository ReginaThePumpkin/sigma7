// JavaScript Document
$(document).ready(function(e) {
	
	if($('#users-device-size').find('div:visible').first().attr('id')=='xs' || $('#users-device-size').find('div:visible').first().attr('id')=='sm'){ $('body').removeClass('mini-navbar'); } //para que en los celulares salga el menú colapsado
	
  	$('[data-toggle="tooltip"]').tooltip();
	
	//$('#mi_barra_menu').height($('#referencia').height());
	//$('#wrapper').height($('#referencia').height());
	
	//$('#container').width($('#referencia').width()+30);
	//$('#container').height($('#referencia').height()-$('#my_nav').height()-$('#my_footer').height()-22);
	
	$( window ).on('resize',function(){ //alert(1);
       // $('#container').width($('#referencia').width()+30);
		//$('#container').height($('#referencia').height()-$('#my_nav').height()-$('#my_footer').height()-22);
    });
	
	$('#my_search').addClass('hidden');
	
	$('#go_home').on('click',function(){ window.location.href = 'index.php'; });

});