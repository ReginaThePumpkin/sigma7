// JavaScript Document
//redondea una cantidad con 2 decimales
function redondear(cantidad, decimales) {
var cantidad = parseFloat(cantidad);
var decimales = parseFloat(decimales);
decimales = (!decimales ? 2 : decimales);
return Math.round(cantidad * Math.pow(10, decimales)) / Math.pow(10, decimales);
}