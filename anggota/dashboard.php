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
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <div style="background-color:#f4ee93;" class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Total Terkirim <span>| Sistem Karang Taruna</span></h5>
              <div class="d-flex align-items-center">
                <?php  
                require '../config/config.php';
                $nama = $_SESSION['nama'];
                $sql = mysqli_query($koneksi,"select *,count(nama) as nm
                from trx inner join users on users.id_user = trx.id_user where nama='$nama' and  status_trx='kirim'");
                while ($data = mysqli_fetch_array($sql)) 
                {
                  ?>                 
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-upload"></i></div>               
                  <div class="ps-3">              
                    <h6><?= $data['nm']; ?></h6>                
                    <span class="text-danger small pt-1 fw-bold">Total Keuangan Terkirim</span> <span class="text-muted small pt-2 ps-1"></span>
                  </div>
                <?php } ?>          
              </div>
              <div class="mt-1 text-end">
                <a href="#ngan" class="text-muted" >Lihat Detail <i class="bi bi-chevron-double-right"></i></a>
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-6">
          <div style="background-color:#46f49c;" class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Total Diterima <span>| Sistem Karang Taruna</span></h5>
              <?php  
              require '../config/config.php';
              $nama = $_SESSION['nama'];
              $sql = mysqli_query($koneksi,"select *,count(nama) as nm
                  from trx inner join users on users.id_user = trx.id_user where nama='$nama' and  status_trx='terima'");
              while ($data = mysqli_fetch_array($sql)) 
              {
                ?>
                <div class="d-flex align-items-center">                 
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-download"></i></div>               
                  <div class="ps-3">              
                    <h6><?= $data['nm']; ?></h6>                
                    <span class="text-danger small pt-1 fw-bold">Total Keuangan Diterima Oleh Ketua</span> <span class="text-muted small pt-2 ps-1"></span>
                  </div>         
                </div>                 
              <?php } ?>
              <div class="mt-1 text-end">
                <a href="#ngan" class="text-muted" >Lihat Detail <i class="bi bi-chevron-double-right"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</div>
</div>
<!-- <div class="row"> -->

               <section class="section dashboard">
                    <div class="row">
                         <div class="col-md-12">
                              <div class="row">



                                   <div class="col-md-6">
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
                                                       <a href="#" class="text-white">Lihat Detail <i
                                                                 class="bi bi-chevron-double-right"></i></a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>


                                   <div class="col-md-6">
                                        <div class="card info-card sales-card bg-info   ">
                                           <div class="card-body">
                                                  <h5 class="card-title text-white">Saldo Masuk<span></span></h5>
                                                  <?php
										require '../config/config.php';
                                                  $bulan =  date('m', strtotime(date('Y-m-d')));

										$sql = mysqli_query($koneksi,"SELECT sum(jml_trx) as jumlah FROM `trx` WHERE `keterangan`='saldo_masuk' and month(tgl)='$bulan' and status_trx='terima'");
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
                                                       <a href="#" class="text-white">Lihat Detail <i
                                                                 class="bi bi-chevron-double-right"></i></a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>


                                   <div class="col-md-6">
                                        <div class="card info-card sales-card bg-primary ">
                                             <div class="card-body ">
                                                  <h5 class="card-title text-white">Saldo Akhir<span></span></h5>
                                                  <?php
										require '../config/config.php';
										$sql = mysqli_query($koneksi,"SELECT * FROM saldo_akhir where month(tgl)='$bulan'  ORDER BY id_saldo_akhir DESC LIMIT 1");
										$rows = mysqli_num_rows($sql);
                                                  if($rows<1){
                                                       ?>
                                                       <div class="ps-3">
                                                            <h6>Rp.0</h6>
                                                       </div>
                                                       <span class="text-white small pt-1 fw-bold">Saldo Akhir</span> <span
                                                       class="small pt-2 ps-1 text-white">saat ini yang di kumpulkan
                                                       dari anggota/masyarakat</span>
                                                       <?php
                                                  }else{while ($data = mysqli_fetch_array($sql)) {
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
                                                  <?php }} ?>
                                                  <div class="mt-3 text-end">
                                                       <a href="#" class="text-white">Lihat Detail <i
                                                                 class="bi bi-chevron-double-right"></i></a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>


                                   <div class="col-md-6">
                                        <div class="card info-card sales-card bg-success">
                                             <div class="card-body">
                                                  <h5 class="card-title text-white">Saldo Keluar <span></span></h5>
                                                  <?php
										require '../config/config.php';
										$sql = mysqli_query($koneksi,"SELECT sum(jml_trx) as jumlah FROM `trx` WHERE `keterangan`='saldo_keluar' and status_trx='terima' and month(tgl)='$bulan'");
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
                                                       <a href="#" class="text-white">Lihat Detail <i
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
                                                       <a href="#" class="text-white">Lihat Detail <i
                                                                 class="bi bi-chevron-double-right"></i></a>
                                                  </div> -->
                                             </div>
                                        </div>
                                   </div>

                                  
                              </div>
                         </div>
                    </div>
               </section>






          <!-- </div> -->

</body>
</html>