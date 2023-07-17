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

                    <div class="col-md-12">
                         <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                              data-bs-target="#addUang">
                              <span class="icon text-white">
                                   <i class="bi bi-plus-lg"></i> Add KeUangan
                              </span>
                         </button>
                    </div>

                    <!-- add uang Modal -->
                    <div class="modal fade" id="addUang" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-scrollable modal-lg">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><b
                                                  style="font-size: 25px;">Form Add KeUangan</b></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                 

                                        <form method="POST">

                                             <div class="my-3 row">
                                                  <label class="col-sm-3 col-form-label"><b>Nama</b></label>
                                                  <div class="col-sm-4">
                                                       <select class="form-select" name="nama" required>
                                                            <option value="" selected>-- Pilih Anggota</option>
                                                       <?php
                                   require '../config/config.php';
                                   $no = 1;
                                   $sql = mysqli_query($koneksi,"select * from users");
                                   while ($datas = mysqli_fetch_array($sql)) {
                                        ?>
                                                            <option value="<?=$datas['id_user']?>"><?=$datas['nama']?></option>
                                                            
                                   <?php
                                   }
                                   ?>
                                                       </select>
                                                  </div>

                                                 
                                             </div>

                                             <div class="mb-3 mt-3 row">
                                                  <label class="col-sm-3 col-form-label"><b>Tanggal </b></label>
                                                  <div class="col-sm-5">
                                                       <div class="input-group mb-1">
                                                            <input type="text" name="tgl"
                                                                 value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d'); ?>"
                                                                 class="form-control text-center" readonly>
                                                            <span class="input-group-text"><i
                                                                      class="bi bi-calendar2-check-fill"></i></span>
                                                       </div>
                                                  </div>
                                             </div>

                                             <div class="mb-3 mt-3 row">
                                                  <label class="col-sm-3 col-form-label"><b>Kategori</b></label>
                                                  <div class="col-sm-5">
                                                       <select class="form-select" name="typeuang" required>
                                                            <option value="" selected>-- Pilih --</option>
                                                            <option value="uang kas">Uang Kas</option>
                                                            <option value="infak">Infak</option>
                                                            <option value="acara">Acara</option>
                                                            <option value="dll">Dll</option>
                                                       </select>
                                                  </div>
                                             </div>


                                             <div class="mb-2 mt-3 row">
                                                  <label class="col-sm-3 col-form-label"><b>Keuangan</b></label>
                                                  <div class="col-sm-5">
                                                       <div class="input-group mb-1">
                                                            <span class="input-group-text">Rp.</span>
                                                            <input type="text" name="saldo_akhir"
                                                                 onkeypress="return hanyaAngka(event)"
                                                                 class="form-control form-control-lg" required>
                                                       </div>
                                                  </div>
                                             </div>

                                            

                                             <br>

                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                             data-bs-dismiss="modal">Close</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" name="adduang" class="btn btn-primary">Simpan</button>
                                   </div>
                                   </form>

                              </div>
                         </div>
                    </div>
                    <!-- end add uang Modal -->

                    <br>
                    <table id="anggota" class="table table-hover">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Nama</th>
                                   <th>Tanggal</th>
                                   <th>Kategori</th>
                                   <th>Uang</th>
                                   <th>Keterangan</th>
                                   <th>Status</th>
                                   <th style="width:130px">aksi</th>
                              </tr>
                         </thead>
                         <tbody>
                              <tr>
                              <?php
						require '../config/config.php';
                              include '../config/getbln.php';
						$no = 1;
                              $bulan =  date('m', strtotime(date('Y-m-d')));
						$sql = mysqli_query($koneksi,"select * from trx inner join users on users.id_user=trx.id_user inner join 
                              acara on acara.id_trx=trx.id_trx and month(tgl)='$bulan' where trx.id_trx NOT IN (
                                   SELECT id_trx from trx where keterangan = 'saldo_awal' 
                                  ) and trx.id_trx NOT IN (
                                   SELECT id_trx from trx where keterangan = 'saldo_keluar'
                                  ) order by tgl DESC");
						while ($data = mysqli_fetch_array($sql)) {
							?>
                                   <td><?= $no++; ?></td>
                                   <td><?= $data['nama']; ?></td>
                                   <td><?= $data['tgl']; ?></td>
                                   <td><?= $data['nama_acara']; ?></td>
                                   <td>Rp.<?= number_format($data['jml_trx']); ?></td>

                                   <td>
                                    <?= getStatus($data['keterangan']); ?>
                                   </td>
                                   <td>
                                        <?php 
									if($data['status_trx'] == 'kirim'){ ?>
                                                  <span class="badge bg-warning "><?= $data['status_trx']; ?></span>
									<?php } else if($data['status_trx'] == 'terima'){ ?>
										<span class="badge bg-primary "><?= $data['status_trx']; ?></span>
									<?php }?>
                                   </td>
                                   <td class="text-center">

                                        <?php
									if($data['status_trx'] == 'kirim'){ ?>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                             data-bs-target="#MyV<?= $data['id_trx']; ?>">
                                             <span class="icon text-white">
                                                  <i class="bi bi-check-circle-fill"></i>
                                             </span>
                                        </button>

                                        <a href="del2.php?id=<?php echo $data['id']; ?>"
                                             class="btn btn-danger btn-icon-split"
                                             onclick="return confirm('Yakin Hapus Data ?')">
                                             <span class="icon text-white">
                                                  <i class="bi bi-trash-fill"></i>
                                             </span>
                                        </a>

                                        <?php } else if ($data['status_trx'] == 'terima') { ?>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                             data-bs-target="#MyView<?= $data['id_trx']; ?>">
                                             <span class="icon text-white">
                                                  <i class="bi bi-lock-fill"></i>
                                             </span>
                                        </button>
                                        <?php }?>



                                   </td>
                              </tr>


                              <!-- Modal view -->
                              <div class="modal fade" id="MyView<?= $data['id_trx']; ?>" data-bs-backdrop="static"
                                   data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                   aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Form Detail
                                                            Data KeUangan</b></h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                       aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                  <div class="container px-4">
                                                       <div class="row gx-9">
                                                            <div class="col-md-6">
                                                                 <div class="p-3">

                                                                      <div class="mb-2 row">
                                                                           <label class="col-sm-5 col-form-label"><b>Nama
                                                                                </b></label>
                                                                           <div class="col-sm-7">
                                                                                <input type="text" class="form-control"
                                                                                     value="<?= $data['nama']; ?>"
                                                                                     readonly>
                                                                           </div>
                                                                      </div>

                                                                      <div class="mb-2 row">
                                                                           <label class="col-sm-5 col-form-label"><b>Tanggal
                                                                                </b></label>
                                                                           <div class="col-sm-7">
                                                                                <input type="text" class="form-control"
                                                                                     value="<?= $data['tgl']; ?>"
                                                                                     readonly>
                                                                           </div>
                                                                      </div>

                                                                      <div class="mb-2 row">
                                                                           <label class="col-sm-5 col-form-label"><b>Kategori
                                                                                </b></label>
                                                                           <div class="col-sm-7">
                                                                                <input type="text" class="form-control"
                                                                                     value="<?= $data['nama_acara']; ?>"
                                                                                     readonly>
                                                                           </div>
                                                                      </div>


                                                                      <div class="mb-4 row">
                                                                           <label class="col-sm-5 col-form-label"><b>Uang
                                                                                </b></label>
                                                                           <div class="col-sm-7">
                                                                                <input type="text"
                                                                                     class="form-control form-control-lg"
                                                                                     value="Rp.<?= number_format($data['jml_trx']) ?>"
                                                                                     readonly>
                                                                           </div>
                                                                      </div>


                                                                      <div class="mb-2 row">
                                                                           <label class="col-sm-5 col-form-label"><b>Status
                                                                                </b></label>
                                                                           <div class="col-sm-7 fs-4">

                                                                                <?php
																	if($data['status_trx'] == 'kirim'){ ?>
                                                                                <span
                                                                                     class="badge bg-warning "><?= $data['status_trx']; ?></span>
                                                                                <?php } elseif ($data['status_trx'] == 'terima') { ?>
                                                                                <span
                                                                                     class="badge bg-primary "><?= $data['status_trx']; ?></span>
                                                                                <?php } elseif ($data['status_trx'] == 'tidak terima') { ?>
                                                                                <span
                                                                                     class="badge bg-danger "><?= $data['status_trx']; ?></span>
                                                                                <?php }?>


                                                                           </div>
                                                                      </div>

                                                                 </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                 <div class="p-3">

                                                                      <div class="mb-2 row">
                                                                           <label class="mb-2"><b>Alamat </b></label>
                                                                           <div class="col-sm-12">
                                                                                <textarea type="text"
                                                                                     class="form-control" rows='3'
                                                                                     readonly><?= $data['alamat']; ?></textarea>
                                                                           </div>
                                                                      </div>
                                                                     

                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                             </div>
                                             <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary"
                                                       data-bs-dismiss="modal">Close</button>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <!-- end Modal view -->

                              <!-- Modal validasi view -->
                              <div class="modal fade" id="MyV<?= $data['id_trx']; ?>" data-bs-backdrop="static"
                                   data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                   aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Form Detail
                                                            Data KeUangan</b></h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                       aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                  <div class="container px-4">
                                                       <div class="row gx-9">
                                                            <div class="col-md-6">
                                                                 <div class="p-3">

                                                                      <div class="mb-2 row">
                                                                           <label class="col-sm-5 col-form-label"><b>Nama
                                                                                </b></label>
                                                                           <div class="col-sm-7">
                                                                                <input type="text" class="form-control"
                                                                                     value="<?= $data['nama']; ?>"
                                                                                     readonly>
                                                                           </div>
                                                                      </div>

                                                                      <div class="mb-2 row">
                                                                           <label class="col-sm-5 col-form-label"><b>Tanggal
                                                                                </b></label>
                                                                           <div class="col-sm-7">
                                                                                <input type="text" class="form-control"
                                                                                     value="<?= $data['tgl']; ?>"
                                                                                     readonly>
                                                                           </div>
                                                                      </div>

                                                                      <div class="mb-2 row">
                                                                           <label class="col-sm-5 col-form-label"><b>Kategori
                                                                                </b></label>
                                                                           <div class="col-sm-7">
                                                                                <input type="text" class="form-control"
                                                                                     value="<?= $data['nama_acara']; ?>"
                                                                                     readonly>
                                                                           </div>
                                                                      </div>


                                                                      <div class="mb-1 row">
                                                                           <label class="col-sm-5 col-form-label"><b>Uang
                                                                                </b></label>
                                                                           <div class="col-sm-7">
                                                                                <input type="text"
                                                                                     class="form-control form-control-lg"
                                                                                     value="Rp.<?= number_format($data['jml_trx']) ?>"
                                                                                     readonly>
                                                                           </div>
                                                                      </div>

                                                                      <div class="mb-2 row">
                                                                           <label class="mb-2"><b>Keterangan
                                                                                </b></label>
                                                                           <div class="col-sm-12">
                                                                                <textarea type="text"
                                                                                     class="form-control" rows='3'
                                                                                     readonly><?= getStatus($data['keterangan']); ?></textarea>
                                                                           </div>
                                                                      </div>


                                                                      <div class="mb-2 row">
                                                                           <label class="col-sm-5 col-form-label"><b>Status
                                                                                </b></label>
                                                                           <div class="col-sm-7 fs-4">

                                                                                <?php
																	if($data['status_trx'] == 'kirim'){ ?>
                                                                                <span
                                                                                     class="badge bg-warning "><?= $data['status_trx']; ?></span>
                                                                                <?php } elseif ($data['status_trx'] == 'terima') { ?>
                                                                                <span
                                                                                     class="badge bg-primary "><?= $data['status_trx']; ?></span>
                                                                                <?php } elseif ($data['status_trx'] == 'tidak terima') { ?>
                                                                                <span
                                                                                     class="badge bg-danger "><?= $data['status_trx']; ?></span>
                                                                                <?php }?>


                                                                           </div>
                                                                      </div>

                                                                 </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                 <div class="p-3">

                                                                      <div class="mb-2 row">
                                                                           <label class="mb-2"><b>Alamat </b></label>
                                                                           <div class="col-sm-12">
                                                                                <textarea type="text"
                                                                                     class="form-control" rows='3'
                                                                                     readonly><?= $data['alamat']; ?></textarea>
                                                                           </div>
                                                                      </div>


                                                                      <div class="mb-2 row">
                                                                           <label class="col-sm-2 col-form-label"><b>RT
                                                                                </b></label>
                                                                           <div class="col-sm-10">
                                                                                <input type="text" class="form-control"
                                                                                     value="<?= $data['rt']; ?>"
                                                                                     readonly>
                                                                           </div>
                                                                      </div>
                                                                      <div class="mb-2 row">
                                                                           <label class="col-sm-2 col-form-label"><b>RW
                                                                                </b></label>
                                                                           <div class="col-sm-10">
                                                                                <input type="text" class="form-control"
                                                                                     value="<?= $data['rw']; ?>"
                                                                                     readonly>
                                                                           </div>
                                                                      </div>

                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <hr>
                                                  <h4><b>Validasi</b></h4>
                                                  <div class="container px-4">
                                                       <div class="row gx-5">
                                                            <div class="col-md-6 bg-info">
                                                                 <div class="p-3"><b>KeUangan
                                                                           "<?= $data['nama_acara']; ?>"
                                                                           Rp.<?= number_format($data['jml_trx']) ?>
                                                                      </b></div>
                                                            </div>
                                                            <div class="col-md-6 bg-secondary">
                                                                 <div class="p-3">
                                                                 <?php
                                  
                                  $bulan =  date('m', strtotime(date('Y-m-d')));
$sql2 = mysqli_query($koneksi,"SELECT * FROM saldo_akhir where month(tgl)='$bulan' ORDER BY id_saldo_akhir DESC LIMIT 1");
$rows = mysqli_num_rows($sql2);
if($rows<1){
     $total = 0;
     
}else{
     
     while ($data2 = mysqli_fetch_array($sql2)) {
          $total = $data2['jml_saldo_akhir'];
          
          
     }
}
                                  ?>
                                                                      <form method="POST">
                                        <input type="text" name='total' value='<?=$total?>'>
                                        <input type="text" name="tgl" value='<?= $data['tgl']; ?>'>
                                                                           <input type="hidden" name="id"
                                                                                class="form-control"
                                                                                value="<?= $data['id_trx']; ?>">
                                                                           <input type="hidden" name="saldo_akhir"
                                                                                class="form-control"
                                                                                value="<?= $data['jml_trx']; ?>">
                                                                           <select class="form-select form-select-sm"
                                                                                name="status" required>
                                                                                <option value="" selected>-- Pilih --
                                                                                </option>
                                                                                <option value="terima">Terima</option>
                                                                           </select>

                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                             </div>
                                             <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary"
                                                       data-bs-dismiss="modal">Close</button>
                                                  <button type="reset" class="btn btn-danger">Reset</button>
                                                  <button type="submit" name="validasi_keuangan"
                                                       class="btn btn-primary">Simpan</button>
                                             </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                              <!-- end validasi Modal view -->


                              <?php } ?>
                         </tbody>
                    </table>
                    <br><br>


               </div>
          </div>
     </div>

</body>

</html>