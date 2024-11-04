<?php
session_start();
include 'config.php';
require __DIR__ . '/vendor/autoload.php';
$client = new Google\Client;
$client->setClientId("626289507202-0nrt0q9ak03houmipe16e6l9cmhl4h8i.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/Arsalan%20php/E-Project%20Books/redirect.php");
if(isset($_GET['code'])){
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    $oauth = new Google\Service\Oauth2($client);
    $userinfo=$oauth->userinfo->get();
    $usern_name=$userinfo->name;
    $user_email=$userinfo->email;
    $sql=mysqli_query(connection(), "SELECT * FROM users WHERE email = '$user_email' && role = 'user'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        mysqli_query(connection(), "UPDATE users SET last_login = NOW() WHERE id = '$row[id]'");
        $_SESSION['user'] = $row['email'];
        header('location: index.php');
    } else {
        $sql = mysqli_query(connection(), "INSERT INTO users (name, email,role) VALUES ('$usern_name', '$user_email', 'user')");
        if ($sql) {
            $_SESSION['user'] = $user_email;
            header('location: index.php');
        }
    }
}