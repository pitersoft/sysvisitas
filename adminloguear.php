<?php  
  require 'conf/conexion.php';
  session_start();
  if(isset($_POST['usuarioad']) && isset($_POST['contrasenaad'])){

    $usuarioad = $_POST['usuarioad'];
    $clavead   = $_POST['contrasenaad'];
    $consulLogin = "SELECT * FROM usuario 
          WHERE email = :usuario 
          AND password = :password AND estado = 1";
    $db = $dbh->prepare($consulLogin);
    $db->bindValue(":usuario", $usuarioad, PDO::PARAM_STR);
    $db->bindValue(":password", $clavead, PDO::PARAM_STR);
    $db->execute();
    $filas = $db->rowCount();
    $rs = $db->fetch(PDO::FETCH_OBJ); 

    if( $filas > 0 ){
      $_SESSION["username"]  = $rs->email;
      
      $_SESSION["idusuario"] = $rs->idusuario;
      $_SESSION["nombre"]    = $rs->nombre;
      $_SESSION["apellidos"] = $rs->apellidos;
      $_SESSION["idnivel"]   = $rs->idnivel;
      $_SESSION["perfil"]   = $rs->perfil;

      header("location: index.php");
    }else{
      echo "Contraseña Incorrecta"."<br>"."o"."<br>"."Su cuenta fue desactivada";
    }

  }else{
    header("location: login.php");
  }
?>