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
            <li class="nav-item active">
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
			
			<li class="nav-item">
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
                    <h1 class="h3 mb-4 text-gray-800">DASHBOARD</h1>
					<div class="row">
						<div class="col-lg-12 mb-5">
							<h5 class="float-right">Welcome: <?php echo $getUser['firstname']." ".$getUser['lastname'];?></h5>
						</div>
						<div class="col-xl-6 col-md-12 mb-4">
							<a href="report_status.php" style="color:inherit; text-decoration:none;">
								<div class="card bg-light text-gray-800">
									<div class="card-body">
										<div class="d-flex justify-content-between p-md-1">
										<div class="d-flex flex-row">
											<div>
											<h4>Monthly Report</h4>
											</div>
										</div>
										<div class="align-self-center">
											<h2 class="h1 mb-0">20</h2>
										</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-xl-6 col-md-12 mb-4">
							<a href="report_status.php" style="color:inherit; text-decoration:none;">
								<div class="card bg-success text-white">
									<div class="card-body">
										<div class="d-flex justify-content-between p-md-1">
										<div class="d-flex flex-row">
											<div>
											<h4>Total Resolved Report</h4>
											</div>
										</div>
										<div class="align-self-center">
											<h2 class="h1 mb-0">20</h2>
										</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-xl-6 col-md-12 mb-4">
							<a href="report_status.php" style="color:inherit; text-decoration:none;">
								<div class="card bg-danger text-white">
									<div class="card-body">
										<div class="d-flex justify-content-between p-md-1">
										<div class="d-flex flex-row">
											<div>
											<h4>Total Rejected Report</h4>
											</div>
										</div>
										<div class="align-self-center">
											<h2 class="h1 mb-0">20</h2>
										</div>
										</div>
									</div>
								</div>
							</a>
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