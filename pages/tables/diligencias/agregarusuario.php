<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    <?php  
      include '../../../conf/conexion.php';
      $nusuario = $_POST['nusuario'];
      $nfhingreso = $_POST['nfhingreso'];
      $nmotivo = $_POST['nmotivo'];
      $ntiempo = $_POST['ntiempo'];
      $nfhretorno = $_POST['nfhretorno'];
      $ndescripcion = $_POST['ndescripcion'];
      if (isset($_POST['nuevo'])) {
        $agregar="INSERT INTO diligencias(idusuario, fecha_hora_ingreso, motivo, tiempo, fecha_hora_retorno, estado, descripcion) VALUES ('$nusuario','$nfhingreso','$nmotivo','$ntiempo','$nfhretorno',0, '$ndescripcion')";

        $resultadoagregar=mysqli_query($conexion,$agregar);
        $respuestaagregar="Se ha agregado nuevo usuario.";
        echo $respuestaagregar;
        header("location: index.php");
      } else {
        $respuestaagregar="No se ha podido agregar nuevo usuario.";
        echo $respuestaagregar;
      }
      
    ?>
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