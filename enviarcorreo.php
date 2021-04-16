<?php 
	use  PHPMailer\PHPMailer\PHPMailer;
	use  PHPMailer\PHPMailer\Exception; 
	require 'PHPMailer/Exception.php';
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';
    require 'conf/conexion.php';
if (isset($_POST['correovalido'])) {
    $destinatario=$_POST['correovalido'];
}
$q = "SELECT idusuario FROM usuario where email = '$destinatario' and estado = 1";
$consulta = mysqli_query($conexion,$q);
while ($row=mysqli_fetch_assoc($consulta)){
    $fila=$row['idusuario'];
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
	$mail->SMTPOptions = array(
	 	'ssl' => array(
		    'verify_peer'=> false,
	 	    'verify_peer_name'=> false,
	 	    'allow_self_signed'=> true
		) 
	);
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'correopruebadesarrollo464@gmail.com';                     //SMTP username
    $mail->Password   = 'Correoprueba464';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('grgs95859@gmail.com', 'NOMBRE DE LA EMPRESA');
    $mail->addAddress($destinatario);     //Add a recipient   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'NOMBRE DE LA EMPRESA';
    $mail->Body    = 'Recuperación de la contraseña solicitada, <br><b>Haz click en el siguiente enlace para cambiar tu contraseña:</b><br>'.'http://localhost/sysvisitas/administrar/cambiarpassword.php?id='.$row['idusuario'].'';

    $mail->send();
    echo "<script>alert('Mensaje enviado, Revisa tu Correo para cambiar tu contraseña')</script>";
    echo "<script> setTimeout(\"location.href='index.php'\",300)</script>";
} catch (Exception $e) {
    echo "Mensaje De Error: {$mail->ErrorInfo}";
}
}
?>