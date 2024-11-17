<?php
include 'header.php';
include 'body_start.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="p-5 bg-light"></div>
<!-- cart-main-area start -->
<div class="cart-main-area section-padding--lg bg--white">
    <div class="row mt-5">
        <div class="col-12">
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <?php
                if (isset($_GET['t_id'])) {

                    $t_id = $_GET['t_id'];
                    $query = mysqli_query(connection(), "SELECT * FROM orders  WHERE `id` = '$t_id' ");

                    if (mysqli_num_rows($query) > 0) {
                        $row = mysqli_fetch_assoc($query);
                        $orderNumber = '98765';
                        $orderStatus = $row['status'];
                        $estimatedDelivery = "3-5 days";
                        if ($orderStatus == 'delivered') {
                            $progress = 100;
                            $pack = "#FFCC00";
                            $ship = "#FFCC00";
                            $deliver = "#FFCC00";
                        } else if ($orderStatus == 'shipped') {
                            $progress = 75;
                            $pack = "#FFCC00";
                            $ship = "#FFCC00";
                            $deliver = "#888";
                        } else if ($orderStatus == 'packed') {
                            $progress = 50;
                            $pack = "#FFCC00";
                            $ship = "#888";
                            $deliver = "#888";
                        } else if ($orderStatus == 'confirmed') {
                            $progress = 25;
                            $pack = "#888";
                            $ship = "#888";
                            $deliver = "#888";
                        } else {
                            $pack = "#888";
                            $ship = "#888";
                            $deliver = "#888";
                            $progress = 0;
                        }
                        $deliveryTime = '1:15 PM';

                        // Map order status to corresponding Font Awesome icons
                        $statusIcons = [
                            'Preparing' => 'fa-solid fa-box',
                            'On the way' => 'fas fa-truck',
                            'Delivered' => 'fas fa-box-open',
                        ];
                        $html = "    
                                    <style>
    .order-container {
        background-color: #1E1E1E;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        max-width: 500px;
        width: 100%;
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 2px solid #333;
        padding-bottom: 10px;
    }

    .order-header h2 {
        margin: 0;
        font-size: 26px;
        font-weight: 600;
    }

    .order-status {
        background-color: #FFCC00;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: bold;
        color: #000;
    }

    .order-info {
        margin-bottom: 15px;
        color: #888;
    }

    .order-info label {
        font-weight: bold;
        display: block;
        font-size: 16px;
        color: #888;
    }

    .progress-bar {
        background-color: #333;
        border-radius: 10px;
        overflow: hidden;
        margin: 20px 0;
        position: relative;
    }

    .progress-bar div {
        background-color: #FFCC00;
        height: 20px;
        width: $progress%;
        border-radius: 10px;
        position: relative;
        animation: grow 2s ease-in-out;
    }

    @keyframes grow {
        from {
            width: 0;
        }

        to {
            width: $progress%;
        }
    }

    .step {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 15px 0;
    }

    .step span {
        display: inline-block;
        background-color: #FFCC00;
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }

    .step p {
        margin: 0;
        padding-left: 10px;
        font-size: 16px;
        color: #888;
        flex-grow: 1;
    }

    .delivery-time {
        font-size: 20px;
        font-weight: 600;
        color: #fff;
        text-align: right;
    }

    .order-status-icons {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .order-status-icons i:nth-child(1) {
        font-size: 50px;
        color: $pack;
    }
           .order-status-icons i:nth-child(2) {
        font-size: 50px;
        color: $ship;
    }
           .order-status-icons i:nth-child(3) {
        font-size: 50px;
        color: $deliver;
    }
</style>
                                    <div class='order-container'>
        <div class='order-header'>
            <h2>Order #$orderNumber</h2>
            <span class='order-status'>$orderStatus</span>
        </div>

        <div class='order-status-icons'>
            <!-- Using Font Awesome Icons for Status -->
            <i class='" . $statusIcons['Preparing'] . "'></i> <!-- Preparing -->
            <i class='" . $statusIcons['On the way'] . "'></i> <!-- On the Way -->
            <i class='" . $statusIcons['Delivered'] . "'></i> <!-- Delivered -->
        </div>


        <div class='order-info'>
            <label>Estimated Delivery:</label>
            <span class='tw-bold'>$estimatedDelivery</span>
        </div>

        <div class='progress-bar'>
            <div style='width: $progress%;'></div> <!-- Adjust dynamically -->
        </div>";
                        if ($orderStatus == 'delivered') {
                            $html .= "<div class='step'>
            <span></span>
            <p>Order Confirmed</p>
        </div>
        <div class='step'>
            <span></span>
            <p>Order Packed</p>
        </div>
        <div class='step'>
            <span></span>
            <p>Order Shipped</p>
        </div>
        <div class='step'>
            <span></span>
            <p>Order Out For Delivery</p>
        </div>
        <div class='step'>
            <span></span>
            <p>Order Delivered</p>
        </div>";
                        } else if ($orderStatus == 'shipped') {
                            $html .= "<div class='step'>
            <span></span>
            <p>Order Confirmed</p>
        </div>
         <div class='step'>
            <span></span>
            <p>Order Packed</p>
        </div>
        <div class='step'>
            <span></span>
            <p>Order Shipped</p>
        </div>";
                        } else if ($orderStatus == 'packed') {
                            $html .= "<div class='step'>
            <span></span>
            <p>Order Confirmed</p>
        </div>
         <div class='step'>
            <span></span>
            <p>Order Packed</p>
        </div>";
                        } else if ($orderStatus == 'confirmed') {
                            $html .= "<div class='step'>
            <span></span>
            <p>Order Confirmed</p>
        </div>";
                        } else if ($orderStatus == 'payment pending') {
                            $html .= "<div class='step'>
            <span></span>
            <p>Order Confirmed</p>
        </div><div class='step'>
            <span></span>
            <p>Pending Payment</p>
        </div>";
                        } else {
                            $html .= "<div class='step'>
            <span style='background-color: red;'></span>
            <p>Order Pending Check Email</p>
        </div>";
                        }
                        $html .= "</div>";

                        echo $html;
                    } else {
                        echo "<p class='text-center'>Invalid Tracking Number</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
<?php
include 'body_end.php';
include 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

</script>