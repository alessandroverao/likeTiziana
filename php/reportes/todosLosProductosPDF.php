<?php

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
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'TODOS LOS PRODUCTOS', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(5, 8, 'ID', 0);
$pdf->Cell(55, 8, 'Nombre', 0);
$pdf->Cell(25, 8, 'Cod. de Barras', 0);
$pdf->Cell(20, 8, 'Tipo', 0);
$pdf->Cell(18, 8, 'Prec. Cost.', 0);
$pdf->Cell(15, 8, 'Porcent.', 0);
$pdf->Cell(18, 8, 'Precio Unit.', 0);
$pdf->Cell(10, 8, 'Exist.', 0);
$pdf->Cell(20, 8, 'Fecha Reg.', 0);
$pdf->Cell(10, 8, 'IVA', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA

$productos = mysql_query("SELECT * FROM productos"); 


while($productos2 = mysql_fetch_array($productos)){

	$pdf->Cell(5, 8, $productos2['id_prod'], 0);
	$pdf->Cell(55, 8, $productos2['nomb_prod'], 0);
	$pdf->Cell(25, 8, $productos2['cod_barra'], 0);
	$pdf->Cell(20, 8, $productos2['tipo_prod'], 0);
	$pdf->Cell(18, 8, $productos2['precio_cost'], 0);
	$pdf->Cell(15, 8, $productos2['porcentaje_prod'], 0);
	$pdf->Cell(18, 8, $productos2['precio_unit'], 0);
	$pdf->Cell(10, 8, $productos2['existencia_prod'], 0);
	$pdf->Cell(20, 8, $productos2['fecha_reg'], 0);
	$pdf->Cell(10, 8, $productos2['iva_prod'], 0);
	$pdf->Ln(8);
}


$pdf->Output('reporteTodosLosProductos.pdf','I');
?>