
function alertify(message){
var alert = alertify.alert("Titulo",message).set('label', 'Aceptar');     	 
alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no	
}
module.exports = {
    "alertify": alertify
}