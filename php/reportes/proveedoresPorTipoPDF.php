<?php
include("../../php/seguridad.php"); 
include("../../php/privilegio.php");
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
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'PROVEEDORES POR TIPO', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Cell(100, 8, 'tipo: '.$tipo, 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(5, 8, 'ID', 0);
$pdf->Cell(40, 8, 'Nombre', 0);
$pdf->Cell(35, 8, 'Tipo', 0);
$pdf->Cell(35, 8, 'Direccion', 0);
$pdf->Cell(18, 8, 'Celular', 0);
$pdf->Cell(18, 8, 'Fecha Reg.', 0);
$pdf->Cell(18, 8, 'CUIL', 0);
$pdf->Cell(40, 8, 'EMAIL', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA

$productos = mysql_query("SELECT * FROM proveedores,  tipoclientes WHERE tipo_prove = id_tipo_client AND tipo_cliente_tipo = '$tipo' ORDER BY nomb_prove ASC");


while($productos2 = mysql_fetch_array($productos)){

	$pdf->Cell(5, 8, $productos2['id_prove'], 0);
	$pdf->Cell(40, 8, $productos2['nomb_prove'], 0);
	$pdf->Cell(35, 8, $productos2['tipo_cliente_tipo'], 0);
	$pdf->Cell(35, 8, $productos2['direccion_prove'], 0);
	$pdf->Cell(18, 8, $productos2['celular_prove'], 0);
	$pdf->Cell(18, 8, $productos2['fecha_reg_prove'], 0);
	$pdf->Cell(18, 8, $productos2['cuil_prove'], 0);
	$pdf->Cell(40, 8, $productos2['email_prove'], 0);
	$pdf->Ln(8);
}


$pdf->Output('reporteProveedresPorTipo.pdf','I');
?>