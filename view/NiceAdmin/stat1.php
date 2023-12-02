<?php

// Add the following lines at the top of your PHP file
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta content="width=device-width, initial-scale=1.0" name="viewport">

     <title>Charts / ApexCharts - NiceAdmin Bootstrap Template</title>
     <meta content="" name="description">
     <meta content="" name="keywords">

     <!-- Favicons -->
     <link href="assets/img/favicon.png" rel="icon">
     <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

     <!-- Google Fonts -->
     <link href="https://fonts.gstatic.com" rel="preconnect">
     <link
         href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
         rel="stylesheet">

     <!-- Vendor CSS Files -->
     <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
     <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
     <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
     <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
     <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
     <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

     <!-- Template Main CSS File -->
     <link href="assets/css/style.css" rel="stylesheet">

     <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
 </head>

 <body>
 
     <!-- ======= Header ======= -->
     <header id="header" class="header fixed-top d-flex align-items-center">
     <img src="img.png"  style="width: 60px; height: 60px;">
         <div class="d-flex align-items-center justify-content-between">
             <a href="index.html" class="logo d-flex align-items-center">
             
                 <span class="d-none d-lg-block">LocalArt</span>
             </a>
             <i class="bi bi-list toggle-sidebar-btn"></i>
         </div><!-- End Logo -->



         <nav class="header-nav ms-auto">
             <ul class="d-flex align-items-center">

                 <li class="nav-item d-block d-lg-none">
                     <a class="nav-link nav-icon search-bar-toggle " href="#">
                         <i class="bi bi-search"></i>
                     </a>
                 </li><!-- End Search Icon-->

                 <li class="nav-item dropdown">

                     <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                         <i class="bi bi-bell"></i>
                         <span class="badge bg-primary badge-number">4</span>
                     </a><!-- End Notification Icon -->

                     <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                         <li class="dropdown-header">
                             You have 4 new notifications
                             <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                         </li>
                
                         <li>
                             <hr class="dropdown-divider">
                         </li>
                         <li class="dropdown-footer">
                             <a href="#">Show all notifications</a>
                         </li>

                     </ul><!-- End Notification Dropdown Items -->

                 </li><!-- End Notification Nav -->

                 <li class="nav-item dropdown">

                     <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                         <i class="bi bi-chat-left-text"></i>
                         <span class="badge bg-success badge-number">1</span>
                     </a><!-- End Messages Icon -->

                     <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                         <li class="dropdown-header">
                             You have 1 new messages
                             <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                         </li>
                        

                         <li class="dropdown-footer">
                             <a href="#">Show all messages</a>
                         </li>

                     </ul><!-- End Messages Dropdown Items -->

                 </li><!-- End Messages Nav -->

                 <li class="nav-item dropdown pe-3">

                     <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                         <span class="d-none d-md-block dropdown-toggle ps-2">Najar Kousay</span>
                     </a><!-- End Profile Iamge Icon -->

                     <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                         <li class="dropdown-header">
                             <h6>hedi yedes</h6>
                             <span>developpeur web</span>
                         </li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>

                         <li>
                             <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                 <i class="bi bi-person"></i>
                                 <span>Mon Profile</span>
                             </a>
                         </li>
                         <li>
                             <hr class="dropdown-divider">
                         </li>

                         <li>
                             <a class="dropdown-item d-flex align-items-center" href="#">
                                 <i class="bi bi-box-arrow-right"></i>
                                 <span>se deconnecter</span>
                             </a>
                         </li>

                     </ul><!-- End Profile Dropdown Items -->
                 </li><!-- End Profile Nav -->

             </ul>
         </nav><!-- End Icons Navigation -->

     </header><!-- End Header -->

     <!-- ======= Sidebar ======= -->
     <aside id="sidebar" class="sidebar">

         <ul class="sidebar-nav" id="sidebar-nav">
         <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
             <li class="nav-item">
                 <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                         class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                     <li>
                         <a href="http://localhost/kousayPI/CPK/views/NiceAdmin/tabart.php">
                             <i class="bi bi-circle"></i><span>Data Tables</span>
                         </a>
                         
                     
                 </ul>
                 <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                     <li>
                         <a href="http://localhost/last%20khedma/views/tab.php">
                             <i class="bi bi-circle"></i><span>Data Tables</span>
                         </a>
                         
                     
                 </ul>
             </li><!-- End Tables Nav -->
             <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="http://localhost/last%20khedma/views/NiceAdmin/stat.php">
                            <i class="bi bi-circle"></i><span>ApexCharts</span>
                        </a>
                    </li>

                </ul>
            </li>

             


             <li class="nav-heading">Pages</li>

             <li class="nav-item">
                 <a class="nav-link collapsed" href="users-profile.html">
                     <i class="bi bi-person"></i>
                     <span>Profile</span>
                 </a>
             </li><!-- End Profile Page Nav -->

             <li class="nav-item">
                 <a class="nav-link collapsed" href="pages-faq.html">
                     <i class="bi bi-question-circle"></i>
                     <span>F.A.Q</span>
                 </a>
             </li><!-- End F.A.Q Page Nav -->



             <li class="nav-item">
                 <a class="nav-link collapsed" href="pages-error-404.html">
                     <i class="bi bi-dash-circle"></i>
                     <span>Error 404</span>
                 </a>
             </li><!-- End Error 404 Page Nav -->


         </ul>

     </aside><!-- End Sidebar-->

     <main id="main" class="main">

         <div class="pagetitle">
             <h1>ApexCharts</h1>
             <nav>
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="http://localhost/last%20khedma/views/addreclamation.php">Home</a></li>
                     <li class="breadcrumb-item">Charts</li>
                     <li class="breadcrumb-item active"><a href="stat.php">ApexCharts</a></li>
                 </ol>
             </nav>
         </div><!-- End Page Title -->

         <p>here is our statistic for the subject of article </p>

         <section class="section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Donut Chart</h5>

                            <!-- Donut Chart -->
                        <div id="donutChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#donutChart"), {
                                series: [44, 55, 13, 43, 22],
                                chart: {
                                 height: 350,
                                type: 'donut',
                                toolbar: {
                                show: true
                                    }
                                },
                                labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
                                }).render();
                                });
                            </script>
                                <!-- End Donut Chart -->

            </div>
          </div>
        </div>
        </section>

     </main><!-- End #main -->

     <!-- ======= Footer ======= -->


     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
             class="bi bi-arrow-up-short"></i></a>

     <!-- Vendor JS Files -->
     <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
     <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="assets/vendor/chart.js/chart.umd.js"></script>
     <script src="assets/vendor/echarts/echarts.min.js"></script>
     <script src="assets/vendor/quill/quill.min.js"></script>
     <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
     <script src="assets/vendor/tinymce/tinymce.min.js"></script>
     <script src="assets/vendor/php-email-form/validate.js"></script>


     <!-- Template Main JS File -->
     <script src="assets/js/main.js"></script>

 </body>

 </html>