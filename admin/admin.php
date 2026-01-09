<?php

include "../config.php";
session_start();

// page redirect
$usermail="";
$usermail=$_SESSION['usermail'];
if ($usermail == true) {

} else {
    header("Location: ./index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>

    <div id="mobile-view">
        <h5>Admin panel doesn't show in mobile view</h5>
    </div>

    <nav id="upper-nav">

        <div class="img-s">
            <img src="../img/logo.png" alt="logo" id="logo">
        </div>

        <div id="log-out">
            <a href="./logout.php"><button class="btn btn-danger">Logout</button></a>
        </div>
        
    </nav>

    <nav id="side-nav">

    </nav>

</body>
</html>