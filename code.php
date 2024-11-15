<?php
session_start();
include 'config.php';
// mailer code
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->SMTPDebug = 3;
$mail->Debugoutput = 'error_log';
// mailer code

// user signup code 
if (isset($_POST['signup_name'])) {
  $name = $_POST['signup_name'];
  $email = $_POST['signup_email'];
  $password = sha1($_POST['signup_password']);
  $alldata = mysqli_query(connection(), "SELECT * FROM users WHERE email = '$email' && role = 'user'");
  if (mysqli_num_rows($alldata) > 0) {
    echo "exists";
  } else {
    $newdata = mysqli_query(connection(), "INSERT INTO users (name, email, password,role) VALUES ('$name', '$email', '$password', 'user')");
    if ($newdata) {
      $_SESSION['user'] = $email;
      echo "success";
    } else {
      echo "failed";
    }
  }
}

// user login code
if (isset($_POST['signin_email'])) {
  $email = $_POST['signin_email'];
  $password = sha1($_POST['signin_password']);
  $sql = mysqli_query(connection(), "SELECT * FROM users WHERE email = '$email' && password = '$password' && role = 'user'");
  if (mysqli_num_rows($sql) > 0) {
    $data = mysqli_fetch_assoc($sql);
    //    update last login timestamp
    mysqli_query(connection(), "UPDATE users SET last_login = NOW() WHERE id = '$data[id]'");
    $_SESSION['user'] = $email;
    echo "success";
  } else {
    echo "failed";
  }
}

// forgot password
if (isset($_POST['forgot_email'])) {
  $email = $_POST['forgot_email'];
  $sql = mysqli_query(connection(), "SELECT * FROM users WHERE email = '$email' && role = 'user'");
  if (mysqli_num_rows($sql) > 0) {
    $OTP = rand(1000, 9999);
    $check = mysqli_query(connection(), "SELECT * FROM OTP WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
      mysqli_query(connection(), "UPDATE OTP SET code = '$OTP' , valid=now() WHERE email = '$email'");
    } else {
      $saved = mysqli_query(connection(), "INSERT INTO OTP (email,code) VALUES ('$email','$OTP')");
    }
    $_SESSION['OTP_email'] = $email;

    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'mohammadarsalanwarsi@gmail.com';                     //SMTP username
      $mail->Password   = 'meyj xqak gmay nxcr';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('mohammadarsalanwarsi@gmail.com', 'E-SHELF');
      $mail->addAddress("$email");     //Add a recipient
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'FORGET PASSWORD';
      $mail->Body    = "<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }
    .header {
      text-align: center;
      padding: 30px 0;
      background-color: #ce7852; /* Premium green color */
      color: #fff;
    }
    .header-text {
      font-size: 24px;
      font-weight: bold;
    }
    .content {
      padding: 30px;
      text-align: center;
    }
    .otp-code {
      font-size: 36px;
      font-weight: bold;
      color: #ce7852; /* Premium green color */
      background-color: #f0f0f0;
      padding: 10px 20px;
      border-radius: 5px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }
    .secondary-text {
      color: #666666;
      margin-bottom: 10px;
    }
    .footer {
      text-align: center;
      padding: 20px 0;
      border-top: 1px solid #ccc;
    }
    @media only screen and (max-width: 600px) {
      .container {
        padding: 10px;
      }
      .otp-code {
        font-size: 28px;
      }
    }
  </style>
</head>
<body>
  <div class='container'>
    <div class='header'>
      <h1 class='header-text'>Your OTP Code</h1>
    </div>
    <div class='content'>
      <p class='otp-code'>$OTP</p>
      <p class='secondary-text'>Valid for 5 minutes.</p>
      <p>Please enter this code to Change your password.</p>
    </div>
    <div class='footer'>
      <p>&copy; E-SHELF</p>
    </div>
  </div>
</body>
</html>";
      $mail->AltBody = 'Your OTP code is: ' . $OTP;

      $mail->send();
      echo 'Success';
    } catch (Exception $e) {
      echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  } else {
    echo "Email not found";
  }
}

// check otp

if (isset($_POST['forgot_otp'])) {
  $otp = $_POST['forgot_otp'];
  $email = $_SESSION['OTP_email'];
  $sql = mysqli_query(connection(), "SELECT * FROM OTP WHERE email = '$email' && code = '$otp'");
  if (mysqli_num_rows($sql) > 0) {
    $sql = mysqli_query(connection(), "DELETE FROM OTP WHERE email = '$email'");
    echo "Success";
  } else {
    echo "OTP Incorrect";
  }
}

// change password
if (isset($_POST['change_password'])) {
  $email = $_SESSION['OTP_email'];
  $password = sha1($_POST['change_password']);
  $sql = mysqli_query(connection(), "UPDATE users SET password = '$password' WHERE email = '$email'");
  if ($sql) {
    // unset session
    unset($_SESSION['OTP_email']);
    echo "Success";
  } else {
    echo "Failed to change password, please try again.";
  }
}


//  partipation form

if (isset($_POST['participant_name'])) {
  $id = $_POST['event_id'];
  $name = $_POST['participant_name'];
  $email = $_POST['participant_email'];
  $age = $_POST['participant_Age'];
  $file = $_FILES['participant_file']['name'];
  if (empty($name) || empty($email) || empty($age) || empty($file)) {
    echo "missing";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "email_error";
  } else if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    echo "name_error";
  } else {
    // only allow pdf and doc files
    $extentions = array("pdf", "doc", "docx", "PDF", "DOC", "DOCX");
    $extention = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (!in_array($extention, $extentions)) {
      echo "extention_error";
    } else {
      // move file to folder
      $file_name = time() . "_" . $file;
      $file_path = "event_files/participants_files/" . $file_name;
      if (move_uploaded_file($_FILES['participant_file']['tmp_name'], $file_path)) {
        $sql = "INSERT INTO participants (events_id, name, email, age, story) VALUES ('$id', '$name', '$email', '$age', '$file_name')";
        $result = mysqli_query(connection(), $sql);
        if ($result) {
          echo "success";
        } else {
          echo "failed";
        }
      } else {
        echo "failed";
      }
    }
  }
}

// allshopdata1

if (isset($_POST['shop_page1'])) {
  $pageNumber = $_POST['shop_page1'];
  // according to pagination each page having 9 products
  $limit = 9;
  // get the offset for each page
  $offset = ($pageNumber - 1) * $limit;
  $sql = "SELECT * FROM books LIMIT $offset, $limit";
  $result = mysqli_query(connection(), $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = "";
    foreach ($result as $b) {
      $data .= " <div class='product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12'>
                                    <div class='product__thumb' style='height: 400px;'>
                                        <a class='first__img h-100' href='single-product.html'><img
                                                src='images/books_images/" . $b['book_img1'] . "'
                                                alt='product image' class='h-100'></a>
                                        <a class='second__img animation1' href='single-product.html'><img
                                                src='images/books_images/" . $b['book_img2'] . "'
                                                alt='product image' class='h-100'></a>
                                        <div class='hot__box'>
                                            <span class='hot-label'>BEST SALLER</span>
                                        </div>
                                    </div>
                                    <div class='product__content content--center'>
                                        <h4><a href='single-product.html'>" . $b['book_name'] . "</a></h4>
                                        <ul class='price d-flex'>
                                            <li>RS " . $b['book_price'] . "</li>
                                        </ul>
                                        <div class='action'>
                                            <div class='actions_inner'>
                                                <ul class='add_to_links'>
                                                    <li><a class='cart' href='cart.html'><i
                                                                class='bi bi-shopping-bag4'></i></a></li>
                                                    <li><a class='wishlist' href='wishlist.html'><i
                                                                class='bi bi-shopping-cart-full'></i></a></li>
                                                    <li><a class='compare' href='#'><i
                                                                class='bi bi-heart-beat'></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
    }
  } else {
    $data = "No data found";
  }
  echo $data;
}
if (isset($_POST['shop_page2'])) {
  $pageNumber = $_POST['shop_page2'];
  // according to pagination each page having 9 products
  $limit = 9;
  // get the offset for each page
  $offset = ($pageNumber - 1) * $limit;
  $sql = "SELECT * FROM books LIMIT $offset, $limit";
  $result = mysqli_query(connection(), $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = "";
    foreach ($result as $b) {
      $data .= " <div class='list__view__wrapper'>
                            <!-- Start Single Product -->
                            <div class='list__view mb-2'>
                                <div class='thumb' style='height: 400px;'>
                                    <a class='first__img h-100' href='single-product.html'><img
                                            src='images/books_images/" . $b['book_img1'] . "' class='h-100'></a>
                                    <a class='second__img animation1 h-100' href='single-product.html'><img
                                            src='images/books_images/" . $b['book_img2'] . "' alt='product images' class='h-100'></a>
                                </div>
                                <div class='content'>
                                    <h2><a href='single-product.html'>Ali Smith</a></h2>
                                    <ul class='rating d-flex'>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li><i class='fa fa-star-o'></i></li>
                                        <li><i class='fa fa-star-o'></i></li>
                                    </ul>
                                    <ul class='price__box'>
                                        <li>$111.00</li>
                                        <li class='old__price'>$220.00</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla
                                        augue nec est tristique auctor. Donec non est at libero vulputate
                                        rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi,
                                        vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                    <ul class='cart__action d-flex'>
                                        <li class='cart'><a href='cart.html'>Add to cart</a></li>
                                        <li class='wishlist'><a href='cart.html'></a></li>
                                        <li class='compare'><a href='cart.html'></a></li>
                                    </ul>

                                </div>
                            </div>
                            <!-- End Single Product -->
                          
                        </div>";
    }
  } else {
    $data = "No data found";
  }
  echo $data;
}

if (isset($_POST['shop_category1'])) {
  $cat = $_POST['shop_category1'];
  $page = $_POST['shop_page_cat1'];
  // according to pagination each page having 9 products
  $limit = 9;
  // get the offset for each page
  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM books WHERE book_category = '$cat' LIMIT $offset, $limit";
  $result = mysqli_query(connection(), $sql);

  if (mysqli_num_rows($result) > 0) {
    $data = "";
    foreach ($result as $b) {
      $data .= " <div class='product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12'>
                                    <div class='product__thumb' style='height: 400px;'>
                                        <a class='first__img h-100' href='single-product.html'><img
                                                src='images/books_images/" . $b['book_img1'] . "'
                                                alt='product image' class='h-100'></a>
                                        <a class='second__img animation1 h-100' href='single-product.html'><img
                                                src='images/books_images/" . $b['book_img2'] . "'
                                                alt='product image' class='h-100'></a>
                                        <div class='hot__box'>
                                            <span class='hot-label'>BEST SALLER</span>
                                        </div>
                                    </div>
                                    <div class='product__content content--center'>
                                        <h4><a href='single-product.html'>" . $b['book_name'] . "</a></h4>
                                        <ul class='price d-flex'>
                                            <li>RS " . $b['book_price'] . "</li>
                                        </ul>
                                        <div class='action'>
                                            <div class='actions_inner'>
                                                <ul class='add_to_links'>
                                                    <li><a class='cart' href='cart.html'><i
                                                                class='bi bi-shopping-bag4'></i></a></li>
                                                    <li><a class='wishlist' href='wishlist.html'><i
                                                                class='bi bi-shopping-cart-full'></i></a></li>
                                                    <li><a class='compare' href='#'><i
                                                                class='bi bi-heart-beat'></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
    }
  } else {
    $data = "No data found";
  }
  echo $data;
}


if (isset($_POST['shop_category2'])) {
  $cat = $_POST['shop_category2'];
  $page = $_POST['shop_page_cat2'];
  // according to pagination each page having 9 products
  $limit = 9;
  // get the offset for each page
  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM books WHERE book_category = '$cat' LIMIT $offset, $limit";
  $result = mysqli_query(connection(), $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = "";
    foreach ($result as $b) {
      $data .= " <div class='list__view__wrapper'>
                            <!-- Start Single Product -->
                            <div class='list__view mb-2'>
                                <div class='thumb' style='height: 400px;'>
                                    <a class='first__img h-100' href='single-product.html'><img
                                            src='images/books_images/" . $b['book_img1'] . "' class='h-100'></a>
                                    <a class='second__img animation1 h-100' href='single-product.html'><img
                                            src='images/books_images/" . $b['book_img2'] . "' alt='product images' class='h-100'></a>
                                </div>
                                <div class='content'>
                                    <h2><a href='single-product.html'>Ali Smith</a></h2>
                                    <ul class='rating d-flex'>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li><i class='fa fa-star-o'></i></li>
                                        <li><i class='fa fa-star-o'></i></li>
                                    </ul>
                                    <ul class='price__box'>
                                        <li>$111.00</li>
                                        <li class='old__price'>$220.00</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla
                                        augue nec est tristique auctor. Donec non est at libero vulputate
                                        rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi,
                                        vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                    <ul class='cart__action d-flex'>
                                        <li class='cart'><a href='cart.html'>Add to cart</a></li>
                                        <li class='wishlist'><a href='cart.html'></a></li>
                                        <li class='compare'><a href='cart.html'></a></li>
                                    </ul>

                                </div>
                            </div>
                            <!-- End Single Product -->
                          
                        </div>";
    }
  } else {
    $data = "No data found";
  }
  echo $data;
}

// filter according to price
if (isset($_POST['filter_cat_price1'])) {
  $price = $_POST['filter_cat_price1'];
  $cat = $_POST['filter_shop_cat1'];
  $page = $_POST['filter_page_cat1'];
  // get min and max
  preg_match_all('/\d+/', $price, $matches);
  $min = $matches[0][0];
  $max = $matches[0][1];
  // according to pagination each page having 9 products
  $limit = 9;
  // get the offset for each page
  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM books WHERE book_category = '$cat' AND book_price BETWEEN $min AND $max LIMIT $offset, $limit";
  $result = mysqli_query(connection(), $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = "";
    foreach ($result as $b) {
      $data .= " <div class='product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12'>
                                      <div class='product__thumb' style='height: 400px;'>
                                          <a class='first__img h-100' href='single-product.html'><img
                                                  src='images/books_images/" . $b['book_img1'] . "'
                                                  alt='product image' class='h-100'></a>
                                          <a class='second__img animation1 h-100' href='single-product.html'><img
                                                  src='images/books_images/" . $b['book_img2'] . "'
                                                  alt='product image' class='h-100'></a>
                                          <div class='hot__box'>
                                              <span class='hot-label'>BEST SALLER</span>
                                          </div>
                                      </div>
                                      <div class='product__content content--center'>
                                          <h4><a href='single-product.html'>" . $b['book_name'] . "</a></h4>
                                          <ul class='price d-flex'>
                                              <li>RS " . $b['book_price'] . "</li>
                                          </ul>
                                          <div class='action'>
                                              <div class='actions_inner'>
                                                  <ul class='add_to_links'>
                                                      <li><a class='cart' href='cart.html'><i
                                                                  class='bi bi-shopping-bag4'></i></a></li>
                                                      <li><a class='wishlist' href='wishlist.html'><i
                                                                  class='bi bi-shopping-cart-full'></i></a></li>
                                                      <li><a class='compare' href='#'><i
                                                                  class='bi bi-heart-beat'></i></a></li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>";
    }
  } else {
    $data = "No data found";
  }
  echo $data;
}

if (isset($_POST['filter_cat_price2'])) {
  $price = $_POST['filter_cat_price2'];
  $cat = $_POST['filter_shop_cat2'];
  $page = $_POST['filter_page_cat2'];
  // get min and max
  preg_match_all('/\d+/', $price, $matches);
  $min = $matches[0][0];
  $max = $matches[0][1];
  // according to pagination each page having 9 products
  $limit = 9;
  // get the offset for each page
  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM books WHERE book_category = '$cat' AND book_price BETWEEN $min AND $max LIMIT $offset, $limit";
  $result = mysqli_query(connection(), $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = "";
    foreach ($result as $b) {
      $data .= " <div class='list__view__wrapper'>
                            <!-- Start Single Product -->
                            <div class='list__view mb-2'>
                                <div class='thumb' style='height: 400px;'>
                                    <a class='first__img h-100' href='single-product.html'><img
                                            src='images/books_images/" . $b['book_img1'] . "' class='h-100'></a>
                                    <a class='second__img animation1 h-100' href='single-product.html'><img
                                            src='images/books_images/" . $b['book_img2'] . "' alt='product images' class='h-100'></a>
                                </div>
                                <div class='content'>
                                    <h2><a href='single-product.html'>Ali Smith</a></h2>
                                    <ul class='rating d-flex'>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li><i class='fa fa-star-o'></i></li>
                                        <li><i class='fa fa-star-o'></i></li>
                                    </ul>
                                    <ul class='price__box'>
                                        <li>$111.00</li>
                                        <li class='old__price'>$220.00</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla
                                        augue nec est tristique auctor. Donec non est at libero vulputate
                                        rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi,
                                        vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                    <ul class='cart__action d-flex'>
                                        <li class='cart'><a href='cart.html'>Add to cart</a></li>
                                        <li class='wishlist'><a href='cart.html'></a></li>
                                        <li class='compare'><a href='cart.html'></a></li>
                                    </ul>

                                </div>
                            </div>
                            <!-- End Single Product -->
                          
                        </div>";
    }
  } else {
    $data = "No data found";
  }
  echo $data;
}

if (isset($_POST['filter_price1'])) {
  $price = $_POST['filter_price1'];
  $page = $_POST['filter_page1'];
  // get min and max
  preg_match_all('/\d+/', $price, $matches);
  $min = $matches[0][0];
  $max = $matches[0][1];
  // according to pagination each page having 9 products
  $limit = 9;
  // get the offset for each page
  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM books WHERE book_price BETWEEN $min AND $max LIMIT $offset, $limit";
  $result = mysqli_query(connection(), $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = "";
    foreach ($result as $b) {
      $data .= " <div class='product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12'>
                                      <div class='product__thumb' style='height: 400px;'>
                                          <a class='first__img h-100' href='single-product.html'><img
                                                  src='images/books_images/" . $b['book_img1'] . "'
                                                  alt='product image' class='h-100'></a>
                                          <a class='second__img animation1 h-100' href='single-product.html'><img
                                                  src='images/books_images/" . $b['book_img2'] . "'
                                                  alt='product image' class='h-100'></a>
                                          <div class='hot__box'>
                                              <span class='hot-label'>BEST SALLER</span>
                                          </div>
                                      </div>
                                      <div class='product__content content--center'>
                                          <h4><a href='single-product.html'>" . $b['book_name'] . "</a></h4>
                                          <ul class='price d-flex'>
                                              <li>RS " . $b['book_price'] . "</li>
                                          </ul>
                                          <div class='action'>
                                              <div class='actions_inner'>
                                                  <ul class='add_to_links'>
                                                      <li><a class='cart' href='cart.html'><i
                                                                  class='bi bi-shopping-bag4'></i></a></li>
                                                      <li><a class='wishlist' href='wishlist.html'><i
                                                                  class='bi bi-shopping-cart-full'></i></a></li>
                                                      <li><a class='compare' href='#'><i
                                                                  class='bi bi-heart-beat'></i></a></li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>";
    }
  } else {
    $data = "No data found";
  }
  echo $data;
}

if (isset($_POST['filter_price2'])) {
  $price = $_POST['filter_price2'];
  $page = $_POST['filter_page2'];
  // get min and max
  preg_match_all('/\d+/', $price, $matches);
  $min = $matches[0][0];
  $max = $matches[0][1];
  // according to pagination each page having 9 products
  $limit = 9;
  // get the offset for each page
  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM books WHERE book_price BETWEEN $min AND $max LIMIT $offset, $limit";
  $result = mysqli_query(connection(), $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = "";
    foreach ($result as $b) {
      $data .= "<div class='list__view__wrapper'>
                            <!-- Start Single Product -->
                            <div class='list__view mb-2'>
                                <div class='thumb' style='height: 400px;'>
                                    <a class='first__img h-100' href='single-product.html'><img
                                            src='images/books_images/" . $b['book_img1'] . "' class='h-100'></a>
                                    <a class='second__img animation1 h-100' href='single-product.html'><img
                                            src='images/books_images/" . $b['book_img2'] . "' alt='product images' class='h-100'></a>
                                </div>
                                <div class='content'>
                                    <h2><a href='single-product.html'>Ali Smith</a></h2>
                                    <ul class='rating d-flex'>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li class='on'><i class='fa fa-star-o'></i></li>
                                        <li><i class='fa fa-star-o'></i></li>
                                        <li><i class='fa fa-star-o'></i></li>
                                    </ul>
                                    <ul class='price__box'>
                                        <li>$111.00</li>
                                        <li class='old__price'>$220.00</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla
                                        augue nec est tristique auctor. Donec non est at libero vulputate
                                        rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi,
                                        vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                    <ul class='cart__action d-flex'>
                                        <li class='cart'><a href='cart.html'>Add to cart</a></li>
                                        <li class='wishlist'><a href='cart.html'></a></li>
                                        <li class='compare'><a href='cart.html'></a></li>
                                    </ul>

                                </div>
                            </div>
                            <!-- End Single Product -->
                          
                        </div>";
    }
  } else {
    $data = "No data found";
  }
  echo $data;
}
// update total pages with filteration
// if (isset($_POST['total_pages_price_cat'])) {
//   $price = $_POST['total_pages_price_cat'];
//   $cat = $_POST['total_pages_cat_cat'];
//   preg_match_all('/\d+/', $price, $matches);
//   $min = $matches[0][0];
//   $max = $matches[0][1];
//   $sql = "SELECT * FROM books WHERE book_category = '$cat' AND book_price BETWEEN $min AND $max";
//   $result = mysqli_query(connection(), $sql);
//   $total_pages = ceil(mysqli_num_rows($result) / 9);
//   echo $total_pages;
// }
// if (isset($_POST['total_pages_price'])) {
//   $price = $_POST['total_pages_price'];
//   preg_match_all('/\d+/', $price, $matches);
//   $min = $matches[0][0];
//   $max = $matches[0][1];
//   $sql = "SELECT * FROM books WHERE book_price BETWEEN $min AND $max";
//   $result = mysqli_query(connection(), $sql);
//   $total_pages = ceil(mysqli_num_rows($result) / 9);
//   echo $total_pages;
// }

// if(isset($_POST['pages_checker'])){
//     $price = $_POST['pages_checker'];
//     preg_match_all('/\d+/', $price, $matches);
//     $min = $matches[0][0];
//     $max = $matches[0][1];
//     $sql = "SELECT * FROM books WHERE after_discount_price BETWEEN $min AND $max";
//     $result = mysqli_query(connection(), $sql);
//     $total_pages = ceil(mysqli_num_rows($result) / 9);
//     echo $total_pages;
// }