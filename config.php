<?php
function connection()
{
    $con = mysqli_connect("localhost", "root", "", "e_shelf");
    if (!$con) {
        die("Connection Failed: " . mysqli_connect_error());
    }
    return $con;
}

$otp_invaldi = mysqli_query(connection(), "SELECT * FROM OTP ");
foreach ($otp_invaldi as $row) {
    $time = $row['Valid'];
    $email = $row['email'];
    // change timezone to pakistan
    date_default_timezone_set('Asia/Karachi');
    // add 5 minutes to the current date when time reached delete order
    $date = strtotime("+5 minutes", strtotime($time));

    $date = date('Y-m-d H:i s', $date);

    if ($date <= date('Y-m-d H:i s')) {
        mysqli_query(connection(), "DELETE FROM OTP WHERE email='$email'");
    }
}
