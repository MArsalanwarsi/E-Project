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
			<div class="breadcrumb-title pe-3">Admins</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">All Admins</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->
		<div class="alerts"></div>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Age</th>
								<th>Story</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysqli_query(connection(), "select * from participants where events_id = '$_GET[id]'");
							foreach ($sql as $data) {
							?>
								<tr>
									<td><?php echo $data['name']; ?></td>
									<td><?php echo $data['email']; ?></td>
									<td><?php echo $data['age']; ?></td>
									<!-- download button -->
									<td>
										<p><?php echo $data['story']; ?></p>
										<a href="../event_files/participants_files//<?php echo $data['story']; ?>" class="btn btn-success" download>Download</a>

									</td>
									<td>

										<select class="single-select" data-id="<?php echo $data['id']; ?>">
											<option value=""></option>
											<option value="1ST" <?php if($data['status'] == "1ST"){echo "selected";} ?>>1ST</option>
											<option value="2ND" <?php if($data['status'] == "2ND"){echo "selected";} ?>>2ND</option>
											<option value="3RD" <?php if($data['status'] == "3RD"){echo "selected";} ?>>3RD</option>
											<option value="REJECTED" <?php if($data['status'] == "REJECTED"){echo "selected";} ?>>REJECTED</option>

										</select>


									</td>
									<td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $data['id']; ?>">Delete</button></td>
								</tr>
								<div class="modal fade" id="delete<?php echo $data['id']; ?>" tabindex="-1" aria-hidden="true">
									<div class="modal-dialog modal-lg modal-dialog-centered">
										<div class="modal-content bg-danger">
											<div class="modal-header">
												<h5 class="modal-title text-white">Are you sure you want to delete this Admin?</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body text-white">

												<h4>Please Confirm Password Or Main Admins Password</h4>
												<form action="code.php" method="post">
													<input class="form-control mb-3" type="text" placeholder="Default input" aria-label="default input example">
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
												<button type="button" class="btn btn-dark">Save changes</button>
											</div>
										</div>
									</div>
								</div>
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
	$(document).ready(function() {
		$('#example').DataTable();
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.single-select').on('change', function() {
			$id = $(this).data('id');
			$status = $(this).val();
			$.ajax({
				url: 'code.php',
				method: 'POST',
				data: {
					part_status_id: $id,
					part_status: $status
				},
				success: function(data) {
					if (data == "success") {
						$('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Status Updated</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
						$('.alerts').fadeIn().delay(4000).fadeOut();
					}else if (data == "failed") {
						$('.alerts').html("<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Update Status</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
						$('.alerts').fadeIn().delay(4000).fadeOut();
					}else{
						alert(data);
					}
				}
			});
		});
	});
</script>


</body>

</html>