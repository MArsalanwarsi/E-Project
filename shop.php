<?php
include 'header.php';
include 'body_start.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$per_page = 9;
$start_from = ($page - 1) * $per_page;

$result = mysqli_query(connection(), "SELECT * FROM books LIMIT $start_from, $per_page");
// get url parameters
if (isset($_GET['category']) && isset($_GET['price'])) {
    $category = $_GET['category'];
    $price = $_GET['price'];
    preg_match_all('/\d+/', $price, $matches);
    $min = $matches[0][0];
    $max = $matches[0][1];
    $total_rows = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT COUNT(*) AS total_rows FROM books WHERE book_category = '$category' AND after_discount_price BETWEEN $min AND $max"));
} else if (isset($_GET['price'])) {
    preg_match_all('/\d+/', $_GET['price'], $matches);
    $min = $matches[0][0];
    $max = $matches[0][1];
    $total_rows = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT COUNT(*) AS total_rows FROM books WHERE after_discount_price BETWEEN $min AND $max"));
} else if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $total_rows = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT COUNT(*) AS total_rows FROM books WHERE book_category = '$category'"));
} else {
    $total_rows = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT COUNT(*) AS total_rows FROM books"));
}
$total_pages = ceil($total_rows['total_rows'] / $per_page);

?>
<!-- Start breadcrumb area -->
<div class="p-5 bg-light"></div>
<!-- End breadcrumb area -->
<!-- Start Shop Page -->
<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                <div class="shop__sidebar">
                    <aside class="widget__categories products--cat">
                        <h3 class="widget__title">Product Categories</h3>
                        <ul>
                            <?php
                            $cat_list = mysqli_query(connection(), "select * from categories");
                            foreach ($cat_list as $c) {
                                $count = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT COUNT(*) AS fantasy_book_count FROM books WHERE book_category = '" . $c['category_name'] . "';"));
                            ?>
                                <li><a href="shop.php?category=<?= $c['category_name'] ?>"><?= $c['category_name'] ?> <span>(<?= $count['fantasy_book_count'] ?>)</span></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </aside>
                    <aside class="widget__categories pro--range">
                        <h3 class="widget__title">Filter by price</h3>
                        <div class="content-shopby">
                            <div class="price_filter s-filter clear">
                                <form action="#" method="GET">
                                    <div id="slider-range"></div>
                                    <div class="slider__range--output">
                                        <div class="price__output--wrap">
                                            <div class="price--output">
                                                <span>Price :</span><input type="text" id="p_filter" readonly="">
                                            </div>
                                            <div class="price--filter mt-2">
                                                <a type="button" class="filter_btn">Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9 col-12 order-1 order-lg-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                            <div class="shop__list nav justify-content-center" role="tablist">
                                <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-grid"
                                    role="tab"><i class="fa fa-th"></i></a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-list" role="tab"><i
                                        class="fa fa-list"></i></a>
                            </div>
                            <p>Showing 1–12 of 40 results</p>
                            <div class="orderby__wrapper">
                                <span>Sort By</span>
                                <select class="shot__byselect">
                                    <option>Default sorting</option>
                                    <option>Price Low to High</option>
                                    <option>Price High to Low</option>
                                    <option>Newest First</option>
                                    <option>Oldest First</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab__container tab-content">
                    <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                        <div class="row AllShopData1">
                            <!-- from code.php -->
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center pagination_page">

                            </ul>
                        </nav>
                    </div>
                    <!-- single list -->
                    <div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
                        <div class="AllShopData2"></div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center pagination_page">

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
<?php
include 'body_end.php';
include 'footer.php';

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"></script>
<script>
    var urlParams = new URLSearchParams(window.location.search);
    var category = urlParams.get('category');
    var price = urlParams.get('price');
    $('.pagination_page').twbsPagination({
        totalPages: <?php echo $total_pages; ?>,
        visiblePages: 6,
        next: 'Next',
        prev: 'Prev',
        onPageClick: function(event, page) {
            if (category!=null && price!=null) {
                $.ajax({
                    url: 'code.php',
                    type: 'POST',
                    data: {
                        filter_cat_price1: price,
                        filter_page_cat1: page,
                        filter_shop_cat1: category
                    },
                    success: function(data) {
                        alert(data);
                        $('.AllShopData1').html(data);
                    }
                });
                $.ajax({
                    url: 'code.php',
                    type: 'POST',
                    data: {
                        filter_cat_price2: price,
                        filter_page_cat2: page,
                        filter_shop_cat2: category
                    },
                    success: function(data) {
                        alert(data);

                        $('.AllShopData2').html(data);

                    }
                });
            } else if (price!=null) {
                $.ajax({
                    url: 'code.php',
                    type: 'POST',
                    data: {
                        filter_price1: price,
                        filter_page1: page
                    },
                    success: function(data) {
                        alert(data);

                        $('.AllShopData1').html(data);
                    }
                });
                $.ajax({
                    url: 'code.php',
                    type: 'POST',
                    data: {
                        filter_price2: price,
                        filter_page2: page
                    },
                    success: function(data) {
                        alert(data);

                        $('.AllShopData2').html(data);

                    }
                });
            } else if (category!=null) {
                $.ajax({
                    url: 'code.php',
                    type: 'POST',
                    data: {
                        shop_page_cat1: page,
                        shop_category1: categosry
                    },
                    success: function(data) {
                        alert(data);

                        $('.AllShopData1').html(data);
                    }
                });
                $.ajax({
                    url: 'code.php',
                    type: 'POST',
                    data: {
                        shop_page_cat2: page,
                        shop_category2: category
                    },
                    success: function(data) {
                        alert(data);

                        $('.AllShopData2').html(data);
                    }
                });
            } else {
                $.ajax({
                    url: 'code.php',
                    type: 'POST',
                    data: {
                        shop_page1: page
                    },
                    success: function(data) {
                        alert(data);

                        $('.AllShopData1').html(data);
                    }
                });
                $.ajax({
                    url: 'code.php',
                    type: 'POST',
                    data: {
                        shop_page2: page
                    },
                    success: function(data) {
                        alert(data);

                        $('.AllShopData2').html(data);
                    }
                });
            }



        }

    });
    $('.filter_btn').on('click', function() {
        var price = $('#p_filter').val();
        var currentUrl = window.location.href;
        var check = new URLSearchParams(window.location.search);
        // Check if the URL already has a query string
        var hasQueryString = currentUrl.indexOf('?') !== -1;

        // Construct the new parameter
        var newParam = 'price=' + price; // Replace with your desired parameter

        // Add the parameter to the URL

        if (currentUrl.indexOf('?price') !== -1 || currentUrl.indexOf('&price') !== -1) {
            // delete params price
            currentUrl = currentUrl.replace(/&price=[^&]*/g, '');
            currentUrl = currentUrl.replace(/price=[^&]*/g, '');
            if (hasQueryString) {
                currentUrl += '&' + newParam;
            } else {
                currentUrl += '?' + newParam;
            }
        } else if (hasQueryString) {
            currentUrl += '&' + newParam;
        } else {
            currentUrl += '?' + newParam;
        }


        // Redirect to the new URL
        window.location.href = currentUrl;
    });
    $('.filter_btn').on('click', function() {
        var price = $('#p_filter').val();
        $.ajax({
            url: 'code.php',
            type: 'POST',
            data: {
                pages_checker: price
            },
            success: function(data) {
                var total_pages = data;

                $('.pagination_page').twbsPagination('destroy');
                $('.pagination_page').twbsPagination({
                    totalPages: total_pages,
                    visiblePages: 6,
                    next: 'Next',
                    prev: 'Prev',
                    onPageClick: function(event, page) {
                        if (category) {
                            $.ajax({
                                url: 'code.php',
                                type: 'POST',
                                data: {
                                    filter_cat_price1: price,
                                    filter_page_cat1: page,
                                    filter_shop_cat1: category
                                },
                                success: function(data) {
                                    $('.AllShopData1').html(data);
                                }
                            });
                            $.ajax({
                                url: 'code.php',
                                type: 'POST',
                                data: {
                                    filter_cat_price2: price,
                                    filter_page_cat2: page,
                                    filter_shop_cat2: category
                                },
                                success: function(data) {
                                    $('.AllShopData2').html(data);

                                }
                            });
                        } else {
                            $.ajax({
                                url: 'code.php',
                                type: 'POST',
                                data: {
                                    filter_price1: price,
                                    filter_page1: page
                                },
                                success: function(data) {
                                    $('.AllShopData1').html(data);
                                }
                            });
                            $.ajax({
                                url: 'code.php',
                                type: 'POST',
                                data: {
                                    filter_price2: price,
                                    filter_page2: page
                                },
                                success: function(data) {
                                    $('.AllShopData2').html(data);

                                }
                            });
                        }

                    }
                });
            }
        })
    })
</script>