<?php include 'header.php';
include 'body_start.php'; ?>
<script src="js/vendor/modernizr-3.5.0.min.js"></script>

<style>
    /* General Reset */
body {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: Arial, sans-serif;
background-color: #f5f5f5;
}

h1, h2, h3, h4, p {
margin: 0;
padding: 0;
}

/* About Us Section */
.about-us {
padding: 50px 20px;
background-color: #fff;
text-align: center;
box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
margin-bottom: 30px;
}

.about-us h1 {
font-size: 36px;
color: #333;
margin-bottom: 20px;
}

.about-us p {
font-size: 16px;
color: #555;
line-height: 1.6;
margin: 15px 0;
}

/* Skills Section */
.skill-container {
margin-top: 30px;
}

.single-skill {
margin-bottom: 20px;
}

.single-skill p {
font-size: 16px;
color: #333;
margin-bottom: 5px;
}

.progress {
background-color: #e0e0e0;
border-radius: 20px;
overflow: hidden;
height: 10px;
}

.progress-bar {
background-color: #4CAF50;
height: 10px;
border-radius: 20px;
}

/* Team Section */
.wn__team__area {
padding: 50px 20px;
background-color: #fff;
}

.section__title--3 {
margin-bottom: 40px;
}

.section__title--3 h2 {
font-size: 28px;
color: #333;
margin-bottom: 10px;
}

.section__title--3 p {
font-size: 16px;
color: #666;
}

.wn__team {
text-align: center;
margin-bottom: 30px;
box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
border-radius: 10px;
background-color: #fff;
overflow: hidden;
}

.wn__team .thumb img {
width: 100%;
height: auto;
border-bottom: 2px solid #e0e0e0;
}

.wn__team .content {
padding: 20px;
}

.wn__team .content h4 {
font-size: 20px;
color: #333;
margin-bottom: 5px;
}

.wn__team .content p {
font-size: 14px;
color: #666;
margin-bottom: 15px;
}

.team__social__net {
display: flex;
justify-content: center;
gap: 10px;
padding: 0;
list-style: none;
}

.team__social__net li a {
font-size: 18px;
color: #333;
transition: color 0.3s ease;
}

.team__social__net li a:hover {
color: #4CAF50;
}

/* Media Queries */
@media (max-width: 768px) {
.about-us,
.wn__team__area {
padding: 30px 15px;
}

h1, h2, h3 {
font-size: 24px;
}

.section__title--3 h2 {
font-size: 24px;
}

.library-image {
width: 100%;
height: auto;
max-height: 500px;
object-fit: cover;
border-radius: 10px;
box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
margin-bottom: 20px;
}

}

</style>
<!-- Start breadcrumb area -->
<div class="ht__breadcrumb__area bg-image--3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__inner text-center">
                    <h2 class="breadcrumb-title">About us</h2>
                    <nav class="breadcrumb-content">
                        <a class="breadcrumb_item" href="index-2.html">Home</a>
                        <span class="brd-separator">/</span>
                        <span class="breadcrumb_item active">About us</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb area -->
<!-- Start About Area -->
<div class="about-us">
    <h1>About Us</h1>
    <img src="Images/pexels-repuding-12064.jpg"
        alt="Library Image"
        class="library-image">

    <p>
        Welcome to our book website! We are dedicated to providing book lovers with a curated collection of literature
        across various genres. Our goal is to connect readers with their next great read, whether it’s a thrilling novel,
        a thought-provoking non-fiction book, or an inspiring self-help guide.
    </p>
    <p>
        Our website is built to make browsing and discovering books easy, with helpful recommendations, user reviews,
        and curated lists. Whether you are an avid reader or just beginning your literary journey, we strive to make
        your experience enjoyable and fulfilling. Join our community of book enthusiasts and dive into the world of literature.
    </p>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section__title--3 text-center pb--30">
                <h2>Our Process Skill Of High</h2>
                <p>The right people for your project</p>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-lg-6 col-sm-12 col-12">
            <div class="content text-start text_style--2">
                <h2>We have skills to show</h2>
                <div class="skill-container">
                    <!-- Start single skill -->
                    <div class="single-skill">
                        <p>Customer Favorites</p>
                        <div class="progress">
                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                data-wow-delay=".5s" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                aria-valuemax="100" style="width:90%"></div>
                        </div>
                    </div>
                    <!-- End single skill -->
                    <!-- Start single skill -->
                    <div class="single-skill">
                        <p>Popular Authors</p>
                        <div class="progress">
                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                data-wow-delay=".5s" role="progressbar" aria-valuenow="95" aria-valuemin="0"
                                aria-valuemax="100" style="width:95%"></div>
                        </div>
                    </div>
                    <!-- End single skill -->
                    <!-- Start single skill -->
                    <div class="single-skill">
                        <p>Bestselling Series</p>
                        <div class="progress">
                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                data-wow-delay=".5s" role="progressbar" aria-valuenow="93" aria-valuemin="0"
                                aria-valuemax="100" style="width:93%"></div>
                        </div>
                    </div>
                    <!-- End single skill -->
                    <!-- Start single skill -->
                    <div class="single-skill">
                        <p>Bargain Books</p>
                        <div class="progress">
                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                data-wow-delay=".5s" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                aria-valuemax="100" style="width:90%"></div>
                        </div>
                    </div>
                    <!-- End single skill -->
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-12">
            <div class="content">
                <h3>Buy Book</h3>
                <h2>Different Knowledge</h2>
                <p class="mt--20 mb--20">Claritas est etiam processus dynamicus, qui sequitur mutationem
                    consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum
                    claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta
                    decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in
                    futurum.</p>
                <strong>London Address</strong>
                <p>34 Parer Place via Musk Avenue Kelvin Grove, QLD, 4059</p>
            </div>
        </div>
    </div>
</div>

<!-- Start Team Area -->
<section class="wn__team__area pb--75 bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title--3 text-center">
                    <h2>Meet our team of experts</h2>
                    <p>The right people for your project</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Start Single Team -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="wn__team">
                    <div class="thumb">
                        <img src="images/about/team/1.jpg" alt="Team images">
                    </div>
                    <div class="content text-center">
                        <h4>JOHN SMITH</h4>
                        <p>Manager</p>
                        <ul class="team__social__net">
                            <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-tumblr icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-pinterest icons"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Single Team -->
            <!-- Start Single Team -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="wn__team">
                    <div class="thumb">
                        <img src="images/about/team/2.jpg" alt="Team images">
                    </div>
                    <div class="content text-center">
                        <h4>ALICE KIM</h4>
                        <p>Co-Founder</p>
                        <ul class="team__social__net">
                            <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-tumblr icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-pinterest icons"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Single Team -->
            <!-- Start Single Team -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="wn__team">
                    <div class="thumb">
                        <img src="images/about/team/3.jpg" alt="Team images">
                    </div>
                    <div class="content text-center">
                        <h4>VICTORIA DOE</h4>
                        <p>Marketer</p>
                        <ul class="team__social__net">
                            <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-tumblr icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                            <li><a href="#"><i class="icon-social-pinterest icons"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Single Team -->
        </div>
    </div>
</section>

<!-- End Team Area -->
<?php
include 'body_end.php';
include 'footer.php';
?>
<script>
    document.querySelector('#wn__header').classList.add('oth-page')
</script>