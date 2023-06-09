<?php

include '../config/config.php';
include '../assets/fpdf/fpdf.php';

//$pdf = new FPDF('L','mm',array(54.10,85.85));
$pdf = new FPDF('P','mm','A4');
//$pdf=new FPDF('P','mm',array(120,120));

$pdf->AddPage();

$pdf->SetFont('Arial','B',18);
$pdf->Image('../assets/img/KT_logo.png',10,6,30);
$pdf->cell (190,7,'SISTEM PENDATAAN KEUANGAN',0,1,'C');
$pdf->cell (190,7,'KARANG TARUNA SUDIMARA TIMUR',0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->cell (190,7,'Jln. Winong No. 23 Rt/Rw 002/05 Sudimara Timur Kec. Ciledug Kota Tangerang. ',0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->cell (190,7,'Email : kt-sudimara-timur@gmail.com  No Telepon : 081617559912 ',0,1,'C');
//jarak
$pdf->ln(1);
//garis hr
$pdf->cell(190,0.6,'','0','1','C',true);
$pdf->ln(5);


$sql=mysqli_query($koneksi,"select * from keuangan where nama='$_GET[nm]' and id='$_GET[id]' ");
while ($data=mysqli_fetch_array($sql)) 
{

	$pdf->SetFont('TIMES','',12);
	$pdf->cell (165,7,'Di cetak pada tanggal :',0,0,'R');
	$pdf->Cell(165,7,date('d-m-Y'),0,1,'L');

	$pdf->ln(7);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(20,7,'Nama',0,0,'L');
	$pdf->Cell(3,7,':',0,0);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,7,$data['nama'],0,1);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(20,7,'Alamat',0,0,'L');
	$pdf->Cell(3,7,':',0,0);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(100,7,$data['alamat'],0,1);
	

	$pdf->Cell(10,7,'',0,1);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(40,7,'Tanggal',1,0,'C');
	$pdf->Cell(20,7,'Kategori',1,0,'C');
	$pdf->Cell(84,7,'Keterangan',1,0,'C');	
	$pdf->Cell(20,7,'Status',1,0,'C');
	$pdf->Cell(25,7,'Uang',1,0,'C');

	$pdf->Cell(10,7,'',0,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(40,7, $data['tgl'],1,0,'C');
	$pdf->Cell(20,7, $data['typeuang'],1,0,'C');
	$pdf->Cell(84,7, $data['ket'],1,0,'C');	
	$pdf->Cell(20,7, $data['status'],1,0,'C');
	$pdf->Cell(25,7,number_format($data['saldo_akhir']),1,1,'C');




	$pdf->Ln(20);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(50,6,'Ybs Anggota',1,0,'C');
	$pdf->Cell(50,6,'Ketua',1,0,'C');
	$pdf->Ln();
	$pdf->Cell(50,25,'',1,0);
	$pdf->Cell(50,25,'',1,1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(50,7,$data['nama'],1,0,'C');

}

$sql=mysqli_query($koneksi,"select * from users where usertype='ketua'; ");
while ($data=mysqli_fetch_array($sql)) 
{
	$pdf->Cell(50,7,$data['nama'],1,0,'C');
}




$pdf->Output();

?>