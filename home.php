<?php
include "./config.php";
session_start();

if(isset($_SESSION['Email']) || empty($_SESSION['Email'])) {
    header("Location: ./index.php");
    exit();
}

$userEmail = $_SESSION['Email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
</body>
</html>