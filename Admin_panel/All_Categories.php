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

		<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
			<?php
			$query = "SELECT * FROM categories";
			$result = mysqli_query(connection(), $query);
			foreach ($result as $row) {
			?>

				<div class="col">
					<div class="card p-2">
						<img style="min-height: 220px;max-height:220px;" src="../Images/category_images/<?php echo $row['category_image']; ?>" class="card-img-top" alt="...">
						<div class="card-body">
							<h6 class="card-title cursor-pointer"><?php echo $row['category_name']; ?>r</h6>
							<div class="clearfix">

								<div class="btn-group mb-0 float-end " role="group" aria-label="Basic example">
									<!-- <form action="code.php" method="POST">
										<input type="hidden" name="category_id" value="<?php echo $row['id']; ?>"> -->
										<button type="button" class="btn btn-light" name="delete_category" onclick="delete_category(<?php echo $row['id']; ?>)"><i class="bx bx-trash-alt text-danger" ></i>
										</button>
									<!-- </form> -->
									<a type="button" class="btn btn-light"><i class="bx bx-pencil text-success"></i>
									</a>
								</div>

							</div>
						</div>
					</div>
				</div>

			<?php
			}
			?>

		</div><!--end row-->


	</div>
</div>
<!--end page wrapper -->
<?php
include 'body_end.php';
include 'footer.php';
?>
