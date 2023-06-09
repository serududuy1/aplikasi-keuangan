<?php
require 'config/config.php';


$user = $_POST['username'];
$pass = md5($_POST['password']);
$sql=mysqli_query($koneksi,"select * from users where status='aktif' and username='$user' and password='$pass' ");
$cek=mysqli_num_rows($sql);

	if ($cek>0) //jika ketemu 
	{
		$data=mysqli_fetch_array($sql);

		if($data['level']=="admin")
		{
			session_start();	
			$_SESSION['id']=$data['id'];
			$_SESSION['nama']=$data['nama'];
			$_SESSION['rt']=$data['rt'];
			$_SESSION['rw']=$data['rw'];
			$_SESSION['alamat']=$data['alamat'];
			$_SESSION['umur']=$data['umur'];										
			$_SESSION['pekerjaan']=$data['pekerjaan'];
			$_SESSION['no_telp']=$data['no_telp'];
			$_SESSION['status']=$data['status'];			
			$_SESSION['usertype']=$data['usertype'];			
			$_SESSION['username']=$data['username'];
			$_SESSION['password']=$data['password'];			


			header('location:admin/index.php?url=dashboard');
		}
		else if ($data['level']=="anggota") 
		{
			session_start();
			$_SESSION['id']=$data['id'];
			$_SESSION['nama']=$data['nama'];
			$_SESSION['rt']=$data['rt'];
			$_SESSION['rw']=$data['rw'];
			$_SESSION['alamat']=$data['alamat'];
			$_SESSION['tgl_lahir']=$data['tgl_lahir'];										
			$_SESSION['pekerjaan']=$data['pekerjaan'];
			$_SESSION['no_telp']=$data['no_telp'];
			$_SESSION['status']=$data['status'];			
			$_SESSION['usertype']=$data['usertype'];			
			$_SESSION['username']=$data['username'];
			$_SESSION['password']=$data['password'];											

			header('location:anggota/index.php?url=dashboard');
		}
	}
	else
	{
		?>
		<script type="text/javascript">
			alert ('Username Dan Password Anda Salah.');
			window.location='index.php'
		</script>
		<?php
	}

?>