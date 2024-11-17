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
                <div class="col-md-12 col-sm-12 ol-lg-12">
                    <form action="#">
                        <div class="table-content wnro__table table-responsive">
                            <table>
                                <thead>
                                    <tr class="title-top">
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product Name</th>
                                        <th>Type</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img
                                                        src="Images/books_images/<?= $data['book_img1'] ?>"
                                                        alt="product img"></a></td>
                                            <td class="product-name"><a
                                                    href="single_product.php?pid=<?= $data['book_id'] ?>"><?= $data['book_name'] ?></a>
                                            </td>
                                            <td class="product-price"><span class="amount"><?= $data['type'] ?></span></td>
                                            <td class="product-price"><span class="amount">RS <?php if ($data['type'] == "pdf") {
                                                                                                    echo $data['pdf_price'];
                                                                                                } else {
                                                                                                    echo $data['after_discount_price'];
                                                                                                } ?></span></td>
                                            <td class="product-quantity"><?php if ($data['type'] == "hardcover") { ?><button
                                                        class="btn border-0 decrement" data-id="<?= $data['id'] ?>"
                                                        style="box-shadow: none"><i
                                                            class="fa fa-minus"></i></button><?php } ?><input type="number"
                                                    value="<?= $data['quantity'] ?>" class="text-center quantity"
                                                    data-id="<?= $data['id'] ?>"
                                                    readonly><?php if ($data['type'] == "hardcover") { ?><button
                                                        class="btn border-0 increment" style="box-shadow: none"
                                                        data-id="<?= $data['id'] ?>"><i class="fa fa-plus"></i></button><?php } ?>
                                            </td>
                                            <td class="product-subtotal">RS <?php if ($data['type'] == "pdf") {
                                                                                echo $data['pdf_price'];
                                                                            } else {
                                                                                echo $data['after_discount_price'] * $data['quantity'];
                                                                            } ?> </td>
                                            <td class="product-remove p-4"><button class="btn btn-danger deletebtn"
                                                    data-id="<?= $data['id'] ?>"><i class="fa fa-trash text-white"></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="cartbox__btn">
                        <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-end">
                            <li><a href="checkout.php">Check Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="cartbox__total__area">
                        <div class="cartbox-total d-flex justify-content-between">
                            <ul class="cart__total__list">
                                <li>Cart total</li>
                                <li><?php if ($shipping == "yes") {
                                        echo "Shipping";
                                    } else {
                                        echo "Shipping";
                                    } ?></li>
                            </ul>
                            <ul class="cart__total__tk">
                                <li><?= $total ?></li>
                                <li><?php if ($shipping == "yes") { ?>Rs 300<?php } else { ?>No Shipping<?php } ?></li>
                            </ul>
                        </div>
                        <div class="cart__total__amount">
                            <span>Grand Total</span>
                            <span>Rs <?php if ($shipping == "yes") {
                                            echo $total + 300;
                                        } else {
                                            echo $total;
                                        } ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "<h3 class='text-center text-danger'>Please Login to Veiw Cart</h3>";
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
    $(".increment").on('click', function() {
        var id = $(this).attr('data-id');
        // increase quantity in same data-id input
        var input = $(this).parent().parent().find('.quantity');
        input.val(parseInt(input.val()) + 1);
        // trigger change event
        input.trigger('change');
    })

    $(".decrement").on('click', function() {
        var id = $(this).attr('data-id');
        // decrease quantity in same data-id input
        var input = $(this).parent().parent().find('.quantity');
        input.val(parseInt(input.val()) - 1);
        if (input.val() == 0) {
            input.val(1);
        }
        // trigger change event
        input.trigger('change');

    })

    $(".quantity").on('change', function() {
        var quantity = $(this).val();
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'code.php',
            method: 'post',
            data: {
                update_quantity_data: quantity,
                update_qty_id: id
            },
            success: function(response) {
                if (response == "success") {
                    location.reload();
                } else {
                    alert(response);
                }
            }
        })

    })
    $(".deletebtn").on('click', function() {
        var id = $(this).attr('data-id');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'code.php',
                    method: 'post',
                    data: {
                        delete_cart_data: id
                    },
                    success: function(response) {
                        if (response == "success") {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your book has been deleted.",
                                icon: "success"
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            alert(response);
                        }
                    }
                })

            }
        });

    })
</script>