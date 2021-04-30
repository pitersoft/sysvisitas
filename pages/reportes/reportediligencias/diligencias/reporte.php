<?php

    include 'plantilla.php';
    require '../../../../conf/conexion.php';
    if (!empty($_POST)) {

        $fing = mysqli_escape_string($conexion, $_POST['filtroing']);
        $fsal = mysqli_escape_string($conexion, $_POST['filtrosal']);
        $filtroing = mysqli_escape_string($conexion, $_POST['filtroing']." 00:00:00");
        $filtrosal = mysqli_escape_string($conexion, $_POST['filtrosal']." 23:59:59");
        $query = "SELECT * FROM diligencias INNER JOIN usuario ON diligencias.idusuario = usuario.idusuario WHERE fecha_hora_ingreso BETWEEN '$filtroing' AND '$filtrosal'";
        $resultado = $conexion->query($query);

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,10,'Inicio: '.$fing.' - Fin: '.$fsal,0,1,'C');
        $pdf->Cell(280,10,'',0,1,'C');
        $pdf->Cell(15, 6, utf8_decode('N°'), 1, 0, 'C',1);
        $pdf->Cell(60, 6, 'USUARIO', 1, 0, 'C',1);
        $pdf->Cell(40, 6, 'FECHA INGRESO', 1, 0, 'C',1);
        $pdf->Cell(30, 6, 'MOTIVO', 1, 0, 'C',1);
        $pdf->Cell(20, 6, 'TIEMPO', 1, 0, 'C',1);
        $pdf->Cell(40, 6, 'FECHA RETORNO', 1, 0, 'C',1);
        $pdf->Cell(55, 6, utf8_decode('DESCRIPCIÓN'), 1, 0, 'C',1);
        $pdf->Cell(20, 6, 'ESTADO', 1, 1, 'C',1);
        $pdf->SetFont('Arial','',10);
        while ($row=$resultado->fetch_assoc()) {
            $pdf->Cell(15, 6,$row['id_diligencia'], 1, 0, 'C');
            $pdf->Cell(60, 6,utf8_decode($row['nombre']." ". $row['apellidos']), 1, 0, 'C');
            $pdf->Cell(40, 6,$row['fecha_hora_ingreso'], 1, 0, 'C');
            $pdf->Cell(30, 6,$row['motivo'], 1, 0, 'C');
            $pdf->Cell(20, 6,$row['tiempo'], 1, 0, 'C');
            $pdf->Cell(40, 6,$row['fecha_hora_retorno'], 1, 0, 'C');
            $pdf->Cell(55, 6,$row['descripcion'], 1, 0, 'C');
            $pdf->Cell(20, 6,$row['estado'], 1, 1, 'C');
        }
        $pdf->Output();
    }

?>
