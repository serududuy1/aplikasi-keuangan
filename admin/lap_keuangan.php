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
                                        <input id="datepicker" type="text" name="tgl_mulai" class="form-control mb-2"
                                             placeholder="DD/MM/YYYY">
                                   </div>
                                   <div class="col-md-2">
                                        <input id="datepicker2" type="text" name="tgl_selesai"
                                             class="form-control ml-3 mb-2" placeholder="DD/MM/YYYY">
                                   </div>
                                   <div class="col-md-4">
                                        <select name="rt" class="form-select mb-3 mb-2">
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
                                        </select>

                                        <select name="rw" class="form-select mb-2">
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
                                        </select>
                                   </div>
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

						if(isset($_POST['filter'])){
							$mulai = $_POST['tgl_mulai'];
							$selesai = $_POST['tgl_selesai'];
							$rt = $_POST['rt'];
							$rw = $_POST['rw'];


							if ($mulai!=null || $selesai!=null ) {
$sql=mysqli_query($koneksi,"select * from keuangan where status='terima' and rt='$rt' and rw='$rw' and tgl between '$mulai' and '$selesai' "); 
							} else {
								$sql=mysqli_query($koneksi,"select * from keuangan where status='terima' order by tgl desc");
							}
						} else {
							$sql=mysqli_query($koneksi,"select * from keuangan where status='terima' order by tgl desc");

						} 
						$no=1;
						$total = 0;
						while ($data=mysqli_fetch_array($sql)) { 
						$total += $data['saldo_akhir'];              
							?>

                         <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $data['nama']; ?></td>
                              <td><?= $data['tgl']; ?></td>
                              <td><?= $data['alamat']; ?></td>
                              <td><?= $data['typeuang']; ?></td>
                              <td>
                                   <?php
									if($data['status'] == 'kirim'){ ?>
                                   <span class="badge bg-warning "><?= $data['status']; ?></span>
                                   <?php } elseif ($data['status'] == 'terima') { ?>
                                   <span class="badge bg-primary "><?= $data['status']; ?></span>
                                   <?php } elseif ($data['status'] == 'tidak terima') { ?>
                                   <span class="badge bg-danger "><?= $data['status']; ?></span>
                                   <?php }?>
                              </td>

                              <td>Rp.<?= number_format($data['saldo_akhir']); ?></td>
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
                         <a href="lap_keuangan_pdf2.php?tgl_mulai=<?php echo $_POST['tgl_mulai']; ?>&&tgl_selesai=<?php echo $_POST['tgl_selesai']; ?>&&rt=<?php echo $_POST['rt']; ?>&&rw=<?php echo $_POST['rw']; ?>"
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