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
   <h1 class="mb-1">Edit Data Anggota</h1>
   <nav>
    <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="?url=dashboard">Dashboard</a></li>
     <li class="breadcrumb-item active">Edit Data Anggota</li>
   </ol>
 </nav>
</div><!-- End Page Title -->	
	
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

  <?php
  require '../config/config.php';
  $sql = mysqli_query($koneksi,"select * from users where id_user='$_GET[id]' ");
  while ($data = mysqli_fetch_array($sql)) {
   ?>

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
         <select class="form-select" name="usertype">
          <option value="<?= $data['usertype']; ?>" selected><?= $data['usertype']; ?></option>
          <option value="ketua">Ketua</option>
          <option value="wakil">Wakil</option>
          <option value="anggota">Anggota</option>                     
        </select>      
      </div>
    </div>       
    <div class="mb-3 row">
      <label class="col-sm-3 col-form-label"><b>Level Akses</b></label>
      <div class="col-sm-9">
        <select class="form-select" name="level">
         <option value="<?= $data['level']; ?>" selected><?= $data['level']; ?></option>
         <option value="admin">Admin</option>
         <option value="anggota">Anggota</option>                    
       </select>     
     </div>
   </div><br>      
   <div class="modal-footer">
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
   <select class="form-select" name="rt">
    <option value="<?= $data['rt']; ?>" selected><?= $data['rt']; ?></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option> 
    <option value="12">12</option> 
    <option value="13">13</option> 
    <option value="14">14</option>
    <option value="15">15</option>                    
  </select>
</div>

<div class="col-sm-4">
  <select class="form-select" name="rw">
   <option value="<?= $data['rw']; ?>" selected><?= $data['rw']; ?></option>
   <option value="1">1</option>
   <option value="2">2</option>
   <option value="3">3</option>
   <option value="4">4</option>
   <option value="5">5</option>
   <option value="6">6</option>
   <option value="7">7</option>
   <option value="8">8</option>
   <option value="9">9</option>
   <option value="10">10</option>
   <option value="11">11</option> 
   <option value="12">12</option> 
   <option value="13">13</option> 
   <option value="14">14</option> 
   <option value="15">15</option>                       
 </select>      
</div>    
</div>  
<br>
<div class="modal-footer">
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

<br>
<div class="modal-footer">
 <button type="reset" class="btn btn-danger">Reset</button>
 <button type="submit" name="edit_password" class="btn btn-primary">Simpan</button>
 </form>     
</div>
</div>	
<?php } ?> 
</div>


</body>
</html>