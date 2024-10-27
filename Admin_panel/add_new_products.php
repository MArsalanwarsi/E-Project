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
						<li class="breadcrumb-item active" aria-current="page">Add New Product</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->
		<form action="code.php" method="POST" enctype="multipart/form-data">
			<div class="card">
				<div class="card-body p-4">
					<h5 class="card-title">Add New Product</h5>
					<hr />

					<div class="form-body mt-4">
						<div class="row">
							<div class="col-lg-8">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="inputBookTitle" class="form-label">Book Title</label>
										<input type="text" class="form-control" id="inputBookTitle" placeholder="Enter Book title" name="book_title">
									</div>
									<div class="mb-3">
										<label for="inputBookDescription" class="form-label">Description</label>
										<textarea class="form-control" id="inputBookDescription" rows="3" placeholder="Enter Book Description" name="book_description"></textarea>
									</div>
									<!-- error in posting -->
									<div class="mb-3">
										<label for="inputBookDescription" class="form-label">Book Images</label>
										<div class="container">
											<div class="row justify-content-start">
												<div class="col-12 col-sm-12 col-md-12 p-3">
													<div class="form-group">
														<input type="file" name="front_image" id="file" class="input-file">
														<label for="file" class="btn btn-tertiary js-labelFile">
															<i class="icon fa fa-check"></i>
															<span class="js-fileName">Choose Front image</span>
														</label>
													</div>
												</div>
												<div class="col-12 col-sm-12 col-md-12 p-3">
													<div class="form-group">
														<input type="file" name="back_image" id="file" class="input-file">
														<label for="file" class="btn btn-tertiary js-labelFile">
															<i class="icon fa fa-check"></i>
															<span class="js-fileName">Choose Back image</span>
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
											<label for="inputPrice" class="form-label">Orignal Price</label>
											<input type="number" class="form-control" id="inputPrice" placeholder="00.00" name="orignal_price">
										</div>
										<div class="col-md-6">
											<label for="inputCompareatprice" class="form-label">Discounted Price</label>
											<input type="number" class="form-control" id="inputCompareatprice" placeholder="00.00" name="discounted_price">
										</div>
										<div class="col-md-6">
											<label for="inputBookType" class="form-label">PDF</label>
											<select class="form-select" id="inputBookType" name="pdf" onchange="pdfcheck()">
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
										<div class="col-md-6 pdf_price">
											<label for="inputpdf_price" class="form-label">PDF Price</label>
											<input type="number" class="form-control" id="inputpdf_price" placeholder="00.00" name="pdf_price">
										</div>
										<div class="col-12">
											<label for="inputBookAuthor" class="form-label">Book Author</label>
											<input type="text" class="form-control" id="inputBookAuthor" placeholder="Enter Book Author" name="book_author">
										</div>
										<div class="col-12">
											<label for="inputCategory" class="form-label">Book Category</label>
											<select class="form-select" id="inputCategory">
												<option></option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>
										<div class="col-12">
											<label for="inputBookStatus" class="form-label">Book Status</label>
											<select class="form-select" id="inputBookStatus">
												<option value="InStock">In Stock</option>
												<option value="OutOfStock">Out Of Stock</option>
											</select>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<input type="submit" class="btn btn-light" name="add_book" value="Save Book" >
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

	})

	function pdfcheck() {
		var x = document.getElementById("inputBookType").value;
		if (x == "yes") {
			$('.pdf_price').removeClass('d-none');
		} else {
			$('.pdf_price').addClass('d-none');
			document.getElementById("inputpdf_price").setAttribute("disabled","true")
		}
	}
</script>
<!--app JS-->
<