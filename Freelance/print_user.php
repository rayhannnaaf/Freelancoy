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

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$result = $koneksi->query("SELECT id, username, email FROM tb_admin");

while($row = $result->fetch_assoc()) {
    $pdf->Cell(10,10,$row['id'],1);
    $pdf->Cell(60,10,$row['username'],1);
    $pdf->Cell(120,10,$row['email'],1);
    $pdf->Ln();
}

$pdf->Output();
?>

