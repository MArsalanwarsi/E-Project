<?php
include 'header.php';
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
<?php
include 'body_start.php';
?>
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Merchandise</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Update Book</li>
					</ol>
				</nav>
			</div>
		</div>
		<?php
		$updatedata = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT * FROM books WHERE id = '$_GET[id]'"));
		?>
		<!--end breadcrumb-->
		<form action="" method="post" enctype="multipart/form-data" id="update_form">
			<div class="card">
				<div class="card-body p-4">
					<h5 class="card-title">Update Book</h5>

					<hr />
					<div class="alerts_ajax"></div>

					<div class="form-body mt-4">
						<input type="hidden" name="update_id" value="<?php echo $updatedata['id']; ?>" readonly>
						<div class="row">
							<div class="col-lg-8">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="inputBookTitle" class="form-label">Book Title <span class="text-warning">*</span></label>
										<input type="text" class="form-control" id="inputBookTitle" placeholder="Enter Book title" name="update_book_title" value="<?php echo $updatedata['book_name']; ?>">
									</div>
									<div class="mb-3">
										<label for="inputBookDescription" class="form-label">Description <span class="text-warning">*</span></label>
										<textarea class="form-control" id="inputBookDescription" rows="3" placeholder="Enter Book Description" name="book_description"><?php echo $updatedata['book_des']; ?></textarea>
									</div>
									<!-- error in posting -->
									<div class="mb-3">
										<label for="inputBookDescription" class="form-label">Book Images <span class="text-warning">(Optional)</span></label>
										<div class="container">
											<div class="row justify-content-start">
												<div class="col-12 col-sm-12 col-md-12 p-3">
													<div class="form-group">
														<input type="file" name="front_image" id="file" class="input-file" accept="image/*">
														<label for="file" class="btn btn-tertiary js-labelFile">
															<i class="icon fa fa-check"></i>
															<span class="js-fileName">Choose Front image</span>
														</label>
													</div>
												</div>
												<div class="col-12 col-sm-12 col-md-12 p-3">
													<div class="form-group">
														<input type="file" name="back_image" id="file2" class="input-file2" accept="image/*">
														<label for="file2" class="btn btn-tertiary js-labelFile2">
															<i class="icon fa fa-check"></i>
															<span class="js-fileName2">Choose Back image</span>
														</label>
													</div>
												</div>
											</div>


										</div>

									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-md-6">
											<label for="inputPrice" class="form-label">Orignal Price <span class="text-warning">*</span></label>
											<input type="number" class="form-control" id="inputPrice" placeholder="00.00" name="orignal_price" value="<?php echo $updatedata['book_price']; ?>">
										</div>
										<div class="col-md-6">
											<label for="inputCompareatprice" class="form-label">Discounted Price <span class="text-warning">*</span></label>
											<input type="number" class="form-control" id="inputCompareatprice" placeholder="00.00" name="discounted_price" value="<?php echo $updatedata['after_discount_price']; ?>">
										</div>
										<div class="col-md-6">
											<label for="inputBookType" class="form-label">PDF <span class="text-warning">*</span></label>
											<select class="form-select" id="inputBookType" name="pdf" onchange="pdfcheck()">
												<option value="yes" <?php if ($updatedata['book_pdf'] == "yes") echo "selected"; ?>>Yes</option>
												<option value="no" <?php if ($updatedata['book_pdf'] == "no") echo "selected"; ?>>No</option>
											</select>
										</div>
										<div class="col-md-6 pdf_price">
											<label for="inputpdf_price" class="form-label">PDF Price <span class="text-warning">*</span></label>
											<input type="number" class="form-control" id="inputpdf_price" placeholder="00.00" name="pdf_price" value="<?php echo $updatedata['pdf_price']; ?>">
										</div>
										<div class="col-12">
											<label for="inputBookAuthor" class="form-label">Book Author <span class="text-warning">*</span></label>
											<input type="text" class="form-control" id="inputBookAuthor" placeholder="Enter Book Author" name="book_author" value="<?php echo $updatedata['book_author']; ?>">
										</div>
										<div class="col-12">
											<label for="inputCategory" class="form-label">Book Category <span class="text-warning">*</span></label>
											<select class="form-select" id="inputCategory" name="book_category">
												<?php
												$data = mysqli_query(connection(), "select * from categories");
												foreach ($data as $row) {
												?>
													<option value="<?php echo $row['category_name'] ?>" <?php if ($updatedata['book_category'] == $row['category_name']) echo "selected"; ?>><?php echo $row['category_name'] ?></option>
												<?php
												}
												?>

											</select>
										</div>
										<div class="col-12">
											<label for="inputBookStatus" class="form-label">Book Status </label>
											<select class="form-select" id="inputBookStatus" name="status">
												<option value="In Stock" <?php if ($updatedata['status'] == "In Stock") echo "selected"; ?>>In Stock</option>
												<option value="OutOfStock" <?php if ($updatedata['status'] == "OutOfStock") echo "selected"; ?>>Out Of Stock</option>
											</select>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<input type="submit" class="btn btn-light" name="Update_book" value="Update Book">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end row -->
					</div>

				</div>
			</div>
		</form>
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

		(function() {

			'use strict';

			$('.input-file2').each(function() {
				var $input = $(this),
					$label = $input.next('.js-labelFile2'),
					labelVal = $label.html();

				$input.on('change', function(element) {
					var fileName = '';
					if (element.target.value) fileName = element.target.value.split('\\').pop();
					fileName ? $label.addClass('has-file').find('.js-fileName2').html(fileName) : $label.removeClass('has-file').html(labelVal);
				});
			});

		})();

		$('#update_form').submit(function(e) {

			e.preventDefault();
			// validation

			var formData = new FormData($(this)[0]);


			$.ajax({

				url: 'code.php',

				type: 'POST',

				data: formData,

				cache: false,

				contentType: false,

				processData: false,

				success: function(response) {
					if (response == "missing") {
						$(".alerts_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>All Fields are required</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
					} else if (response == "extention_error") {
						$(".alerts_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Add Book. Please Upload Valid Image (jpg, jpeg, png, webp)</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
					} else if (response == "file_exist_error") {
						$(".alerts_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>A file with the same name already exists in the destination folder. Please rename the file and try again.</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
					} else if (response == "image_error") {
						$(".alerts_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Add Book. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
					} else if (response == "both_img_required") {
						$(".alerts_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Both Front and Back Images are required</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
					} else if (response == "failed") {
						$(".alerts_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Add Book. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
					} else if (response == "success") {
						$(".alerts_ajax").html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Book Added Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
						// disable submit button
						$('#product_form input[type="submit"]').prop('disabled', true);
						// remove  after 3 seconds
						setTimeout(function() {
							location.assign("All_Products.php");
						}, 3000);
					}


				}

			});

		});




	})

	function pdfcheck() {
		var x = document.getElementById("inputBookType").value;
		if (x == "yes") {
			$('.pdf_price').removeClass('d-none');
			document.getElementById("inputpdf_price").removeAttribute("disabled")

		} else {
			$('.pdf_price').addClass('d-none');
			document.getElementById("inputpdf_price").setAttribute("disabled", "true")
		}
	}
</script>