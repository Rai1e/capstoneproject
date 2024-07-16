<!DOCTYPE html>
<?php
	session_start();
	
	require_once'admin/class.php';
	
	$db = new db_class();
	
	if(!ISSET($_SESSION['user_id'])){
		echo"<script>window.location='index.php'</script>";
	}

?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BarangayWatch</title>
    <!-- Custom fonts for this template-->
    <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-text mx-2">BarangayWatch</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="report.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Report</span></a>
            </li>
			
				<!-- Divider -->
            <hr class="sidebar-divider my-0">
			
			<li class="nav-item active">
              <a class="nav-link" href="report_status.php">
                  <i class="fas fa-fw fa-calendar"></i>
                  <span>Report Status</span></a>
            </li>
			
			 <!-- Divider -->
            <hr class="sidebar-divider my-0">
	
			
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="news.php">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>News</span></a>
            </li>
			 <!-- Divider -->
            <hr class="sidebar-divider my-0">
			
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="feedback.php">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Feedback</span></a>
            </li>
			
			
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
								<?php
									$getUser=$db->getUser($_SESSION['user_id']);
									
									echo $getUser['firstname']." ".$getUser['lastname'];
								?>
								</span>
                                <img class="img-profile rounded-circle" src="img/user.png" width="25" height="25" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="settings.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="activity_log.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Report Status</h1>
					<div class="card mt-1 mb-1">
						<div class="card-body">
							<?php
								if(ISSET($_GET['report_no']) && $_GET['report_no'] != null){
									$tbl_report=$db->displaySingleReport($_GET['report_no']);
									$fetch=$tbl_report->fetch_array();
							?>
								<div class="row">
									<div class="col-lg-12">
										<small class="float-left;">Ticket no: <span class="text-primary"><?php echo $fetch['ticket_no']?></span></small>
							
										<small class="float-right">Status:
										<span>
										<?php
											switch($fetch['status_report']){
												case "Reviewing":
													echo "<small class='bg-dark text-white p-1 rounded'>".$fetch['status_report']."</small>";
													break;
													
												case "Onhold":
													echo "<small class='bg-warning text-light p-1 rounded'>".$fetch['status_report']."</small>";
													break;	
													
												case "Rejected":
													echo "<small class='bg-danger text-light p-1 rounded'>".$fetch['status_report']."</small>";
													break;
													
												case "Resolved":
													echo "<small class='bg-success text-light p-1 rounded'>".$fetch['status_report']."</small>";
													break;
													
												default:
													echo "No Data Found";
											}	
										?>
										</span>
										</small>
									</div>	
								</div>	
								<hr />
								<div class="row">
									<div class="col-lg-12">
										<h5>Subject:</h5>
										<div class="border rounded p-2"><?php echo $fetch['subject']?></div>
									</div>
								
									<div class="col-lg-12 mt-2">
										<h5>Message:</h5>
										<div class="border rounded p-2"><?php echo $fetch['message']?></div>
									</div>
									
									<div class="col-lg-12 mt-2">
										<h5>Report Category:</h5>
										<p class="rounded bg-primary text-light p-2"><?php echo $fetch['report_category']?></p>
									</div>
									
									<div class="col-lg-12 mt-2">
										<h5>Address:</h5>
										<p class="rounded bg-success text-light p-2">Report Category: <?php echo $fetch['address']?></p>
									</div>
									
									
									<div class="col-lg-12 mt-2">
										<h5>Submitted File:</h5>
										
										<?php
											$file_count = $db->countImage($fetch['ticket_no']);
											if($file_count == 1){
												$tbl_file = $db->displayImage($fetch['ticket_no']);
												$row=$tbl_file->fetch_array();
												
												echo "<img src='user_files/".$row['user_id']."/".$row['ticket_no']."/".$row['file_name']."' alt='' width='100%' style='height:200px;' class='rounded'/>";
											}else{
												
											
										?>
											<div id="demo" class="carousel slide" data-interval="false" data-ride="carousel">
	
											<!-- Indicators -->
												<ul class="carousel-indicators">
													<?php
														
														for($i=0; $file_count>$i; $i++){
															if($i == 0){
																echo "<li data-target='#demo' data-slide-to='".$i."' class='active'></li>";
																continue;
															}
															
															echo "<li data-target='#demo' data-slide-to='".$i."'></li>";
														}
													?>
												</ul>
											
												<!-- The slideshow -->
												<div class="carousel-inner">
													<?php
														$tbl_file = $db->displayImage($fetch['ticket_no']);
														
														
														$row=$tbl_file->fetch_array();
														echo "<div class='carousel-item active'>";
														echo "<img src='user_files/".$row['user_id']."/".$row['ticket_no']."/".$row['file_name']."' alt='' width='100%' style='height:200px;' class='rounded'/>";
														echo "</div>";
														
														while($row=$tbl_file->fetch_assoc()){
															echo "<div class='carousel-item'>";
															echo "<img src='user_files/".$row['user_id']."/".$row['ticket_no']."/".$row['file_name']."' alt='' width='100%' style='height:200px;' class='rounded'/>";
															echo "</div>";	
														}
													?>	
												</div>
										
												<!-- Left and right controls -->
												<a class="carousel-control-prev" href="#demo" data-slide="prev">
													<span class="carousel-control-prev-icon"></span>
												</a>
												<a class="carousel-control-next" href="#demo" data-slide="next">
													<span class="carousel-control-next-icon"></span>
												</a>
											</div>
										<?php
											}
										?>
									</div>
									<div class="col-lg-12 mt-3 text-center">
											<small>Date Submitted: <?php echo date("M d, Y - h: i A", strtotime($fetch['date']))?></small>
									</div>
								</div>
							<?php
								
								}else{
									echo "<h2>No Data Found</h2>";
								}
							?>
							
						</div>
					</div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BarangayWatch 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>
</body>

</html>