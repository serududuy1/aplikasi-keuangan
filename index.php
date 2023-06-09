<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Sistem Karang Taruna</title>
   <meta name="robots" content="noindex, nofollow">
   <meta content="" name="description">
   <meta content="" name="keywords">
   <link href="assets/img/favicon.png" rel="icon">
   <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <link href="https://fonts.gstatic.com" rel="preconnect">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="assets/css/bootstrap-icons.css" rel="stylesheet">
   <link href="assets/css/boxicons.min.css" rel="stylesheet">
   <link href="assets/css/quill.snow.css" rel="stylesheet">
   <link href="assets/css/quill.bubble.css" rel="stylesheet">
   <link href="assets/css/remixicon.css" rel="stylesheet">
   <!--  <link href="assets/css/simple-datatables.css" rel="stylesheet"> -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <link href="assets/css/style.css" rel="stylesheet">
   <!-- Datatable -->  
   <link href="assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 


<style>
      :root {
         --gradient: linear-gradient(to right, #EBECEE, #DBE0E7, #26B49A);

      }

      body {
         min-height: 100vh;
         background-color: #eaeaea;
         background-image: var(--gradient);
         background-size: 200%;
         background-position: right;
         animation: animateGradient 20s infinite alternate;
      }

      @keyframes animateGradient {
         0% {
            background-position: left
         }

         50% {
            background-position: right
         }

         100% {
            background-position: left
         }
      }
</style>


</head>
<body>

<main>
   <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                  <div class="d-flex justify-content-center"> <a href="index.php" class="logo d-flex align-items-center w-auto"><span class="d-none d-lg-block text-center fs-3">SISTEM PENDATAAN</span></a></div>
                  <div class="d-flex justify-content-center py-3">
                     <a href="index.php" class="logo d-flex align-items-center w-auto">
                        <span class="text-center fs-5">KEUANGAN KARANG TARUNA</span></a></div>
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="pt-4 pb-2">
                                 <h5 class="card-title text-center pb-0 fs-1">LOGIN</h5>
                                 <p class="text-center small">Untuk Login Input Username & Password Anda</p>
                              </div>
                              <form method="POST" action="cek_login.php" class="row g-3 needs-validation" novalidate>
                                 <div class="col-12">                                 
                                    <div class="input-group has-validation mb-2">
                                       <span class="input-group-text" id="inputGroupPrepend"><i class="bx bxs-user"></i></span> <input type="text" name="username" class="form-control" id="yourUsername" required>
                                       <div class="invalid-feedback">Username Tidak Boleh Kosong</div>
                                    </div>
                                 </div>
                                 <div class="col-12">                                  
                                    <div class="input-group has-validation mb-2">
                                       <span class="input-group-text" id="inputGroupPrepend"><i class="bx bxs-lock-open-alt"></i></span> <input type="password" name="password" class="form-control" id="yourPassword" required>
                                       <div class="invalid-feedback">Password Tidak Boleh Kosong</div>
                                    </div>
                                 </div>
                                 <div class="col-4">
                                    <button class="btn btn-primary w-100 mb-2" type="submit">Masuk</button>
                                 </div>
                                 <div class="col-12">
                                    <p class="small mb-0">Anda belum terdaftar sebagai anggota ? <br><a href="" data-bs-toggle="modal" data-bs-target="#MyRegist"> Daftar Anggota</a></p> <br><br>
                                 </div>

                                 <div class="row text-center">
                                    <div class="col-md-12">                                 
                                       <?php
                                       function tgl_indo($tanggal){
                                         $bulan = array (
                                          1 =>   'Januari',
                                          'Februari',
                                          'Maret',
                                          'April',
                                          'Mei',
                                          'Juni',
                                          'Juli',
                                          'Agustus',
                                          'September',
                                          'Oktober',
                                          'November',
                                          'Desember'
                                       );
                                         $pecahkan = explode('-', $tanggal);
                                         return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                                      }
                                      ?>
                                      <?php
                                      date_default_timezone_set("Asia/jakarta");
                                      ?>

                                      <p><b><?php echo tgl_indo(date('Y-m-d')); ?> <span style="font-size:17" id="jam" ></b></span></p>

                                      <script type="text/javascript">
                                         window.onload = function() { jam(); }

                                         function jam() {
                                          var e = document.getElementById('jam'),
                                          d = new Date(), h, m, s;
                                          h = d.getHours();
                                          m = set(d.getMinutes());
                                          s = set(d.getSeconds());

                                          e.innerHTML = h +':'+ m +':'+ s;

                                          setTimeout('jam()', 1000);
                                       }

                                       function set(e) {
                                          e = e < 10 ? '0'+ e : e;
                                          return e;
                                       }
                                    </script>                                 
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </main>

   <script src="assets/js/apexcharts.min.js"></script>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/chart.min.js"></script>
   <script src="assets/js/echarts.min.js"></script>
   <script src="assets/js/quill.min.js"></script>
   <!-- <script src="assets/js/simple-datatables.js"></script> -->
   <script src="assets/js/tinymce.min.js"></script>
   <script src="assets/js/validate.js"></script>
   <script src="assets/js/main.js"></script>
   <!-- Datatable -->
   <script src="assets/datatables/jquery-3.5.1.js"></script>
   <script src="assets/datatables/jquery.dataTables.min.js"></script>
   <script src="assets/datatables/dataTables.bootstrap4.min.js"></script>      

   <script type="text/javascript">

      $(document).ready(function() {
       var text_max = 65;
       $('#feedback_alamat').html(text_max + ' maxsimal string');

       $('#textarea_alamat').keyup(function() {
        var text_length = $('#textarea_alamat').val().length;
        var text_remaining = text_max - text_length;

        $('#feedback_alamat').html(text_remaining + ' maxsimal string');
     });
    });         

function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
  return true;
}; 
 </script> 

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
   $(function() {
     $( "#datepicker" ).datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true,
      showAnim: "slideDown"
   });
  });                
</script> 

</body>
</html>

 <!-- regist Modal -->
 <div class="modal fade" id="MyRegist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4" id="staticBackdropLabel"><b>Registrasi User Anggota</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
      <form method="POST" action="simpan_regist.php">
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
         <input type="text" name="no_telp" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Input No Telepon" required>
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
   <input id="datepicker" type="text" name="tgl_lahir" class="form-control" placeholder="Input Tanggal Lahir" required>
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
       <option value="9">010</option>                    
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
    <option value="11">11</option>
    <option value="12">12</option> 
    <option value="13">13</option>                                     
 </select>      
</div>    
</div>   

<div class="mb-3 row">
 <label class="col-sm-3 col-form-label"><b>User</b></label>
 <div class="col-sm-9">
   <input type="text" name="usertype" value="anggota" class="form-control" readonly>
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
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>        
</div>

</div>
</div>
</div>
<!--end regist Modal -->