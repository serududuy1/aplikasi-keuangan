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
                                <input id="dateacara1" type="text" name="tgl_mulai" class="form-control mb-2"
                                    placeholder="DD/MM/YYYY">
                            </div>
                            <div class="col-md-2">
                                <input id="dateacara2" type="text" name="tgl_selesai" class="form-control ml-3 mb-2"
                                    placeholder="DD/MM/YYYY">
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
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Acara</th>
                        <th style="width:380px">Alamat</th>
                        <th>Total Anggaran</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>


                    <?php
						require '../config/config.php';

						$bulan =  date('m', strtotime(date('Y-m-d')));
						if(isset($_POST['filter'])){
							$mulai = $_POST['tgl_mulai'];
							$selesai = $_POST['tgl_selesai'];
							
							$newMulai  =  date( "Ymd" ,  strtotime ( $mulai ));  
							$newSelesai  =  date( "Ymd" ,  strtotime ( $selesai ));  

							if ($mulai!=null || $selesai!=null ) {
								$sql=mysqli_query($koneksi,"select * from trx inner join users on users.id_user = trx.id_user 
								inner join acara on acara.id_trx = trx.id_trx and  tgl between '$newMulai' and '$newSelesai'  where trx.id_trx NOT IN (
									SELECT id_trx from trx where keterangan = 'saldo_awal' 
								   ) and trx.id_trx NOT IN (
									SELECT id_trx from trx where keterangan = 'saldo_masuk'
								   )   order by tgl desc"); 
								// $sql2 = mysqli_query($koneksi, "select sum(jml_trx) as total from trx inner join acara on acara.id_trx = trx.id_trx and keterangan='saldo_masuk' and  tgl between '$newMulai' and '$newSelesai' ");
                                   $sql3 = mysqli_query($koneksi, "select sum(jml_trx) as total from trx inner join acara on acara.id_trx = trx.id_trx and keterangan='saldo_keluar' and  tgl between '$newMulai' and '$newSelesai' ");
							} else {
								$sql=mysqli_query($koneksi,"select * from trx inner join users on users.id_user = trx.id_user 
								inner join acara on acara.id_trx = trx.id_trx and month(trx.tgl)='$bulan' order by tgl desc");
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
						while ($data=mysqli_fetch_array($sql)) { 
							// while ($datas=mysqli_fetch_array($sql2)) { 
								 while ($data2=mysqli_fetch_array($sql3)) { 
								 
									  $total = $data2['total'];              
								 }          
							// }
					 ?>


                    <tr>
                        <td><?= $no++; ?></td>
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

                        </td>
                    </tr>
                    <?php 
					}
					 ?>

                </tbody>

                <tfoot>
                    <tr>

                        <th colspan="3">Total Anggaran Yang di Gunakan</th>

                        <th></th>
                        <th>Rp.<?= number_format($total); ?></th>
                        <th></th>

                    </tr>
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