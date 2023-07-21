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
                  <table id="anggota" class="table table-hover">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama</th>
                           <th>Pekerjaan</th>                           
                           <th>Alamat</th>
                           <th>Status</th>                                             
                           <th></th>
                        </tr>
                     </thead>                
                     <tbody>
                        <?php
                        require '../config/config.php';
                        $no = 1;
                        $sql = mysqli_query($koneksi,"select * from users where id_user='$_SESSION[id]' ");
                        while ($data = mysqli_fetch_array($sql)) {
                           ?>                   
                           <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $data['nama']; ?></td>
                              <td><?= $data['pekerjaan']; ?></td>
                              <td><?= $data['alamat']; ?></td>
                              <td><span class="badge bg-primary">
                                 <?= $data['status']; ?>                              
                              </span></td>                                  
                              <td>

                                 <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#MyView<?= $data['id']; ?>">
                                    <span class="icon text-white">
                                       <i class="bi bi-arrows-angle-expand"></i>
                                    </span> 
                                 </button>

                              </td>


<!-- Modal validasi -->
<div class="modal fade" id="MyView<?= $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
 <label class="col-sm-5 col-form-label"><b>Level User </b></label>
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
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
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