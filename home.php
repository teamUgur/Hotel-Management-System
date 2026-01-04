<?php

include 'config.php';
session_start();

// page redirect
$usermail="";
$usermail=$_SESSION['usermail'];
if ($usermail == true){

} else{ 
  header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ugur Hotel</title>
    <link rel="stylesheet" href="./admin/css/roombook.css">
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>

    <nav>
        <img src="./img/logo.png" alt="logo" id="logo">
        <ul id="nav-bar">
            <li><a href="#firstsection">Home</a></li>
            <li><a href="#secondsection">Rooms</a></li>
            <li><a href="#thirdsection">Facilities</a></li>
            <li><a href="#fourthsection">Connect Us</a></li>
            <a href="./logout.php"><button class="btn btn-danger">Logout</button></a>
        </ul>

    </nav>

    <section id="firstsection">

        <div class="inner">
            <img src="./img/hotel 5.png" alt="hotel" id="main-start-img">
            <div id="welcome-line">
                <h1 class="welcometag">Welcome to heaven on earth</h1>
            </div>
        </div>

        <!-- bookbox -->
         

    </section>

</body>
</html>