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
               <h1 class="mb-1">Laporan Data KeUangan</h1>
               <nav>
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="?url=dashboard">Dashboard</a></li>
                         <li class="breadcrumb-item active">Laporan Data KeUangan</li>
                    </ol>
               </nav>
          </div><!-- End Page Title -->
          <div class="row">

               <section class="section dashboard">
                    <div class="row">

                    </div>
               </section>

               <div id="data" class="card mt-4">
                    <div class="card-header">
                         <h4>Laporan Data KeUangan</h4>
                    </div>

                    <div class="col-md-12 mt-3">
                         <form method="POST" class="form-inline">
                              <div class="row">
                                   <div class="col-md-2">
                                        <input id="" type="date" name="tgl_mulai" class="form-control mb-2"
                                             placeholder="DD/MM/YYYY">
                                   </div>
                                   <div class="col-md-2">
                                        <input id="" type="date" name="tgl_selesai"
                                             class="form-control ml-3 mb-2" placeholder="YYYY/MM/DD">
                                   </div>
                                   <!-- <div class="col-md-4"> -->
                                        <!-- <select name="rt" class="form-select mb-3 mb-2">
                                             <option value="">-- Pilih RT</option>
                                             <option value="1">001</option>
                                             <option value="2">002</option>
                                             <option value="3">003</option>
                                             <option value="4">004</option>
                                             <option value="5">005</option>
                                             <option value="6">006</option>
                                             <option value="7">007</option>
                                             <option value="8">008</option>
                                             <option value="9">009</option>
                                             <option value="10">010</option>
                                        </select> -->

                                        <!-- <select name="rw" class="form-select mb-2">
                                             <option value="">-- Pilih RW</option>
                                             <option value="1">001</option>
                                             <option value="2">002</option>
                                             <option value="3">003</option>
                                             <option value="4">004</option>
                                             <option value="5">005</option>
                                             <option value="6">006</option>
                                             <option value="7">007</option>
                                             <option value="8">008</option>
                                             <option value="9">009</option>
                                             <option value="10">010</option>
                                        </select> -->
                                   <!-- </div> -->
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
                              <th>Nama</th>
                              <th>Tanggal</th>
                              <th>Alamat</th>
                              <th>Kategori</th>
                              <th>Status</th>
                              <th>Uang</th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>

                         <?php
						require '../config/config.php';
                              include '../config/getbln.php';
                              $bulan =  date('m', strtotime(date('Y-m-d')));
						if(isset($_POST['filter'])){
							$mulai = $_POST['tgl_mulai'];
							$selesai = $_POST['tgl_selesai'];
                                   $newMulai  =  date( "Ymd" ,  strtotime ( $mulai ));  
                                   $newSelesai  =  date( "Ymd" ,  strtotime ( $selesai ));  
                                   // print_r($newMulai);
							if ($mulai!=null || $selesai!=null ) {
                              $sql=mysqli_query($koneksi,"select * from trx inner join users on users.id_user = trx.id_user 
                                   inner join acara on acara.id_trx = trx.id_trx and  tgl between '$newMulai' and '$newSelesai'  where trx.id_trx NOT IN (
                                        SELECT id_trx from trx where keterangan = 'saldo_awal' 
                                       )  order by tgl desc");
                                   $sql2 = mysqli_query($koneksi, "select sum(jml_trx) as total from trx where keterangan='saldo_masuk' and  tgl between '$newMulai' and '$newSelesai' ");
                                   $sql3 = mysqli_query($koneksi, "select sum(jml_trx) as total from trx where keterangan='saldo_keluar' and  tgl between '$newMulai' and '$newSelesai' ");
							} else {
								$sql=mysqli_query($koneksi,"select * from trx order by tgl desc");
							}
						} else {
							// $sql=mysqli_query($koneksi,"select * from trx inner join users on users.id_user = trx.id_user 
                                   // inner join acara on acara.id_trx = trx.id_trx and month(trx.tgl)='$bulan' where trx.id_trx NOT IN (
                                   //      SELECT id_trx from trx where keterangan = 'saldo_awal' 
                                   //     )  order by tgl desc");
                                   // $sql2 = mysqli_query($koneksi, "select sum(jml_trx) as total from trx where keterangan='saldo_masuk' and month(trx.tgl)='$bulan'");
                                   // $sql3 = mysqli_query($koneksi, "select sum(jml_trx) as total from trx where keterangan='saldo_keluar' and month(trx.tgl)='$bulan'");
						} 
						$no=1;
						$total = 0;
						while ($data=mysqli_fetch_array($sql)) { 
                                   while ($datas=mysqli_fetch_array($sql2)) { 
                                        while ($data2=mysqli_fetch_array($sql3)) { 
                                        
                                             $total = $datas['total']-$data2['total'];              
                                        }          
                                   }
							?>

                         <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $data['nama']; ?></td>
                              <td><?= $data['tgl']; ?></td>
                              <td><?= $data['alamat']; ?></td>
                              <td><?= $data['nama_acara']; ?></td>
                              <td>
                                   <?= getStatus($data['keterangan']); ?>
                                  
                              </td>

                              <td>Rp.<?= number_format($data['jml_trx']); ?></td>
                              <td>

                                   <a href="lap_keuangan_pdf.php?id=<?php echo $data['id']; ?>&&nm=<?php echo $data['nama'];?>"
                                        class="btn btn-info btn-icon-split" target="_blank">
                                        <span class="icon text-white">
                                             <i class="ri-printer-fill"></i>
                                        </span>
                                   </a>

                              </td>

                         </tr>

                         <?php } ?>
                    </tbody>

                    <tfoot>
                         <tr>

                              <th colspan="6">Total KeUangan</th>
                              <th>Rp.<?= number_format($total); ?></th>
                              <th></th>

                         </tr>
                    </tfoot>

               </table>
               <br>

               <div class="row">
                    <div class="col-lg-6">
                         <a href="lap_keuangan_pdf2.php?tgl_mulai=<?php echo $_POST['tgl_mulai']; ?>&&tgl_selesai=<?php echo $_POST['tgl_selesai']; ?>"
                              target="_blank" class="btn btn-primary">
                              <i class="bi bi-file-earmark-pdf"></i>
                              <span class="text">Export Pdf</span>
                         </a>
                    </div>
               </div><br>

          </div>
     </div>
     </div>

</body>

</html>