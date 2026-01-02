<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "./config.php";
session_start();

function prepareAndExecute ($conn, $sql, $params) {
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("sqli error: " . htmlspecialchars($conn->error));
    }
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    $stmt->execute();
    return $stmt;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carusel</title>
    <link href="./css/carousel_login_logic.css" rel="stylesheet">
</head>
<body>
    <!-- CAROUSEL -->
     <section class="carusel-container">
        <div>
            <div class="carousel-slide active">
                <img src="./img/hotel 1.JPG" alt="Room 1">
            </div>

            <div class="carousel-slide">
                <img src="./img/hotel 2.JPG" alt="Room 2">
            </div>

            <div class="carousel-slide">
                <img src="./img/hotel 3.JPG" alt="Room 3">
            </div>

            <div class="carousel-slide">
                <img src="./img/hotel 4.JPG" alt="Room 4">
            </div>

            <button id="prevBtn" class="carousel-button prev">&#10094;</button>
            <button id="nextBtn" class="carousel-button next">&#10095;</button>

            <div class="carousel-nav">
                <button class="carousel-indicator current-slide"></button>
                <button class="carousel-indicator"></button>
                <button class="carousel-indicator"></button>
                <button class="carousel-indicator"></button>
            </div>
        </div>
     </section>
    

    <!-- Login LOGIC! -->

    <section class="login-section">

        <img src="./img/logo.png" alt="logo" id="logo">
        <h2>Log In</h2>
        <div id="user-change-buttons">
            <button class="changeBtn">User</button>
            <button class="changeBtn">Staff</button>
        </div>

        <div class="input-area">
            <input type="text" name="username" placeholder="Username:" required>
            <input type="text" name="email" placeholder="Email:" required>
            <input type="password" name="password" placeholder="Password:" required>
            <button id="login-btn">Log In</button>
            <p>Don't have an account? <span class="page_move_btn" onclick="signupPage()">Sign Up</span></p>
        </div>
        
    </section>


    <script type="module" src="./js/carousel_login_logic.js"></script>
</body>
</html>