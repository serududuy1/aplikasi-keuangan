<?php 
require '../config/config.php';

if(isset($_POST['kauangan'])) {
    date_default_timezone_set('Asia/Jakarta'); 
    $tgl=date('Y-m-d'); 
    $nama = $_POST['nama'];
    $id = $_POST['id'];
    $typeuang = $_POST['typeuang'];
    $saldo_akhir = $_POST['saldo_akhir'];
    $sts = 'kirim';
    $ket = $_POST['ket'];
    $bulan =  date('m', strtotime(date('Y-m-d')));

    $sql = "insert into trx (id_user,jml_trx, keterangan, status_trx, tgl) values ('$id','$saldo_akhir','saldo_masuk','kirim','$tgl')";
        $koneksi->query($sql);
        $last_id = $koneksi->insert_id;
        $sql2 = mysqli_query($koneksi," insert into acara (id_trx,nama_acara) values ('$last_id','$typeuang') ");
        
        if ($sql2) {
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