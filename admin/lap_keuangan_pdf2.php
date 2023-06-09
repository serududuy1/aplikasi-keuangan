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
$pdf->ln(7);

$tgl_mulai = $_GET['tgl_mulai'];
$tgl_selesai = $_GET['tgl_selesai'];
$rt = $_GET['rt'];
$rw = $_GET['rw'];
$no=1;

$pdf->SetFont('Arial','',11);
$pdf->cell (165,7,'Di cetak pada tanggal :',0,0,'R');
$pdf->Cell(165,7,date('d-m-Y'),0,1,'L');

$pdf->ln(5);

$pdf->SetFont('Arial','B',12 );
$pdf->cell (50,7,'Laporan Data Keuangan',0,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(35,7,'Periode Tanggal',0,0,'L');
$pdf->cell (3,7,':',0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(73,7,''.$_GET['tgl_mulai'].'  s/d  '.$_GET['tgl_selesai'].'',0,1,'L');


$sql=mysqli_query($koneksi,"select * from keuangan where status='terima'
	and rt='$rt' and rw='$rw' and tgl between '$tgl_mulai' and DATE_ADD('$tgl_selesai', INTERVAL 1 DAY) limit 1 ");
while ($data=mysqli_fetch_array($sql)) 
{
	$pdf->SetFont('Arial','B',11);    	
	$pdf->cell (35,7,'Alamat',0,0,'L');
	$pdf->cell (3,7,':',0,0,'L');
	$pdf->SetFont('Arial','',11);    	
	$pdf->cell (50,7,$data['alamat'],0,1,'L');
}	

$pdf->ln(3);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(40,7,'Nama' ,1,0,'C');
$pdf->Cell(40,7,'Tanggal',1,0,'C');
$pdf->Cell(40,7,'Kategori',1,0,'C');
$pdf->Cell(20,7,'Status',1,0,'C');
$pdf->Cell(35,7,'Uang',1,0,'C');


$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','',10);

$sql=mysqli_query($koneksi,"select * from keuangan where status='terima'
	and rt='$rt' and rw='$rw' and tgl between '$tgl_mulai' and '$tgl_selesai'");
while ($data=mysqli_fetch_array($sql)) 
{
	$pdf->Cell(10,7, $no++,1,0,'C');
	$pdf->Cell(40,7, $data['nama'],1,0,'C');  
	$pdf->Cell(40,7, $data['tgl'],1,0,'C');
	$pdf->Cell(40,7, $data['typeuang'],1,0,'C');
	$pdf->Cell(20,7, $data['status'],1,0,'C');
	$pdf->Cell(35,7, 'Rp.'.number_format($data['saldo_akhir']).'',1,1,'C');

}

$pdf->Output();

?>