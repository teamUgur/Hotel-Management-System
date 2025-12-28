<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="/hotel/css/style.css">
    <style>

        * {
            margin: 0;
        }

        .hms-logo {
            width: 100% ;
            height: 40px;
            background-color: rgb(79, 79, 79) ;
            padding: 10px 5px ;
            display: block ;
            visibility: visible ;
            opacity: 1;
            display: flex;
            align-items: center;
        }

        .logo {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <?php
    if ($_SESSION['id']) { ?>
        <div id="content">
            <div class="hms-logo">
                <a href="#" class="logo">Hotel Management System</a>
            </div>
            <!-- <span class="menu-btn"><i class="fa fa-bars"></i></span> -->
            <ul class="ts-profile-nav">
                <li class="ts-account">
                    <a href="#"><img src="../img/avatar.png" class="ts-avatar hidden-side" alt="">Account <i class="fa fa-angle-down
                    hidden-side"></i></a>
                    <ul>
                        <li><a href="../my-profile.php">My account</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    <?php } else { ?>
        <div class="hms-logo">
            <a href="#" class="logo">Hotel Management System</a>
        </div>
        <!-- <span class="menu-btn"><i class="fa fa-bars"></i></span> -->
    <?php } ?>
</body>
</html>



