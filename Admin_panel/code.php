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
// ........... delete category .............
if (isset($_POST['delete_category'])) {
    $category_id = $_POST['category_id'];
    $sql = "DELETE FROM categories WHERE id = '$category_id'";
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-success'><i class='bx bxs-check-circle'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Category Deleted Successfully</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        echo "<div class='alert border-0 alert-dismissible fade show py-2'><div class='d-flex align-items-center'><div class='font-35 text-danger'><i class='bx bxs-message-square-x'></i></div><div class='ms-3'><h6 class='mb-0 text-white'>Failed to Delete Category. Please Try Again</h6></div></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
}
if (isset($_POST['add_book'])) {
    // print all post data
    print_r($_POST);
    echo $_FILES['book_images']['name'];
}
