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
$pdf->ln(10);


$sql=mysqli_query($koneksi,"select * from acara where nm_acara='$_GET[nm]' and id='$_GET[id]' ");
while ($data=mysqli_fetch_array($sql)) 
{

	$pdf->SetFont('TIMES','',12);
	$pdf->Cell(12,7,'No',0,0,'L');
	$pdf->Cell(30,7,':      ... /  ... /  ...    ',0,0);


	$pdf->SetFont('TIMES','',12);
	$pdf->cell (125,7,'Di cetak pada tanggal :',0,0,'R');
	$pdf->Cell(125,7,date('d-m-Y'),0,1,'L');


	$pdf->SetFont('TIMES','',12);
	$pdf->Cell(12,7,'Lamp',0,0,'L');
	$pdf->Cell(30,7,': -',0,1);

	$pdf->SetFont('TIMES','',12);
	$pdf->Cell(12,7,'Hal',0,0,'L');
	$pdf->Cell(3,7,': ',0,0);
	$pdf->Cell(40,7,$data['nm_acara'],0,1);

	$pdf->ln(5);

	$pdf->SetFont('TIMES','',12);
	$pdf->Cell(30,7,'Kepada Yth,',0,0,'L');
	$pdf->Cell(50,7,'',0,1);
	$pdf->Cell(20,7,'Bapak/Ibu Kelurahan Sudimara Timur',0,0,'L');
	$pdf->Cell(50,7,'',0,1);
	$pdf->Cell(20,7,'Di',0,0,'L');
	$pdf->Cell(50,7,'',0,1);
	$pdf->Cell(20,7,'Tempat',0,0,'L');
	$pdf->Cell(50,7,'',0,1);
	$pdf->ln(5);

	$pdf->Cell(30,7,'Dengan hormat,',0,0,'L');
	$pdf->Cell(50,7,'',0,1);
	$pdf->Cell(53,7,'Sehubungan dengan kegiatan',0,0,'L');
	$pdf->Cell(40,7,$data['nm_acara'],0,0,'C');
	$pdf->Cell(53,7,'yang akan di laksanakan pada :',0,1,'L');
	$pdf->ln(5);		


	$pdf->SetFont('TIMES','',12);
	$pdf->Cell(30,7,'Acara',0,0,'L');
	$pdf->Cell(3,7,':',0,0);
	$pdf->Cell(30,7,$data['nm_acara'],0,1);
	$pdf->Cell(30,7,'Tanggal',0,0,'L');
	$pdf->Cell(3,7,':',0,0);
	$pdf->Cell(30,7,$data['tgl'],0,1);
	$pdf->Cell(30,7,'Alamat',0,0,'L');
	$pdf->Cell(3,7,':',0,0);
	$pdf->Cell(30,7,$data['alamat'],0,1);
	$pdf->Cell(30,7,'Keterangan',0,0,'L');
	$pdf->Cell(3,7,':',0,0);
	$pdf->Cell(30,7,$data['ket'],0,1);
	$pdf->Cell(30,7,'Total Anggaran',0,0,'L');
	$pdf->Cell(8,7,': Rp',0,0);
	$pdf->Cell(30,7,number_format($data['saldo_keluar']),0,1);
	$pdf->ln(5);
	$pdf->Cell(168,7,'Maka dengan ini kami ingin memberitahukan perihal kegiatan tersebut kepada Bapak/Ibu sekalian,',0,0,'L');
	$pdf->Cell(70,7,'agar',0,1,'L');
	$pdf->Cell(190,7,'kegiatan yang akan di laksanakan tersebut bisa berjalan dengan lancar dan sesuai dengan rencana.',0,1,'L');
	$pdf->ln(5);
	$pdf->Cell(190,7,'Demikian surat pemberitahuan kegiatan ini kami beritahukan, atas perhatian dan izin dari Bapak/Ibu.',0,1,'L');
	$pdf->Cell(190,7,'kami ucapkan terimakasih.',0,1,'L');	
}

$pdf->ln(20);



$pdf->SetFont('TIMES','',10);
$pdf->Cell(100,6,'Mengetahui dan di setujui',0,0,'C');
$pdf->Cell(100,6,'Mengetahui dan di setujui',0,1,'C');
$pdf->Cell(100,6,'Wakil Ketua',0,0,'C');
$pdf->Cell(100,6,'Ketua',0,1,'C');
$pdf->Cell(100,25,'',0,0);
$pdf->Cell(100,25,'',0,1);
$sql=mysqli_query($koneksi,"select * from users where usertype='wakil'; ");
while ($data=mysqli_fetch_array($sql)) 
{	
	$pdf->Cell(100,6,$data['nama'],0,0,'C');
}
$sql=mysqli_query($koneksi,"select * from users where usertype='ketua'; ");
while ($data=mysqli_fetch_array($sql)) 
{	
	$pdf->Cell(100,6,$data['nama'],0,1,'C');

}


$pdf->Output();

?>