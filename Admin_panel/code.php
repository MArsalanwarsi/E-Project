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
    $category_image = $_FILES['category_image']['name'];
    // validation
    if (empty($category_name) || empty($category_image)) {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>All Fields are required</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        $category_image_temp = $_FILES['category_image']['tmp_name'];
        $category_image_folder = '../images/category_images/' . $category_image;
        // check if destination folder has file of same name
        if (file_exists($category_image_folder)) {
            echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>A file with the same name already exists in the destination folder. Please rename the file and try again.</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else {
            if (move_uploaded_file($category_image_temp, $category_image_folder)) {
                $sql = "INSERT INTO categories (category_name, category_image) VALUES ('$category_name', '$category_image')";
                $result = mysqli_query(connection(), $sql);
                if ($result) {
                    echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Category Added Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                } else {
                    echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Filed to Add Category. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                }
            } else {
                echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Filed to Add Category. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            }
        }
    }
}
// ........... delete category .............
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];
    // delete image from folder
    $sql = "SELECT category_image FROM categories WHERE id = '$category_id'";
    $result = mysqli_query(connection(), $sql);
    $data = mysqli_fetch_assoc($result);
    $image_path = '../images/category_images/' . $data['category_image'];
    $sql = "DELETE FROM categories WHERE id = '$category_id'";
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Category Deleted Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Delete Category. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}

// ........... update category .............
if (isset($_POST['book_Category_update'])) {
    $category_id = $_POST['id'];
    $category_name = $_POST['book_Category_update'];
    $category_image = $_FILES['category_image_update']['name'];
    // validation
    if (empty($category_name)) {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Category Name is required</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        if (empty($category_image)) {
            $sql = "UPDATE categories SET category_name = '$category_name' WHERE id = '$category_id'";
        } else {
            // delete old image from folder
            $sql = "SELECT category_image FROM categories WHERE id = '$category_id'";
            $result = mysqli_query(connection(), $sql);
            $data = mysqli_fetch_assoc($result);
            $oldimage_path = '../images/category_images/' . $data['category_image'];
            // upload new image
            $category_image_temp = $_FILES['category_image_update']['tmp_name'];
            $category_image_folder = '../images/category_images/' . $category_image;
            if (move_uploaded_file($category_image_temp, $category_image_folder)) {
                $sql = "UPDATE categories SET category_name = '$category_name', category_image = '$category_image' WHERE id = '$category_id'";
                if (file_exists($oldimage_path)) {
                    unlink($oldimage_path);
                }
            }
            //   execute query
        }
        $result = mysqli_query(connection(), $sql);
        if ($result) {
            echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Category Updated Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else {
            echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div
            class='ms-3'><h6 class='mb-0 text-white'>Failed to Update Category. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    }
}

if (isset($_POST['book_title'])) {
    $book_title = $_POST['book_title'];
    $book_description = $_POST['book_description'];
    $book_author = $_POST['book_author'];
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
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Category Deleted Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Delete Category. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}

// ........... update book ....................

if (isset($_POST['update_book_title'])) {
    $book_id = $_POST['update_id'];
    $book_title = $_POST['update_book_title'];
    $book_description = $_POST['book_description'];
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
