//console.log("funcionando");
$("#formulario").submit(function(event) {
    event.preventDefault(); //Almacena los datos sin refrescar el sitio web.
    enviar();
});

function enviar() {
    //console.log("ejecutando");
    var datos = $("#formulario").serialize(); //toma los datos "name" y los lleva aun arreglo.
    $.ajax({
        type: "post",
        url: "formulario.php",
        data: datos,
        success: function(texto) {
            if (texto == "exito") {
                correcto();
            } else {
                phperror(texto);
            }
        }
    })
}

function correcto() {
    $("#mensajeExito").removeClass("d-none");
    $("#mensajeError").addClass("d-none");
	document.getElementById("nombre").value = "";
	document.getElementById("apellido").value = "";
	document.getElementById("email").value = "";
	document.getElementById("telefono").value = "";
	document.getElementById("mensaje").value = "";
	window.scrollTo(0,0);
}

function phperror(texto) {
    $("#mensajeError").removeClass("d-none");
    $("#mensajeError").html(texto);
    $("#mensajeExito").addClass("d-none");
	window.scrollTo(0,0);


}