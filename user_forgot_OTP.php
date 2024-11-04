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
	<link rel="icon" href="Iamges/main_images/<?php echo $main['logo']; ?>" type="image/png" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Forgot Password</title>
</head>

<body class="bg-theme bg-theme1">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card forgot-box">
				<div class="card-body">
					<div class="p-4 rounded  border">
						<div class="errors_ajax">

						</div>
						<div class="text-center">
							<img src="assets/images/icons/forgot-2.png" width="120" alt="" />
						</div>

						<h4 class="mt-5 font-weight-bold">OTP</h4>
						<p class="">Enter OTP Send to Your Email</p>

						<div class="my-4">
							<label class="form-label">OTP</label>
							<input type="number" class="form-control form-control-lg" placeholder="Enter 4 Digit OTP" id="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" />
						</div>
						<div class="d-grid gap-2">
							<button type="button" class="btn btn-light btn-lg" id="check_otp">Check OTP</button> <a href="user_signin.php" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
						</div>
						<p class="mt-2 text-center">Only Valid for 5 Minutes</p>
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
			$('#check_otp').click(function() {
				var otp = $('#number').val();
				if (otp == '') {
					$('.errors_ajax').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Enter Email First</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
				} else {
					$("#check_otp").attr("disabled", true);
					$("#check_otp").html("checking...");
					$.ajax({
						type: "POST",
						url: "code.php",
						data: {
							forgot_otp: otp
						},
						success: function(data) {
							if (data == "Success") {
								$("#check_otp").html("Check OTP");
								$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>OTP Verified</h6></h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
								setTimeout(function() {
									location.assign("user_reset_password.php");
								}, 2000);
							} else {
								$("#check_otp").attr("disabled", false);
								$("#check_otp").html("Check OTP");
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