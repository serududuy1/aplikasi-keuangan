<?php
require '../config/config.php';
require 'function.php';

session_start();
if (!isset($_SESSION['id'])) {

  ?>
<script type="text/javascript">
alert('Anda Harus Login');
window.location = '../index.php'
</script>

<?php } ?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta content="width=device-width, initial-scale=1.0" name="viewport">
     <title>Sistem Karang Taruna</title>
     <meta name="robots" content="noindex, nofollow">
     <meta content="" name="description">
     <meta content="" name="keywords">
     <link href="../assets/img/favicon.png" rel="icon">
     <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
     <link href="https://fonts.gstatic.com" rel="preconnect">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
     <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
     <link href="../assets/css/bootstrap-icons.css" rel="stylesheet">
     <link href="../assets/css/boxicons.min.css" rel="stylesheet">
     <link href="../assets/css/quill.snow.css" rel="stylesheet">
     <link href="../assets/css/quill.bubble.css" rel="stylesheet">
     <link href="../assets/css/remixicon.css" rel="stylesheet">

     <link rel="stylesheet" href="../assets/jquery-ui.css">

     <link href="../assets/css/style.css" rel="stylesheet">
     <!-- Datatable -->
     <link href="../assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body>
     <header id="header" class="header fixed-top d-flex align-items-center">
          <div class="d-flex align-items-center justify-content-between"> <a href="index.html"
                    class="logo d-flex align-items-center"> <span class="d-none d-lg-block">Sistem Karang Taruna</span>
               </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
          <div class="search-bar">
               <form class="search-form d-flex align-items-center" method="POST" action="#"> <input type="text"
                         name="query" placeholder="Search" title="Enter search keyword"> <button type="submit"
                         title="Search"><i class="bi bi-search"></i></button></form>
          </div>
          <nav class="header-nav ms-auto">
               <ul class="d-flex align-items-center">
                    <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i
                                   class="bi bi-search"></i> </a></li>

                    <li class="nav-item dropdown pe-3">

                         <?php
             require '../config/config.php';
             $sql = mysqli_query($koneksi, "select * from users where id_user='$_SESSION[id]'");
             while ($data = mysqli_fetch_array($sql)) { 
               ?>
                         <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                              data-bs-toggle="dropdown"> <img src="../assets/img/profile-img.png" alt="Profile"
                                   class="rounded-circle"> <span
                                   class="d-none d-md-block dropdown-toggle ps-2"><?php echo $data['nama']; ?></span>
                         </a>
                         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                              <li class="dropdown-header">
                                   <h6 class="mb-2"><?php echo $data['level']; ?></h6>
                                   <span class="badge bg-primary"><?php echo $data['status']; ?></span>
                              </li>
                              <?php } ?>
                              <li>
                                   <hr class="dropdown-divider">
                              </li>
                              <li>
                                   <hr class="dropdown-divider">
                              </li>
                              <li> <a class="dropdown-item d-flex align-items-center" href="?url=profile"> <i
                                             class="bi bi-gear"></i> <span>Profile</span> </a></li>
                              <li>
                                   <hr class="dropdown-divider">
                              </li>
                              <li> <a class="dropdown-item d-flex align-items-center"
                                        href="https://api.whatsapp.com/send?phone=6289664668600&text=Jika ada pertanyaan silahkan hubungi kami"
                                        target="_blank"> <i class="bi bi-question-circle"></i> <span>Hubungi
                                             Admin?</span> </a></li>
                              <li>
                                   <hr class="dropdown-divider">
                              </li>
                              <li> <a class="dropdown-item d-flex align-items-center" href="../logout.php"> <i
                                             class="bi bi-box-arrow-right"></i> <span>Sign Out</span> </a></li>
                         </ul>
                    </li>
               </ul>
          </nav>
     </header>

     <aside id="sidebar" class="sidebar">
          <ul class="sidebar-nav" id="sidebar-nav">
               <li class="nav-item"> <a class="nav-link collapsed" href="?url=dashboard">
                         <i class="bi bi-speedometer"></i>
                         <span>Dashboard</span> </a></li>

               <li class="nav-item">
                    <a class="nav-link collapsed" href="?url=data_anggota">
                         <i class="bi bi-people-fill"></i>
                         </i><span>Data Anggota</span>
                    </a>
               </li>

               <li class="nav-item">
                    <a class="nav-link collapsed" href="?url=index_keuangan">
                         <i class="bi bi-arrow-left-right"></i>
                         </i><span>Data KeUangan</span>
                    </a>
               <li class="nav-item">
                    <a class="nav-link collapsed" href="?url=saldo_awal">
                         <i class="bi bi-arrow-left-right"></i>
                         </i><span>Saldo Awal</span>
                    </a>
               </li>


               <li class="nav-item">
                    <a class="nav-link collapsed" href="?url=list_acara">
                         <i class="bi bi-calendar-event-fill"></i>
                         </i><span>Data Acara</span>
                    </a>
               </li>

               <li class="nav-item">
                    <a class="nav-link collapsed" href="?url=cek_saldo">
                         <i class="ri-layout-right-fill"></i>
                         </i><span>Lihat Saldo</span>
                    </a>
               </li>

               <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"><i
                              class="bi bi-stack"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                         <li> <a href="?url=lap_acara">
                                   <i class="bi bi-circle-fill"></i>
                                   <span>Data Acara</span> </a>
                         </li>
                         <li> <a href="?url=lap_keuangan">
                                   <i class="bi bi-circle-fill"></i>
                                   <span>Data KeUangan</span> </a>
                         </li>
                    </ul>
               </li>



               <li class="nav-heading ps-4">SISTEM PENDATAAN KEUANGAN KARANG TARUNA</li>

               <br><br><br><br>
               <br><br><br><br>
               <div class="row text-center">
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
                    <p><?php echo tgl_indo(date('Y-m-d')); ?> <span style="font-size:17" id="jam"></span></p>
                    <script type="text/javascript">
                    window.onload = function() {
                         jam();
                    }

                    function jam() {
                         var e = document.getElementById('jam'),
                              d = new Date(),
                              h, m, s;
                         h = d.getHours();
                         m = set(d.getMinutes());
                         s = set(d.getSeconds());
                         e.innerHTML = h + ':' + m + ':' + s;
                         setTimeout('jam()', 1000);
                    }

                    function set(e) {
                         e = e < 10 ? '0' + e : e;
                         return e;
                    }
                    </script>
               </div>


          </ul>
     </aside>


     <main id="main" class="main">
          <section class="section">
               <div class="row">

                    <?php include 'link.php' ?>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

               </div>
          </section>
     </main>



     <footer id="footer" class="footer">
          <div class="copyright"> &copy; Copyright <strong><span>SISTEM PENDATAAN KEUANGAN KARANG
                         TARUNA</span></strong><br>Jln. Winong No. 23 Rt/Rw 002/05 Sudimara Timur Kec. Ciledug Kota
               Tangerang.</div>
          <div class="credits">TAUFIK ISMAIL RIYANTO / 181011401190</div>
     </footer>
     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
               class="bi bi-arrow-up-short"></i></a>
     <script src="../assets/js/apexcharts.min.js"></script>
     <script src="../assets/js/bootstrap.bundle.min.js"></script>
     <script src="../assets/js/chart.min.js"></script>
     <script src="../assets/js/echarts.min.js"></script>
     <script src="../assets/js/quill.min.js"></script>
     <!-- <script src="../assets/js/simple-datatables.js"></script> -->
     <script src="../assets/js/tinymce.min.js"></script>
     <script src="../assets/js/validate.js"></script>
     <script src="../assets/js/main.js"></script>
     <!-- Datatable -->
     <script src="../assets/datatables/jquery-3.5.1.js"></script>
     <script src="../assets/datatables/jquery.dataTables.min.js"></script>
     <script src="../assets/datatables/dataTables.bootstrap4.min.js"></script>

     <script type="text/javascript">
     $(document).ready(function() {
          $('#anggota').dataTable({
               "sScrollX": "100%",
               "sScrollXInner": "100%",
               "bScrollCollapse": true,
               "info": false,
          });
     });

     $(document).ready(function() {
          $('#uang').dataTable({
               "sScrollX": "100%",
               "sScrollXInner": "100%",
               "bScrollCollapse": true,
               "bFilter": true,
               "info": false,
          });
     });

     $(document).ready(function() {
          $('#example').DataTable({
               scrollY: '400px',
               scrollCollapse: true,
               paging: false,
          });
     });

     $(".perhitungan").keyup(function() {
          var bil1 = parseInt($("#bil1").val())
          var bil2 = parseInt($("#bil2").val())

          var hasil = bil1 - bil2;
          $("#hasil").attr("value", hasil)

     });


     $(document).ready(function() {
          var text_max = 65;
          $('#feedback_alamat').html(text_max + ' maxsimal string');

          $('#textarea_alamat').keyup(function() {
               var text_length = $('#textarea_alamat').val().length;
               var text_remaining = text_max - text_length;

               $('#feedback_alamat').html(text_remaining + ' maxsimal string');
          });
     });

     $(document).ready(function() {
          var text_max = 65;
          $('#feedback_alamat2').html(text_max + ' maxsimal string');

          $('#textarea_alamat2').keyup(function() {
               var text_length = $('#textarea_alamat2').val().length;
               var text_remaining = text_max - text_length;

               $('#feedback_alamat2').html(text_remaining + ' maxsimal string');
          });
     });

     $(document).ready(function() {
          var text_max = 65;
          $('#feedback_ket').html(text_max + ' maxsimal string');

          $('#textarea_ket').keyup(function() {
               var text_length = $('#textarea_ket').val().length;
               var text_remaining = text_max - text_length;

               $('#feedback_ket').html(text_remaining + ' maxsimal string');
          });
     });

     $(document).ready(function() {
          var text_max = 15;
          $('#fbacara').html(text_max + ' maxsimal string');

          $('#textarea_nmacara').keyup(function() {
               var text_length = $('#textarea_nmacara').val().length;
               var text_remaining = text_max - text_length;

               $('#fbacara').html(text_remaining + ' maxsimal string');
          });
     });

     function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))

               return false;
          return true;
     };
     </script>


     <script src="../assets/jquery-ui.js"></script>
     <script>
     $(function() {
          $("#datepicker").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });

     $(function() {
          $("#datepicker2").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });

     $(function() {
          $("#dateacara").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });

     $(function() {
          $("#dateacara1").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });

     $(function() {
          $("#dateacara2").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });

     $(function() {
          $("#dateUang1").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });

     $(function() {
          $("#dateUang2").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });

     $(function() {
          $("#saldo1").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });

     $(function() {
          $("#saldo2").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });

     $(function() {
          $("#tgllahir").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });
     $(function() {
          $(".tgllahir2").datepicker({
               dateFormat: "dd-mm-yy",
               changeMonth: true,
               changeYear: true,
               showAnim: "slideDown"
          });
     });
     </script>

</body>

</html>