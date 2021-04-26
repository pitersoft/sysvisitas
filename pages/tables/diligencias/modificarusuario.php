<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title></title>
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
  <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
  <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
  </head>
  <body>
    <?php
    if (isset($_POST['editar'])) {
        header("location: index.php");
      }
        
    ?>
    <div class="container-login100" style="background-image: url('img/fondo.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;width: 360px;margin-left: 30%;">
    <div class="wrap-login100 p-l-20 p-r-30 p-t-10 p-b-30">
       <?php
      include '../../../conf/conexion.php';
      $id=$_GET['id'];
      $sql="SELECT * FROM diligencias INNER JOIN usuario ON diligencias.idusuario = usuario.idusuario WHERE id_diligencia='".$id."'";
      $resultado=mysqli_query($conexion,$sql);
        while ($fila=mysqli_fetch_assoc($resultado)) {
      ?>
      <form action="" method="POST">
        <div class="h5 bg-success" style="text-align: center;color: #fff;padding: 20px 0px;border-radius: 20px;">Editar Usuario</div>
        <div class="mb-3 form-check">
          <input type="hidden" class="form-control" name="mid"  value="<?php echo $fila['idusuario']; ?>" id="exampleInputNombre2">
        </div>
        <div class="mb-3 form-check">
          <label for="InputUsuario" class="form-label">Usuario</label>
          <select class="form-select" name="musuario" id="InputUsuario">
            <?php 
                $query=mysqli_query($conexion,"SELECT * FROM usuario");
                while($nivel = mysqli_fetch_array($query))
                {
            ?>
                    <option value="<?php echo $nivel['idusuario']?>" <?php echo $fila['idusuario'] == $nivel['idusuario'] ? 'selected' : ''; ?>> <?php echo $nivel['nombre']." ".$nivel['apellidos']?> </option>
            <?php
                }
            ?> 
          </select>
        </div>
        <div class="mb-3 form-check">
          <label for="InputFechahoraIngreso" class="form-label">Fecha y hora de Ingreso</label>
          <input type="datetime-local" class="form-control" value="<?php echo (date ('Y-m-d\TH:i:s', strtotime($fila['fecha_hora_ingreso']))); ?>" name="mfhingreso" id="InputFechahoraIngreso">
        </div>

        <div class="mb-3 form-check">
          <label for="InputMotivo" class="form-label">Motivo</label>
          <input type="text" class="form-control" name="mmotivo" id="InputMotivo" value="<?php echo $fila['motivo'];?>">
        </div>
        <div class="mb-3 form-check">
          <label for="InputTiempo" class="form-label">Tiempo</label>
          <input type="time" class="form-control" name="mtiempo" id="InputTiempo" value="<?php echo $fila['tiempo'];?>">
        </div>
        <div class="mb-3 form-check">
          <label for="InputFechahoraRetorno" class="form-label">Fecha y hora de Retorno</label>
          <input type="datetime-local" class="form-control" name="mfhretorno" id="InputFechahoraRetorno" value="<?php echo (date ('Y-m-d\TH:i:s', strtotime($fila['fecha_hora_retorno']))); ?>">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputEstado2" class="form-label">Estado</label>
          <select class="form-select" name="mestado" id="exampleInputEstado1">
            <option value="0" <?php echo $fila['estado'] == 0 ? 'selected' : ''; ?>> Deshabilitado </option>
            <option value="1" <?php echo $fila['estado'] == 1 ? 'selected' : ''; ?>> Habilitado </option>
          </select>
        </div>
        <div class="mb-3 form-check">
          <label for="InputDescripción" class="form-label">Descripción</label>
          <textarea class="form-control" name="mdescripcion" id="InputDescripción"><?php echo $fila['descripcion'];?></textarea>
        </div>
        <div class="modal-footer">
          <a href="index.php" class="btn btn-secondary">Cancelar</a>
          <input type="submit" class="btn btn-primary" name="editar" value="Guardar">
        </div>
        <?php
          $idmu=$_GET['id'];
          if (isset($_POST['musuario']) && isset($_POST['mfhingreso']) && isset($_POST['mmotivo']) && isset($_POST['mtiempo']) && isset($_POST['mfhretorno']) && isset($_POST['mestado']) && isset($_POST['mdescripcion'])) {
            $musuario = $_POST['musuario'];
            $mfhingreso = $_POST['mfhingreso'];
            $mmotivo = $_POST['mmotivo'];
            $mtiempo = $_POST['mtiempo'];
            $mfhretorno = $_POST['mfhretorno'];
            if(isset($_POST['mestado']))
            {
              $mestado=(int)$_POST['mestado'];
            }
            $mdescripcion = $_POST['mdescripcion'];
            if (isset($_POST['editar'])) {
              $editar="UPDATE diligencias SET idusuario='$musuario',fecha_hora_ingreso='$mfhingreso',motivo='$mmotivo',tiempo='$mtiempo',fecha_hora_retorno='mfhretorno',estado='$mestado',descripcion='$mdescripcion' WHERE id_diligencia='$idmu'";

              $resultadonuevo=mysqli_query($conexion,$editar);
              $respuestanuevo="Se ha modificadoado usuario.";
              echo $respuestanuevo;
            } else {
              $respuestanuevo="No se ha podido modificar nuevo usuario.";
              echo $respuestanuevo;
            }  
          }
        ?>
      </form>
      <?php
      }
      ?>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>