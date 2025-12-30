<?php

$server = "localhost";
$username = "hotel_user";
$password = "password";
$database = "hotel";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("<script>alert('Connection failed.')</script>");
}
?>