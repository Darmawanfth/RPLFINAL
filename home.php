<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>HOME | Terranova System V1.1 #Beta</title>
        <meta name="author" content="Techno Line Indonesia">
        
        <!-- ##### -->
        <!-- Fonts -->
        <!-- ##### -->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <!-- ################## -->
        <!-- Global stylesheets -->
        <!-- ################## -->
        <link href="<?php echo base_url();?>assets/bower_components/Materialize/dist/css/materialize.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/bower_components/code-prettify/src/prettify.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/admin.css" rel="stylesheet" type="text/css" />
        <!-- ################# -->
        <!-- Theme stylesheets -->
        <!-- ################# -->
        <link href="<?php echo base_url();?>assets/css/themes/light.css" id="ssThemeColor" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/themes/main/materialize-red.css" id="ssMainColor" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/themes/alternative/red.css" id="ssAlternativeColor" rel="stylesheet" type="text/css" />
        <!-- ################ -->
        <!-- Page stylesheets -->
        <!-- ################ -->
        <link href="<?php echo base_url();?>assets/css/pages/dashboard.css" rel="stylesheet" type="text/css" />
        <!-- ##### -->
        <!-- Icons -->
        <!-- ##### -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/logo.png">
		
		<script src="<?php echo base_url();?>assets/chart/dist/Chart.bundle.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<style>
			canvas {
				-moz-user-select: none;
				-webkit-user-select: none;
				-ms-user-select: none;
			}
		</style>
    </head>

    <body>
        <!-- #### -->
        <!-- Menu -->
        <!-- #### -->
        <nav>
            <div class="row">
                <div class="col s12">
                    <!-- ############ -->
                    <!-- Desktop Menu -->
                    <!-- ############ -->
                    <div class="nav-wrapper">
                        <a class="brand-logo">
                            <img src="<?php echo base_url();?>assets/img/logo.png"/>
                            <span class="valign">
                                <b class="main-text">TerraNova</b> System V 1.1 <b class="main-text">BETA</b>
                            </span>
                        </a>

                        <!-- Desktop -->
                        <ul class="right hide-on-med-and-down">
                            
							<li class="active"><a href="<?php echo site_url('domino');?>">Dashboard</a></li>
							
							<li><a href="<?php echo site_url('domino/room_list');?>">Room</a></li>
							
							<li><a href="<?php echo site_url('domino/reservasi');?>">Data Reservasi</a></li>
							
							<li><a href="<?php echo site_url('domino/checkout');?>">Guests Book</a></li>
							
							<li><a href="<?php echo site_url('domino/history');?>">History</a></li>

							<li class="profile ">
                                <a class="dropdown-button" href="#!" data-activates="dropdown-profile" data-constrainwidth="false" data-beloworigin="true" data-alignment="right">
                                    <div class="valign-wrapper">
                                        <img src="<?php echo base_url();?>assets/img/profile.png" alt="My profile" class="circle responsive-img margin-right-10">
                                        <?php echo $this->bitauth->fullname;?>
                                        <i class="material-icons dropdown-icon right">arrow_drop_down</i>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <!-- Dropdowns -->
                        <ul id="dropdown-profile" class="dropdown-content">
                            <li><a href="<?php echo site_url('domino/logout');?>">Logout</a></li>
                        </ul>

                        <!-- Mobile -->
                        <a href="#" data-activates="mobile-demo" class="button-collapse">
                            <i class="material-icons">menu</i>
                        </a>
                    </div>


                    <!-- ########### -->
                    <!-- Mobile Menu -->
                    <!-- ########### -->
                    <ul class="side-nav" id="mobile-demo">
                        <li class="logo">
                            <img src="<?php echo base_url();?>assets/img/logo.png"/>
                            <p>
                                <b class="main-text">TerraNova</b> System V 1.1 <b class="main-text">BETA</b>
                            </p>
                        </li>

                        <li>
                            <a href="<?php echo site_url('domino/logout');?>" class="waves-effect">Logout</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>


        <!-- ####### -->
        <!-- Content -->
        <!-- ####### -->
        <main>
            <div class="main-content no-gutter">
                <!-- #### -->
                <!-- Body -->
                <!-- #### -->
				<section id="dashboard">
					<!-- ########### -->
					<!-- Stats panel -->
					<!-- ########### -->
					<div class="row">
						<div class="col s12 m4">
							<div id="boxSalesPerDay" class="panel panel-stats main lighten-1 white-text z-depth-1">
								<div class="panel-header">
									<div class="title">
										Data Reservasi
									</div>
									<br/>
									<div class="subtitle">
										<i class="material-icons">schedule</i> Latest Update : <?php echo date("l jS \of F Y h:i:s A");?>
									</div>
									<br/>
								</div>

								<div class="panel-footer valign-wrapper">
									<div class="col s6 valign center-align bordered">
										<div class="value">
											<?php
												include "config/connect.php";
												$bulan = date("m");
												$y = date("Y");
												$sql = "select count(id_kamar) as total from reservasi where DATE_FORMAT(booking_date,'%m') = '$bulan' and YEAR(booking_date) = '$y' and status = 'Booked'";
												$query = mysqli_query($link,$sql);
												$data=mysqli_fetch_array($query);
												echo $data['total'];
											?>
										</div>
										<div class="description">Monthly Total</div>
									</div>

									<div class="col s6 valign center-align">
										<div class="value">
											<?php
												$hari = date("d");
												$sql = "select count(id_kamar) as total from reservasi where DATE_FORMAT(booking_date,'%m') = '$bulan' and DATE_FORMAT(booking_date,'%d') = '$hari' and YEAR(booking_date) = '$y' and status = 'Booked'";
												$query = mysqli_query($link,$sql);
												$data=mysqli_fetch_array($query);
												echo $data['total'];
											?>
										</div>
										<div class="description">Today total</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col s12 m4">
							<div id="boxCustomersPerDay" class="panel panel-stats alternative lighten-1 white-text z-depth-1">
								<div class="panel-header">
									<div class="title">
										Data Reservasi Gagal
									</div>
									<br/>
									<div class="subtitle">
										<i class="material-icons">schedule</i> Latest Update : <?php echo date("l jS \of F Y h:i:s A");?>
									</div>
									<br/>
									
								</div>

								<div class="panel-footer valign-wrapper">
									<div class="col s6 valign center-align bordered">
										<div class="value">
											<?php
												include "config/connect.php";
												$id = $this->bitauth->user_id;
												$bulan = date("m");
												$sql = "select count(id_kamar) as total from reservasi where DATE_FORMAT(booking_date,'%m') = '$bulan' and YEAR(booking_date) = '$y' and status = 'Cancel'";
												$query = mysqli_query($link,$sql);
												$data=mysqli_fetch_array($query);
												echo $data['total'];
											?>
										</div>
										<div class="description">Monthly Total</div>
									</div>

									<div class="col s6 valign center-align">
										<div class="value">
											<?php
												$hari = date("d");
												$sql = "select count(id_kamar) as total from reservasi where DATE_FORMAT(booking_date,'%m') = '$bulan' and DATE_FORMAT(booking_date,'%d') = '$hari' and YEAR(booking_date) = '$y' and status = 'Cancel'";
												$query = mysqli_query($link,$sql);
												$data=mysqli_fetch_array($query);
												echo $data['total'];
											?>
										</div>
										<div class="description">Today total</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col s12 m4">
							<div id="boxNewsletterSignups" class="panel panel-stats blue-grey lighten-1 white-text z-depth-1">
								<div class="panel-header">
									<div class="title">
										Data Tamu
									</div>
									<br/>
									<div class="subtitle">
										<i class="material-icons">schedule</i> Latest Update : <?php echo date("l jS \of F Y h:i:s A");?>
									</div>
									<br/>
								</div>
								
								<div class="panel-footer valign-wrapper">
									<div class="col s6 valign center-align bordered">
										<div class="value">
											<?php
												include "config/connect.php";
												$id = $this->bitauth->user_id;
												$bulan = date("m");
												$sql = "select count(id_kamar) as total from reservasi where DATE_FORMAT(booking_date,'%m') = '$bulan' and YEAR(booking_date) = '$y' and status = 'Reserved'";
												$query = mysqli_query($link,$sql);
												$data=mysqli_fetch_array($query);
												echo $data['total'];
											?>
										</div>
										<div class="description">Monthly Total</div>
									</div>

									<div class="col s6 valign center-align">
										<div class="value">
											<?php
												$hari = date("d");
												$bulan = date("m");
												$sql = "select count(id_kamar) as total from reservasi where DATE_FORMAT(booking_date,'%m') = '$bulan' and DATE_FORMAT(booking_date,'%d') = '$hari' and YEAR(booking_date) = '$y' and status = 'Reserved'";
												$query = mysqli_query($link,$sql);
												$data=mysqli_fetch_array($query);
												echo $data['total'];
											?>
										</div>
										<div class="description">Today total</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<!-- ########### -->
						<!-- Total sales -->
						<!-- ########### -->
						<div class="col s12 m6">
							<div id="boxTotalSales" class="panel panel-bordered panel-dashboard panel-bar-chart z-depth-1">
								<div class="panel-header">
									<div class="title">
										Laporan Transaksi Tahunan
									</div>
								</div>

								<div class="panel-body">
									<div style="width:100%;">
										<canvas id="canvas"></canvas>
									</div>
									<script>
										var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
										var randomScalingFactor = function() {
											return Math.round(Math.random() * 100 * (Math.random() > 0.5 ? -1 : 1));
										};
										var randomColorFactor = function() {
											return Math.round(Math.random() * 255);
										};
										var randomColor = function(opacity) {
											return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
										};

										var config = {
											type: 'line',
											data: {
												labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
												datasets: [{
													label: "Deluxe Room",
													data: [
														<?php
															for($a = 1; $a<= 12; $a++){
															$sql   = "select MONTH(booking_date)as bulan, count(id_kamar) as nilai from reservasi where MONTH(booking_date) = '$a' and YEAR(booking_date) = '$y' and status = 'Checkout' and id_kamar = '1' group by DATE_FORMAT(booking_date,'%m')";
															$query = mysqli_query($link,$sql);
															$data  = mysqli_fetch_array($query);
																if(!empty($data)){
																	echo $data['nilai'].',';
																}else{
																	echo '0,';
																}
															}
														?>
														],
													fill: false,
													borderDash: [5, 5],
												}, {
													label: "Deluxe River View",
													data: [
															<?php
																for($a = 1; $a<= 12; $a++){
																$sql   = "select MONTH(booking_date)as bulan, count(id_kamar) as nilai from reservasi where MONTH(booking_date) = '$a' and YEAR(booking_date) = '$y' and status = 'Checkout' and id_kamar = '2' group by DATE_FORMAT(booking_date,'%m')";
																$query = mysqli_query($link,$sql);
																$data  = mysqli_fetch_array($query);
																	if(!empty($data)){
																		echo $data['nilai'].',';
																	}else{
																		echo '0,';
																	}
																}
															?>
															],
													fill: false,
													borderDash: [5, 5],
												}, {
													label: "Family Suite",
													data: [
															<?php
																for($a = 1; $a<= 12; $a++){
																$sql   = "select MONTH(booking_date)as bulan, count(id_kamar) as nilai from reservasi where MONTH(booking_date) = '$a' and YEAR(booking_date) = '$y' and status = 'Checkout' and id_kamar = '3' group by DATE_FORMAT(booking_date,'%m')";
																$query = mysqli_query($link,$sql);
																$data  = mysqli_fetch_array($query);
																	if(!empty($data)){
																		echo $data['nilai'].',';
																	}else{
																		echo '0,';
																	}
																}
															?>
															],
													fill: false,
													borderDash: [5, 5],
												}, {
													label: "Family River View",
													data: [
															<?php
																for($a = 1; $a<= 12; $a++){
																$sql   = "select MONTH(booking_date)as bulan, count(id_kamar) as nilai from reservasi where MONTH(booking_date) = '$a' and YEAR(booking_date) = '$y' and status = 'Checkout' and id_kamar = '4' group by DATE_FORMAT(booking_date,'%m')";
																$query = mysqli_query($link,$sql);
																$data  = mysqli_fetch_array($query);
																	if(!empty($data)){
																		echo $data['nilai'].',';
																	}else{
																		echo '0,';
																	}
																}
															?>
															],
													fill: false,
													borderDash: [5, 5],
												}, {
													label: "d'riam Suite",
													data: [
															<?php
																for($a = 1; $a<= 12; $a++){
																$sql   = "select MONTH(booking_date)as bulan, count(id_kamar) as nilai from reservasi where MONTH(booking_date) = '$a' and YEAR(booking_date) = '$y' and status = 'Checkout' and id_kamar = '5' group by DATE_FORMAT(booking_date,'%m')";
																$query = mysqli_query($link,$sql);
																$data  = mysqli_fetch_array($query);
																	if(!empty($data)){
																		echo $data['nilai'].',';
																	}else{
																		echo '0,';
																	}
																}
															?>
															],
													fill: false,
													borderDash: [5, 5],
												}]
											},
											options: {
												responsive: true,
												legend: {
													position: 'bottom',
												},
												hover: {
													mode: 'label'
												},
												scales: {
													xAxes: [{
														display: true,
														scaleLabel: {
															display: true,
															labelString: 'Month'
														}
													}],
													yAxes: [{
														display: true,
														scaleLabel: {
															display: true,
															labelString: 'Jumlah Tamu'
														}
													}]
												},
												title: {
													display: false,
													text: 'Data Transaksi - Tahunan'
												}
											}
										};

										$.each(config.data.datasets, function(i, dataset) {
											var background = randomColor(0.5);
											dataset.borderColor = background;
											dataset.backgroundColor = background;
											dataset.pointBorderColor = background;
											dataset.pointBackgroundColor = background;
											dataset.pointBorderWidth = 1;
										});

										window.onload = function() {
											var ctx = document.getElementById("canvas").getContext("2d");
											window.myLine = new Chart(ctx, config);
										};

									</script>
								</div>
							</div>
						</div>


						<!-- ############# -->
						<!-- Recent Orders -->
						<!-- ############# -->
						<div class="col s12 m6">
							<div id="boxRecentOrders" class="panel panel-bordered panel-dashboard panel-table z-depth-1">
								<div class="panel-header">
									<div class="title">
										Recent Orders
									</div>
									<div class="subtitle">
										Overview of the last orders 
									</div>

								</div>

								<div class="panel-body">
									<table class="table highlight">
										<thead>
											<tr>
												<th>No</th>
												<th>Name</th>
												<th class="hide-on-small-only">Booking Date</th>
												<th>Room</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$sql = "SELECT * FROM  reservasi order by booking_date DESC limit 0,7";
												$query = mysqli_query($link,$sql);
												$no = 0;
												while($data=mysqli_fetch_array($query))
												{
													$no++;
											?>
											<tr>
												<td><?php echo $no;?></td>
												<td>
													<?php
														$tamu 	= $data['id_tamu'];
														$sl 	= "SELECT * FROM  tamu where id_tamu = '$tamu'";
														$qu 	= mysqli_query($link,$sl);
														$dat	= mysqli_fetch_array($qu);
														echo $dat['first_name']." ";
														echo $dat['last_name'];;
													?>
												</td>
												<td class="hide-on-small-only"><?php echo $data['booking_date'];?></td>
												<td>
													<?php
														$room 	= $data['id_kamar'];
														$s	 	= "SELECT * FROM tipe_kamar where tipe_kamar = '$room'";
														$que 	= mysqli_query($link,$s);
														$dt		= mysqli_fetch_array($que);
														echo $dt['nama_tipe'];;
													?>
												</td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
				</section>
            </div>
        </main>


        <!-- ################## -->
        <!-- Global javascripts -->
        <!-- ################## -->
        <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/bower_components/Materialize/dist/js/materialize.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/bower_components/code-prettify/src/prettify.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/admin.js" type="text/javascript"></script>
        <!-- ################ -->
        <!-- Page javascripts -->
        <!-- ################ -->
        <script src="<?php echo base_url();?>assets/bower_components/amcharts3/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/bower_components/amcharts3/amcharts/serial.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/bower_components/amcharts3/amcharts/gauge.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/bower_components/amcharts3/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/bower_components/slimscroll/jquery.slimscroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/js/pages/dashboard.js" type="text/javascript"></script>
        
    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs2.uzone.id/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582ECSaLdwqSpnTbv6FFp1ZJpBnT58aiJzEnlci2n%2b5c%2bf%2fVtMaM4b6W%2fta1LrNYpY6gdbYqLc0hj0Hay8S2ZrflRBDmN7WDn3sS8wARQpGh8yM9%2f3F2ecfeHSx78NUCAayiGlwQAXrOWAaVcobkXQd6QCh8eVuLpEPcWObteYSG%2blSyI%2bUuthvczAOpLS6qJ%2bWQUsQOHrNnHu3nCiEOOUSwaknL706lE041yBcYkKiz7xkxtZbIBoBbqyoui48X0fZYaieMhAJxW03kVuR0EoQ9OMD4FEo%2fydrzLHkdeYoqR3Z5uvmQc5ojn6PdipvipkR%2bofBjp%2f46iylInlxIAtwBC9lWSkTOEQGmmhnGBBOubNcu79XF3wrp9h%2bPGfiyfCHGqoO5hfIdbg%2fYb2Ndu%2bOlOkIR8CXB5bb%2biZMCLjFFNElyG59XMq05fEifipQkn80immmhY74QOUKMHx8mSKTXa6MlDCxLAhdPN4SztKI7aH" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

</html>