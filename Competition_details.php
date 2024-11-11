<?php
include('header.php');
include('body_start.php');
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

<link rel="stylesheet" href="css/main.css">
<div class="bg-light p-5 w-100"></div>
<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
  <div class="container">
    <div class="row">
      <article class="vertical-item content-padding post type-event status-publish format-standard has-post-thumbnail ">
        <div class="item-media post-thumbnail p-5" style="max-height: 500px;">
          <img src="Images/events_images/<?php echo $data['event_img'] ?>" alt="" />
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
            <?php if ($data['status'] == 'ongoing') {
            ?>
              <a href="participate.php?id=<?php echo $data['id'] ?>" class="btn btn-outline-danger">Participate</a>
            <?php
            } else if ($data['status'] == 'announced') {
            ?>
              <a href="announced.php?id=<?php echo $data['id'] ?>" class="btn btn-outline-success">Winner Announced</a>
            <?php
            } else {
            ?>
              <button class="btn btn-danger" disabled>Finished</button>
            <?php
            } ?>

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