<?php
require('fpdf.php');
include 'db.php';

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial','B',15);
        $this->Cell(80);
        $this->Cell(30,10,'User List',0,0,'C');
        $this->Ln(20);
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

// Table header
$pdf->Cell(40,10,'Username',1);
$pdf->Cell(50,10,'Email',1);
$pdf->Ln();

// Table data
$result = $koneksi->query("SELECT username, email FROM tb_admin");
while($row = $result->fetch_assoc()) {
    $pdf->Cell(40,10,$row['username'],1);
    $pdf->Cell(50,10,$row['email'],1);
    $pdf->Ln();
}

$pdf->Output();
?>