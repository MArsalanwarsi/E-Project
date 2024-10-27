<?php 
function connection(){
    $con = mysqli_connect("localhost","root","","e_shelf");
    if(!$con){
        die("Connection Failed: ".mysqli_connect_error());
    }
    return $con;
}