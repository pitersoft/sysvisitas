<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | ChartJS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="">
  <?php
    include '../../conf/conexion.php';
    $year = date('Y');
    $fienero = $year."-01-01 00:00:00";
    $ftenero = $year."-01-31 23:59:59";
    $sql1 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fienero' AND '$ftenero'";
    $result1 = mysqli_query($conexion, $sql1);
    $enero = mysqli_fetch_assoc($result1);

    $fifebrero = $year."-02-01 00:00:00";
    $ftfebrero = $year."-02-31 23:59:59";
    $sql2 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fifebrero' AND '$ftfebrero'";
    $result2 = mysqli_query($conexion, $sql2);
    $febrero = mysqli_fetch_assoc($result2);

    $fimarzo = $year."-03-01 00:00:00";
    $ftmarzo = $year."-03-31 23:59:59";
    $sql3 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fimarzo' AND '$ftmarzo'";
    $result3 = mysqli_query($conexion, $sql3);
    $marzo = mysqli_fetch_assoc($result3);

    $fiabril = $year."-04-01 00:00:00";
    $ftabril = $year."-04-31 23:59:59";
    $sql4 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fiabril' AND '$ftabril'";
    $result4 = mysqli_query($conexion, $sql4);
    $abril = mysqli_fetch_assoc($result4);

    $fimayo = $year."-05-01 00:00:00";
    $ftmayo = $year."-05-31 23:59:59";
    $sql5 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fimayo' AND '$ftmayo'";
    $result5 = mysqli_query($conexion, $sql5);
    $mayo = mysqli_fetch_assoc($result5);

    $fijunio = $year."-06-01 00:00:00";
    $ftjunio = $year."-06-31 23:59:59";
    $sql6 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fijunio' AND '$ftjunio'";
    $result6 = mysqli_query($conexion, $sql6);
    $junio = mysqli_fetch_assoc($result6);
   
    $fijulio = $year."-07-01 00:00:00";
    $ftjulio = $year."-07-31 23:59:59";
    $sql7 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fijulio' AND '$ftjulio'";
    $result7 = mysqli_query($conexion, $sql7);
    $julio = mysqli_fetch_assoc($result7);

    $fiagosto = $year."-08-01 00:00:00";
    $ftagosto = $year."-08-31 23:59:59";
    $sql8= "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fiagosto' AND '$ftagosto'";
    $result8 = mysqli_query($conexion, $sql8);
    $agosto = mysqli_fetch_assoc($result8);

    $fiseptiembre = $year."-09-01 00:00:00";
    $ftseptiembre = $year."-09-31 23:59:59";
    $sql9 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fiseptiembre' AND '$ftseptiembre'";
    $result9 = mysqli_query($conexion, $sql9);
    $septiembre = mysqli_fetch_assoc($result9);

    $fioctubre = $year."-10-01 00:00:00";
    $ftoctubre = $year."-10-31 23:59:59";
    $sql10 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fioctubre' AND '$ftoctubre'";
    $result10 = mysqli_query($conexion, $sql10);
    $octubre = mysqli_fetch_assoc($result10);

    $finoviembre = $year."-11-01 00:00:00";
    $ftnoviembre = $year."-11-31 23:59:59";
    $sql11 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$finoviembre' AND '$ftnoviembre'";
    $result11 = mysqli_query($conexion, $sql11);
    $noviembre = mysqli_fetch_assoc($result11);

    $fidiciembre = $year."-12-01 00:00:00";
    $ftdiciembre = $year."-12-31 23:59:59";
    $sql12 = "SELECT COUNT(*) total FROM visitas WHERE fh_ingreso BETWEEN '$fidiciembre' AND '$ftdiciembre'";
    $result12 = mysqli_query($conexion, $sql12);
    $diciembre = mysqli_fetch_assoc($result12);
  ?>
    <?php
    include '../../conf/conexion.php';
    $sqln1 = "SELECT COUNT(*) total FROM usuario WHERE idnivel=1";
    $resultn1 = mysqli_query($conexion, $sqln1);
    $nivel1 = mysqli_fetch_assoc($resultn1);
   
    $sqln2 = "SELECT COUNT(*) total FROM usuario WHERE idnivel=2";
    $resultn2 = mysqli_query($conexion, $sqln2);
    $nivel2 = mysqli_fetch_assoc($resultn2);

    $sqln3 = "SELECT COUNT(*) total FROM usuario WHERE idnivel=3";
    $resultn3 = mysqli_query($conexion, $sqln3);
    $nivel3 = mysqli_fetch_assoc($resultn3);

    $sqln4 = "SELECT COUNT(*) total FROM usuario WHERE idnivel=4";
    $resultn4 = mysqli_query($conexion, $sqln4);
    $nivel4 = mysqli_fetch_assoc($resultn4);

    $sqln5 = "SELECT COUNT(*) total FROM usuario WHERE idnivel=5";
    $resultn5 = mysqli_query($conexion, $sqln5);
    $nivel5 = mysqli_fetch_assoc($resultn5);

    $sqln6 = "SELECT COUNT(*) total FROM usuario WHERE idnivel=6";
    $resultn6 = mysqli_query($conexion, $sqln6);
    $nivel6 = mysqli_fetch_assoc($resultn6);

    $sqln7 = "SELECT COUNT(*) total FROM usuario WHERE idnivel=7";
    $resultn7 = mysqli_query($conexion, $sqln7);
    $nivel7 = mysqli_fetch_assoc($resultn7); 
    ?>
  <div class="content">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Visitas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Usuarios por Niveles</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Usuarios por Niveles</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Visitas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Visitas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Visitas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    
    var areaChartData = {
      labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Ocubre', 'Noviembre', 'Diciembre'],
      datasets: [
        {
          label               : 'Visitas',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : 
          [<?php echo $enero['total'].",".$febrero['total'].",".$marzo['total'].",".$abril['total'].",".$mayo['total'].",".$junio['total'].",".$julio['total'].",".$agosto['total'].",".$septiembre['total'].",".$octubre['total'].",".$noviembre['total'].",".$diciembre['total']; ?>]
        },
        {
          label               : '',
          backgroundColor     : 'rgba(255, 255, 255, 1)',
          borderColor         : 'rgba(255, 255, 255, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [0,0,0,0,0,0,0,0,0,0,0,0]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {

      labels:
      [
      <?php 
          include '../../conf/conexion.php';
          $query=mysqli_query($conexion,"SELECT * FROM niveles");
          while($nivel = mysqli_fetch_array($query)){
          echo "'".$nivel['nivel']."',";
          }
      ?>
      ], 
      datasets: [
        {
          data: [<?php echo $nivel1['total'].",".$nivel2['total'].",".$nivel3['total'].",".$nivel4['total'].",".$nivel5['total'].",".$nivel6['total'].",".$nivel7['total']; ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#A719CD'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>
</body>
</html>