<?php 
require '../config/config.php';

if(isset($_POST['kauangan'])) {
    date_default_timezone_set('Asia/Jakarta'); 
    $tgl=date('d-m-Y'); 
    $nama = $_POST['nama'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $alamat = $_POST['alamat'];
    $typeuang = $_POST['typeuang'];
    $saldo_akhir = $_POST['saldo_akhir'];
    $sts = 'kirim';
    $ket = $_POST['ket'];

    $sql = mysqli_query($koneksi," insert into keuangan 
        (nama,rt,rw,alamat,tgl,saldo_akhir,status,typeuang,ket) values 
        ('$nama','$rt','$rw','$alamat','$tgl','$saldo_akhir','$sts','$typeuang','$ket') ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Kirim');
            window.location = "index.php?url=keuangan";
        </script>
    <?php }
};



if(isset($_POST['profile'])) {
    $id=$_POST['id'];
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $sql = mysqli_query($koneksi," update users set username='$user', password='$pass' where id='$id' ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Update');
            window.location = "?url=profile";
        </script>
    <?php }
};








?>