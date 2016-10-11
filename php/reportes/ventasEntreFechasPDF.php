<?php

if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
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
$pdf->Cell(100, 8, 'VENTAS ENTRE FECHAS', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Cell(100, 8, 'desde: '.$verDesde.' hasta: '.$verHasta, 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(10, 8, 'Item', 0);
$pdf->Cell(10, 8, 'Venta', 0);
$pdf->Cell(60, 8, 'Nombre', 0);
$pdf->Cell(25, 8, 'Cod. de Barras', 0);
$pdf->Cell(25, 8, 'Tipo', 0);
$pdf->Cell(15, 8, 'Precio U.', 0);
$pdf->Cell(35, 8, 'Cliente', 0);
$pdf->Cell(30, 8, 'Fecha', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysql_query("SELECT * FROM productos, clientes, ventas, detalleventa WHERE fecha_venta BETWEEN '$fecha1' AND '$fecha2' AND id_venta = id_venta_detalle AND id_prod = id_prod_detalle AND id_clien_venta = id_clien AND estadodetalle=0"); 
$item = 0;
$totaluni = 0;
while($productos2 = mysql_fetch_array($productos)){
	$item = $item+1;
	$totaluni = $totaluni + $productos2['importe_detalle'];
	$pdf->Cell(10, 8, $item, 0);
	$pdf->Cell(10, 8, $productos2['id_venta'], 0);
	$pdf->Cell(60, 8, $productos2['nomb_prod'], 0);
	$pdf->Cell(25, 8, $productos2['cod_barra'], 0);
	$pdf->Cell(25, 8, $productos2['tipo_prod'], 0);
	$pdf->Cell(15, 8, $productos2['importe_detalle'], 0);
	$pdf->Cell(35, 8, $productos2['nomb_clien'], 0);
	$pdf->Cell(30, 8, $productos2['fecha_venta'], 0);
	$pdf->Ln(8);
}
$pdf->Cell(60, 8, '', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(130,8,'',0);
$pdf->Cell(15,8,'Total: $ ',1);
$pdf->Cell(50,8,$totaluni,0);

$pdf->Output('reporteVentasEntreFechas.pdf','D');
?>