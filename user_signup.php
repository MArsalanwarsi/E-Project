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
	<title>Sign UP</title>
</head>

<body class="bg-theme bg-theme1">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0 py-5">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto ">
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign Up</h3>
										<p>Already have an account? <a href="user_signin.php">Sign in here</a>
										</p>
									</div>
									<div class="d-grid">
										<a class="btn my-4 shadow-sm btn-light" href="<?= $url; ?>"> <span class="d-flex justify-content-center align-items-center">
												<img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
												<span>Sign Up with Google</span>
											</span>
										</a>
									</div>
									<div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
										<hr />
									</div>
									<div class="errors_ajax"></div>
									<div class="form-body">
										<form class="row g-3" id="signup_form">
											<div class="col-12">
												<label for="inputFirstName" class="form-label">Full Name</label>
												<input type="text" class="form-control" id="inputFullName" placeholder="Enter Full Name">
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password"> <a onclick="showPassword()" class="input-group-text bg-transparent "><i class='bx bx-show pass_eye'></i></a>
												</div>
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="button" class="btn btn-light" id="signup_btn"><i class='bx bx-user'></i>Sign up</button>
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
			$('#signup_btn').click(function() {
				$name = $('#inputFullName').val();
				$email = $('#inputEmailAddress').val();
				$password = $('#inputChoosePassword').val();
				if ($name == "" || $email == "" || $password == "") {
					$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Fill Out All Fields</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else if (!(/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/).test($email)) {
					$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Email Incorrect</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else if ($password.length < 8) {
					$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Password Should Be 8 Characters</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else if ($("#flexSwitchCheckChecked").prop("checked") == false) {
					$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Please Accept Terms & Conditions</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else {

					$.ajax({
						type: "POST",
						url: "code.php",
						data: {
							signup_name: $name,
							signup_email: $email,
							signup_password: $password
						},
						success: function(data) {
							if (data == "exists") {
								$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Email Already Exists</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
							} else if (data == "failed") {
								$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Sign Up Failed. Plaease Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
							} else if (data == "success") {
								$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Sign Up Successfull</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
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