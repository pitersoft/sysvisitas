

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">


    <?php
    if (isset($_POST['editar'])) {
        header("location: index.php");
      }
        
    ?>
    <div class="container-login100" style="width: 360px;margin-left: 30%;">
    <div class="wrap-login100 p-l-20 p-r-30 p-t-10 p-b-30">
       <?php
      include '../../../conf/conexion.php';
      $id=$_GET['id'];
      $sql="SELECT * FROM permisos WHERE idnivel='".$id."'";
      $resultado=mysqli_query($conexion,$sql);
        while ($fila=mysqli_fetch_assoc($resultado)) {
      ?>
      <form action="" method="POST">
        <div style="text-align: center;color: #000;padding: 20px 0px;border-radius: 20px;">Editar Permisos</div>
        <div class="mb-3 form-check">
          <input type="hidden" class="form-control" name="mid"  value="<?php echo $fila['idnivel']; ?>" id="exampleInputNombre2">
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputEstado2" class="form-label">Usuarios</label>
          <select class="form-select" name="musuarios" id="exampleInputEstado1">
            <option value="0" <?php echo $fila['usuarios'] == 0 ? 'selected' : ''; ?>> Desactivado </option>
            <option value="1" <?php echo $fila['usuarios'] == 1 ? 'selected' : ''; ?>> Activado </option>
          </select>
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputEstado2" class="form-label">Tabla Personas</label>
          <select class="form-select" name="mpersonas" id="exampleInputEstado1">
            <option value="0" <?php echo $fila['personas'] == 0 ? 'selected' : ''; ?>> Desactivado </option>
            <option value="1" <?php echo $fila['personas'] == 1 ? 'selected' : ''; ?>> Activado </option>
          </select>
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputEstado2" class="form-label">Tabla Permisos</label>
          <select class="form-select" name="mpermisos" id="exampleInputEstado1">
            <option value="0" <?php echo $fila['permisos'] == 0 ? 'selected' : ''; ?>> Desactivado </option>
            <option value="1" <?php echo $fila['permisos'] == 1 ? 'selected' : ''; ?>> Activado </option>
          </select>
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputEstado2" class="form-label">Tabla Diligencias</label>
          <select class="form-select" name="mdiligencias" id="exampleInputEstado1">
            <option value="0" <?php echo $fila['diligencias'] == 0 ? 'selected' : ''; ?>> Desactivado </option>
            <option value="1" <?php echo $fila['diligencias'] == 1 ? 'selected' : ''; ?>> Activado </option>
          </select>
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputEstado2" class="form-label">Reporte Visitas</label>
          <select class="form-select" name="mvisitas" id="exampleInputEstado1">
            <option value="0" <?php echo $fila['visitas'] == 0 ? 'selected' : ''; ?>> Desactivado </option>
            <option value="1" <?php echo $fila['visitas'] == 1 ? 'selected' : ''; ?>> Activado </option>
          </select>
        </div>
        <div class="mb-3 form-check">
          <label for="exampleInputEstado2" class="form-label">Reporte Permisos</label>
          <select class="form-select" name="mreportepermisos" id="exampleInputEstado1">
            <option value="0" <?php echo $fila['reporte_permisos'] == 0 ? 'selected' : ''; ?>> Desactivado </option>
            <option value="1" <?php echo $fila['reporte_permisos'] == 1 ? 'selected' : ''; ?>> Activado </option>
          </select>
        </div>
        <div class="modal-footer">
          <a href="index.php" class="btn btn-secondary">Cancelar</a>
          <input type="submit" class="btn btn-primary" name="editar" value="Guardar">
        </div>
        <?php
          $idmu=$_GET['id'];
          if (isset($_POST['musuarios']) && isset($_POST['mpersonas']) && isset($_POST['mvisitas']) && isset($_POST['mreportepermisos']) && isset($_POST['mdiligencias'])) {
            if(isset($_POST['musuarios']))
            {
              $musuarios=(int)$_POST['musuarios'];
            }
            if(isset($_POST['musuarios']))
            {
              $mpersonas=(int)$_POST['mpersonas'];
            }
            if(isset($_POST['mvisitas']))
            {
              $mvisitas=(int)$_POST['mvisitas'];
            }
            if(isset($_POST['mpermisos']))
            {
              $mpermisos=(int)$_POST['mpermisos'];
            }
            if(isset($_POST['mdiligencias']))
            {
              $mdiligencias=(int)$_POST['mdiligencias'];
            }
            if(isset($_POST['mreportepermisos']))
            {
              $mreportepermisos=(int)$_POST['mreportepermisos'];
            }
            if (isset($_POST['editar'])) {
              $editar="UPDATE permisos SET idnivel= '$idmu',usuarios='$musuarios',personas='$mpersonas',visitas='$mvisitas',permisos='$mpermisos,reporte_permisos='$mreportepermisos',diligencias='$mdiligencias' WHERE idnivel='$idmu'";
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
