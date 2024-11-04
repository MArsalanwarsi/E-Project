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

						<h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
						<p class="">Enter your registered email ID to reset the password</p>
						<div class="my-4">
							<label class="form-label">Email id</label>
							<input type="text" class="form-control form-control-lg" placeholder="example@user.com" id="email" />
						</div>
						<div class="d-grid gap-2">
							<button type="button" class="btn btn-light btn-lg" id="send_email">Send</button> <a href="user_signin.php" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
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
			$('#send_email').click(function() {
				var email = $('#email').val();
				if (email == '') {
					$('.errors_ajax').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Enter Email First</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
				} else if (!(/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/).test(email)) {
					$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Please Enter Correct Email</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				} else {
					$("#send_email").attr("disabled", true);
					$("#send_email").html("Sending...");
					$.ajax({
						type: "POST",
						url: "code.php",
						data: {
							forgot_email: email
						},
						success: function(data) {
							if (data == "Success") {
								$("#send_email").html("Send");
								$(".errors_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>OTP Send Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
								setTimeout(function() {
									location.assign("user_forgot_OTP.php");
								}, 2000);
							} else {
								$("#send_email").attr("disabled", false);
								$("#send_email").html("Send");
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