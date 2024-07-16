<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BarangayWatch</title>

    <!-- Custom fonts for this template-->
    <link href="css/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body>

    <div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">
				<img src="img/logo.jpg" width="30" height="30" alt="" style="border-radius:20px;"> BarangayWatch
			</a>
		</nav>
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                                    </div>
                                    <form class="user" method="POST" action="signupQuery.php">
										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="text" class="form-control form-control-user" name="firstname" placeholder="Enter First Name" required="required"/>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control form-control-user" name="lastname" placeholder="Enter Last Name" required="required"/>
											</div>
										</div>
										<div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" placeholder="Enter Email Address" required="required"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Enter Password" required="required"/>
                                        </div>
										<div class="form-group">
                                            <input type="number" class="form-control form-control-user" name="phone_no" placeholder="Enter Phone no" required="required"/>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="register">Register</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p class="small">Already have an account? <a href="index.php">Login here...</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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