<!DOCTYPE html>

<?php
include('koneksi.php');
include('data4.php');

$Datajson = json_decode($jsonKategori, TRUE);
$query = mysqli_query($koneksi,"SELECT t.bulan as bulan,
       sum(fp.amount) as pendapatan, count(fp.customer_id) as jumlah_order
    FROM film f, fakta_pendapatan fp, time t
WHERE (f.film_id = fp.film_id) AND (t.time_id = fp.time_id)
GROUP BY bulan");


$row = 	$query->fetch_all();

?>

<html>
<head>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link rel="stylesheet" href="/drilldown.css"
    <head>
		
        <meta charset="utf-8" />
        <title>Tifus Expert System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="assets/images/logo_eis.png" alt="" height="50">
                        </span>
                        <i>
                            <img src="assets/images/logo_eis.png" alt="" height="28">
                        </i>
                    </a>
                </div>
           	 <nav class="navbar-custom">  
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                     </ul>
                </nav>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Navigation</li>
                            
                                 <li><a href="dashboard1.php"><i class="fi-clock"></i> <span>Dashboard</span> </a></li>
							 <li><a href="dashboard2.php"><i class="fi-clock"></i> <span>Dashboard 2</span> </a></li>
							 <li><a href="dashboard3.php"><i class="fi-clock"></i> <span>Dashboard 3</span> </a></li>
                            
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
           <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Tabs</h4>

                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Adminox</a></li>
                                        <li class="breadcrumb-item"><a href="#">UI Kit</a></li>
                                        <li class="breadcrumb-item active">Tabs</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        

                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Laporan Bulanan</h4>

                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Febuari
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                Mei
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Juni
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Juli
                                            </a>
                                        </li>
										 <li class="nav-item">
                                            <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Agustus
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="home1">
										
                                            <h2 class="font-300">Total Amount  : <span><i class="mdi mdi-cash"></i></span> <span data-plugin="counterup"><?=$row[0][1]?></span></h2>
											<h2 class="font-300">Total Transaksi  : <span><i class="mdi mdi-transfer"></i></span> <span data-plugin="counterup"><?=$row[0][2]?></span></h2>
                                        </div>
                                        <div class="tab-pane show active" id="profile1">
                                            <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?=$row[1][1]?></span></h2>
                                        </div>
                                        <div class="tab-pane" id="messages1">
                                            <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?=$row[2][1]?></span></h2>
                                        </div>
                                        <div class="tab-pane" id="settings1">
                                          <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?=$row[3][1]?></span></h2>
                                        </div>
										   <div class="tab-pane" id="settings1">
                                          <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?=$row[4][1]?></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


<?php include('drilldown4.php');?>
					<div></div>				

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2017 - 2018 © Adminox. - Coderthemes.com
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        

                <footer class="footer text-right">
                    2017 - 2018 © Adminox. - Coderthemes.com
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


     
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <!-- Counter js  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--C3 Chart-->
        <script type="text/javascript" src="../plugins/d3/d3.min.js"></script>
        <script type="text/javascript" src="../plugins/c3/c3.min.js"></script>

        <!--Echart Chart-->
        <script src="../plugins/echart/echarts-all.js"></script>

        <!-- Dashboard init -->

			
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>




