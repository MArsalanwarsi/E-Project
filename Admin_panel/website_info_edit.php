<?php
include 'header.php';
include 'body_start.php';

?>
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Settings</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Website Info</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->
		<div class="container">
			<div class="main-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="alerts"></div>
								<form action="" method="POST" id="info_form">
								<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Name</h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="website_name" class="form-control bg-transparent" value="<?php echo $website['name']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Email</h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="website_email" class="form-control bg-transparent" value="<?php echo $website['email']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Phone</h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="website_phone" class="form-control bg-transparent" value="<?php echo $website['phone']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Address</h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="website_address" class="form-control bg-transparent" value="<?php echo $website['address']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Website</h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="website_link" class="form-control bg-transparent" value="<?php echo $website['website_link']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Facebook</h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="website_facebook" class="form-control bg-transparent" value="<?php echo $website['facebook']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Instagram</h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="website_instagram" class="form-control bg-transparent" value="<?php echo $website['instagram']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Whatsapp</h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="website_whatsapp" class="form-control bg-transparent" value="<?php echo $website['whatsapp']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Info</h6>
										</div>
										<div class="col-sm-9">
											<textarea name="website_info" class="form-control bg-transparent" rows="5"><?php echo $website['info']; ?></textarea>
										</div>
									</div>
									<div class="container-fluid mt-5">
										<div class="float-end">
											<a type="button" id="submit" class="btn btn-outline-danger px-4" style="max-width:200px;">Edit Info</a>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->
<?php
include 'body_end.php';
include 'footer.php';
?>
<script>
	$(document).ready(function() {

		$('#submit').click(function() {
			$form = $('#info_form');
			var formData = new FormData($form[0]);
			$.ajax({

				url: 'code.php',

				type: 'POST',

				data: formData,

				cache: false,

				contentType: false,

				processData: false,

				success: function(data) {
					if (data == "success") {
						$('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Info Updated Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
						setTimeout(function() {
							location.assign("Website_Setting.php");
						}, 2000);
					} else if (data == "failed") {
						$('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Update Info. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
					} else if (data == "missing") {
						$('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Please Fill All Fields</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
					} else {
						alert(data);
					}

				}
			});

		});
	});
</script>