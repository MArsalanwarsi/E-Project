<?php
include 'header.php';
?>
<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="../css/main.css">
<?php
include 'body_start.php';
$data = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT * FROM events WHERE id='$_GET[id]'"));
function datatime($dt)
{
	$start_datetime_str = $dt;

	// Create a DateTime object
	$start_datetime = new DateTime($start_datetime_str);

	// Extract date and time components
	$start_date = $start_datetime->format('Y-m-d'); // 2024-11-08
	$start_time = $start_datetime->format('H:i');     // 08:28
	// convert into am pm format
	$start_time = date('h:i A', strtotime($start_time));
	// change date format to dd-mm-yy
	$start_date = date('d-m-Y', strtotime($start_date));

	return $start_date . ' ' . $start_time;
}
?>
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">

		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Events</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">All Events</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->
		<form action="" method="POST" enctype="multipart/form-data" id="category_form">
			<div class="card">
				<div class="card-body p-4">
					<div class="alerts_ajax">

					</div>
					<div class="form-body mt-4">
						<div class="row">
							<div class="col-12">
								<div class="border border-3 p-4 rounded">
									<article class="vertical-item content-padding post type-event status-publish format-standard has-post-thumbnail ">
										<div class="item-media post-thumbnail p-5" style="max-height: 500px;">
											<img src="../Images/events_images/<?php echo $data['event_img'] ?>" alt="" />
										</div>

										<div class="item-content">
											<!-- .post-thumbnail -->
											<header class="entry-header">
												<div class="entry-meta mb-5">
													<?php if ($data['status'] == 'ongoing') { ?>
														<div class="entry-date" style="line-height: 20px;">
															<i class="fa fa-calendar color-main"></i> <span class="h6">Start:</span>
															<span><?php echo datatime($data['event_start']) ?></span>
														</div>
														<div class="entry-categories" style="line-height: 20px;">
															<i class="fa fa-calendar color-main"></i> <span class="h6">End:</span>
															<span><?php echo datatime($data['event_end']) ?></span>
														</div>
													<?php } else { ?>
														<div class="entry-date h3" style="line-height: 20px;">
															<i class="fa fa-calendar color-main "></i> <span class="h3">Finished</span>
														</div>
													<?php } ?>
												</div>
												<!-- .entry-meta -->
											</header>
											<!-- .entry-header -->

											<div class="entry-content">
												<p><?php echo $data['event_description'] ?></p>
												<h4>Requirements</h4>
												<ul class="list-styled">
													<li><?php echo $data['event_req1'] ?></li>
													<?php if ($data['event_req2'] != null || $data['event_req2'] != "") { ?><li><?php echo $data['event_req2'] ?></li> <?php } ?>
													<?php if ($data['event_req3'] != null || $data['event_req3'] != "") { ?><li><?php echo $data['event_req3'] ?></li> <?php } ?>
													<?php if ($data['event_req4'] != null || $data['event_req4'] != "") { ?><li><?php echo $data['event_req4'] ?></li> <?php } ?>

												</ul>
											</div>
											<div class="entry-content">
												<h4>REWARDS</h4>
												<p><?php echo $data['rewards'] ?></p>
											</div>
											<!-- .entry-content -->
											<div class="d-flex flex-wrap justify-content-end gap-4 mt-5">

												<a href="Update_Event.php?id=<?php echo $data['id'] ?>" class="btn btn-outline-warning">Edit</a>
												<a class="btn btn-outline-danger" id="delete_btn_main" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>

												<a href="show_participants.php?id=<?php echo $data['id'] ?>" class="btn btn-outline-success">Show Participants</a>
											</div>
											<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
												<div class="modal-dialog modal-lg modal-dialog-centered">
													<div class="modal-content bg-danger">
														<div class="modal-header">
															<h5 class="modal-title text-white">Delete Event</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body text-white">
															<p>Are you sure you want to delete?</p>
															<p>This will permanently delete the event and data of all participants in this event.</p>
															<p>This action cannot be undone</p>

														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
															<button type="button" class="btn btn-dark deletebtn" data-id="<?php echo $data['id']; ?>">Delete</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- .item-content -->
									</article>

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
		$('.deletebtn').on('click', function() {
			$delete_btn = $(this);
			$delete_btn.prop('disabled', true);
			$delete_btn.html("Deleting...");
			var event_id = $(this).data('id');
			$.ajax({
				url: 'code.php',
				method: 'POST',
				data: {
					event_id: event_id
				},
				success: function(data) {
					if (data == "success") {
						$delete_btn.html("Deleted");
						setTimeout(function() {
							location.assign("All_Events.php");
						}, 2000);
					} else {
						alert(data);
						$delete_btn.prop('disabled', false);
						$delete_btn.html("Delete");
					}


				}
			})
		})
	})
</script>