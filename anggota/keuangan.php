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
   <h1 class="mb-1">KeUangan</h1>
   <nav>
    <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="?url=dashboard">Dashboard</a></li>
     <li class="breadcrumb-item"><a href="?url=anggota">Data Anggota</a></li>
     <li class="breadcrumb-item active">KeUangan</li>
   </ol>
 </nav>
</div><!-- End Page Title -->
<div class="row">

 <div class="col-lg-8">
  <div class="card">
   <div class="card-body">
    <div class="card-header">
     <h4>Form KeUangan</h4>
   </div>

   <form method="POST">
    <div class="mb-2 mt-3 row">
      <label  class="col-sm-3 col-form-label"><b>Nama </b></label>
      <div class="col-sm-8">
        <input type="text" name="nama" class="form-control" value="<?= $_SESSION['nama']; ?>" readonly>
        <input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
      </div>
    </div>

    <div class="mb-3 mt-3 row">
      <label  class="col-sm-3 col-form-label"><b>Tanggal </b></label>
      <div class="col-sm-5">
        <div class="input-group mb-1">
          <input type="text" name="tgl" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y'); ?>" class="form-control text-center" readonly>
          <span class="input-group-text"><i class="bi bi-calendar2-check-fill"></i></span>
        </div>
      </div>
    </div>

    <div class="mb-3 mt-3 row">
      <label  class="col-sm-3 col-form-label"><b>Kategori</b></label>
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
      <label  class="col-sm-3 col-form-label"><b>KeUangan</b></label>
      <div class="col-sm-5">
        <div class="input-group mb-1">
          <span class="input-group-text">Rp.</span>
          <input type="text" name="saldo_akhir" onkeypress="return hanyaAngka(event)" class="form-control form-control-lg" required>
        </div>           
      </div>
    </div>

    <div class="mb-2 mt-3 row">
      <label  class="col-sm-3 col-form-label"><b>Keterangan </b></label>
      <div class="col-sm-8">
        <textarea type="text" id="textarea_ket" maxlength="50" name="ket" class="form-control" required></textarea>
        <div class="mt-2" id="feedback_ket"></div>
      </div>
    </div>  

    <br>

    <div class="">
      <button type="reset" class="btn btn-danger">Reset</button>
      <button type="submit" name="kauangan" class="btn btn-primary">Simpan</button>      
    </div>

  </form>
</div>
</div>

</div>
<div class="col-lg-4">
  <div class="card">
   <div class="card-body">
     <h5 class="card-title">Data KeUangan <span>terakhir</span></h5>

     <table id="uang" class="table table-borderles">
      <thead>
        <tr>
          <th scope="col">Tanggal</th>
          <th scope="col">Uang</th>
          <th scope="col">Status</th>
        </tr>
      </thead>                    
      <tbody>
        <?php
        require '../config/config.php';
        $sql = mysqli_query($koneksi, 
          "select * from trx inner join users on users.id_user = trx.id_user where nama='$_SESSION[nama]' order by tgl desc");
        while ($data = mysqli_fetch_array($sql)) {
          ?>                       
          <tr>
            <td style="font-size: 14px"><?= $data['tgl']; ?></td>
            <td style="font-size: 14px"><?= $data['jml_trx']; ?></td>
            <td>
              <?php
              if($data['status_trx'] == 'kirim'){ ?>
                <a href="?url=data_keuangan"><span class="badge bg-warning "><?= $data['status_trx']; ?></span></a>
              <?php } elseif ($data['status_trx'] == 'terima') { ?>
                <a href="?url=data_keuangan"><span  class="badge bg-primary "><?= $data['status_trx']; ?></span></a>
              <?php } elseif ($data['status_trx'] == 'tidak terima') { ?>
                <a href="?url=data_keuangan"><span style="font-size: 11px" class="badge bg-danger "><?= $data['status_trx']; ?></span></a>
              <?php }?>
                
              </td>
            </tr>
          <?php } ?>
        </tbody>
        
      </table>

    </div>
  </div>

</div>
</div>
</div>

</body>
</html>