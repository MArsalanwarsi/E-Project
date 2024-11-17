<?php
include 'header.php';
include 'body_start.php';
?>
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Orders</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">All Orders</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->

		<div class="card">
			<div class="card-body">
				<div class="d-lg-flex align-items-center mb-4 gap-3">
					<div class="position-relative">
						<input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table mb-0">
						<thead class="table-light">
							<tr>
								<th>Book Name</th>
								<th>Author</th>
								<th>Type</th>
								<th>Date</th>
								<th>Status</th>
								<th>Actions</th>
								<th>View Details</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$orders = mysqli_query(connection(), "select * from orders order by id desc");
							foreach ($orders as $order) {
							?>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="">
												<h6 class="mb-0 font-14"><?= $order['book_name'] ?></h6>
											</div>
										</div>
									</td>
									<td><?= $order['author'] ?></td>

									<td><?= $order['type'] ?></td>
									<td><?= $order['date_time'] ?></td>
									<td>
										<div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i><?= $order['status'] ?></div>
									</td>

									<td>
										<div class="d-flex order-actions">
											<?php
											if ($order['status'] == 'Pending') {
												echo 'pending';
											} else if ($order['status'] == 'payment pending') {
											?>
												<select class="single-select order_action" data-id="<?= $order['id'] ?>">
													<option value="payment pending">Payment Pending</option>
													<option value="confirmed">Confirmed</option>
													<option value="Cancelled">Cancelled</option>

												</select>
											<?php
											} else if ($order['status'] == 'Cancelled') {
											?>
												cancelled
											<?php
											} else {
											?>
												<select class="single-select order_action" data-id="<?= $order['id'] ?>">
													<option value="payment pending">Payment Pending</option>
													<option value="confirmed" <?php if ($order['status'] == "confirmed") {
																					echo "selected";
																				} ?>>Confirmed</option>
													<option value="packed" <?php if ($order['status'] == "packed") {
																				echo "selected";
																			} ?>>Packed</option>
													<option value="shipped" <?php if ($order['status'] == "shipped") {
																				echo "selected";
																			} ?>>Shipped</option>
													<option value="delivered" <?php if ($order['status'] == "delivered") {
																					echo "selected";
																				} ?>>Delivered</option>
												</select>
											<?php
											}


											?>
										</div>
									</td>
									<td><?php if ($order['status'] != "Cancelled") { ?><a type="button" class="btn btn-light btn-sm radius-30 px-4">View Details</a></td>
									<?php } ?>
								</tr>
							<?php

							}
							?>


						</tbody>
					</table>
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
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>
	$('.single-select').select2({
		theme: 'bootstrap4',
		width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
		placeholder: $(this).data('placeholder'),
		allowClear: Boolean($(this).data('allow-clear')),
	});
	$(".order_action").on("change", function() {
		var id = $(this).attr("data-id");
		var value = $(this).val();
		$.ajax({
			url: "code.php",
			type: "POST",
			data: {
				order_update_id: id,
				order_update_value: value
			},
			success: function(data) {
				if (data == "success") {
					location.reload();
				} else {
					alert(data);
				}
			}
		});
	});
</script>