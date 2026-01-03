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
    <script type="module" src="./js/carousel_login_logic.js"></script>
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
    

    <!-- Login & Signup LOGIC! -->

    <section class="login-signup-section">

        <div id="logo-area">
            <img src="./img/logo.png" alt="logo" id="logo">
        </div>

        <!-- LOGIN -->

        <div id="login">
            
            <h2>Log In</h2>

            <div class="button-group ">
                <button id="userBtn" class="changeBtn active">User</button>
                <button id="staffBtn" class="changeBtn">Staff</button>
            </div>

            <!-- User Login -->

            <div id="userForm" class="form-container">
                <form action="" method="POST" class="form-inputs">
                    <label for="userUsername">Username</label>
                    <input type="text" id="userUsername" name="userUsername">
                    <label for="userEmail">Email:</label>
                    <input type="email" id="userEmail" name="userEmail">
                    <label for="userPassword">Password:</label>
                    <input type="password" id="userPassword" name="userPassword">
                    <button type="submit">Login as User</button>
                    <p>Don't have an account? <span class="page_move_btn" onclick="signupPage()">Sign Up</span></p>
                </form>
            </div>

            <!-- Employee Login -->

            <div id="staffForm" class="form-container hidden">
                <form action="" method="POST" class="form-inputs">
                    <label for="staffEmail">Email:</label>
                    <input type="text" id="staffUsername" name="staffEmail">
                    <label for="staffPassword">Password:</label>
                    <input type="password" id="staffPassword" name="staffPassword">
                    <button type="submit">Login as Staff</button>
                    <p>Don't have an account? <span class="page_move_btn" onclick="signupPage()">Sign Up</span></p>
                </form>
            </div>
        </div>
        <!-- Sign Up -->

        <div id="signup" class="hidden">
            <h2>Sign Up</h2>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username:" required>
                <input type="text" name="email" placeholder="Email:" required>
                <input type="password" name="password" placeholder="Password:" required>
                <input type="password" name="cpassword" placeholder="Confirm password:" required>
                <button class="login-btn">Log In</button>
                <p>Already have an account? <span class="page_move_btn" onclick="loginPage()">Log in</span></span></p>
            </form>
        </div>
        
    </section>
</body>
</html>