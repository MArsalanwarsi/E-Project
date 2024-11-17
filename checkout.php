<?php
include 'header.php';
include 'body_start.php';
?>
<div class="p-5 bg-light"></div>
<!-- Start Checkout Area -->
<section class="wn__checkout__area section-padding--lg bg__white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wn_checkout_wrap">
                    <div class="checkout_info">
                        <span>Payment should be made in advance and receipt should be provided on Whatsapp +92 9999999999</span>
                    </div>
                    <div class="checkout_info">
                        <span>Email will be send to your email address for order confirmation and will be only valid for 30 minutes</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="customer_details">
                    <h3>Billing details</h3>
                    <div class="customar__field">

                        <div class="input_box n">
                            <label>Full name <span>*</span></label>
                            <input type="text" placeholder="First and last name" id="name">
                        </div>


                        <div class="input_box">
                            <label>Country<span>*</span></label>
                            <select class="select__option" id="country">
                                <option>Select a country…</option>
                                <?php
                                $countries = mysqli_query(connection(), "SELECT * FROM country");
                                foreach ($countries as $country) { ?>
                                    <option><?= $country['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input_box">
                            <label>Address <span>*</span></label>
                            <input type="text" placeholder="Complete address" id="address">
                        </div>
                        <div class="input_box">
                            <label>Town / City <span>*</span></label>
                            <input type="text" placeholder="City" id="city">
                        </div>
                        <div class="input_box">
                            <label>Postcode / ZIP <span>*</span></label>
                            <input type="text" placeholder="Postcode / ZIP" id="postcode">
                        </div>
                        <div class="margin_between">
                            <div class="input_box space_between">
                                <label>Phone <span>*</span></label>
                                <input type="text" id="phone" placeholder="Phone number">
                            </div>

                            <div class="input_box space_between">
                                <label>Email address <span>*</span></label>
                                <input type="email" id="email" placeholder="Email address">
                            </div>
                        </div>

                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-end">
                                <li><a id="place_order" type="button">Place Order</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
                <div class="wn__order__box">
                    <h3 class="order__title">Your order</h3>
                    <ul class="order__total">
                        <li>Product</li>
                        <li>Total</li>
                    </ul>
                    <ul class="order_product">
                        <?php
                        $cartdata = mysqli_query(connection(), "select cart.*,
                         books.book_img1,books.book_name,books.after_discount_price,books.pdf_price from cart inner join books on cart.book_id=books.id where user_id='" . $_SESSION['user'] . "'");
                        $shipping = "no";
                        $total = 0;
                        foreach ($cartdata as $data) {
                            if ($data['type'] == "pdf") {
                                $total = $total + ($data['pdf_price']);
                            } else {
                                $total = $total + ($data['after_discount_price'] * $data['quantity']);
                            };
                            if ($data['type'] == "hardcover") {
                                $shipping = "yes";
                            }
                        ?>
                            <li><?= $data['book_name'] ?> × <?= $data['quantity'] ?> (<?= $data['type'] ?>)<span>RS <?php if ($data['type'] == "pdf") {
                                                                                                                        echo $data['pdf_price'];
                                                                                                                    } else {
                                                                                                                        echo $data['after_discount_price'] * $data['quantity'];
                                                                                                                    } ?></span></li>
                        <?php } ?>
                    </ul>
                    <ul class="shipping__method">
                        <li>Cart Subtotal <span>RS <?php echo $total ?></span></li>
                        <li>Shipping
                            <ul>
                                <li>
                                    <label><?php if ($shipping == "yes") { ?>Rs 300<?php } else { ?>No Shipping<?php } ?></label>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="total__amount">
                        <li>Order Total <span>RS <?php if ($shipping == "yes") {
                                                        echo $total + 300;
                                                    } else {
                                                        echo $total;
                                                    } ?></span></li>
                    </ul>
                </div>
                <div id="accordion" class="checkout_accordion mt--30" role="tablist">
                    <div class="payment">
                        <div class="che__header" role="tab" id="headingOne">
                            <a class="checkout__title" data-bs-toggle="collapse" href="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                <span class="me-2">Direct Bank Transfer</span> <img src="images/icons/payment.png" alt="payment images">
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                            data-bs-parent="#accordion">
                            <div class="payment-body">Make your payment directly into our bank account. Please
                                use your Order ID as the payment reference. Your order won’t be shipped until
                                the funds have cleared in our account.
                                <p class="mt-2 fw-bold">IBAN Number : PK36SCBL0000001123456702</p>
                            </div>
                        </div>
                    </div>
                    <div class="payment">
                        <div class="che__header" role="tab" id="headingTwo">
                            <a class="collapsed checkout__title" data-bs-toggle="collapse" href="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <span>Cheque Payment</span>
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                            data-bs-parent="#accordion">
                            <div class="payment-body">Please send your cheque to Store Name, Store Street, Store
                                Town, Store State / County, Store Postcode.
                            </div>
                        </div>
                    </div>
                    <div class="payment">
                        <div class="che__header" role="tab" id="headingThree">
                            <a class="collapsed checkout__title" data-bs-toggle="collapse" href="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                <span>Jazzcash / EasyPaisa</span>
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree"
                            data-bs-parent="#accordion">
                            <div class="payment-body fw-bold">
                                Account Name: E-Shelf <br>
                                Jazzcash: +92345678900 <br> EasyPaisa: +92345678900</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- End Checkout Area -->
<!-- Footer Area -->
<?php
include 'body_end.php';
include 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#place_order').on('click', function() {
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var country = $('#country').val();
            var zip = $('#postcode').val();
            if (name == '' || email == '' || phone == '' || address == '' || city == '' || country == '' || zip == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'All fields are required',
                })
            } else {
                $('#place_order').text('Placing Order...');
                $.ajax({
                    url: 'code.php',
                    method: 'post',
                    data: {
                        order_name: name,
                        order_email: email,
                        order_phone: phone,
                        order_address: address,
                        order_city: city,
                        order_country: country,
                        order_zip: zip
                    },
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Order Placed Successfully. Please confirm your order from your email within 1 Hour or your order will be cancelled.',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'orders.php';
                                }
                            })
                        } else if(response == 'failed') {
                            alert(response);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Order Placing Failed',
                            })
                        }else{
                            alert(response);
                        }
                    }
                })
            }
        })
    });
</script>