<?php
include 'header.php';
include 'body_start.php';
?>
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-lg-3 col-xl-2">
								<a href="add_new_products.php" class="btn btn-light mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>New Product</a>
							</div>
							<div class="col-lg-9 col-xl-10">
								<form class="float-lg-end">
									<div class="row row-cols-lg-auto g-2">
										<div class="col-12">
											<div class="position-relative">
												<input type="text" class="form-control ps-5" placeholder="Search Product..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
											</div>
										</div>
										<div class="col-12">
											<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
												<button type="button" class="btn btn-light">Sort By</button>
												<div class="btn-group" role="group">
													<button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
														<i class='bx bx-chevron-down'></i>
													</button>
													<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
														<li><a class="dropdown-item" href="#">Dropdown link</a></li>
														<li><a class="dropdown-item" href="#">Dropdown link</a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
												<button type="button" class="btn btn-light">Collection Type</button>
												<div class="btn-group" role="group">
													<button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
														<i class='bx bxs-category'></i>
													</button>
													<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
														<li><a class="dropdown-item" href="#">Dropdown link</a></li>
														<li><a class="dropdown-item" href="#">Dropdown link</a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-light">Price Range</button>
												<div class="btn-group" role="group">
													<button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
														<i class='bx bx-slider'></i>
													</button>
													<ul class="dropdown-menu dropdown-menu-start" aria-labelledby="btnGroupDrop1">
														<li><a class="dropdown-item" href="#">Dropdown link</a></li>
														<li><a class="dropdown-item" href="#">Dropdown link</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container alert_data"></div>
		<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
			<?php
			$data = mysqli_query(connection(), "SELECT * FROM books");
			foreach ($data as $row) {
			?>
				<div class="col">
					<div class="card">
						<a href="products_details.php?book_id=<?php echo $row['id'] ?>"><img style="min-height: 220px;max-height:220px;" src="../Images/books_images/<?php echo $row['book_img1'] ?>" class="card-img-top" alt="..."></a>
						<div class="card-body">
							<h6 class="card-title cursor-pointer"><?php echo $row['book_name'] ?></h6>
							<div class="clearfix">

								<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through">RS <?php echo $row['book_price'] ?></span><span class="text-white">RS <?php echo $row['after_discount_price'] ?></span></p>
							</div>
							<div class="d-flex align-items-center mt-3 fs-6">
								<div class="cursor-pointer">
									<i class='bx bxs-star text-white'></i>
									<i class='bx bxs-star text-white'></i>
									<i class='bx bxs-star text-white'></i>
									<i class='bx bxs-star text-light-4'></i>
									<i class='bx bxs-star text-light-4'></i>
								</div>
								<p class="mb-0 ms-auto">4.2(182)</p>
							</div>
							<div class="btn-group mb-0 float-end mt-3" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>"><i class="bx bx-trash-alt text-danger"></i>
								</button>
								<a type="button" href="update_products.php?id=<?php echo $row['id']; ?>" class="btn btn-light"><i class="bx bx-pencil text-success"></i>
								</a>
							</div>
							<div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content bg-danger">
										<div class="modal-header">
											<h5 class="modal-title text-white">Delete Category</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body text-white">
											<p>Are you sure you want to delete?</p>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
											<button type="button" class="btn btn-dark deletebtn" data-id="<?php echo $row['id']; ?>">Delete</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div><!--end row-->


	</div>
</div>
<!--end page wrapper -->
<?php
include 'body_end.php';
include 'footer.php';
?>
<script>
	$(document).ready(function() {
		$('.deletebtn').on('click', function() {
			var book_id = $(this).data('id');
			$.ajax({
				url: 'code.php',
				method: 'POST',
				data: {
					book_id: book_id
				},
				success: function(data) {

					$('.alert_data').html(data);
					$('#deleteModal' + book_id).modal('hide');
					setTimeout(function() {
						location.reload();
					}, 2000);

				}
			})
		})
	})
</script>