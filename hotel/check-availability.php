<?php 

require_once("./includes/config.php");

// EMAIL VALIDATION AND DUPLICATE CHECK

if (!empty($_POST['emailid'])) {
    $email = $_POST['emailid'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "Error: not valid email format. Please, try again.";
    } else {
        $result = "SELECT FROM userregistration WHERE email = ?";
        $stmt = $mysqli->prepare($result);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            echo "<span style='color: red'>Email is already existed</span>";
        };
    }
}

// REGISTRATION NUMBER DUPLICATE CHECK

if (!empty($_POST["regno"])) {
    $regno = $_POST['regno'];

    $result = "SELECT FROM userregistration WHERE regno = ?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('s', $regno);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "<span style='color: red'>Registration number already exist. Please try again.</span>";
    };
}

// OLD PASSWORD VERIFICATION

if (!empty($_POST['oldpassword'])) {
    $pass = $_POST['oldpassword'];

    $result = "SELECT FROM userregistration WHERE password = ?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('s', $pass);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();

    $oldpass = $result;
    if ($oldpass === $pass) {
        echo "<span style='color: green'>Passwords matched</span>";
    } else {
        echo "<span style='color: red'>Passwords were not matched. Please try again.</span>";
    }
}

// ROOM AVAILABILITY CHECK

if (!empty($_POST['roomno'])) {
    $roomno = $_POST['roomno'];

    $result = "SELECT FROM registration WHERE roomno = ?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('i', $roomno);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "<span style='color:red'>$count Seats already full.</span>";
    }
    else {
        echo "<span style='color:red'>All Seats are Available</span>";
    }
}

?>