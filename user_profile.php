<?php
include 'header.php';
include 'body_start.php';
?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }
        .main-body {
            padding: 15px;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }
        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }
        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }
        .gutters-sm > .col, .gutters-sm > [class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }
        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }
    </style>
    <div class="p-5"></div>
<div class="container p-5">
    <div class="main-body">
        <?php
        // Assuming session variable 'user' contains the logged-in user's email
        $email = $_SESSION['user'];

        // Database query
        $query = "SELECT 
                    users.id AS user_id,
                    users.name,
                    users.email,
                    users.role,
                    users.password,
                    user_details.phone,
                    user_details.country,
                    user_details.address
                  FROM 
                    users
                  JOIN 
                    user_details ON users.id = user_details.user_id 
                  WHERE users.email = '$email' AND users.role = 'user' ";

        // Assuming connection() is your database connection function
        $result = mysqli_query(connection(), $query);

        // Fetch data as an associative array
        $data = mysqli_fetch_assoc($result);
        ?>

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?php echo $data['name']; ?></h4>
                                <p class="text-secondary mb-1"><?php echo $data['country']; ?></p>
                                <p class="text-muted font-size-sm"><?php echo $data['address']; ?></p>
                                <button class="btn btn-danger" data-toggle="modal"
                                data-target="#delete_<?php echo $data['user_id'] ?>" >Delete Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $data['name']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $data['email']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $data['phone']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Country</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $data['country']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $data['address']; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info" data-toggle="modal"
                                data-target="#update_<?php echo $data['user_id'] ?>">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="update_<?php echo $data['user_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="update_<?php echo $data['user_id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="user_profile.php" method='POST'>
            <div class="modal-content ">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="update_<?php echo $data['user_id'] ?>">Edit Profile</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="name">Full Name</label>
                            <input type="hidden" name='update_id' value="<?php echo $data['user_id'] ?>">
                            <input type="text" class="form-control" name="name"
                                   value="<?php echo $data['name']; ?>" id="name"
                                   placeholder="Full Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email"
                                   value="<?php echo $data['email']; ?>" id="email"
                                   placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" name="phone"
                                   value="<?php echo $data['phone']; ?>" id="phone"
                                   placeholder="Phone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country"
                                   value="<?php echo $data['country']; ?>" id="country"
                                   placeholder="Country">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address"
                                   value="<?php echo $data['address']; ?>" id="address"
                                   placeholder="Address">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_profile" class="btn btn-success">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Edit Modal End -->
<!---------Edit Query------------>
<?php
if (isset($_POST['update_profile'])) {
    // Retrieve and sanitize input values
    $update_id = $_POST['update_id'];
    $name = $_POST['name'];
    $email =  $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // SQL query to update the user's profile
    $update_query = "UPDATE users 
                     SET name = '$name', email = '$email' 
                     WHERE id = '$update_id'";

    $update_query_details = "UPDATE user_details 
                             SET phone = '$phone', country = '$country', address = '$address' 
                             WHERE user_id = '$update_id'";

    // Execute the query for the user table
    if (mysqli_query(connection(), $update_query)) {
        // Execute the query for the user_details table
        if (mysqli_query(connection(), $update_query_details)) {
            echo "<script>alert('Profile updated successfully!');
            location.assign('user_profile.php');</script>";

        } else {
            echo "<script>alert('Failed to update user details.');</script>";
        }
    } else {
        echo "<script>alert('Failed to update profile.');</script>";
    }
}
?>

<!--------Delete modal------->

<!-- Delete Account Modal -->
<!-- Delete Account Modal -->
<div class="modal fade" id="delete_<?php echo $data['user_id'] ?>" tabindex="-1" role="dialog"
     aria-labelledby="delete_<?php echo $data['user_id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="user_profile.php" method="POST">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="delete_<?php echo $data['user_id'] ?>">Delete Account</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">Are you sure you want to delete your account? This action cannot be undone.</p>
                    
                    <!-- Password Field for Confirmation -->
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="password">Enter Password to Confirm</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Your password" required>
                        </div>
                    </div>

                    <!-- Hidden Field to Send User ID for Deletion -->
                    <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete_account" class="btn btn-danger">Delete Account</button>
                </div>
            </div>
        </form>
    </div>
</div>



<!--------Delete modal------->
<!-------Delete-------->
<?php
if (isset($_POST['delete_account'])) {
    $user_id = $_POST['user_id']; // User ID from the modal
    $password = $_POST['password']; // Password entered by the user

    // Get user data from the database
    $query = "SELECT id, password FROM users WHERE id = '$user_id'";
    $result = mysqli_query(connection(), $query);
    $user = mysqli_fetch_assoc($result);

    // If user exists and password matches
    if ($user && sha1($password) === $user['password']) {
        // Delete user and user details
        mysqli_query(connection(), "DELETE FROM user_details WHERE user_id = '$user_id'");
        mysqli_query(connection(), "DELETE FROM users WHERE id = '$user_id'");

        echo "<script>alert('Account deleted successfully.');
           location.assign('logout.php?redirect=index.php');
        </script>";
    } else {
        echo "<script>alert('Incorrect password.');</script>";
    }
}
?>




<!-------Delete------------>

<?php
include 'body_end.php';
include 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
