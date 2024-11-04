<?php 
session_start();
session_unset();
session_destroy();
if(isset($_GET['redirect'])){
    $redirect = $_GET['redirect'];
    if($redirect=='admin'){
        header('location:admin_panel');
    }else{
        header("location:$redirect");
    }
}