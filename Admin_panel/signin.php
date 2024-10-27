<?php
session_start();
include_once "../config.php";
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Admin Dashboard</title>
</head>

<body class="bg-theme bg-theme2">
	<!--wrapper-->
	<div class="wrapper">
		<header class="login-header shadow">
			<nav class="navbar navbar-expand-lg navbar-light bg-dark rounded fixed-top rounded-0 shadow-sm">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">
						<img src="assets/images/logo-img.png" width="140" alt="" />
					</a>
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-6">
						<li class="nav-item"> <a class="nav-link text-white" aria-current="page" href="#"><i class='bx bx-home-alt me-1'></i>Home</a>
						</li>
					</ul>
				</div>
	</div>
	</nav>
	</header>
	<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-4">
		<div class="container-fluid">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
				<div class="col mx-auto">
					<div class="card mt-5 mt-lg-0">
						<div class="card-body">
							<div class="border p-4 rounded">
								<div class="text-center">
									<h3 class="">Sign in</h3>
								</div>
								<div class="container-fluid mt-4 p-0 error">

								</div>

								<hr>
								<div class="form-body">
									<form class="row g-3">
										<div class="col-12">
											<label for="inputEmailAddress" class="form-label">Email Address</label>
											<input type="email" class="form-control" id="inputEmailAddress" placeholder="Email Address" name="email">
										</div>
										<div class="col-12">
											<label for="inputChoosePassword" class="form-label">Enter Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" name="password"> <a class="input-group-text" onclick="showPassword()"><i class='bx bx-show pass_eye'></i></a>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
												<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
											</div>
										</div>
										<div class="col-md-6 text-end"> <a href="authentication-forgot-password.html">Forgot Password ?</a>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-light" name="login" id="login"><i class="bx bxs-lock-open"></i>Sign in</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end row-->
		</div>
	</div>
	<footer class="bg-dark shadow-sm p-2 text-center fixed-bottom">
		<p class="mb-0 text-white">Copyright © 2024. All right reserved.</p>
	</footer>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script>
		function showPassword() {
			var x = document.querySelector("#inputChoosePassword");
			var y = document.querySelector(".pass_eye");
			if (x.type === "password") {
				x.type = "text";
				y.classList.remove("bx-show");
				y.classList.add("bx-hide");
			} else {
				x.type = "password";
				y.classList.remove("bx-hide");
				y.classList.add("bx-show");
			}
		}
	</script>
	<script>
		$(document).ready(function() {
			$("#login").click(function() {
				// prevent the form from submitting
				event.preventDefault();
				$email = $("#inputEmailAddress").val();
				$password = $("#inputChoosePassword").val();
				if ($email == "" || $password == "") {
					$(".error").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Fill Out All Fields</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else if (!(/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/).test($email)) {
					$(".error").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Email Incorrect</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else if ($password.length < 8) {
					$(".error").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Password Should Be 8 Characters</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else {

					$.ajax({
						url: "code.php",
						type: "POST",
						data: {
							admin_email: $email,
							admin_password: $password
						},
						success: function(data) {
							if (data == "failed") {
								$(".error").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Email or Password Incorrect</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
							} else {
								$(".error").html(data);
								setTimeout(function() {
									location.assign("index.php");
								}, 1500);
							}
						}
					});
				}

			})
		})
	</script>
</body>

</html>