<body>
    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        <!-- Header -->
        <header id="wn__header" class="header__area header__absolute sticky__header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <div class="logo d-flex align-items-center gap-2">
                            <a href="index-2.html">
                                <img src="Images/main_images/<?php echo $main['logo'] ?>" alt="logo images" style="width: 50px;">
                            </a>
                            <!-- <p style="font-size: 20px;color: #ce7852;font-weight: bold"><?php echo $main['name'] ?></p> -->
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <nav class="mainmenu__nav">
                            <ul class="meninmenu d-flex justify-content-start">
                                <li class=""><a href="index.php">Home</a>
                                </li>
                                <li class=""><a href="shop.php">Shop</a>
                                </li>
                                <li class="drop"><a href="shop-grid.html">Books</a>
                                    <div class="megamenu mega03">
                                        <ul class="item item03">
                                            <li class="title">Categories</li>
                                            <li><a href="shop-grid.html">Biography </a></li>
                                            <li><a href="shop-grid.html">Business </a></li>
                                            <li><a href="shop-grid.html">Cookbooks </a></li>
                                            <li><a href="shop-grid.html">Health & Fitness </a></li>
                                            <li><a href="shop-grid.html">History </a></li>
                                        </ul>
                                        <ul class="item item03">
                                            <li class="title">Customer Favourite</li>
                                            <li><a href="shop-grid.html">Mystery</a></li>
                                            <li><a href="shop-grid.html">Religion & Inspiration</a></li>
                                            <li><a href="shop-grid.html">Romance</a></li>
                                            <li><a href="shop-grid.html">Fiction/Fantasy</a></li>
                                            <li><a href="shop-grid.html">Sleeveless</a></li>
                                        </ul>
                                        <ul class="item item03">
                                            <li class="title">Collections</li>
                                            <li><a href="shop-grid.html">Science </a></li>
                                            <li><a href="shop-grid.html">Fiction/Fantasy</a></li>
                                            <li><a href="shop-grid.html">Self-Improvemen</a></li>
                                            <li><a href="shop-grid.html">Home & Garden</a></li>
                                            <li><a href="shop-grid.html">Humor Books</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="Competions.php">Events</a></li>
                                <li><a href="contact.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                            <li class="shop_search"><a class="search__active" href="#"></a></li>
                            <li class="wishlist"><a href="#"></a></li>
                            <li class="shopcart"><a class="" href="cart.php"><span
                                        class="product_qun" id="cart_count">0</span></a>
                            </li>
                            <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                                <div class="searchbar__content setting__block">
                                    <div class="content-inner">
                                        <div class="switcher-currency">
                                            <strong class="label switcher-label">
                                                <span>My Account</span>
                                            </strong>
                                            <div class="switcher-options">
                                                <div class="switcher-currency-trigger">
                                                    <div class="setting__menu">
                                                        <?php if (isset($_SESSION['user'])) {
                                                            // get current page url
                                                            $current_page = $_SERVER['REQUEST_URI'];
                                                        ?>
                                                            <span><a href="#">My Account</a></span>
                                                            <span><a href="logout.php?redirect=<?= $current_page ?>">Logout</a></span>
                                                        <?php
                                                        } else { ?>
                                                            <span><a href="user_signin.php">Sign In</a></span>
                                                            <span><a href="user_signup.php">Create An Account</a></span>
                                                        <?php
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Start Mobile Menu -->
                <div class="row d-none">
                    <div class="col-lg-12 d-none">
                        <nav class="mobilemenu__nav">
                            <ul class="meninmenu">
                                <li><a href="index.php">Home</a>
                                </li>
                                <li><a href="shop.php">Shop</a>
                                </li>
                                <li><a href="">Books</a>
                                    <ul>
                                        <li><a href="blog.html">Blog Page</a></li>
                                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End Mobile Menu -->
                <div class="mobile-menu d-block d-lg-none">
                </div>
                <!-- Mobile Menu -->
            </div>
        </header>
        <!-- //Header -->
        <!-- Start Search Popup -->
        <div class="brown--color box-search-content search_active block-bg close__top">
            <form id="search_mini_form" class="minisearch" action="#">
                <div class="field__search">
                    <input type="text" placeholder="Search entire store here...">
                    <div class="action">
                        <a href="#"><i class="zmdi zmdi-search"></i></a>
                    </div>
                </div>
            </form>
            <div class="close__wrap">
                <span>close</span>
            </div>
        </div>
        <!-- End Search Popup -->