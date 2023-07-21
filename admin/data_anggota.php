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
   <h1 class="mb-1">Anggota</h1>
   <nav>
    <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="?url=dashboard">Dashboard</a></li>
     <li class="breadcrumb-item active">Data Anggota</li>
   </ol>
 </nav>
</div><!-- End Page Title -->
<div class="card">
 <div class="card-body"> 
  <div class="card-header">
   <h3>Form Data Anggota</h3>
 </div>
 <div class="row">
   <div class="col-md-12">
    <br>

    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#TambahUsers">
     <span class="icon text-white"> 
      <i class="bi bi-plus-lg"></i>  Add Anggota
    </span> 
  </button>


  <!-- add Modal -->
  <div class="modal fade" id="TambahUsers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
     <div class="modal-header">
      <h1 class="modal-title fs-4" id="staticBackdropLabel"><b>Form Add Anggota</b></h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     <form method="POST">
      <br>

      <div class="mb-3 row">
        <label class="col-sm-3 col-form-label"><b>Nama</b></label>
        <div class="col-sm-9">
         <input type="text" name="nama" class="form-control" placeholder="Input Nama Lengkap" required>
       </div>
     </div>

     <div class="mb-3 row">
       <label class="col-sm-3 col-form-label"><b>No Telepon</b></label>
       <div class="col-sm-9">
        <input type="text" onkeypress="return hanyaAngka(event)" name="no_telp" class="form-control" placeholder="Input Nama No Telepon" required>
      </div>
    </div>   

    <div class="mb-3 row">
      <label class="col-sm-3 col-form-label"><b>Pekerjaan</b></label>
      <div class="col-sm-9">
       <input type="text" name="pekerjaan" class="form-control" placeholder="Input Pekerjaan" required>
     </div>
   </div>

   <div class="mb-3 row">
     <label class="col-sm-3 col-form-label"><b>Tanggal Lahir</b></label>
     <div class="col-sm-9">
      <input id="tgllahir" type="text" name="tgl_lahir" class="form-control" placeholder="DD/MM/YYYY" required>
    </div>
  </div>


  <div class="mb-3 row">
    <label class="col-sm-3 col-form-label"><b>Alamat</b></label>
    <div class="col-sm-9">
     <textarea type="text" name="alamat" id="textarea_alamat" maxlength="65" class="form-control" rows="4" placeholder="Input Alamat Lengkap" required></textarea>
     <div class="mt-2" id="feedback_alamat"></div>  
   </div>
 </div>

 <div class="mb-3 row">
  <label class="col-sm-3 col-form-label"><b>RT / RW</b></label> 
  <div class="col-sm-4">
   <select class="form-select" name="rt" required>
    <option value="" selected>-- Pilih RT</option>
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

<div class="col-sm-4">
  <select class="form-select" name="rw" required>
   <option value="" selected>-- Pilih RW</option>
   <option value="1">01</option>
   <option value="2">02</option>
   <option value="3">03</option>
   <option value="4">04</option>
   <option value="5">05</option>
   <option value="6">06</option>
   <option value="7">07</option>
   <option value="8">08</option>
   <option value="9">09</option>
   <option value="10">10</option>                      
 </select>      
</div>    
</div>   

<div class="mb-3 row">
 <label class="col-sm-3 col-form-label"><b>User</b></label>
 <div class="col-sm-9">
   <select class="form-select" name="usertype" required>
    <option value="" selected>-- Pilih User</option>
    <option value="ketua">Ketua</option>
    <option value="wakil">Wakil</option>
    <option value="anggota">Anggota</option>                     
  </select>      
</div>
</div>

<div class="mb-3 row">
  <label class="col-sm-3 col-form-label"><b>Level</b></label>
  <div class="col-sm-9">
    <select class="form-select" name="level" required>
     <option value="" selected>-- Pilih Level</option>
     <option value="admin">Administrator</option>
     <option value="anggota">Anggota</option>                    
   </select>     
 </div>
</div>

<div class="mb-3 row">
  <label class="col-sm-3 col-form-label"><b>Username</b></label>
  <div class="col-sm-9">
   <input type="text" name="username" class="form-control" placeholder="Input Username" required>
 </div>
</div>

<div class="mb-3 row">
  <label class="col-sm-3 col-form-label"><b>Password</b></label>
  <div class="col-sm-9">
   <input type="text" name="password" class="form-control" placeholder="Input Password" required>
 </div>
</div>      

<br>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 <button type="reset" class="btn btn-danger">Reset</button>
 <button type="submit" name="add" class="btn btn-primary">Simpan</button>
</form>        
</div>

</div>
</div>
</div>
<!--end add Modal -->



<br><br>
<table id="anggota" class="table table-hover">
 <thead>
  <tr>
   <th>No</th>
   <th>Nama</th>                          
   <th>Alamat</th>
   <th>Level</th>                           
   <th>Status</th>                                             
   <th style="width: 160px;"></th>
 </tr>
</thead>                
<tbody>
  <?php
  require '../config/config.php';
  $no = 1;
  $sql = mysqli_query($koneksi,"select * from users order by status  DESC ");
  while ($data = mysqli_fetch_array($sql)) {
   ?>                   
   <tr>
    <td><?= $no++; ?></td>
    <td><?= $data['nama']; ?></td>
    <td><?= $data['alamat']; ?></td>
    <td><?= $data['usertype']; ?></td>
    <td>
     <?php
     if($data['status'] == 'aktif'){ ?>
      <span class="badge bg-primary "><?= $data['status']; ?></span>
    <?php } else {
      if ($data['status'] == 'tidak aktif') { ?>
       <span class="badge bg-warning "><?= $data['status']; ?></span>
     <?php }}?>
   </td>                                  
   <td>



<a href="?url=edit&id=<?php echo $data['id_user']; ?>" class="btn btn-info btn-icon-split">
 <span class="icon text-white">
  <i class="bi bi-pencil-square"></i>
</span>
</a>     


    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MyValidasi<?= $data['id_user']; ?>" >
     <span class="icon text-white">
      <i class="bi bi-check-square"></i>
    </span> 
  </button>



<a href="del.php?id=<?php echo $data['id_user']; ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Yakin Hapus Data Anggota ?')">
 <span class="icon text-white">
  <i class="bi bi-trash-fill"></i>
</span>
</a>                                                                        

</td>



<!-- edit Modal -->
<div class="modal fade" id="MyEdit<?= $data['id_user']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
   <div class="modal-content">
    <div class="modal-header">
     <h1 class="modal-title fs-4" id="staticBackdropLabel"><b>Form Edit Anggota</b></h1>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">


    <div class="col-md-12">
      <div class="card">
       <div class="card-body pt-3">
        <ul class="nav nav-tabs nav-tabs-bordered">

         <li class="nav-item"> <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#Biodata"><b>Biodata</b></button></li>

         <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab" data-bs-target="#alamat"><b>Alamat</b></button></li>

         <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab" data-bs-target="#password"><b>Password</b></button></li>

       </ul>
       <div class="tab-content pt-2">
         <div class="tab-pane fade show active profile-overview" id="Biodata">
          <br>
          <form method="POST"> 

           <input type="hidden" name="id" class="form-control" value="<?= $data['id']; ?>">         
           <div class="mb-3 row">
             <label class="col-sm-3 col-form-label"><b>Nama</b></label>
             <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label"><b>No Telepon</b></label>
            <div class="col-sm-9">
             <input type="text" name="no_telp" onkeypress="return hanyaAngka(event)" class="form-control" value="<?= $data['no_telp']; ?>">
           </div>
         </div>
         <div class="mb-3 row">
           <label class="col-sm-3 col-form-label"><b>Pekerjaan</b></label>
           <div class="col-sm-9">
            <input type="text" name="pekerjaan" class="form-control" value="<?= $data['pekerjaan']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label"><b>Tanggal Lahir</b></label>
          <div class="col-sm-9">
           <input type="text" name="tgl_lahir" class="form-control tgllahir2" value="<?= $data['tgl_lahir']; ?>">
         </div>
       </div>
       <div class="mb-3 row">
        <label class="col-sm-3 col-form-label"><b>Kategori User</b></label>
        <div class="col-sm-9">
         <select class="form-select" name="usertype" required>
          <option value="" selected>-- Pilih User</option>
          <option value="ketua">Ketua</option>
          <option value="wakil">Wakil</option>
          <option value="anggota">Anggota</option>                     
        </select>      
      </div>
    </div>       
    <div class="mb-3 row">
      <label class="col-sm-3 col-form-label"><b>Level Akses</b></label>
      <div class="col-sm-9">
        <select class="form-select" name="level" required>
         <option value="" selected>-- Pilih Level</option>
         <option value="admin">Administrator</option>
         <option value="anggota">Anggota</option>                    
       </select>     
     </div>
   </div>      
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="reset" class="btn btn-danger">Reset</button>
     <button type="submit" name="edit_biodata" class="btn btn-primary">Simpan</button>
   </form>      
 </div>                        
</div>



<div class="tab-pane fade pt-3" id="alamat">

  <form method="POST"> 

   <input type="hidden" name="id" class="form-control" value="<?= $data['id']; ?>">

   <div class="mb-3 row">
    <label class="col-sm-3 col-form-label"><b>Alamat</b></label>
    <div class="col-sm-9">
     <textarea type="text" name="alamat" id="textarea_alamat" maxlength="65" class="form-control" rows="4" placeholder="Input Alamat Lengkap" required><?= $data['alamat']; ?></textarea>
     <div class="mt-2" id="feedback_alamat"></div>  
   </div>
 </div>

 <div class="mb-3 row">
  <label class="col-sm-3 col-form-label"><b>RT / RW</b></label> 
  <div class="col-sm-4">
   <select class="form-select" name="rt" required>
    <option value="" selected>-- Pilih RT</option>
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

<div class="col-sm-4">
  <select class="form-select" name="rw" required>
   <option value="" selected>-- Pilih RW</option>
   <option value="1">01</option>
   <option value="2">02</option>
   <option value="3">03</option>
   <option value="4">04</option>
   <option value="5">05</option>
   <option value="6">06</option>
   <option value="7">07</option>
   <option value="8">08</option>
   <option value="9">09</option>
   <option value="10">10</option>                      
 </select>      
</div>    
</div>  

<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 <button type="reset" class="btn btn-danger">Reset</button>
 <button type="submit" name="edit_alamat" class="btn btn-primary">Simpan</button>
</form>      
</div>    
</div>

<div class="tab-pane fade pt-3" id="password">

<form method="POST">
<input type="hidden" name="id" class="form-control" value="<?= $data['id']; ?>"> 
<div class="mb-3 row">
  <label class="col-sm-3 col-form-label"><b>Username</b></label>
  <div class="col-sm-9">
   <input type="text" name="username" class="form-control" value="<?= $data['username'];?>" >
 </div>
</div>

<div class="mb-3 row">
  <label class="col-sm-3 col-form-label"><b>Password Lama</b></label>
  <div class="col-sm-9">
   <input type="text"  class="form-control" value="<?= $data['password']; ?>" readonly>
 </div>
</div>

<div class="mb-3 row">
  <label class="col-sm-3 col-form-label"><b>Password Baru</b></label>
  <div class="col-sm-9">
   <input type="text" name="password" class="form-control" required>
 </div>
</div>


<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 <button type="reset" class="btn btn-danger">Reset</button>
 <button type="submit" name="edit_password" class="btn btn-primary">Simpan</button>
 </form>     
</div>
</div>


</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!--end edit Modal -->

<!-- Modal validasi -->
<div class="modal fade" id="MyValidasi<?= $data['id_user']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4" id="staticBackdropLabel"><b>Form Detail Data Anggota</b></h1>
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
              <label class="col-sm-5 col-form-label"><b>No telepon </b></label>
              <div class="col-sm-7">
                <input type="text" class="form-control" value="<?= $data['no_telp']; ?>" readonly>
              </div>
            </div>

            <div class="mb-2 row">
             <label class="col-sm-5 col-form-label"><b>Pekerjaan </b></label>
             <div class="col-sm-7">
               <input type="text" class="form-control" value="<?= $data['pekerjaan']; ?>" readonly>
             </div>
           </div>

           <div class="mb-2 row">
            <label class="col-sm-5 col-form-label"><b>Tanggal Lahir </b></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" value="<?= $data['tgl_lahir']; ?>" readonly>
            </div>
          </div>

          <div class="mb-2 row">
           <label class="col-sm-5 col-form-label"><b>User </b></label>
           <div class="col-sm-7">
             <input type="text" class="form-control" value="<?= $data['usertype']; ?>" readonly>
           </div>
         </div>           

       </div>
     </div>
     <div class="col-md-6">
       <div class="p-3">

        <div class="mb-4 row">
         <label class="mb-2" ><b>Alamat </b></label>
         <div class="col-sm-12">
           <textarea type="text" class="form-control" rows='5' readonly><?= $data['alamat']; ?></textarea>
         </div>
       </div>

       <div class="mb-2 row">
        <label class="col-sm-4 col-form-label"><b>Status </b></label>
        <div class="col-sm-8">

          <?php
          if($data['status'] == 'aktif'){ ?>
           <span class="badge bg-primary fs-5"><?= $data['status']; ?></span>
         <?php } else {
           if ($data['status'] == 'tidak aktif') { ?>
            <span class="badge bg-warning fs-5"><?= $data['status']; ?></span>
          <?php }}?>

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
     <div class="p-3"><b>Validasi Anggota <?= $data['nama']; ?></b></div>
   </div>
   <div class="col-md-6 bg-secondary">
     <div class="p-3">

      <form method="POST">
       <input type="hidden" name="id" class="form-control" value="<?= $data['id_user']; ?>">    
       <select class="form-select form-select-sm" name="status" required>
         <option value="" selected>-- Pilih Validasi Anggota --</option>
         <option value="aktif">Aktif</option>
         <option value="tidak aktif">Tidak Aktif</option>
       </select>

     </div>
   </div>
 </div>
</div>

</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 <button type="reset" class="btn btn-danger">Reset</button>
 <button type="submit" name="validasi_anggota" class="btn btn-primary">Simpan</button>
</div>
</form>

</div>
</div>
</div>
<!-- end Modal validasi -->


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