<?php
include 'header.php';
?>
<link rel="stylesheet" href="../css/main.css">
<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<?php
include 'body_start.php';
?>
<!--start page wrapper -->
<div class="page-wrapper w-100">
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
		<form>
			<div class="card">
				<div class="card-body p-4">
					<h5 class="card-title">ALL EVENTS</h5>
					<hr />
					<div class="alerts_ajax">

					</div>
					<div class="form-body mt-4">
						<div class="row">
							<div class="col-12 col-lg-12 col-xl-12 col-md-12 " style="min-width:fit-content;max-width:fit-content">
								<div class="border border-3 p-4 rounded">
									<?php
									$data = mysqli_query(connection(), "SELECT * FROM events ORDER BY id DESC");
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
									foreach ($data as $row) {



									?>
										<article class="post side-item content-padding ds ms w-100" >
											<div class="row">
												<div class="col-xl-4 col-lg-5 col-md-5 p-3">

													<img src="../Images/events_images/<?php echo $row['event_img'] ?>" alt="" style="max-height: 200px;width: 100%; height:100%" />
													<div class="media-links">
														<a class="abs-link" title="" href="event_details.php?id=<?php echo $row['id'] ?>"></a>
													</div>

												</div>

												<div class="col-xl-8 col-lg-7 col-md-6">
													<div class="item-content text-white">
														<h5>
															<a href="event_details.php?id=<?php echo $row['id'] ?>"><?php echo $row['event_title'] ?></a>
														</h5>
														<div class="d-flex gap-3">
															<?php if($row['status'] == 'ongoing') { ?>
															<p class="item-meta color-darkgrey"><i class="fa fa-calendar color-main"></i> <span>Start:</span><span class="ps-0"><?php echo datatime($row['event_start'])	 ?></span> </p>
															<p class="item-meta color-darkgrey"><i class="fa fa-calendar color-main"></i> <span>End:</span><span class="ps-0"><?php echo datatime($row['event_end'])	 ?></span></p>
															<?php } else { ?>
																<p class="item-meta color-darkgrey mb-3"><i class="fa fa-calendar color-main"></i> <span>Finished</span></p>
															<?php } ?>
														</div>

														<p ><?php 
														 echo substr($row['event_description'], 0, 100);?></p>
													</div>
												</div>
											</div>
										</article>
									<?php } ?>

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
<!--app JS-->