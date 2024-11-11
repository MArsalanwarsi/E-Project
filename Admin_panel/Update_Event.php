<?php
include 'header.php';
include 'body_start.php';
$data = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT * FROM events WHERE id = '" . $_GET['id'] . "'"));
if (!$data) {
	// send to index page
	echo "
		<script>
			window.location.href = 'index.php';
		</script>
	";
	die();
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<style>
	/* Global style */


	.btn-tertiary {
		color: #fff;
		padding: 0;
		line-height: 40px;
		width: 100%;
		margin: auto;
		display: block;
		border: 2px solid #fff;

		&:hover,
		&:focus {
			color: lighten(#fff, 20%);
			border-color: lighten(#fff, 20%);
		}
	}

	/* input file style */

	.input-file,
	.input-file2 {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;

		+.js-labelFile,
		+.js-labelFile2 {
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
			padding: 0 10px;
			cursor: pointer;

			.icon:before {
				content: "\f093";
			}

			&.has-file {
				.icon:before {
					content: "\f00c";
					color: #5AAC7B;
				}
			}
		}
	}
</style>
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Events</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Update Event</li>
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
								<form action="" method="POST" id="event_form">
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Title <span class="text-warning">*</span></h6>
										</div>
										<input type="hidden" name="event_update_id" value="<?php echo $data['id']; ?>">
										<div class="col-sm-9">
											<input type="text" name="update_event_title" class="form-control bg-transparent" value="<?php echo $data['event_title']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Start <span class="text-warning">*</span></h6>
										</div>
										<div class="col-sm-9">
											<input type="datetime-local" class="form-control" name="update_event_start" value="<?php echo $data['event_start']; ?>">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">End <span class="text-warning">*</span></h6>
										</div>
										<div class="col-sm-9">
											<input type="datetime-local" class="form-control" name="update_event_end" value="<?php echo $data['event_end']; ?>">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Requirement #1 <span class="text-warning">*</span></h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="update_event_req1" class="form-control bg-transparent" value="<?php echo $data['event_req1']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Requirement #2 <span class="text-warning">(Optional)</span></h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="update_event_req2" class="form-control bg-transparent" value="<?php echo $data['event_req2']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Requirement #3 <span class="text-warning">(Optional)</span></h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="update_event_req3" class="form-control bg-transparent" value="<?php echo $data['event_req3']; ?>" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Requirement #4 <span class="text-warning">(Optional)</span></h6>
										</div>
										<div class="col-sm-9">
											<input type="text" name="update_event_req4" class="form-control bg-transparent" value="<?php echo $data['event_req4']; ?>" />
										</div>
									</div>
									<?php if ($data['status'] == "finished") {
									?>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">WINNER ANNCOUNCED <span class="text-warning">*</span></h6>
											</div>
											<div class="col-sm-9">
												<!-- yes or no -->
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="update_event_status" id="inlineRadio1" value="announced" <?php if ($data['status'] == "announced"){
														echo "checked";
													} ?>>
													<label class="form-check-label" for="inlineRadio2">YES</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="update_event_status" id="inlineRadio1" value="finished" <?php if ($data['status'] != "announced"){
														echo "checked";
													} ?>>
													<label class="form-check-label" for="inlineRadio2">NO</label>
												</div>
											</div>
										</div>
									<?php
									} ?>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Description <span class="text-warning">*</span></h6>
										</div>
										<div class="col-sm-9">
											<textarea name="update_event_description" class="form-control bg-transparent" rows="5"><?php echo $data['event_description']; ?></textarea>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Rewards <span class="text-warning">*</span></h6>
										</div>
										<div class="col-sm-9">
											<textarea name="update_event_rewards" class="form-control bg-transparent" rows="3"><?php echo $data['rewards']; ?></textarea>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Image <span class="text-warning">(Optional)</span></h6>
										</div>
										<div class="col-sm-9">
											<div class="form-group">
												<input type="file" name="update_front_image" id="file" class="input-file" accept="image/*" value="<?php echo $data['event_img'] ?>">
												<label for="file" class="btn btn-tertiary js-labelFile has-file">
													<i class="icon fa fa-check"></i>
													<span class="js-fileName"><?php echo $data['event_img'] ?></span>
												</label>
											</div>
										</div>
									</div>
									<div class="container-fluid mt-5">
										<div class="float-end">
											<a type="button" id="submit" class="btn btn-outline-success px-4" style="max-width:200px;">Update Event</a>
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
		(function() {

			'use strict';

			$('.input-file').each(function() {
				var $input = $(this),
					$label = $input.next('.js-labelFile'),
					labelVal = $label.html();

				$input.on('change', function(element) {
					var fileName = '';
					if (element.target.value) fileName = element.target.value.split('\\').pop();
					fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
				});
			});

		})();

		$('#submit').click(function() {
			$form = $('#event_form');
			var formData = new FormData($form[0]);
			$btn = $(this);
			$btn.attr('disabled', 'true');
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
							location.assign("All_Events.php");
						}, 2000);
					} else if (data == "failed") {
						$('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Update Info. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
						$btn.attr('disabled', 'false');

					} else if (data == "missing") {
						$('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Please Fill All Fields</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
						$btn.attr('disabled', 'false');

					} else if (data == "extention_error") {
						$('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Only jpg, jpeg, png, webp files are allowed</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
						$btn.attr('disabled', 'false');

					} else if (data == "exist") {
						$('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Image already exists</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
						$btn.attr('disabled', 'false');
					} else {
						alert(data);
						$btn.attr('disabled', 'false');

					}

					// scroll to top
					$('html, body').animate({
						scrollTop: 0
					}, 100);
				}
			});

		});
	});
</script>