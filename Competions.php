<?php
include('header.php');
include('body_start.php');
?>
<link rel="stylesheet" href="css/main.css">
      <!-- Start breadcrumb area -->
      <div class="ht__breadcrumb__area bg-image--6 ">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="breadcrumb__inner text-center">
                <h2 class="breadcrumb-title">Events</h2>
                <nav class="breadcrumb-content">
                  <a class="breadcrumb_item" href="index.php">Home</a>
                  <span class="brd-separator">/</span>
                  <span class="breadcrumb_item active">Events</span>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End breadcrumb area -->
      <!-- Start My Account Area -->
      <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
          <div class="row">
            <article class="post side-item content-padding ds ms">
              <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-5 p-3">
                 
                    <img src="Images/image.png" alt="" />
                    <div class="media-links">
                      <a class="abs-link" title="" href="Competition_details.php"></a>
                    </div>
                 
                </div>

                <div class="col-xl-8 col-lg-7 col-md-6">
                  <div class="item-content text-white">
                    <h5>
                      <a href="Competition_details.php">Magna aliquyam erased voluptua</a>
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
            <article class="post side-item content-padding ds ms">
                <div class="row">
                  <div class="col-xl-4 col-lg-5 col-md-5 p-3">
                   
                      <img src="Images/image.png" alt="" />
                      <div class="media-links">
                        <a class="abs-link" title="" href="Competition_details.php"></a>
                      </div>
                   
                  </div>
  
                  <div class="col-xl-8 col-lg-7 col-md-6">
                    <div class="item-content">
                      <h5>
                        <a href="Competition_details.php">Magna aliquyam erased voluptua</a>
                      </h5>
  
                      <p class="item-meta color-darkgrey"><i class="fa fa-calendar color-main"></i> <span>March 12, 2018</span> <i class="fa fa-map-marker color-main"></i> <span>Consetetur sadipscing elitr</span></p>
                      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam et dolore magna aliquyam erat.</p>
                    </div>
                  </div>
                </div>
              </article>
          </div>
        </div>
      </section>
      <!-- End My Account Area -->
<?php
include 'body_end.php';
include 'footer.php';
?>
<script>
  document.querySelector('#wn__header').classList.add('oth-page')
</script>

