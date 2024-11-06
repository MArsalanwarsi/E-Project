<?php
include('header.php');
include('body_start.php');
?>
<link rel="stylesheet" href="css/main.css">
<div class="bg-light p-5 w-100"></div>
<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
  <div class="container">
    <div class="row">
      <article class="vertical-item content-padding post type-event status-publish format-standard has-post-thumbnail mt-5">
        <div class="item-media post-thumbnail p-5" style="max-height: 500px;">
          <img src="Images/image.png" alt="" />
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
            <a href="participate.php" class="btn btn-outline-danger">Participate</a>
          </div>
        </div>
        <!-- .item-content -->
      </article>
    </div>
  </div>
</section>
<!-- End My Account Area -->
<?php
include 'body_end.php';
include 'footer.php';
?>
<!-- <script>
      document.querySelector('#wn__header').classList.add('oth-page')
    </script> -->