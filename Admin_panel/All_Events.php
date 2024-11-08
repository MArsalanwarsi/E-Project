<link rel="stylesheet" href="../css/main.css">
<?php
include 'header.php';
?>
<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<?php
include 'body_start.php';
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
		<form>
			<div class="card">
				<div class="card-body p-4">
					<h5 class="card-title">ALL EVENTS</h5>
					<hr />
					<div class="alerts_ajax">

					</div>
					<div class="form-body mt-4">
						<div class="row">
							<div class="col-12">
								<div class="border border-3 p-4 rounded">
									<article class="post side-item content-padding ds ms">
										<div class="row">
											<div class="col-xl-4 col-lg-5 col-md-5 p-3">

												<img src="../Images/image.png" alt="" />
												<div class="media-links">
													<a class="abs-link" title="" href="event_details.php"></a>
												</div>

											</div>

											<div class="col-xl-8 col-lg-7 col-md-6">
												<div class="item-content text-white">
													<h5>
														<a href="event_details.php">Magna aliquyam erased voluptua</a>
													</h5>
													<div class="d-flex gap-3">
														<p class="item-meta color-darkgrey"><i class="fa fa-calendar color-main"></i> <span>Start:</span><span class="ps-0">March 12, 2018</span> </p>
														<p class="item-meta color-darkgrey"><i class="fa fa-calendar color-main"></i> <span>End:</span><span class="ps-0">March 12, 2018</span></p>
													</div>

													<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam et dolore magna aliquyam erat.</p>
												</div>
											</div>
										</div>
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
<!--app JS-->
<