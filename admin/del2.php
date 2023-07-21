<?php
require '../config/config.php';

$id=$_GET['id'];

$sql=mysqli_query($koneksi,"delete from trx where id_trx='$id' ");

if ($sql) 
{
	?>
	<script type="text/javascript">
		alert ('Data Berhasil Di Hapus');
		window.location='index.php?url=index_keuangan';
	</script>
<?php
}

?>