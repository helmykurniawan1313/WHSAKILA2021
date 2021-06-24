<!DOCTYPE html>

<?php
include('koneksi.php');
include('data4.php');
$Datajson = json_decode($jsonKategori, TRUE);
$query = mysqli_query($koneksi,"select count(distinct(customer_id)) as Jumlah_Customer, count(distinct(film_id)) as Jumlah_Film, sum(lamapinjam) as lamapinjam, sum(time_id) as time_id, sum(amount) as amount, count(amount) as Jumlah_Transaksi from fakta_pendapatan");
$query2 = mysqli_query($koneksi,"SELECT t.bulan as bulan,sum(fp.amount) as pendapatan FROM film f, fakta_pendapatan fp, time t WHERE (f.film_id = fp.film_id) AND (t.time_id = fp.time_id) GROUP BY bulan");

$row = 	$query->fetch_array();
$row2 = 	$query2->fetch_array();
var_dump($row2);
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
							<li><a href="dashboard4.php"><i class="fi-clock"></i> <span>Dashboard 4</span> </a></li>
                            
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
          <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Dashboard</h4>

                               

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">

                            <div class="col-xl-3 col-sm-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-currency-usd widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Pendapatan</p>
                                        <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo ($row['amount'])?></span></h2>
                                        <p class="m-0">Jan - Apr 2017</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-account-multiple widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Pembeli</p>
                                        <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo ($row['Jumlah_Customer'])?></span></h2>
                                        <p class="m-0">Jan - Apr 2017</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-crown widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Jumlah Transactions</p>
                                        <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo ($row['Jumlah_Transaksi'])?></span></h2>
                                        <p class="m-0">Jan - Apr 2017</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-auto-fix widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Jumlah Film yang dimiliki</p>
                                        <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo ($row['Jumlah_Film'])?></span></h2>
                                        <p class="m-0">Jan - Apr 2017</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

  						<div class="row">
                            <div class="col-xl-4">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Revenue Comparison</h4>
  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
 		data.addColumn('string', 'Topping');
      	data.addColumn('number', 'Slices');
		  <?php foreach($row2 as $data):?>
		  data.addRows([
			
          [bulan : <?=$data ["bulan"];?>,  pendapatan : <?=$data["pendapatan"];?>],
        
        ]);
		  <?php endforeach;?>
		  console.log(data);
        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>
     </div>
                                </div>
                            </div>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>

                      <div class="row">
                            <div class="col-xl-4">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Revenue Comparison</h4>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

       var data = new google.visualization.DataTable();
 		data.addColumn('string', 'Topping');
      	data.addColumn('number', 'Slices');
		  data.addRows([
			
          ['ALDO',     <?php echo ($row3['Jumlah_Customer'])?>],
          ['KUNAM',      <?php echo ($row3['Jumlah_Film'])?>],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>

                                    <div class="chart-container">
                                        <div class="" style="height:280px" id="platform_type_dates_donut"></div>
										
										
                                    </div>
                                </div>
                            </div>
			  </div>

                            <div class="col-xl-4">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Visitors Overview</h4>

                                    <div class="text-center">
                                        <h5 class="font-normal text-muted">You have to pay</h5>
                                        <h3 class="m-b-30"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-danger"></i> <?php include('drilldown5.php');?> <small>USD</small></h3>
                                    </div>

                                    <div class="chart-container">
                                        <div class="" style="height:280px" id="user_type_bar"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Goal Completion</h4>

                                    <div class="text-center">
                                        <h5 class="font-normal text-muted">You have to pay</h5>
                                        <h3 class="m-b-30"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <?php include('drilldown4.php');?> <small>USD</small></h3>
                                    </div>

                                    <div class="chart-container">
                                        <div class="chart has-fixed-height" style="height:280px" id="page_views_today"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-6 col-lg-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Rangking Pembeli</b></h4>
                                    <p class="text-muted font-14 m-b-20">
                                        Berdasarkan Penjualan
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table table-hover m-0 table-actions-bar">

                                            <thead>
                                            <tr>
                                                
                                                <th>Nama</th>
                                                <th>Amount</th>
                                             
                                            </tr>
                                            </thead>
											
                                            <tbody>
												<?php foreach($Datajson as $Data):?>
									
                                            <tr>
												
                                               

                                                <td>
                                                    <h5 class="m-b-0 m-t-0 font-600"><?=$Data["name"];?></h5>
                                                   
                                                </td>

                                                <td>
                                                    <i class="text-primary"><?=$Data["y"];?></i> 
                                                </td>

                                             

                                            </tr>
											<?php endforeach;?>
                                            
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Total Unique Visitors</h4>

                                    <div class="widget-chart text-center">

                                        <div id="donut-chart" style="height: 270px;"></div>

                                        <div class="row text-center m-t-30">
                                            <div class="col-6">
                                                <h3 data-plugin="counterup">1,507</h3>
                                                <p class="text-muted m-b-5">Visitors Male</p>
                                            </div>
                                            <div class="col-6">
                                                <h3 data-plugin="counterup">854</h3>
                                                <p class="text-muted m-b-5">Visitors Female</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="col-xl-3 col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Number of Transactions</h4>

                                    <div class="widget-chart text-center">

                                        <div id="pie-chart" style="height: 270px;"></div>

                                        <div class="row text-center m-t-30">
                                            <div class="col-6">
                                                <h3 data-plugin="counterup">2,854</h3>
                                                <p class="text-muted m-b-5">Payment Done</p>
                                            </div>
                                            <div class="col-6">
                                                <h3 data-plugin="counterup">22</h3>
                                                <p class="text-muted m-b-5">Payment Due</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

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




