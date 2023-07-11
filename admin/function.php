<?php 
require '../config/config.php';

if(isset($_POST['profile_admin'])) {
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



if(isset($_POST['add'])) {

    $recid ='1';
    $nama = $_POST['nama'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $pekerjaan = $_POST['pekerjaan'];
    $no_telp = $_POST['no_telp'];
    $status = 'aktif';
    $usertype = $_POST['usertype'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $sql = mysqli_query($koneksi," insert into users (recid,nama,rt,rw,alamat,tgl_lahir,pekerjaan,no_telp,status,usertype,username,password,level) values ('$recid','$nama','$rt','$rw','$alamat','$tgl_lahir','$pekerjaan','$no_telp','$status','$usertype','$username','$password','$level') ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Simpan');
            window.location = "?url=data_anggota";
        </script>


    <?php }
};

//edit semuanya
if(isset($_POST['edit'])) {

    $id = $_POST['id'];
    $recid ='1';
    $nama = $_POST['nama'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $pekerjaan = $_POST['pekerjaan'];
    $no_telp = $_POST['no_telp'];
    $status = 'aktif';
    $usertype = $_POST['usertype'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $sql = mysqli_query($koneksi," update users set recid='$recid', nama='$nama', rt='$rt', rw='$rw', alamat='$alamat', tgl_lahir='$tgl_lahir', pekerjaan='$pekerjaan', no_telp='$no_telp', status='$status', usertype='$usertype', username='$username', password='$password', level='$level' where id='$id' ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Simpan');
            window.location = "?url=data_anggota";
        </script>


    <?php }
};


//edit biodata
if(isset($_POST['edit_biodata'])) {

    $id = $_POST['id'];
    $recid ='1';
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $pekerjaan = $_POST['pekerjaan'];
    $no_telp = $_POST['no_telp'];
    $usertype = $_POST['usertype'];
    $level = $_POST['level'];
    $status = 'aktif';

    $sql = mysqli_query($koneksi," update users set recid='$recid', nama='$nama', tgl_lahir='$tgl_lahir', pekerjaan='$pekerjaan', no_telp='$no_telp', usertype='$usertype', level='$level', status='$status'  where id='$id' ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Simpan');
            window.location = "?url=data_anggota";
        </script>


    <?php }
};

//edit alamat
if(isset($_POST['edit_alamat'])) {

    $id = $_POST['id'];
    $recid ='1';
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $alamat = $_POST['alamat'];
    $status = 'aktif';

    $sql = mysqli_query($koneksi," update users set recid='$recid', rt='$rt', rw='$rw', alamat='$alamat', status='$status' where id='$id' ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Simpan');
            window.location = "?url=data_anggota";
        </script>


    <?php }
};

//edit password
if(isset($_POST['edit_password'])) {

    $id = $_POST['id'];
    $recid ='1';
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $status = 'aktif';

    $sql = mysqli_query($koneksi," update users set recid='$recid', username='$username', password='$password', status='$status' where id='$id' ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Simpan');
            window.location = "?url=data_anggota";
        </script>


    <?php }
};

if(isset($_POST['validasi_anggota'])) {

    $id = $_POST['id'];
    $recid = '1';
    $status = $_POST['status'];

    $sql = mysqli_query($koneksi," update users set recid='$recid', status='$status ' where id='$id' ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Validasi');
            window.location = "?url=data_anggota";
        </script>
    <?php }
};


if(isset($_POST['validasi_keuangan'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $saldo_masuk = $_POST['saldo_akhir'];
    $sql = mysqli_query($koneksi," update trx set status_trx='$status' where id_trx='$id' ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Validasi');
            window.location = "?url=index_keuangan";
        </script>
    <?php 
    }
};


if(isset($_POST['add_acara'])) {
    $id=$_POST['id'];
    $nm_acara = $_POST['nm_acara'];
    $alamat = $_POST['alamat'];
    $saldo_akhir = $_POST['saldo_akhir'];
    $uang2 = $_POST['uang_masuk2'];
    $keluar = $_POST['saldo_keluar'];
    $tgl=date('Y-m-d', strtotime($_POST['tgl']));

    $sql = "insert into trx (id_user,jml_trx, keterangan, status_trx, tgl) values ('$id','$keluar','saldo_keluar','terima','$tgl')";
    $koneksi->query($sql);
    $last_id = $koneksi->insert_id;

// print_r($sql);
    $sql2 = mysqli_query($koneksi," insert into acara (id_trx,nama_acara,tempat_acara) values ('$last_id','$nm_acara','$alamat') ");
    $sql3 = mysqli_query($koneksi, "insert into saldo_akhir (id_trx, jml_trx,jml_saldo_akhir, tgl) values ('$last_id','$keluar','$uang2','$tgl')");


    // $sql = mysqli_query($koneksi,"select * from data_keuangan where id='1'");
    // while ($data = mysqli_fetch_array($sql)) {
    //     $id2 = '1';
    //     $klr = $data['saldo_keluar'];
    // }

    // $klr += $_POST['saldo_keluar'];

    // $sql = mysqli_query($koneksi," update data_keuangan set 
    //     saldo_akhir='$uang2', saldo_awal='$uang2',saldo_masuk='0', saldo_keluar='$klr'  where id='$id2' ");


    // $sql = mysqli_query($koneksi,"select * from data_keuangan where id='1'");
    // while ($data = mysqli_fetch_array($sql)) {
    //     $id2 = '1';
    // $total_saldo = $data['saldo_akhir'] + $data['saldo_keluar']; 
    // }    



    // $sql = mysqli_query($koneksi," update data_keuangan set total_saldo='$total_saldo' where id='$id2' ");


    if ($sql3) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Simpan<?=$last_id;?>');
            window.location = "index.php?url=list_acara";
        </script>


    <?php 
    }
};


//add keuangan admin
if(isset($_POST['adduang'])) {
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

    $sql = mysqli_query($koneksi," insert into keuangan (nama,rt,rw,alamat,tgl,saldo_akhir,status,typeuang,ket) values ('$nama','$rt','$rw','$alamat','$tgl','$saldo_akhir','$sts','$typeuang','$ket') ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Kirim');
            window.location = "index.php?url=index_keuangan";
        </script>
    <?php }
};



//edit edit_profile_bio
if(isset($_POST['edit_profile_bio'])) {

    $id = $_POST['id'];
    $recid ='1';
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $pekerjaan = $_POST['pekerjaan'];
    $no_telp = $_POST['no_telp'];
    $status = 'aktif';
    $usertype = $_POST['usertype'];
    $level = $_POST['level'];

    $sql = mysqli_query($koneksi," update users set recid='$recid', nama='$nama',tgl_lahir='$tgl_lahir', pekerjaan='$pekerjaan', no_telp='$no_telp', status='$status', usertype='$usertype', level='$level' where id='$id' ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Simpan');
            window.location = "index.php?url=profile";
        </script>


    <?php }
};


//edit alamat
if(isset($_POST['edit_profile_alamat'])) {

    $id = $_POST['id'];
    $recid ='1';
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $alamat = $_POST['alamat'];
    $status = 'aktif';

    $sql = mysqli_query($koneksi," update users set recid='$recid', rt='$rt', rw='$rw', alamat='$alamat', status='$status' where id='$id' ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Simpan');
            window.location = "index.php?url=profile";
        </script>


    <?php }
};

//edit password
if(isset($_POST['edit_profile_pass'])) {

    $id = $_POST['id'];
    $recid ='1';
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $status = 'aktif';

    $sql = mysqli_query($koneksi," update users set recid='$recid', username='$username', password='$password', status='$status' where id='$id' ");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert('Data Berhasil Di Simpan');
            window.location = "index.php?url=profile";
        </script>


    <?php }
};



?>