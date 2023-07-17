<?php

include '../config/config.php';
include '../assets/fpdf/fpdf.php';

//$pdf = new FPDF('L','mm',array(54.10,85.85));
$pdf = new FPDF('P','mm','A4');
//$pdf=new FPDF('P','mm',array(120,120));

$pdf->AddPage();

$pdf->SetFont('Arial','B',18);
$pdf->Image('../assets/img/KT_logo.png',10,6,30);
$pdf->cell (190,7,'SISTEM PENDATAAN KEUANGAN ',0,1,'C');
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

$tgl_mulai =date( "Ymd" ,  strtotime (  $_GET['tgl_mulai'] ));  
$tgl_selesai =  date( "Ymd" ,  strtotime ( $_GET['tgl_selesai'] ));   
$no=1;

	$pdf->SetFont('Arial','',11);
	$pdf->cell (165,7,'Di cetak pada tanggal :',0,0,'R');
	$pdf->Cell(165,7,date('d-m-Y'),0,1,'L');

	$pdf->ln(5);


$pdf->SetFont('Arial','B',12 );
$pdf->cell (50,7,'Laporan Data Acara',0,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(35,7,'Periode Tanggal',0,0,'L');
$pdf->cell (3,7,':',0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(73,7,''.$_GET['tgl_mulai'].'  s/d  '.$_GET['tgl_selesai'].'',0,1,'L');

$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(8,10,'No',1,0,'C');
$pdf->Cell(28,10,'Nama' ,1,0,'C');
$pdf->Cell(20,10,'Tanggal',1,0,'C');
$pdf->Cell(110,10,'Alamat',1,0,'C');
$pdf->Cell(25,10,'Uang',1,0,'C');


	$pdf->Cell(10,10,'',0,1);
	$pdf->SetFont('Arial','',10);
$sql=mysqli_query($koneksi,"select * from trx inner join acara on acara.id_trx = trx.id_trx  inner join users on users.id_user = trx.id_user where trx.id_trx NOT IN (
	SELECT id_trx from trx where keterangan = 'saldo_awal' 
   ) and trx.status_trx='terima' and trx.keterangan='saldo_keluar'
and trx.tgl between '$tgl_mulai' and '$tgl_selesai'");
while ($data=mysqli_fetch_array($sql)) 
{
	$pdf->Cell(8,10, $no++,1,0,'C');
	$pdf->Cell(28,10, $data['nama_acara'],1,0,'C');  
	$pdf->Cell(20,10, $data['tgl'],1,0,'C');
	$pdf->Cell(110,10, $data['tempat_acara'],1,0,'L');
	$pdf->Cell(25,10, 'Rp.'.number_format($data['jml_trx']).'',1,1,'C');	

}

$pdf->Output();

?>