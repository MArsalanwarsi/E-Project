<?php
include 'header.php';

include 'body_start.php';
?>

<!-- Start Slider area -->
<div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
    <!-- Start Single Slide -->
    <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider__content">
                        <div class="contentbox">
                            <h2>Buy <span>your </span></h2>
                            <h2>favourite <span>Book </span></h2>
                            <h2>from <span>Here </span></h2>
                            <a class="shopbtn" href="shop.php">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Slide -->
    <!-- Start Single Slide -->
    <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider__content">
                        <div class="contentbox">
                            <h2>Buy <span>your </span></h2>
                            <h2>favourite <span>Book </span></h2>
                            <h2>from <span>Here </span></h2>
                            <a class="shopbtn" href="shop.php">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Slide -->
</div>
<!-- End Slider area -->
<!-- Start BEst Seller Area -->
<section class="wn__product__area brown--color pt--80  pb--30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme mt--50">
            <?php
            $new = mysqli_query(connection(), "SELECT * FROM `books` ORDER BY `books`.`id` DESC LIMIT 6");
            foreach ($new as $n) {
            ?>
                <!-- Start Single Product -->
                <div class="product product__style--3">
                    <div class="product__thumb" style="height:400px;">
                        <a class="first__img h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img src="Images/books_images/<?= $n['book_img1'] ?>"
                                alt="product image" class="h-100"></a>
                        <a class="second__img animation1 h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                src="Images/books_images/<?= $n['book_img2'] ?>" alt="product image" class="h-100"></a>
                        <div class="hot__box">
                            <span class="hot-label">New Arrival</span>
                        </div>
                    </div>
                    <div class="product__content content--center">
                        <h4><a href="single_product.php?pid=<?= $n['id'] ?>"><?= $n['book_name'] ?></a></h4>
                        <ul class="price d-flex">
                            <li>RS <?= $n['after_discount_price'] ?></li>
                            <li class="old_price">RS <?= $n['book_price'] ?></li>
                        </ul>
                        <div class="action">
                            <div class="actions_inner">
                                <ul class="add_to_links">
                                    <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a>
                                    </li>
                                    <li><a class="wishlist" href="wishlist.html"><i
                                                class="bi bi-shopping-cart-full"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product__hover--content">
                            <ul class="rating d-flex">
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li class="on"><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Start Single Product -->
            <?php
            }
            ?>


        </div>
        <!-- End Single Tab Content -->
    </div>
</section>
<!-- Start BEst Seller Area -->
<!-- Start NEwsletter Area -->
<section class="wn__newsletter__area bg-image--2">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
                <div class="section__title text-center">
                    <h2>Stay With Us</h2>
                </div>
                <div class="newsletter__block text-center">
                    <p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest
                        lookbooks and exclusive offers.</p>
                    <form action="#">
                        <div class="newsletter__box">
                            <input type="email" placeholder="Enter your e-mail">
                            <button>Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End NEwsletter Area -->
<!-- Start Best Seller Area -->
<section class="wn__bestseller__area bg--white pt--80  pb--30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">All <span class="color--theme">Products</span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>
        <div class="row mt--50">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="product__nav nav justify-content-center" role="tablist">
                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-all" role="tab">ALL</a>
                    <?php
                    $sql = "SELECT * FROM categories LIMIT 4";
                    $result = mysqli_query(connection(), $sql);
                    $navs = [];
                    foreach ($result as $row) {
                        // remove any whitespace from the category name in between
                        $cat_name = str_replace(' ', '', $row['category_name']);
                        array_push($navs, $cat_name);
                    ?>
                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-<?= $cat_name ?>"
                            role="tab"><?= $row['category_name'] ?></a>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="tab__container tab-content mt--60">
            <!-- Start Single Tab Content -->
            <div class=" single__tab tab-pane fade show active" id="nav-all" role="tabpanel">
                <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                    <div class="single__product">
                        <?php
                        $all = "SELECT * FROM books ORDER BY RAND() LIMIT 10";
                        $result = mysqli_query(connection(), $all);
                        $i = 0;
                        foreach ($result as $n) {
                            $i++;
                        ?>
                            <!-- Start Single Product -->
                            <div class="single__product__inner">
                                <div class="product product__style--3">
                                    <div class="product__thumb" style="height:400px;">
                                        <a class="first__img h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                                src="Images/books_images/<?= $n['book_img1'] ?>" alt="product image" class="h-100"></a>
                                        <a class="second__img animation1 h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                                src="Images/books_images/<?= $n['book_img2'] ?>" alt="product image" class="h-100"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">BEST SELLER</span>
                                        </div>
                                    </div>
                                    <div class="product__content content--center content--center">
                                        <h4><a href="single_product.php?pid=<?= $n['id'] ?>"><?= $n['book_name'] ?></a></h4>
                                        <ul class="price d-flex">
                                            <li>RS <?= $n['after_discount_price'] ?></li>
                                            <li class="old_price">RS <?= $n['book_price'] ?></li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a class="cart" href="cart.html"><i
                                                                class="bi bi-shopping-bag4"></i></a></li>
                                                    <li><a class="compare" href="#"><i
                                                                class="bi bi-heart-beat"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__hover--content">
                                            <ul class="rating d-flex">
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Product -->

                            <?php
                            if ($i == 2) {
                                $i = 0;
                            ?>
                    </div>
                    <div class="single__product">
                <?php
                            }
                        } ?>
                    </div>

                </div>
            </div>
            <!-- End Single Tab Content -->
            <!-- Start Single Tab Content -->
            <div class=" single__tab tab-pane fade show" id="nav-<?= $navs[0] ?>" role="tabpanel">
                <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                    <div class="single__product">
                        <?php
                        $all = "SELECT * FROM books WHERE book_category = '$navs[0]' ORDER BY RAND() LIMIT 10";
                        $result = mysqli_query(connection(), $all);
                        $i = 0;
                        foreach ($result as $n) {
                            $i++;
                        ?>
                            <!-- Start Single Product -->
                            <div class="single__product__inner">
                                <div class="product product__style--3">
                                    <div class="product__thumb" style="height:400px;">
                                        <a class="first__img h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                                src="Images/books_images/<?= $n['book_img1'] ?>" alt="product image" class="h-100"></a>
                                        <a class="second__img animation1 h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                                src="Images/books_images/<?= $n['book_img2'] ?>" alt="product image" class="h-100"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">BEST SELLER</span>
                                        </div>
                                    </div>
                                    <div class="product__content content--center content--center">
                                        <h4><a href="single_product.php?pid=<?= $n['id'] ?>"><?= $n['book_name'] ?></a></h4>
                                        <ul class="price d-flex">
                                            <li>RS <?= $n['after_discount_price'] ?></li>
                                            <li class="old_price">RS <?= $n['book_price'] ?></li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a class="cart" href="cart.html"><i
                                                                class="bi bi-shopping-bag4"></i></a></li>
                                                    <li><a class="compare" href="#"><i
                                                                class="bi bi-heart-beat"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__hover--content">
                                            <ul class="rating d-flex">
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Product -->

                            <?php
                            if ($i == 2) {
                                $i = 0;
                            ?>
                    </div>
                    <div class="single__product">
                <?php
                            }
                        } ?>
                    </div>

                </div>
            </div>
            <!-- End Single Tab Content -->
            <!-- Start Single Tab Content -->
            <div class=" single__tab tab-pane fade show" id="nav-<?= $navs[1] ?>" role="tabpanel">
                <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                    <div class="single__product">
                        <?php
                        $all = "SELECT * FROM books WHERE book_category = '$navs[1]' ORDER BY RAND() LIMIT 10";
                        $result = mysqli_query(connection(), $all);
                        $i = 0;
                        foreach ($result as $n) {
                            $i++;
                        ?>
                            <!-- Start Single Product -->
                            <div class="single__product__inner">
                                <div class="product product__style--3">
                                    <div class="product__thumb" style="height:400px;">
                                        <a class="first__img h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                                src="Images/books_images/<?= $n['book_img1'] ?>" alt="product image" class="h-100"></a>
                                        <a class="second__img animation1 h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                                src="Images/books_images/<?= $n['book_img2'] ?>" alt="product image" class="h-100"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">BEST SELLER</span>
                                        </div>
                                    </div>
                                    <div class="product__content content--center content--center">
                                        <h4><a href="single_product.php?pid=<?= $n['id'] ?>"><?= $n['book_name'] ?></a></h4>
                                        <ul class="price d-flex">
                                            <li>RS <?= $n['after_discount_price'] ?></li>
                                            <li class="old_price">RS <?= $n['book_price'] ?></li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a class="cart" href="cart.html"><i
                                                                class="bi bi-shopping-bag4"></i></a></li>
                                                    <li><a class="compare" href="#"><i
                                                                class="bi bi-heart-beat"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__hover--content">
                                            <ul class="rating d-flex">
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Product -->

                            <?php
                            if ($i == 2) {
                                $i = 0;
                            ?>
                    </div>
                    <div class="single__product">
                <?php
                            }
                        } ?>
                    </div>

                </div>
            </div>
            <!-- End Single Tab Content -->
            <!-- Start Single Tab Content -->
            <div class=" single__tab tab-pane fade show" id="nav-<?= $navs[2] ?>" role="tabpanel">
                <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                    <div class="single__product">
                        <?php
                        $all = "SELECT * FROM books WHERE book_category = '$navs[2]' ORDER BY RAND() LIMIT 10";
                        $result = mysqli_query(connection(), $all);
                        $i = 0;
                        foreach ($result as $n) {
                            $i++;
                        ?>
                            <!-- Start Single Product -->
                            <div class="single__product__inner">
                                <div class="product product__style--3">
                                    <div class="product__thumb" style="height:400px;">
                                        <a class="first__img h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                                src="Images/books_images/<?= $n['book_img1'] ?>" alt="product image" class="h-100"></a>
                                        <a class="second__img animation1 h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                                src="Images/books_images/<?= $n['book_img2'] ?>" alt="product image" class="h-100"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">BEST SELLER</span>
                                        </div>
                                    </div>
                                    <div class="product__content content--center content--center">
                                        <h4><a href="single_product.php?pid=<?= $n['id'] ?>"><?= $n['book_name'] ?></a></h4>
                                        <ul class="price d-flex">
                                            <li>RS <?= $n['after_discount_price'] ?></li>
                                            <li class="old_price">RS <?= $n['book_price'] ?></li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a class="cart" href="cart.html"><i
                                                                class="bi bi-shopping-bag4"></i></a></li>
                                                    <li><a class="compare" href="#"><i
                                                                class="bi bi-heart-beat"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__hover--content">
                                            <ul class="rating d-flex">
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Product -->

                            <?php
                            if ($i == 2) {
                                $i = 0;
                            ?>
                    </div>
                    <div class="single__product">
                <?php
                            }
                        } ?>
                    </div>

                </div>
            </div>
            <!-- End Single Tab Content -->
            <!-- Start Single Tab Content -->
            <div class=" single__tab tab-pane fade show" id="nav-<?= $navs[3] ?>" role="tabpanel">
                <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                    <div class="single__product">
                        <?php
                        $all = "SELECT * FROM books WHERE book_category = '$navs[2]' ORDER BY RAND() LIMIT 10";
                        $result = mysqli_query(connection(), $all);
                        $i = 0;
                        foreach ($result as $n) {
                            $i++;
                        ?>
                            <!-- Start Single Product -->
                            <div class="single__product__inner">
                                <div class="product product__style--3">
                                    <div class="product__thumb" style="height:400px;">
                                        <a class="first__img h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                                src="Images/books_images/<?= $n['book_img1'] ?>" alt="product image" class="h-100"></a>
                                        <a class="second__img animation1 h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img
                                                src="Images/books_images/<?= $n['book_img2'] ?>" alt="product image" class="h-100"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">BEST SELLER</span>
                                        </div>
                                    </div>
                                    <div class="product__content content--center content--center">
                                        <h4><a href="single_product.php?pid=<?= $n['id'] ?>"><?= $n['book_name'] ?></a></h4>
                                        <ul class="price d-flex">
                                            <li>RS <?= $n['after_discount_price'] ?></li>
                                            <li class="old_price">RS <?= $n['book_price'] ?></li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a class="cart" href="cart.html"><i
                                                                class="bi bi-shopping-bag4"></i></a></li>
                                                    <li><a class="compare" href="#"><i
                                                                class="bi bi-heart-beat"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__hover--content">
                                            <ul class="rating d-flex">
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Product -->

                            <?php
                            if ($i == 2) {
                                $i = 0;
                            ?>
                    </div>
                    <div class="single__product">
                <?php
                            }
                        } ?>
                    </div>

                </div>
            </div>
            <!-- End Single Tab Content -->
        </div>
    </div>
</section>
<!-- Start BEst Seller Area -->

<!-- Best Sale Area -->
<section class="best-seel-area pt--80 pb--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center pb--50">
                    <h2 class="title__be--2">Best <span class="color--theme">Seller </span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>
    </div>
    <div class="slider center">
        <?php
        $last=mysqli_query(connection(), "SELECT * FROM books ORDER BY RAND() LIMIT 8");
        foreach ($last as $n) {
        ?>
        <!-- Single product start -->
        <div class="product product__style--3">
            <div class="product__thumb" style="height:250px;">
                <a class="first__img h-100" href="single_product.php?pid=<?= $n['id'] ?>"><img src="Images/books_images/<?= $n['book_img1'] ?>"
                        alt="product image" class="h-100"></a>
            </div>
            <div class="product__content content--center">
                <div class="action">
                    <div class="actions_inner">
                        <ul class="add_to_links">
                            <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product__hover--content">
                    <ul class="rating d-flex">
                        <li class="on"><i class="fa fa-star-o"></i></li>
                        <li class="on"><i class="fa fa-star-o"></i></li>
                        <li class="on"><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Single product end -->
        <?php
        }
        ?>
    </div>
</section>
<!-- Best Sale Area Area -->
<?php
include 'body_end.php';
include 'footer.php';
?>