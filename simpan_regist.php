<?php 
require 'config/config.php';


$recid ='0';
$nama = $_POST['nama'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$pekerjaan = $_POST['pekerjaan'];
$no_telp = $_POST['no_telp'];
$status = 'tidak aktif';
$usertype = $_POST['usertype'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = 'anggota';

    $sql = mysqli_query($koneksi," insert into users (recid,nama,rt,rw,alamat,tgl_lahir,pekerjaan,no_telp,status,usertype,username,password,level) values ('$recid','$nama','$rt','$rw','$alamat','$tgl_lahir','$pekerjaan','$no_telp','$status','$usertype','$username','$password','$level') ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Simpan');
            window.location = "index.php";
        </script>
    <?php }
?>