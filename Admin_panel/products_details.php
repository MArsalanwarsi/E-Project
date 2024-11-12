		<?php
		include('header.php');
		include('body_start.php');
		$data = mysqli_fetch_assoc(mysqli_query(connection(), "select * from books where id='$_GET[book_id]'"));
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
								<li class="breadcrumb-item active" aria-current="page">Products Details</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

				<div class="card">
					<div class="row g-0">
						<div class="col-md-4 border-end">
							<img src="../Images\books_images\<?php echo $data['book_img1'] ?>" class="img-fluid main_img" alt="..." style="height: 500px; width: 100%;">
							<div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
								<div class="col"><img src="../Images/books_images/<?= $data['book_img1'] ?>" width="70" class="border rounded cursor-pointer first_img h-100" alt=""></div>
								<div class="col"><img src="../Images/books_images/<?= $data['book_img2'] ?>" width="70" class="border rounded cursor-pointer second_img h-100" alt=""></div>
							</div>
						</div>
						<div class="col-md-8 mt-5">
							<div class="card-body">
								<h4 class="card-title"><?= $data['book_name'] ?></h4>
								<div class="d-flex gap-3 py-3">
									<div class="cursor-pointer">
										<i class='bx bxs-star text-warning'></i>
										<i class='bx bxs-star text-warning'></i>
										<i class='bx bxs-star text-warning'></i>
										<i class='bx bxs-star text-warning'></i>
										<i class='bx bxs-star'></i>
									</div>
									<div>142 reviews</div>
									<div class="text-white"><i class='bx bxs-cart-alt align-middle'></i> 134 orders</div>
								</div>
								<div class="mb-3">
									<span class="price h4 ">RS <?= $data['after_discount_price'] ?></span>
									<span class="text-decoration-line-through">RS <?= $data['book_price'] ?></span>
								</div>
								<dl class="row">
									<dt class="col-sm-3">PDF</dt>
									<dd class="col-sm-9"><?= $data['book_pdf'] ?></dd>

									<?php if ($data['book_pdf'] == "yes") { ?>
										<dt class="col-sm-3">PDF Price</dt>
										<dd class="col-sm-9">RS <?= $data['pdf_price'] ?> </dd>
									<?php } ?>

									<dt class="col-sm-3">Book Author</dt>
									<dd class="col-sm-9"><?= $data['book_author'] ?></dd>

									<dt class="col-sm-3">Book Category</dt>
									<dd class="col-sm-9"><?= $data['book_category'] ?></dd>

									<dt class="col-sm-3">Availability</dt>
									<dd class="col-sm-9"><?= $data['status'] ?></dd>
								</dl>


							</div>
						</div>
					</div>
					<hr />
					<div class="card-body">
						<ul class="nav nav-tabs mb-0" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
										</div>
										<div class="tab-title"> Product Description </div>
									</div>
								</a>
							</li>

							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
										</div>
										<div class="tab-title">Reviews</div>
									</div>
								</a>
							</li>
						</ul>
						<div class="tab-content pt-3">
							<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
								<p><?= $data['book_des'] ?>.</p>

							</div>
							<!-- reviews -->
							<div class="tab-pane fade" id="primarycontact" role="tabpanel">
								<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
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
				$('.first_img').on('click', function() {
					$('.main_img').attr('src', $(this).attr('src'))
				})
				$('.second_img').on('click', function() {
					$('.main_img').attr('src', $(this).attr('src'))
				})

			})
		</script>