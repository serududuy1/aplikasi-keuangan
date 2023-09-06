<?php
require '../config/config.php';

$id=$_GET['id'];

$sql = mysqli_query($koneksi,"select * from acara where id_acara='$id'");
while ($data = mysqli_fetch_array($sql)) {
	$id_acara = $data['id'];
	$keluar_acara = $data['saldo_keluar'];
}

$sql = mysqli_query($koneksi,"select * from data_keuangan where id_acara='1'");
while ($data = mysqli_fetch_array($sql)) {
	$id_keuangan = '1';
	$saldo_akhir = $data['saldo_akhir'];
	$saldo_keluar = $data['saldo_keluar'];
	$total = $data['total_saldo'];
}

$saldo_akhir += $keluar_acara;
$saldo_keluar -= $keluar_acara;

$sql=mysqli_query($koneksi,"update data_keuangan 
	set  saldo_akhir='$saldo_akhir', saldo_keluar='$saldo_keluar',
	 saldo_awal='$saldo_akhir', saldo_masuk='0' where id_acara='$id_keuangan' ");

$sql=mysqli_query($koneksi,"delete from acara where id_acara='$id' ");

if ($sql) 
{
	?>
	<script type="text/javascript">
		alert ('Data Berhasil Di Hapus');
		window.location='index.php?url=list_acara';
	</script>
	<?php
}

?>