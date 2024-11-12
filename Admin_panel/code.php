<?php
session_start();
include '../config.php';

// ...........admin login............
if (isset($_POST['admin_email'])) {
    $admin_email = $_POST['admin_email'];
    $admin_password = sha1($_POST['admin_password']);
    $sql = "SELECT * FROM users WHERE email = '$admin_email' AND password = '$admin_password' AND role = 'admin'";
    $result = mysqli_query(connection(), $sql);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $data['id'];
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Login Successfull</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        echo "failed";
    }
}
// .......... add category ................
if (isset($_POST['book_Category'])) {
    $category_name = $_POST['book_Category'];
    // validation
    if (empty($category_name)) {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>All Fields are required</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";
        $result = mysqli_query(connection(), $sql);
        if ($result) {
            echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Category Added Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else {
            echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Filed to Add Category. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    }
}
// ........... delete category .............
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];
    $sql = "DELETE FROM categories WHERE id = '$category_id'";
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Category Deleted Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Delete Category. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}

// ........... update category .............
if (isset($_POST['book_Category_update'])) {
    $category_id = $_POST['id'];
    $category_name = $_POST['book_Category_update'];
    // validation
    if (empty($category_name)) {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Category Name is required</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        $sql = "UPDATE categories SET category_name = '$category_name' WHERE id = '$category_id'";

        $result = mysqli_query(connection(), $sql);
        if ($result) {
            echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Category Updated Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else {
            echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div
            class='ms-3'><h6 class='mb-0 text-white'>Failed to Update Category. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    }
}
// ........... add book .............

if (isset($_POST['book_title'])) {
    $book_title = $_POST['book_title'];
    $book_title = mysqli_real_escape_string(connection(), $book_title);
    $book_description = $_POST['book_description'];
    $book_description = mysqli_real_escape_string(connection(), $book_description);
    $book_author = $_POST['book_author'];
    $book_author = mysqli_real_escape_string(connection(), $book_author);
    $orignal_price = $_POST['orignal_price'];
    $discounted_price = $_POST['discounted_price'];
    $pdf = $_POST['pdf'];
    $category = $_POST['book_category'];
    $front_image = $_FILES['front_image']['name'];
    $back_image = $_FILES['back_image']['name'];
    $front_ext = strtolower(pathinfo($front_image, PATHINFO_EXTENSION));
    $back_ext = strtolower(pathinfo($back_image, PATHINFO_EXTENSION));
    $extentions = array("jpg", "jpeg", "png", "webp", "JPG", "JPEG", "PNG", "WEBP");
    // validation
    if (empty($book_title) || empty($book_description) || empty($book_author) || empty($orignal_price) || empty($discounted_price) || empty($front_image) || empty($back_image)) {
        echo "missing";
    }
    // check in else if front image and back image extention matches extenstion array
    else if (!in_array($front_ext, $extentions) || !in_array($back_ext, $extentions)) {
        echo "extention_error";
    } else if (file_exists("../Images/books_images/" . $front_image) || file_exists("../Images/books_images/" . $back_image)) {
        echo "file_exist_error";
    } else if ($pdf == "yes") {
        $pdf_price = $_POST['pdf_price'];
        if (empty($pdf_price)) {
            echo "missing";
        } else {
            $sql = "INSERT INTO books (book_name, book_des, book_author, book_price, after_discount_price,book_pdf, pdf_price, book_category, book_img1, book_img2,status) VALUES ('$book_title', '$book_description', '$book_author', '$orignal_price', '$discounted_price', '$pdf', '$pdf_price', '$category', '$front_image', '$back_image','In Stock')";
            $result = mysqli_query(connection(), $sql);

            if ($result) {
                if (move_uploaded_file($_FILES['front_image']['tmp_name'], "../Images/books_images/" . $front_image)) {
                    if (move_uploaded_file($_FILES['back_image']['tmp_name'], "../Images/books_images/" . $back_image)) {
                        echo "success";
                    } else {
                        echo "image_error";
                    }
                } else {
                    echo "image_error";
                }
            } else {
                echo "image_error";
            }
        }
    } else {
        $sql = "INSERT INTO books (book_name, book_des, book_author, book_price, after_discount_price, 	book_pdf, book_category, book_img1,book_img2,status) VALUES ('$book_title', '$book_description', '$book_author', '$orignal_price', '$discounted_price', '$pdf', '$category', '$front_image', '$back_image','In Stock')";
        $result = mysqli_query(connection(), $sql);

        if ($result) {
            if (move_uploaded_file($_FILES['front_image']['tmp_name'], "../Images/books_images/" . $front_image)) {
                if (move_uploaded_file($_FILES['back_image']['tmp_name'], "../Images/books_images/" . $back_image)) {
                    echo "success";
                } else {
                    echo "image_error";
                }
            } else {
                echo "image_error";
            }
        } else {
            echo "image_error";
        }
    }
}

// ..... delete book ......
// ........... delete category .............
if (isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];
    // delete image from folder
    $sql = "SELECT * FROM books WHERE id = '$book_id'";
    $result = mysqli_query(connection(), $sql);
    $data = mysqli_fetch_assoc($result);
    $image_path1 = '../images/books_images/' . $data['book_img1'];
    $image_path2 = '../images/books_images/' . $data['book_img2'];
    $sql = "DELETE FROM books WHERE id = '$book_id'";
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        if (file_exists($image_path1)) {
            unlink($image_path1);
        }
        if (file_exists($image_path2)) {
            unlink($image_path2);
        }
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Product Deleted Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Delete Product. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}

// ........... update book ....................

if (isset($_POST['update_book_title'])) {
    $book_id = $_POST['update_id'];
    $book_title = $_POST['update_book_title'];
    $book_description = $_POST['book_description'];
    $book_description = mysqli_real_escape_string(connection(), $book_description);
    $book_author = $_POST['book_author'];
    $orignal_price = $_POST['orignal_price'];
    $discounted_price = $_POST['discounted_price'];
    $pdf = $_POST['pdf'];
    $status = $_POST['status'];
    $category = $_POST['book_category'];
    $front_image = $_FILES['front_image']['name'];
    $back_image = $_FILES['back_image']['name'];
    $extentions = array("jpg", "jpeg", "png", "webp", "JPG", "JPEG", "PNG", "WEBP");
    $olddata = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT * FROM books WHERE id='$book_id'"));
    // validation
    if (empty($book_title) || empty($book_description) || empty($book_author) || empty($orignal_price) || empty($discounted_price)) {
        echo "missing";
    } else if ($pdf == "yes" && empty($_POST['pdf_price'])) {
        echo "missing";
    }
    // check in else if front image and back image extention matches extenstion array
    else if (!empty($front_image) && !empty($back_image)) {
        $front_ext = strtolower(pathinfo($front_image, PATHINFO_EXTENSION));
        $back_ext = strtolower(pathinfo($back_image, PATHINFO_EXTENSION));
        if (!in_array($front_ext, $extentions) || !in_array($back_ext, $extentions)) {
            echo "extention_error";
        } else {
            if ($pdf == "yes") {
                $sql = "UPDATE books SET book_name='$book_title', book_des='$book_description', book_author='$book_author', book_price='$orignal_price', after_discount_price='$discounted_price', book_pdf='$pdf', pdf_price='$_POST[pdf_price]', book_category='$category' , book_img1='$front_image',book_img2='$back_image',status='$status' WHERE id = '$book_id'";
            } else {
                $sql = "UPDATE books SET book_name='$book_title', book_des='$book_description', book_author='$book_author', book_price='$orignal_price', after_discount_price='$discounted_price', book_category='$category' , book_img1='$front_image',book_img2='$back_image',status='$status' WHERE id = '$book_id'";
            }
            $result = mysqli_query(connection(), $sql);

            if ($result) {
                unlink("../Images/books_images/" . $olddata['book_img1']);
                unlink("../Images/books_images/" . $olddata['book_img2']);
                if (move_uploaded_file($_FILES['front_image']['tmp_name'], "../Images/books_images/" . $front_image)) {
                    if (move_uploaded_file($_FILES['back_image']['tmp_name'], "../Images/books_images/" . $back_image)) {
                        echo "success";
                    } else {
                        echo "image_error";
                    }
                } else {
                    echo "image_error";
                }
            } else {
                echo "image_error";
            }
        }
    } else if (!empty($front_image) || !empty($back_image)) {
        echo "both_img_required";
    } else {
        if ($pdf == "yes") {
            $sql = "UPDATE books SET book_name='$book_title', book_des='$book_description', book_author='$book_author', book_price='$orignal_price', after_discount_price='$discounted_price', book_pdf='$pdf', pdf_price='$_POST[pdf_price]', book_category='$category', status='$status' WHERE id = '$book_id'";
        } else {
            $sql = "UPDATE books SET book_name='$book_title', book_des='$book_description', book_author='$book_author', book_price='$orignal_price', after_discount_price='$discounted_price', book_pdf='$pdf' , pdf_price='0', book_category='$category', status='$status' WHERE id = '$book_id'";
        }
        $result = mysqli_query(connection(), $sql);

        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }
}

// .....update Logo ......

if (isset($_POST['logo_data'])) {
    $logo = $_FILES['logo_image_update']['name'];
    $extentions = array("jpg", "jpeg", "png", "webp", "JPG", "JPEG", "PNG", "WEBP");
    $olddata = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT * FROM website"));
    if (!empty($logo)) {
        $ext = strtolower(pathinfo($logo, PATHINFO_EXTENSION));
        if (!in_array($ext, $extentions)) {
            echo "extention_error";
        } else {
            $sql = "UPDATE website SET logo='$logo' WHERE id = '1'";
            $result = mysqli_query(connection(), $sql);
            if ($result) {
                unlink("../Images/main_images/" . $olddata['logo']);
                if (move_uploaded_file($_FILES['logo_image_update']['tmp_name'], "../Images/main_images/" . $logo)) {
                    echo "success";
                } else {
                    echo "failed";
                }
            } else {
                echo "failed";
            }
        }
    } else {
        echo "emty";
    }
}
// ........update info .............
if (isset($_POST['website_email'])) {
    $name = $_POST['website_name'];
    $email = $_POST['website_email'];
    $phone = $_POST['website_phone'];
    $address = $_POST['website_address'];
    $website = $_POST['website_link'];
    $website_facebook = $_POST['website_facebook'];
    $website_instagram = $_POST['website_instagram'];
    $website_whatsapp = $_POST['website_whatsapp'];
    $website_info = $_POST['website_info'];
    $website_info = mysqli_real_escape_string(connection(), $website_info);

    if (empty($email) || empty($phone) || empty($address) || empty($website) || empty($website_facebook) || empty($website_instagram) || empty($website_whatsapp) || empty($website_info)) {
        echo "missing";
    } else {
        $sql = "UPDATE website SET name='$name', email='$email', phone='$phone', address='$address', website_link='$website', facebook='$website_facebook', instagram='$website_instagram', whatsapp='$website_whatsapp', info='$website_info' WHERE id = '1'";
        $result = mysqli_query(connection(), $sql);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }
}

// ............add Admins.............
if (isset($_POST['add_admin_name'])) {
    $name = $_POST['add_admin_name'];
    $email = $_POST['add_admin_email'];
    $password = sha1($_POST['add_admin_password']);
    $alldata = mysqli_query(connection(), "SELECT * FROM users WHERE email = '$email' && role = 'admin'");

    if (empty($name) || empty($email) || empty($password)) {
        echo "missing";
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        echo "name_error";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "email_error";
    } else if (strlen($_POST['add_admin_password']) < 8) {
        echo "password_error";
    } else  if (mysqli_num_rows($alldata) > 0) {
        echo "exist";
    } else {
        $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'admin')";
        $result = mysqli_query(connection(), $sql);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }
}


// ............add events..............

if (isset($_POST['event_title'])) {
    $event_title = $_POST['event_title'];
    $event_rewards = $_POST['event_rewards'];
    $event_rewards = mysqli_real_escape_string(connection(), $event_rewards);
    $event_description = $_POST['event_description'];
    $event_description = mysqli_real_escape_string(connection(), $event_description);
    $event_start = $_POST['event_start'];
    $event_end = $_POST['event_end'];
    $event_req1 = $_POST['event_req1'];
    $event_req2 = $_POST['event_req2'];
    $event_req3 = $_POST['event_req3'];
    $event_req4 = $_POST['event_req4'];
    $event_req1 = mysqli_real_escape_string(connection(), $event_req1);
    $event_req2 = mysqli_real_escape_string(connection(), $event_req2);
    $event_req3 = mysqli_real_escape_string(connection(), $event_req3);
    $event_req4 = mysqli_real_escape_string(connection(), $event_req4);
    $image = $_FILES['front_image']['name'];
    $extentions = array("jpg", "jpeg", "png", "webp", "JPG", "JPEG", "PNG", "WEBP");

    if (empty($event_title) || empty($event_description) || empty($event_start) || empty($event_end) || empty($event_req1) || empty($image) || empty($event_rewards)) {
        echo "missing";
    } else if (!in_array(strtolower(pathinfo($image, PATHINFO_EXTENSION)), $extentions)) {
        echo "extention_error";
    } else {
        if (file_exists("../Images/events_images/" . $image)) {
            echo "exist";
        } else {
            $image_name = $image;
            $image_size = $_FILES['front_image']['size'];
            $image_tmp = $_FILES['front_image']['tmp_name'];
            $image_folder = "../Images/events_images/" . $image_name;
            if (move_uploaded_file($image_tmp, $image_folder)) {
                $sql = "INSERT INTO events (event_title, event_description, event_start, event_end, event_req1, event_req2, event_req3, event_req4, event_img,rewards) VALUES ('$event_title', '$event_description', '$event_start', '$event_end', '$event_req1', '$event_req2', '$event_req3', '$event_req4', '$image_name','$event_rewards')";
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

// delete event
if (isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];
    $participants = mysqli_query(connection(), "SELECT * FROM participants WHERE events_id = '$event_id'");
    $event = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT * FROM events WHERE id = '$event_id'"));
    if (mysqli_num_rows($participants) > 0) {
        foreach ($participants as $row) {
            unlink("../event_files/participants_files/" . $row['story']);
        }
        $sql = "DELETE FROM participants WHERE events_id = '$event_id'";
        $result = mysqli_query(connection(), $sql);
        if ($result) {
            $sql = "DELETE FROM events WHERE id = '$event_id'";
            $result = mysqli_query(connection(), $sql);
            if ($result) {
                unlink("../Images/events_images/" . $event['event_img']);
                echo "success";
            } else {
                echo "failed";
            }
        } else {
            echo "failed";
        }
    } else {
        $sql = "DELETE FROM events WHERE id = '$event_id'";
        $result = mysqli_query(connection(), $sql);
        if ($result) {
            unlink("../Images/events_images/" . $event['event_img']);
            echo "success";
        } else {
            echo "failed";
        }
    }
}

// update event
if (isset($_POST['update_event_title'])) {
    $id = $_POST['event_update_id'];
    $event_title = $_POST['update_event_title'];
    $event_rewards = $_POST['update_event_rewards'];
    $event_rewards = mysqli_real_escape_string(connection(), $event_rewards);
    $event_description = $_POST['update_event_description'];
    $event_description = mysqli_real_escape_string(connection(), $event_description);
    $event_start = $_POST['update_event_start'];
    $event_end = $_POST['update_event_end'];
    if (isset($_POST['update_event_status'])) {
        $eventStatus = $_POST['update_event_status'];

        $sql = "UPDATE events SET status = '$eventStatus' WHERE id = '$id'";
        $result = mysqli_query(connection(), $sql);
        if (!$sql) {
            echo "failed";
        }
    };
    $event_req1 = $_POST['update_event_req1'];
    $event_req2 = $_POST['update_event_req2'];
    $event_req3 = $_POST['update_event_req3'];
    $event_req4 = $_POST['update_event_req4'];
    $event_req1 = mysqli_real_escape_string(connection(), $event_req1);
    $event_req2 = mysqli_real_escape_string(connection(), $event_req2);
    $event_req3 = mysqli_real_escape_string(connection(), $event_req3);
    $event_req4 = mysqli_real_escape_string(connection(), $event_req4);
    $image = $_FILES['update_front_image']['name'];
    $extentions = array("jpg", "jpeg", "png", "webp", "JPG", "JPEG", "PNG", "WEBP");
    $oldddata = mysqli_fetch_assoc(mysqli_query(connection(), "SELECT * FROM events WHERE id='$id'"));

    if (empty($event_title) || empty($event_description) || empty($event_start) || empty($event_end) || empty($event_req1)  || empty($event_rewards)) {
        echo "missing";
    } else if (empty($image)) {
        // UPDATE DATA
        $sql = "UPDATE events SET event_title='$event_title', event_description='$event_description', event_start='$event_start', event_end='$event_end', event_req1='$event_req1', event_req2='$event_req2', event_req3='$event_req3', event_req4='$event_req4', rewards='$event_rewards' WHERE id='$id'";
        $result = mysqli_query(connection(), $sql);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    } else if (!in_array(strtolower(pathinfo($image, PATHINFO_EXTENSION)), $extentions)) {
        echo "extention_error";
    } else {
        if (file_exists("../Images/events_images/" . $image)) {
            echo "exist";
        } else {
            $image_name = $image;
            $image_size = $_FILES['update_front_image']['size'];
            $image_tmp = $_FILES['update_front_image']['tmp_name'];
            $image_folder = "../Images/events_images/" . $image_name;
            if (move_uploaded_file($image_tmp, $image_folder)) {
                $sql = "UPDATE events SET event_title='$event_title', event_description='$event_description', event_start='$event_start', event_end='$event_end', event_req1='$event_req1', event_req2='$event_req2', event_req3='$event_req3', event_req4='$event_req4' , event_img='$image_name', rewards='$event_rewards' WHERE id='$id'";
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


// partipant status change
if (isset($_POST['part_status_id'])) {
    $id = $_POST['part_status_id'];
    $status = $_POST['part_status'];
    $sql = "UPDATE participants SET status = '$status' WHERE id = '$id'";
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        echo "success";
    } else {
        echo "failed";
    }

}
