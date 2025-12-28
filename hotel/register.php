<?php
session_start();
include './includes/checklogin.php';
if (isset($_SESSION['submit'])) {
    $regno = $_POST['regNo'];
    $fname = $_POST['firstName'];
    $mname = $_POST['middleName'];
    $lname = $_POST['lastName'];
    $gender = $_POST['gender'];
    $contact = $_POST['contactNo'];
    $emailid = $_POST['email'];
    $password = $_POST['password'];

    $result = "SELECT count(*) FROM userregistration WHERE email=? || regNo=?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param("ss", $emailid, $regno);
    $stmt->execute();

    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "<script>alert('Email or phone number are already redistred.')</script>";
    } else {
        $query = "INSERT INTO userregistration (regNo, firstName, middleName, lastName, gender, contactNo, email, password) VALUES
        (?,?,?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('sssssiss', $regno, $fname, $mname, $lname, $gender, $contact, $emailid, $password);
        echo "<script>alert('User was registred successfully!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="/hotel/css/style.css">
    <style>
        * {
			margin: 0;
            padding: 0;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

        h2 {
            margin-left: 300px;
            margin-top: 50px;
            color: #333;

        }

        .info {
            margin: 10px 0 10px 15px;
        }        

        .info-main {
            margin: 10px 0 10px 15px;
            color: white;
        }

        .main-text {
            display: flex;
            flex-direction: column;
        }

        .user-reg-form {
            margin-left: 300px;
            margin-top: 30px;
            height: 650px;
            width: 1100px;
            border: 1px solid rgba(46, 51, 116, 1);
            border-radius: 10px;
        }

        .blue-zone {
            width: 1100px;
            padding: 5px;
            background-color: rgba(68, 77, 198, 1);
            border-radius: 10px 10px 0 0;
        }
    </style>
    <script>
        // DO LATER!!!
    </script>
</head>
<body>
    <?php include "./includes/header.php" ?>
    <div>
        <div>
            <?php include "./includes/sidebar.php" ?>
        </div>

        <div class="main-text">
            <h2>Student Registration</h2>
        </div>

        <div class="user-reg-form">
            <div class="blue-zone">
                <h5 class="info-main">FILL ALL INFO</h5>
            </div>  
        </div>
    </div>
</body>
</html>