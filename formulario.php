<?php
error_reporting(-1);
$error = '';

//VALIDANDO NOMBRE
if(empty($_POST["nombre"])){
    $error = 'Por favor Ingrese su nombre <br>';
}else{
    $nombre = $_POST["nombre"];
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
}

//VALIDANDO APELLIDO
if(empty($_POST["apellido"])){
    $error .= 'Por favor Ingrese su apellido <br>';
}else{
    $apellido = $_POST["apellido"];
    $apellido = filter_var($apellido, FILTER_SANITIZE_STRING);
}

//VALIDANDO EMAIL
if(empty($_POST["email"])){
    $error .= 'Por favor ingrese su email<br>';
    // el punto y el igual, significa que se está concatenando los dos mensajes
}else{
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        //filter_var devuelve verdadero o falso
        $error .= 'Ingrese un email valido <br>';
    }else{
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    }
}

//VALIDANDO TELEFONO
if(empty($_POST["telefono"])){
    $error .= 'Por favor Ingrese su tel&eacute;fono <br>';
}else{
    $telefono = $_POST["telefono"];
    $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
}

//VALIDANDO MENSAJE
if(empty($_POST["mensaje"])){
    $error .= 'Por favor Ingrese un mensaje<br>';
}else{
    $mensaje = $_POST["mensaje"];
    $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
}

//CUERPO DEL MENSAJE
$cuerpo = utf8_decode('Nombre : '.$nombre.'<br>');
$cuerpo .= utf8_decode('Apellido : '.$apellido.'<br>');
$cuerpo .= 'Email : '.$email.'<br>';
$cuerpo .= 'Tel&eacute;fono : '.$telefono.'<br>';
$cuerpo .= utf8_decode('Mensaje : '.$mensaje.'<br>');

//DIRECCION
$enviarA = 'fcampos@iia.cl,svaras@iia.cl,jcaragol@iia.cl,pavalenzuela@iia.cl';
//$enviarA = 'fcampos@iia.cl,svaras@iia.cl';
$asunto = 'Nuevo mensaje desde IIA.cl';

//CABECERAS
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'From: contacto.web@iia.cl' . "\r\n";

//ENVIAR CORREO
if($error == ''){
    $success = mail($enviarA,$asunto,$cuerpo,$cabeceras);
    echo 'exito';
}else{
    echo $error;
}

?>