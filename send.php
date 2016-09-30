<?php
session_start();
if (isset($_POST['enviar']) && $_POST["captcha"] && $_POST["captcha"]!="" && $_SESSION["code"]==$_POST["captcha"])
{
	$nombre = $_POST['nombre']; 
	$mail = $_POST['mail']; //emisor del mail
	$empresa = $_POST['empresa'];
	
	$header = "From:" . $mail . "\r\n";
	$header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
	$header .= "Mime-Version: 1.0 \r\n";
	$header .= "Content-type \r\n";
	
	$mensaje ="Este mensaje fue enviado por" . $nombre. "\r\n";
	$mensaje .="Su email es" . $mail. "\r\n";
	$mensaje .="Mensaje" . $_POST ['mensaje']. "\r\n";
	$mensaje .="Enviado el" . date('d/m/Y', time());
	
	$para = "info@micorreo.com.ar"; // receptor del mail
	$asunto = "Pedido de Informacion de:" . $nombre;
	}
	if (($nombre=="") or ($mail=="") or ($_POST['mensaje']=="")) 
	{ echo "Error en el envio del correo"; } 
	else
	{ mail($para, $asunto, utf8_decode($mensaje), $header); 
	header ("Location: correo_enviado.html");
	}
