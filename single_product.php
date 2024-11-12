﻿<?php
include 'header.php';
include 'body_start.php';
$des = mysqli_fetch_assoc(mysqli_query(connection(), "select * from books where id= " . $_GET['pid'] . ""));
?>

<div class="p-5 bg-light"></div>
<!-- End breadcrumb area -->
<!-- Start main Content -->
<div class="maincontent bg--white pt--80 pb--55">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="wn__single__product">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="wn__fotorama__wrapper">
                                <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                    <a><img src="Images/books_images/<?= $des['book_img1'] ?>" alt="" class="h-100"></a>
                                    <a><img src="Images/books_images/<?= $des['book_img2'] ?>" alt="" class="h-100"></a>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product__info__main">
                                <h1><?= $des['book_name'] ?></h1>
                                <div class="product-reviews-summary d-flex">
                                    <ul class="rating-summary d-flex">
                                        <li><i class="zmdi zmdi-star-outline"></i></li>
                                        <li><i class="zmdi zmdi-star-outline"></i></li>
                                        <li><i class="zmdi zmdi-star-outline"></i></li>
                                        <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                        <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                    </ul>
                                </div>
                                <div class="price-box d-flex gap-3">
                                    <span>RS <?= $des['after_discount_price'] ?></span>
                                    <span class="text-danger text-decoration-line-through" style="font-size:medium">RS <?= $des['book_price'] ?></span>
                                </div>
                                <div class="product__overview">
                                    <p><?= substr($des['book_des'], 0, 500) ?></p>
                                </div>
                                <div class="box-tocart d-flex">
                                    <span>Qty</span>
                                    <input id="qty" class="input-text qty" name="qty" min="1" value="1"
                                        title="Qty" type="number">
                                    <div class="addtocart__actions">
                                        <button class="tocart" type="submit" title="Add to Cart">Add to
                                            Cart
                                        </button>
                                    </div>
                                    <div class="product-addto-links clearfix">
                                        <a class="wishlist" href="#"></a>
                                    </div>
                                </div>
                                <div class="product_meta">
                                    <span class="posted_in">Category:

                                        <a href="#"><?= $des['book_category'] ?></a>
                                    </span>
                                </div>
                                <div class="product-share">
                                    <ul>
                                        <li class="categories-title">Share :</li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-social-twitter icons"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-social-tumblr icons"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-social-facebook icons"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-social-linkedin icons"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__info__detailed">
                    <div class="pro_details_nav nav justify-content-start" role="tablist">
                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-details"
                            role="tab">Details</a>
                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-review" role="tab">Reviews</a>
                    </div>
                    <div class="tab__container tab-content">
                        <!-- Start Single Tab Content -->
                        <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                            <div class="description__attribute">
                                <p><?= $des['book_des'] ?></p>

                            </div>
                        </div>
                        <!-- End Single Tab Content -->
                        <!-- Start Single Tab Content -->
                        <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
                            <div class="review__attribute">
                                <h1>Customer Reviews</h1>
                                <h2>Hastech</h2>
                                <div class="review__ratings__type d-flex">
                                    <div class="review-ratings">
                                        <div class="rating-summary d-flex">
                                            <span>Quality</span>
                                            <ul class="rating d-flex">
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>

                                        <div class="rating-summary d-flex">
                                            <span>Price</span>
                                            <ul class="rating d-flex">
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="rating-summary d-flex">
                                            <span>value</span>
                                            <ul class="rating d-flex">
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p>Hastech</p>
                                        <p>Review by Hastech</p>
                                        <p>Posted on 11/6/2018</p>
                                    </div>
                                </div>
                            </div>
                            <div class="review-fieldset">
                                <h2>You're reviewing:</h2>
                                <h3>Chaz Kangeroo Hoodie</h3>
                                <div class="review-field-ratings">
                                    <div class="product-review-table">
                                        <div class="review-field-rating d-flex">
                                            <span>Quality</span>
                                            <ul class="rating d-flex">
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="review-field-rating d-flex">
                                            <span>Price</span>
                                            <ul class="rating d-flex">
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="review-field-rating d-flex">
                                            <span>Value</span>
                                            <ul class="rating d-flex">
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="review_form_field">
                                    <div class="input__box">
                                        <span>Nickname</span>
                                        <input id="nickname_field" type="text" name="nickname">
                                    </div>
                                    <div class="input__box">
                                        <span>Summary</span>
                                        <input id="summery_field" type="text" name="summery">
                                    </div>
                                    <div class="input__box">
                                        <span>Review</span>
                                        <textarea name="review"></textarea>
                                    </div>
                                    <div class="review-form-actions">
                                        <button>Submit Review</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab Content -->
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                <div class="shop__sidebar">
                    <aside class="widget__categories products--cat">
                        <h3 class="widget__title">Product Categories</h3>
                        <ul>
                            <?php
                            $cat_list = mysqli_query(connection(), "select * from categories");
                            foreach ($cat_list as $c) {
                                $count = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT COUNT(*) AS fantasy_book_count FROM books WHERE book_category = '" . $c['category_name'] . "';"));
                            ?>
                                <li><a href="#"><?= $c['category_name'] ?> <span>(<?= $count['fantasy_book_count'] ?>)</span></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </aside>
                    <aside class="widget__categories pro--range">
                        <h3 class="widget__title">Filter by price</h3>
                        <div class="content-shopby">
                            <div class="price_filter s-filter clear">
                                <form action="code.php" method="GET">
                                    <div id="slider-range"></div>
                                    <div class="slider__range--output">
                                        <div class="price__output--wrap">
                                            <div class="price--output d-flex gap-0">
                                                <span>Price:</span><span class="d-flex gap-0"><input type="text" id="min" readonly="" name="pric_filter" clas="m-0  p-0">
                                                <input type="text" id="max" readonly="" name="pric_filter" class="m-0 p-0"></span>
                                            </div>
                                            <div class="price--filter">
                                                <button type="submit" href="#">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </aside>

                </div>
            </div>
            <div class="col-12">
                <div class="wn__related__product pt--80 pb--50">
                    <div class="section__title text-center">
                        <h2 class="title__be--2">Related Products</h2>
                    </div>
                    <div class="row mt--60">
                        <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                            <?php
                            $related = mysqli_query(connection(), "SELECT * FROM books ORDER BY RAND() LIMIT 6;");
                            foreach ($related as $row) {
                            ?>
                                <!-- Start Single Product -->
                                <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="product__thumb" style="height:550px;">
                                        <a class="first__img h-100" href="single-product.html"><img
                                                src="Images/books_images/<?= $row['book_img1'] ?>" alt="product image" class="h-100"></a>
                                        <a class="second__img animation1 h-100" href="single-product.html"><img
                                                src="Images/books_images/<?= $row['book_img2'] ?>" alt="product image" class="h-100"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">BEST SALLER</span>
                                        </div>
                                    </div>
                                    <div class="product__content content--center">
                                        <h4><a href="single-product.html"><?= $row['book_name'] ?></a></h4>
                                        <ul class="price d-flex">
                                            <li>RS <?= $row['after_discount_price'] ?></li>
                                            <li class="old_price">RS <?= $row['book_price'] ?></li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a class="cart" href="cart.html"><i
                                                                class="bi bi-shopping-bag4"></i></a></li>
                                                    <li><a class="compare" href="#"><i
                                                                class="bi bi-heart-beat"></i></a></li>
                                                    <li><a title="Quick View"
                                                            class="quickview modal-view detail-link"
                                                            href="#productmodal"><i class="bi bi-search"></i></a>
                                                    </li>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main Content -->

    <?php
    include 'body_end.php';
    include 'footer.php'
    ?>
    <!-- <script>
        document.querySelector('#wn__header').classList.add('oth-page')
    </script> -->