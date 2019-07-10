$(document).ready(function(e){
    $('#container').height($('#referencia').height()-$('#my_nav').height()-$('#my_footer').height()-$('#breadc').height()-7);
});

function breadcrumb(datosArbol,linksArbol){ //Parametro 1 => "Array de los nombres de la ruta de vistas" ,Parametro 2 => "Array de los links que tiene la ruta de vistas" , ambos arrays son asociados , es decir , que el n-esimo elemento del primer array corresponde al n-esimo elemento del segundo array
    let construccion = "";

    for(let a=0; a<datosArbol.length-1; a++){
        construccion += "<li>"; 
        if(a<linksArbol.length){
            construccion += "<a href='"+linksArbol[a]+"'>"+datosArbol[a]+"</a>"
        }else{
            construccion += datosArbol[a];
        }
        construccion += "</li>";
    }
    
    construccion += "<li class='active'><strong>"+datosArbol[datosArbol.length-1]+"</strong></li>"

    $('#breadc').html(construccion);
}