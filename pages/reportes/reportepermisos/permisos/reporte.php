<?php

    include 'plantilla.php';
    require '../../../../conf/conexion.php';
    if (!empty($_POST)) {

        // $fing = mysqli_escape_string($conexion, $_POST['filtroing']);
        // $fsal = mysqli_escape_string($conexion, $_POST['filtrosal']);
        // $filtroing = mysqli_escape_string($conexion, $_POST['filtroing']." 00:00:00");
        // $filtrosal = mysqli_escape_string($conexion, $_POST['filtrosal']." 23:59:59");
        // $where="WHERE fh_ingreso BETWEEN '$filtroing' AND '$filtrosal'"
        $query = "SELECT * FROM permisos INNER JOIN niveles ON permisos.idnivel = niveles.idnivel";
        $resultado = $conexion->query($query);

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(200,10,'Activado = 1   -   Desactivado = 0',0,1,'C');
        $pdf->Cell(30, 6, '', 1, 0, 'C',1);
        $pdf->Cell(40, 6, 'FORMULARIOS', 1, 0, 'C',1);
        $pdf->Cell(60, 6, 'TABLAS', 1, 0, 'C',1);
        $pdf->Cell(60, 6, 'REPORTES', 1, 1, 'C',1);
        $pdf->Cell(30, 6, 'NIVEL', 1, 0, 'C',1);
        $pdf->Cell(40, 6, 'USUARIOS', 1, 0, 'C',1);
        $pdf->Cell(30, 6, 'PERSONAS', 1, 0, 'C',1);
        $pdf->Cell(30, 6, 'PERMISOS', 1, 0, 'C',1);
        $pdf->Cell(30, 6, 'VISITAS', 1, 0, 'C',1);
        $pdf->Cell(30, 6, 'PERMISOS', 1, 1, 'C',1);
        $pdf->SetFont('Arial','',10);
        while ($row=$resultado->fetch_assoc()) {
            $pdf->Cell(30, 6,utf8_decode($row['nivel']), 1, 0, 'C');
            $pdf->Cell(40, 6,$row['usuarios'], 1, 0, 'C');
            $pdf->Cell(30, 6,$row['personas'], 1, 0, 'C');
            $pdf->Cell(30, 6,$row['permisos'], 1, 0, 'C');
            $pdf->Cell(30, 6,$row['visitas'], 1, 0, 'C');
            $pdf->Cell(30, 6,$row['reporte_permisos'], 1, 1, 'C');
        }
        $pdf->Output();
    }

?>