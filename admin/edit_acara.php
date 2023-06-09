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
			<h1 class="mb-1">Data Acara</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="?url=dashboard">Dashboard</a></li>
					<li class="breadcrumb-item active">Data Acara</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h3>Form Data Acara</h3>
					</div>
					<div class="card-body">
						<br>

						<form method="POST">
							<div class="mb-3 row">
								<label class="col-sm-4 col-form-label"><b>Tanggal</b></label>
								<div class="col-sm-4">
									<input id="dateacara" type="text" name="tgl" class="form-control" required placeholder="DD/MM/YYYY">
								</div>
							</div>

							<div class="mb-3 row">
								<label class="col-sm-4 col-form-label"><b>Nama Acara</b></label>
								<div class="col-sm-8">
									<input id="textarea_nmacara" maxlength="15" type="text" name="nm_acara" class="form-control" placeholder="Input Nama Acara" required>
									<div class="mt-2" id="fbacara"></div>
								</div>
							</div>

							<div class="mb-3 row">
								<label class="col-sm-4 col-form-label"><b>Alamat</b></label>
								<div class="col-sm-8">
									<textarea  id="textarea_alamat" maxlength="65"  type="text" name="alamat" rows="4" class="form-control" placeholder="Input Alamat" required></textarea>
									<div class="mt-2" id="feedback_alamat"></div>
								</div>
							</div>

							<div class="mb-3 row">
								<label class="col-sm-4 col-form-label"><b>Keterangan</b></label>
								<div class="col-sm-8">
									<textarea id="textarea_ket" maxlength="65" type="text" name="ket" rows="4" class="form-control" placeholder="Input Keterangan" required></textarea>
									<div class="mt-2" id="feedback_ket"></div>
								</div>
							</div>


							<div class="mb-3 row perhitungan">
								<label class="col-sm-4 col-form-label"><b>Saldo Awal</b></label>
								<div class="col-sm-8">
									<div class="input-group mb-3">
										<?php
										require '../config/config.php';
										$no = 1;
										$sql = mysqli_query($koneksi,"select * from data_keuangan");
										while ($data = mysqli_fetch_array($sql)) {
											?>										
											<span class="input-group-text">Rp.</span>
											<input type="text" id="bil1" name="uang_masuk" value="<?= $data['uang_masuk']; ?>" class="form-control form-control-lg" readonly>
										<?php } ?>
									</div>
								</div>
							</div>				



							<div class="mb-3 row perhitungan">
								<label class="col-sm-4 col-form-label"><b>Total Anggaran</b></label>
								<div class="col-sm-8">
									<div class="input-group mb-3">
										<span class="input-group-text">Rp.</span>
										<input type="text" id="bil2" onkeypress="return hanyaAngka(event)" name="uang_keluar" class="form-control form-control-lg" placeholder=".. .. .. " required>
									</div>
								</div>
							</div>

							<div class="mb-3 row perhitungan">
								<label class="col-sm-4 col-form-label"><b>Saldo Akhir</b></label>
								<div class="col-sm-8">
									<div class="input-group mb-3">
										<span class="input-group-text">Rp.</span>
										<input type="text" id="hasil" name="uang_masuk2" class="form-control form-control-lg" placeholder=".. .. .. " readonly>
									</div>
								</div>
							</div>						
							<br>
							<br>

							<input type="reset"  class="btn btn-danger" value="Reset">
							<input type="submit" name="add_acara" class="btn btn-primary" value="Simpan">

						</form>

					</div>
				</div>
			</div>
			<div class="col-md-4">

          <div class="col-xxl-12 col-md-12">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Total Saldo<span></span></h5>
                <?php
                require '../config/config.php';
                $sql = mysqli_query($koneksi,"select * from data_keuangan where id='1'");
                while ($data = mysqli_fetch_array($sql)) {
                  ?>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h3>Rp.<?= number_format($data['uang_masuk']); ?></h3>
                    </div>
                  </div>
                  <span class="text-success small pt-1 fw-bold">Total Saldo</span> <span class="text-muted small pt-2 ps-1">saat ini yang di kumpulkan dari anggota dan masyarakat</span>
                  <?php } ?>
                <div class="mt-3 text-end">
                  <a href="?url=lap_keuangan" class="" >Lihat Detail <i class="bi bi-chevron-double-right"></i></a>
                </div>
              </div>
            </div>          
          </div>

          

			</div>

		</div>
	</div>

</body>
</html>