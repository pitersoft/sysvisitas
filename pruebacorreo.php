<?php  
	
	$paracorreo = "gustavograos01@gmail.com";
	$titulo     = "Test correo";
	$mensaje    = "Hola mundo";
	$tucorreo   = "From: grgs95859@gmail.com";

	if(mail($paracorreo, $titulo, $mensaje, $tucorreo)){
		echo "Correo enviado";
	}else{
		echo "Error";
	}
?>