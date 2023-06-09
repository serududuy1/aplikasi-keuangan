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
                $sql = mysqli_query($koneksi,"select count(nama) from keuangan where nama='$nama' and  status='kirim'  ");
                while ($data = mysqli_fetch_array($sql)) 
                {
                  ?>                 
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-upload"></i></div>               
                  <div class="ps-3">              
                    <h6><?= $data['count(nama)']; ?></h6>                
                    <span class="text-danger small pt-1 fw-bold">Total Keuangan Terkirim</span> <span class="text-muted small pt-2 ps-1"></span>
                  </div>
                <?php } ?>          
              </div>
              <div class="mt-1 text-end">
                <a href="?url=data_keuangan" class="text-muted" >Lihat Detail <i class="bi bi-chevron-double-right"></i></a>
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
              $sql = mysqli_query($koneksi,"select count(nama) 
                  from keuangan where nama='$nama' and  status='terima'");
              while ($data = mysqli_fetch_array($sql)) 
              {
                ?>
                <div class="d-flex align-items-center">                 
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-download"></i></div>               
                  <div class="ps-3">              
                    <h6><?= $data['count(nama)']; ?></h6>                
                    <span class="text-danger small pt-1 fw-bold">Total Keuangan Diterima Oleh Ketua</span> <span class="text-muted small pt-2 ps-1"></span>
                  </div>         
                </div>                 
              <?php } ?>
              <div class="mt-1 text-end">
                <a href="?url=data_keuangan" class="text-muted" >Lihat Detail <i class="bi bi-chevron-double-right"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</div>
</div>

</body>
</html>