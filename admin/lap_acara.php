<?php
function tgl_indos($mulai){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $mulai);
    
    // variabel pecahkan 0 = mulai
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
 
    return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
    
}

$total = 0;
$sawal = 0;
$sakhir = 0;
$total2 = 0;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>

    <div class="container">
        <div class="pagetitle">
            <h1 class="mb-1">Laporan Data Acara</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?url=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan Data Acara</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="row">

            <div class="card">
                <div class="card-header">
                    <h4>Laporan Data Acara</h4>
                </div>
                <br>


                <div class="col-md-12 mt-3">
                    <form method="POST" class="form-inline">
                        <div class="row">
                            <div class="col-md-2">
                                <input id="dateacara1" type="date" name="tgl_mulai" class="form-control mb-2"
                                    placeholder="dd-mm-yyyy">
                            </div>
                            <div class="col-md-2">
                                <input id="dateacara2" type="date" name="tgl_selesai" class="form-control ml-3 mb-2"
                                    placeholder="dd-mm-yyyy">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" name="filter" class="btn btn-primary ml-3">View</button>
                                <button type="reset" class="btn btn-danger ml-3"> Reset</button>
                            </div>
                    </form>
                </div>
            </div>

            <br>
            <table id="example" class="table table-hover">
                <thead>
                    <tr>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                </thead>
                <tbody>


                    <?php
						require '../config/config.php';

						$bulan =  date('m', strtotime(date('Y-m-d')));
						if(isset($_POST['filter'])){
                            // echo "<script>alert('saldo awal bulan ini sudah ada')</script>";
$mulai = $_POST['tgl_mulai'];
$selesai = $_POST['tgl_selesai'];
							
							$newMulai  =  date( "Ymd" ,  strtotime ( $mulai ));  
							$newSelesai  =  date( "Ymd" ,  strtotime ( $selesai ));  
                            $getBulan = date('m', strtotime(date($mulai)));

                            

							if ($mulai!=null || $selesai!=null ) {
								$sql=mysqli_query($koneksi,"select * from trx inner join users on users.id_user = trx.id_user 
								inner join acara on acara.id_trx = trx.id_trx and  tgl between '$newMulai' and '$newSelesai'  where trx.id_trx NOT IN (
									SELECT id_trx from trx where keterangan = 'saldo_awal' 
								   ) and trx.id_trx NOT IN (
									SELECT id_trx from trx where keterangan = 'saldo_masuk'
								   )   order by tgl desc"); 
								$sql2 = mysqli_query($koneksi, "SELECT * FROM `saldo_awal` WHERE month(tgl)='$getBulan' ");
                                   $sql3 = mysqli_query($koneksi, "select sum(jml_trx) as total from trx inner join acara on acara.id_trx = trx.id_trx and keterangan='saldo_keluar' and  tgl between '$newMulai' and '$newSelesai' ");
                                   $sql4 = mysqli_query($koneksi, "select sum(jml_trx) as total2 from trx where keterangan='saldo_masuk' and status_trx='terima' and  tgl between '$newMulai' and '$newSelesai' ");

							} else {
								// $sql=mysqli_query($koneksi,"select * from trx inner join users on users.id_user = trx.id_user 
								// inner join acara on acara.id_trx = trx.id_trx and month(trx.tgl)='$bulan' order by tgl desc");
							}
						} else {
							// $sql=mysqli_query($koneksi,"select * from trx inner join users on users.id_user = trx.id_user 
							// inner join acara on acara.id_trx = trx.id_trx   where trx.id_trx NOT IN (
							// 	SELECT id_trx from trx where keterangan = 'saldo_awal' 
							//    ) and trx.id_trx NOT IN (
							// 	SELECT id_trx from trx where keterangan = 'saldo_masuk'
							//    )  order by tgl desc");
							// // $sql2 = mysqli_query($koneksi, "select sum(jml_trx) as total from trx inner join acara on acara.id_trx = trx.id_trx and keterangan='saldo_masuk' and month(trx.tgl)='$bulan'");
							// $sql3 = mysqli_query($koneksi, "select sum(jml_trx) as total from trx inner join acara on acara.id_trx = trx.id_trx and keterangan='saldo_keluar' and month(trx.tgl)='$bulan'");
						} 
						$no=1;
						$total = 0;
                        
while ($data = mysqli_fetch_array($sql)) {
    while ($datas = mysqli_fetch_array($sql2)) {
while ($data2 = mysqli_fetch_array($sql3)) {
    while ($data4 = mysqli_fetch_array($sql4)) {
        // }
        // }
        if($mulai == null) {
        } else {

            $total = $data2['total'];
            $total2 = $data4['total2'];
            $sawal = $datas['jml_saldo_awal'];
            $sakhir = $sawal + $total2 - $total;

            ?>

                    <div class="ket-periode">
                        <div class="header-ket-periode row">
                            <h5> Periode :
                                <?=tgl_indos(date('d-m-y', strtotime($mulai)));?>
                                -
                                <?=tgl_indos(date('d-m-y', strtotime($selesai)))?>
                            </h5>
                        </div>
                    </div>
                    <?php
        }
    }
}
        ?>

                    <tr>

                        <!-- <td><?= $no++; ?></td>
                        <td><?= $data['tgl']; ?></td>
                        <td><?= $data['nama_acara']; ?></td>
                        <td><?= $data['tempat_acara']; ?></td>
                        <td>Rp.<?= number_format($data['jml_trx']); ?></td>
                        <td>

                            <a href="lap_acara_pdf.php?id=<?php echo $data['id']; ?>&&nm=<?php echo $data['nm_acara'];?>"
                                class="btn btn-info btn-icon-split" target="_blank">
                                <span class="icon text-white">
                                    <i class="ri-printer-fill"></i>
                                </span>
                            </a>

                        </td> -->
                    </tr>
                    <?php
    }
}
					 ?>




                    <tr>

                        <th>Saldo Awal</th>

                        <th>Rp.<?= number_format($sawal); ?></th>

                    </tr>
                    <tr>

                        <th>Total Saldo Masuk</th>

                        <th>Rp.<?= number_format($total2); ?></th>

                    </tr>
                    <tr>

                        <th>Total Anggaran Yang di Gunakan</th>

                        <th>Rp.<?= number_format($total); ?></th>

                    </tr>
                    <tr>

                        <th>Saldo Akhir</th>

                        <th>Rp.<?= number_format($sakhir); ?></th>

                    </tr>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <br>

            <div class="row">
                <div class="col-lg-6">
                    <a href="lap_acara_pdf2.php?tgl_mulai=<?php echo $_POST['tgl_mulai']; ?>&&tgl_selesai=<?php echo $_POST['tgl_selesai']; ?>"
                        target="_blank" class="btn btn-primary">
                        <i class="bi bi-file-earmark-pdf"></i>
                        <span class="text">Export Pdf</span>
                    </a>
                </div>
            </div>

            <br>
        </div>
    </div>
    </div>

</body>

</html>