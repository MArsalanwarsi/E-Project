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
								<a href="add_new_category.php" class="btn btn-light mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>New Category</a>
							</div>
							<div class="col-lg-9 col-xl-10">
								<form class="float-lg-end">
									<div class="row row-cols-lg-auto g-2">
										<div class="col-12">
											<div class="position-relative">
												<input type="text" class="form-control ps-5" placeholder="Search Product..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
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
		<div class="row">
			<div class="col-12">

				<div class="alert_data">

				</div>

			</div>
		</div>

		<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid allbooksdata">
			<div class="card radius-10 w-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div>
							<h5 class="mb-0">All Categories</h5>
						</div>
					</div>
				</div>
				<div class="customers-list p-3 mb-3">
					<?php
					$query = "SELECT * FROM categories";
					$result = mysqli_query(connection(), $query);
					$sno = 1;
					foreach ($result as $row) {
					?>


						<div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
							<div class="mx-2">
								<h5 class="mb-1 font-14"><?php echo $sno;
									$sno++; ?></h5>
							</div>
							<div class="ms-2">
								<h6 class="mb-1 font-14"><?php echo $row['category_name']; ?></h6>
							</div>
							<div class="list-inline d-flex customers-contacts ms-auto"> <a href="update_category.php?id=<?php echo $row['id']; ?>" class="list-inline-item"><i class='bx bx-pencil text-success'></i></a>
								<a href="javascript:;" class="list-inline-item" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>"><i class='bx bx-trash-alt text-danger'></i></a>
							</div>
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
					<?php
					}
					?>
				</div>
			</div>
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
			var category_id = $(this).data('id');
			$.ajax({
				url: 'code.php',
				method: 'POST',
				data: {
					category_id: category_id
				},
				success: function(data) {

					$('.alert_data').html(data);
					$('#deleteModal' + category_id).modal('hide');
					setTimeout(function() {
						location.reload();
					}, 2000);

				}
			})
		})
	})
</script>