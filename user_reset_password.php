<?php
session_start();
include 'config.php';
$main = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT * FROM website WHERE id = '1'"));
?>

<!DOCTYPE html>
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
	<title>Forget Password</title>
</head>

<body class="bg-theme bg-theme1">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card">
						<div class="row g-0">
							<div class="col-lg-5 border-end">
								<div class="card-body">
									<div class="p-5">
									<div class="errors_ajax">

									</div>
										<h4 class="mt-5 font-weight-bold">Genrate New Password</h4>
										<p class="">We received your reset password request. Please enter your new password!</p>
										<div class="mb-3 mt-5">
											<label class="form-label">New Password</label>
											<input type="text" class="form-control" placeholder="Enter new password" id="password"/>
										</div>
										<div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input type="text" class="form-control" placeholder="Confirm password" id="confirm_password"/>
										</div>
										<div class="d-grid gap-2">
											<button type="button" class="btn btn-light" id="change_password">Change Password</button> <a href="user_signin.php" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<img src="assets/images/login-images/forgot-password-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->



	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#change_password').click(function() {
				var password = $('#password').val();
				var confirm_password = $('#confirm_password').val();
				if (password == '' || confirm_password == '') {
					$('.errors_ajax').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Both Fields Are Required</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
				} else if (password.length < 8) {
					$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Paassword Should Be 8 Characters</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				}else  if(password!=confirm_password){
					$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Paassword And Confirm Password Should Be Same</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else {
					$("#change_password").attr("disabled", true);
					$("#change_password").html("Changing...");
					$.ajax({
						type: "POST",
						url: "code.php",
						data: {
							change_password: password
						},
						success: function(data) {
							if (data == "Success") {
								$("#change_password").html("Change Password");
								$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Paassword Changed Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
								setTimeout(function() {
									location.assign("user_signin.php");
								}, 2000);
							} else {
								$("#change_password").attr("disabled", false);
								$("#change_password").html("Change Password");
								$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>" + data + "</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
							}
						}
					});
				}
			});
		});
	</script>
</body>

</html>