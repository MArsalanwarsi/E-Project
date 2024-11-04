<?php
session_start();
include 'config.php';
$main = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT * FROM website WHERE id = '1'"));
require __DIR__ . '/vendor/autoload.php';
$client = new Google\Client;
$client->setClientId("626289507202-0nrt0q9ak03houmipe16e6l9cmhl4h8i.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/Arsalan%20php/E-Project%20Books/redirect.php");
$client->addScope("email");
$client->addScope("profile");
$url = $client->createAuthUrl();
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="Images/main_images/<?php echo $main['logo']; ?>" type="image/png" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Login </title>
</head>

<body class="bg-theme bg-theme1">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
										<p>Don't have an account yet? <a href="user_signup.php">Sign up here</a>
										</p>
									</div>
									<div class="d-grid">
										<a class="btn my-4 shadow-sm btn-light" href="<?= $url; ?>"> <span class="d-flex justify-content-center align-items-center">
												<img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
												<span>Sign in with Google</span>
											</span>
										</a>
									</div>
									<div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
										<hr />
									</div>
									<div class="errors_ajax"></div>
									<div class="form-body">
										<form class="row g-3">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" id="inputEmailAddress" placeholder="Enter Email Address">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password"> <a class="input-group-text bg-transparent" onclick="showPassword()"><i class='bx bx-show pass_eye'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end"> <a href="user_forgot_password.php">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="button" class="btn btn-light signInbtn"><i class="bx bxs-lock-open"></i>Sign in</button>
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
	</div>
	<!--end wrapper-->


	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
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
		$(document).ready(function() {
			$(".signInbtn").click(function() {
				$email = $("#inputEmailAddress").val();
				$password = $("#inputChoosePassword").val();
				if ($email == "" || $password == "") {
					$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Fill Out All Fields</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else if (!(/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/).test($email)) {
					$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Email Incorrect</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else {

					$.ajax({
						type: "POST",
						url: "code.php",
						data: {
							signin_email: $email,
							signin_password: $password
						},
						success: function(data) {
							if (data == "failed") {
								$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Email or Password Incorrect</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
							} else if (data == "success") {
								$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Sign In Successfull</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
								setTimeout(function() {
									location.assign("index.php");
								}, 2000);

							} else {
								alert(data)
							}
						}
					});
				}
			})
		})
	</script>

</body>

</html>