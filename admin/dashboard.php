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
               <h1 class="mb-1">Dashboard</h1>
               <nav>
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item active">Dashboard</li>

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
                    $rows = mysqli_num_rows($sql);if($rows<1){
                         ?>
                         <div class="ps-3">
                              <h6>Rp.0</h6>
                         </div>
                         <span class="text-white small pt-1 fw-bold">Saldo Akhir</span> <span
                         class="small pt-2 ps-1 text-white">saat ini yang di kumpulkan
                         dari anggota/masyarakat</span>
                         <?php
                    }else{ while ($data = mysqli_fetch_array($sql)) {
                      ?>
                                                  <div class="d-flex align-items-center">
                                                       <div
                                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                            <i class="ri-inbox-fill"></i>
                                                       </div>
                                                       <div class="ps-3">
                                                            <h6>Rp.<?=  number_format($data['jml_saldo_awal']); ?></h6>
                                                       </div>
                                                  </div>
                                                  <span class="text-white small pt-1 fw-bold">Saldo Awal</span> <span
                                                       class="text-white small pt-2 ps-1">saat ini yang di kumpulkan
                                                       dari anggota/masyarakat</span>
                                                  <?php } }?>
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
                    $sql = mysqli_query($koneksi,"SELECT sum(jml_trx) as jumlah FROM `trx` WHERE `keterangan`='saldo_masuk' AND status_trx='terima' AND month(tgl)='$bulan' ");
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
                    $bulan =  date('m', strtotime(date('Y-m-d')));
                    $sql = mysqli_query($koneksi,"SELECT * FROM saldo_akhir where month(tgl)='$bulan' ORDER BY id_saldo_akhir  DESC LIMIT 1");
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

                              </div>
                         </div>

                    </div>
               </section>

               <section class="section dashboard">
                    <div class="col-md-12">
                         <div class="row">
                              <div class="col-md-6">
                                   <div style="background-color:#e4e3e8;" class="card info-card customers-card">
                                        <div class="card-body">
                                             <h5 class="card-title">Total Anggota Aktif <span>| Sistem Karang
                                                       Taruna</span></h5>
                                             <div class="d-flex align-items-center">
                                                  <?php  
                require '../config/config.php';
                $sql = mysqli_query($koneksi,"select count(status) 
                  from users where status='aktif'");
                while ($data = mysqli_fetch_array($sql)) 
                {
                  ?>
                                                  <div
                                                       class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                       <i class="bi bi-people"></i>
                                                  </div>
                                                  <div class="ps-3">
                                                       <h6><?= $data['count(status)']; ?></h6>
                                                       <span class="text-danger small pt-1 fw-bold">Total Anggota</span>
                                                       <span class="text-muted small pt-2 ps-1">yang sudah di
                                                            validasi</span>
                                                  </div>
                                                  <?php } ?>
                                             </div>
                                             <div class="mt-1 text-end">
                                                  <a href="?url=data_anggota" class="text-dark">Lihat Detail <i
                                                            class="bi bi-chevron-double-right"></i></a>
                                             </div>
                                        </div>
                                   </div>
                              </div>


                              <div class="col-md-6">
                                   <div style="background-color:#e4e3e8;" class="card info-card customers-card">
                                        <div class="card-body">
                                             <h5 class="card-title">Total Anggota Tidak Aktif <span>| Sistem Karang
                                                       Taruna</span></h5>
                                             <?php  
              require '../config/config.php';
              $sql = mysqli_query($koneksi,"select count(status) 
                from users where status='tidak aktif'");
              while ($data = mysqli_fetch_array($sql)) 
              {
                ?>
                                             <div class="d-flex align-items-center">
                                                  <div
                                                       class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                       <i class="bi bi-people"></i>
                                                  </div>
                                                  <div class="ps-3">
                                                       <h6><?= $data['count(status)']; ?></h6>
                                                       <span class="text-danger small pt-1 fw-bold">Total Anggota</span>
                                                       <span class="text-muted small pt-2 ps-1">yang belum di
                                                            validasi</span>
                                                  </div>
                                             </div>
                                             <?php } ?>
                                             <div class="mt-1 text-end">
                                                  <a href="?url=data_anggota" class="text-dark">Lihat Detail <i
                                                            class="bi bi-chevron-double-right"></i></a>
                                             </div>
                                        </div>
                                   </div>
                              </div>

                         </div>
                    </div>
               </section>

               <section class="section">
                    <div class="row">
                         <div class="col-md-12">
                              <div class="card">
                                   <div class="card-body">
                                        <h5 class="card-title">Grafik Line Chart total sumbangan Anggota/Masyarakat Yang
                                             Terkumpul</h5>
                                        <div id="lineChart"></div>
                                        <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                             new ApexCharts(document.querySelector("#lineChart"), {
                                                  series: [{
                                                       name: "Total",
                                                       data: [
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '1' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];}?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '2' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '3' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '4' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '5' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '6' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '7' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '8' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '9' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '10' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '11' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>,
                                                            <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi,"select count(tgl) 
              from trx where month(tgl) like '12' ");
             while ($data = mysqli_fetch_array($sql)) {echo $data['count(tgl)'];} ?>
                                                       ]
                                                  }],
                                                  chart: {
                                                       height: 350,
                                                       type: 'line',
                                                       zoom: {
                                                            enabled: false
                                                       }
                                                  },
                                                  dataLabels: {
                                                       enabled: false
                                                  },
                                                  stroke: {
                                                       curve: 'straight'
                                                  },
                                                  grid: {
                                                       row: {
                                                            colors: ['#f3f3f3',
                                                                 'transparent'
                                                            ], // takes an array which will be repeated on columns
                                                            opacity: 0.5
                                                       },
                                                  },
                                                  xaxis: {
                                                       categories: ['Januari', 'Februari', 'Maret',
                                                            'April', 'Mei', 'Juni', 'Juli',
                                                            'Augustus', 'September', 'Oktober',
                                                            'November', 'Desembar'
                                                       ],
                                                  }
                                             }).render();
                                        });
                                        </script>
                                   </div>
                              </div>
                         </div>
                    </div>
               </section>


          </div>
     </div>

</body>

</html>