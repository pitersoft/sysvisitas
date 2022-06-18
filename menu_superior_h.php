<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="pages/dashboard.php" class="nav-link">Home</a>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="salir.php" class="btn btn-danger">Salir</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
<!--       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">

            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
<!--       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="btn"  data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          <img style="width: 40px;height: 40px;border-radius: 20px;" src="imgperfil/<?php echo $_SESSION['perfil']; ?>" alt="">
        </a>
      </li>
      <div class="collapse" id="collapseExample" style="position: absolute;left: 70%;top: 75px;width: 300px;">
        <div class="card card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <img style="width: 200px;height: 200px;border-radius: 100%;margin: 10px 35px;border: 2px solid #000;" src="imgperfil/<?php echo $_SESSION['perfil']; ?>" alt="">
            <div class="mb-3">
              <label class="form-label" for="nombre">Nombre</label>
              <input class="form-control" id="nombre" value="<?php echo $_SESSION['nombre']; ?>" name="nombreimg" type="text" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="imagen">Foto de Perfil</label>
              <input class="form-control" required="" id="imagen" name="imagenimg" type="file" />
            </div>
            <div>
              <span><input id="enviar" class="btn btn-primary"  name="guardarperfil" type="submit" value="Enviar" /></span>
            </div>
            <?php
            if(isset($_POST['guardarperfil'])){
              $nombreimg=$_POST['nombreimg'];
              if(isset($_FILES['imagenimg'])){
                $tmp_name = $_FILES['imagenimg']['tmp_name'];
                $directorio = "imgperfil/";
                $nombre = basename($_FILES['imagenimg']['name']);
                $subido = move_uploaded_file($tmp_name, $directorio.$nombre);
              }
              $queryimg="UPDATE usuario SET nombre='$nombreimg', perfil='$nombre' WHERE email='$usuario'";

              $resultadoimg=$conexion->query($queryimg);
              if ($resultadoimg) {
                echo '<br><div class="alert alert-success">Se guardo imagen.</div>';
                $url='index.php';
                echo '<meta http-equiv=refresh content="0.5; '.$url.'">';
                die;
                // header("location: index.php");
              } else {
                echo '<br><div class="alert alert-warning">No se guardo imagen.</div>';
              }
            }
            ?>
          </form>
        </div>
      </div>


    </ul>
  </nav>