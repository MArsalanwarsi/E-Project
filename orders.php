<?php
include 'header.php';
include 'body_start.php';
?>
<div class="p-5 bg-light"></div>
<!-- cart-main-area start -->
<div class="cart-main-area section-padding--lg bg--white">
    <?php
    if (isset($_SESSION['user'])) {
        ?>
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wn_checkout_wrap">
                    <div class="checkout_info">
                        <span>Confirm pending orders from your email within 1 hour or your order will be cancelled</span>
                    </div>
                    <div class="checkout_info">
                        <span>Payment should be made in advance and receipt should be provided on Whatsapp +92 9999999999 for order confirmation within 24 hours</span>
                    </div>

                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ol-lg-12">
                    <form action="#">
                        <div class="table-content wnro__table table-responsive" style="overflow: scroll;max-height: 500px;">
                            <table style="overflow: scroll;" >
                                <thead>
                                    <tr class="title-top">
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Book Name</th>
                                        <th>Type</th>
                                        <th class="product-price">Author</th>
                                        <th class="product-quantity">Date</th>
                                        <th class="product-remove">Status</th>
                                        <th class="product-remove">Track</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cartdata = mysqli_query(connection(), "select * from orders where user_id='" . $_SESSION['user'] . "' order by id desc");

                                    foreach ($cartdata as $data) {
                                        ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img
                                                        src="Images/books_images/<?= $data['book_img'] ?>"
                                                        alt="product img"></a></td>
                                            <td class="product-name"><a><?= $data['book_name'] ?></a>
                                            </td>
                                            <td class="product-price"><span class="amount"><?= $data['type'] ?></span></td>
                                            <td class="product-price"><span class="amount">RS <?php echo $data['price'];
                                            ?></span></td>
                                            <td class="product-subtotal"><?php 
                                                echo $data['date_time'];
                                           ?> </td>
                                            <td class="product-subtotal <?php if($data['status'] == "Cancelled"){ echo "text-danger"; } ?>"><?php 
                                                echo $data['status'];
                                           ?> </td>
                                           <?php if($data['status'] != "Cancelled"){ ?>
                                            <td class=" p-4"><a href="tracking.php?t_id=<?= $data['id'] ?>" class="btn btn-warning">Track</a>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<h3 class='text-center text-danger'>No Orders Found</h3>";
    }
    ?>
</div>
<!-- cart-main-area end -->
<?php
include 'body_end.php';
include 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

</script>