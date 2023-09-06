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
						<input type="hidden" name="id" class="form-control" value="<?= $_SESSION['id']; ?>">
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



							<div class="mb-3 row perhitungan">
								<label class="col-sm-4 col-form-label"><b>Total Saldo</b></label>
								<div class="col-sm-8">
									<div class="input-group mb-3">
										<?php
										require '../config/config.php';
										$no = 1;
										$bulan =  date('m', strtotime(date('Y-m-d')));
										$sql = mysqli_query($koneksi,"SELECT * FROM saldo_akhir where month(tgl)='$bulan' ORDER BY id_saldo_akhir DESC LIMIT 1");
										while ($data = mysqli_fetch_array($sql)) {
											?>										
											<span class="input-group-text">Rp.</span>
											<input type="text" id="bil1" name="saldo_akhir" value="<?= $data['jml_saldo_akhir']; ?>" class="form-control form-control-lg" readonly>
										<?php } ?>
									</div>
								</div>
							</div>				



							<div class="mb-3 row perhitungan">
								<label class="col-sm-4 col-form-label"><b>Total Anggaran</b></label>
								<div class="col-sm-8">
									<div class="input-group mb-3">
										<span class="input-group-text">Rp.</span>
										<input type="text" id="bil2" onkeypress="return hanyaAngka(event)" name="saldo_keluar" class="form-control form-control-lg" placeholder=".. .. .. " required>
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

          

			</div>

		</div>
	</div>

</body>
</html>