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
			$_SESSION['id']=$data['id_user'];
			$_SESSION['nama']=$data['nama'];
			$_SESSION['rt']=$data['rt'];
			$_SESSION['rw']=$data['rw'];
			$_SESSION['alamat']=$data['alamat'];							
			$_SESSION['pekerjaan']=$data['pekerjaan'];
			$_SESSION['no_telp']=$data['no_telp'];
			$_SESSION['status']=$data['status'];			
			$_SESSION['usertype']=$data['usertype'];			
			$_SESSION['username']=$data['username'];
			$_SESSION['password']=$data['password'];			


			// cek saldo awal;
			$tgls=date('Y-m-d');
			$bulan =  date('m', strtotime(date('Y-m-d')));
			$sql2 = mysqli_query($koneksi,"SELECT * FROM saldo_awal where month(tgl)='$bulan' ORDER BY id_saldo_awal DESC LIMIT 1");
			$rows = mysqli_num_rows($sql2);
			$bul = $bulan-1;
			if($rows<1){
				$sql3 = mysqli_query($koneksi,"SELECT * FROM saldo_akhir where month(tgl)='$bul' ORDER BY id_saldo_akhir DESC LIMIT 1");
				// print_r($sql3);
				// while ($data3 = mysqli_fetch_array($sql3)) {
				// 	$total = $data3['jml_saldo_akhir'];
				// 	$id = $data3['id_saldo_akhir'];
				// 	$sql4 = mysqli_query($koneksi, "insert into saldo_awal (id_saldo_akhir,jml_saldo_awal, tgl) values ('$id','$total','$tgls')");
					// echo($total);
					// if($sql4){
						// echo $sql3;
						// header('location:admin/index.php?url=dashboard');
// 						echo $total;

						// $tgl=date('Y-m-d'); 
						// 	$sql88 = "insert into trx (id_user,jml_trx, keterangan, status_trx, tgl) values ('3','$total','saldo_awal','terima','$tgl')";
						// 	$koneksi->query($sql88);
						// 	$last_id = $koneksi->insert_id;
						// 	$sql5 = mysqli_query($koneksi," insert into acara (id_trx,nama_acara) values ('$last_id','saldo_awal') ");
						// 	$sql6 = mysqli_query($koneksi, "insert into saldo_akhir (id_trx, jml_trx,jml_saldo_akhir, tgl) values ('$last_id','$total','$total','$tgl')");
						// 	if ($sql6) {
// echo $sql6;
header('location:admin/index.php?url=dashboard');
			// 			}
			// 		}
			//    }
			}else{
				// echo "datanya udah ada";
				header('location:admin/index.php?url=dashboard');
			}

			// header('location:admin/index.php?url=dashboard');


// print_r($_SESSION);
			
		}
		else if ($data['level']=="anggota") 
		{
			session_start();
			$_SESSION['id']=$data['id_user'];
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
alert('Username Dan Password Anda Salah.');
window.location = 'index.php'
</script>
<?php
	}

?>