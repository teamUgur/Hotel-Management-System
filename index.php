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

// Process User Login
if (isset($_POST['user_login_submit'])) {
    if (isset($_POST['Email']) && isset($_POST['Password'])) {
        $email = $_POST['Email'];
        $password = $_POST['Password'];

        $sql = 'SELECT * FROM signup WHERE Email = ? AND Password = BINARY ?';
        $stmt = prepareAndExecute($conn, $sql, [$email, $password]);
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['usermail'] = $email;
            header("Location: home.php");
            exit();
        } else {
            $user_login_error = "Invalid email or password";
        }
    } else {
        $user_login_error = "Please fill in all fields";
    }
}

// Process Staff Login
if (isset($_POST['Emp_login_submit'])) {
    if (isset($_POST['Emp_Email']) && isset($_POST['Emp_Password'])) {
        $email = $_POST['Emp_Email'];
        $password = $_POST['Emp_Password'];

        $sql = 'SELECT * FROM emp_login WHERE Emp_Email = ? AND Emp_Password = BINARY ?';
        $stmt = prepareAndExecute($conn, $sql, [$email, $password]);
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['usermail'] = $email;
            header("Location: ./admin/admin.php"); 
            exit();
        } else {
            $staff_login_error = "Invalid email or password";
        }
    } else {
        $staff_login_error = "Please fill in all fields";
    }
}

// Process Sign Up
if (isset($_POST['user_signup_submit'])) {
    if (isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['Cpassword'])) {
        $username = $_POST['Username'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $cpassword = $_POST['Cpassword'];

        if ($password == $cpassword) {
            $sql = 'SELECT * FROM signup WHERE Email = ?';
            $stmt = prepareAndExecute($conn, $sql, [$email]);
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $signup_error = 'Email already exists';
            } else {
                $sql_insert = 'INSERT INTO signup (Username, Email, Password) VALUES (?, ?, ?)';
                $stmt_insert = prepareAndExecute($conn, $sql_insert, [$username, $email, $password]);

                if($stmt_insert->affected_rows > 0) {
                    $_SESSION['usermail'] = $email;
                    header("Location: home.php");
                    exit();
                } else {
                    $signup_error = 'Something went wrong';
                }
            }
        } else {
            $signup_error = 'Passwords do not match';
        }
    } else {
        $signup_error = 'Please fill in all fields';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

            <div class="button-group">
                <button id="userBtn" class="changeBtn active">User</button>
                <button id="staffBtn" class="changeBtn">Staff</button>
            </div>

            <!-- Display errors if any -->
            <?php if (isset($user_login_error)): ?>
                <div class="error-message"><?php echo htmlspecialchars($user_login_error); ?></div>
            <?php endif; ?>
            
            <?php if (isset($staff_login_error)): ?>
                <div class="error-message"><?php echo htmlspecialchars($staff_login_error); ?></div>
            <?php endif; ?>

            <!-- User Login Form -->
            <div id="userForm" class="form-container">
                <form action="" method="POST" class="form-inputs">
                    <label for="Username">Username</label>
                    <input type="text" id="userUsername" name="Username" required>
                    <label for="Email">Email:</label>
                    <input type="email" id="userEmail" name="Email" required>
                    <label for="Password">Password:</label>
                    <input type="password" id="userPassword" name="Password" required>
                    <button type="submit" name="user_login_submit">Login as User</button>
                    <p>Don't have an account? <span class="page_move_btn" onclick="signupPage()">Sign Up</span></p>
                </form>
            </div>

            <!-- Staff Login Form -->
            <div id="staffForm" class="form-container hidden">
                <form action="" method="POST" class="form-inputs">
                    <label for="Emp_Email">Email:</label>
                    <input type="text" id="staffUsername" name="Emp_Email" required>
                    <label for="Emp_Password">Password:</label>
                    <input type="password" id="staffPassword" name="Emp_Password" required>
                    <button type="submit" name="Emp_login_submit">Login as Staff</button>
                    <p>Don't have an account? <span class="page_move_btn" onclick="signupPage()">Sign Up</span></p>
                </form>
            </div>
        </div>

        <!-- Sign Up -->
        <!-- Display signup error if any -->
        <?php if (isset($signup_error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($signup_error); ?></div>
        <?php endif; ?>

        <div id="signup" class="hidden">
            <h2>Sign Up</h2>
            <form action="" method="POST">
                <!-- NOTE: Changed field names to match PHP code -->
                <input type="text" name="Username" placeholder="Username:" required>
                <input type="text" name="Email" placeholder="Email:" required>
                <input type="password" name="Password" placeholder="Password:" required>
                <input type="password" name="Cpassword" placeholder="Confirm password:" required>
                <button class="login-btn" name="user_signup_submit">Sign Up</button> <!-- Changed text to "Sign Up" -->
                <p>Already have an account? <span class="page_move_btn" onclick="loginPage()">Log in</span></p>
            </form>
        </div>
    </section>
</body>
</html>