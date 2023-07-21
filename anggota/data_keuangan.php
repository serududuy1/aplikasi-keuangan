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
			<h1 class="mb-1">Data KeUangan</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="?url=dashboard">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="?url=anggota">Data Anggota</a></li>
					<li class="breadcrumb-item"><a href="?url=keuangan">KeUangan</a></li>     
					<li class="breadcrumb-item active">Data KeUangan</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<div class="row">

			<div class="card">
				<div class="card-header">
					<h4>Form Data KeUangan</h4>		
				</div>
				<br>
				<table id="anggota" class="table table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Kategori</th>                           
							<th>Tanggal</th>                           
							<th>Uang</th>
							<th>Status</th>                                             
							<th style="width:90px"></th>
						</tr>
					</thead>                
					<tbody>
						<?php
						require '../config/config.php';
						$no = 1;
						$total = 0;
						print_r($_SESSION['id']);
						$sql = mysqli_query($koneksi,"select * from trx inner join users on users.id_user = trx.id_user inner join acara on acara.id_trx = trx.id_trx where trx.id_user='$_SESSION[id]' order by tgl DESC ");
						while ($data = mysqli_fetch_array($sql)) {
							$total += $data['jml_trx'];   
							?>                   
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $data['nama']; ?></td>
								<td><?= $data['nama_acara']; ?></td>                              
								<td><?= $data['tgl']; ?></td>
								<td>Rp.<?= number_format($data['jml_trx']); ?></td>

								<td>
									<?php
									if($data['status_trx'] == 'kirim'){ ?>
										<span class="badge bg-warning "><?= $data['status_trx']; ?></span>
									<?php } elseif ($data['status_trx'] == 'terima') { ?>
										<span class="badge bg-primary "><?= $data['status_trx']; ?></span>
									<?php } elseif ($data['status_trx'] == 'tidak terima') { ?>
										<span class="badge bg-danger "><?= $data['status_trx']; ?></span>
									<?php }?>
									</td>                                  
									<td>

										<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#MyView<?= $data['id']; ?>">
											<span class="icon text-white">
												<i class="bi bi-arrows-angle-expand"></i>
											</span> 
										</button>

										<a href="report_pdf.php?id=<?php echo $data['id']; ?>&&nm=<?php echo $data['nama'];?>" class="btn btn-info btn-icon-split" target="_blank">
											<span class="icon text-white">
												<i class="ri-printer-fill"></i>
											</span>
										</a>
									</td>
							</tr>                                



<!-- Modal view -->
<div class="modal fade" id="MyView<?= $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Form Detail Data KeUangan</b></h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="container px-4">
 <div class="row gx-9">
  <div class="col-md-6">
    <div class="p-3">

<div class="mb-2 row">
 <label class="col-sm-5 col-form-label"><b>Nama </b></label>
 <div class="col-sm-7">
   <input type="text" class="form-control" value="<?= $data['nama']; ?>" readonly>
</div>
</div>

<div class="mb-2 row">
    <label class="col-sm-5 col-form-label"><b>Tanggal </b></label>
    <div class="col-sm-7">
<input type="text" class="form-control" value="<?= $data['tgl']; ?>" readonly>
   </div>
   </div>

<div class="mb-2 row">
 <label class="col-sm-5 col-form-label"><b>Kategori </b></label>
 <div class="col-sm-7">
   <input type="text" class="form-control" value="<?= $data['typeuang']; ?>" readonly>
</div>
   </div>


<div class="mb-4 row">
 <label class="col-sm-5 col-form-label"><b>Uang </b></label>
 <div class="col-sm-7">
   <input type="text" class="form-control form-control-lg" 
   value="Rp.<?= number_format($data['saldo_akhir']) ?>" readonly>
</div>
</div>


<div class="mb-2 row">
<label class="col-sm-5 col-form-label"><b>Status </b></label>
<div class="col-sm-7 fs-4">

<?php
if($data['status'] == 'kirim'){ ?>
<span class="badge bg-warning "><?= $data['status']; ?></span>
<?php } elseif ($data['status'] == 'terima') { ?>
<span class="badge bg-primary "><?= $data['status']; ?></span>
<?php } elseif ($data['status'] == 'tidak terima') { ?>
<span class="badge bg-danger "><?= $data['status']; ?></span>
<?php }?>


</div>
</div>   

</div>
</div>
<div class="col-md-6">
   <div class="p-3">

<div class="mb-2 row">
 <label class="mb-2" ><b>Alamat </b></label>
 <div class="col-sm-12">
   <textarea type="text" class="form-control" rows='3' readonly><?= $data['alamat']; ?></textarea>
</div>
   </div>    

<div class="mb-2 row">
 <label class="mb-2" ><b>Keterangan </b></label>
 <div class="col-sm-12">
   <textarea type="text" class="form-control" rows='3' readonly><?= $data['ket']; ?></textarea>
</div>
   </div>     

</div>
</div>
</div>
</div>

</div>
<div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- end Modal view -->
									



									<?php } ?>                    
								</tbody>

							<th colspan="4">Total </th>                          
							<th>Rp.<?= number_format($total); ?></th>
							<th></th>
							<th></th>								               
							</table>
							<br><br>                  


						</div>
					</div>
				</div>

			</body>
			</html>