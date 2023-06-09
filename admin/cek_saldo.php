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
								<div  class="card info-card sales-card bg-warning">
									<div class="card-body">
										<h5 class="card-title text-white">Saldo Awal<span></span></h5>
										<?php
										require '../config/config.php';
										$sql = mysqli_query($koneksi,"select * from data_keuangan where id='1'");
										while ($data = mysqli_fetch_array($sql)) {
											?>                    
											<div class="d-flex align-items-center">
												<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
													<i class="ri-inbox-fill"></i>
												</div>
												<div class="ps-3">
													<h6>Rp.<?= number_format($data['saldo_awal']); ?></h6>
												</div>
											</div>
											<span class="text-white small pt-1 fw-bold">Saldo Awal</span> <span class="text-white small pt-2 ps-1">saat ini yang di kumpulkan dari anggota/masyarakat</span>
										<?php } ?>
										<div class="mt-3 text-end">
											<a href="?url=lap_keuangan" class="text-white" >Lihat Detail <i class="bi bi-chevron-double-right"></i></a>
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
										$sql = mysqli_query($koneksi,"select * from data_keuangan where id='1'");
										while ($data = mysqli_fetch_array($sql)) {
											?>                    
											<div class="d-flex align-items-center">
												<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
													<i class="ri-inbox-archive-fill"></i>
												</div>
												<div class="ps-3">
													<h6>Rp.<?= number_format($data['saldo_masuk']); ?></h6>
												</div>
											</div>
											<span class="text-white small pt-1 fw-bold">Saldo Baru Masuk</span> <span class="text-white small pt-2 ps-1">yang di kumpulkan dari anggota/masyarakat</span>
										<?php } ?>
										<div class="mt-3 text-end">
											<a href="?url=lap_keuangan" class="text-white" >Lihat Detail <i class="bi bi-chevron-double-right"></i></a>
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
										$sql = mysqli_query($koneksi,"select * from data_keuangan where id='1'");
										while ($data = mysqli_fetch_array($sql)) {
											?>
											<div class="d-flex align-items-center">
												<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
													<i class="ri-money-dollar-circle-fill"></i>
												</div>
												<div class="ps-3">
													<h6>Rp.<?= number_format($data['saldo_akhir']); ?></h6>
												</div>
											</div>
											<span class="text-white small pt-1 fw-bold">Saldo Akhir</span> <span class="small pt-2 ps-1 text-white">saat ini yang di kumpulkan dari anggota/masyarakat</span>
										<?php } ?>
										<div class="mt-3 text-end">
											<a href="?url=lap_keuangan" class="text-white" >Lihat Detail <i class="bi bi-chevron-double-right"></i></a>
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
										$sql = mysqli_query($koneksi,"select * from data_keuangan where id='1'");
										while ($data = mysqli_fetch_array($sql)) {
											?>                    
											<div class="d-flex align-items-center">
												<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
													<i class="ri-inbox-unarchive-fill"></i>
												</div>
												<div class="ps-3">
													<h6>Rp.<?= number_format($data['saldo_keluar']); ?></h6>
												</div>
											</div>
											<span class="text-white small pt-1 fw-bold">Saldo Keluar</span> <span class="text-white small pt-2 ps-1">yang di gunakan untuk kegiatan acara</span>
										<?php } ?>
										<div class="mt-3 text-end">
											<a href="?url=lap_acara" class="text-white" >Lihat Detail <i class="bi bi-chevron-double-right"></i></a>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xxl-4 col-md-4">
								<div class="card info-card sales-card bg-danger">
									<div class="card-body">
										<h5 class="card-title text-white">Total Keseluruan Saldo<span></span></h5>
										<?php
										require '../config/config.php';
										$sql = mysqli_query($koneksi,"select * from data_keuangan where id='1'");
										while ($data = mysqli_fetch_array($sql)) {
											?>                    
											<div class="d-flex align-items-center">
												<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
													<i class="ri-exchange-dollar-line"></i>
												</div>
												<div class="ps-3">
													<h6>Rp.<?= number_format($data['total_saldo']); ?></h6>
												</div>
											</div>
											<span class="text-white small pt-1 fw-bold">Total Saldo Ke Seluruhan</span> <span class="text-white small pt-2 ps-1">yang terkumpul dari anggota/masyarakat</span>
										<?php } ?>
										<div class="mt-3 text-end">
											<a href="?url=lap_keuangan" class="text-white" >Lihat Detail <i class="bi bi-chevron-double-right"></i></a>
										</div>
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

