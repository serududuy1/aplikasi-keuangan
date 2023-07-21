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
   <h1 class="mb-1">Profile</h1>
   <nav>
    <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="?url=dashboard">Dashboard</a></li>
     <li class="breadcrumb-item active">Profile</li>

   </ol>
 </nav>
</div><!-- End Page Title -->
<div class="row">

  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>Profile</h3>
      </div>
      <div class="card-body">
        <div class="mb-2 mt-3 row">
          <label  class="col-sm-4 col-form-label"><b>Nama </b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" value="<?= $_SESSION['nama']; ?>" readonly>
          </div>
        </div>
        <div class="mb-2 mt-3 row">
          <label  class="col-sm-4 col-form-label"><b>No Telepon</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" value="<?= $_SESSION['no_telp']; ?>" readonly>
          </div>
        </div>
        <div class="mb-2 mt-3 row">
          <label  class="col-sm-4 col-form-label"><b>Pekerjaan</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" value="<?= $_SESSION['pekerjaan']; ?>" readonly>
          </div>
        </div>
        <div class="mb-2 mt-3 row">
          <label  class="col-sm-4 col-form-label"><b>Tgl Lahir</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" value="<?= $_SESSION['tgl_lahir']; ?>" readonly>
          </div>
        </div>                    
        <div class="mb-2 mt-3 row">
          <label  class="col-sm-4 col-form-label"><b>Alamat</b></label>
          <div class="col-sm-8">
            <textarea type="text" class="form-control" readonly><?= $_SESSION['alamat']; ?></textarea>
          </div>
        </div>
        <div class="mb-2 mt-3 row">
          <label  class="col-sm-4 col-form-label"><b>Level</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" value="<?= $_SESSION['usertype']; ?>" readonly>
          </div>
        </div>
        <div class="mb-2 mt-3 row">
          <label  class="col-sm-4 col-form-label"><b>Status</b></label>
          <div class="col-sm-8">
            <button class="btn btn-primary"><?= $_SESSION['status']; ?></button>
          </div>
        </div>       
        <br>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <p class="card-title fs-3">UPDATE <span> Username & Password</span></p>    
      </div>
      <div class="card-body">
        <?php
        require '../config/config.php';
        $sql = mysqli_query($koneksi,"select * from users where id_user='$_SESSION[id]' ");
        while ($data = mysqli_fetch_array($sql)) {
          ?>
          <form method="POST">
            <input type="hidden" name="id" value="<?= $data['id']; ?>"> 
            <div class="mb-2 mt-3 row">
              <label  class="col-sm-3 col-form-label"><b>Username</b></label>
              <div class="col-sm-8">
                <input type="text" name="username" class="form-control" value="<?= $data['username']; ?>" required>
              </div>
            </div>
            <div class="mb-1 mt-3 row">
              <label  class="col-sm-3 col-form-label"><b>Password Lama</b></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= $data['password']; ?>" readonly>
              </div>
            </div>
            <div class="mb-2 mt-1 row">
              <label  class="col-sm-3 col-form-label"><b>Password Baru</b></label>
              <div class="col-sm-8">
                <input type="text" name="password" class="form-control" required>
              </div>
            </div>  
            <br>
            <input type="submit" class="btn btn-success" name="profile" value="Simpan">
            <input type="reset" class="btn btn-danger" value="Reset">
          </form>
        <?php } ?> 
      </div><br>
    </div> 
  </div>



</div>
</div>

</body>
</html>