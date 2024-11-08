<?php
include 'header.php';
?>
<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="../css/main.css">
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
		<form action="" method="POST" enctype="multipart/form-data" id="category_form">
			<div class="card">
				<div class="card-body p-4">
					<h5 class="card-title">Add New Category</h5>
					<hr />
					<div class="alerts_ajax">

					</div>
					<div class="form-body mt-4">
						<div class="row">
							<div class="col-12">
								<div class="border border-3 p-4 rounded">
									<article class="vertical-item content-padding post type-event status-publish format-standard has-post-thumbnail ">
										<div class="item-media post-thumbnail p-5" style="max-height: 500px;">
											<img src="../Images/image.png" alt="" />
										</div>

										<div class="item-content">
											<!-- .post-thumbnail -->
											<header class="entry-header">
												<div class="entry-meta mb-5">
													<div class="entry-date">
														<i class="fa fa-calendar color-main"></i> <span>Start:</span> <span>March 12, 2018</span>
													</div>
													<div class="entry-categories">
														<i class="fa fa-calendar color-main"></i> <span>End:</span> <span>March 12, 2018</span>
													</div>
												</div>
												<!-- .entry-meta -->
											</header>
											<!-- .entry-header -->

											<div class="entry-content">
												<p>At vero eos accusam justo duo dolores et rebum clita kasd gubergren nosea takimata sanctus est dolor sit amet</p>

												<p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor amet consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.</p>
												<h4>Requirements</h4>
												<ul class="list-styled">
													<li>Consetetur sadipscing elitr, sed diam nonumy</li>
													<li>Eirmod tempor invidunt ut labore</li>
													<li>Dolore magna aliquyam erat</li>
													<li>Sed diam voluptua. At vero eos accusam</li>
												</ul>
											</div>
											<!-- .entry-content -->
											<div class="d-flex justify-content-end mt-5">
												<a href="participate.php" class="btn btn-outline-danger">Show Participants</a>
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
<!--app JS-->
<