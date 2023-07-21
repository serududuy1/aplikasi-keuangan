<?php
require '../config/config.php';

$id=$_GET['id'];

$sql=mysqli_query($koneksi,"delete from users where id_user='$id' ");

if ($sql) 
{
	?>
	<script type="text/javascript">
		alert ('Data Anggota Berhasil Di Hapus');
		window.location='index.php?url=data_anggota';
	</script>
<?php
}

?>