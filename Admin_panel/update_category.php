<?php
include 'header.php';
?>
<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
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

	.input-file {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;

		+.js-labelFile {
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
$data=mysqli_fetch_assoc(mysqli_query(connection(),"SELECT * FROM categories WHERE id = '$_GET[id]'"));
?>
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Categories</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Update Category</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->
		<form action="" method="POST" enctype="multipart/form-data" id="category_form">
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>">">
			<div class="card">
				<div class="card-body p-4">
					<h5 class="card-title">Update Category</h5>
					<hr />
					<div class="alerts_ajax">
					
					</div>
					<div class="form-body mt-4">
						<div class="row">
							<div class="col-lg-8">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="inputBookCategory" class="form-label">Book Category</label>
										<input type="text" class="form-control" id="inputBookCategory" placeholder="Enter Book Category" name="book_Category_update" value="<?php echo $data['category_name']; ?>">
									</div>
									<div class="mb-3">
										<label for="inputBookDescription" class="form-label">Category Images <span class="text-warning">(Optional)</span></label>
										<div class="container">
											<div class="row justify-content-start">
												<div class="col-12 col-sm-12 col-md-12 p-3">
													<div class="form-group">
														<input type="file" name="category_image_update" id="file" class="input-file">
														<label for="file" class="btn btn-tertiary js-labelFile">
															<i class="icon fa fa-check"></i>
															<span class="js-fileName">Choose Category image</span>
														</label>
													</div>
												</div>
											</div>


										</div>

									</div>
									<div class="mb-3 d-flex justify-content-end">
										<div class="d-grid">
											<input type="submit" class="btn btn-light px-5 py-2" name="add_category" value="Update Category" style="max-width: 200px;">
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

		// using ajax send data to code.php after validation on submit
		$('#category_form').submit(function(e) {

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
					$(".alerts_ajax").html(response);
					// disable submit button
					$('#category_form input[type="submit"]').prop('disabled', true);
					// remove  after 3 seconds
					setTimeout(function() {
						location.reload();
					}, 3000);

				}

			});

		});


	})

	function pdfcheck() {
		var x = document.getElementById("inputBookType").value;
		if (x == "yes") {
			$('.pdf_price').removeClass('d-none');
		} else {
			$('.pdf_price').addClass('d-none');
			document.getElementById("inputpdf_price").setAttribute("disabled", "true")
		}
	}
</script>
<!--app JS-->
<