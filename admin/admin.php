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
    <!-- Pace JS -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="../css/flash.css">
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
        <ul>
            <li class="page-btn active-btn"><img src="../img/dashboard.png" alt="logo">&nbsp;&nbsp;&nbsp; Dashboard</li>
            <li class="page-btn"><img src="../img/booking.png" alt="logo">&nbsp;&nbsp;&nbsp; Room Booking</li>
            <li class="page-btn"><img src="../img/credit-card.png" alt="logo">&nbsp;&nbsp;&nbsp; Payment</li>
            <li class="page-btn"><img src="../img/bed.png" alt="logo">&nbsp;&nbsp;&nbsp; Rooms</li>
            <li class="page-btn"><img src="../img/team.png" alt="logo">&nbsp;&nbsp;&nbsp; Staff</li>
        </ul>
    </nav>

    <div class="mainscreen">
        <iframe class="frames frame1 active-frame" src="./dashboard.php" frameborder="0"></iframe>
        <iframe class="frames frame2" src="./roombook.php" frameborder="0"></iframe>
        <iframe class="frames frame3" src="./payment.php" frameborder="0"></iframe>
        <iframe class="frames frame4" src="./room.php" frameborder="0"></iframe>
        <iframe class="frames frame4" src="./staff.php" frameborder="0"></iframe>
    </div>

    <script src="./js/script.js"></script>

</body>
</html>