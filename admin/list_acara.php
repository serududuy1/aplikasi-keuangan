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
					<li class="breadcrumb-item active">Form Data Acara</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<div class="row">

			<div class="card">
				<div class="card-header">
					<h4>Form Data Acara</h4>		
				</div>
				<br>

				<div class="col-md-12">

					<a href="?url=data_acara"
					class="btn btn-secondary btn-icon-split">
					<span class="icon text-white">
						<i class="bi bi-plus-lg"></i> Add Acara
					</span>
				</a>

			</div>

			<table id="example" class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Nama Acara</th>                           
						<th style="width:380px" >Alamat</th>                           
						<th>Total Anggaran</th>
						<th></th>                                             
					</tr>
				</thead>                
				<tbody>


					<?php
					require '../config/config.php';

					if(isset($_POST['filter'])){
						$mulai = $_POST['tgl_mulai'];
						$selesai = $_POST['tgl_selesai'];


						if ($mulai!=null || $selesai!=null ) {
							$sql=mysqli_query($koneksi,"select * from acara inner join trx on trx.id_trx = acara.id_trx and  tgl between '$mulai' and '$selesai' "); 
						} else {
							$sql=mysqli_query($koneksi,"select * from acara inner join trx on trx.id_trx = acara.id_trx order by tgl desc");
						}
					} else {
						$sql=mysqli_query($koneksi,"select * from acara inner join trx on trx.id_trx = acara.id_trx and keterangan='saldo_keluar' order by tgl desc");

					} 
					$no=1;
					$total = 0;
					while ($data=mysqli_fetch_array($sql)) {
						$total += $data['jml_trx'];               
						?>


						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['tgl']; ?></td>
							<td><?= $data['nama_acara']; ?></td>                              
							<td><?= $data['tempat_acara']; ?></td>
							<td>Rp.<?= number_format($data['jml_trx']); ?></td>
							<td style="width : 100px;">

								<a href="lap_acara_pdf.php?id=<?php echo $data['id_acara']; ?>&&nm=<?php echo $data['nm_acara'];?>"
										class="btn btn-info btn-icon-split" target="_blank">
										<span class="icon text-white">
											<i class="ri-printer-fill"></i>
										</span>
									</a>

								<a href="del_acara.php?id=<?php echo $data['id_acara']; ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Yakin Hapus Data Acara ?')">
									<span class="icon text-white">
										<i class="bi bi-trash-fill"></i>
									</span>
								</a>								


							</td>                                  
						</tr>
					<?php } ?> 

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
			<br>                  
		</div>
	</div>
</div>

</body>
</html>