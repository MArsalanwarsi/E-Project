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
    <div class="row p-2">
      <?php
      $data = mysqli_query(connection(), "select * from events order by id desc");
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
        <article class="post side-item content-padding ds ms w-100">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 p-3">

              <img src="Images/events_images/<?php echo $row['event_img'] ?>" alt="" style="max-height: 200px;width: 100%; height:100%" />
              <div class="media-links">
                <a class="abs-link" title="" href="Competition_details.php?id=<?php echo $row['id'] ?>"></a>
              </div>

            </div>

            <div class="col-xl-8 col-lg-7 col-md-6">
              <div class="item-content text-white">
                <h5>
                  <a href="Competition_details.php?id=<?php echo $row['id'] ?>"><?php echo $row['event_title'] ?></a>
                </h5>
                <div class="d-flex gap-3">
                  <?php if ($row['status'] == 'ongoing') { ?>
                    <p class="item-meta color-darkgrey"><i class="fa fa-calendar color-main"></i> <span>Start:</span><span class="ps-0"><?php echo datatime($row['event_start'])   ?></span> </p>
                    <p class="item-meta color-darkgrey"><i class="fa fa-calendar color-main"></i> <span>End:</span><span class="ps-0"><?php echo datatime($row['event_end'])   ?></span></p>
                  <?php } else { ?>
                    <p class="item-meta color-darkgrey mb-3"><i class="fa fa-calendar color-main"></i> <span>Finished</span></p>
                  <?php } ?>
                </div>

                <p><?php
                    echo substr($row['event_description'], 0, 100); ?></p>
              </div>
            </div>
          </div>
        </article>
      <?php
      }
      ?>


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