<?php

require('../../fpdf/fpdf.php');
require('../../php/conexion.php');
$fecha = date('Y-m-d');
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
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'VALOR STOCK PRECIO VENTA', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(10, 8, 'ID', 0);
$pdf->Cell(65, 8, 'Nombre', 0);
$pdf->Cell(25, 8, 'Codigo de Barras', 0);
$pdf->Cell(30, 8, 'Tipo', 0);
$pdf->Cell(25, 8, 'Precio Unitario', 0);
$pdf->Cell(25, 8, 'Existencia', 0);
$pdf->Cell(30, 8, 'TOTAL', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA

$productos = mysql_query("SELECT * FROM productos");
$totaluni = 0;
while($productos2 = mysql_fetch_array($productos)){
	$totaluni = $totaluni + $productos2['precio_unit'] * $productos2['existencia_prod'];
	$pdf->Cell(10, 8, $productos2['id_prod'], 0);
	$pdf->Cell(65, 8, $productos2['nomb_prod'], 0);
	$pdf->Cell(25, 8, $productos2['cod_barra'], 0);
	$pdf->Cell(30, 8, $productos2['tipo_prod'], 0);
	$pdf->Cell(25, 8, $productos2['precio_unit'], 0);
	$pdf->Cell(25, 8, $productos2['existencia_prod'], 0);
	$pdf->Cell(30, 8, $productos2['precio_unit'] * $productos2['existencia_prod'], 0);
	$pdf->Ln(8);
}
$pdf->Cell(60, 8, '', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130,8,'',0);
$pdf->Cell(15,8,'Total: $ ',1);
$pdf->Cell(50,8,$totaluni,0);

$pdf->Output('reporteValorStockPrecioVenta.pdf','D');
?>