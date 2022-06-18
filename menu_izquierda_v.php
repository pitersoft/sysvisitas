  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="img/favicon.ico" alt="Dashboard" class="brand-image  elevation-3" style="opacity: 0.8;background-color: #fff;border-radius: 5px;">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="width: 60px;height: 60px;border-radius: 100%;background-color: #fff;" src="imgperfil/<?php echo $_SESSION['perfil']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block" style="text-decoration: none;"><?php echo $_SESSION['nombre']."<br>".$_SESSION['nivel']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

<!--           <li class="nav-item">
            <a href="pages/dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
            </ul>
          </li> -->

          <?php

              $sellac= "SELECT u.*, p.* FROM usuario u INNER JOIN permisos p ON u.idnivel = p.idnivel WHERE u.idusuario=:idusuario";
              $db = $dbh->prepare($sellac);
              $db->bindValue(":idusuario", $_SESSION["idusuario"], PDO::PARAM_INT);
              $db->execute();
              $filas = $db->rowCount();
              // $rs = $db->fetch(PDO::FETCH_OBJ); 

              while($rs = $db->fetch(PDO::FETCH_OBJ))
                {

                  if ($rs->usuarios==1) {
          ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Formularios
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="pages/forms/usuarios" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Usuarios</p>
                    </a>
                  </li>
              </ul>
            </li>
          <?php 
              }

            }

            $sellac= "SELECT * FROM usuario INNER JOIN permisos ON usuario.idnivel = permisos.idnivel WHERE email='$usuario'";
            $queryac=mysqli_query($conexion,$sellac);
                while($acceso3 = mysqli_fetch_array($queryac))
                {

          if ($acceso3['personas']==1 || $acceso3['permisos']==1 || $acceso3['diligencias']==1) {
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tablas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/visitas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visitas</p>
                </a>
              </li>
              <?php
                     $sellac= "SELECT * FROM usuario INNER JOIN permisos ON usuario.idnivel = permisos.idnivel WHERE email='$usuario'";
                    $queryac=mysqli_query($conexion,$sellac);
                    while($acceso1 = mysqli_fetch_array($queryac))
                    {
              if ($acceso1['personas']==1) {
              ?>
              <li class="nav-item">
                <a href="pages/tables/personas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personas</p>
                </a>
              </li>
              <?php 
                }
              if ($acceso1['permisos']==1) {
              ?>
              <li class="nav-item">
                <a href="pages/tables/permisos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permisos</p>
                </a>
              </li>
              <?php 
                }
              if ($acceso1['diligencias']==1) {
              ?>
              <li class="nav-item">
                <a href="pages/tables/diligencias" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Diligencias</p>
                </a>
              </li>
              <?php 
                }

              }
              ?>
            </ul>
          </li>
          <?php 
              }
            }
          ?>
          <?php
            $sellac= "SELECT * FROM usuario INNER JOIN permisos ON usuario.idnivel = permisos.idnivel WHERE email='$usuario'";
            $queryac=mysqli_query($conexion,$sellac);
              while($acceso5 = mysqli_fetch_array($queryac))
                {

              if ($acceso5['visitas']==1 || $acceso5['reporte_permisos']==1 || $acceso5['reporte_diligencias']==1) {
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i><p>Reporte<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <?php
                     $sellac= "SELECT * FROM usuario INNER JOIN permisos ON usuario.idnivel = permisos.idnivel WHERE email='$usuario'";
                    $queryac=mysqli_query($conexion,$sellac);
                    while($acceso6 = mysqli_fetch_array($queryac))
                    {

                      if ($acceso6['visitas']==1) {
              ?>
              <li class="nav-item">
                <a href="pages/reportes/visitas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visitas</p>
                </a>
              </li>
              <?php 
                }
              ?>
              <?php
              if ($acceso6['reporte_permisos']==1) {
              ?>
              <li class="nav-item">
                <a href="pages/reportes/reportepermisos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permisos</p>
                </a>
              </li>
              <?php 
                }
                if ($acceso6['reporte_diligencias']==1) {
              ?>
              <li class="nav-item">
                <a href="pages/reportes/reportediligencias" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Diligencias</p>
                </a>
              </li>
              <?php 
                }
              }
              ?>
            </ul>
          </li>
          <?php 
              }
            }
          ?>
<!--           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Opciones
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opción 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opción 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opción 3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opción 4</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opción 5</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opción 6</p>
                </a>
              </li>
            </ul>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>