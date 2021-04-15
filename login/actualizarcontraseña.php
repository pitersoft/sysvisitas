<?php
          $contra="";
          $contrarepetida="";
          $gen="";
          if(isset($_POST['nuevacontraseña'])){
            $contra=$_POST['nuevacontraseña'];
            $contrarepetida=$_POST['nuevacontraseña1'];

            $campos=array();

            if ($contra===$contrarepetida) {
              array_push($campos,"Las contraseñas coinciden.");
            }
            if (count($campos)>0) {
              echo '<div class="container alert" style="width: auto;"><center>';
              for($i=0; $i<count($campos); $i++) { 
                echo "<li style='list-style: none;' class='alert alert-success'>".$campos[$i]."</li></center></div>";
              }
              include 'administrar/conf/conexion.php';
              $id=$_GET['id'];
              $sql="UPDATE usuario SET password='$contrarepetida'SELECT * FROM usuario WHERE idusuario='".$id."'";
              $resultado=mysqli_query($conexion,$sql);
              if ($resultado){
                echo "<div class='alert alert-success'>Se cambio tu contraseña</div>";
                echo "<script> setTimeout(\"location.href='login.php'\",500)</script>";
              }else{
                echo "<div class='alert alert-danger'>No se cambio tu contraseña</div>";
              }
            }else{
              echo '<div class="alert alert-danger" style="width: auto;">Las contraseñas no coinciden.</div>';
            }
          }
        ?>