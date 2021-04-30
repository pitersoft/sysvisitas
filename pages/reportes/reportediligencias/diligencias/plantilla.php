<?php
	
	require 'fpdf/fpdf.php';

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/logo.png', 5, 5, 30);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(200,10, 'Reporte Diligencias',0,0,'C');

			$this->Ln(20);
		}
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$page=$this->PageNo();
			$this->Cell(0,10, ('Pagina '.$page.'/{nb}'),0,0,'C' );
		}
	}
	    
?>