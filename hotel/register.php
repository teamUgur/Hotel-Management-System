<?php
session_start();
include './includes/checklogin.php';
if (isset($_SESSION['submit'])) {
    $regno = $_POST['regno'];
    $fname = $_POST['firstName'];
    $mname = $_POST['middleName'];
    $lname = $_POST['lastName'];
    $gender = $_POST['gender'];
    $contact = $_POST['contactNo'];
    $emailid = $_POST['email'];
    $password = $_POST['password'];

    $result = "SELECT count(*) FROM userregistration WHERE email=? || regno=?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param("ss", $emailid, $regno);
    $stmt->execute();

    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "<script>alert('Email or phone number are already redistred.')</script>";
    } else {
        $query = "INSERT INTO userregistration (regno, firstName, middleName, lastName, gender, contactNo, email, password) VALUES
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
            margin-top: 30px;
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
            height: 700px;
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

        .form-group {
            width: 90%;
            display: flex;
            justify-content: end;
            margin: 15px 0;
        }

        .default-input, option, select {
            width: 80%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        label {
            padding: 15px;
        }

        .submit-reg {
            padding: 10px;
            margin: 0 0 0 10px;
            width: 100px;
            font-size: 15px;
        }

        .loaderIcon {
            display: none; 
            margin-left: 10px; 
            color: blue;
        }
        
    </style>
    <script>
        function valid() {
            if (document.registration.password.value != document.registration.cpassword.value) {
                alert("Password and Re-Type Password Field do not match  !!");
                document.registration.cpassword.focus();
                return false
            }
            return true;
        }
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

            <form action="post" name="registration" class="form-horizontal" onsubmit="return valid();">
                
                <div class="form-group">
                    <label class="control-label">Registration No:</label>
                    <input type="text" name="regno" id="regno" class="default-input" required="required" onBlur="checkRegnoAvailability()">
                    <span id="user-reg-availability" style="font-size:12px;"></span> <!-- IMPORTANT !-->
                </div>

                <div class="form-group">
                    <label class="control-label">First name:</label>
                    <input type="text" name="firstName" id="firstName" class="default-input" required="required">
                </div>

                <div class="form-group">
                    <label class="control-label">Middle name:</label>
                    <input type="text" name="middleName" id="middleName" class="default-input" required="required">
                </div>

                <div class="form-group">
                    <label class="control-label">Last name:</label>
                    <input type="text" name="lasttName" id="lastName" class="default-input" required="required">
                </div>

                <div class="form-group">
                    <label class="control-label">Gender:</label>
                    <select name="gender" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Contact No:</label>
                    <input type="text" name="contactNo" id="contactNo" class="default-input" required="required">
                </div>

                <div class="form-group">
                    <label class="control-label">Email id:</label>
                    <input type="text" name="emaolId" id="email" class="default-input" required="required" onBlur="checkAvailability()">
                    <span id="loaderIcon">⏳ Checking...</span>
                    <span id="user-availability-status" style="font-size:12px;"></span> <!-- IMPORTANT !-->
                </div>

                <div class="form-group">
                    <label class="control-label">Password:</label>
                    <input type="password" name="password" id="password" class="default-input" required="required">
                </div>

                <div class="form-group">
                    <label class="control-label">Confirm Password:</label>
                    <input type="password" name="cpassword" id="cpassword" class="default-input" required="required">
                </div>

                <div class="form-group">
                    <button type="reset" class="submit-reg">Reset</button>
                    <input type="submit" name="submit" Value="Register" class="submit-reg">
                </div>

            </form>
        </div> 
    </div>
</body>
    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check-availability.php",
                data: 'emailid' + $("#email").val(),
                type: "POST",
                success:function(data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error:function() {
                    event.preventDefault();
                    alert("Error")
                }
            })
        }

        function checkRegnoAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check-availability.php",
                data: 'regno' + $("#regno").val(),
                type: "POST",
                success:function(data) {
                    $("#user-reg-availability").html(data);
                    $("#loaderIcon").hide();
                },
                error:function() {
                    event.preventDefault();
                    alert("Error")
                }
            })
        }
    </script>
</html>