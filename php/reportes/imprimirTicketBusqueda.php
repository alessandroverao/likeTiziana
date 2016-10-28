<?php
include("../../php/seguridad.php");
include("../../php/privilegio.php");
$tipo = $_POST['tipo'];
require('../../fpdf/fpdf.php');
require('../../php/conexion.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(75, 8, '', 0);
$pdf->Cell(150, 10, 'likeTiziana', 0, 'C');
$pdf->Ln(6);
$pdf->SetFont('Times', 'B', 18);
$pdf->Cell(65, 8, '', 0);
$pdf->Cell(150, 10, 'Los dos Hermanos', 0);
$pdf->Ln(8);
$pdf->SetFont('Times', '', 11);
$pdf->Cell(200, 10, 'Vera Oszika Alessandro', 0);
$pdf->Ln(5);
$pdf->SetFont('Times', '', 11);
$pdf->Cell(200, 10, 'C.U.I.T.: 20-93945315-7', 0);
$pdf->Ln(5);
$pdf->SetFont('Times', '', 11);
$pdf->Cell(200, 10, 'Direccion: Las Palmas 1350 - Barrio: Mapuri', 0);
$pdf->Ln(5);
$pdf->SetFont('Times', '', 11);
$pdf->Cell(200, 10, 'CP: 3334 - Puerto Rico - Misiones', 0);
$pdf->Ln(5);
$pdf->SetFont('Times', '', 11);
$pdf->Cell(200, 10, 'Responsable Monotributo', 0);
$pdf->Ln(5);
$pdf->SetFont('Times', '', 11);
$pdf->Cell(200, 10, 'A Consumodir Final', 0);
$pdf->Ln(5);
$pdf->SetFont('Times', '', 11);
$pdf->Cell(200, 10, 'Responsable Monotributo', 0);
$pdf->Ln(10);
$pdf->SetFont('Times', '', 11);
$pdf->Cell(35, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Cell(50, 10, 'Hora: '.date('h:m:s').'', 0);
$pdf->Ln(10);
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(10, 10, 'ID', 0);
$pdf->Cell(10, 10, ' ', 0);
$pdf->Cell(75, 10, 'PRODUCTO', 0);
$pdf->Cell(25, 10, 'CANTIDAD', 0);
$pdf->Cell(20, 10, 'PRECIO', 0);
$pdf->Ln(10);



//CONSULTA

$productos = mysql_query("SELECT * FROM ventas, detalleventa, productos WHERE id_venta = '$tipo' AND id_venta_detalle = '$tipo' AND id_prod_detalle = id_prod"); 

$id = 1;
$total = 0;
while($productos2 = mysql_fetch_array($productos)){
	$total += $productos2['importe_detalle'];
	$pdf->Cell(10, 8, $id, 0); 
	$pdf->Cell(10, 8, $productos2['id_prod_detalle'], 0);
	$pdf->Cell(75, 8, $productos2['nomb_prod'], 0);
	$pdf->Cell(25, 8, $productos2['cantidad_detalle'], 0);
	$pdf->Cell(20, 8, $productos2['importe_detalle'], 0);
	$pdf->Ln(8);
	$id++;
}

$pdf->SetFont('Times', '', 11);
$pdf->Cell(20, 10, 'TOTAL: ', 0);
$pdf->Cell(200, 10, $total, 0);
$pdf->Ln(10);

mysql_query("UPDATE ventas SET impresiones = 1 WHERE id_venta = '$tipo'");

$pdf->Output('ticket.pdf','I');

?>