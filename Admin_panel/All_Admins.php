<?php
include 'header.php';
include 'body_start.php';
?>
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
		<h6 class="mb-0 text-uppercase">Admins</h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysqli_query(connection(), "select * from users where role='admin'&& id!='1'");
							foreach ($sql as $data) {
							?>
								<tr>
									<td><?php echo $data['name']; ?></td>
									<td><?php echo $data['email']; ?></td>
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
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>


</body>

</html>