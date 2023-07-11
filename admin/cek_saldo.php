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
               <h1 class="mb-1">Saldo KeUangan</h1>
               <nav>
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="?url=dashboard">Dashboard</a></li>
                         <li class="breadcrumb-item active">Saldo KeUangan</li>
                    </ol>
               </nav>
          </div><!-- End Page Title -->
          <div class="row">

               <section class="section dashboard">
                    <div class="row">
                         <div class="col-md-12">
                              <div class="row">



                                   <div class="col-sm-4 ">
                                        <div class="card info-card sales-card bg-warning">
                                             <div class="card-body">
                                                  <h5 class="card-title text-white">Saldo Awal<span></span></h5>
                                                  <?php
										require '../config/config.php';
                    $bulan =  date('m', strtotime(date('Y-m-d')));
										$sql = mysqli_query($koneksi,"SELECT * FROM saldo_awal where month(tgl)='$bulan' ORDER BY `id_saldo_awal` DESC LIMIT 1");
										$rows = mysqli_num_rows($sql);
								// $kocak = $data['jmlah'];
									if($rows<1){
										?>
                                                  <div class="d-flex align-items-center">
                                                       <div
                                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                            <i class="ri-inbox-fill"></i>
                                                       </div>
                                                       <div class="ps-3">
                                                            <h6>Rp.0</h6>
                                                       </div>
                                                  </div>
                                                  <span class="text-white small pt-1 fw-bold">Saldo Awal</span> <span
                                                       class="text-white small pt-2 ps-1">saat ini yang di kumpulkan
                                                       dari anggota/masyarakat</span><?php
									}
									else{

									while ($data = mysqli_fetch_array($sql)) {
										?>
                                                  <div class="d-flex align-items-center">
                                                       <div
                                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                            <i class="ri-inbox-fill"></i>
                                                       </div>
                                                       <div class="ps-3">
                                                            <h6>Rp.<?= number_format($data['jml_saldo_awal']); ?></h6>
                                                       </div>
                                                  </div>
                                                  <span class="text-white small pt-1 fw-bold">Saldo Awal</span> <span
                                                       class="text-white small pt-2 ps-1">saat ini yang di kumpulkan
                                                       dari anggota/masyarakat</span>
                                                  <?php }
											}?>
                                                  <div class="mt-3 text-end">
                                                       <a href="?url=lap_keuangan" class="text-white">Lihat Detail <i
                                                                 class="bi bi-chevron-double-right"></i></a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>


                                   <div class="col-xxl-4 col-md-4">
                                        <div class="card info-card sales-card bg-info">
                                             <div class="card-body">
                                                  <h5 class="card-title text-white">Saldo Masuk<span></span></h5>
                                                  <?php
										require '../config/config.php';
                                                  $bulan =  date('m', strtotime(date('Y-m-d')));

										$sql = mysqli_query($koneksi,"SELECT sum(jml_trx) as jumlah FROM `trx` WHERE `keterangan`='saldo_masuk' and month(tgl)='$bulan'");
										while ($data = mysqli_fetch_array($sql)) {
											?>
                                                  <div class="d-flex align-items-center">
                                                       <div
                                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                            <i class="ri-inbox-archive-fill"></i>
                                                       </div>
                                                       <div class="ps-3">
                                                            <h6>Rp.<?= number_format($data['jumlah']); ?></h6>
                                                       </div>
                                                  </div>
                                                  <span class="text-white small pt-1 fw-bold">Saldo Baru Masuk</span>
                                                  <span class="text-white small pt-2 ps-1">yang di kumpulkan dari
                                                       anggota/masyarakat</span>
                                                  <?php } ?>
                                                  <div class="mt-3 text-end">
                                                       <a href="?url=lap_keuangan" class="text-white">Lihat Detail <i
                                                                 class="bi bi-chevron-double-right"></i></a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>


                                   <div class="col-xxl-4 col-md-4">
                                        <div class="card info-card sales-card bg-primary">
                                             <div class="card-body ">
                                                  <h5 class="card-title text-white">Saldo Akhir<span></span></h5>
                                                  <?php
										require '../config/config.php';
										$sql = mysqli_query($koneksi,"SELECT * FROM saldo_akhir where month(tgl)='$bulan' ORDER BY id_saldo_akhir DESC LIMIT 1");
										while ($data = mysqli_fetch_array($sql)) {
											?>
                                                  <div class="d-flex align-items-center">
                                                       <div
                                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                            <i class="ri-money-dollar-circle-fill"></i>
                                                       </div>
                                                       <div class="ps-3">
                                                            <h6>Rp.<?= number_format($data['jml_saldo_akhir']); ?></h6>
                                                       </div>
                                                  </div>
                                                  <span class="text-white small pt-1 fw-bold">Saldo Akhir</span> <span
                                                       class="small pt-2 ps-1 text-white">saat ini yang di kumpulkan
                                                       dari anggota/masyarakat</span>
                                                  <?php } ?>
                                                  <div class="mt-3 text-end">
                                                       <a href="?url=lap_keuangan" class="text-white">Lihat Detail <i
                                                                 class="bi bi-chevron-double-right"></i></a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>


                                   <div class="col-xxl-4 col-md-4">
                                        <div class="card info-card sales-card bg-success">
                                             <div class="card-body">
                                                  <h5 class="card-title text-white">Saldo Keluar <span></span></h5>
                                                  <?php
										require '../config/config.php';
										$sql = mysqli_query($koneksi,"SELECT sum(jml_trx) as jumlah FROM `trx` WHERE `keterangan`='saldo_keluar' and month(tgl)='$bulan'");
                                                  $rows = mysqli_num_rows($sql);
                                                  if($rows<1){
                                                       echo "Tidak ada data";
                                                  }else{
                                                       while ($data = mysqli_fetch_array($sql)) {
											?>
                                                  <div class="d-flex align-items-center">
                                                       <div
                                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                            <i class="ri-inbox-unarchive-fill"></i>
                                                       </div>
                                                       <div class="ps-3">
                                                            <h6>Rp.<?= number_format($data['jumlah']); ?></h6>
                                                       </div>
                                                  </div>
                                                  <span class="text-white small pt-1 fw-bold">Saldo Keluar</span> <span
                                                       class="text-white small pt-2 ps-1">yang di gunakan untuk kegiatan
                                                       acara</span>
                                                  <?php
                                              }
                                               ?>
                                                  <div class="mt-3 text-end">
                                                       <a href="?url=lap_acara" class="text-white">Lihat Detail <i
                                                                 class="bi bi-chevron-double-right"></i></a>
                                                  </div>
                                                  <?php
                                                  }
										// while ($data = mysqli_fetch_array($sql)) {
										// 	?>
                                                  <!-- <div class="d-flex align-items-center">
                                                       <div
                                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                            <i class="ri-inbox-unarchive-fill"></i>
                                                       </div>
                                                       <div class="ps-3">
                                                            <h6>Rp.<?= number_format($data['jumlah']); ?></h6>
                                                       </div>
                                                  </div>
                                                  <span class="text-white small pt-1 fw-bold">Saldo Keluar</span> <span
                                                       class="text-white small pt-2 ps-1">yang di gunakan untuk kegiatan
                                                       acara</span> -->
                                                  <?php
                                             //  }
                                               ?>
                                                  <!-- <div class="mt-3 text-end">
                                                       <a href="?url=lap_acara" class="text-white">Lihat Detail <i
                                                                 class="bi bi-chevron-double-right"></i></a>
                                                  </div> -->
                                             </div>
                                        </div>
                                   </div>

                                   <p>asdas</p>
                                   <?php
							require '../config/config.php';                    
                                   $bulan =  date('m', strtotime(date('Y-m-d')));

										$sql = mysqli_query($koneksi,"select jml_trx as jmlah from trx where month(tgl)='bulan'");
								
								$rows = mysqli_num_rows($sql);
								// $kocak = $data['jmlah'];
									if($rows<=1){
										echo "gaada";
									}else{
										echo "ada";
									}
								// }
							?>
                              </div>
                         </div>
                    </div>
               </section>






          </div>
     </div>

</body>

</html>