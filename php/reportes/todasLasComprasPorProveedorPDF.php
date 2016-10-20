<?php
$tipo = $_GET['tipo'];
require('../../fpdf/fpdf.php');
require('../../php/conexion.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../../images/tienda.gif' , 10 ,8, 10 , 10,'GIF');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'likeTiziana', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 8, '', 0);
$pdf->Cell(100, 8, 'TODAS LAS COMPRAS POR PROVEEDOR', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Cell(100, 8, 'Proveedor: ' .$tipo, 0);
$pdf->Ln(23);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 8, ' ', 0);
$pdf->Cell(100, 8, 'Proveedor', 0);
$pdf->Cell(30, 8, 'Fecha compra', 0);
$pdf->Cell(30, 8, 'Importe compra', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA

$productos = mysql_query("SELECT * FROM compras, proveedores WHERE id_provee_compra = id_prove AND nomb_prove = '$tipo'");
$item = 0;
$totaluni = 0;
while($productos2 = mysql_fetch_array($productos)){
	$item = $item+1;
	$totaluni = $totaluni + $productos2['importe_compra'];
	$pdf->Cell(20, 8, $item, 0);
	$pdf->Cell(100, 8, $productos2['nomb_prove'], 0);
	$pdf->Cell(30, 8, $productos2['fecha_compra'], 0);
	$pdf->Cell(30, 8, $productos2['importe_compra'], 0);
	$pdf->Ln(8);
}
$pdf->Cell(60, 8, '', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130,8,'',0);
$pdf->Cell(15,8,'Total: $ ',1);
$pdf->Cell(50,8,$totaluni,0);

$pdf->Output('reporteTodasLasCompras.pdf','I');
?>